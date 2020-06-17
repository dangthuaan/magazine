<!-- Header top -->
<div class="header-top">
    <div class="container">
        <div class="row">

            <!-- Header Top left-->
            <div class="col-lg-6 col-md-6 col-sm-6 col-6 align-left no-padding">
                <ul>
                    <li>
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-basketball-ball"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-behance"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Header Top left -->

            <!-- Header Top right -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-6 align-right no-padding">
                <ul>
                    @guest
                        <li>
                            <a href="{{ route('auth.login') }}">
                                <span>Login</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('auth.register') }}">
                                <span>Register</span>
                            </a>
                        </li>
                    @endguest

                    @auth
                        <li>
                            <a href="{{ route('admin.index') }}">
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('auth.logout') }}">
                                <span>Logout</span>
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
            <!-- End Header Top right-->

        </div>
    </div>
</div>
<!-- End Header Top -->

@include('client.widgets.modals.login')
@include('client.widgets.modals.register')
@include('client.widgets.modals.forgot_password')
