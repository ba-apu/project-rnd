<ul class="main-navbar nav">
    <a href="{{ url('/') }}" class="p-1 ml-4"><img src="{{ custom_asset('assets/img/logo_white_new.png') }}"
                                                   alt="logo" width="100" height="30"></a>

    @if(isset($permission['SiteController@index']))
        @if(Auth::user()->role != 3)
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">{{ __('lavel.dashboard') }}</a></li>
        @else
            <li class="nav-item"><a class="nav-link" href="{{ url('dashboard/team-lead-main/' . Auth::user()->team) }}">{{ __('lavel.dashboard') }}</a></li>
        @endif
    @endif
    {{--
  @if(isset($permission['SiteController@project']))
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#">{{__('lavel.projects')}} <i class="fa fa-angle-down"></i></a>

          <ul class="dropdown-menu">
              @foreach(@App\Common::get_menu_item_for_project() as  $serviceKey => $service )
                  <li><a class="dropdown-item" href="{{ url('dashboard/'.$serviceKey) }}">{{ $service }}</a></li>
              @endforeach
          </ul>
      </li>
    @endif
    --}}
    @if(isset($permission['SiteController@project']))
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#">{{__('lavel.team')}} <i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu">
                @foreach(@App\Common::get_menu_item_for_category() as  $category_id => $service )
                    <li class="dropdown dropdown-toggle">
                        <a class="dropdown-item dropdown-toggle" href="#">{{ $service['name'] }}
                            <i class="arr-rt fa fa-angle-right"></i>
                            @if(isset($service['submenu'])) @endif </a>
                        @if(isset($service['submenu']))
                            <ul class="dropdown-menu submenu">
                                @forelse($service['submenu'] as $submenu)
                                    <li><a class="dropdown-item"
                                           href="{{ url('dashboard/'.$submenu['slug']) }}">{{ ($submenu['bangla_name'])?$submenu['bangla_name']:$submenu['name'] }}</a>
                                    </li>
                                @empty
                                    <li><a class="dropdown-item" href="#"></a></li>
                                @endforelse
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </li>
    @endif

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#">{{__('lavel.compare')}} <i class="fa fa-angle-down"></i></a>
        <ul class="dropdown-menu">
            @if(isset($permission['CompareController@index']))
                <li><a class="dropdown-item" href="{{ url('compare/indicator') }}">বিশেষায়িত তুলনা</a></li>
            @endif
            @if(isset($permission['MapController@index']))
                <li><a class="dropdown-item" href="{{ url('map/') }}"> ম্যাপ </a></li>
            @endif
        </ul>
    </li>

    {{--    @if(isset($permission['QprController@report']))--}}
    {{--        <li class="nav-item"><a class="nav-link" href="{{ url('qpr-report') }}">অগ্রগতি পর্যালোচনা</a></li>--}}
    {{--    @endif--}}

    @if(isset($permission['MonitoringController@top_level_monitoring']))
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="{{ url('monitoring/') }}">
                {{__('lavel.monitoring')}}
            </a>
        </li>
    @endif

    @if(Auth::user()->role != 5)
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#"> সেটিংস <i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu">
                @if(isset($permission['ProjectController@index']))
                    <li><a class="dropdown-item" href="{{ url('dashboard/project') }}">@lang('lavel.project')</a></li>
                @endif

                {{--
                @if(isset($permission['FileParseController@importData']))
                <li><a class="dropdown-item" href="{{ url('dashboard/import/importcsv') }}"> ইমপোর্ট </a></li>
                @endif

                @if(isset($permission['MakeSummeryToMongo@load_project']))
                <!--li><a class="dropdown-item" href="{{ url('dashboard/make-summery') }}"  > ডাটা সামারি   </a></li-->@endif

                @if(isset($permission['1']))
                <li><a class="dropdown-item" href="{{ url('dashboard/sector') }}"> সেক্টর  </a></li>
                @endif
                --}}

                @if(Auth::user()->role == 1)
                    @if(isset($permission['ProjectController@index']))
                        <li><a class="dropdown-item" href="{{ url('dashboard/project-categories') }}">@lang('lavel.project_category')</a></li>
                    @endif

                    @if(isset($permission['IndicatorController@index']))
                        <li><a class="dropdown-item" href="{{ url('dashboard/indicator') }}"> সূচক </a></li>
                    @endif

                    @if(isset($permission['SettingController@index']))
                        <li><a class="dropdown-item" href="{{ url('setting') }}"> সেটিংস </a></li>
                    @endif

                    @if(isset($permission['MonitoringSettingsController@index']))
                        <li><a class="dropdown-item" href="{{ url('monitoring/get-project-wise-monitoring/') }}"> মনিটরিং
                                সেটিংস </a></li>
                    @endif

                    @if(isset($permission['UserController@index']))
                        <li><a class="dropdown-item" href="{{ url('dashboard/user') }}"> ব্যবহারকারী </a></li>
                    @endif

