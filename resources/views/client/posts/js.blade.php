<script>
    //create new comment
    $(document).on('click', '#new-comment', function (e) {
        e.preventDefault();

        let postId = $(this).data('post-id');

        let url = '/post/' + postId + '/comment';

        let data = $('.comment-form-wrapper form').serialize();

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            cache: false,
            success: function (result) {
                if (!result.status) {
                    errorServer();
                }

                $('.comment-list').prepend(result.each).hide().fadeIn();

                let count = parseInt($('.comments-number:first .count').text());

                $('.comments-number .count').text(count + 1);
            },
            error: function () {
                errorClient();
            }
        });
    });

    //remove comment
    $(document).on('click', '.single-comment .remove', function (e) {
        e.preventDefault();

        let commentId = $(this).data('comment-id');

        //ask
        swal.fire({
            title: 'Are you sure delete this comment?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'

        }).then(function (result) {
            //remove
            if (result.value) {
                let url = '/comment/' + commentId;

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    cache: false,
                    success: function (result) {
                        if (!result.status) {
                            return errorServer();
                        }

                        $('.single-comment.comment-' + commentId).fadeOut(function () {
                            $(this).remove();
                        });

                        let count = parseInt($('.comments-number:first .count').text());

                        $('.comments-number .count').text(count - 1);
                    },
                    error: function () {
                        return errorClient();
                    }
                });
            }
        });
    });

    //edit comment
    $(document).on('click', '.single-comment .edit', function (e) {
        e.preventDefault();

        let commentId = $(this).data('comment-id');

        let url = '/comment/' + commentId;

        let comment = $('.single-comment.comment-' + commentId);

        let commentContent = comment.find('.comment-content').text();

        $.ajax({
            url: url,
            type: 'GET',
            cache: false,
            success: function (result) {
                if (!result.status) {
                    return errorServer();
                }

                let textareaHtml = "<textarea class=\'form-control\' name=\'content\' id=\'content\' cols=\'50\' rows=\'3\' required>" + result.content + "</textarea>";

                let editControlHtml = "<div class=\'reply-btn margin-top-10\'> <a href=\'#\' class=\'text-uppercase update\' data-comment-id=\" " + commentId + "\">submit</a> <a href=\'#\' class=\'text-uppercase out\' data-comment-id=\"" + commentId + "\">close</a> </div>"

                let errorHTML = "<span class=\"invalid-feedback content\" role=\"alert\"></span>";

                comment.find('.comment-content').html(textareaHtml + errorHTML + editControlHtml);

                $(document).on('click', '.single-comment .out', function (e) {
                    e.preventDefault();

                    closeEditComment(comment, commentContent);
                });

                $(document).on('click', '.single-comment .update', function (e) {
                    e.preventDefault();

                    updateComment(commentId, comment);
                });
            },
            error: function () {
                return errorClient();
            }
        });
    });

    function closeEditComment(comment, commentContent) {
        comment.find('.comment-content').text(commentContent);
    }

    //update edit comment
    function updateComment(id, comment) {
        let url = '/comment/' + id;

        let data = {
            'content': comment.find('.comment-content textarea').val(),
        }

        $.ajax({
            url: url,
            type: 'PUT',
            data: data,
            cache: false,
            success: function (result) {
                if (!result.status) {
                    return errorServer();
                }

                comment.find('.comment-content').text(data.content);
            },
            error: function (xhr) {
                $('.invalid-feedback').html('');

                $.each(xhr.responseJSON.errors, function (key, value) {
                    let invalid = $('.invalid-feedback.' + key);

                    invalid.show();
                    invalid.append('<span class="weight-600">' + value + '</span>');
                });
            }
        });
    }
</script>
