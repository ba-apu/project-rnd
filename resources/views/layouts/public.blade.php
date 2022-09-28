<!DOCTYPE html>
<html>
<head>
    <!-- <meta http-equiv="content-type" content="text/html;charset=UTF-8" /> -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" /> -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{-- config('app.name', 'Laravel') --}} অগ্রগতি </title>
   
    
    <link rel="apple-touch-icon" href="pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
	{{-- custom_asset('assets/plugins/pace/pace-theme-flash.css') --}}
		{{-- asset('assets/plugins/pace/pace-theme-flash.css') --}}
	<!-- Styles -->
    <link href="{{ custom_asset('assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('assets/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('assets/plugins/nvd3/nv.d3.min.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('pages/css/pages-icons.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('assets/plugins/mapplic/css/mapplic.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('assets/plugins/rickshaw/rickshaw.min.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('assets/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('assets/plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('assets/css/dashboard.widgets.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('pages/css/pages-icons.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('pages/css/themes/modern.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('assets/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('assets/plugins/summernote/css/summernote.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet">

</head>
<body class="fixed-header horizontal-menu horizontal-app-menu dashboard">
<!-- START PAGE-CONTAINER -->
<div class="header p-r-0 bg-primary">
    <div class="header-inner header-md-height">
        <a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-menu text-white" data-toggle="horizontal-menu"></a>
        <div class="">
            <div class="brand inline no-border hidden-xs-down">

                <img src="{{ custom_asset('assets/img/logo_white.png') }}" alt="logo" width="78" height="22"> <!-- data-src="{{ custom_asset('assets/img/logo_white_2x.png') }}" data-src-retina="{{ custom_asset('assets/img/logo_white_2x.png') }}"  -->
            </div>
            <!-- START NOTIFICATION LIST -->
            <ul class="hidden-md-down notification-list no-margin hidden-sm-down b-grey b-l b-r no-style p-l-30 p-r-20">
                <li class="p-r-10 inline">
                    <div class="dropdown">
                        <a href="javascript:;" id="notification-center" class="header-icon pg pg-world" data-toggle="dropdown">
                            <span class="bubble"></span>
                        </a>
                        <!-- START Notification Dropdown -->
                        <div class="dropdown-menu notification-toggle" role="menu" aria-labelledby="notification-center">
                            <!-- START Notification -->

                            <!-- END Notification -->
                        </div>
                        <!-- END Notification Dropdown -->
                    </div>
                </li>
            </ul>
            <!-- END NOTIFICATIONS LIST -->
            <a href="#" class="search-link hidden-md-down" data-toggle="search"><i class="pg-search"></i><span class="bold">অনুসন্ধান</span></a>

        </div>
            <!-- END User Info-->
            <a href="#" class="header-icon pg pg-alt_menu btn-link m-l-10 sm-no-margin d-inline-block" data-toggle="quickview" data-toggle-element="#quickview"></a>
        </div>
    </div>
    <div class="bg-white">
        <div class="container-fluid">

        </div>
    </div>
</div>
<div class="page-container">
    <!-- START PAGE CONTENT WRAPPER -->
    <div class="page-content-wrapper ">
        <!-- START PAGE CONTENT -->
        @yield('content')
        <!-- END PAGE CONTENT -->
        <!-- START COPYRIGHT -->
        <!-- START CONTAINER FLUID -->
        <!-- START CONTAINER FLUID -->
        <!--div class="container padding-25 sm-padding-10   container-fixed-lg footer">
            <div class="copyright sm-text-center">
                <p class="small no-margin pull-left sm-pull-reset">
                    <span class="hint-text">Copyright &copy; 2017 </span>
                    <span class="font-montserrat">REVOX</span>.
                    <span class="hint-text">All rights reserved. </span>
                    <span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> <span class="muted">|</span> <a href="#" class="m-l-10">Privacy Policy</a></span>
                </p>
                <p class="small no-margin pull-right sm-pull-reset">
                    Hand-crafted <span class="hint-text">&amp; made with Love</span>
                </p>
                <div class="clearfix"></div>
            </div>
        </div-->
        <!-- END COPYRIGHT -->
    </div>
    <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->
<!-- BEGIN VENDOR JS -->
@php 

$appScript = [
	'assets/plugins/pace/pace.min.js',
	'assets/plugins/jquery/jquery-1.11.1.min.js',
	'assets/plugins/d3/d3.min.js',
	'assets/plugins/nvd3/nv.d3.min.js',
	'assets/plugins/modernizr.custom.js',
	'assets/plugins/jquery-ui/jquery-ui.min.js',
	'assets/plugins/tether/js/tether.min.js',
	'assets/plugins/bootstrap/js/bootstrap.min.js',
	'assets/plugins/jquery/jquery-easy.js',
	'assets/plugins/jquery-unveil/jquery.unveil.min.js',
	'assets/plugins/jquery-ios-list/jquery.ioslist.min.js',
	'assets/plugins/jquery-actual/jquery.actual.min.js',
	'assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js',
	'assets/plugins/select2/js/select2.full.min.js',
	'assets/plugins/classie/classie.js',
	'assets/plugins/switchery/js/switchery.min.js',
	'https://maps.googleapis.com/maps/api/js?v=3.exp',
	'assets/plugins/mapplic/js/hammer.js',
	'assets/plugins/mapplic/js/jquery.mousewheel.js',
	'assets/plugins/mapplic/js/mapplic.js',
	'assets/plugins/rickshaw/rickshaw.min.js',
	'assets/plugins/jquery-metrojs/MetroJs.min.js',
	'assets/plugins/jquery-sparkline/jquery.sparkline.min.js',
	'assets/plugins/skycons/skycons.js',
	'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js',
	'assets/plugins/moment/moment.min.js',
	'assets/plugins/bootstrap-daterangepicker/daterangepicker.js',
	'assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js',
	'assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
	'assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js',
	'assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js',
	'assets/plugins/datatables-responsive/js/datatables.responsive.js',
	'assets/plugins/datatables-responsive/js/lodash.min.js',
	'assets/plugins/bootstrap-daterangepicker/daterangepicker.js',
	'assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js',
];

 
@endphp 

@foreach($appScript as $scriptUrl)
	@if(strpos($scriptUrl, 'http://') !==false || strpos($scriptUrl, 'https://') !==false)
		<script src="{{ $scriptUrl }}"></script>
	@else 
		<script src="{{ custom_asset($scriptUrl) }}"></script>
	@endif 
@endforeach
<!-- END VENDOR JS -->

<!-- BEGIN CORE TEMPLATE JS -->

<script src="{{ custom_asset('pages/js/pages.min.js') }}"></script>
<!-- END CORE TEMPLATE JS -->

<script>
var baseUrlForJs = "{{ custom_asset('assets/js/charts.json') }}";

</script>

<!-- BEGIN PAGE LEVEL JS -->
@yield('script')
<!-- END PAGE LEVEL JS -->



</body>
</html>
