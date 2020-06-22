import {ajaxSetup} from "./ajax.js";

$(document).ready(function () {
    ajaxSetup();

    $('.summernote_post_content').summernote({
        placeholder: 'Your post content..',
        height: 500
    });

    $(document).on('click', '#newPostModal button[type=submit]', function (e) {
        $('#newPostModalForm').submit();
    });

    //show edit post modal
    $(document).on('click', '.edit-post', function () {
        var postId = $(this).data('post-id');

        var url = '/admin/posts/' + postId;

        var data = {
            'post_id': postId
        };

        $.ajax({
            url: url,
            type: 'GET',
            data: data,
            cache: false,
            success: function (result) {
                if (result.status) {
                    var modal = $('#editPostModal');

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
            }
        });
    });

    //submit edit post
    $(document).on('click', '#editPostModal button[type=\'submit\']', function (e) {
        var postId = $(this).parent().prev().find('.editPostModalForm').data('post-id');

        var url = '/admin/posts/' + postId;

        var textData = $('.editPostModalForm.post-' + postId).serializeArray();

        var formData = new FormData();

        if ($("#editPostModal input[name='old_cover']").val() == 'no' && !$('.post-cover-preview.edit').attr('src')) {
            formData.append('cover', null);
        } else if ($('#editPostCoverFile').val() !== '') {
            var files = $("#editPostCoverFile")[0].files;

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
            success: function (result) {
                if (!result.status) {
                    errorMessage();
                }

                updateSuccess();
            },
            error: function (xhr) {
                $('.invalid-feedback').html('');

                $.each(xhr.responseJSON.errors, function (key, value) {
                    $('.invalid-feedback.' + key).show();
                    $('.invalid-feedback.' + key).append('<strong>' + value + '</strong>');
                });
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
        var postId = $(this).data('post-id');

        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'

        }).then(function (result) {
            if (result.value) {
                var url = '/admin/posts/' + postId + '/remove';

                $.ajax({
                    url: url,
                    type: 'POST',
                    cache: false,
                    success: function (result) {
                        if (!result.status) {
                            errorMessage();
                        }

                        Swal.fire({
                            type: 'success',
                            title: 'This post has been temporary removed!',
                            showCancelButton: true,
                            confirmButtonText: 'It\'s a mistake? Revert now!',
                            reverseButtons: true,

                        }).then(function (result) {

                            if (result.value) {
                                var url = '/admin/posts/' + postId + '/remove/restore';

                                $.ajax({
                                    url: url,
                                    type: 'POST',
                                    cache: false,
                                    success: function (result) {
                                        if (!result.status) {
                                            errorMessage();
                                        }

                                        restoreSuccess();
                                    },
                                    error: function () {
                                        errorMessage();
                                    },
                                });
                            } else {
                                location.reload();
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
});
