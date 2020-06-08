<div class="feature-image-thumb relative">
    <img class="img-fluid" src="{{ asset('storage/images/post/popular1.jpg') }}" alt="single post">
</div>
<div class="content-wrapper">
    <ul class="post-tag margin-top-10">
        <li>
            <a href="#">Food Habit</a>
        </li>
    </ul>

    <a href="#">
        <h3>A Discount Toner Cartridge Is Better Than Ever.</h3>
    </a>

    <ul class="post-meta padding-bottom-20">
        <li>
            <a href="#">
                <span class="lnr lnr-user"></span>
                Mark Taylor
            </a>
        </li>
        <li>
            <a href="#">
                <span class="lnr lnr-calendar-full"></span>
                03 April, 2018
            </a>
        </li>
        <li>
            <a href="#">
                <span class="lnr lnr-bubble"></span>
                06 Comments
            </a>
        </li>
    </ul>

    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
    </p>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus.
    </p>

    <blockquote>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
    </blockquote>

    <div class="navigation-wrapper d-flex justify-content-between">
        <a href="#" class="prev">
            <span class="lnr lnr-arrow-left"></span>
            Prev Post
        </a>
        <a href="#" class="next">
            Next Post
            <span class="lnr lnr-arrow-right"></span>
        </a>
    </div>

    <!-- List all comment -->
    @include('client.widgets.comment.list')
    <!-- End List all comment -->

</div>