{{--                    @if(isset($permission['RoleController@index']))--}}
{{--                        <li><a class="dropdown-item" href="{{ url('dashboard/role') }}"> ব্যবহারকারীর ভূমিকা </a></li>--}}
{{--                    @endif--}}

                    @if(isset($permission['GeneralQueriesController@index']))
                        <li><a class="dropdown-item" href="{{ url('general-queries') }}"> @lang('lavel.help_page') </a></li>
                    @endif

                    @if(isset($permission['ReloadData@index']))
                        <li><a class="dropdown-item" href="{{ url('reload-data') }}"> @lang('lavel.reload_data') </a></li>
                    @endif
                @endif

                @if(Auth::user()->role != 7)
                    @if(isset($permission['ManualDataAuthorizedController@index']))
                        <li><a class="dropdown-item" href="{{ url('manual-data-authorize') }}"> ম্যানুয়াল ডাটা অনুমোদন
                            </a></li>
                    @endif
                @endif

                @if(isset($permission['ManualDataEntryController@index']))
                    <li><a class="dropdown-item" href="{{ url('manual-data-entry') }}"> ম্যানুয়াল ডাটা এন্ট্রি </a></li>
                @endif
            </ul>
        </li>
    @endif

{{--    @if(Auth::user()->role == 1)--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link dropdown-toggle" target="_blank" href="{{url('http://dashboard-report.a2i.gov.bd/report/login-from-reg?data=' . $report_url)}}">--}}
{{--               রিপোর্ট--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    @endif--}}

    <li class="nav-item ml-auto">
        <div class="dropdown pt-1">
            <a href="javascript:;" id="notification-center" class="header-icon pg pg-world p-0"
               data-toggle="dropdown">
                <span class="bubble" style="display:none" id="notification-buble"></span>
            </a>
            <!-- START Notification Dropdown -->
            <div class="dropdown-menu notification-toggle" role="menu"
                 aria-labelledby="notification-center">
                <!-- START Notification -->
                <div class="notification-panel">
                    <!-- START Notification Body-->
                    <div class="notification-body scrollable" id="notification">
                        <!-- START Notification Item-->
                        <div class="notification-item unread clearfix">
                            <!-- START Notification Item-->
                        <!--div class="heading open">
                                                    <a href="#" class="text-complete pull-left">
                                                        <i class="pg-map fs-16 m-r-10"></i>
                                                        <span class="bold">Carrot Design</span>
                                                        <span class="fs-12 m-l-10">{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}</span>
                                                    </a>
                                                    <div class="pull-right">
                                                        <div class="thumbnail-wrapper d16 circular inline m-t-15 m-r-10 toggle-more-details">
                                                            <div><i class="fa fa-angle-left"></i>
                                                            </div>
                                                        </div>
                                                        <span class=" time">few sec ago</span>
                                                    </div>
                                                    <div class="more-details">
                                                        <div class="more-details-inner">
                                                            <h5 class="semi-bold fs-16">“Apple’s Motivation - Innovation <br>
                                                                distinguishes between <br>
                                                                A leader and a follower.”</h5>
                                                            <p class="small hint-text">
                                                                Commented on john Smiths wall.
                                                                <br> via pages framework.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div-->
                            <!-- END Notification Item-->
                            <!-- START Notification Item Right Side-->
                            <div class="option" data-toggle="tooltip" data-placement="left"
                                 title="mark as read">
                                <a href="#" class="mark"></a>
                            </div>
                            <!-- END Notification Item Right Side-->
                        </div>
                        <!-- START Notification Body-->
                        <!-- START Notification Item-->
                    {{-- <div id="notification_status" class="notification-item  clearfix">
                                    <div class="heading">
                                        <a href="#" class="text-danger pull-left">
                                            <i class="fa fa-exclamation-triangle m-r-10"></i>
                                            <span class="bold">     </span>

                                            <a href=" "><span class="fs-12 m-l-10"> </span></a>

                                        </a>
                                        <span class="pull-right time">2 mins ago</span>
                                    </div>
                                    <!-- START Notification Item Right Side-->
                                    <div class="option">
                                        <a href="#" class="mark"></a>
                                    </div>
                                    <!-- END Notification Item Right Side-->
                                </div> --}}

                    {{-- <!-- END Notification Item-->
                            <!-- START Notification Item-->
                            <div class="notification-item  clearfix">
                                <div class="heading">
                                    <a href="#" class="text-warning-dark pull-left">
                                        <i class="fa fa-exclamation-triangle m-r-10"></i>
                                        <span class="bold">Warning Notification</span>
                                        <span class="fs-12 m-l-10">Buy Now</span>
                                    </a>
                                    <span class="pull-right time">yesterday</span>
                                </div>
                                <!-- START Notification Item Right Side-->
                                <div class="option">
                                    <a href="#" class="mark"></a>
                                </div>
                                <!-- END Notification Item Right Side-->
                            </div>

                            <!-- END Notification Item-->
                            <!-- START Notification Item-->

                            <div class="notification-item unread clearfix">
                                <div class="heading">
                                    <div class="thumbnail-wrapper d24 circular b-white m-r-5 b-a b-white m-t-10 m-r-10">
                                        <img width="30" height="30" data-src-retina="{{ custom_asset('assets/img/profiles/1x.jpg') }}"
                        data-src="{{ custom_asset('assets/img/profiles/1.jpg') }}" alt=""
                        src="{{ custom_asset("assets/img/profiles/1.jpg") }}">
                    </div>
                    <a href="#" class="text-complete pull-left">
                        <span class="bold">Revox Design Labs</span>
                        <span class="fs-12 m-l-10">Owners</span>
                    </a>
                    <span class="pull-right time">11:00pm</span>
                </div>
                <!-- START Notification Item Right Side-->
                <div class="option" data-toggle="tooltip" data-placement="left" title="mark as read">
                    <a href="#" class="mark"></a>
                </div>
                <!-- END Notification Item Right Side-->
            </div>
            <!-- END Notification Item-->
        </div> --}}
                    <!-- END Notification Body-->
                        <!-- START Notification Footer-->
                        <!--div class="notification-footer text-center">
                                <a href="#" class="">Read all notifications</a>
                                <a data-toggle="refresh" class="portlet-refresh text-black pull-right" href="#">
                                    <i class="pg-refresh_new"></i>
                                </a>
                            </div-->
                        <!-- START Notification Footer-->
                    </div>
                    <!-- END Notification -->
                </div>
                <!-- END Notification Dropdown -->
            </div>
        </div>

    </li>
    <li class="nav-item">
        <a href="#" class="nav-search-link hidden-md-down" data-toggle="search"><i class="pg-search"></i><span
                    class="bold">অনুসন্ধান</span></a>
    </li>
    <li class="nav-item mr-5">
        <div class="d-flex align-items-center">
        <!-- <div class="text-white padding-15">
                        {{ @$date->bdDate . ',' . @$date->bdYear }}।  {{ @$date->enDate }}। {{ @$date->week_day }}, {{ @$date->bdSeason }} কাল।
                    </div> -->
            <!-- START User Info-->
            <div class="dropdown pull-left pt-2">
                <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    <span class="thumbnail-wrapper d32 circular inline sm-m-r-5">
                        <img src="{{ custom_asset('assets/img/profiles/avatar.jpg') }}" alt=""
                             data-src="{{ custom_asset('assets/img/profiles/avatar.jpg') }}"
                             data-src-retina="{{ custom_asset('assets/img/profiles/avatar.jpg') }}" width="32"
                             height="32">
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                    <a href="{{ url('change-password') }}" class="dropdown-item"><i class="pg-settings_small"></i>
                        @lang('lavel.change_password')</a>
                    {{-- <a href="#" class="dropdown-item"><i class="pg-outdent"></i> Feedback</a>
                        <a href="#" class="dropdown-item"><i class="pg-signals"></i> Help</a> --}}
                    <a href="{{ url('logout') }}" class="clearfix bg-master-lighter dropdown-item">
                        <span class="pull-left">@lang('lavel.logout')</span>
                        <span class="pull-right"><i class="pg-power"></i></span>
                    </a>
                </div>
            </div>
            <div class="pull-right fs-14">
                <p class="semi-bold" style="color:#912C8A">{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}</p>
            </div>


            <!-- END User Info-->
            <!-- <a href="#" class="header-icon pg pg-alt_menu btn-link m-l-10 sm-no-margin d-inline-block" data-toggle="quickview" data-toggle-element="#quickview"></a> -->
        </div>
    </li>


</ul>
