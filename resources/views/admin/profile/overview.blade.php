@extends('admin.master')

@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
        <!-- begin:: Content Head -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">My Profile > Personal Information</h3>
            </div>

            <!-- begin:: Ajax Loading mask -->
            <div id="ajax-loading" style="display: none; margin-bottom: -25px;">
                <img id="ajax-loading-image" src="{{ asset('storage/images/basic/ajax-page-loader.svg') }}"
                     alt="Loading..."/>
            </div>
            <!-- end:: Ajax Loading mask -->

        </div>
        <!-- end:: Content Head -->

        <!-- begin:: Content -->
        <div class="kt-content kt-grid__item kt-grid__item--fluid main-profile" id="kt_content">
            @include('admin.profile.main')
        </div>

        <!-- end:: Content -->

        @endsection

        @section('js')
            <script type="text/javascript">
                $('.kt-menu__item').removeClass('kt-menu__item--active');
                $('.kt-menu__item.profile').addClass('kt-menu__item--active');

                $('.kt-widget__item.personal_info').addClass('kt-widget__item--active');

                $(document).on('click', '#updateProfileForm button[type=\'submit\']', function (e) {
                    e.preventDefault();

                    scrollToTop();

                    let username = $(this).data('username');

                    let url = '/admin/profile/' + username;

                    let formData = new FormData();

                    let textData = $('#updateProfileForm').serializeArray();

                    if ($('#updateProfileForm input[type=\'file\']').val() !== '') {
                        let file = $('#updateProfileForm input[type=\'file\']')[0].files;
                        formData.append('avatar', file[0]);
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

                            toast("Your profile has been updated!");

                            $('.main-profile').html(result.html);

                            $('.kt-widget__item.personal_info').addClass('kt-widget__item--active');
                        },
                        error: function (xhr) {
                            toast("Form submission failed!", "error");

                            showInvalidFeedBack("#updateProfileForm", xhr.responseJSON.errors);

                            scrollToDiv($('#updateProfileForm'), "invalid-feedback." + Object.keys(xhr.responseJSON.errors)[0]);
                        }
                    });
                });

                $(document).on('change', '.kt-avatar__upload #avatar', function (e) {
                    readAvatar(this);
                });

                //preview post cover when upload
                function readAvatar(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('.kt-avatar__holder').css('background-image', '');
                            $('.kt-avatar__holder').css('background-image', 'url(' + e.target.result + ')');
                        };

                        reader.readAsDataURL(input.files[0]); // convert to base64 string
                    }
                }
            </script>
@endsection
