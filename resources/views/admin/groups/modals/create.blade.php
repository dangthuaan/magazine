<!--begin::Modal-->
<div class="modal fade" id="newGroupModal" tabindex="-1" role="dialog" aria-labelledby="newGroupModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newGroupModalLabel">Create New User Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <!--begin::Form-->
                <form method="POST" class="kt-form" id="newGroupModalForm">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name">

                        <span class="invalid-feedback name" role="alert"></span>

                        <span class="form-text text-muted">Choose a name for new user group.</span>
                    </div>
                    <div class="form-group form-group-last">
                        <label for="newGroupTextarea">Description</label>
                        <textarea class="form-control" id="newGroupTextarea" rows="3" name="description"></textarea>

                        <span class="invalid-feedback description" role="alert"></span>

                        <span class="form-text text-muted kt-margin-t-20">New User Group will have no permission. You can change permission at anytime.</span>
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
