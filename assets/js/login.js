const alertify = require('alertifyjs');

$('#forgot-password').click(function () {
   alertify.alert("Hello");
});

$('#login-button').click(function() {
    let username = $('#username').val();
    let password = $('#password').val();
    let loginData = {
        "username": username,
        "password": password

    };
    $.ajax({
        url: '/login',
        type: 'POST',
        contentType: 'application/json',
        dataType: 'json',
        data: JSON.stringify(loginData),
        success: function () {
            location.reload();
        },
        error: function (xhr, ajaxOptions, thrownError) {
            if (thrownError === "Unauthorized") {
                $('#login-error').text("Nieprawidłowe hasło lub login");
            } else {
                $('#login-error').text("Wystąpił nieoczekiwany błąd");
            }
        }
    })
});