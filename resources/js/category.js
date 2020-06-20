import {ajaxSetup} from './ajax.js';

$(document).ready(function () {
    ajaxSetup();

    $(document).on('click', '.edit-category', function () {
        var categoryId = $(this).data('category-id');

        var url = '/admin/categories/' + categoryId;

        var data = {
            'category_id': categoryId
        };

        $.ajax({
            url: url,
            type: 'GET',
            data: data,
            cache: false,
            success: function (result) {
                if (result.status) {
                    var data = result.data;
                    var modal = $('#editCategoryModal');
                    var editSelect = modal.find("select[name='parent_id']");

                    editSelect.html('');
                    editSelect.append("<option selected=\"selected\">This is Parent Category</option>");

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

    $(document).on('click', '#editCategoryModal button[type=\'submit\']', function () {
        var categoryId = $(this).data('category-id');

        var url = '/admin/categories/' + categoryId;

        var data = $('#editCategoryModal form').serialize();

        $.ajax({
            url: url,
            type: 'PUT',
            data: data,
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

    $(document).on('click', '.remove-category', function (e) {
        var categoryId = $(this).data('category-id');

        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then(function (result) {
            if (result.value) {
                var url = '/admin/categories/' + categoryId;

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    cache: false,
                    success: function (result) {
                        if (!result.status) {
                            errorMessage();
                        }

                        removeSuccess();
                    },
                    error: function () {
                        errorMessage();
                    }
                });
            }
        });
    });
});
