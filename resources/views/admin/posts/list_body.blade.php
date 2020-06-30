@foreach ($posts->where('user.id', Auth::id()) as $post)
    @include('admin.posts.each')
@endforeach
