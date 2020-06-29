@extends('client.master')

@section('content')
    <!-- Main -->
    @if ($posts->count() > 0)
        <div class="site-main-container">

            <!-- Main Top post -->
            @if ($featured->count() > 2)
                <section class="top-post-area padding-top-10">

                    <div class="container no-padding">
                        <div class="row small-indents">

                            <!-- Main Top left post -->
                            <div class="col-lg-8 top-post-left">

                                @include('client.home.feature', ['post' => $posts->get(0)])
                            </div>
                            <!-- End Main Top post left -->


                            <!-- Main Top right posts -->
                            <div class="col-lg-4 top-post-right">
                                <!-- Main Top right post above -->
                                <div class="single-top-post relative">
                                    @include('client.home.feature', ['post' => $posts->get(1)])
                                </div>
                                <!-- End Main Top right post above -->

                                <!-- Main Top right post under -->
                                <div class="single-top-post relative margin-top-10">
                                    @include('client.home.feature', ['post' => $posts->get(2)])
                                </div>
                                <!-- End Main Top right post under -->
                            </div>
                            <!-- End Main Top right posts -->

                        </div>
                    </div>
                </section>
        @endif
        <!-- End Main Top post -->

            <!-- Main Latest post -->
            <section class="latest-post-area margin-top-50 margin-bottom-120">
                <div class="container no-padding">
                    <div class="row">

                        <div class="col-lg-8 post-list">

                            <!-- Latest news -->
                            <div class="latest-post-wrapper">
                                <h4 class="title">More Latest Posts</h4>

                                @foreach ($featured->count() > 2 ? $posts->slice(3)->sortByDesc('created_at') : $posts->sortByDesc('created_at') as $post)

                                    @include('client.home.each_post', ['post' => $post])

                                @endforeach

                            </div>
                            <!-- End Latest news -->

                        </div>

                        <!-- Side Bar -->
                    @include('client.home.sidebar_2')
                    <!-- End Side Bar -->

                    </div>
                </div>
            </section>
            <!-- End Main Latest post -->
        </div>
    @else
        <div class="site-main-container">
            <section class="top-post-area padding-top-10 text-center">
                Nothing here..
            </section>
        </div>
    @endif
    <!-- End Main -->
@endsection
