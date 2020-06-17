$(document).ready(function () {
    $(document).on('change', '.kt-avatar__upload #avatar', function (e) {
        // e.preventDefault();
        //
        // //Get count of selected files
        // var countFiles = $(this)[0].files.length;
        // var imgPath = $(this)[0].value;
        // var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        // var edit_image_holder = $(this).parent().parent().parent().parent().prev();
        //
        // if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
        //     if (typeof (FileReader) != "undefined") {
        //         //loop for each file selected for uploaded.
        //         for (var i = 0; i < countFiles; i++) {
        //             var reader = new FileReader();
        //             reader.onload = function (e) {
        //                 $("<img />", {
        //                     "src": e.target.result,
        //                     "class": "thumb-image"
        //                 }).appendTo(edit_image_holder);
        //             }
        //             reader.readAsDataURL($(this)[0].files[i]);
        //         }
        //         edit_image_holder.show();
        //
        //     } else {
        //         alert("This browser does not support FileReader.");
        //     }
        // }

        readURL(this);
    });

    var avatarHolder = $('.kt-avatar__holder');

    //preview post cover when upload
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                avatarHolder.css('background-image', '');
                avatarHolder.css('background-image', 'url(' + e.target.result + ')');
            };

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
});
