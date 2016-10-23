if (typeof doctorBackend.controllers.doctor == 'undefined') {
    doctorBackend.controllers.doctor = {};
}

doctorBackend.controllers.doctor.update = (function() {
    return {
        isActive: true,
        init: function () {
            this.initHandlers();            
        },

        initHandlers: function () {
            $(document).on('click', '.kv-file-remove', function(){
                var postData = {
                        doctorId: $('.doctor-form').attr('doctor-id')
                    };

                $.post('/doctor/delete-image', postData, function (data) {
                    if (data == true) {
                        modal.modal('hide');
                        window.location.reload();
                        $reportMessage.val('');
                    }
                });
            });
        }
    };
}());