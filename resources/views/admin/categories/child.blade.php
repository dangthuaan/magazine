<li class="list-group-item category-{{ $category->id }}" style="margin-left: 40px">
    {{ $category->name }}
    <a href="#" class="remove-category"
       data-category-id="{{ $category->id }}">
        <i class="fa fa-trash operator"></i>
    </a>
    <a href="#" class="edit-category"
       data-category-id="{{ $category->id }}">
        <i class="fa fa-edit operator"></i>
    </a>
</li>
