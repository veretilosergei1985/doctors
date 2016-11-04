if (typeof doctorFrontend.controllers.doctor == 'undefined') {
    doctorFrontend.controllers.doctor = {};
}

doctorFrontend.controllers.doctor.view = (function() {
    return {
        isActive: true,
        init: function () {
            this.initHandlers();

            doctorFrontend.google.init();
        },

        initHandlers: function () {
            
        }
    };
}());