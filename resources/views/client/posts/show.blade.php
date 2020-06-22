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

                    <!-- Single Post -->
                    <div class="col-lg-8 post-list">
                        <div class="single-post-wrapper">

                            <!-- Single Post block with comments -->
                        @include('client.widgets.post.single')
                        <!-- End Single Post block with comments -->

                            <!-- Comment form -->
                        @include('client.widgets.comment.form')
                        <!-- End Comment form -->

                        </div>

                    </div>
                    <!-- End Single Post -->

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
