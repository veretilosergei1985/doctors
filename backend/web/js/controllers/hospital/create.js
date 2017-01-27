/**
 * ShowMe project controller script for the action "create".
 *
 * @author Andrey Klimenko <andrey.iemail@gmail.com>
 */

// Namespace for project the controller
if (typeof doctorBackend.controllers.hospital == 'undefined') {
    doctorBackend.controllers.hospital = {};
}

doctorBackend.controllers.hospital.create = (function ($) {

    var fields = {
        hospitalLatitude: $("#hospital-latitude"),
        hospitalLongitude: $("#hospital-longitude"),
    };

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
                var input = /** @type {!HTMLInputElement} */(
                    document.getElementById('hospital-address_tmp'));

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

            this.initHandlers();

            $('input[name="Hospital[hospital_type]"]').change(function () {
                if($(this).val() == 1) {
                    $('.field-hospital-parent_id').hide();
                } else {
                    $('.field-hospital-parent_id').show();
                }
            });

            if ($('input[name="Hospital[hospital_type]"]:checked').val() == 1) {
                $('.field-hospital-parent_id').hide();
            }

        },

        initHandlers: function () {
            $('#add-schedule').click(function() {
                var element = $('.schedule-fields:last').clone();
                $(".schedule-fields:last").after(element);
                $('.remove-schedule:not(:first)').css('visibility', 'visible');

                $('.remove-schedule').click(function(e) {
                    e.preventDefault();
                    $(this).closest('.schedule-fields').remove();
                });

            });

            $('#hospital-city_id').change(function () {
                var cityId = $(this).val();
                if (cityId != '') {
                    $.when(
                        $.get('/district/get-all', { city_id: cityId }, function (data) {
                            var obj = $.parseJSON(data);
                            if (obj.success == true) {
                                $('#hospital-district_id option:not(:first)').remove().end();
                                $.each(obj.data, function (i, item) {
                                    $('#hospital-district_id').append($('<option>', {
                                        value: item.id,
                                        text : item.title
                                    }));
                                });


                            }
                        })
                    ).then(function() {
                        $.get('/metro/get-all', { city_id: cityId }, function (data) {
                            var obj = $.parseJSON(data);
                            if (obj.success == true) {
                                $('#hospital-metro_id option:not(:first)').remove().end();
                                $.each(obj.data, function (i, item) {
                                    $('#hospital-metro_id').append($('<option>', {
                                        value: item.id,
                                        text : item.title
                                    }));
                                });


                            }
                        })
                    });

                }
            });


            // populate district drop down using city_id
            /*
            $('#hospital-city_id').change(function () {
                var cityId = $(this).val();
                if (cityId != '') {

                    $.get('/district/get-all', { city_id: cityId }, function (data) {
                        var obj = $.parseJSON(data);
                        if (obj.success == true) {
                            $('#hospital-district_id option:not(:first)').remove().end();
                            $.each(obj.data, function (i, item) {
                                $('#hospital-district_id').append($('<option>', {
                                    value: item.id,
                                    text : item.title
                                }));
                            });


                        }
                    });
                }
            });
            */

            // handle hospital type
            $('input[name="Hospital[hospital_type]"]').change(function () {
                if($(this).val() == 1) {
                    $('.field-hospital-parent_id').hide();
                    //$('.hospital-parent_id').attr('disabled', 'disabled');
                } else {
                    $('.field-hospital-parent_id').show();
                }
            });

            //Initialize tooltips
            $('.nav-tabs > li a[title]').tooltip();


            //$('#hospital-form').on('afterValidate', function (e) {
                //if($('.has-error').length == 0) {
                    $(".next-step").click(function (e) {

                        var $active = $('.wizard .nav-tabs li.active');
                        $active.next().removeClass('disabled');
                        nextTab($active);


                    });
                //}
            //});

            //Wizard
            $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

                var $target = $(e.target);

                if ($target.parent().hasClass('disabled')) {
                    return false;
                }
            });

            $(".prev-step").click(function (e) {

                var $active = $('.wizard .nav-tabs li.active');
                prevTab($active);

            });
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

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }

    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }

})
(jQuery);