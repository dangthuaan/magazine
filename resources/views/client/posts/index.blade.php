@extends('client.master')

@section('content')
<!-- Main -->
<div class="site-main-container">

    <!-- Main Top post -->
    <section class="top-post-area padding-top-10">
        <div class="container no-padding">
            <div class="row small-indents">

                <!-- Main Top Breaking News -->
                @include('client.widgets.breaking_news')
                <!-- End Main Top Breaking News -->

            </div>
        </div>
    </section>
    <!-- End Main Top post -->

    <!-- Main Latest post -->
    <section class="latest-post-area margin-top-50 margin-bottom-120">
        <div class="container no-padding">
            <div class="row">

                <div class="col-lg-8 post-list">

                    <!-- Latest news -->
                    <div class="latest-post-wrapper">
                        <h4 class="title">Latest News</h4>

                        @include('client.widgets.post.list')

                        @include('client.widgets.post.list')

                        @include('client.widgets.post.list')

                        @include('client.widgets.post.list')

                        <div class="load-more align-center margin-top-30">
                            <a href="#" class="primary-btn">Load More Posts</a>
                        </div>
                    </div>
                    <!-- End Latest news -->

                </div>

                <!-- Side Bar -->
                @include('client.widgets.sidebar')
                <!-- End Side Bar -->

            </div>
        </div>
    </section>
    <!-- End Main Latest post -->

</div>
<!-- End Main -->
@endsection
