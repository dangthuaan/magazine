<td class="user-checkbox" style="text-align: left" data-user-id="{{ $user->id }}">
    <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
        <input type="checkbox" value="" class="m-checkable">
        <span></span>
    </label>
</td>
<td>{{ $user->username }}</td>
<td>{{ $user->first_name }}</td>
<td>{{ $user->last_name }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->joined() }}</td>
<td>
    <span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill">
    Manager
    </span>
</td>

@if ($user->isBlocked())
    @include('admin.users.status.blocked')
@else
    @include('admin.users.status.active')
@endif
