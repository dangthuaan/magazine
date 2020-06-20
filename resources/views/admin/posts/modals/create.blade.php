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
                <form method="POST" action="{{ route('admin.posts.store') }}" class="kt-form">
                    @csrf
                    <div class="form-group">
                        <label>Cover</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('cover') is-invalid @enderror"
                                   id="postCoverFile" name="cover" style="cursor: pointer;" accept=".png, .jpg, .jpeg">
                            <label class="custom-file-label post-cover-label" for="postCoverFile"
                                   style="cursor: pointer;">Choose file</label>
                        </div>
                        <span class="form-text text-muted cover">Upload your post's cover image (optional).</span>
                        @error('cover')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <div class="post-cover-wrapper">
                            <img class="post-cover-preview" src="{{ asset('storage/images/post/cover1.jpg') }}"
                                 alt="cover preview"/>
                        </div>
                        <div class="remove-post-cover">
                            <button type="button" class="btn btn-danger btn-sm">Remove Cover</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Title <span style="color: #f6214b;">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title">
                        <span class="form-text text-muted">Choose a title for post.</span>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="exampleSelect1">Choose Category</label>
                        <select class="form-control" id="exampleSelect1">
                            <option disabled="" selected="">
                                Select Category
                            </option>
                            <option>Food Habit</option>
                            <option>Science</option>
                            <option>Lifestyle</option>
                            <option>Travel</option>
                        </select>
                        <span class="form-text text-muted">Default category: Uncategorized</span>
                    </div>
                    <div class="form-group form-group-last">
                        <label for="exampleTextarea">Content <span style="color: #f6214b;">*</span></label>
                        <div class="summernote summernote_post_content"></div>
                    </div>
                </form>

                <!--end::Form-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>

<!--end::Modal-->
