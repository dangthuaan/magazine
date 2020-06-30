<div class="kt-notes__dropdown">
    <a href="#" class="btn btn-sm btn-icon-md btn-icon"
       data-toggle="dropdown">
        <i class="flaticon-more-1 kt-font-brand"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        <ul class="kt-nav">
            @can('posts.update', $post)
                <li class="kt-nav__item">
                    <a class="kt-nav__link edit-post" data-post-id="{{ $post->id }}">
                        <i class="kt-nav__link-icon flaticon2-edit"></i>
                        <span class="kt-nav__link-text">Edit</span>
                    </a>
                </li>
            @endcan

            @can('posts.delete', $post)
                <li class="kt-nav__item">
                    <a href="javascript:;"
                       class="kt-nav__link remove-post" data-post-id="{{ $post->id }}">
                        <i class="kt-nav__link-icon flaticon2-trash"></i>
                        <span class="kt-nav__link-text">Remove</span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</div>
