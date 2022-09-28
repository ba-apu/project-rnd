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
    {{-- <link rel="apple-touch-icon" href="pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default"> --}}
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <link rel="apple-touch-icon" sizes="57x57" href="/assets/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/assets/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/assets/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/assets/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/assets/img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    {{-- custom_asset('assets/plugins/pace/pace-theme-flash.css') --}}
    {{-- asset('assets/plugins/pace/pace-theme-flash.css') --}}
    <!-- toastr css-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}"/>
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
    <link href="{{ custom_asset('assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}"
          rel="stylesheet">
    <link href="{{ custom_asset('assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}"
          rel="stylesheet">
    <link href="{{ custom_asset('assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}"
          rel="stylesheet">
    <link href="{{ custom_asset('assets/plugins/datatables-responsive/css/datatables.responsive.css') }}"
          rel="stylesheet">
    <link href="{{ custom_asset('assets/css/dashboard.widgets.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('pages/css/themes/modern.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css') }}"
          rel="stylesheet">
    <link class="main-stylesheet" href="{{ custom_asset('assets/css/style.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ custom_asset('pages/css/themes/custom-responsive.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('pages/css/themes/simplebar.css') }}" rel="stylesheet">
    <!-- custom accessibility css -->
    {{--    <link href="{{ custom_asset('assets/plugins/accessibility/asb.css') }}" rel="stylesheet">--}}
    {{-- <link href="{{ custom_asset('assets/plugins/summernote/css/summernote.css') }}" rel="stylesheet"> --}}
    @stack('top_css')
    @stack('top_js')
    <style>
        #jumpToTop {
            display: none;
            position: fixed;
            bottom: 65px;
            right: 30px;
            z-index: 99;
            border: none;
            outline: none;
            background-color: #912c8a;
            color: white;
            cursor: pointer;
            padding: 10px;
            border-radius: 4px;
        }

        #jumpToTop:hover {
            background-color: #555;
        }
    </style>

</head>
<body class="fixed-header horizontal-menu horizontal-app-menu dashboard">

<nav class="main-nav navba navbar-expand-lg">
    @include('layout.header')
</nav>

<div class="page-container" id="scrollingTopDiv">
    <!-- START PAGE CONTENT WRAPPER -->
    <div class="page-content-wrapper" id="topDiv">
    @include('layouts.notifications')
    <!-- START PAGE CONTENT -->
        <div style="height:40px !important;">
            @if(url()->current() != url('/dashboard') && Request::segment(2) != 'team-lead-main')
                <a class="btn back-btn float-right" onclick="goBack()">
                    <i class="fa fa-angle-left" style="color: #5993ab !important" aria-hidden="true"></i> পূর্বের পাতা
                </a>
            @endif
        </div>
    @yield('content')
    @include('layout.footer')
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
    <i class="fa fa-arrow-up" aria-hidden="true" id="jumpToTop"
       onclick="smoothScroll(document.getElementById('topDiv'))"></i>
    <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->
