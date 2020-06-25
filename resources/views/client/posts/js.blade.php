<script>
    $(document).on('click', '#new-comment', function () {
        let postId = $(this).data('post-id');

        let url = '/post/' + postId + '/store-comment';

        let data = $('.comment-form-wrapper form').serialize();

        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            cache: false,
            success: function (result) {
                if (!result.status) {

                }
            },
            error: function () {

            }
        });
    });
</script>
