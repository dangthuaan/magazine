<div class="comment-form-wrapper padding-bottom-60">
    <h4>Post Comment</h4>
    <form method="POST" action="{{ route('client.comments.store', $post->id) }}">
        @csrf
        <div class="form-group">
            <textarea class="form-control margin-bottom-10" name="comment" id="comment" rows="5" placeholder="Message"
                      required></textarea>
        </div>
        <div class="avatar">
            <img src="{{ getUserAvatar(Auth::id(), Auth::user()->avatar) }}" alt="user avatar">
        </div>
        <div class="d-inline-block float-left line-height-18">
            <span style="font-weight: bold;">{{ Auth::user()->username }}</span>
            <br>
            <span style="font-size: 0.8em;">{{ Auth::user()->full_name }}</span>
        </div>
        <button type="submit" class="primary-btn text-uppercase float-right">Post Comment</button>
    </form>
</div>