<!--START QUICKVIEW -->
<!-- <div id="quickview" class="quickview-wrapper" data-pages="quickview"> </div> -->
<!-- END QUICKVIEW-->
<!-- START OVERLAY -->
<div class="overlay hide" data-pages="search">
    <!-- BEGIN Overlay Content !-->
    <div class="overlay-content has-results m-t-20">
        <!-- BEGIN Overlay Header !-->
        <div class="container-fluid">
            <!-- BEGIN Overlay Logo !-->
            <img class="overlay-brand" src="{{ custom_asset('assets/img/logo.png') }}" alt="logo"
                 data-src="{{ custom_asset('assets/img/logo.png') }}" data-src-retina="assets/img/logo_2x.png"
                 width="78" height="22">
            <!-- END Overlay Logo !-->
            <!-- BEGIN Overlay Close !-->
            <a href="#" class="close-icon-light overlay-close text-black fs-16">
                <i class="pg-close"></i>
            </a>
            <!-- END Overlay Close !-->
        </div>
        <!-- END Overlay Header !-->
        <div class="container-fluid">
            <!-- BEGIN Overlay Controls !-->
            <input id="overlay-search" class="no-border overlay-search bg-transparent" placeholder="Search..."
                   autocomplete="off" spellcheck="false">
            <br>
            <div class="inline-block">
                <div class="checkbox right">
                    <input id="checkboxn" type="checkbox" value="1" checked="checked">
                    <label for="checkboxn"><i class="fa fa-search"></i> Search within page</label>
                </div>
            </div>
            <div class="inline-block m-l-10">
                <p class="fs-13">Press enter to search</p>
            </div>
            <!-- END Overlay Controls !-->
        </div>
        <!-- BEGIN Overlay Search Results, This part is for demo purpose, you can add anything you like !-->
        <div class="container-fluid">
                <span>
                    <strong>suggestions :</strong>
                </span>
            <span id="overlay-suggestions"></span>
            <br>
            <div class="search-results m-t-40">
                <p class="bold">Pages Search Results</p>
                <div class="row">
                    <div class="col-md-6">
                        <!-- BEGIN Search Result Item !-->
                        <div class="">
                            <!-- BEGIN Search Result Item Thumbnail !-->
                            <div class="
                                thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                                <div>
                                    <img width="50" height="50"
                                         src="{{ custom_asset('assets/img/profiles/avatar.jpg') }}"
                                         data-src="{{ custom_asset('assets/img/profiles/avatar.jpg') }}"
                                         data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">
                                </div>
                            </div>
                            <!-- END Search Result Item Thumbnail !-->
                            <div class="p-l-10 inline p-t-5">
                                <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on pages
                                </h5>
                                <p class="hint-text">via john smith</p>
                            </div>
                        </div>
                        <!-- END Search Result Item !-->
                        <!-- BEGIN Search Result Item !-->
                        <div class="">
                            <!-- BEGIN Search Result Item Thumbnail !-->
                            <div class="
                            thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                                <div>T</div>
                            </div>
                            <!-- END Search Result Item Thumbnail !-->
                            <div class="p-l-10 inline p-t-5">
                                <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> related
                                    topics</h5>
                                <p class="hint-text">via pages</p>
                            </div>
                        </div>
                        <!-- END Search Result Item !-->
                        <!-- BEGIN Search Result Item !-->
                        <div class="">
                            <!-- BEGIN Search Result Item Thumbnail !-->
                            <div class="
                        thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                                <div><i class="fa fa-headphones large-text "></i>
                                </div>
                            </div>
                            <!-- END Search Result Item Thumbnail !-->
                            <div class="p-l-10 inline p-t-5">
                                <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> music</h5>
                                <p class="hint-text">via pagesmix</p>
                            </div>
                        </div>
                        <!-- END Search Result Item !-->
                    </div>
                    <div class="col-md-6">
                        <!-- BEGIN Search Result Item !-->
                        <div class="">
                            <!-- BEGIN Search Result Item Thumbnail !-->
                            <div class="
                    thumbnail-wrapper d48 circular bg-info text-white inline m-t-10">
                                <div><i class="fa fa-facebook large-text "></i>
                                </div>
                            </div>
                            <!-- END Search Result Item Thumbnail !-->
                            <div class="p-l-10 inline p-t-5">
                                <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on facebook
                                </h5>
                                <p class="hint-text">via facebook</p>
                            </div>
                        </div>
                        <!-- END Search Result Item !-->
                        <!-- BEGIN Search Result Item !-->
                        <div class="">
                            <!-- BEGIN Search Result Item Thumbnail !-->
                            <div class="
                thumbnail-wrapper d48 circular bg-complete text-white inline m-t-10">
                                <div><i class="fa fa-twitter large-text "></i>
                                </div>
                            </div>
                            <!-- END Search Result Item Thumbnail !-->
                            <div class="p-l-10 inline p-t-5">
                                <h5 class="m-b-5">Tweats on<span class="semi-bold result-name"> ice cream</span>
                                </h5>
                                <p class="hint-text">via twitter</p>
                            </div>
                        </div>
                        <!-- END Search Result Item !-->
                        <!-- BEGIN Search Result Item !-->
                        <div class="">
                            <!-- BEGIN Search Result Item Thumbnail !-->
                            <div class="
            thumbnail-wrapper d48 circular text-white bg-danger inline m-t-10">
                                <div><i class="fa fa-google-plus large-text "></i>
                                </div>
                            </div>
                            <!-- END Search Result Item Thumbnail !-->
                            <div class="p-l-10 inline p-t-5">
                                <h5 class="m-b-5">Circles on<span class="semi-bold result-name"> ice cream</span>
                                </h5>
                                <p class="hint-text">via google plus</p>
                            </div>
                        </div>
                        <!-- END Search Result Item !-->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Overlay Search Results !-->
    </div>
    <!-- END Overlay Content !-->
