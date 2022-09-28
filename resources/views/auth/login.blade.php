<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta charset="utf-8"/>
    <title>অগ্রগতি</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no"/>
    {{-- <link rel="apple-touch-icon" href="pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default"> --}}
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="" rel="stylesheet" type="text/css"/>
    <link href="{{ custom_asset('assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ custom_asset('assets/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ custom_asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ custom_asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ custom_asset('assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ custom_asset('pages/css/pages-icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ custom_asset('pages/css/themes/modern.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ custom_asset('pages/css/themes/login-style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ custom_asset('assets/plugins/accessibility/asb.css') }}" rel="stylesheet">

    <script type="text/javascript">
        window.onload = function () {
            // fix for windows 8
            if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
                document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="{{ custom_asset('pages/css/windows.chrome.fix.css') }}" rel="stylesheet" type="text/css" />'
        }
    </script>
</head>
<body class="fixed-header ">



<div class="login-wrap">
        <div class="login-box">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 box text-center">
                    <div class="login-title-box">
                        <img src="{{custom_asset('assets/img/a2i_logo.png')}}" alt="">
                        <h2>{{ get_settings('login_text')  }}</h2>
						<div class="text-white" style="font-size: 14px;text-align: right;padding-right: 30px;margin-top: 40px;">Maintenance By : <a href="https://www.ba-systems.com/" target="_blank"><img src="{{ custom_asset('assets/bat_logo.png') }}" class="mt-0 width-auto" style="width: auto;margin-top: -14px;position: relative;top: 0px;" height="25"></a></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 box">
                    <div class="hidden-section">
                        <img src="{{custom_asset('assets/img/a2i_logo.png')}}" alt="">
                        <h2>{{ get_settings('login_text')  }}</h2>
                    </div>

                    <h4 class="text-cente mb-3">{{ Session::get('message') ?? ''}}</h4>
                    <form method="POST" id="form-login" class="p-t-15" role="form" action="{{ route('login') }}">
                        @csrf
                        <h4 class="text-cente mb-3">প্রবেশ</h4>
                        <!-- <hr> -->
                        {{-- <small id="" class=" p-b-5 form-text text-danger">{{ $data ?? '' }}</small> --}}
                        <small id="" class=" p-b-5 form-text text-danger">{{ Session::get('data') ?? '' }}</small>

						@if ($errors->has('mobile_no'))
						<small id="" class=" p-b-5 form-text text-danger">{{ $errors->first('mobile_no') }}</small>
						@endif
                        <div class="form-group">
                            <!-- <label for="exampleInputEmail1">ই-মেইল</label> -->
                            <!-- <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="ই-মেইল"> -->


                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                </div>
                                {{-- <input id="email" type="text" placeholder="ই-মেইল" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required title="@lang('lavel.this_field_is_required')" autocomplete="email" autofocus > --}}
                                <input id="mobile_no" type="text" maxlength="11"
                                oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                placeholder="আপনার মোবাইল  নাম্বার" class="form-control{{ $errors->has('mobile_no') ? ' is-invalid' : '' }}"
                                name="mobile_no" value="{{ old('mobile_no') }}"
                                required title="@lang('lavel.this_field_is_required')" autocomplete="mobile_no" autofocus >
                            </div>



                        </div>
                        <div class="form-group">
                            <!-- <label for="exampleInputPassword1">পাসওয়ার্ড</label> -->
                            <!-- <input type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="পাসওয়ার্ড"> -->
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                </div>
                                <input id="password" type="password" placeholder="পাসওয়ার্ড"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                name="password" required title="@lang('lavel.this_field_is_required')"
                                autocomplete="current-password">
                            </div>

                            @if ($errors->has('password'))
                                <small id="" class="form-text text-danger">{{ $errors->first('password') }}</small>
                            @endif
                        </div>


                        <a class="any-problem text-right float-right mb-2" href="{{ url('forget-password') }}">@lang('lavel.forget_password')</a>
                        <a class="any-problem text-right float-left mb-2" href="{{ url('general-queries/create') }}">@lang('lavel.help')</a>


                        <button type="submit" class="btn">Login</button>
                    </form>
                    {{-- {{dd($errors)}} --}}
                    <div class="partner text-center">

                        <div class="parnert-box">
							<img src="{{custom_asset('pages/img/a2i_logoset.png')}}" alt="" style="width:100%;">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<!-- BEGIN VENDOR JS -->
<script src="{{ custom_asset('assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
<script src="{{ custom_asset('assets/plugins/jquery/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
<script src="{{ custom_asset('assets/plugins/modernizr.custom.js') }}" type="text/javascript"></script>
<script src="{{ custom_asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ custom_asset('assets/plugins/tether/js/tether.min.js') }}" type="text/javascript"></script>
<script src="{{ custom_asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ custom_asset('assets/plugins/jquery/jquery-easy.js') }}" type="text/javascript"></script>
<script src="{{ custom_asset('assets/plugins/jquery-unveil/jquery.unveil.min.js') }}" type="text/javascript"></script>
<script src="{{ custom_asset('assets/plugins/jquery-ios-list/jquery.ioslist.min.js') }}" type="text/javascript"></script>
<script src="{{ custom_asset('assets/plugins/jquery-actual/jquery.actual.min.js') }}" type="text/javascript"></script>
<script src="{{ custom_asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}" type="text/javascript"></script>
<script src="{{ custom_asset('assets/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ custom_asset('assets/plugins/classie/classie.js') }}" type="text/javascript"></script>
<script src="{{ custom_asset('assets/plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script>
<script src="{{ custom_asset('assets/plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script>
<script src="{{ custom_asset('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<!-- END VENDOR JS -->
<script src="{{ custom_asset('pages/js/pages.min.js') }}" type="text/javascript"></script>


<!-- custom accessibility start -->
{{--<script src="{{ custom_asset('assets/plugins/accessibility/asb.js') }}"></script>--}}
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" />--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/js/all.min.js"></script>--}}
<!-- custom accessibility end -->

<script>
    $(function () {
        $('#form-login').validate()
    });

    $( "#mobile_no").keydown(function( e ) {
        if (e.keyCode === 9) {
            var mobile_no = $('#mobile_no').val();
            if (mobile_no == "" || mobile_no.length != 11) {
                e.preventDefault();
                alert('Mobile number should be 11 digit');
            }
        }
    });
</script>

<div id="batworld"></div>
<script>
    window.ba_sw_id = '66efc09d-60b0-4031-bca1-6bc2c0206cf5';
    var s1 = document.createElement('script');
    s1.setAttribute('src', 'https://feedback.oss.net.bd/src/0.1.3/social_widget_link.js');
    document.body.appendChild(s1);
</script>

</body>
</html>
