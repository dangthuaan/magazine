@extends('admin.master')

@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
        <!-- begin:: Content Head -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">User Manager > Groups</h3>
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
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-group"></i>
                    </span>
                        <h3 class="kt-portlet__head-title">
                            All User Groups
                        </h3>
                    </div>

                    @can('roles.create')
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">
                                    &nbsp;
                                    <a href="javascript:;" class="btn btn-brand add-new btn-elevate btn-icon-sm"
                                       id="newGroup">
                                        <i class="la la-plus"></i>
                                        New Group
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endcan

                </div>
                <div class="kt-portlet__body list-group">
                    @include('admin.groups.body')
                </div>
            </div>
        </div>

        <!-- end:: Content -->
    </div>

    @include('admin.groups.modals.create')
    @include('admin.groups.modals.edit')
    @include('admin.groups.modals.role')

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
        $('.kt-menu__item.groups').addClass('kt-menu__item--active');

        //groups table
        $('#groups_table').DataTable({
            responsive: true,

            // DOM Layout settings
            dom: `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

            lengthMenu: [5, 10, 25, 50],

            pageLength: 10,

            columnDefs: [
                {
                    targets: 2,
                    width: '5px'
                }
            ],
        });
    </script>
    @include('admin.groups.js')
@endsection
