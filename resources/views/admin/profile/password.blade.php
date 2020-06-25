@extends('admin.master')

@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
        <!-- begin:: Content Head -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">My Profile > Change Password</h3>
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
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

            <!--Begin::App-->
            <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

                <!--Begin:: App Aside Mobile Toggle-->
                <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                    <i class="la la-close"></i>
                </button>

                <!--End:: App Aside Mobile Toggle-->

                <!--Begin:: App Aside-->
            @include('admin.profile.aside')

            <!--End:: App Aside-->

                <!--Begin:: App Content-->
                <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="kt-portlet kt-portlet--height-fluid">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">Change Password<small>Change or Reset your
                                                account password</small></h3>
                                    </div>
                                </div>

                                @if (session('success'))
                                    <div class="col-xl-12 kt-margin-t-10">
                                        <div class="alert alert-success" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="col-xl-12 kt-margin-t-10">
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('error') }}
                                        </div>
                                    </div>
                                @endif

                                <form method="POST" class="kt-form kt-form--label-right" id="resetPasswordForm">
                                    @csrf
                                    @method('PUT')
                                    <div class="kt-portlet__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-section__body">
                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h3 class="kt-section__title kt-section__title-sm">Change Or
                                                            Recover Your Password:</h3>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Current
                                                        Password</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input type="password" name="current_password"
                                                               class="form-control"
                                                               value=""
                                                               placeholder="Current password" required>
                                                        <span class="invalid-feedback current_password"
                                                              role="alert"></span>
                                                        <a href="javascript:;"
                                                           class="kt-link kt-font-sm kt-font-bold kt-margin-t-5 sweetalert_forgot">Forgot
                                                            password ?</a>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">New Password</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input type="password"
                                                               class="form-control"
                                                               value="" name="new_password"
                                                               placeholder="New password" required>
                                                        <span class="invalid-feedback new_password"
                                                              role="alert"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group form-group-last row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Verify
                                                        Password</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input type="password" class="form-control" value=""
                                                               name="new_password_confirmation"
                                                               placeholder="Verify password" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__foot">
                                        <div class="kt-form__actions">
                                            <div class="row">
                                                <div class="col-lg-12 col-xl-12">
                                                    <button type="submit" class="btn btn-brand btn-bold float-left"
                                                            data-user-id="{{ Auth::id() }}">
                                                        Change
                                                        Password
                                                    </button>&nbsp;
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!--End:: App Content-->
            </div>

            <!--End::App-->
        </div>

        <!-- end:: Content -->

    </div>


@endsection

@section('js')
    <script>
        $('.kt-menu__item').removeClass('kt-menu__item--active');
        $('.kt-menu__item.profile').addClass('kt-menu__item--active');

        $('.kt-widget__item.change_password').addClass('kt-widget__item--active');

        $(document).on('click', '.sweetalert_forgot', function (e) {
            e.preventDefault();

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
                    let url = '/admin/profile/forgot-password';

                    let data = {
                        'email': result.value,
                    }

                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: data,
                        cache: false,
                        success: function (result) {
                            console.log(result.email, result.status, typeof result.email !== "undefined");
                            if (typeof result.email !== "undefined" && !result.email) {
                                return wrongEmail();
                            } else if (typeof result.email === "undefined" && !result.status) {
                                return errorMessage();
                            } else {
                                swal.fire({
                                    title: 'Password reset link has been sent to your email!',
                                    type: 'success'
                                });
                            }
                        },
                        error: function (xhr) {
                            if (xhr.responseJSON.errors.email) {
                                swal.fire({
                                    title: 'You must enter valid email!',
                                    type: 'error'
                                });
                            }
                        }
                    });
                }
            });
        });

        $(document).on('click', '#resetPasswordForm button[type=\'submit\']', function (e) {
            e.preventDefault();

            let url = '/admin/profile/password';

            let data = $('#resetPasswordForm').serialize();

            $.ajax({
                url: url,
                type: 'PUT',
                data: data,
                cache: false,
                success: function (result) {
                    if (!result.status) {
                        return errorMessage();
                    }

                    swal.fire({
                        title: 'Your password has been changed!',
                        type: 'success'
                    });

                    $('#resetPasswordForm').trigger("reset");

                    $('.invalid-feedback').hide();

                },
                error: function (xhr) {
                    $('#resetPasswordForm').trigger("reset");

                    $.each(xhr.responseJSON.errors, function (key, value) {
                        $('.invalid-feedback').html('');

                        let invalid = $('.invalid-feedback.' + key);

                        invalid.show();
                        invalid.append('<strong>' + value[0] + '</strong>');
                    });
                }
            });
        });
    </script>
@endsection