</div>
<!-- END OVERLAY -->
<span class="template-loader" style="display:none;"><img src="{{ custom_asset('pages/img/loder-a2i.gif') }}"
                                                         class="img-fluid" alt=""></span>
<!-- BEGIN VENDOR JS -->
<!-- //////////////////////// new smart menu //////////////////////// -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="{{ custom_asset('js/jquery.smartmenus.js') }}"></script>
<script type="text/javascript" src="{{ custom_asset('js/jquery.smartmenus.bootstrap-4.js') }}"></script>

<!-- //////////////////////// new smart menu //////////////////////// -->
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
        'assets/plugins/mapplic/js/hammer.js',
        'assets/plugins/mapplic/js/jquery.mousewheel.js',
        'assets/plugins/mapplic/js/mapplic.js',
        'assets/plugins/rickshaw/rickshaw.min.js',
        'assets/plugins/jquery-metrojs/MetroJs.min.js',
        'assets/plugins/jquery-sparkline/jquery.sparkline.min.js',
        'assets/plugins/skycons/skycons.js',
        'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js',
        'assets/plugins/moment/moment.min.js',
        'assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js',
        'assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
        'assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js',
        'assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js',
        'assets/plugins/datatables-responsive/js/datatables.responsive.js',
        'assets/plugins/datatables-responsive/js/lodash.min.js',
        'assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js',
        'assets/js/simplebar.min.js',
        //'assets/plugins/bootstrap-daterangepicker/daterangepicker.js',
    ];
    //'https://maps.googleapis.com/maps/api/js?v=3.exp',
@endphp

@foreach ($appScript as $scriptUrl)
    @if (strpos($scriptUrl, 'http://') !== false || strpos($scriptUrl, 'https://') !== false)
        <script src="{{ $scriptUrl }}"></script>
    @else
        <script src="{{ custom_asset($scriptUrl) }}"></script>
    @endif
