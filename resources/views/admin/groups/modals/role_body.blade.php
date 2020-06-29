<!--begin::Section-->
<form method="POST" id="setRoleModalForm" data-role-id="{{ $role->id }}">
    @csrf
    <div class="kt-section">
<span class="kt-section__info">
                        Set role for this group.
                        <br>
                        <strong>Group name:</strong> {{ $role->name }} <br><br>
                        <strong>All Permissions:</strong> Create, Read, Update, Delete
                        <br>
                    </span>
        <div class="kt-section__content">
            <table class="table set-role-table">
                <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Create</th>
                    <th>Read</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($permissions->chunk(4) as $permissionsChunked)
                    <tr>
                        <th scope="row">{{ explode(' ', $permissionsChunked->pluck('name')[0])[0] }} Management</th>

                        @foreach ($permissionsChunked as $permission)
                            <td>
                                <label class="kt-checkbox kt-checkbox--brand">
                                    <input type="checkbox" name="permissions[]"
                                           value="{{ $permission->id }}"
                                           @if ($permission->isException()) disabled
                                           @endif @if ($role->permissions->contains('id', $permission->id)) checked @endif>
                                    <span></span>
                                </label>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</form>

<!--end::Section-->
