import {ajaxSetup} from './ajax.js';

ajaxSetup();

export function blockUser(userIds) {
    $.each(userIds, function (index, value) {
        var url = '/admin/users/block';

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                'user_id': value
            },
            cache: false,
            success: function (result) {
                $('.each.user-' + value).html(result.html);
            }
        });
    });
}

export function unblockUser(userIds) {
    $.each(userIds, function (index, value) {
        var url = '/admin/users/unblock';

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                'user_id': value
            },
            cache: false,
            success: function (result) {
                $('.each.user-' + value).html(result.html);
            }
        });
    });
}



