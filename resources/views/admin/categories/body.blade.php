@foreach ($categories as $category)
    @if ($category->isParent())
        <div class="parent category-{{ $category->id }}">
            @include('admin.categories.parent')

            <div class="child">
                @if ($category->childs->count() > 0)
                    @foreach ($category->childs as $child)
                        @include('admin.categories.child', ['category' => $child])
                    @endforeach
                @endif
            </div>
        </div>
    @endif
@endforeach
