<!--begin::Modal-->
<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog"
     aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <!--begin::Form-->
                <form class="kt-form" id="editCategoryModalForm">
                    @csrf
                    <div class="validation-errors"></div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name"
                               value="">
                        <span class="invalid-feedback name" role="alert"></span>

                        <span class="form-text text-muted">Choose a name for new category.</span>

                    </div>
                    <div class="form-group">
                        <label for="editSelect">Parent Category</label>
                        <select class="form-control" id="editSelect"
                                name="parent_id">
                        </select>
                        <span class="invalid-feedback parent_id" role="alert"></span>
                    </div>
                    <div class="form-group form-group-last">
                        <label for="exampleTextarea">Description</label>
                        <textarea class="form-control" id="exampleTextarea"
                                  name="description" rows="3"></textarea>

                        <span class="invalid-feedback description" role="alert"></span>
                    </div>
                </form>

                <!--end::Form-->
            </div>
            <div class="modal-footer">
                <!-- begin:: Ajax Loading mask -->
                <div id="edit-modal-ajax-loading" style="display: none;">
                    <img id="ajax-loading-image" src="{{ asset('storage/images/basic/ajax-page-loader.svg') }}"
                         alt="Loading..."/>
                </div>
                <!-- end:: Ajax Loading mask -->

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>
