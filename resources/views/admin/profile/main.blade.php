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

@if ($user->isCurrentUser())
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

                        <form method="POST" class="kt-form kt-form--label-right" id="updateProfileForm"
                              enctype="multipart/form-data">
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
                                                         style="background-image: url({{ getUserAvatar($user->id, $user->avatar) }});"></div>
                                                    <label class="kt-avatar__upload"
                                                           data-toggle="kt-tooltip"
                                                           title="" data-original-title="Change avatar">
                                                        <i class="fa fa-pen"></i>
                                                        <input type="file" id="avatar"
                                                               name="avatar">
                                                    </label>
                                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip"
                                                          title="" data-original-title="Cancel avatar">
                                                            <i class="fa fa-times"></i>
                                                        </span>
                                                </div>
                                                <span class="invalid-feedback d-block avatar"
                                                      role="alert"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Username</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input
                                                    class="form-control"
                                                    name="username"
                                                    type="text" value="{{ $user->username }}"
                                                    disabled="disabled">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">First
                                                Name</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input
                                                    class="form-control"
                                                    name="first_name"
                                                    type="text" value="{{ $user->first_name }}">
                                                <span class="invalid-feedback first_name"
                                                      role="alert"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Last
                                                Name</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input
                                                    class="form-control"
                                                    name="last_name" type="text"
                                                    value="{{ $user->last_name }}">
                                                <span class="invalid-feedback last_name"
                                                      role="alert"></span>
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
                                                           class="form-control"
                                                           name="phone"
                                                           value="{{ $user->phone ?? '' }}"
                                                           placeholder="Phone"
                                                           aria-describedby="basic-addon1">
                                                    <span class="invalid-feedback phone"
                                                          role="alert"></span>
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
                                                           value="{{ $user->email }}" placeholder="Email"
                                                           aria-describedby="basic-addon1"
                                                           disabled="disabled">
                                                </div>
                                                <span
                                                    class="form-text text-muted">We'll never share your email with anyone else.</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Location</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input
                                                    class="form-control"
                                                    name="location" placeholder="Location"
                                                    type="text" value="{{ $user->location ?? '' }}">
                                                <span class="invalid-feedback location"
                                                      role="alert"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @can('profile.update')
                                <div class="kt-portlet__foot">
                                    <div class="kt-form__actions">
                                        <div class="row">
                                            <div class="col-lg-12 col-xl-12">
                                                <button type="submit" class="btn btn-success float-left"
                                                        data-username="{{ $user->username }}">Update
                                                    Information
                                                </button>&nbsp;
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--End:: App Content-->
@else
    <!--Begin:: App Content-->
        <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">Personal Information</h3>
                            </div>
                        </div>

                        <form class="kt-form kt-form--label-right">
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
                                                         style="background-image: url({{ getUserAvatar($user->id, $user->avatar) }});"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Username</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input
                                                    class="form-control"
                                                    name="username"
                                                    type="text" value="{{ $user->username }}"
                                                    disabled="disabled">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">First
                                                Name</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input
                                                    class="form-control"
                                                    name="first_name"
                                                    type="text" value="{{ $user->first_name }}"
                                                    disabled="disabled">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Last
                                                Name</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input
                                                    class="form-control"
                                                    name="last_name" type="text"
                                                    value="{{ $user->last_name }}" disabled="disabled">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h3 class="kt-section__title kt-section__title-sm">Contact
                                                    Info:</h3>
                                            </div>
                                        </div>
                                        @if ($user->phone)
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
                                                               class="form-control"
                                                               name="phone"
                                                               value="{{ $user->phone}}"
                                                               placeholder="Phone"
                                                               aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
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
                                                           value="{{ $user->email }}" placeholder="Email"
                                                           aria-describedby="basic-addon1"
                                                           disabled="disabled">
                                                </div>
                                            </div>
                                        </div>

                                        @if ($user->location)
                                            <div class="form-group row">
                                                <label
                                                    class="col-xl-3 col-lg-3 col-form-label">Location</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control"
                                                        name="location" placeholder="Location"
                                                        type="text" value="{{ $user->location }}">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--End:: App Content-->
    @endif
</div>

<!--End::App-->
