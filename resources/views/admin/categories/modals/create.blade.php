<!--begin::Modal-->
<div class="modal fade" id="newCategoryModal" tabindex="-1" role="dialog" aria-labelledby="newCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newCategoryModalLabel">Create New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <!--begin::Form-->
                <form class="kt-form">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control">
                        <span class="form-text text-muted">Choose a name for new category.</span>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelect1">Parent Category</label>
                        <select class="form-control" id="exampleSelect1">
                            <option>Food Habit</option>
                            <option>Science</option>
                            <option>Lifestyle</option>
                            <option>Travel</option>
                        </select>
                    </div>
                    <div class="form-group form-group-last">
                        <label for="exampleTextarea">Description</label>
                        <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
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
