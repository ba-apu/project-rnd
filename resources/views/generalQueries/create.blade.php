<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta charset="utf-8"/>
    <title>অগ্রগতি</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no"/>
    <link rel="apple-touch-icon" href="pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description"/>
    <meta content="" name="author"/>

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
                    </div>
                </div>

                <div class="col box">
					<h4 class="text-cente mb-3">{{ Session::get('data') ?? ''}}</h4>
                    <h5>@lang('lavel.general_queries')</h5>
					<form action="{{url('general-queries')}}" {{-- class="form-horizontal" --}} role="form" method="POST"
                    data-toggle="validator">
                    @csrf

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-lg-12 control-label">@lang('lavel.name')</label>

                        <div class="col-md-12">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                            required title="@lang('lavel.this_field_is_required')"   autofocus>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-lg-12 control-label">@lang('lavel.email')</label>

                        <div class="col-md-12">
                            <input id="email" type="text" class="form-control" name="email"
                                value="{{ old('email') }}" required title="@lang('lavel.this_field_is_required')" required autofocus>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }}">
                        <label for="mobile_no" class="col-lg-12 control-label">@lang('lavel.mobile')</label>

                        <div class="col-md-12">
                            <input id="mobile_no" type="number" maxlength="11" oninput="this.value=this.value.replace(/[^0-9]/g,'');"  placeholder="xxxxxxxxxxx" class="form-control{{ $errors->has('mobile_no') ? ' is-invalid' : '' }}"  name="mobile_no"
                                value="{{ old('mobile_no') }}" required title="@lang('lavel.this_field_is_required')" autocomplete="mobile_no" autofocus >
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('mobile_no'))
                            <span class="help-block">
                                <strong>{{ $errors->first('mobile_no') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                        <label for="details" class="col-lg-12 control-label">@lang('lavel.details')</label>

                        <div class="col-md-12">
                            <textarea  id="details" type="text" class="form-control" name="details" style="height:80px""
                            required title="@lang('lavel.this_field_is_required')" value="{{ old('details') }}" required autofocus> </textarea>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('details'))
                            <span class="help-block">
                                <strong>{{ $errors->first('details') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-12 col-lg-12">
                            <button type="submit" class="btn">সাবমিট</button>
                            {{-- <button class="btn btn-primary btn-cons m-b-10" type="submit"><i class="pg-form"></i> <span
                                    class="bold">@lang('lavel.submit')</span>
                            </button> --}}
                        </div>
                    </div>
                </form>

                    <div class="partner text-center">

                        <div class="parnert-box">
							<img src="{{custom_asset('pages/img/allLogo.png')}}" alt="">
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
<script>
    $(function () {
        $('#form-login').validate()
    })
</script>
</body>
</html>
