require('../css/restaurant_details.scss');
require('../css/stars.scss');
require('../css/comment_box.scss');

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
                    alertify.set('notifier', 'position', 'bottom-center');
                    alertify.notify(data.errors.join('\n'), 'error', 5);
                    return;
                }
                $('#add-comment-row').replaceWith('<div id="new-comment-msg" class="alert alert-info row" role="alert">Komentarz został dodany</div>');
                $(`
                    <li class="media">
                        <a class="pull-left" href="#">
                        <img class="media-object img-circle"
                            src="${$('#restaurant-details').data('avatar-name')}">
                        </a>
                        
                        <div class="media-body">
                            <div class="well well-lg newly-added">
                                <div class="comment-header">
                                     <div class="star-rate">
                                        ${rateHTML}
                                    </div>
                                    <div class="media-date reviews">
                                        przed chwilą
                                    </div>
                                </div>
                                <h4 class="media-heading reviews">
                                    ${$('#restaurant-details').data('logged-user')}
                                </h4>
                                <p class="media-comment">${content}</p>
                                <div class="button-section">
                                    <button type="button" class="btn btn-danger btn-circle text-uppercase
                                        edit-comment-btn"><span class="glyphicon glyphicon-edit"></span> Edytuj
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                    `).hide().prependTo('#comment-list').slideDown('slow');
            }
        });
    });


    $('.edit-comment-btn').click(function () {
        let $commentWell = $(this).parents('.comment-well');

        $commentWell.find('.star-rate').hide();
        $commentWell.find('.star-rate-edit').show();

        $commentWell.find('.media-comment').hide();
        $commentWell.find('.media-comment-edit').show();

        $commentWell.find('.button-section').hide();
        $commentWell.find('.button-section-edit').show();
    });

    $('.abort-edit-btn').click(function () {
        let $commentWell = $(this).parents('.comment-well');

        $commentWell.find('.star-rate-edit').hide();
        $commentWell.find('.star-rate').show();

        $commentWell.find('.media-comment-edit').hide();
        $commentWell.find('.media-comment').show();

        $commentWell.find('.button-section-edit').hide();
        $commentWell.find('.button-section').show();
    });
});