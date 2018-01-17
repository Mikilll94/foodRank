const alertify = require('alertifyjs');

$('#login-nav').submit(function(e) {
    e.preventDefault();

    $('#login-via-navbar').hide();
    $('#login-via-navbar-throbber').show();

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
            $('#login-via-navbar-throbber').hide();
            $('#login-via-navbar').show();
            location.reload();
        },
        error: function (xhr, ajaxOptions, thrownError) {
            $('#login-via-navbar-throbber').hide();
            $('#login-via-navbar').show();
            alertify.set('notifier','position', 'top-left');
            if (thrownError === "Unauthorized") {
                alertify.notify('Nieprawidłowe hasło lub login', 'error', 5);
            } else {
                alertify.notify('Wystąpił nieoczekiwany błąd', 'error', 5);
            }
        }
    })
});