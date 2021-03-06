'use strict';

require('../css/global.scss');
require('../js/notify.js');
require('../css/footer.scss');
require('../css/navbar.scss');
require('../images/throbber.gif');
require('../images/default_avatar.jpg');
require('../js/login.js');

const $ = require('jquery');
global.$ = global.jQuery = $;

$(window).on('load', function() {
    $('#preloader').fadeOut('slow');
});

$(document).ready(function() {

    $('#reset-password-btn').click(function () {
        let $resetPasswordBtn = $(this);
        $resetPasswordBtn.button('loading');
        $.ajax({
            url: '/forgot_password',
            type: 'POST',
            dataType: 'json',
            data: {
                email: $('#email_address_forgot').val()
            },
            success: function (data) {
                $resetPasswordBtn.button('reset');
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