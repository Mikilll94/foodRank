const alertify = require('alertifyjs');

$(document).ready(function () {
    $('#login-nav').submit(function(e) {
        e.preventDefault();

        $('#login-navbar-btn').button('loading');

        let username = $('#username').val();
        let password = $('#password').val();
        let loginData = {
            username: username,
            password: password
        };
        $.ajax({
            url: '/login_json',
            type: 'POST',
            contentType: 'application/json',
            dataType: 'json',
            data: JSON.stringify(loginData),
            success: function () {
                $('#login-navbar-btn').button('reset');
                location.reload();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $('#login-navbar-btn').button('reset');
                alertify.set('notifier','position', 'top-left');
                if (thrownError === "Unauthorized") {
                    alertify.notify('Nieprawidłowe hasło lub login', 'error', 5);
                } else {
                    alertify.notify('Wystąpił nieoczekiwany błąd', 'error', 5);
                }
            }
        })
    });
});