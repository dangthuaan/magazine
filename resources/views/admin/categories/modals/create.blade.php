<!--begin::Modal-->
<div class="modal fade" id="newCategoryModal" tabindex="-1" role="dialog" aria-labelledby="newCategoryModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newCategoryModalLabel">Create New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <!--begin::Form-->
                <form method="POST" class="kt-form"
                      id="newCategoryModalForm">
                    @csrf

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name">
                        <span class="form-text text-muted">Choose a name for new category.</span>

                        <span class="invalid-feedback name" role="alert"></span>
                    </div>
                    <div class="form-group">
                        <label for="newSelect">Parent Category</label>
                        <select class="form-control" id="newSelect"
                                name="parent_id">
                            <option disabled="disabled" selected="selected">Choose Parent Category</option>
                            <option value="null">New Parent category</option>

                            @foreach ($categories as $selectCategory)
                                @if ($selectCategory->isParent())
                                    <option value="{{ $selectCategory->id }}">{{ $selectCategory->name }}</option>
                                @endif
                            @endforeach
                        </select>

                        <span class="invalid-feedback parent_id" role="alert"></span>
                    </div>
                    <div class="form-group form-group-last">
                        <label for="categoryDescription">Description</label>
                        <textarea class="form-control" id="categoryDescription"
                                  name="description" rows="3"></textarea>

                        <span class="invalid-feedback description" role="alert"></span>
                    </div>
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
