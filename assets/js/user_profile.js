require('../css/user_profile.scss');
require('../images/logo.png');
require('../images/user-thumb.jpg');

$(document).ready(function () {
    $('#myModal').on('show.bs.modal', function () {
        let btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' +
            'onclick="alert(\'Call your custom code here.\')">' +
            '<i class="glyphicon glyphicon-tag"></i>' +
            '</button>';
        // $("#avatar-2").fileinput({
        //     overwriteInitial: true,
        //     maxFileSize: 1500,
        //     showClose: false,
        //     showCaption: false,
        //     showBrowse: false,
        //     browseOnZoneClick: true,
        //     removeLabel: '',
        //     removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        //     removeTitle: 'Cancel or reset changes',
        //     elErrorContainer: '#kv-avatar-errors-2',
        //     msgErrorClass: 'alert alert-block alert-danger',
        //     defaultPreviewContent: `<img src="${$('#avatar_img').prop('src')}"><h6 class="text-muted">Kliknij aby wybrać</h6>`,
        //     layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
        //     allowedFileExtensions: ["jpg", "png", "gif"]
        // });
    });
});
