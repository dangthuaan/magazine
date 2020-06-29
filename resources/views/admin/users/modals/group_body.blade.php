<!--begin::Section-->
<form method="POST" id="assignUserRoleModalForm" data-user-id="{{ $user->id }}">
    @csrf
    <div class="kt-section">
<span class="kt-section__info">
                        Assign group for this user.
                        <br>
                        <br>
                        <strong>User name:</strong> {{ $user->username }}
                    </span>
        <div class="kt-section__content">
            <table class="table assign-role-table">
                <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Group Name</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>
                            <label class="kt-checkbox kt-checkbox--brand">
                                <input type="checkbox" name="roles[]"
                                       value="{{ $role->id }}"
                                       @if ($user->roles->contains('id', $role->id)) checked @endif>
                                <span></span>
                            </label>
                        </td>
                        <td>
                            {{ $role->name }}
                        </td>
                        <td>
                            {{ $role->description }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</form>

<!--end::Section-->
