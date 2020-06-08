<div class="col-lg-4 sidebar">
    <div class="sidebar-wrapper">
        <div class="single-sidebar-block editors-pick">

            <!-- Editor's pick -->
            <h6 class="title">Editor's Pick</h6>
            <div class="post">
                @include('client.widgets.post.editors_pick')

                <div class="post-lists">
                    @include('client.widgets.post.mini')
                    @include('client.widgets.post.mini')
                    @include('client.widgets.post.mini')
                    @include('client.widgets.post.mini')
                </div>
            </div>
            <!-- End Editor's pick -->

        </div>

        <!-- Square Ads -->
        @include('client.widgets.ads.square')
        <!-- End Square Ads -->

        <!-- Newsletter -->
        @include('client.widgets.newsletter')
        <!-- End Newsletter -->

        <!-- Most Popular -->
        <div class="single-sidebar-block most-popular">
            <h6 class="title">Most Popular</h6>

            @include('client.widgets.post.mini')
            @include('client.widgets.post.mini')
            @include('client.widgets.post.mini')
            @include('client.widgets.post.mini')
        </div>
        <!-- End Most Popular -->

        <!-- Social Networks -->
        <div class="single-sidebar-block social-network">
            @include('client.widgets.social')
        </div>
        <!-- End Social Networks -->

    </div>
</div>
