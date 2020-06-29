@extends('client.master')

@section('content')
    <!-- Main -->
    <div class="site-main-container">

        <!-- Main Top post -->
        <section class="top-post-area padding-top-10">
            <div class="container no-padding">
                <div class="row small-indents">

                    <!-- Main Top left post -->
                    <div class="col-lg-8 top-post-left">

                        @include('client.home.feature', ['post' => $featuredPosts->get(0)])
                    </div>
                    <!-- End Main Top post left -->

                    <!-- Main Top right posts -->
                    <div class="col-lg-4 top-post-right">
                        <!-- Main Top right post above -->
                        <div class="single-top-post relative">
                            @include('client.home.feature', ['post' => $featuredPosts->get(1)])
                        </div>
                        <!-- End Main Top right post above -->

                        <!-- Main Top right post under -->
                        <div class="single-top-post relative margin-top-10">
                            @include('client.home.feature', ['post' => $featuredPosts->get(2)])
                        </div>
                        <!-- End Main Top right post under -->
                    </div>
                    <!-- End Main Top right posts -->

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

                        </div>
                        <!-- End Latest news -->

                        <!-- Rectangle Ads -->
                        <div class="col-lg-12 ads-wrapper margin-top-30 margin-bottom-30">
                            @include('client.widgets.ads.rectangle')
                        </div>
                        <!-- End Rectangle Ads -->

                        <!-- Popular posts -->
                        <div class="popular-post-wrapper">
                            <h4 class="title">Popular Posts</h4>

                            <div class="feature-post relative">
                                @include('client.widgets.post.popular')
                            </div>

                            <div class="row margin-top-20 medium-indents">
                                @include('client.widgets.post.popular_more')

                                @include('client.widgets.post.popular_more')
                            </div>

                        </div>
                        <!-- End Popular posts -->

                        <!-- Relevant Stories -->
                        <div class="latest-post-wrapper margin-top-30">
                            <h4 class="title">Relevant Stories</h4>

                            @include('client.widgets.post.list')

                            @include('client.widgets.post.list')

                            @include('client.widgets.post.list')

                            @include('client.widgets.post.list')

                        </div>
                        <!-- End Relevant Stories -->

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
