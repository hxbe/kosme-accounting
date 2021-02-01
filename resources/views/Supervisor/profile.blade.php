@extends('Layout.app')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/pages/page-user-profile.css')}}">
@endsection
@section('page', 'Profile')
@section('content')
    @include('Layout.header')
    @include('Layout.menu')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- page user profile start -->
                <section class="page-user-profile">
                    <div class="row">
                        <div class="col-12">
                            <!-- user profile heading section start -->
                            <div class="card">
                                <div class="card-content">
                                    <div class="user-profile-images">
                                        <!-- user timeline image -->
                                        <img src="../../../app-assets/images/profile/post-media/profile-banner.jpg" class="img-fluid rounded-top user-timeline-image" alt="user timeline image">
                                        <!-- user profile image -->
                                        <img src="../../../app-assets/images/portrait/small/avatar-s-16.jpg" class="user-profile-image rounded" alt="user profile image" height="140" width="140">
                                    </div>
                                    <div class="user-profile-text">
                                        <h4 class="mb-0 text-bold-500 profile-text-color">{{ucfirst(Auth::user()->firstname).' '.ucfirst(Auth::user()->lastname)}}</h4>
                                        <small>{{ucfirst(Auth::user()->role)}}</small>
                                    </div>
                                    <!-- user profile nav tabs start -->
                                    <div class="card-body px-0">
                                        <ul class="nav user-profile-nav justify-content-center justify-content-md-start nav-tabs border-bottom-0 mb-0" role="tablist">
                                            <li class="nav-item pb-0">
                                                <a class="nav-link d-flex px-1 active" id="activity-tab" data-toggle="tab" href="#activity" aria-controls="activity" role="tab" aria-selected="false"><i class="bx bx-walk"></i><span class="d-none d-md-block">Activity</span></a>
                                            </li>
                                            <li class="nav-item pb-0">
                                                <a class="nav-link d-flex px-1" id="setting-tab" data-toggle="tab" href="#setting" aria-controls="setting" role="tab" aria-selected="false"><i class="bx bx-cog"></i><span class="d-none d-md-block">Settings</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- user profile nav tabs ends -->
                                </div>
                            </div>
                            <!-- user profile heading section ends -->

                            <!-- user profile content section start -->
                            <div class="row">
                                <!-- user profile nav tabs content start -->
                                <div class="col-lg-12">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="activity" aria-labelledby="activity-tab" role="tabpanel">
                                            <!-- user profile nav tabs activity start -->
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <!-- timeline widget start -->
                                                        <ul class="widget-timeline">
                                                            <li class="timeline-items timeline-icon-success active">
                                                                <div class="timeline-time">Tue 8:17pm</div>
                                                                <h6 class="timeline-title">Martina Ash</h6>
                                                                <p class="timeline-text">on <a href="JavaScript:void(0);">Received Gift</a></p>
                                                                <div class="timeline-content">
                                                                    Welcome to vedio game and lame is very creative
                                                                </div>
                                                            </li>
                                                            <li class="timeline-items timeline-icon-primary active">
                                                                <div class="timeline-time">5 days ago</div>
                                                                <h6 class="timeline-title">Jonny Richie attached file</h6>
                                                                <p class="timeline-text">on <a href="JavaScript:void(0);">Project name</a></p>
                                                                <div class="timeline-content">
                                                                    <img src="../../../app-assets/images/icon/sketch.png" alt="document" height="36" width="27" class="mr-50">Data Folder
                                                                </div>
                                                            </li>
                                                            <li class="timeline-items timeline-icon-danger active">
                                                                <div class="timeline-time">7 hours ago</div>
                                                                <h6 class="timeline-title">Mathew Slick docs</h6>
                                                                <p class="timeline-text">on <a href="JavaScript:void(0);">Project name</a></p>
                                                                <div class="timeline-content">
                                                                    <img src="../../../app-assets/images/icon/pdf.png" alt="document" height="36" width="27" class="mr-50">Received Pdf
                                                                </div>
                                                            </li>
                                                            <li class="timeline-items timeline-icon-info active">
                                                                <div class="timeline-time">5 hour ago</div>
                                                                <h6 class="timeline-title">Petey Cruiser send you a message</h6>
                                                                <p class="timeline-text">on <a href="JavaScript:void(0);">Redited message</a></p>
                                                                <div class="timeline-content">
                                                                    Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it
                                                                    is
                                                                    pain, but because occasionally circumstances
                                                                </div>
                                                            </li>
                                                            <li class="timeline-items timeline-icon-warning">
                                                                <div class="timeline-time">2 min ago</div>
                                                                <h6 class="timeline-title">Anna mull liked </h6>
                                                                <p class="timeline-text">on <a href="JavaScript:void(0);">Liked</a></p>
                                                                <div class="timeline-content">
                                                                    The Amairates
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <!-- timeline widget ends -->
                                                        <div class="text-center">
                                                            <button class="btn btn-primary">View All Activity</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- user profile nav tabs activity start -->
                                        </div>
                                        <div class="tab-pane" id="setting" aria-labelledby="setting-tab" role="tabpanel">
                                            <!-- user profile nav tabs friends start -->
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="media">
                                                            <a href="javascript: void(0);">
                                                                <img src="../../../app-assets/images/portrait/small/avatar-s-16.jpg" class="rounded mr-75" alt="profile image" height="64" width="64">
                                                            </a>
                                                            <div class="media-body mt-25">
                                                                <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                                    <label for="select-files" class="btn btn-sm btn-light-primary ml-50 mb-50 mb-sm-0">
                                                                        <span>Upload new photo</span>
                                                                        <input id="select-files" type="file" hidden>
                                                                    </label>
                                                                    <button class="btn btn-sm btn-light-secondary ml-50">Reset</button>
                                                                </div>
                                                                <p class="text-muted ml-1 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                                                        size of
                                                                        800kB</small></p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <form novalidate>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <div class="controls">
                                                                            <label>Username</label>
                                                                            <input type="text" class="form-control" placeholder="Username" value="hermione007" required data-validation-required-message="This username field is required">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <div class="controls">
                                                                            <label>Name</label>
                                                                            <input type="text" class="form-control" placeholder="Name" value="Hermione Granger" required data-validation-required-message="This name field is required">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <div class="controls">
                                                                            <label>E-mail</label>
                                                                            <input type="email" class="form-control" placeholder="Email" value="granger007@hogward.com" required data-validation-required-message="This email field is required">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Company</label>
                                                                        <input type="text" class="form-control" placeholder="Company name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <div class="controls">
                                                                            <label>Old Password</label>
                                                                            <input type="password" class="form-control" required placeholder="Old Password" data-validation-required-message="This old password field is required">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <div class="controls">
                                                                            <label>New Password</label>
                                                                            <input type="password" name="password" class="form-control" placeholder="New Password" required data-validation-required-message="The password field is required" minlength="6">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <div class="controls">
                                                                            <label>Retype new Password</label>
                                                                            <input type="password" name="con-password" class="form-control" required data-validation-match-match="password" placeholder="New Password" data-validation-required-message="The Confirm password field is required" minlength="6">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                                    <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                                                                        changes</button>
                                                                    <button type="reset" class="btn btn-light mb-1">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- user profile nav tabs friends ends -->
                                        </div>
                                        <div class="tab-pane" id="profile" aria-labelledby="profile-tab" role="tabpanel">
                                            <!-- user profile nav tabs profile start -->
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row">
                                                                    <div class="col-12 col-sm-3 text-center mb-1 mb-sm-0">
                                                                        <img src="../../../app-assets/images/portrait/small/avatar-s-16.jpg" class="rounded" alt="group image" height="120" width="120" />
                                                                    </div>
                                                                    <div class="col-12 col-sm-9">
                                                                        <div class="row">
                                                                            <div class="col-12 text-center text-sm-left">
                                                                                <h6 class="media-heading mb-0">valintini_007<i class="cursor-pointer bx bxs-star text-warning ml-50 align-middle"></i></h6>
                                                                                <small class="text-muted align-top">Martina Ash</small>
                                                                            </div>
                                                                            <div class="col-12 text-center text-sm-left">
                                                                                <div class="mb-1">
                                                                                    <span class="mr-1">122 <small>Posts</small></span>
                                                                                    <span class="mr-1">4.7k <small>Followers</small></span>
                                                                                    <span class="mr-1">652 <small>Following</small></span>
                                                                                </div>
                                                                                <p>Algolia helps businesses across industries quickly create relevant😎, scalable😀, and
                                                                                    lightning😍
                                                                                    fast search and discovery experiences.</p>
                                                                                <div>
                                                                                    <div class="badge badge-light-primary badge-round mr-1 mb-1" data-toggle="tooltip" data-placement="bottom" title="with 7% growth @valintini_007 is on top 5k"><i class="cursor-pointer bx bx-check-shield"></i>
                                                                                    </div>
                                                                                    <div class="badge badge-light-warning badge-round mr-1 mb-1" data-toggle="tooltip" data-placement="bottom" title="last 55% growth @valintini_007 is on weedday"><i class="cursor-pointer bx bx-badge-check"></i>
                                                                                    </div>
                                                                                    <div class="badge badge-light-success badge-round mb-1" data-toggle="tooltip" data-placement="bottom" title="got premium profile here"><i class="cursor-pointer bx bx-award"></i>
                                                                                    </div>
                                                                                </div>
                                                                                <button class="btn btn-sm d-none d-sm-block float-right btn-light-primary">
                                                                                    <i class="cursor-pointer bx bx-edit font-small-3 mr-50"></i><span>Edit</span>
                                                                                </button>
                                                                                <button class="btn btn-sm d-block d-sm-none btn-block text-center btn-light-primary">
                                                                                    <i class="cursor-pointer bx bx-edit font-small-3 mr-25"></i><span>Edit</span></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Basic details</h5>
                                                        <ul class="list-unstyled">
                                                            <li><i class="cursor-pointer bx bx-map mb-1 mr-50"></i>California</li>
                                                            <li><i class="cursor-pointer bx bx-phone-call mb-1 mr-50"></i>(+56) 454 45654 </li>
                                                            <li><i class="cursor-pointer bx bx-time mb-1 mr-50"></i>July 10</li>
                                                            <li><i class="cursor-pointer bx bx-envelope mb-1 mr-50"></i>Jonnybravo@gmail.com</li>
                                                        </ul>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <h6><small class="text-muted">Cell Phone</small></h6>
                                                                <p>(+46) 456 54432</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <h6><small class="text-muted">Family Phone</small></h6>
                                                                <p>(+46) 454 22432</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <h6><small class="text-muted">Reporter</small></h6>
                                                                <p>John Doe</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <h6><small class="text-muted">Manager</small></h6>
                                                                <p>Richie Rich</p>
                                                            </div>
                                                            <div class="col-12">
                                                                <h6><small class="text-muted">Bio</small></h6>
                                                                <p>Built-in customizer enables users to change their admin panel look & feel based on their
                                                                    preferences Beautifully crafted, clean & modern designed admin theme with 3 different demos &
                                                                    light - dark versions.</p>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-sm d-none d-sm-block float-right btn-light-primary mb-2">
                                                            <i class="cursor-pointer bx bx-edit font-small-3 mr-50"></i><span>Edit</span>
                                                        </button>
                                                        <button class="btn btn-sm d-block d-sm-none btn-block text-center btn-light-primary">
                                                            <i class="cursor-pointer bx bx-edit font-small-3 mr-25"></i><span>Edit</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- user profile nav tabs profile ends -->
                                        </div>
                                    </div>
                                </div>
                                <!-- user profile nav tabs content ends -->
                            </div>
                            <!-- user profile content section start -->
                        </div>
                    </div>
                </section>
                <!-- page user profile ends -->

            </div>
        </div>
    </div>
    @include('Layout.footer')
@endsection
