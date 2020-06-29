<script>
    $(document).on('click', '#newGroup', function (e) {
        e.preventDefault();

        $('#newGroupModalForm').trigger('reset');

        $('#newGroupModal').modal('show');
    });

    $(document).on('click', '#newGroupModal button[type=submit]', function (e) {
        e.preventDefault();

        let url = '/admin/groups';

        let formData = $('#newGroupModalForm').serialize();

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

                if ($('.dataTables_empty').length !== 0) {
                    $('.dataTables_empty').remove();
                }
                $('.list-groups').append(result.html);

                toast("New group has been added!");

                $("#newGroupModal").modal("hide");
            },
            error: function (xhr) {
                toast("Form submission failed!", "error");

                showInvalidFeedBack("#newGroupModalForm", xhr.responseJSON.errors);
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

    //show edit group modal
    $(document).on('click', '.edit-group', function () {
        let roleId = $(this).data('role-id');

        let url = '/admin/groups/' + roleId;

        let data = {
            'role_id': roleId
        };

        $.ajax({
            url: url,
            type: 'GET',
            data: data,
            cache: false,
            success: function (result) {
                if (!result.status) {
                    return errorMessage();
                }

                $('#editGroupModal').html(result.html);

                $('#editGroupModal').modal('show');
            },
            error: function () {
                errorMessage();
            },
        });
    });

    //submit edit post
    $(document).on('click', '#editGroupModal button[type=\'submit\']', function (e) {
        let roleId = $(this).data('role-id');

        let url = '/admin/groups/' + roleId;

        formData = $('#editGroupModalForm').serialize();

        $.ajax({
            url: url,
            type: 'PUT',
            data: formData,
            global: false,
            success: function (result) {
                if (!result.status) {
                    return errorMessage();
                }

                $('.list-groups .group-' + roleId).html(result.html);

                toast("Group has been edited!");

                $("#editGroupModal").modal("hide");
            },
            error: function (xhr) {
                toast("Form submission failed!", "error");

                showInvalidFeedBack("#editGroupModal", xhr.responseJSON.errors);
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

    $(document).on('click', '.remove-group', function (e) {
        e.preventDefault();

        let roleId = $(this).data('role-id');

        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then(function (result) {
            if (result.value) {
                let url = '/admin/groups/' + roleId;

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    cache: false,
                    success: function (result) {
                        if (!result.status) {
                            errorMessage();
                        }

                        $('.list-groups .group-' + roleId).remove();
                    },
                    error: function () {
                        errorMessage();
                    }
                });
            }
        });
    });

    $(document).on('click', '.set-role', function (e) {
        e.preventDefault();

        let roleId = $(this).data('role-id');

        let url = '/admin/groups/' + roleId + '/permissions';

        $.ajax({
            url: url,
            type: 'GET',
            cache: false,
            success: function (result) {
                if (!result.status) {
                    return errorMessage();
                }

                $('#setRoleModal').modal('show');

                $('#setRoleModal').find('.modal-body').html(result.html);
            },
            error: function () {
                return errorMessage();
            },
        });
    });


    $(document).on('click', '#setRoleModal button[type = \'submit\']', function (e) {
        e.preventDefault();

        let roleId = $(this).parent().prev().find('#setRoleModalForm').data('role-id');

        let url = '/admin/groups/' + roleId + '/permissions';

        let permissionData = $('#setRoleModalForm').serialize();

        // $.each($('table.set-role-table .kt-checkbox.kt-checkbox--brand > input:checked'), function () {
        //     permissionData.push(parseInt($(this).val()));
        // });

        $.ajax({
            url: url,
            type: 'POST',
            data: permissionData,
            cache: false,
            global: false,
            success: function (result) {
                if (!result.status) {
                    return errorMessage();
                }

                toast("Group's permissions has been updated!");

                $('#setRoleModal').modal('hide');
            },
            error: function () {
                return errorMessage();
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
</script>
