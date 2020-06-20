<span class="dropdown">
    <a href="#"
       class="btn btn-sm btn-clean btn-icon btn-icon-md"
       data-toggle="dropdown" aria-expanded="true">
        <i class="la la-ellipsis-h"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item edit-category" data-category-id="{{ $category->id }}"><i
                class="la la-edit"></i> Edit</a>
        <a class="dropdown-item remove-category" data-category-id="{{ $category->id }}"><i
                class="la la-trash"></i> Remove</a>
    </div>
</span>

