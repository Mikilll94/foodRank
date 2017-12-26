require('../css/restaurant_details.scss');
require('../css/stars.scss');
const alertify = require('alertifyjs');

$(document).ready(function () {
    $("#add-review").click(function () {
        let content = $('#form_content').val();
        let rate = $('input[name=form-rate]:checked').val();
        let rateHTML = '<span class="glyphicon glyphicon-star"></span> '.repeat(rate);
        rateHTML += '<span class="glyphicon glyphicon-star-empty"></span> '.repeat(5 - rate);
        $.ajax({
            url: $('#restaurant-details').data('add-comment-url'),
            type: 'POST',
            dataType: 'json',
            data: {
                rate: rate,
                content: content,
            },
            success: function (data, status) {
                $('#error_list').empty();
                if (data.errors.length > 0) {
                    alertify.set('notifier','position', 'bottom-center');
                    alertify.notify(data.errors.join('\n'), 'error', 5);
                    return;
                }
                $('#add-comment-form').remove();
                $('.comments-well').prepend(
                    '<div class=\"row\">' +
                    '   <div class=\"col-md-12\">' +
                    rateHTML +
                    ' ' + $('#restaurant-details').data('logged-user') +
                    '   <span class=\"pull-right\">przed chwilą</span>' +
                    '       <p>' + content + '</p>' +
                    '   </div>' +
                    '</div>');
            }
        });
    });
});