<!--begin::Modal-->
<div class="modal fade" id="newGroupModal" tabindex="-1" role="dialog" aria-labelledby="newGroupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newGroupModalLabel">Create New User Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <!--begin::Form-->
                <form class="kt-form">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control">
                        <span class="form-text text-muted">Choose a name for new user group.</span>
                    </div>
                    <div class="form-group form-group-last">
                        <label for="exampleTextarea">Description</label>
                        <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                        <span class="form-text text-muted kt-margin-t-20">New User Group will only have View permission. You can change permission at anytime.</span>
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
