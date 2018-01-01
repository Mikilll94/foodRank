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
            elErrorContainer: '#avatar-errors',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: `<img src="${$('#avatar_img').prop('src')}">`,
            allowedFileExtensions: ["jpg", "png", "gif"]
        });
    });
});
