@extends('admin.master')

@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <!-- begin:: Content Head -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Post Manager > Posts</h3>
        </div>
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

                                <form class="kt-form kt-form--label-right search-form" style="display:inline-block;" method="GET" action="">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Search for...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="la la-search"></i></button>
                                        </div>
                                    </div>
                                </form>

                                &nbsp;
                                <a href="javascript:;" class="btn btn-brand add-new btn-elevate btn-icon-sm" data-toggle="modal" data-target="#newPostModal">
                                    <i class="la la-plus"></i>
                                    New Post
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">

                        <div class="kt-notes">
                            <div class="kt-notes__items">
                                <div class="kt-notes__item">
                                    <div class="kt-notes__media">
                                        <img class="kt-hidden-" src="{{ asset('metronic/media/users/100_3.jpg') }}" alt="image">
                                        <span class="kt-notes__icon kt-font-boldest kt-hidden">
                                            <i class="flaticon2-cup"></i>
                                        </span>
                                        <h3 class="kt-notes__user kt-font-boldest kt-hidden">
                                            N S
                                        </h3>
                                    </div>
                                    <div class="kt-notes__content">
                                        <div class="kt-notes__section">
                                            <div class="kt-notes__info">
                                                <a href="{{ route('client.post.index') }}" class="kt-notes__title">
                                                    A Discount Toner Cartridge Is Better Than Ever.
                                                </a>
                                                <span class="kt-notes__desc">
                                                    9:30AM 16 June, 2015
                                                </span>
                                                <span class="kt-badge kt-badge--success kt-badge--inline">new</span>
                                                <span class="kt-badge kt-badge--danger kt-badge--inline">Food Habit</span>
                                            </div>
                                            <div class="kt-notes__dropdown">
                                                <a href="#" class="btn btn-sm btn-icon-md btn-icon" data-toggle="dropdown">
                                                    <i class="flaticon-more-1 kt-font-brand"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="kt-nav">
                                                        <li class="kt-nav__item">
                                                            <a href="javascript:;" class="kt-nav__link" data-toggle="modal" data-target="#editPostModal">
                                                                <i class="kt-nav__link-icon flaticon2-edit"></i>
                                                                <span class="kt-nav__link-text">Edit</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="javascript:;" class="kt-nav__link sweetalert_remove">
                                                                <i class="kt-nav__link-icon flaticon2-trash"></i>
                                                                <span class="kt-nav__link-text">Remove</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="kt-notes__body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
                                        </span>
                                    </div>
                                </div>

                                <div class="kt-notes__item">
                                    <div class="kt-notes__media">
                                        <img class="kt-hidden-" src="{{ asset('metronic/media/users/100_3.jpg') }}" alt="image">
                                        <span class="kt-notes__icon kt-font-boldest kt-hidden">
                                            <i class="flaticon2-cup"></i>
                                        </span>
                                        <h3 class="kt-notes__user kt-font-boldest kt-hidden">
                                            N S
                                        </h3>
                                    </div>
                                    <div class="kt-notes__content">
                                        <div class="kt-notes__section">
                                            <div class="kt-notes__info">
                                                <a href="#" class="kt-notes__title">
                                                    New order
                                                </a>
                                                <span class="kt-notes__desc">
                                                    9:30AM 16 June, 2015
                                                </span>
                                                <span class="kt-badge kt-badge--success kt-badge--inline">new</span>
                                                <span class="kt-badge kt-badge--danger kt-badge--inline">Lifestyle</span>
                                            </div>
                                            <div class="kt-notes__dropdown">
                                                <a href="#" class="btn btn-sm btn-icon-md btn-icon" data-toggle="dropdown">
                                                    <i class="flaticon-more-1 kt-font-brand"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="kt-nav">
                                                        <li class="kt-nav__item">
                                                            <a href="javascript:;" class="kt-nav__link" data-toggle="modal" data-target="#editPostModal">
                                                                <i class="kt-nav__link-icon flaticon2-edit"></i>
                                                                <span class="kt-nav__link-text">Edit</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-trash"></i>
                                                                <span class="kt-nav__link-text">Remove</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="kt-notes__body">
                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.
                                        </span>
                                    </div>
                                </div>

                                <div class="kt-notes__item">
                                    <div class="kt-notes__media">
                                        <img class="kt-hidden-" src="{{ asset('metronic/media/users/100_3.jpg') }}" alt="image">
                                        <span class="kt-notes__icon kt-font-boldest kt-hidden">
                                            <i class="flaticon2-cup"></i>
                                        </span>
                                        <h3 class="kt-notes__user kt-font-boldest kt-hidden">
                                            N S
                                        </h3>
                                    </div>
                                    <div class="kt-notes__content">
                                        <div class="kt-notes__section">
                                            <div class="kt-notes__info">
                                                <a href="#" class="kt-notes__title">
                                                    New order
                                                </a>
                                                <span class="kt-notes__desc">
                                                    9:30AM 16 June, 2015
                                                </span>
                                                <span class="kt-badge kt-badge--danger kt-badge--inline">Science</span>
                                            </div>
                                            <div class="kt-notes__dropdown">
                                                <a href="#" class="btn btn-sm btn-icon-md btn-icon" data-toggle="dropdown">
                                                    <i class="flaticon-more-1 kt-font-brand"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="kt-nav">
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-edit"></i>
                                                                <span class="kt-nav__link-text">Edit</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-trash"></i>
                                                                <span class="kt-nav__link-text">Remove</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="kt-notes__body">
                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--begin: Pagination-->
                        <div class="kt-pagination  kt-pagination--brand">
                            <ul class="kt-pagination__links">
                                <li class="kt-pagination__link--first">
                                    <a href="#"><i class="fa fa-angle-double-left kt-font-brand"></i></a>
                                </li>
                                <li class="kt-pagination__link--next">
                                    <a href="#"><i class="fa fa-angle-left kt-font-brand"></i></a>
                                </li>
                                <li>
                                    <a href="#">...</a>
                                </li>
                                <li>
                                    <a href="#">29</a>
                                </li>
                                <li>
                                    <a href="#">30</a>
                                </li>
                                <li>
                                    <a href="#">31</a>
                                </li>
                                <li class="kt-pagination__link--active">
                                    <a href="#">32</a>
                                </li>
                                <li>
                                    <a href="#">33</a>
                                </li>
                                <li>
                                    <a href="#">34</a>
                                </li>
                                <li>
                                    <a href="#">...</a>
                                </li>
                                <li class="kt-pagination__link--prev">
                                    <a href="#"><i class="fa fa-angle-right kt-font-brand"></i></a>
                                </li>
                                <li class="kt-pagination__link--last">
                                    <a href="#"><i class="fa fa-angle-double-right kt-font-brand"></i></a>
                                </li>
                            </ul>
                            <div class="kt-pagination__toolbar">
                                <select class="form-control kt-font-brand" style="width: 60px;">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <span class="pagination__desc">
                                    Displaying 10 of 230 records
                                </span>
                            </div>
                        </div>

                        <!--end: Pagination-->
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
<link href="{{ asset('metronic/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--end::Page Vendors -->
@endsection

@section('js')
<!--begin::Page Scripts(used by this page) -->
<script src="{{ asset('metronic/js/demo1/pages/crud/forms/widgets/summernote.js') }}" type="text/javascript"></script>

<script type="text/javascript">
    $('.kt-menu__item').removeClass('kt-menu__item--active');
    $('.kt-menu__item.kt-menu__item--submenu.post-manager').addClass('kt-menu__item--open');
    $('.kt-menu__item.posts').addClass('kt-menu__item--active');

    $('.summernote_post_content').summernote({
        placeholder: 'Your post content..',
        height: 500
    });
</script>
@endsection
