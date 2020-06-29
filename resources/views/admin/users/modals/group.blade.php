<!--begin::Modal-->
<div class="modal fade" id="assignUserRoleModal" tabindex="-1" role="dialog" aria-labelledby="assignUserRoleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignUserRoleModalLabel">User Group Management</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <!-- begin:: Ajax Loading mask -->
                <div id="edit-modal-ajax-loading" style="display: none;">
                    <img id="ajax-loading-image" src="{{ asset('storage/images/basic/ajax-page-loader.svg') }}"
                         alt="Loading..."/>
                </div>
                <!-- end:: Ajax Loading mask -->

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Set</button>
            </div>
        </div>
    </div>

</div>

<!--end::Modal-->
