@extends('admin.master')

@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
        <!-- begin:: Content Head -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Post Manager > Categories</h3>
            </div>
        </div>
        <!-- end:: Content Head -->

        <!-- begin:: Content -->
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="row">
                <div class="col-lg-12">

                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    All Categories
                                </h3>
                            </div>
                            <div class="kt-portlet__head-wrapper" style="padding: 10px 0px;">
                                <div class="kt-portlet__head-actions">
                                    <a href="#" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal"
                                       data-target="#newCategoryModal">
                                        <i class="la la-plus"></i>
                                        New Category
                                    </a>
                                </div>
                            </div>
                        </div>

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

                        <div class="kt-portlet__body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="kt_tree_2" class="tree-demo">
                                        <ul>
                                            @foreach($categories as $category)
                                                @if ($category->isParent())
                                                    <li>
                                                        {{ $category->name }}
                                                        @include('admin.categories.controls')
                                                        @if ($category->childs()->count() > 0)
                                                            <ul>
                                                                @foreach ($category->childs as $child)
                                                                    <li>
                                                                        {{ $child->name }}
                                                                        @include('admin.categories.controls', ['category' => $child])
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--end::Portlet-->

                </div>
            </div>
        </div>
        <!-- end:: Content -->

    </div>

    @include('admin.categories.modals.create')
    @include('admin.categories.modals.edit')

@endsection

@section('css')
    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="{{ asset('metronic/vendors/custom/jstree/jstree.bundle.css') }}" rel="stylesheet" type="text/css"/>

    <!--end::Page Vendors Styles -->
    <style>
        .jstree-container-ul.jstree-children {
            font-size: 2rem;
        }

        .jstree-default .jstree-anchor {
            margin-bottom: 20px;
        }

        .jstree-default .jstree-icon.fa {
            font-size: 1.8rem !important;
        }

        i.jstree-icon.jstree-themeicon {
            margin-right: 5px;
        }

        #kt_tree_2 li i {
            color: #5d78ff !important;
        }

        .jstree-default .jstree-hovered,
        .jstree-default .jstree-clicked {
            background-color: transparent !important;
        }
    </style>
@endsection

@section('js')
    <!--begin::Page Vendors(used by this page) -->
    <script src="{{ asset('metronic/vendors/custom/jstree/jstree.bundle.js') }}" type="text/javascript"></script>

    <!--end::Page Vendors -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="{{ asset('metronic/js/demo1/pages/components/extended/treeview.js') }}"
            type="text/javascript"></script>

    <!--end::Page Scripts -->

    <script type="text/javascript">
        $('.kt-menu__item').removeClass('kt-menu__item--active');
        $('.kt-menu__item.kt-menu__item--submenu.post-manager').addClass('kt-menu__item--open');
        $('.kt-menu__item.categories').addClass('kt-menu__item--active');
    </script>
@endsection
