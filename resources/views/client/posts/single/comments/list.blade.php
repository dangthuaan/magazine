<div class="comments-area">
    <div class="container">
        <div class="row flex-column">
            <h6>{{ $post->comments()->count() }} Comments</h6>
            <div class="comment-list">
                @foreach ($post->comments->sortByDesc('created_at') as $comment)
                    @include('client.posts.single.comments.each', ['comment' => $comment])
                @endforeach
            </div>

        </div>
    </div>
</div>
