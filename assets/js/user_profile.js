require('datatables.net-bs/css/dataTables.bootstrap.css');
require('datatables.net');
require('datatables.net-bs');

require('../css/user_profile.scss');
require('../images/logo.png');
require('../images/user-thumb.jpg');

$(document).ready(function () {
    $('#upload-avatar-modal').on('show.bs.modal', function () {
        $("#avatar-input").fileinput({
            language: 'pl',
            required: true,
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

    $('#comments-table').DataTable({
        language: require('../json/pl.datatables.json'),
        paging: false,
        dom: '<"#table-filter-row"f>rt<"bottom"il><"clear">',
        columnDefs: [
            {
                targets: 3,
                orderable: false
            }
        ]
    });
});
