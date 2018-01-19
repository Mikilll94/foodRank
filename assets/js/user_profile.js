require('datatables.net-bs/css/dataTables.bootstrap.css');
require('datatables.net');
require('datatables.net-bs');

require('../css/user_profile.scss');
require('../images/logo.png');

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

    $('#user-profile-menu > li').click(function () {
        $('#user-profile-menu > li').removeClass('active');
        $(this).addClass('active');

        $('.tab').hide();
        let tabToShow = $(this).attr('id');
        $(`.tab.${tabToShow}`).show();
    });

    $('#change-password-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '/profile/change_password',
            type: 'POST',
            dataType: 'json',
            data: {
                old_password: $('#old-password').val(),
                new_password: $('#new-password').val(),
            },
            success: function (data, status) {
                if (data.errors.length > 0) {
                    alertify.set('notifier', 'position', 'bottom-center');
                    alertify.notify(data.errors.join('\n'), 'error', 5);
                    return;
                }
                location.reload();
            }
        });
    });
});
