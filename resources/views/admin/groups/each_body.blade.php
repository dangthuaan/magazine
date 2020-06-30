<td>
            <span class="kt-badge kt-badge--brand kt-badge--inline kt-badge--pill">
            {{ $role->name }}
            </span>
</td>
<td>{{ $role->description }}</td>

<td nowrap>
            <span class="dropdown">
               <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown"
                  aria-expanded="true">
               <i class="la la-ellipsis-h"></i>
               </a>
               <div class="dropdown-menu dropdown-menu-right">
                   @can('roles.update')
                       <a class="dropdown-item edit-group" href="#" data-role-id="{{ $role->id }}"><i
                               class="la la-edit"></i> Edit</a>
                       <a class="dropdown-item set-role" href="#" data-role-id="{{ $role->id }}"><i
                               class="la la-list-alt"></i> Set Role</a>
                   @endcan

                   @can('roles.delete')
                       <a class=" dropdown-item remove-group" href="#" data-role-id="{{ $role->id }}"><i
                               class="la la-trash-o"></i> Remove</a>
                   @endcan
               </div>
            </span>
</td>
