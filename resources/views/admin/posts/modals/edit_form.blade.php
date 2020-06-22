<!--begin::Form-->
<form method="POST" class="kt-form editPostModalForm post-{{ $post->id }}"
      enctype="multipart/form-data" data-post-id="{{ $post->id }}">
    @csrf
    <div class="form-group">
        <label>Cover</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="editPostCoverFile" name="cover" style="cursor: pointer;"
                   accept=".png, .jpg, .jpeg">
            <label class="custom-file-label post-cover-label" for="editPostCoverFile"
                   style="cursor: pointer;">Choose file</label>
        </div>
        <span
            class="form-text text-muted cover">Edit or remove your post's cover image (optional).</span>

        <span class="invalid-feedback cover" role="alert">
                            <strong></strong>
                        </span>
        <div class="edit-post-cover-wrapper">
            <img class="post-cover-preview edit"
                 @if (is_null($post->cover)) style="display: none"
                 @endif src="{{ getPostCover($post->user->id, $post->cover) }}"
                 alt="cover preview"/>
        </div>

        <input type="hidden" name="old_cover" value="yes">

        <div class="remove-post-cover edit" @if (is_null($post->cover)) style="display: none"
            @endif>
            <button type="button" class="btn btn-danger btn-sm remove-cover">Remove Cover</button>
        </div>
    </div>
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title" value="{{ $post->title }}">

        <span class="invalid-feedback title" role="alert">
                            <strong></strong>
                        </span>
    </div>
    <div class="form-group">
        <label for="exampleSelect1">Choose Category</label>
        <div class="kt-checkbox-list">
            @foreach ($categories as $selectCategory)
                @if ($selectCategory->isParent())
                    <div class="kt-margin-b-10">
                        <label class="kt-checkbox kt-checkbox--solid">
                            <input type="checkbox" value="{{ $selectCategory->id }}"
                                   name="categories[]"
                                   @if ($selectCategory->isPostCategories($post)) checked @endif><strong>{{ $selectCategory->name }}</strong>
                            <span></span>
                        </label>

                        @if ($selectCategory->childs()->count() > 0)
                            @foreach ($selectCategory->childs as $child)
                                <div class="row kt-margin-l-5">
                                    <span>--&nbsp;</span>
                                    <label class="kt-checkbox kt-checkbox--solid">
                                        <input type="checkbox" value="{{ $child->id }}"
                                               name="categories[]"
                                               @if ($child->isPostCategories($post)) checked @endif>{{ $child->name }}
                                        <span></span>
                                    </label>
                                </div>
                            @endforeach
                        @endif
                    </div>
                @endif
            @endforeach
        </div>
        <span class="form-text text-muted">Default category: Uncategorized</span>
    </div>
    <div class="form-group form-group-last">
        <label for="exampleTextarea">Content</label>
        <textarea class="summernote summernote_post_content"
                  name="content">{{ $post->content }}</textarea>
        <span class="invalid-feedback content" role="alert">
                            <strong></strong>
                        </span>
    </div>
</form>

<!--end::Form-->
