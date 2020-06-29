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
    @if ($user->roles->count() > 0)
        @foreach ($user->roles as $userRole)
            <span class="kt-badge kt-badge--primary kt-badge--inline kt-badge--pill kt-margin-t-5">
                {{ $userRole->name }}
            </span>
        @endforeach
    @else
        <span class="kt-badge kt-badge--dark kt-badge--inline kt-badge--pill kt-margin-t-5">
                Undefined
            </span>
    @endif
</td>

@if ($user->isBlocked())
    @include('admin.users.status.blocked')
@else
    @include('admin.users.status.active')
@endif
