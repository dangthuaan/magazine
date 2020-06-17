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
                            <img src="{{ asset('metronic/media/logos/logo-5.png') }}" alt="logo">
                        </a>
                    </div>
                    <div class="kt-login__signin">
                        <div class="kt-login__head">
                            <h3 class="kt-login__title">Sign In To Magazine</h3>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form class="kt-form" method="POST" action="{{ route('auth.login.authenticate') }}">
                            @csrf
                            <div class="input-group">
                                <input class="form-control @error('username') is-invalid @enderror" type="text"
                                       placeholder="Username or Email" name="username"
                                       autocomplete="off">
                            </div>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="input-group">
                                <input class="form-control @error('password') is-invalid @enderror" type="password"
                                       placeholder="Password" name="password">
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="row kt-login__extra">
                                <div class="col">
                                    <label class="kt-checkbox">
                                        <input type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col kt-align-right">
                                    <a href="{{ route('auth.password') }}" id="kt_login_forgot" class="kt-login__link">Forgot
                                        your Password ?</a>
                                </div>
                            </div>
                            <div class="kt-login__actions">
                                <button id="kt_login_signin_submit"
                                        class="btn btn-brand btn-elevate kt-login__btn-primary">Sign In
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="kt-login__account">
                            <span class="kt-login__account-msg">
                                Don't have an account yet ?
                            </span>
                        &nbsp;&nbsp;
                        <a href="{{ route('auth.register') }}" id="kt_login_signup" class="kt-login__account-link">Sign
                            Up!</a>
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
