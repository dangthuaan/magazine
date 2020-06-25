@foreach ($categories as $category)
    @if ($category->isParent())
        <div class="parent category-{{ $category->id }}">
            @include('admin.categories.parent')

            @if ($category->childs->count() > 0)
                <div class="child">
                    @foreach ($category->childs as $child)
                        @include('admin.categories.child', ['category' => $child])
                    @endforeach
                </div>
            @endif
        </div>
    @endif
@endforeach
