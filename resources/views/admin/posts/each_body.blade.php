<div class="kt-notes__media">
    <img class="kt-hidden-"
         src="{{ getPostCover($post->user->id, $post->cover) }}"
         alt="image">
</div>
<div class="kt-notes__content">
    <div class="kt-notes__section">
        <div class="kt-notes__info">
            <a href="{{ route('client.posts.show', $post->id) }}"
               class="kt-notes__title">
                {{ $post->title }}
            </a>
            <span class="kt-notes__desc">
                                                    {{ getCreatedFromTime($post) }}
                                                </span>
            @if (isNew($post->created_at))
                <span
                    class="kt-badge kt-badge--success kt-badge--inline">new</span>
            @endif
            @if ($post->categories->count() > 0)
                @foreach ($post->categories as $postCategory)
                    <span
                        class="kt-badge kt-badge--danger kt-badge--inline">{{ $postCategory->name }}</span>
                @endforeach
            @else
                <span
                    class="kt-badge kt-badge--primary kt-badge--inline">Uncategorized</span>
            @endif
        </div>
        @include('admin.posts.controls')
    </div>
    <span class="kt-notes__body">
{{--                                            {!! strtok(strip_tags($post->content, "<br>"), ".") !!}--}}
        @if (strlen($post->content) > 500)
            {!! substr(strip_tags($post->content, "<br>"), 0, 500) !!}
            <span><a href="{{ route('client.posts.show', $post->id) }}">...Read more</a></span>
        @else
            {!! strip_tags($post->content, "<br>") !!}
        @endif
                                                </span>
</div>
