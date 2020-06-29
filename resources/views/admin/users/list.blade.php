@extends('admin.master')

@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
        <!-- begin:: Content Head -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">User Manager > Users</h3>
            </div>

            <!-- begin:: Ajax Loading mask -->
            <div id="ajax-loading" style="display: none; margin-bottom: -25px;">
                <img id="ajax-loading-image" src="{{ asset('storage/images/basic/ajax-page-loader.svg') }}"
                     alt="Loading..."/>
            </div>
            <!-- end:: Ajax Loading mask -->
        </div>
        <!-- end:: Content Head -->

        <!-- begin:: Content -->
        <div class="kt-content  kt-grid__item kt-grid__item--fluid transition" id="kt_content">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-user"></i>
                    </span>
                        <h3 class="kt-portlet__head-title">
                            All Users
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">
                                <div class="dropdown dropdown-inline selected-dropdown" style="display: none;">
                                    <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="la la-calendar-check-o"></i> Selected
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="kt-nav">
                                            <li class="kt-nav__section kt-nav__section--first">
                                                <span class="kt-nav__section-text">Choose an option</span>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="javascript:;" class="kt-nav__link sweetalert_block_users">
                                                    <i class="kt-nav__link-icon la la-unlock"></i>
                                                    <span class="kt-nav__link-text">Block</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="javascript:;" class="kt-nav__link sweetalert_unblock_users">
                                                    <i class="kt-nav__link-icon la la-unlock-alt"></i>
                                                    <span class="kt-nav__link-text">Un-Block</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                &nbsp;
                                <form class="kt-form kt-form--label-right search-form" style="display:inline-block;"
                                      method="GET">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" id="search-user-input"
                                               placeholder="Search for...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" id="search-user" type="submit"><i
                                                    class="la la-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body list-user">
                    @include('admin.users.body')
                </div>
            </div>
        </div>

        <!-- end:: Content -->
    </div>

    @include('admin.users.modals.group')

@endsection

@section('css')
    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="{{ asset('metronic/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
          type="text/css"/>
    <!--end::Page Vendors -->
@endsection

@section('js')
    <!--begin::Page Vendors(used by this page) -->
    <script src="{{ asset('metronic/vendors/custom/datatables/datatables.bundle.js') }}"
            type="text/javascript"></script>

    <!--end::Page Vendors -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="{{ asset('metronic/js/demo1/pages/crud/datatables/basic/basic.js') }}" type="text/javascript"></script>

    <!--end::Page Scripts -->

    <script type="text/javascript">
        $('.kt-menu__item').removeClass('kt-menu__item--active');
        $('.kt-menu__item.kt-menu__item--submenu.user-manager').addClass('kt-menu__item--open');
        $('.kt-menu__item.users').addClass('kt-menu__item--active');

        //find users
        function findUsers(inputString) {
            let url = '/admin/users/search?search=' + inputString;

            $.ajax({
                url: url,
                type: 'GET',
                cache: false,
                success: function (result) {
                    if (!result.status) {
                        return errorMessage();
                    }

                    $('.list-user').html(result.html);

                    refreshDataTable('users_table', 'id');
                },
                error: function () {
                    return errorMessage();
                }
            });
        };

        //search users
        $(document).on('click', '#search-user', function (e) {
            e.preventDefault();

            let inputString = $(this).parent().prev().val();

            findUsers(inputString);
        });

        $(document).on('click', '.assign-user-role', function (e) {
            let userId = $(this).data('user-id');

            let url = '/admin/users/' + userId + '/roles';

            $.ajax({
                url: url,
                type: 'GET',
                cache: false,
                success: function (result) {
                    if (!result.status) {
                        return errorMessage();
                    }

                    $('#assignUserRoleModal').find('.modal-body').html(result.html);

                    $('#assignUserRoleModal').modal('show');
                },
                error: function () {
                    return errorMessage();
                }
            });
        });

        $(document).on('click', '#assignUserRoleModal button[type=\'submit\']', function (e) {
            e.preventDefault();

            let userId = $(this).parent().prev().find('#assignUserRoleModalForm').data('user-id');

            let url = '/admin/users/' + userId + '/roles';

            let formData = $('#assignUserRoleModalForm').serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                cache: false,
                global: false,
                success: function (result) {
                    if (!result.status) {
                        return errorMessage();
                    }

                    toast("User Group assigned successfully!");

                    $('#assignUserRoleModal').modal('hide');
                },
                error: function () {
                    return errorMessage();
                },
                beforeSend: function () {
                    $('#edit-modal-ajax-loading').slideDown();
                    $('#dom-disabled').show();
                },
                complete: function () {
                    $('#edit-modal-ajax-loading').slideUp();
                    $('#dom-disabled').hide();
                }
            });
        });

        $(document).on('keypress', '#search-user-input', function (e) {
            if (((e.keyCode || e.which) === 13) && !e.shiftKey) {
                e.preventDefault();

                let inputString = $(this).val();

                findUsers(inputString);
            }
        });

        //users table
        $('#users_table').DataTable({
            responsive: true,
            "order": [[5, "desc"]],

            // DOM Layout settings
            dom: `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

            lengthMenu: [5, 10, 25, 50],

            pageLength: 10,

            columnDefs: [
                {
                    targets: 0,
                    width: '5px',
                    className: 'sorting_disabled',
                    orderable: false,
                },
            ],
        });

    </script>
@endsection
