var doctorBackend = (function ($) {
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

doctorBackend.widgets = {};
doctorBackend.controllers = {};
doctorBackend.common = {};

jQuery(document).ready(function () {
    doctorBackend.initModule(doctorBackend);
});