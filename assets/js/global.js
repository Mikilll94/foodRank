require('../css/global.scss');
require('../css/footer.scss');
require('../css/navbar.scss');
require('../images/throbber.gif');
require('../images/default_avatar_male.jpg');
require('../js/login.js');

const $ = require('jquery');
global.$ = global.jQuery = $;

// Only for development purposes
const alertify = require('alertifyjs');
global.alertify = alertify;

$(window).on('load', function() {
    $(".se-pre-con").fadeOut("slow");
});

$(document).ready(function() {

    $('#reset-password-btn').click(function () {
        $('#reset-password').hide();
        $('#reset-password-throbber').show();
        $.ajax({
            url: '/forgot_password',
            type: 'POST',
            dataType: 'json',
            data: {
                email: $('#email_address_forgot').val()
            },
            success: function (data) {
                $('#reset-password-throbber').hide();
                $('#reset-password').show();
                if (data.errors.length > 0) {
                    alertify.set('notifier', 'position', 'top-left');
                    alertify.notify(data.errors.join('\n'), 'error', 5);
                    return;
                }
                $('#forgot-password-modal').modal('hide');
                alertify.set('notifier', 'position', 'top-left');
                alertify.notify('Wysłano nowe hasło na podany adres email', 'success', 5);
            }
        })
    });
});