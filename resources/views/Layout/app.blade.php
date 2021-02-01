<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="author" content="Heru Setiawan">
    <title>@yield('page', '')</title>

    <link rel="apple-touch-icon" href="{{ URL::asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/extensions/toastr.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/plugins/extensions/toastr.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    @yield('style')
    <!-- END: Page CSS-->
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
@if (request()->segment(1) == NULL || request()->segment(1) == 'comingsoon')
<body class="vertical-layout vertical-menu-modern 1-column  navbar-sticky footer-static bg-full-screen-image blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
@else
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
@endif
    <!-- BEGIN: Content-->
    @yield('content')
    <!-- END: Content-->

    <!-- BEGIN: Vendor JS-->
    <script src="{{ URL::asset('app-assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{ URL::asset('app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js')}}"></script>
    <script src="{{ URL::asset('app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js')}}"></script>
    <script src="{{ URL::asset('app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ URL::asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ URL::asset('app-assets/js/scripts/configs/vertical-menu-light.js')}}"></script>
    <script src="{{ URL::asset('app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{ URL::asset('app-assets/js/core/app.js')}}"></script>
    <script src="{{ URL::asset('app-assets/js/scripts/components.js')}}"></script>
    <script src="{{ URL::asset('app-assets/js/scripts/footer.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    @yield('script')
    @include('Layout.notification')
    <!-- END: Page JS-->
</body>
<!-- END: Body-->

</html>
