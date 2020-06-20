@extends('admin.master')

@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
        <!-- begin:: Content Head -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">User Manager > Users</h3>
            </div>
        </div>
        <!-- end:: Content Head -->

        <!-- begin:: Ajax Loading mask -->
        <div id="ajax-loading" style="display: none; margin-bottom: -25px;">
            <img id="ajax-loading-image" src="{{ asset('storage/images/basic/ajax-page-loader.svg') }}"
                 alt="Loading..."/>
        </div>
        <!-- end:: Ajax Loading mask -->

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
                                      method="GET" action="{{ route('admin.users.search') }}">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control"
                                               placeholder="Search for...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="la la-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">

                    @if (isset($failed))
                        <div class="col-xl-12 kt-margin-t-10">
                            <div class="alert alert-danger" role="alert">
                                Something went wrong!
                            </div>
                        </div>
                    @elseif (isset($users) && $users->count() > 0)
                    <!--begin: Datatable -->
                        <table class="table table-striped- table-bordered table-hover table-checkable"
                               id="kt_table">
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
                </div>
            </div>
        </div>

        <!-- end:: Content -->
    </div>
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
    </script>
@endsection
