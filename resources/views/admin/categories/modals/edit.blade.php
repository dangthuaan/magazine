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
                <form class="kt-form">
                    @csrf
                    <div class="validation-errors"></div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name"
                               value="">
                        <span class="form-text text-muted">Choose a name for new category.</span>

                        <span class="invalid-feedback name" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="editSelect">Parent Category</label>
                        <select class="form-control" id="editSelect"
                                name="parent_id">
                        </select>

                        <span class="invalid-feedback parent_id" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                    <div class="form-group form-group-last">
                        <label for="exampleTextarea">Description</label>
                        <textarea class="form-control" id="exampleTextarea"
                                  name="description" rows="3"></textarea>

                        <span class="invalid-feedback description" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </form>

                <!--end::Form-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-category-id="">Update</button>
            </div>
        </div>
    </div>
</div>

<!--end::Modal-->

@if ($errors->any())
@section('js')
    <script>
        $(document).ready(function () {
            $('#editCategoryModal').modal('show');
        });
    </script>
@endsection
@endif
