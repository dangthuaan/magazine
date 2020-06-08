<!-- Header Menu Bar -->
<div class="container menu-bar">

    <!-- Header Menu Bar -->
    <div class="row align-items-center justify-content-between">
        <nav class="display-none" id="menu-bar-collapse">
            <button type="button">
                <i class="lnr lnr-menu"></i>
                <span class="menu-title">Menu</span>
            </button>
        </nav>
        <nav id="menu-bar-normal">
            <ul class="menu-list">
                <li>
                    <a href="{{ route('client.index') }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('client.posts.index') }}">Posts</a>
                </li>
            </ul>
        </nav>
        <div class="menu-right">
            <form class="menu-search form-inline" method="GET" action="search_result.html">
                <div class="form-group collapsed">
                    <input type="text" class="form-control search-box" name="search" placeholder="Search...">
                </div>
                <div class="form-group">
                    <button type="submit" class="search-submit">
                        <span class="lnr lnr-magnifier"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Header Menu Bar -->

    <!-- Header Menu Bar Responsive -->
    <nav id="collapse-menu">
        <ul>
            <li>
                <a href="{{ route('client.index') }}">Home</a>
            </li>
            <li>
                <a href="{{ route('client.posts.index') }}">Posts</a>
            </li>
            <li>
                <a href="#" data-toggle="modal" data-target="#loginModal">Login</a>
            </li>
            <li>
                <a href="#" data-toggle="modal" data-target="#registerModal">Register</a>
            </li>
        </ul>
    </nav>
    <!-- End Header Menu Bar Responsive -->

    <!-- Dim screen when click collapsed menu -->
    <div class="display-none" id="dim-screen"></div>

</div>
<!-- End Header Menu Bar -->
