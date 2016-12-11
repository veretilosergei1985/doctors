var doctorFrontend = (function ($) {
    var pub = {
        initModule: function(module) {
            if (module.isActive === undefined || module.isActive) {
                if ($.isFunction(module.init)) {
                    module.init();
                }
                $.each(module, function () {
                    if ($.isPlainObject(this)) {
                        pub.initModule(this);
                    }
                });
            }
        }
    };
    return pub;
})($);

doctorFrontend.widgets = {};
doctorFrontend.controllers = {};
doctorFrontend.common = {};

jQuery(document).ready(function () {
    doctorFrontend.initModule(doctorFrontend);
    
    //$('.hello_world').pwstabs();
});