<!--begin::Modal-->
<div class="modal fade" id="newPostModal" tabindex="-1" role="dialog" aria-labelledby="newPostModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPostModalLabel">Create New Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <!--begin::Form-->
                <form method="POST" class="kt-form" id="newPostModalForm"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Cover</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input "
                                   id="postCoverFile" name="cover" style="cursor: pointer;" accept=".png, .jpg, .jpeg">
                            <label class="custom-file-label post-cover-label" for="postCoverFile"
                                   style="cursor: pointer;">Choose file</label>
                        </div>
                        <span class="invalid-feedback d-block cover" role="alert"></span>
                        <span class="form-text text-muted cover">Upload your post's cover image (optional).</span>

                        <div class="post-cover-wrapper"></div>
                        <div class="remove-post-cover" style="display: none">
                            <button type="button" class="btn btn-danger btn-sm">Remove Cover</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Title <span style="color: #f6214b;">*</span></label>
                        <input type="text" class="form-control" name="title">
                        <span class="invalid-feedback title" role="alert"></span>
                        <span class="form-text text-muted">Choose a title for post.</span>
                    </div>
                    <div class="form-group">
                        <label for="postCategories">Choose Category</label>
                        <div class="kt-checkbox-list">
                            @foreach ($categories as $selectCategory)
                                @if ($selectCategory->isParent())
                                    <div class="kt-margin-b-10">
                                        <label class="kt-checkbox kt-checkbox--solid">
                                            <input type="checkbox" value="{{ $selectCategory->id }}"
                                                   name="categories[]"><strong>{{ $selectCategory->name }}</strong>
                                            <span></span>
                                        </label>

                                        @if ($selectCategory->childs->count() > 0)
                                            @foreach ($selectCategory->childs as $child)
                                                <div class="row kt-margin-l-5">
                                                    <span>--&nbsp;</span>
                                                    <label class="kt-checkbox kt-checkbox--solid">
                                                        <input type="checkbox" value="{{ $child->id }}"
                                                               name="categories[]">{{ $child->name }}
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
                        <label for="exampleTextarea">Content <span style="color: #f6214b;">*</span></label>
                        <textarea class="summernote summernote_post_content"
                                  name="content">{{ old('content') }}</textarea>
                    </div>
                    <span class="invalid-feedback content" role="alert"></span>
                </form>

                <!--end::Form-->
            </div>
            <div class="modal-footer">
                <!-- begin:: Ajax Loading mask -->
                <div id="create-modal-ajax-loading" style="display: none;">
                    <img id="ajax-loading-image" src="{{ asset('storage/images/basic/ajax-page-loader.svg') }}"
                         alt="Loading..."/>
                </div>
                <!-- end:: Ajax Loading mask -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>

<!--end::Modal-->
