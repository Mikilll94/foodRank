$(document).ready(function () {
    $('#propose-restaurant-form').submit(function (e) {
        e.preventDefault();
        $(this).hide();
        $('#propose-restaurant-thanks').show();
    });
});