@extends('admin.master')

@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
        <!-- begin:: Content Head -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Post Manager > Posts</h3>
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
            <div class="row">
                <div class="col-lg-12">

                    <!--Begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    All Posts
                                </h3>
                            </div>
                            <div class="kt-portlet__head-wrapper" style="padding: 10px 0px;">
                                <div class="kt-portlet__head-actions">

                                    <form class="kt-form kt-form--label-right search-form" style="display:inline-block;"
                                          method="GET">
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control" id="search-post-input"
                                                   placeholder="Search for...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" id="search-user" type="submit"><i
                                                        class="la la-search"></i></button>
                                            </div>
                                        </div>
                                    </form>

                                    &nbsp;
                                    <a href="#" class="btn btn-brand add-new btn-elevate btn-icon-sm"
                                       data-toggle="modal" data-target="#newPostModal">
                                        <i class="la la-plus"></i>
                                        New Post
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body">

                            @if (session('success'))
                                <div class="col-xl-12 kt-margin-t-10">
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="col-xl-12 kt-margin-t-10">
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                </div>
                            @endif

                            <div class="kt-notes">
                                <div class="kt-notes__items all-posts">
                                    @include('admin.posts.list_body')
                                </div>
                            </div>


                        </div>

                    </div>


                    <!--End::Portlet-->
                </div>
            </div>
        </div>
        <!-- end:: Content -->

    </div>

    @include('admin.posts.modals.create')
    @include('admin.posts.modals.edit')

@endsection

@section('css')
    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="{{ asset('metronic/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
          type="text/css"/>
    <!--end::Page Vendors -->
@endsection

@section('js')
    <!--begin::Page Scripts(used by this page) -->
    <script src="{{ asset('metronic/js/demo1/pages/crud/forms/widgets/summernote.js') }}"
            type="text/javascript"></script>

    <script type="text/javascript">
        $('.kt-menu__item').removeClass('kt-menu__item--active');
        $('.kt-menu__item.kt-menu__item--submenu.post-manager').addClass('kt-menu__item--open');
        $('.kt-menu__item.posts').addClass('kt-menu__item--active');
    </script>

    @include('admin.posts.js')
@endsection
