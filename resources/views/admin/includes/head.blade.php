<!-- begin::Head -->

<head>


    <!--end::Base Path -->
    <meta charset="utf-8"/>
    <title>Magazine</title>
    <meta name="description" content="Updates and statistics">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--end::Fonts -->

@yield('css')

<!--begin::Page Vendors Styles(used by this page) -->
    <link href="{{ asset('metronic/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
          type="text/css"/>

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="{{ asset('metronic/css/demo1/pages/general/login/login-3.css') }}" rel="stylesheet" type="text/css"/>

    <!--end::Page Custom Styles -->

    <!--end::Page Vendors Styles -->

    <!--begin:: Global Mandatory Vendors -->
    <link href="{{ asset('metronic/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet"
          type="text/css"/>

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <link href="{{ asset('metronic/vendors/general/tether/dist/css/tether.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('metronic/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('metronic/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('metronic/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('metronic/vendors/general/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('metronic/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('metronic/vendors/general/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('metronic/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('metronic/vendors/general/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('metronic/vendors/general/ion-rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('metronic/vendors/general/nouislider/distribute/nouislider.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('metronic/vendors/general/owl.carousel/dist/assets/owl.carousel.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('metronic/vendors/general/owl.carousel/dist/assets/owl.theme.default.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('metronic/vendors/general/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('metronic/vendors/general/summernote/dist/summernote.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('metronic/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('metronic/vendors/general/animate.css/animate.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('metronic/vendors/general/toastr/build/toastr.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('metronic/vendors/general/morris.js/morris.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('metronic/vendors/general/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('metronic/vendors/general/socicon/css/socicon.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('metronic/vendors/custom/vendors/line-awesome/css/line-awesome.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('metronic/vendors/custom/vendors/flaticon/flaticon.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('metronic/vendors/custom/vendors/flaticon2/flaticon.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('metronic/vendors/general/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
          type="text/css"/>

    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ asset('metronic/css/demo1/style.bundle.css') }}" rel="stylesheet" type="text/css"/>

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{ asset('metronic/css/demo1/skins/header/base/light.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('metronic/css/demo1/skins/header/menu/light.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('metronic/css/demo1/skins/brand/dark.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('metronic/css/demo1/skins/aside/dark.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" type="text/css"/>

    <!--end::Layout Skins -->
    <link rel="icon" type="image/png" href="{{ asset('metronic/media/logos/favicon.ico') }}"/>

    <style>
        body.modal-open {
            overflow: hidden !important;
        }

        .modal-footer {
            padding: 20px;
        }
    </style>
</head>

<!-- end::Head -->
