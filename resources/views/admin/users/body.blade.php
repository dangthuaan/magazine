@if (isset($failed))
    <div class="col-xl-12 kt-margin-t-10">
        <div class="alert alert-danger" role="alert">
            Something went wrong!
        </div>
    </div>
@elseif (isset($users) && $users->count() > 0)
    <!--begin: Datatable -->
    <table class="table table-striped- table-bordered table-hover table-checkable"
           id="users_table">
        <thead class="thead-dark">
        <tr>
            <th style="text-align: left">
                <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
                    <input type="checkbox" value="" class="m-group-checkable">
                    <span></span>
                </label>
            </th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Joined</th>
            <th>Role</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr class="each user-{{ $user->id }}">
                @include('admin.users.each')
            </tr>
        @endforeach
        </tbody>
    </table>

    <!--end: Datatable -->
@endif
