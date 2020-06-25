<li class="list-group-item category-{{ $category->id }} active kt-margin-t-10">
    <i class="fas fa-fw fa-th-list">
    </i>
    {{ $category->name }}
    <a href="#" class="remove-category"
       data-category-id="{{ $category->id }}">
        <i class="fa fa-trash operator" style="color: #fff"></i>
    </a>
    <a href="#" class="edit-category"
       data-category-id="{{ $category->id }}">
        <i class="fa fa-edit operator" style="color: #fff"></i>
    </a>
</li>
