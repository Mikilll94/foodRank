require('../css/restaurant_details.scss');
require('../css/stars.scss');
require('../css/comment-box.scss');

const alertify = require('alertifyjs');

$(document).ready(function () {
    $("#add-review").click(function () {
        let content = $('#addComment').val();
        let rate = $('input[name=form-rate]:checked').val();
        let rateHTML = '';
        for (let i = 0; i < rate; ++i) {
            rateHTML += '<span class="glyphicon glyphicon-star"></span> ';
        }
        for (let i = 0; i < (5 - rate); ++i) {
            rateHTML += '<span class="glyphicon glyphicon-star-empty"></span> ';
        }
        $.ajax({
            url: $('#restaurant-details').data('add-comment-url'),
            type: 'POST',
            dataType: 'json',
            data: {
                rate: rate,
                content: content
            },
            success: function (data, status) {
                if (data.errors.length > 0) {
                    alertify.set('notifier','position', 'bottom-center');
                    alertify.notify(data.errors.join('\n'), 'error', 5);
                    return;
                }

                $(`
                    <li class="media">
                        <a class="pull-left" href="#">
                        <img class="media-object img-circle"
                            src="https://s3.amazonaws.com/uifaces/faces/twitter/kurafire/128.jpg" alt="profile">
                        </a>
                        <div class="media-body">
                            <div class="well well-lg">
                            ${rateHTML}
                            <h4 class="media-heading reviews">
                                ${$('#restaurant-details').data('logged-user')}
                            </h4>
                            <div class="media-date reviews list-inline">
                                przed chwilą
                            </div>
                            <p class="media-comment">${content}</p>
                            <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span
                                class="glyphicon glyphicon-share-alt"></span> Reply</a>
                            </div>
                        </div>
                    </li>
                    `).hide().prependTo('#comments-list').slideDown();
            }
        });
    });
});