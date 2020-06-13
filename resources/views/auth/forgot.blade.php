<!DOCTYPE html>
<html lang="en">

@include('admin.includes.head')

<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page Loading mask -->
    <div id="loading">
        <img id="loading-image" src="{{ asset('storage/images/basic/page-loader.svg') }}" alt="Loading..." />
    </div>
    <!-- end:: Page Loading mask -->

    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(/metronic/media//bg/bg-3.jpg);">
                <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                    <div class="kt-login__container">
                        <div class="kt-login__logo">
                            <a href="#">
                                <img src="{{ asset('metronic/media/logos/logo-5.png') }}">
                            </a>
                        </div>
                        <div>
                            <div class="kt-login__head">
                                <h3 class="kt-login__title">Password Reset</h3>
                                <div class="kt-login__desc">Enter your email address and we will send you a reset link</div>
                            </div>
                            <form class="kt-form" action="">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
                                </div>
                                <div class="kt-login__actions">
                                    <button id="kt_login_signup_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Send Password Reset Email</button>
                                </div>
                            </form>
                        </div>
                        <div class="kt-login__account">
                            <a href="{{ route('admin.login') }}" class="kt-login__account-link">Go back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Page -->

    <!-- begin::Script -->
    @include('admin.includes.script')
    <!-- end::Script -->

    <script>
        $(window).ready(function() {
            $('#loading').fadeOut();
        });
    </script>

    @yield('js')

</body>
<!-- end::Body -->

</html>
