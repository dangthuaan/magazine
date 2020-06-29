<div class="single-latest-post row align-items-center">
    <div class="col-lg-5 post-left">
        <div class="feature-image relative">
            <img class="img-fluid" src="{{ getPostCover($post->user->id, $post->cover) }}" alt="latest post">
        </div>
    </div>
    <div class="col-lg-7 post-right">
        <a href="{{ route('client.posts.show', $post->id) }}">
            <h4>{{ $post->title }}</h4>
        </a>
        <ul class="post-meta">
            <li>
                <a href="javascript:;">
                    <span class="lnr lnr-user"></span>
                    {{ $post->user->full_name }}
                </a>
            </li>
            <li>
                <a href="javascript:;">
                    <span class="lnr lnr-calendar-full"></span>
                    {{ getTranslatedDate($post->created_at) }}
                </a>
            </li>
            <li>
                <a href="javascript:;">
                    <span class="lnr lnr-bubble"></span>
                    {{ $post->comments->count() }} Comments
                </a>
            </li>
        </ul>
        <p class="intro">
            @if (strlen($post->content) > 150)
                {!! substr(strip_tags($post->content, "<br>"), 0, 150) !!}
                <span><a href="{{ route('client.posts.show', $post->id) }}">...Read more</a></span>
            @else
                {!! strip_tags($post->content, "<br>") !!}
            @endif
        </p>
    </div>
</div>
