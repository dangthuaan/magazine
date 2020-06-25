@extends('admin.master')

@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
        <!-- begin:: Content Head -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Dashboard</h3>
            </div>
        </div>

        <!-- end:: Content Head -->
    </div>
@endsection

@section('js')
    <!--begin::Page Vendors(used by this page) -->
    <script src="{{ asset('metronic/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}"
            type="text/javascript"></script>
    <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM"
            type="text/javascript"></script>
    <script src="{{ asset('metronic/vendors/custom/gmaps/gmaps.js') }}" type="text/javascript"></script>

    <!--end::Page Vendors -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="{{ asset('metronic/js/demo1/pages/dashboard.js') }}" type="text/javascript"></script>

    <!--end::Page Scripts -->

    <script type="text/javascript">
        $('.kt-menu__item').removeClass('kt-menu__item--active');
        $('.kt-menu__item.kt-menu__item--submenu').removeClass('kt-menu__item--open');
        $('.kt-menu__item.dashboard').addClass('kt-menu__item--active');
    </script>
@endsection
