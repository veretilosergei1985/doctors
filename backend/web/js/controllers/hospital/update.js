/**
 * ShowMe project controller script for the action "create".
 *
 * @author Andrey Klimenko <andrey.iemail@gmail.com>
 */

// Namespace for project the controller
if (typeof doctorBackend.controllers.hospital == 'undefined') {
    doctorBackend.controllers.hospital = {};
}

doctorBackend.controllers.hospital.update = (function ($) {

    var fields = {
        hospitalLatitude: $("#hospital-latitude"),
        hospitalLongitude: $("#hospital-longitude"),
    };

    var map;

    var googleMapScriptSrc = "https://maps.googleapis.com/maps/api/js?key=AIzaSyDM_yPrIq30kCIxSUiv--sU-mmAuXVLU1s&libraries=places&callback=initialize&language=ru";

    return {
        isActive: true,

        init: function () {

            loadScript();
            window.initialize = initMap;

            $("#w1").change(function() {
                var reader = new FileReader();
                reader.onload = function() {
                    $('.kv-file-zoom').remove();
                };
                $('.kv-file-zoom').remove();
            });

            function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: -33.8688, lng: 151.2195},
                    zoom: 13
                });
                var input = document.getElementById('hospital-address_tmp');

                var types = document.getElementById('type-selector');
                map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
                map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

                var autocomplete = new google.maps.places.Autocomplete(input);
                autocomplete.bindTo('bounds', map);

                var infowindow = new google.maps.InfoWindow();
                var marker = new google.maps.Marker({
                    map: map,
                    anchorPoint: new google.maps.Point(0, -29)
                });

                // set location
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(fields.hospitalLatitude.val(), fields.hospitalLongitude.val())
                });
                marker.setMap(map);
                map.setCenter(marker.getPosition());

                autocomplete.addListener('place_changed', function() {
                    infowindow.close();
                    marker.setVisible(false);
                    var place = autocomplete.getPlace();
                    if (!place.geometry) {
                        window.alert("Autocomplete's returned place contains no geometry");
                        return;
                    }
                    // If the place has a geometry, then present it on a map.
                    if (place.geometry.viewport) {
                        map.fitBounds(place.geometry.viewport);
                    } else {
                        map.setCenter(place.geometry.location);
                        map.setZoom(17);  // Why 17? Because it looks good.
                    }
                    marker.setIcon(/** @type {google.maps.Icon} */({
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(35, 35)
                    }));
                    marker.setPosition(place.geometry.location);
                    marker.setVisible(true);

                    var address = '';
                    if (place.address_components) {
                        address = [
                            (place.address_components[0] && place.address_components[0].short_name || ''),
                            (place.address_components[1] && place.address_components[1].short_name || ''),
                            (place.address_components[2] && place.address_components[2].short_name || '')
                        ].join(' ');
                    }

                    setLatLng(place);

                    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
                    infowindow.open(map, marker);
                });


            }

        },
        showSimple: function () {
            setCurrentLocation();
        },

        initHandlers: function () {
        }
    };
    
    function loadScript() {
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.src = googleMapScriptSrc;
        document.body.appendChild(script);
    }

    function setLatLng(place) {
        fields.hospitalLatitude.val(place.geometry.location.lat());
        fields.hospitalLongitude.val(place.geometry.location.lng());
    }


})
(jQuery);