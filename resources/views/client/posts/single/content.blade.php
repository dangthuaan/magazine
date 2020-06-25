@if (!is_null($post->cover))
    <div class="feature-image-thumb relative">
        <img class="img-fluid" src="{{ getPostCover($post->user->id, $post->cover) }}" alt="single post">
    </div>
@endif
<div class="content-wrapper">
    <ul class="post-tag margin-top-10">
        @if ($post->categories()->count() > 0)
            @foreach ($post->categories as $postCategory)
                <li>
                    <a href="#">{{ $postCategory->name }}</a>
                </li>
            @endforeach
        @else
            <li>
                <a href="#">Uncategorized</a>
            </li>
        @endif
    </ul>

    <a href="{{ route('client.posts.show', $post->id) }}">
        <h3>{{ $post->title }}</h3>
    </a>

    <ul class="post-meta padding-bottom-20">
        <li>
            <a href="#">
                <span class="lnr lnr-user"></span>
                {{ $post->user->full_name }}
            </a>
        </li>
        <li>
            <a href="#">
                <span class="lnr lnr-calendar-full"></span>
                {{ getTranslatedDate($post->created_at) }}
            </a>
        </li>
        <li>
            <a href="#">
                <span class="lnr lnr-bubble"></span>
                {{ $post->comments()->count() }} Comments
            </a>
        </li>
    </ul>

    <p>
        {!! $post->content !!}
    </p>


    <div class="navigation-wrapper d-flex justify-content-between clear-both">
        @if (!is_null($previous))
            <a href="{{ route('client.posts.show', $previous) }}" class="prev">
                <span class="lnr lnr-arrow-left"></span>
                Prev Post
            </a>
        @endif

        @if (!is_null($next))
            <a href="{{ route('client.posts.show', $next) }}" class="next">
                Next Post
                <span class="lnr lnr-arrow-right"></span>
            </a>
        @endif
    </div>

@auth
    <!-- Comment form -->
    @include('client.posts.single.comments.form')
    <!-- End Comment form -->
@endauth

<!-- List all comment -->
@include('client.posts.single.comments.list')
<!-- End List all comment -->

</div>
