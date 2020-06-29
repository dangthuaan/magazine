<div class="feature-image-thumb relative">
    <img class="img-fluid" src="{{ getPostCover($post->user->id, $post->cover) }}" alt="top-post-left">
</div>
<div class="top-post-details">
    <ul class="post-tag">
        @if ($post->categories->count() > 0)
            @foreach ($post->categories as $postCategory)
                <li>
                    <a href="javascript:;">
                        {{ $postCategory->name }}
                    </a>
                </li>
            @endforeach
        @else
            <li>
                <a href="javascript:;">Uncategorized</a>
            </li>
        @endif
    </ul>
    <a href="{{ route('client.posts.show', $post->id) }}">
        <h3>{{ $post->title }}</h3>
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
</div>
