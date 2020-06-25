import {blockUser, unblockUser} from './functions.js';

$(document).ready(function () {

    $(document).on('click', '#sweetalert_remove, .sweetalert_remove', function (e) {
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then(function (result) {
            if (result.value) {
                swal.fire({
                    title: 'Removed!',
                    type: 'success'
                });
            }
        });
    });

    //block user
    $(document).on('click', '.sweetalert_block_user', function () {
        var userIds = $.makeArray($(this).data('user-id'));

        swal.fire({
            title: 'Are you sure blocking user?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Block'
        }).then(function (result) {
            if (result.value) {
                //ajax
                blockUser(userIds);
            }
        });
    });

    //unblock user
    $(document).on('click', '.sweetalert_unblock_user', function () {
        var userIds = $.makeArray($(this).data('user-id'));

        swal.fire({
            title: 'Are you sure un-blocking user?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Un-block'
        }).then(function (result) {
            if (result.value) {
                //ajax
                unblockUser(userIds);
            }
        });
    });

    //block many users
    $(document).on('click', '.sweetalert_block_users', function () {
        var userIds = getUserChecked();

        swal.fire({
            title: 'Are you sure blocking these users?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Block'
        }).then(function (result) {
            if (result.value) {
                //ajax
                blockUser(userIds);
            }
        });
    });

    //unblock many users
    $(document).on('click', '.sweetalert_unblock_users', function () {
        var userIds = getUserChecked();

        swal.fire({
            title: 'Are you sure un-blocking these users?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Un-block'
        }).then(function (result) {
            if (result.value) {
                //ajax
                unblockUser(userIds);
            }
        });
    });

    //get all checked users
    function getUserChecked() {
        var selected = [];

        $('.user-checkbox input:checked').each(function () {
            selected.push($(this).parent().parent().data('user-id'));
        });

        return selected;
    }
});
