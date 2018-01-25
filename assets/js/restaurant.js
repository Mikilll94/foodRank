require('../css/restaurant.scss');
require('../css/stars.scss');
require('../css/comment_box.scss');
require('../css/rating_stats.scss');

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
                restaurantId: $dataDiv.data('restaurant-id')
            },
            success: function (data, status) {
                if (data.errors.length > 0) {
                    alertify.set('notifier', 'position', 'bottom-center');
                    alertify.notify(data.errors.join('\n'), 'error', 5);
                    return;
                }

                $('.newly-added.comment-well').data('post-id', data.id);
                let stars = $('#star-rate-new-added').children();
                for (let i = 0; i < rate; ++i) {
                    stars.eq(i).addClass('glyphicon-star');
                }
                for (let i = rate; i < 5; ++i) {
                    stars.eq(i).addClass('glyphicon-star-empty');
                }
                $('#content-new-added, #content-new-added-edit').text(content);

                let $starRateMewAddedEdit = $('#star-rate-new-added-edit');
                $starRateMewAddedEdit.children('input').each(function (index, element) {
                    element.setAttribute('id', element.getAttribute('id').replace('{id}', data.id));
                    element.setAttribute('name', element.getAttribute('name').replace('{id}', data.id));
                });
                $starRateMewAddedEdit.children('label').each(function (index, element) {
                    element.setAttribute('for', element.getAttribute('for').replace('{id}', data.id));
                });

                $starRateMewAddedEdit.children(`input[value=${rate}]`).prop('checked', true);

                $('#add-comment-row').hide();
                $('#new-comment-msg').css('display', 'flex');
                $(`#new-added-comment`).slideDown('slow');
            }
        });
    });


    $('.edit-comment-btn').click(function () {
        let $commentWell = $(this).parents('.comment-well');

        $commentWell.find('.star-rate').hide();
        $commentWell.find('.star-rate-edit').css('display', 'flex');

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