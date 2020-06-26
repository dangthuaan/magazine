<script>
    $(document).on('click', '#newCategory', function (e) {
        e.preventDefault();

        let url = '/admin/categories/new';

        $.ajax({
            url: url,
            type: 'GET',
            cache: false,
            success: function (result) {
                if (!result.status) {
                    return errorMessage();
                }

                $('#newCategoryModal').modal('show');

                $('#newCategoryModal').html(result.html);

            },
            error: function () {
                return errorMessage();
            }
        });
    });

    $(document).on('click', '#newCategoryModal button[type=\'submit\']', function (e) {
        e.preventDefault();

        let url = '/admin/categories';

        let formData = $('#newCategoryModalForm').serialize();

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            cache: false,
            global: false,
            success: function (result) {
                if (!result.status) {
                    errorMessage();
                }
                console.log(result.parentId, result.html);

                if (result.parentId == null) {
                    $('.all-categories').append(result.html);
                } else {
                    $('.all-categories .parent.category-' + result.parentId).find('.child').append(result.html);
                }

                toast("New category has been created!");

                $("#newCategoryModal").modal("hide");
            },
            error: function (xhr) {
                toast("Form submission failed!", "error");

                showInvalidFeedBack("#newCategoryModalForm", xhr.responseJSON.errors);

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

    $(document).on('click', '.edit-category', function (e) {
        e.preventDefault();

        let categoryId = $(this).data('category-id');

        let url = '/admin/categories/' + categoryId;

        let data = {
            'category_id': categoryId
        };

        $.ajax({
            url: url,
            type: 'GET',
            data: data,
            cache: false,
            success: function (result) {
                if (result.status) {
                    let data = result.data;
                    let modal = $('#editCategoryModal');
                    let editSelect = modal.find("select[name='parent_id']");

                    editSelect.html('');
                    editSelect.append("<option selected=\"selected\" value=\"null\">This is Parent Category</option>"
                    )
                    ;

                    $.each(result.categories, function (index, item) {
                        editSelect.append("<option value=" + item.id + ">" + item.name + "</option>");
                    });

                    if (data.parent_id != null) {
                        editSelect.find('option[value="' + data.parent_id + '"]').attr("selected", "selected");
                    }

                    modal.find("input[name='name']").val(data.name);

                    modal.find("textarea[name='description']").val(data.description);

                    modal.find("button[type='submit']").attr("data-category-id", categoryId);

                    modal.modal('show');
                }
            },
            error: function () {
                errorMessage();
            }
        });
    });

    $(document).on('click', '#editCategoryModal button[type=\'submit\']', function (e) {
        e.preventDefault();

        let categoryId = $(this).data('category-id');

        let url = '/admin/categories/' + categoryId;

        let data = $('#editCategoryModalForm').serialize();

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            cache: false,
            global: false,
            success: function (result) {
                if (!result.status) {
                    errorMessage();
                }

                toast("Category has been edited!");

                $("#editCategoryModal").modal("hide");

                $('.all-categories').html(result.html);
            },
            error: function (xhr) {
                toast("Form submission failed!", "error");

                showInvalidFeedBack("#editCategoryModalForm", xhr.responseJSON.errors);

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

    $(document).on('click', '.remove-category', function (e) {
        e.preventDefault();

        let categoryId = $(this).data('category-id');

        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then(function (result) {
            if (result.value) {
                let url = '/admin/categories/' + categoryId;

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    cache: false,
                    success: function (result) {
                        if (!result.status) {
                            errorMessage();
                        }

                        $('.all-categories').html(result.html);
                    },
                    error: function () {
                        errorMessage();
                    }
                });
            }
        });
    });
</script>
