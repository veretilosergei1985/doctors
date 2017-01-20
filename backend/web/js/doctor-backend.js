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
        },
        getUrlVars: function() {
            var vars = [], hash;
            var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
            for(var i = 0; i < hashes.length; i++)
            {
                hash = hashes[i].split('=');
                vars.push(hash[0]);
                vars[hash[0]] = hash[1];
            }
            return vars;
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