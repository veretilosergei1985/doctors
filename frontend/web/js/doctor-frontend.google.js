doctorFrontend.google = (function ($) {

    var googleApiVersion = "3.20";

    // Default options
    var defaultOptions = {
        mapElement: "#map", // element to insert google map element
        googleMapId: "google-map-canvas", // google map element id
        autoCompleteElement: "project-locationaddress",


        mapOptions: {
            draggableCursor: "crosshair",
            //disableDefaultUI: true,
            panControl: false,
            zoomControl: true,
            zoomControlOptions: {
                style: 1, //google.maps.ZoomControlStyle.SMALL
                position: 5 // google.maps.ControlPosition.LEFT_TOP
            },
            mapTypeControl: false,
            streetViewControl: false,
            overviewMapControl: false,
//            center: {lat: 40.700001, lng: -74.000000}, // default location - New York
            zoom: 12
        },
        markerOptions: {
            url: '/img/google-map-marker-sm.png'
        },

        canChangeMarkerLocation: true,
        autoCompleteOnMap: false,
        showLocalGlobalButtons: false
    };

    var eventNames = {
        markerAdded: "markerAdded",
        locationAddressLoaded: "locationAddressLoaded",
        timeZoneChanged: "timeZoneChanged"
    };


    // Google map object
    var map = false;
    // Google map markers
    var markers = [];

    // Default time zone
    var timeZone = null;

    // Current location
    var location = {
        address: null,
        latitude: null,
        longitude: null
    };

    var firstInit = true;
    var googleMapScriptSrc = "https://maps.googleapis.com/maps/api/js?key=AIzaSyDM_yPrIq30kCIxSUiv--sU-mmAuXVLU1s&callback=initialize";

    return {
        // Don't activate module before it will be used
        isActive: false,
        // Custom events
        events: {},
        // Custom location data
        location: {
            lastSetAddress: ''
        },

        init: function (options) {
            var firstInit = true;
            defaultOptions = $.extend({}, defaultOptions, options || {}); // set options

            if (defaultOptions.canChangeMarkerLocation == false) {
                defaultOptions.mapOptions.draggableCursor = "default";
            }

            //initEvents();
            createMapCanvas();
        },

        show: function () {
            //$("#" + defaultOptions.googleMapId).show(); // Show map if hidden
            setLocation();
        },

        showSimple: function () {
            $("#" + defaultOptions.googleMapId).show(); // Show map if hidden
            setCurrentLocation();
        },

        hide: function () {
            removeAllMarkers();
            // Clear auto-complete
            document.getElementById(defaultOptions.autoCompleteElement).value = null;
            $("#" + defaultOptions.googleMapId).hide();
        },

        getAutoCompleteElement: function () {
            return $("#" + defaultOptions.autoCompleteElement);
        },

        getTimeZone: function () {
            return timeZone;
        }
    };

    //region Private methods

    function initEvents() {
        jQuery.Event("apiAfterLoad");
        jQuery.Event("timeZoneChanged");
        jQuery.Event("locationChanged");
        doctorFrontend.google.events.locationAddressLoaded = jQuery.Event(eventNames.locationAddressLoaded);
        doctorFrontend.google.events.markerAdded = jQuery.Event(eventNames.markerAdded);
    }

    /**
     * Create google map element and set it into given element on the page.
     */
    function createMapCanvas() {
        //$(defaultOptions.mapElement).html('<div id="' + defaultOptions.googleMapId + '"></div>');

        // IMPORTANT: set callback function for the google API
        window.initialize = apiInitialize;

        loadScript();
    }

    /**
     * Load google map script if needed before it will be used.
     * This load script asynchronous.
     */
    function loadScript() {
        var script = document.createElement("script");

        script.type = "text/javascript";
        script.src = googleMapScriptSrc;

        document.body.appendChild(script);
    }

    /**
     * Set default options for the Google map API on API init callback.
     */
    function apiInitialize() {

        if (!doctorFrontend.google.isActive) {

            var uluru = {lat: -25.363, lng: 131.044};
            var map = new google.maps.Map($(defaultOptions.mapElement).get(0),
                {zoom: 8, center: new google.maps.LatLng(40.67, -73.94), mapTypeId: google.maps.MapTypeId.ROADMAP, mapTypeControl: false}
            );
            // var marker = new google.maps.Marker({
            //     position: uluru,
            //     map: map
            // });

            setLocation(map, location);

        }

        /*
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
        */
    }

    /**
     * Set current location on the map
     * @param position
     */
    function setCurrentLocation (position) {
        doctorFrontend.log("setCurrentLocation()...");

        var locationLatitude = $('input[name="locationLatitude"]');
        var locationLongitude = $('input[name="locationLongitude"]');

        if (locationLatitude.length == 0 && locationLongitude.length == 0) {
            locationLatitude = $('#project-locationLatitude');
            locationLongitude = $('#project-locationLongitude');
        }

        if (locationLatitude.length > 0 && locationLongitude.length > 0) {
            var location = new google.maps.LatLng(locationLatitude.val(), locationLongitude.val());
            addMarker(location);
            map.setZoom(12);
            map.setCenter(location);
        } else {
            var location = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            addMarker(location);
            map.setZoom(12);
            map.setCenter(location);
        }
    }

    /**
     * Set default location on the map
     */
    function setDefaultLocation() {
        var location = new google.maps.LatLng(40.700001, -74.000000);
        addMarker(location);
        map.setZoom(12);
        map.setCenter(location);
    }

    /**
     * If browser support geo location & user enable it - try to get user coordinates to doctorFrontend on the map
     */
    function setLocation(map, location) {
        var location = new google.maps.LatLng(40.700001, -74.000000);

        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
            '<div id="bodyContent">'+
            '<p><b>Uluru</b></p>'+
            '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });


        var marker = new google.maps.Marker({
            position: location,
            title:"Hello World!"
        });

        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });

        marker.setMap(map);

        map.setZoom(12);
        map.setCenter(location);
    }

    /**
     * Convert google location object to the array ([0] - latitude, [1] - longitude).
     * @param position Object
     * @returns {*}
     */
    function convertGooglePositionToArray(position) {
        var location = $.map(position, function (value, index) {
            return [value];
        });

        if (!location[0] || !location[1]) {
            return null;
        }

        return location;
    }

    function addMarker(position, infoContent, doNotSetAddress) {
        removeAllMarkers();
        infoContent = infoContent || '';

        var setAddress = function (position, infoContent) {
            var location = convertGooglePositionToArray(position);

            var $request = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" +
                position.lat() + "," + position.lng() +
                "&sensor=false&language=" + $("html").attr("lang");

            $.get($request, function (response) {
                if (response && response.status == "OK" && response.results && response.results.length > 0) {
                    response.infoContent = infoContent;
                    jQuery(doctorFrontend.google).trigger(doctorFrontend.google.events.locationAddressLoaded, response.results);
                }
            });
        };

        var marker = new google.maps.Marker({
            position: position,
            animation: google.maps.Animation.DROP,
            icon: defaultOptions.markerOptions.url
        });

        //markers.push(marker);
        //showMarkers(map);

        // if (!doNotSetAddress) {
        //     setAddress(position);
        // }
        //
        // setTimeZone(position);


        // Event on location loaded
        /*
        jQuery(doctorFrontend.google).one("locationAddressLoaded", function (event, object) {
            doctorFrontend.log("ON locationAddressLoaded...");

            // Get location longitude & latitude
            if (object.geometry && object.geometry.location) {
                location.latitude = object.geometry.location.lat;
                location.longitude = object.geometry.location.lng;

                doctorFrontend.log("locationChanged ....");

                jQuery(doctorFrontend.google).trigger("locationChanged", location);
            }

            // Set auto-complete address field
            var autoComplete = document.getElementById(defaultOptions.autoCompleteElement);

            if (autoComplete != null) {
                autoComplete.value = object.formatted_address;

                // Update last set address
                if (object.formatted_address) {
                    doctorFrontend.google.location.lastSetAddress = object.formatted_address;
                }
            }

            var infoWindow = new google.maps.InfoWindow({
                content: '<div class="info-window">' + infoContent + '<b>Location:</b>&nbsp;' + object.formatted_address + '</div>',
                disableAutoPan: false
            });

            google.maps.event.addListener(marker, 'click', function () {
                infoWindow.open(map, marker);
            });
            if (firstInit == true) {
                doctorFrontend.projectLocationaddress = $('#project-locationaddress').val();
                firstInit = false;
            }
        });
        */

        // Add event handler
        //jQuery(doctorFrontend.google).trigger(doctorFrontend.google.events.markerAdded);
        //doctorFrontend.log("markerAdded...");
        marker.setMap(map);
    }

    function showMarkers(map) {
        for (var i = 0; i < markers.length; i++) {
            //markers[i].setMap(map);
        }
    }

    function removeAllMarkers() {
        showMarkers(null);
        markers = [];
    }

    function setTimeZone(position) {
        var location = convertGooglePositionToArray(position);

        if (location === null)
            return null;

        var $request = "https://maps.googleapis.com/maps/api/timezone/json?location=" +
            position.lat() + "," + position.lng() +
            "&timestamp=1331766000&sensor=false";

        $.get($request, function (response) {
            if (response && response.status == "OK") {
                if (response.timeZoneId != undefined) {
                    timeZone = response.timeZoneId;
                    jQuery(doctorFrontend.google).trigger("timeZoneChanged", timeZone);
                }
            }
        });
    }

    function createAutoCompleteInput(callbackFunction) {
        //var searchControlDiv = document.createElement('div');

        var controlUI = document.createElement('div');
        controlUI.title = "Type to search...";

        var controlInput = document.createElement('input');
        controlInput.placeholder = 'Type to search...';

        controlUI.appendChild(controlInput);

        var autoComplete = new google.maps.places.Autocomplete(controlInput);
        autoComplete.bindTo('bounds', map);

        google.maps.event.addListener(autoComplete, 'place_changed', callbackFunction);
    }

    //endregion

})(jQuery);