@endforeach
<!-- END VENDOR JS -->
<!-- BEGIN CORE TEMPLATE JS -->
<script src="{{ custom_asset('pages/js/pages.min.js') }}"></script>
<!-- END CORE TEMPLATE JS -->
{{-- <script src="{{ custom_asset('assets/plugins/summernote/js/summernote.min.js') }}"></script> --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
<script>
    let baseUrlForJs = "{{ custom_asset('assets/js/charts.json') }}";
</script>
<!--toastr js-->
<script src="{{ asset("assets/plugins/toastr/toastr.min.js") }}"></script>
<!--high chart-->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<!--end -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- BEGIN PAGE LEVEL JS -->

<!--notification-->
<script src="https://www.gstatic.com/firebasejs/6.4.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.4.2/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.4.2/firebase-database.js"></script>

<!--helper-->
<script src="{{ custom_asset('js/helper_js.js') }}"></script>
<script src="{{ custom_asset('js/jquery.table2excel.js') }}"></script>

<!-- custom accessibility start -->
{{--<script src="{{ custom_asset('assets/plugins/accessibility/asb.js') }}"></script>--}}
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" />--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/js/all.min.js"></script>--}}
<!-- custom accessibility end -->
<script>
    let base_url = "{{ url('/') }}";
    // Initialize Firebase
    // Your web app's Firebase configuration
    let firebaseConfig = {
        apiKey: "AIzaSyDmmPHrkyTMzs1_FbSLrushWcKN-T25jLc",
        authDomain: "a2i-dashboard.firebaseapp.com",
        databaseURL: "https://a2i-dashboard.firebaseio.com",
        projectId: "a2i-dashboard",
        storageBucket: "a2i-dashboard.appspot.com",
        messagingSenderId: "776154843459",
        appId: "1:776154843459:web:487b86e1a35d323b"
    };
    firebase.initializeApp(firebaseConfig);

    firebase.database().ref("notifications/").orderByChild("to_user_id").equalTo({{ Auth::user()->id }})
        .on("value", function (snapshot) {
            // Read the value using foreach
            data = "";
            snapshot.forEach(function (childSnapshot) {
                // key will be "unique child name generated by firebase"
                var key = childSnapshot.key;
                // childData will be the actual contents of the child
                var childData = childSnapshot.val();
                if (childData.executed == 0) {
                    //console.log('Executed: ' + JSON.stringify(childData.messege));
                    //update_notification_statu();
                    // show the notfication in the div
                    data += '<div class="notification-item  clearfix">';
                    data += '<div class="heading">';

                    data += '<i class="fa fa-exclamation-triangle m-r-10"></i>';
                    data += '<span class="bold">' + childData.messege + '</span>';
                    if (childData.button == 1) {
                        link = base_url + '/' + childData.button_link;
                        data += '<a href="' + link + '" class="text-warning-dark pull-left">';
                        data += '<span class="fs-12 m-l-10">' + childData.button_value + '</span>';
                        data += '</a>';
                    }
                    //data +='<span class="pull-right time">yesterday</span>';
                    data += '</div>';
                    data += '<div class="option">';
                    data += '<a href="#" class="mark"></a>';
                    data += '</div>';
                    data += '</div>';


                } else {
                    //console.log('Not Executed: ' + JSON.stringify(childData));
                }
            });
            if (data != "") {
                $("#notification-buble").show();
            } else {
                $("#notification-buble").hide();
                $("#notification").html(data);
            }

            $("#notification").html(data);
        });

    //update data in firebase
    function update_notification_statu() {
        let childId = "-LnS-UAMI22dFIAY3x86"; // we can get this value from  html hidden element
        try {
            firebase.database().ref("notifications/").child(childId).update({
                'executed': 1
            })
            //console.log('hello');
        } catch (error) {
            console.log(error.message);
        }
    }

    window.smoothScroll = function (target) {
        let scrollContainer = target;
        do { //find scroll container
            scrollContainer = scrollContainer.parentNode;
            if (!scrollContainer) return;
            scrollContainer.scrollTop += 1;
        } while (scrollContainer.scrollTop == 0);

        let targetY = 0;
        do { //find the top of target relatively to the container
            if (target == scrollContainer) break;
            targetY += target.offsetTop;
        } while (target = target.offsetParent);

        scroll = function (c, a, b, i) {
            i++;
            if (i > 30) return;
            c.scrollTop = a + (b - a) / 30 * i;
            setTimeout(function () {
                scroll(c, a, b, i);
            }, 20);
        };
        // start scrolling
        targetY -= 100;
        scroll(scrollContainer, scrollContainer.scrollTop, targetY, 0);
    };

    let scrollingDiv = document.getElementById("scrollingTopDiv");
    scrollingDiv.addEventListener("scroll", myFunction);

    function myFunction() {
        let mybutton = document.getElementById("jumpToTop");
        let fixedElement1 = document.getElementById("fixedElement1");
        //document.getElementById("jumpToTop").innerHTML = "You scrolled in div.";
        let scrollingAmount = scrollingDiv.scrollTop;
        if(fixedElement1 != null){
            if (scrollingAmount > 20) {
                mybutton.style.display = "block";
                fixedElement1.style.position = "fixed";
                fixedElement1.style.top = "45px";
                fixedElement1.style.zIndex = 100;
            } else {
                mybutton.style.display = "none";
                fixedElement1.style.position = "static";
                fixedElement1.style.display = "flex";
            }
        }

    }

    function goBack() {
        window.history.back();
    }
</script>
<script>
    function show_box() {
        $('.das-m-sl, .other').show();
        return true;
    }

    $(document).mouseup(function (e) {
        var member_dropdown_hide = $(".das-m-sl, .other"); // YOUR member_dropdown_hide SELECTOR

        if (!member_dropdown_hide.is(e.target) // if the target of the click isn't the member_dropdown_hide...
            &&
            member_dropdown_hide.has(e.target).length === 0) // ... nor a descendant of the member_dropdown_hide
        {
            member_dropdown_hide.hide();
        }
    });
</script>
<!--end notification-->
<!--ajax loader-->
<script>
    // $(document).ready(function() {
    //     $(document).ajaxStart(function() {
    //         $(".page-container").css("opacity", "0.3");
    //         //$(".template-loader").show();
    //
    //     });
    //     $(document).ajaxComplete(function() {
    //         $(".page-container").css("opacity", "1");
    //         //$(".template-loader").delay( 900 ).hide();
    //     });
    //
    // });
</script>
<!--end-->


@stack('scripts')
<!-- END PAGE LEVEL JS -->

</body>

</html>
