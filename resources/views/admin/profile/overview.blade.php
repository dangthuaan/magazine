@extends('admin.master')

@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
        <!-- begin:: Content Head -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">My Profile > Personal Information</h3>
            </div>
        </div>
        <!-- end:: Content Head -->

        <!-- begin:: Content -->
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

            <!--Begin::App-->
            <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

                <!--Begin:: App Aside Mobile Toggle-->
                <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                    <i class="la la-close"></i>
                </button>

                <!--End:: App Aside Mobile Toggle-->

                <!--Begin:: App Aside-->
            @include('admin.profile.aside')

            <!--End:: App Aside-->

                <!--Begin:: App Content-->
                <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="kt-portlet">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">Personal Information <small>Update your
                                                personal information</small></h3>
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

                                <form method="POST" action="{{ route('admin.profile.update') }}"
                                      class="kt-form kt-form--label-right" enctype="multipart/form-data">
                                    @csrf

                                    <div class="kt-portlet__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-section__body">
                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h3 class="kt-section__title kt-section__title-sm">Personal
                                                            Info:</h3>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="kt-avatar kt-avatar--outline kt-avatar--circle"
                                                             id="kt_apps_user_add_avatar">
                                                            <div class="kt-avatar__holder"
                                                                 style="background-image: url({{ getUserAvatar(Auth::id(), Auth::user()->avatar) }});"></div>
                                                            <label class="kt-avatar__upload" data-toggle="kt-tooltip"
                                                                   title="" data-original-title="Change avatar">
                                                                <i class="fa fa-pen"></i>
                                                                <input type="file" id="avatar" name="avatar"
                                                                       class="@error('avatar') is-invalid @enderror"
                                                                       accept=".png, .jpg, .jpeg">
                                                            </label>
                                                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip"
                                                                  title="" data-original-title="Cancel avatar">
                                                            <i class="fa fa-times"></i>
                                                        </span>
                                                        </div>
                                                        @error('avatar') <span class="invalid-feedback d-block"
                                                                               role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Username</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input
                                                            class="form-control"
                                                            name="username"
                                                            type="text" value="{{ Auth::user()->username }}"
                                                            disabled="disabled">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input
                                                            class="form-control @error('first_name') is-invalid @enderror"
                                                            name="first_name"
                                                            type="text" value="{{ Auth::user()->first_name }}">
                                                        @error('first_name') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input
                                                            class="form-control @error('last_name') is-invalid @enderror"
                                                            name="last_name" type="text"
                                                            value="{{ Auth::user()->last_name }}">
                                                        @error('last_name') <span class="invalid-feedback"
                                                                                  role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h3 class="kt-section__title kt-section__title-sm">Contact
                                                            Info:</h3>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Contact
                                                        Phone</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text"><i
                                                                        class="la la-phone"></i></span>
                                                            </div>
                                                            <input type="number"
                                                                   class="form-control @error('phone') is-invalid @enderror"
                                                                   name="phone"
                                                                   value="{{ Auth::user()->phone ?? '' }}"
                                                                   placeholder="Phone" aria-describedby="basic-addon1">
                                                            @error('phone') <span class="invalid-feedback"
                                                                                  role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Email
                                                        Address</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text"><i
                                                                        class="la la-at"></i></span></div>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="email"
                                                                   value="{{ Auth::user()->email }}" placeholder="Email"
                                                                   aria-describedby="basic-addon1" disabled="disabled">
                                                        </div>
                                                        <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Location</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input
                                                            class="form-control @error('location') is-invalid @enderror"
                                                            name="location" placeholder="Location"
                                                            type="text" value="{{ Auth::user()->location ?? '' }}">
                                                        @error('location') <span class="invalid-feedback"
                                                                                 role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__foot">
                                        <div class="kt-form__actions">
                                            <div class="row">
                                                <div class="col-lg-12 col-xl-12">
                                                    <button type="submit" class="btn btn-success float-left">Update
                                                        Information
                                                    </button>&nbsp;
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!--End:: App Content-->
            </div>

            <!--End::App-->
        </div>

        <!-- end:: Content -->

    </div>


@endsection

@section('js')
    <script type="text/javascript">
        $('.kt-menu__item').removeClass('kt-menu__item--active');
        $('.kt-menu__item.profile').addClass('kt-menu__item--active');

        $('.kt-widget__item.personal_info').addClass('kt-widget__item--active');
    </script>
@endsection
