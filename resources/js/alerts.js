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
                })
            }
        });
    });

    $(document).on('click', '.sweetalert_unblock_user', function (e) {
        swal.fire({
            title: 'Are you sure un-blocking user?',
            text: "Let's tell them a reason!",
            type: 'question',
            input: 'textarea',
            inputValidator: (value) => {
                if (!value) {
                    return 'You need to write something!'
                }
            },
            showCancelButton: true,
            confirmButtonText: 'Un-block'
        }).then(function (result) {
            if (result.value) {
                swal.fire({
                    title: 'User has been reactivated!',
                    text: 'Reason :' + result.value,
                    type: 'success'
                })
            }
        });
    });

    $(document).on('click', '.sweetalert_forgot', function (e) {
        swal.fire({
            title: 'Enter your email address and we will send you a reset link?',
            type: 'info',
            input: 'email',
            inputValidator: (value) => {
                if (!value) {
                    return 'You need to write your email address!'
                }
            },
            showCancelButton: true,
            confirmButtonText: 'Send'
        }).then(function (result) {
            if (result.value) {
                swal.fire({
                    title: 'Password reset link has been sent!',
                    type: 'success'
                })
            }
        });
    });

    $(document).on('click', '.sweetalert_block_user', function (e) {
        swal.fire({
            title: 'Are you sure blocking user?',
            text: "If yes, tell them a reason!",
            type: 'warning',
            input: 'textarea',
            inputValidator: (value) => {
                if (!value) {
                    return 'You need to write something!'
                }
            },
            showCancelButton: true,
            confirmButtonText: 'Block'
        }).then(function (result) {
            if (result.value) {
                swal.fire({
                    title: 'Confirmed!',
                    html: 'User has been blocked!' + '<br><br>' + ' Reason :' + result.value,
                    type: 'success'
                })
            }
        });
    });
})
