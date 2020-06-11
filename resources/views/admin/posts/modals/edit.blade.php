<!--begin::Modal-->
<div class="modal fade" id="editPostModal" tabindex="-1" role="dialog" aria-labelledby="editPostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPostModalLabel">Edit Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <!--begin::Form-->
                <form class="kt-form">
                    <div class="form-group">
                        <label>Cover</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="postCoverFile" style="cursor: pointer;">
                            <label class="custom-file-label post-cover-label" for="postCoverFile" style="cursor: pointer;">Choose file</label>
                        </div>
                        <span class="form-text text-muted cover">Edit or remove your post's cover image (optional).</span>
                        <div class="post-cover-wrapper">
                            <img class="post-cover-preview" src="{{ asset('storage/images/post/cover1.jpg') }}" alt="cover preview" />
                        </div>
                        <div class="remove-post-cover">
                            <button type="button" class="btn btn-danger btn-sm">Remove Cover</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control">
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
                        <label for="exampleTextarea">Content</label>
                        <div class="summernote summernote_post_content"></div>
                    </div>
                </form>

                <!--end::Form-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

<!--end::Modal-->
