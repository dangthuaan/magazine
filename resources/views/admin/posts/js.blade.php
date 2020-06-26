<script>
    $('.summernote_post_content').summernote({
        placeholder: 'Your post content..',
        height: 500
    });

    $(document).on('click', '#newPost', function (e) {
        e.preventDefault();

        let url = "/admin/posts/new";

        $.ajax({
            url: url,
            type: 'GET',
            cache: false,
            success: function (result) {
                $('#newPostModal').modal('show');

                $('#newPostModal').html(result.html);

                $('#newPostModal').find("textarea[name='content']").summernote({
                    placeholder: 'Your post content here..',
                    height: 500
                });
            },
            error: function () {
                return errorMessage();
            },
        });
    });

    $(document).on('click', '#newPostModal button[type=submit]', function (e) {
        e.preventDefault();

        let url = '/admin/posts';

        let formData = new FormData();

        let textData = $('#newPostModalForm').serializeArray();

        if ($('#newPostModalForm input[type=\'file\']').val() !== '') {
            let file = $('#newPostModalForm input[type=\'file\']')[0].files;
            formData.append('cover', file[0]);
        }

        $(textData).each(function (index, element) {
            formData.append(element.name, element.value);

        });

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            global: false,
            success: function (result) {
                if (!result.status) {
                    errorMessage();
                }

                $('.all-posts').prepend(result.html);

                toast("New post has been created!");

                $("#newPostModal").modal("hide");
            },
            error: function (xhr) {
                toast("Form submission failed!", "error");

                showInvalidFeedBack("#newPostModalForm", xhr.responseJSON.errors);

                scrollToDiv($('.modal'), "invalid-feedback." + Object.keys(xhr.responseJSON.errors)[0]);
            },
            beforeSend: function () {
                $('#create-modal-ajax-loading').slideDown();
                $('#dom-disabled').show();
            },
            complete: function () {
                $('#create-modal-ajax-loading').slideUp();
                $('#dom-disabled').hide();
            }
        });
    });

    //show edit post modal
    $(document).on('click', '.edit-post', function () {
        let postId = $(this).data('post-id');

        let url = '/admin/posts/' + postId;

        let data = {
            'post_id': postId
        };

        $.ajax({
            url: url,
            type: 'GET',
            data: data,
            cache: false,
            success: function (result) {
                if (result.status) {
                    let modal = $('#editPostModal');

                    modal.find(".modal-body").html(result.html);

                    modal.find("textarea[name='content']").summernote({
                        placeholder: '',
                        height: 500
                    });

                    modal.modal('show');
                }
            },
            error: function () {
                errorMessage();
            },
        });
    });

    //submit edit post
    $(document).on('click', '#editPostModal button[type=\'submit\']', function (e) {
        let postId = $(this).parent().prev().find('.editPostModalForm').data('post-id');

        let url = '/admin/posts/' + postId;

        let textData = $('.editPostModalForm.post-' + postId).serializeArray();

        let formData = new FormData();

        if ($('#editPostCoverFile').val() !== '') {
            let files = $("#editPostCoverFile")[0].files;
            formData.append('cover', files[0]);
        }

        $(textData).each(function (index, element) {
            formData.append(element.name, element.value);
        });

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            global: false,
            success: function (result) {
                if (!result.status) {
                    return errorMessage();
                }

                $('.kt-notes__item.post-' + postId).html(result.html);

                toast("Post has been edited!");

                $("#editPostModal").modal("hide");
            },
            error: function (xhr) {
                toast("Form submission failed!", "error");

                showInvalidFeedBack("#editPostModal", xhr.responseJSON.errors);

                scrollToDiv($('.modal'), "invalid-feedback." + Object.keys(xhr.responseJSON.errors)[0]);
            },
            beforeSend: function () {
                $('#edit-modal-ajax-loading').slideDown();
                $('#dom-disabled').show();
            },
            complete: function () {
                $('#edit-modal-ajax-loading').slideUp();
                $('#dom-disabled').hide();
            }
        });
    });

    //remove new post cover
    $(document).on('click', '.remove-post-cover button', function () {
        $('#postCoverFile').val('');
        $('.post-cover-wrapper').html('');
        $('.remove-post-cover').hide();
        $('.post-cover-label').text('Choose file');

        $(this).parent().prev().val('no');
    });

    //remove edit post cover
    $(document).on('click', '.remove-post-cover.edit button', function () {
        $('#editPostCoverFile').val('');
        $('.edit-post-cover-wrapper').html('');
        $('.remove-post-cover.edit').hide();
        $('.post-cover-label').text('Choose file');

        $(this).parent().prev().val('no');
    });

    //remove and restore post
    $(document).on('click', '.remove-post', function (e) {
        e.preventDefault();

        let postId = $(this).data('post-id');

        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'

        }).then(function (result) {
            if (result.value) {
                let url = '/admin/posts/' + postId + '/remove';

                $.ajax({
                    url: url,
                    type: 'POST',
                    cache: false,
                    success: function (result) {
                        if (!result.status) {
                            errorMessage();
                        }

                        $('.kt-notes__item.post-' + postId).empty();

                        $('.kt-notes__item.post-' + postId).css('display', 'none');

                        Swal.fire({
                            type: 'success',
                            title: 'This post has been temporary removed!',
                            showCancelButton: true,
                            confirmButtonText: 'It\'s a mistake? Revert now!',
                            reverseButtons: true,

                        }).then(function (result) {

                            if (result.value) {
                                let url = '/admin/posts/' + postId + '/remove/restore';

                                $.ajax({
                                    url: url,
                                    type: 'POST',
                                    cache: false,
                                    success: function (result) {
                                        if (!result.status) {
                                            errorMessage();
                                        }

                                        $('.kt-notes__item.post-' + postId).show();
                                        $('.kt-notes__item.post-' + postId).html(result.html)
                                    },
                                    error: function () {
                                        errorMessage();
                                    },
                                });
                            }
                        });
                    },

                    error: function () {
                        errorMessage();
                    }
                });
            }
        });
    });

    //search posts
    $(document).on('click', '#search-post', function (e) {
        e.preventDefault();

        let inputString = $(this).parent().prev().val();

        findPosts(inputString);
    });

    $(document).on('keypress', '#search-post-input', function (e) {
        if (((e.keyCode || e.which) === 13) && !e.shiftKey) {
            e.preventDefault();

            let inputString = $(this).val();

            findPosts(inputString);
        }
    });

    //find posts function
    function findPosts(inputString) {
        let url = '/admin/posts/search?search=' + inputString;

        $.ajax({
            url: url,
            type: 'GET',
            cache: false,
            success: function (result) {
                if (!result.status) {
                    return errorMessage();
                }

                $('.all-posts').html(result.html);
            },
            error: function () {
                return errorMessage();
            }
        });
    };
</script>
