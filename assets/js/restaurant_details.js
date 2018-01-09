require('../css/restaurant_details.scss');
require('../css/stars.scss');
require('../css/comment_box.scss');

const alertify = require('alertifyjs');

$(document).ready(function () {
    $("#add-review").click(function () {
        let content = $('#addComment').val();
        let rate = $('input[name=form-rate]:checked').val();
        let $dataDiv = $('#restaurant-details');
        $.ajax({
            url: '/comment/add',
            type: 'POST',
            dataType: 'json',
            data: {
                rate: rate,
                content: content,
                restautantId: $dataDiv.data('restaurant-id')
            },
            success: function (data, status) {
                if (data.errors.length > 0) {
                    alertify.set('notifier', 'position', 'bottom-center');
                    alertify.notify(data.errors.join('\n'), 'error', 5);
                    return;
                }
                $('#add-comment-row').hide();
                $('#new-comment-msg').css('display', 'flex');

                let stars = $('#star-rate-new-added').children();
                for (let i = 0; i < rate; ++i) {
                    stars.eq(i).addClass('glyphicon-star');
                }
                for (let i = rate; i < 5; ++i) {
                    stars.eq(i).addClass('glyphicon-star-empty');
                }
                $('#content-new-added').text(content);

                $(`#new-added-comment`).slideDown('slow');
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

    $('.submit-edit-btn').click(function () {
        let $commentWell = $(this).parents('.comment-well');
        let postId = $commentWell.data('post-id');
        let content = $commentWell.find('.media-comment-edit').val();
        let rate = $commentWell.find('.star-rate-edit input[type=radio]:checked').val();

        $.ajax({
            url: '/comment/edit',
            type: 'POST',
            dataType: 'json',
            data: {
                postId: postId,
                newRate: rate,
                newContent: content
            },
            success: function (data, status) {
                if (data.errors.length > 0) {
                    alertify.set('notifier', 'position', 'bottom-center');
                    alertify.notify(data.errors.join('\n'), 'error', 5);
                    return;
                }

                $commentWell.find('.media-comment').text(content);
                $commentWell.find('.star').removeClass('glyphicon-star');
                $commentWell.find('.star').removeClass('glyphicon-star-empty');
                let stars = $commentWell.find('.star-rate').children();
                for (let i = 0; i < rate; ++i) {
                    stars.eq(i).addClass('glyphicon-star');
                }
                for (let i = rate; i < 5; ++i) {
                    stars.eq(i).addClass('glyphicon-star-empty');
                }

                $commentWell.find('.star-rate-edit').hide();
                $commentWell.find('.star-rate').show();

                $commentWell.find('.media-comment-edit').hide();
                $commentWell.find('.media-comment').show();

                $commentWell.find('.button-section-edit').hide();
                $commentWell.find('.button-section').show();
            }
        });
    });
});