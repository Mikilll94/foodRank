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
                            ${rateHTML}
                            <h4 class="media-heading reviews">
                                ${$('#restaurant-details').data('logged-user')}
                            </h4>
                            <div class="media-date reviews list-inline">
                                przed chwilą
                            </div>
                            <p class="media-comment">${content}</p>
                        </div>
                    </li>
                    `).hide().prependTo('#comment-list').slideDown('slow');
            }
        });
    });


    $('.edit-comment-btn').click(function () {
        let $commentWell = $(this).closest('.comment-well');
        $commentWell.find('.star-rate').replaceWith(`
            <div class="form_rate">
               <input type="radio" id="form_rate_5" name="randNo" value="5">
               <label for="randNo123_5" class="required"></label>
               <input type="radio" id="randNo123_4" name="randNo123" value="4">
               <label for="randNo123_4" class="required"></label>
               <input type="radio" id="randNo123_3" name="randNo123" value="3">
               <label for="randNo123_3" class="required"></label>
               <input type="radio" id="randNo123_2" name="randNo123" value="2">
               <label for="randNo123_2" class="required"></label>
               <input type="radio" id="randNo123_1" name="randNo123" value="1">
               <label for="randNo123_1" class="required"></label>
            </div>
        `);

        $commentWell.find('.media-comment')
            .replaceWith(`<textarea class="media-comment form-control">${$commentWell.find('.media-comment').text()}</textarea>`);

        $commentWell.find('.button-section')
            .replaceWith(`
                <div class="button-section">
                    <button type="button" class="btn btn-success btn-circle text-uppercase"
                        id="reply"><span class="glyphicon glyphicon-ok"></span> Zatwierdź zmiany</button>
                    <button type="button" class="btn btn-danger btn-circle text-uppercase" 
                        id="reply"><span class="glyphicon glyphicon-remove"></span> Porzuć</button>
                </div>
            `);
    });
});