<td>
    <span class="kt-badge kt-badge--danger kt-badge--dot"></span>
    &nbsp;
    <span class="kt-font-bold kt-font-danger ">Blocked</span>
</td>
<td nowrap>
   <span class="dropdown">
      <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md"
         data-toggle="dropdown"
         aria-expanded="true">
      <i class="la la-ellipsis-h"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
          @can('profile.view')
              <a class="dropdown-item" href="{{ route('admin.profile.overview', $user->username) }}"><i
                      class="la la-info-circle"></i> Profile</a>
          @endcan

          @can('users.update')
              <a class="dropdown-item sweetalert_unblock_user"
                 href="javascript:;" data-user-id="{{ $user->id ?? $id }}"><i
                      class="la la-unlock-alt"></i> Un-Block</a>
              <a class="dropdown-item assign-user-role"
                 href="javascript:;" data-user-id="{{ $user->id ?? $id }}"><i
                      class="la la-group"></i> Assign Group</a>
          @endcan
      </div>
   </span>
</td>
