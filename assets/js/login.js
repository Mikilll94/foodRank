const alertify = require('alertifyjs');

$('#login-button').click(function() {
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
            location.reload();
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alertify.set('notifier','position', 'top-left');
            if (thrownError === "Unauthorized") {
                alertify.notify('Nieprawidłowe hasło lub login', 'error', 5);
            } else {
                alertify.notify('Wystąpił nieoczekiwany błąd', 'error', 5);
            }
        }
    })
});