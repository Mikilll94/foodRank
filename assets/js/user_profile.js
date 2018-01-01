require('../css/user_profile.scss');
require('../images/logo.png');
require('../images/user-thumb.jpg');

$(document).ready(function () {
    $('#myModal').on('show.bs.modal', function () {
        $("#avatar-input").fileinput({
            language: 'pl',
            overwriteInitial: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            showRemove: false,
            showCancel: false,
            removeLabel: '',
            elErrorContainer: '#kv-avatar-errors-2',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: `<img src="${$('#avatar_img').prop('src')}"><h6 class="text-muted">Kliknij aby wybrać</h6>`,
            allowedFileExtensions: ["jpg", "png", "gif"]
        });
    });
});
