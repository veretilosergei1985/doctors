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
                    var obj = $.parseJSON(data);
                    if (obj.success == true) {
                        $('.file-preview ').remove();
                    }
                });
            });

            //$('#doctor-procedures').treeMultiselect();
            //$('#demo1').treeMultiselect();
            //$('.ms-elem-selectable').removeClass('ms-selected').show();
            //$('.ms-elem-selection').removeClass('ms-selected').hide();
        }
    };
}());