<!DOCTYPE html>
<html lang="en">

@include('admin.includes.head')

<!-- begin::Body -->

<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page Loading mask -->
<div id="loading">
    <img id="loading-image" src="{{ asset('storage/images/basic/page-loader.svg') }}" alt="Loading..."/>
</div>
<!-- end:: Page Loading mask -->

<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
             style="background-image: url(/metronic/media//bg/bg-3.jpg);">
            <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                <div class="kt-login__container">
                    <div class="kt-login__logo">
                        <a href="#">
                            <img src="{{ asset('metronic/media/logos/logo-5.png') }}">
                        </a>
                    </div>
                    <div>
                        <div class="kt-login__head">
                            <h3 class="kt-login__title">Reset your Password</h3>
                            <div class="kt-login__desc">Enter your new password</div>
                        </div>

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form class="kt-form" method="POST" action="{{ route('auth.password.reset', $token) }}">
                            @csrf
                            <div class="input-group">
                                <input class="form-control @error('password') is-invalid @enderror" type="password"
                                       placeholder="Password" name="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group">
                                <input class="form-control" type="password" placeholder="Confirm Password"
                                       name="password_confirmation">
                            </div>
                            <div class="kt-login__actions">
                                <button id="kt_login_signup_submit"
                                        class="btn btn-brand btn-elevate kt-login__btn-primary">Reset Password
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="kt-login__account">
                        <a href="{{ route('auth.login') }}" class="kt-login__account-link">Go back</a>
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
    $(window).ready(function () {
        $('#loading').fadeOut();
    });
</script>

@yield('js')

</body>
<!-- end::Body -->

</html>
