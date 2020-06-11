$(document).ready(function () {
    //reset all search inputs after click Reset button
    $(document).on('click', '#kt_reset', function (e) {
        $('.search-form input').val('');
        $('.search-form select').prop('selectedIndex', 0);
    });

    //check all children checkbox if parent checkbox is clicked
    $(document).on('click', '.m-group-checkable', function (e) {
        $('.selected-dropdown').fadeToggle();
    });

    //check parent checkbox if all children checkbox is checked, turn selected dropdown after checked
    $(document).on('click', '.m-checkable', function (e) {
        if ($('.m-checkable:checked').length == $('.m-checkable').length) {
            $('.m-group-checkable').prop('checked', true);
        } else {
            $('.m-group-checkable').prop('checked', false);
        }

        if ($('.m-checkable').is(':checked')) {
            $('.selected-dropdown').fadeIn();
        } else {
            $('.selected-dropdown').fadeOut();
        }
    });

    //display selected dropdown if parent checkbox is checked
    $(document).on('click', '.m-group-checkable', function () {
        $('.m-checkable').prop('checked', this.checked);
    });

    $('.btn.advanced-search').on('click', function (event) {
        event.preventDefault();
        $('.search-form').slideToggle();
    });


    //preview post cover when upload
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.post-cover-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $(document).on('change', "#postCoverFile", function () {
        $('.post-cover-wrapper').html('');
        $('.post-cover-wrapper').append("<img class='post-cover-preview' src='' alt='cover preview' />");
        readURL(this);
        $('.remove-post-cover').show();
    });

    //remove cover
    $(document).on('click', '.remove-post-cover button', function () {
        $('#postCoverFile').val('');
        $('.post-cover-wrapper').html('');
        $('.remove-post-cover').hide();
        $('.post-cover-label').text('Choose file');
    });
})
