<div class="single-comment comment-{{ $comment->id }} d-flex justify-content-between padding-bottom-20">
    <div class="user d-flex justify-content-between">
        <div class="avatar">
            <img src="{{ getUserAvatar($comment->user->id, $comment->user->avatar) }}" alt="user avatar"
                 style="width: 60px; height: 60px;">
        </div>
        <div class="content">
            <h5>{{ $comment->user->full_name }}</h5>
            <p class="date">{{ getCreatedFromTime($comment) }}</p>
            <p class="comment-content">
                {{--                <span class="paragraph">{{ $comment->content }}</span>--}}
                {{--                <span class="textarea display-none">--}}
                {{--                    <textarea class="form-control" name="content" id="content" cols="50" rows="3"--}}
                {{--                              required="">{{ $comment->content }}</textarea>--}}
                {{--                    <div class="reply-btn margin-top-10">--}}
                {{--                        <a href="#" class="text-uppercase update" data-comment-id="5">submit</a>--}}
                {{--                        <a href="#" class="text-uppercase out" data-comment-id=5">close</a>--}}
                {{--                    </div>--}}
                {{--                </span>--}}
                {{ $comment->content }}
            </p>
        </div>
    </div>
    @if ($comment->user->id == Auth::id())
        <div class="reply-btn">
            <a href="#" class="text-uppercase edit" data-comment-id="{{ $comment->id }}
                ">edit</a>
            <a href="#" class="text-uppercase remove" data-comment-id="{{ $comment->id }}
                ">remove</a>
        </div>
    @endif
</div>
