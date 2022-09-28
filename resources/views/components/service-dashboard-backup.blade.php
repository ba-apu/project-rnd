@extends('layout.frontend')
@section('content')
    <div class="content sm-gutter">
        <!-- START BREADCRUMBS -->
        <!--div class="bg-white">
            <div class="container-fluid">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">হোম </a></li>
                    <li class="breadcrumb-item active">ডিজিটাল সেন্টার</li>
                </ol>
            </div>
        </div-->
        <!-- END BREADCRUMBS -->

        <!-- START CONTAINER FLUID -->
        <div class="container-fluid padding-25 sm-padding-10">

            <!-- Service Status Starts -->
            <div class="row m-b-20">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-md-12 m-b-10">
                            <!-- START WIDGET D3 widget_graphTileFlat-->
                            <div class="widget-8 card no-border bg-warning no-margin widget-loader-bar">
                                <div class="container-xs-height full-height">
                                    <div class="row-xs-height">
                                        <div class="col-xs-height col-top">
                                            <div class="card-header  top-left top-right">
                                                <div class="card-title text-black hint-text">
                                                        <span class="fs-14 all-caps">সর্ব মোট সেবা প্রদান <i
                                                                class="fa fa-chevron-right"></i>
                                                        </span>
                                                </div>
                                                <div class="card-controls">
                                                    <ul>
                                                        <li>
                                                            <a data-toggle="refresh" class="card-refresh text-black"
                                                               href="#"><i class="card-icon card-icon-refresh"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-xs-height ">
                                        <div class="col-xs-height col-top relative">
                                            <div class="p-l-20">
                                                <span class=" h3 no-margin p-b-5 text-black">{{ \App\Common::randSingleNum(150000, 3500000) }} টি</span>
                                                <span class=" text-white">
                                                    <i class="fa fa-caret-up m-l-10"></i> {{ \App\Common::randSingleNum(5, 15) }}%
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 m-b-10">
                            <!-- START WIDGET D3 widget_graphTileFlat-->
                            <div class="widget-8 card no-border bg-success no-margin widget-loader-bar">
                                <div class="container-xs-height full-height">
                                    <div class="row-xs-height">
                                        <div class="col-xs-height col-top">
                                            <div class="card-header  top-left top-right">
                                                <div class="card-title text-black hint-text">
                                                        <span class="fs-14 all-caps">সর্ব মোট {{@$serviceProviderInfo[0]}} <i
                                                                class="fa fa-chevron-right"></i>
                                                        </span>
                                                </div>
                                                <div class="card-controls">
                                                    <ul>
                                                        <li>
                                                            <a data-toggle="refresh" class="card-refresh text-black"
                                                               href="#"><i class="card-icon card-icon-refresh"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-xs-height ">
                                        <div class="col-xs-height col-top relative">
                                            <div class="p-l-20">
                                                <span class=" h3 no-margin p-b-5 text-black">{{ \App\Common::randSingleNum(5000, 9000) }} জন</span>
                                                <span class=" text-white">
                                                    <i class="fa fa-caret-up m-l-10"></i> {{ \App\Common::randSingleNum(5, 15) }}%
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 m-b-10">
                            <!-- START WIDGET D3 widget_graphTileFlat-->
                            <div class="widget-8 card no-border bg-info-lighter no-margin widget-loader-bar">
                                <div class="container-xs-height full-height">
                                    <div class="row-xs-height">
                                        <div class="col-xs-height col-top">
                                            <div class="card-header  top-left top-right">
                                                <div class="card-title text-black hint-text">
                                                    <span class="fs-14 all-caps">সর্ব মোট সেবা গ্রহীতা <i
                                                            class="fa fa-chevron-right"></i></span>
                                                </div>
                                                <div class="card-controls">
                                                    <ul>
                                                        <li>
                                                            <a data-toggle="refresh" class="card-refresh text-black"
                                                               href="#"><i class="card-icon card-icon-refresh"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-xs-height ">
                                        <div class="col-xs-height col-top relative">
                                            <div class="p-l-20 p-r-20">
                                                <span class=" h3 no-margin p-b-5 text-black">{{ \App\Common::randSingleNum(150000, 3500000) }} জন</span>
                                                <span class=" text-white pull-right">
                                                    <i class="fa fa-caret-up m-l-10"></i> {{ \App\Common::randSingleNum(5, 15) }}%
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-xs-height ">
                                        <div class="col-xs-height col-top relative">
                                            <div class="p-l-20 p-r-20">
                                                <div class="devider"></div>
                                                <div class="row">
                                                    <div class="col-md-6 text-center">
                                                        <h6 class="no-margin text-black">পুরুষ </h6>
                                                        <h4 class="no-margin text-black ">{{ \App\Common::randSingleNum(150000, 2000000) }}</h4>
                                                    </div>
                                                    <div class="col-md-6 text-center">
                                                        <h6 class="no-margin text-black">মহিলা</h6>
                                                        <h4 class="no-margin text-black">{{ \App\Common::randSingleNum(150000, 2000000) }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-sm-6 d-flex flex-column bg-white">
                    <ul class="nav nav-tabs nav-tabs-simple nav-tabs bg-white" id="tab-3">
                        <li class="nav-item">
                            <a href="#" class="active" data-toggle="tab" data-target="#total-stat">সার্বিক</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" data-toggle="tab" data-target="#tab3hellowWorld">সার্বিক সেবা প্রদান </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" data-toggle="tab" data-target="#tab3FollowUs">সেবা ভিত্তিক</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" data-toggle="tab" data-target="#udc_based">{{@$serviceProviderInfo[0]}} ভিত্তিক</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" data-toggle="tab" data-target="#udc_active">সর্বমোট এবং সক্রিয় {{@$serviceProviderInfo[0]}} </a>
                        </li>
                    </ul>
                    <div class="card card-transparent flex-row" id="servie-provide">
                        <div class="tab-content bg-white">
                            <div class="tab-pane active" id="total-stat">
                                <div id="service-indicator"></div>
                            </div>
                            <div class="tab-pane" id="tab3hellowWorld">
                                <div id="service-provide"></div>
                            </div>
                            <div class="tab-pane bg-white" id="tab3FollowUs">
                                <div id="container"></div>
                            </div>
                            <div class="tab-pane bg-white" id="udc_based">
                                <div id="institute-container"></div>
                            </div>
                            <div class="tab-pane bg-white" id="udc_active">
                                <div id="user-container"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white clearfix">
                        <div class="pull-left">বিস্তারিত</div>
                        <div class="pull-right">
                            <select class="cs-select cs-skin-slide" data-init-plugin="cs-select">
                                <option value="sightseeing">বিভাগ</option>
                            </select>
                            <select class="cs-select cs-skin-slide" data-init-plugin="cs-select">
                                <option value="sightseeing">জেলা</option>
                            </select>
                            <select class="cs-select cs-skin-slide" data-init-plugin="cs-select">
                                <option value="sightseeing">উপজেলা</option>
                            </select>
                            <select class="cs-select cs-skin-slide" data-init-plugin="cs-select">
                                <option value="sightseeing">সেবা সমূহ</option>
                                @foreach($serviceLists as $serviceList)
                                    <option value="">{{ $serviceList }}</option>
                                @endforeach
                            </select>
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default btn-xs ">
                                    <input type="radio" name="options" id="option2"> গত ৭ দিন
                                </label>
                                <label class="btn btn-default btn-xs active">
                                    <input type="radio" name="options" id="option1" checked> ৩০ দিন
                                </label>
                                <label class="btn btn-default btn-xs ">
                                    <input type="radio" name="options" id="option2"> ৩ মাস
                                </label>
                                <label class="btn btn-default btn-xs">
                                    <input type="radio" name="options" id="option3"> বছর
                                </label>
                                <label class="btn btn-default btn-xs">
                                    <input type="radio" name="options" id="option3">পছন্দ মত
                                </label>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- Service Status End -->

            @if($serviceProviderInfo[2] == 'business')
            <!-- START ROW -->
            <div class="row m-b-20">
                <div class="col-lg-9 col-sm-12 d-flex flex-column bg-white">
                    <ul class="nav nav-tabs nav-tabs-simple nav-tabs bg-white" id="tab-4">
                        <li class="nav-item">
                            <a href="#" class="active" data-toggle="tab" data-target="#total_agv">সম্মিলিত দৈনিক গড় লেনদেন</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" data-toggle="tab" data-target="#udc_avg">  {{ @$serviceProviderInfo[0] }}দের  দৈনিক লেনদেন</a>
                        </li>
                    </ul>
                    <div class="card card-transparent flex-row" >
                        <div class="tab-content bg-white" id="business-box">
                            <div class="tab-pane active" id="total_agv">
                                <div id="udc-income-container"></div>
                            </div>
                            <div class="tab-pane bg-white" id="udc_avg">
                                <div id="udc-personal-income-container"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white clearfix">
                        <div class="pull-left">বিস্তারিত</div>
                        <div class="pull-right">
                            <div class="btn-group" data-toggle="buttons">


                                <label class="btn btn-default btn-xs ">
                                    <input type="radio" name="options" id="option2"> গত ৭ দিন
                                </label>
                                <label class="btn btn-default btn-xs active">
                                    <input type="radio" name="options" id="option1" checked> ৩০ দিন
                                </label>
                                <label class="btn btn-default btn-xs ">
                                    <input type="radio" name="options" id="option2"> ৩ মাস
                                </label>
                                <label class="btn btn-default btn-xs">
                                    <input type="radio" name="options" id="option3"> বছর
                                </label>
                                <label class="btn btn-default btn-xs">
                                    <input type="radio" name="options" id="option3">পছন্দ মত
                                </label>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-md-12 m-b-10">
                            <!-- START WIDGET D3 widget_graphTileFlat-->
                            <div class="widget-8 card no-border bg-warning no-margin widget-loader-bar">
                                <div class="container-xs-height full-height">
                                    <div class="row-xs-height">
                                        <div class="col-xs-height col-top">
                                            <div class="card-header  top-left top-right">
                                                <div class="card-title text-black hint-text">
                                                        <span class="fs-14 all-caps">সর্ব মোট লেনদেন <i
                                                                class="fa fa-chevron-right"></i>
                                                        </span>
                                                </div>
                                                <div class="card-controls">
                                                    <ul>
                                                        <li>
                                                            <a data-toggle="refresh" class="card-refresh text-black"
                                                               href="#"><i class="card-icon card-icon-refresh"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-xs-height ">
                                        <div class="col-xs-height col-top relative">
                                            <div class="p-l-20">
                                                <span class=" h3 no-margin p-b-5 text-black">{{ \App\Common::randSingleNum(500000000, 900000000) }} টাকা</span>
                                                <span class=" text-white">
                                                    <i class="fa fa-caret-up m-l-10"></i> ৯%
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 m-b-10">
                            <!-- START WIDGET D3 widget_graphTileFlat-->
                            <div class="widget-8 card no-border bg-success no-margin widget-loader-bar">
                                <div class="container-xs-height full-height">
                                    <div class="row-xs-height">
                                        <div class="col-xs-height col-top">
                                            <div class="card-header  top-left top-right">
                                                <div class="card-title text-black hint-text">
                                                        <span class="fs-14 all-caps">দৈনিক গড় লেনদেন <i
                                                                class="fa fa-chevron-right"></i>
                                                        </span>
                                                </div>
                                                <div class="card-controls">
                                                    <ul>
                                                        <li>
                                                            <a data-toggle="refresh" class="card-refresh text-black"
                                                               href="#"><i class="card-icon card-icon-refresh"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-xs-height ">
                                        <div class="col-xs-height col-top relative">
                                            <div class="p-l-20">
                                                <span class=" h3 no-margin p-b-5 text-black">{{ \App\Common::randSingleNum(10000000, 20000000) }} টাকা</span>
                                                <span class=" text-white">
                                                    <i class="fa fa-caret-up m-l-10"></i> ৭%
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 m-b-10">
                            <!-- START WIDGET D3 widget_graphTileFlat-->
                            <div class="widget-8 card no-border bg-info-lighter no-margin widget-loader-bar">
                                <div class="container-xs-height full-height">
                                    <div class="row-xs-height">
                                        <div class="col-xs-height col-top">
                                            <div class="card-header  top-left top-right">
                                                <div class="card-title text-black hint-text">
                                                    <span class="fs-14 all-caps">গড়ে আয় ৩০,০০০/= এর বেশি  <i
                                                            class="fa fa-chevron-right"></i></span>
                                                </div>
                                                <div class="card-controls">
                                                    <ul>
                                                        <li>
                                                            <a data-toggle="refresh" class="card-refresh text-black"
                                                               href="#"><i class="card-icon card-icon-refresh"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-xs-height ">
                                        <div class="col-xs-height col-top relative">
                                            <div class="p-l-20 p-r-20">
                                                <span class=" h3 no-margin p-b-5 text-black">{{ \App\Common::randSingleNum(100, 200) }}জন</span>
                                                <span class=" text-white pull-right">
                                                    <i class="fa fa-caret-up m-l-10"></i> ৩%
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 m-b-10">
                            <!-- START WIDGET D3 widget_graphTileFlat-->
                            <div class="widget-8 card no-border bg-primary no-margin widget-loader-bar">
                                <div class="container-xs-height full-height">
                                    <div class="row-xs-height">
                                        <div class="col-xs-height col-top">
                                            <div class="card-header  top-left top-right">
                                                <div class="card-title text-white hint-text">
                                                    <span class="fs-14 all-caps">গড়ে আয় ৩০,০০০/= এর বেশি  <i
                                                            class="fa fa-chevron-right"></i></span>
                                                </div>
                                                <div class="card-controls">
                                                    <ul>
                                                        <li>
                                                            <a data-toggle="refresh" class="card-refresh text-black"
                                                               href="#"><i class="card-icon card-icon-refresh"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-xs-height ">
                                        <div class="col-xs-height col-top relative">
                                            <div class="p-l-20 p-r-20">
                                                <span class=" h3 no-margin p-b-5 text-white">৩০জন</span>
                                                <span class=" text-white pull-right">
                                                    <i class="fa fa-caret-up m-l-10"></i> ৩%
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END ROW -->
            @endif

            <!-- START ROW -->
            <div class="row">
                <div class="col-lg-12 col-sm-12 d-flex flex-column">
                    <!-- Service Status -->
                    <div class="card social-card share  full-width m-b-10 no-border" data-social="item">
                        <div class="card-header border-bottom">
                            <span class="h5 text-primary pull-left fs-16">সারাদেশ</span>
                            <div class="pull-right">
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default btn-xs ">
                                        <input type="radio" name="options" id="option2"> গত ৭ দিন
                                    </label>
                                    <label class="btn btn-default btn-xs active">
                                        <input type="radio" name="options" id="option1" checked> ৩০ দিন
                                    </label>
                                    <label class="btn btn-default btn-xs ">
                                        <input type="radio" name="options" id="option2"> ৩ মাস
                                    </label>
                                    <label class="btn btn-default btn-xs">
                                        <input type="radio" name="options" id="option3"> বছর
                                    </label>
                                    <label class="btn btn-default btn-xs">
                                        <input type="radio" name="options" id="option3">পছন্দ মত
                                    </label>
                                </div>
                            </div>
                            <div class="pull-right m-r-20">
                                <select class="cs-select cs-skin-slide" data-init-plugin="cs-select">
                                    <option value="sightseeing">সেবা সমূহ</option>
                                    @foreach($serviceLists as $serviceList)
                                        <option value="">{{ $serviceList }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-description">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Map SVG Starts -->
                                    <div class="main-map">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             viewBox="0 0 800 1000"
                                             style="enable-background:new 0 0 800 1000;" xml:space="preserve">

<path class="st0" d="M192.8,489.1c-0.7,0-1.4,0-2.1,0"></path>

                                            <a href=" {{ url("dashboard/service/".$service."/district") }}//8626">
                                                <g id="dist_324">
                                                    <path class="st0" d="M443.3,661.8c-3.4,2.6-2.8,7.3-2.8,11.5c0,4.1-2.5,8.2-0.9,12.1c1.6,3.9,5.5,5.6,8.5,8.5
			c6,5.6,6.8,15.8,8.3,23.3c1.7,8.3,4,16.3,3.6,25c-0.2,3.2-0.8,6.4-2.5,9.3c-1.4,2.5-3.4,4.7-4.4,7.4c-1.3,3.4-0.5,6.6,3.1,7.5
			c1.6,0.4,3.4-0.4,4.1,1.6c0.6,1.5-0.6,4.4-0.6,6.1c0,2.5-0.1,4.6,1.7,6.5c1.1-0.8,1.4-2.8,2.5-3.3c1.5-0.6,3.5,1.2,5.4,0.8
			c0.9,0.9,1,2.2,0.9,3.5c3.6,0.1,5.6-7.4,7.2-10.1c2.4-4.2,2.2-7.8,2.4-12.6c0.2-4.5,0.8-8.5,0.6-13.2c-0.1-2.6-0.6-3.9,0.2-6.3
			c0.6-1.7,1.5-3.4,1.7-5.2c0.6-5,1.3-11.3,0.8-16.5c-0.3-3-1.9-5.1-3.8-7.2c-1.8-1.9-5.8-3.2-6.7-5.8c-0.5-1.4,0.4-3.5,0.1-5.1
			c-0.3-1.8-1.1-3.4-2.1-4.9c-1.4-1.9-0.8-3.3-2-5.2c-0.9-1.5-3-2.5-4.5-3.2c-3.4-1.7-5.8-3.3-6.5-7.2c-1.2-5.9-2.2-10.6-5.3-15.9
			c-1.2-2-0.9-6.9-3.7-6.9C446.2,656.4,445,660.5,443.3,661.8z"></path>
                                                    <path class="st0"
                                                          d="M462.2,673.2c-1.4,2.1-0.2,5.8,0.6,8.5c5.5,3.7,1.6-11-0.6-8.2"></path>
                                                    <path class="st0" d="M483.1,692.2c-1.3-1.5-2.8-1.2-4.6-1.1c-1.3,2.2,0.1,2.7,1.3,4.3c1.1,1.5,1.2,3.9,3.1,4.5
			c2.1,0.6,3.3-1.7,3-3.6c-0.2-1.6-2-2.8-3-4.1"></path>
                                                    <path class="st0" d="M501.5,735.3c-0.5,2.7-0.5,5-2.8,7.3c-1.2,1.2-2.7,1.5-3.3,3.1c-0.5,1.4-0.2,3.7,1.7,3.5c1-0.1,5-5.2,5.6-5.9
			c1.4-2,1.7-6.7-1.4-7.2"></path>
                                                    <path class="st0" d="M502.3,755.6c3.6-3.1-4.6-6.1-6.1-0.8c-0.6,2.2,0.1,4.4-0.9,6.6c-0.8,1.8-2.4,3.1-2.9,5
			c-0.6,2.1,0,4.1,0.2,6.3c0.2,1.6-0.2,5.8,2.1,3.5c1.6-1.6,0.6-4.5,1.1-6.3c0.5-1.8,1.2-4.2,1.9-5.8
			C498.9,761.8,503,758.2,502.3,755.6"></path>
                                                    <path class="st0" d="M455.1,772.3c0.5-2.8-4-1.3-4.9,0.6c-0.9,1.9-0.2,6.3,0.2,8.5c0.9,4.3,2-1.1,3.3-2.8c1.1-1.6,1.9-1.1,2.2-3.2
			c0.2-1.3,0.1-3.1-1.1-3.3"></path>
                                                    <path class="st0" d="M463.9,788.8c0-0.4,0-0.7,0-1c-4.2-1.5-4.7,2.1-5.4,5.2c-0.4,1.6-0.6,2.8-1.6,4.2c-0.9,1.3-2.9,2-2,4
			c3.6-2.4,10.7-6.9,8.8-12.1"></path>
                                                    <path class="st0" d="M492.7,737.2c-2.7-1.2-2.3,2.4-2.9,3.9c-0.7,1.5-3.4,3.1-1.5,4.9c1.8-0.7,5.1-5.7,4.6-7.7
			c-0.3-0.1-0.5-0.2-0.8-0.3"></path>
                                                    <path class="st0"
                                                          d="M487.2,731.7c-1-0.1-2.7,6.6-3,8.2c2.5,1.5,5-6.4,2.4-7.9"></path>
                                                    <path class="st0"
                                                          d="M506.4,743.2c-1,0.5-1.7,6.4,0.2,7.4c0.6-1.4,1-6.6-0.8-6.8"></path>
                                                    <text transform="matrix(1 0 0 1 459.3449 724.716)" class="st1 st2">ভোলা
                                                    </text>
                                                </g>
                                            </a>

                                            <path class="st0"
                                                  d="M280.3,301.4c-0.2,0.6-0.4,1.3-0.5,2C280,302.7,280.3,302.1,280.3,301.4z"></path>
                                            <path class="st0"
                                                  d="M438.6,603.4c0.1-0.3,0.1-0.6,0.2-0.8c-0.1,0-0.3,0.1-0.4,0.1C438.5,602.9,438.6,603.1,438.6,603.4z"></path>
                                            <path class="st0"
                                                  d="M302,443.5c-0.3,0.2-0.6,0.4-0.8,0.5C301.4,443.9,301.7,443.7,302,443.5L302,443.5z"></path>
                                            <path class="st0" d="M294.1,229.2c0.3,0.2,0.6,0.4,1,0.5c0-2.7-0.2-5.4-0.3-8.2c-0.1-2.1-0.6-3.7-1.5-4.9c0.4,1.6,0.8,3.2,0.9,4.5
	C294.2,222.7,295,227,294.1,229.2z"></path>
                                            <path class="st0"
                                                  d="M463.4,471.2c0,0.5,0.1,1,0.2,1.4C464,472.6,463.5,472.1,463.4,471.2z"></path>
                                            <path class="st0"
                                                  d="M299.1,192c0,0.6,0,1.1-0.1,1.7C299.1,193.2,299.2,192.6,299.1,192z"></path>
                                            <path class="st0"
                                                  d="M294.5,210.7c0.6-1,0.8-2.1,1-3.3c-0.8,1.1-1.7,2.1-2.3,3.2C293.7,210.6,294.1,210.6,294.5,210.7z"></path>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8664">
                                                <g id="dist_274">
                                                    <g>
                                                        <path class="st0" d="M210.2,786.9c0,4.7-8.5,1.8-6.6,8c1,3.1,6.6,6.6,4.1,10.4c0,0,0.4,0.5,0.4,0.5c0.6-0.2,1.5-0.7,1.8-1.1
				c-0.3-3.6,2.9-1.7,4.4-2.2c2.6-0.9,1.2-3,1.1-5.4c-0.1-2.3,0.4-3.5-1.4-5.5c-0.6-0.7-1.6-1.3-2.3-2.1c-0.7-0.9-0.2-1.9-1.6-2.3"></path>
                                                        <path class="st0" d="M232.3,803.4c1.1,1.7,3.1,2.5,4,4.3c0.8,1.7,0.7,4.1,1.1,6c0.9,4.2-0.8,8.6,1.1,12.7c0.9,1.8,2.7,3.3,2.9,5.5
				c0.2,2.1-0.9,4.6-1.3,6.6c-0.7,3.8-0.9,7.6,0.6,11.2c1.8,4.5,4.2-0.8,5.9-2.5c2.2-2.3,5.4-2.6,4.5-6.5c-0.6-2.6-2.1-5.2-2.8-7.7
				c-1.3-5.6-1.2-11.7-1.6-17.5c-1.1-2.8-4.4-3.9-4.7-5.5c-3.6-1.7-3.7-4.9-3.7-8.3c0-2.8-0.9-7.8-5.1-6.4
				C230,796.3,230.9,801.2,232.3,803.4z"></path>
                                                        <path class="st0" d="M242.3,782.8c-1.2,0.2-0.2,5.6-1,7.2c-1.3,2.6-3.5,4.6,0.2,6.8c0.5,2-0.5,7.9,3.3,6.3
				c1.7-0.7,1.2-2.3,1.6-3.6c0.5-1.6,0.8-2.1,1.9-3.6c2.2-3.2,1.1-4.5-0.6-7.7c-1.2-2.3-2.6-5.3-5.9-4.9c-0.1,0.3,0,0.5,0,0.8"></path>
                                                        <path class="st0" d="M224.7,803.9c-4.2-2.5-3.9,7.5-3,9.6c0.7,1.7,2.3,3.1,3.2,4.7c0.9,1.7,1.1,3.8,2.1,5.3
				c1.3,2.1,2.8,3.5,4.1,0.9c0.9-2-0.3-4.3-0.3-6.3c0-2.1,0.8-4.2,0.2-6.3c-0.6-2.2-2.7-3.9-4.3-5.5
				C225.7,805.4,226.3,804.1,224.7,803.9"></path>
                                                        <path class="st0" d="M215.1,812.7c3.9,3.6,2.1,7,3,11.8c0.9,4.4,6.9,5.3,7.7,9c1.2,5.5-6,0.4-7.4-1.4c-2.8-3.8-2.8-6.9-2.5-11.2
				c0.1-1.3,0.1-2.7-0.3-3.9c-0.6-1.3-2-1.7-1.8-3.3c0.5-0.2,0.2-1.2,0.7-1.1"></path>
                                                    </g>
                                                    <path class="st0" d="M242.2,767.2c-0.5-1.8-0.2-3.4-1.7-4.9c-1.2-1.2-2.8-0.8-3.3-3c-0.5-2.2,0.9-2.6,2.3-4.1
			c1.4-1.5,1.7-2.7,2.6-4.5c1.2-2.2,3.7-4.8,3.2-7.5c-0.5-2.9-3.4-4.2-2.3-7.6c0.6-2,2.2-2.2,2.2-4.7c0.1-4.3-4.4-4.5-7.1-6.9
			c-3.5-3.1-0.2-7.3-1.1-11.3c-0.4-1.8-2.2-3-2.7-4.7c-0.7-2.1,0-3.7,0.8-5.5c1.9-4.1,3.2-6.8,0.2-10.9c-2.8-3.9-4.4-5.3-2.2-10
			c0.7-1.5,2.1-3.4,1.7-5.2c-0.4-2.1-2.8-2.2-3.6-3.9c-0.9-2,0.4-4.6,2.7-4.4c2,0.2,3.3,3.1,5.3,0.6c-0.5-1.5-2.4-1.7-2.8-3
			c-0.4-1.6,1.2-2.9,2.2-3.8c1.9-1.5,7.4-3.7,5.7-6.9c-2.9-1.6-3.9-3.7-6.3-5.8c-1.3-1.1-2.4-1.7-3.5-2.8c-1-1.1-1.6-1.9-2.3-3.2
			c-0.7-1.2-1.1-2.5-1.4-3.9c0,0,0,0-0.1,0c-1.8,0.7-3.5,0-5.1,0.5c-1.5,0.4-2.3,2-3.3,3.1c-2,2.2-4.3,3.4-6.4,0.3
			c-1.3-2-2.7-3.4-4.2-5.2c-1.7-2.1-0.9-5.3-0.8-7.9c0.2-5.7-6.9-3.4-9.7-2.7c-1.5,0.4-3.5,0-4.7-0.5c-1.4-0.6-1.9-2.1-3.1-2.5
			c-1.6-0.6-3.2,0.7-4.4,1.8c-1.5,1.3-2.3,1.9-4.3,2.1c-1.1,0.1-3.8,0.7-4.6,0.3c-1.7-0.8-0.6-3.3-1.6-4.4c-0.1-0.2-0.3-0.3-0.6-0.5
			c-0.7,1.9-0.7,4.1,0.3,6.4c0.7,1.6,2.3,3.4,3.6,4.4c1.8,1.5,4.1,1.4,5.8,2.5c4.1,2.7,2.6,8.7-0.1,11.6c-2.7,2.8-6.9,5-5.9,9.5
			c1,4.1,6.5,5.1,5,10.2c-0.5,1.9-2.3,3.3-1.5,5.5c0.8,2.2,2.6,2,2.3,4.7c-0.2,2.2-1.7,3.5-0.9,6c0.7,2,2.6,2.8,3.6,4.7
			c1.4,2.5-0.1,4.9,1.2,7.4c1.2,2.4,3.5,3.3,3.9,6.3c0.4,2.9-0.9,4.8-1.3,7.4c-0.5,3.1,0.8,6.3,1.1,9.4c0.4,3.3,0.1,7.3,2.1,10.1
			c2.4,3.4,4.8,6.6,6.1,10.7c1.3,4.1,2.7,6.7,6.3,9.6c5.1,4.1,0.5,5.3-2.3,8.8c-4.6,5.8,2.2,15.2,6.1,20.1c2.5,3.1,3.8,6.2,5.4,9.7
			c1.9,4.1,0.8,7.3,0.6,11.5c2.3,0.8,7.6-2.3,8.3-4.6c0.6-2.1-0.3-4.4-1.1-6.4c-1.4-3.7-3.7-7-5.1-10.6c-0.8-2-1.2-4.1-1.9-6
			c-0.4-1.2-2.8-4.1-1.9-5.5c2.3-3.8,7.1,4.1,7.7,5.8c0.7,2.1,0.9,3.9,2.1,5.8c1,1.7,2.3,3,3.2,4.8c1.6,3.1,4.5,8.2,6.5,2
			c0.7-2.2-0.2-3.5,0-5.8c0.4-4.4,1.7-0.8,4.1-1.4c1.3-0.3,3-4,3.3-5.2c0.2-0.8,0.2-1.6,0.2-2.5C242.9,770.4,242.7,769.1,242.2,767.2
			z"></path>

                                                    <text transform="matrix(1 0 0 1 172.1432 690.524)" class="st1 st2">
                                                        সাতক্ষীরা
                                                    </text>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8658">
                                                <g id="dist_90">
                                                    <g>
                                                        <g>
                                                            <path class="st0" d="M275.5,790.7c-2.4-0.5-1.3,8.5-0.5,10.1c0.4,0.9,2.2,3.2,2.7,3.9c1,1.3,2.9,2.8,4.3,2.3
					c4.2-1.4-2.1-6.3-2.7-8.3c-0.4-1.1-1.8-10.8-4.7-7.7"></path>
                                                            <path class="st0" d="M252.5,795.1c-1.8,0.6-2.6,2.7-3,4.4c-0.3,1.2-0.3,1.8-0.8,2.8c-0.4,1-1.1,1.5-1.4,2.7
					c-0.5,2.1-0.3,4.1,0.8,6c1.1,1.9,2.9,3.6,2,6c3.2,1.9,6.3-7.6,6.6-9.5c0.3-2.4-0.3-4.5-1.4-6.6c-0.7-1.4-1.6-5.1-3-5.5"></path>
                                                            <path class="st0" d="M258.2,814.1c1.5,1.4,1.7,3.8,1,5.7c-0.2,0.7-1,1.6-1.3,2.5c-0.4,1,0.2,2.6-1.4,2.7
					c-3,0.2-0.1-10.2,1.6-10.7"></path>
                                                        </g>
                                                        <path class="st0" d="M269.2,737.5c1.1,2.4,3,3.7,3.8,6.3c0.3,1.1,1.6,7.2,0,7.9c-1.7,0.7-3.4-4.8-3.8-5.6
				c-1.3-2.9-0.4-5.1,0.3-7.8"></path>
                                                    </g>
                                                    <path class="st0" d="M287.3,752c-0.6-1.8-2.3-3-3.3-4.7c-2.5-4.2,0.3-6,2.4-9.9c1.9-3.6,2.6-8.3,2.8-12.3c0.2-4,2.9-8.2,2.1-12.1
			c-0.5-2.3-1.5-3.7-1.9-6c-0.3-2.2-1.1-3.9-2.2-5.8c-3-4.9-2.8-10.5-5-15.6c-1.8-3.9-3.6-7.1-4.1-11.6c-0.4-4.4,1.2-8.4,3.2-12.1
			c2-3.6,4.5-6.8,6.6-10.2c2.5-4,2-6.9,2.3-11.5c0.3-5.2,2.1-7.2,6-10.2c3.1-2.3,6.2-4.6,8.2-8c0.9-1.6,2-3.6,2.3-5.4
			c0.1-0.4,0.1-0.9,0.1-1.3c-2.1,0-4.7-1.1-5.9-2.1c-1.8-1.5-2.2-2.7-5-2.7c-2.4,0-3.6,0.9-5.6,2.1c-1.5,1-3.9,2.8-5.7,3.1
			c-2.5,0.5-4.1-1.3-6.1-1.6c-2.4-0.4-4.1,0.8-5.9,1.4c1.3,2.5,0.2,5.1-3.6,4.6c-1.6-2.1-2.7-5.5-4.8-7.2c-2.5-2-6.7-1.9-9,0.5
			c-0.9,1-1.6,2.6-2.5,3.7c-0.9,1.2-2.2,2.2-3.1,3.3c-1,1.1-1.6,2.7-2.6,3.7c-1.2,1.2-2.8,1.2-2.3,3.2c0.3,1.1,1.8,2.4,2.2,3.5
			c0.5,1.5,0.5,3.3,0,4.8c-0.5,1.2-1.9,3.2-3.5,3.1c-1.2-0.1-2.6-1.5-4.1-1.7c-3.1-0.4-5.9,1.3-8.6,2.3c0.3,1.4,0.7,2.7,1.4,3.9
			c0.7,1.3,1.3,2.1,2.3,3.2c1.1,1.2,2.2,1.7,3.5,2.8c2.3,2.1,3.3,4.2,6.3,5.8c1.6,3.2-3.9,5.4-5.7,6.9c-1,0.8-2.6,2.2-2.2,3.8
			c0.4,1.4,2.3,1.5,2.8,3c-1.9,2.6-3.3-0.4-5.3-0.6c-2.3-0.2-3.7,2.4-2.7,4.4c0.8,1.7,3.1,1.8,3.6,3.9c0.4,1.8-1,3.7-1.7,5.2
			c-2.2,4.7-0.6,6.1,2.2,10c3,4.1,1.7,6.8-0.2,10.9c-0.9,1.8-1.5,3.4-0.8,5.5c0.6,1.7,2.3,2.8,2.7,4.7c0.9,3.9-2.4,8.1,1.1,11.3
			c2.7,2.4,7.2,2.6,7.1,6.9c0,2.5-1.5,2.7-2.2,4.7c-1.1,3.4,1.9,4.7,2.3,7.6c0.5,2.7-2.1,5.3-3.2,7.5c-0.9,1.8-1.2,3-2.6,4.5
			c-1.4,1.5-2.8,1.9-2.3,4.1c0.5,2.2,2.1,1.8,3.3,3c1.5,1.5,1.2,3.1,1.7,4.9c0.5,1.9,0.7,3.3,2.9,3.3c0.1,0,0.3,0,0.5,0
			c1.8-0.1,2.9-2.7,4.6-2c2.9-2.5,0.9-6.7,2.2-9.9c1.1-2.6,4.8-6.8,7.7-5.1c-1.1,1.2-2.5,1.3-3.6,2.6c-1,1.2-1.7,3.3-1.9,4.7
			c-0.6,4.3,0.2,6.7-3.5,9.7c-3.3,2.6-4.7,4.5-2.1,8.5c1.4,2.1,5.3,6.1,5.1,8.7c2.4-2.8,2.5-8.5,2.6-12.1c0.1-3.2,0-2.6,3.1-3.6
			c2.2-0.7,3.7-2.1,4.9,0.6c1.6,3.5-1.1,8.8-2.1,12.1c-1.4,4.6-1.3,8.3,0.3,12.8c1.8,5.3-0.8,9.4-0.8,14.5c0,2,0.7,3.7,0.5,5.8
			c-0.3,2.2-1.2,4.3-1.3,6.6c-0.2,3.6,1.7,8.8,5.1,10.8c4.9,2.8,5.5-1.6,8.3-4.5c3.2-3.4,4.3-5.4,2.7-10.1c-0.6-1.7-2-3-2.5-4.7
			c-0.7-2.1-0.5-4.3-1.6-6.4c-1-1.9-2.9-3.1-3.7-5.1c-0.8-1.8-0.6-4.2-1-6.1c-0.8-3.7-0.4-8.4,1.6-11.8c2.3-3.9,5.7-5.1,6-10.2
			c0.2-2.5-0.7-3.9-1.3-6.1c-1.2-4.7,3.6-15.2-2.3-17.8c-4-1.7-7.1-3.3-8.4-8c-0.7-2.5,0.3-3.6,0.8-6c0.4-2.1-0.3-4.5,1.1-6.3
			c2.9-3.9,6.2,3.6,7.8,6c2.5,3.7,3.7,7.4,3.9,11.8c0.1,2.3-0.5,4.4,0.1,6.5c0.6,2.2,1.8,3.7,2.9,5.6c0.7,1.3,2.2,3.5,3.7,4.6
			c0.4-2.7,2.7-4.7,2.9-8.2C287.6,756.9,287.9,753.8,287.3,752z"></path>

                                                    <text transform="matrix(1 0 0 1 244.4893 657.424)" class="st1 st2">খুলনা
                                                    </text>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8624">
                                                <path id="dist_275" class="st0" d="M372.1,782.1c0.4-1.2,1.3-3.1,2.1-4c0.9-1.1,2.1-1.3,3.2-2.2c0.8-0.7,1.4-1.9,1.9-2.8c1.3-2.3,1.2-5,1.2-7.8
	c0-1.5-0.1-2.6,0.7-3.9c0.9-1.5,2.3-2.1,3.3-0.2c0.5,1.1,0.3,3.1,0.8,4.3c0.5,1.2,1.3,2.1,1.9,3.3c2.5-0.4,4-5.3,6.7-2.6
	c1,1,0.7,3,2.3,3.4c1.3,0.4,3.2-0.9,4.3-1.4c2.7-1.3,4.5-3,5.6-6c1.2-3.2,1.2-6,0.4-9.1c-0.4-1.6-0.7-2.9-1.7-4.1
	c-1-1.2-2-2-2.5-3.9c-0.9-3.5,3.8-4.4,2.3-8.3c-0.6-1.6-2.3-2.1-3.1-3.3c-0.8-1.1-0.3-3.3-1.8-3.8c-2.3-0.9-4.7,5.6-8.1,1.8
	c-1.8-2-1.1-6.8-4.8-7.4c-4.1-0.7-4.3,3.9-4.1,6.4c0.1,1.4,0,3.3-1.4,4.3c-2.1,1.6-2.5-0.3-4.1-1.2c-1.7-1-2.5-0.2-3.4-2.5
	c-0.6-1.5-0.2-3.5-1-4.7c-1-1.6-1.8-1.4-1.8-3.8c0-1.6,0.3-3.6,1.5-4.7c1.2-1.1,2.3-0.7,2.6-2.9c0.2-1.8-0.1-2.8,0.6-4.6
	c1.1-2.6,2.3-5.3,4-7.7c1.6-2.2,3.4-4.6,5.2-6.5c-0.1-0.4,0-0.9-0.1-1.2c-0.5-0.7-0.8-0.8-1.5-1.2c-0.7-0.5-1.5-0.9-2.3-1.1
	c-1.6,1.1-2.4,2.3-2.8,5c-0.6,3.3-3.3,5.2-5.8,7c-2,1.5-5.5,3.4-7,5.6c-1.7,2.5-1.4,5.6-5,6.6c-0.9,0.3-1.5,0.2-1.9-0.1
	c-0.4,2.9-1.5,5-3.9,6.9c-5.8,4.5-2.9,11.7-6.4,17.1c-2.7,1.1-2.1-3.2-4.7-2.2c-1.6,0.6-1,4.3-1.9,5.8c-0.8,1.4-2.9,3.4-4.7,4.2
	c0.6,1.8,1.1,3.7,1,5.8c-0.3,5.2,0.2,7.4,2.7,11.9c2.3,4,2.2,7.5,2.5,11.7c0.2,2.1,0,4.4,0.9,6.3c0.9,2,2.8,3.1,4.1,4.7
	c1.4,1.7,3.2,10.9,5.2,3.8c0.6-2.2,0.2-4.5,1-6.6c0.8-2,2.1-4,3-6c1.8-3.7,3.3-7.5,3.7-11.5c0.5-5-2.7-9.2,0.7-13.8
	c1.2-1.6,2.9-2.8,4.1-4.4c1-1.5,2.3-5.8,3.6-6.2c0.8,3.9-2.1,7.7-4.2,10.9c-2.8,4.5-0.9,7.5-0.8,12.1c0.2,4.3-3.2,7.4-3.2,11.8
	c0,2.5,0.1,4.2-0.7,6.6c-0.3,1-2.4,4.2-1.9,5.2c0.1,0.2,0.2,0.5,0.3,0.8c3.6,0.3,6.6-2.9,9.8-4.6c0.2-0.2,0.4-0.4,0.6-0.6
	C371.2,784.9,371.6,783.8,372.1,782.1z"></path>
                                                <text transform="matrix(1 0 0 1 345.7 760.2999)" class="st1 st2">বরগুনা
                                                </text>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8628">
                                                <g id="dist_355">
                                                    <g>
                                                        <path class="st0" d="M429.5,786.1c-2.2-0.2-6,2.6-8.2,3.6c-3,1.3-6.5,2.7-8.5,5.8c-1.6,2.4-2.6,5.8-3.6,8.5
			c-1,2.7-2.7,5.9-1.5,8.7c4.4,0.6,4.5-7.6,5.5-10.1c0.8-1.9,1.9-4.5,3.2-1.4c0.9,2.3-0.8,3.8,2.7,4.7c8.3,2.2,13.5-10.7,11.7-17.7
			c-0.3-1.1-1.2-3.4-2.3-1.6"></path>
                                                        <path class="st0" d="M441.4,763c-2.2,1.6,1,4.7,1.4,6.6c0.6,2.7-0.1,5.9-1.2,8.2c-1.6,3.4-9.1,9.7-4.9,13.4
			c1.8-0.5,1.7-2.1,2.5-3.5c0.8-1.5,1.7-2.1,2.9-3.3c2.3-2.3,3.7-4.4,4.7-7.4c1.1-3.4,0.9-5.4-0.5-8.6c-0.6-1.4-3.6-8.3-5.5-4.3"></path>
                                                        <path class="st0" d="M436.1,769c-3.1,0.3-1.1,4.4-1.6,6.3c-0.4,1.3-3.7,5.7,0.3,3.8c1.3-0.6,3.6-4,3.8-5.5
			c0.3-1.9-1.2-5.4-3.5-4.4"></path>
                                                        <path class="st0" d="M446.8,791c-2.7,0.9-5.2,3.6-7.5,5.2c-3.9,2.7-4,3.9-3.7,7.9c2,0.4,2-1.6,3.3-2.6c1.5-1.3,3.5-1.3,5.1-2.6
			c1.3-1,6.7-7.6,2.5-7.9"></path>
                                                        <path class="st0" d="M448.8,711.9c-3.1,1.1-0.9,5.9-0.2,8.2c1.4,0.9,1.9,4,2.7,4.4c2.2,1.1,2.2-2.3,1.9-3.5
			c-0.5-2.2-2.1-2.5-2.9-4.2c-0.9-1.7,0.2-3.8-1.7-4.9c-0.5,0-0.3,0.3-0.6,0.6"></path>
                                                        <path class="st0"
                                                              d="M452.9,732.5c-1.2,0.7-4.1,7.7-0.6,6.8c0,0,2.5-3.1,2.5-3.2c0.4-2-0.8-3-2.7-3"></path>
                                                        <path class="st0"
                                                              d="M453.7,741.3c-2,0.9-3.5,8.7,0.6,5c0.7-0.7,2-2.5,1.8-3.4c-0.3-1.3-2.1-2.3-3.2-1"></path>
                                                        <path class="st0"
                                                              d="M449.3,750.4c-5-0.8-1.8,4.9-3.9,6.9c3.1,3.2,8.2-6.9,2.8-6.3"></path>
                                                    </g>
                                                    <path class="st0" d="M427.9,680.5c-1.5,1.3-2.6,0.5-4.3,0.5c-3.5,0-6.7,2.9-7.6,6.1c-0.4,1.6-0.3,3.4-1,4.9c-1.4,3.2-4,3.2-7.2,3.5
		c-2.9,0.3-6.3,2.2-8.8,0.2c-2.8-2.3-4-4.3-7.3-1.3c-1.3,1.2-4.3,4.2-6.4,2.1c-0.1-0.1-0.2-0.3-0.2-0.5c-1.8,1.9-3.7,4.2-5.2,6.5
		c-1.7,2.4-2.9,5.1-4,7.7c-0.7,1.7-0.4,2.8-0.6,4.6c-0.3,2.2-1.4,1.8-2.6,2.9c-1.2,1.1-1.5,3.1-1.5,4.7c0,2.4,0.8,2.2,1.8,3.8
		c0.8,1.3,0.4,3.3,1,4.7c0.9,2.3,1.6,1.5,3.4,2.5c1.6,0.9,2,2.7,4.1,1.2c1.5-1.1,1.5-2.9,1.4-4.3c-0.2-2.4,0-7.1,4.1-6.4
		c3.6,0.6,2.9,5.4,4.8,7.4c3.5,3.8,5.8-2.7,8.1-1.8c1.4,0.5,1,2.7,1.8,3.8c0.8,1.2,2.5,1.7,3.1,3.3c1.5,3.9-3.2,4.8-2.3,8.3
		c0.5,1.9,1.5,2.6,2.5,3.9c1,1.2,1.3,2.5,1.7,4.1c0.8,3.1,0.8,5.9-0.4,9.1c-1.1,2.9-3,4.7-5.6,6c-1.1,0.5-3,1.8-4.3,1.4
		c-1.6-0.5-1.3-2.4-2.3-3.4c-2.7-2.7-4.1,2.2-6.7,2.6c-0.6-1.1-1.4-2.1-1.9-3.3c-0.5-1.2-0.3-3.2-0.8-4.3c-0.9-1.9-2.3-1.3-3.3,0.2
		c-0.8,1.3-0.7,2.4-0.7,3.9c0,2.8,0.1,5.5-1.2,7.8c-0.5,0.9-1.1,2.1-1.9,2.8c-1,0.9-2.3,1.1-3.2,2.2c-0.8,1-1.7,2.8-2.1,4
		c-0.6,1.7-1,2.8-2.4,4.2c-0.2,0.2-0.4,0.4-0.6,0.6c-2.1,2.3-2,4.4-3.1,7.4c-1.2,3.3-0.2,6.1-0.7,9.6c-0.4,2.6-1.5,7.2,0.3,9.5
		c2.3,2.9,5.3-0.9,6.8-2.5c3.2-3.4,5.4,0.2,4.4,3.5c-2.3,7.7,5.8,10.3,11.8,7.4c2.4-1.1,5.8-2.1,7.7-4.2c2.2-2.4,3-5.5,3.3-8.6
		c0.6-6.3,4.9-10.1,8.7-15c2.4-3.1,3.8-7.3,4.7-11.2c0.5-2.1,0.4-4.5,0.4-6.8c0-2-0.9-4.5-0.6-6.5c0.3-0.1,0.5-0.2,0.7-0.2
		c1.8,3,4,9.3,8.5,8.6c6.7-1,9.3-10.3,13.2-14.8c2.1-2.5,3-4.5,4.1-7.5c1.1-2.9,2.4-6.1,4.4-8.4c2.1-2.5,3.8-4.9,4.3-8
		c0.6-3.5,0.5-6.8-0.6-10.3c0,0,0,0,0,0c-1-3.3-2.6-6.3-3.5-9.6c-0.4-1.4-0.8-2.4-0.8-4.2c0-2,0.2-4.1,0-6.1c-0.4-3.2-2.9-4.3-4.5-7
		c-1.6-2.6-1.8-6.6-2.7-9.6c-0.9-3.3,0.1-6.9-1.7-9.8c-1.2-1.9-3.1-2.9-5.2-3.3C428.8,679.6,428.5,680.1,427.9,680.5z"></path>
                                                    <text transform="matrix(1 0 0 1 382.6753 721.999)" class="st1 st2">
                                                        পটুয়াখালী
                                                    </text>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8625">
                                                <g id="dist_92">
                                                    <g>
                                                        <path class="st0" d="M429.8,623.5c-1.4,2.4-3.7,0.4-5.2,1.7c-1.8,1.6,1.8,2.9,3,4c2,1.8,5.2,8,8.7,6.4c2.6-1.2,0.7-3.2-0.1-4.9
				c-1.2-2.9,0.1-2.6,1.5-4.7c3.3-4.8-0.6-9.1-5.4-5.4c-1.3,1-1.9,2.6-3.2,3.4"></path>
                                                        <path class="st0" d="M422.7,634.8c0.7-3.6-5.5-6.9-8.3-3.9c-2.8,3,2.2,8.4,1.2,12.2c-1.1,4.2-4.7,5.6-3,10.4
				c0.9,2.4,2.5,10.1,5.8,9.4c7.5-1.6-0.8-16.5,8.5-17.9c1.6-0.2,3.4,0.6,4.7-0.7c1-1,1-4.2,0.2-5.2
				C429.5,636.2,424.8,637.8,422.7,634.8"></path>
                                                        <path class="st0" d="M453.2,649.1c1.7-0.8,2.8,2.2,1.4,3.3c-1.3,0.9-4.7-0.2-6-0.6c-4.3-1.5-7.6-0.1-9.7,4.2
				c-1.6,3.4-5.3,6.5-5.2,10.2c0,1.2,0.8,4.9-1.4,5.2c-2.2,0.4-2.8-3.9-3-5.2c-0.4-2.5-0.3-3.2,0.5-5.5c0.5-1.6,0.4-3.6,1.2-5.1
				c1.4-2.5,2.4-1.6,2.2-4.5c-0.2-2.6-1.1-2.9,1.6-4.1c3-1.4,6.6-3.2,9.9-3c1.7,0.1,3.5,0.7,4.7,1.6c1.4,1,2.3,2.8,4.1,3.4"></path>
                                                        <path class="st0" d="M446.3,630.1c2.1-0.5,3.2,3.8,4.3,5.3c1.3,1.8,4.5,3.1,3.6,6c-1,3.4-3.8-1.8-5.1-3.1
				c-1.3-1.3-1.6-0.7-2.3-2.7c-0.6-1.4-0.6-3-1.3-4.3c0.4-0.2,0.7-0.5,1.1-0.6"></path>
                                                    </g>
                                                    <path class="st0" d="M438.6,603.4c-0.1-0.3-0.1-0.5-0.2-0.8c-1.1,0.2-2.1,0.3-2.8,0c-0.6-0.2-1.3-1.7-1.8-2.1
			c-0.7-0.6-1.8-1.1-2.7-1.6c-0.9-0.5-1.7-1-2.6-1.4c-0.4,0.2-1.1,0.4-2.1,0.8c-1.8,0.8-3.1,1.8-5.3,1.9c-2.8,0.1-3.4,0.1-5.7,1.8
			c-1.1,0.8-4,2.9-5.5,2.7c-1.7-0.2-2.4-2.9-3.6-4.2c-2-2.2-4.8-2.6-7.5-3.5c-0.3,0.3-0.8,0.5-1.3,0.7c-2.4,0.9-4.2-0.2-5.1,2.9
			c-0.8,2.8,1,3.4,1.6,5.5c1.6,5-4.5,4.7-7.6,4.7c-2.5,0-3.7,0.4-5.8-0.9c-1.8-1.1-2.8-2.3-5-2.6c-3.3-0.5-9.2,0.8-12.3-1.4
			c-0.4-0.3-0.5-0.2-1,0c0-0.1,0-0.3,0-0.4c-0.8,0.4-1.7,0.9-2.3,1.5c-1.5,1.5-2,3.6-3.8,4.9c-1.6,1.2-3.6,1.2-5.2,2.3
			c-1.7,1.2-2.6,2.8-4.9,3.5c-2.1,0.6-4.7,0.1-6.6,0.9c-1.6,0.7-3.3,2.6-4.5,3.8c-1.7,1.7-3.1,3.3-4.8,4.4c2.6,1.5,5.1,1,6.5,4.4
			c0.4,1,0.5,1.6,0.8,2c0.3,0.4,0.8,0.7,1.8,1.1c1.4,0.4,2.9,0.9,4.3,1.2c2.9,0.6,6.5-1.4,9,0.6c2.2,1.7,3.2,4,6,5.3
			c1.3,0.6,2.6,0.9,3.9,1.6c1.4,0.8,1.7,1.6,2.9,2.5c1.1,0.8,2.1,1.1,3,1.1c1.6,0,3.2-0.9,5.2-1.5c1.6-0.5,2.7-0.6,4.1,0.7
			c1.1,1.1,1.1,2.7,2.7,3.3c1.6,0.6,2.9,0.1,4.3,1.2c1.1,0.9,1.5,2.4,2.5,3.3c1.8,1.6,5.5,3.6,8,3.2c2.2-0.4,4.5-2.1,6.9-0.3
			c2,1.5,0.5,4.1,0.2,6c-0.2,1.2-0.2,2.3-0.3,3.5c0,1.1,0.6,2.1,0.6,2.9c-0.1,1.7-2.9,3.4-2.5,4.8c-1.5,1.7-3.5,2.9-5.3,4.1
			c-1.8,1.2-3.1,3-4.7,4.4c-1.8,1.5-3.9,2.7-5.4,4.5c-1.1,1.2-5.4,4.2-4.9,6c0.3,0,0.6,0.1,0.9,0.2c0.8,0.2,1.6,0.6,2.3,1.1
			c0.7,0.5,1,0.5,1.5,1.2c0.2,0.3,0.1,0.8,0.1,1.2c0,0.2,0.1,0.3,0.2,0.5c2.1,2.1,5.1-0.9,6.4-2.1c3.3-3.1,4.5-1,7.3,1.3
			c2.5,2,5.8,0.1,8.8-0.2c3.2-0.3,5.8-0.3,7.2-3.5c0.7-1.6,0.6-3.4,1-4.9c0.9-3.2,4.1-6.1,7.6-6.1c1.7,0,2.8,0.8,4.3-0.5
			c0.5-0.4,0.9-0.9,1.2-1.4c1.4-2.4-0.2-5-2.1-7.1c-2.2-2.3-5.2-2.9-8.1-4.1c-2.6-1-4.8-3-6.2-5.5c-3-5.4-6.6-11.2-4.3-17.3
			c1.1-2.9,1.4-6.5,0.1-9.6c-1.2-3-3.8-4.7-1.9-8.1c1.7-2.9,4.7-2.8,7.5-3.7c3.5-1.1,3.3-3.7,4.7-6.4c0.6-1.2,1.4-3,2.4-3.9
			c1.4-1.2,2.7-0.5,4.3-0.8c1.4-0.3,2.4-1.4,3.9-1.7c1.6-0.4,3.4,0,5-0.4c2.8-0.7,5.1-2.9,4.6-6C438.8,604.2,438.8,603.8,438.6,603.4
			L438.6,603.4C438.6,603.4,438.6,603.4,438.6,603.4z"></path>

                                                    <text transform="matrix(1 0 0 1 368.5106 632.7006)" class="st1 st2">
                                                        বরিশাল
                                                    </text>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8638">
                                                <path id="dist_441" class="st0" d="M470.9,582.5c-5.7,5.3-9.2,15-18.6,14.9c-1.1,0-2,0.1-2.9,0.4c-0.2,0.8-0.3,1.6-0.3,2.3c0,1.5,0.6,3.3,0.4,4.9
	c-0.1,1.4-1,3-1.5,4.3c-1.3,3.2-1,6,0.4,9c1.2,2.5,3.2,4.8,4.9,6.8c1.9,2.2,3,4.8,4.8,7.1c4.1,4.9,7.1,9.8,9.4,15.5
	c1.6,4,3.3,7.9,5.3,11.7c1.3,2.5,3.1,4.9,3.9,7.6c0.9,3,0.8,3.7,3.1,6c1.2,1.2,1.9,2.8,2.8,4.2c2,2.9,4.3,5.4,7.7,5.8
	c0.4,0,0.9,0.1,1.3,0.1c-0.9-2.6,5.4-2.8,6.9-3c4.2-0.5,4.1-3.5,5.8-6.6c1.6-3.1,2.9-5.1,3.4-8.6c0.4-2.7,0.7-8.8-1.9-10.4
	c-2.2-1.3-5.5,0.5-7.8,0.5c-3.7,0-6.3-1-9.2-3.7c-1.8-1.7-3.5-4.1-4.7-6.2c-0.5-0.9-1.5-2.9-1.3-4.1c0.3-1.5,1.9-2.5,2.7-3.7
	c1.7-2.7-0.4-5.3,0.7-8.2c1-2.7,3-4.3,5-6.2c3.9-3.6,5-12.8,0-15.8c-5-3-13.2-2.6-11.3-10.6c0.8-3.2,2.6-5.4,4.2-8.2
	c1.1-1.9,1-3.8,1.1-5.8c-1.2-0.6-2.4-1.7-3.9-1.9C477.4,579.6,474.2,579.6,470.9,582.5z"></path>
                                                <text transform="matrix(1 0 0 1 442.1551 629.7299)" class="st1 st2">
                                                    লক্ষ্মীপুর
                                                </text>
                                            </a>
                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8640">
                                                <path id="dist_262" class="st0" d="M659.6,497.8c1.2,8,8.3,12.7,6,21.4c-1.1,4.5-3.9,6.9-7.5,9.8c-1.8,1.4-2.8,1.8-1.9,4.5
	c0.5,1.7,1.8,3.8,3.4,4.6c1.3,0.7,2.2,0,3.6,1.3c1.8,1.8,2.6,5.2,3,7.6c0.4,2.2-0.6,4.4,0.5,6.4c1.2,2,2.6,3.2,3.6,5.4
	c0.8,1.7,1.2,3.4,1.7,5.2c0.5,1.8,0.6,3.2,1.1,5.2c1,3.7,5.5,6.6,0.5,9.9c-2.4,1.6-4.1,0.2-6.3,0.3c-2.9,0.1-2,2.2-4.5,3
	c-1.6,0.5-4.2-2.1-5.1-1c-1.3,1.5,1.9,3.7,2.6,4.7c1.3,1.7,2.1,3.8,3,5.7c1.2,2.4,0.7,3.9,1.1,6.3c0.3,1.7,3,3.3,3,4.7
	c0.1,1.6-2.4,2.8-3.5,3.6c-3,2.5-6.1,4.2-8.5,7.4c-1.5,2-2.1,2.4-4.1,3.2c-1.1,0.4-4,1-4.7,2.9c-0.6,1.7,1.1,4.2,1.3,5.9
	c0.2,1.7-0.2,4.3,0,6.4c0.4,4,3.6,7.9-0.8,11c-1.6,1.1-3.6,1.5-4.9,3.1c-0.3,0.3-0.5,0.7-0.8,1.1c1.2,0.4,2.3,1.1,3.1,2.5
	c1.7,2.8,1.4,6.5,1.1,9.6c-0.3,3.5,0.8,3.5,2.2,6.1c1.3,2.4-0.2,4.3,0.1,6.7c0.1,0.1,0.3,0.2,0.5,0.2c1.4-1.7,0.7-4.5,2.2-5.7
	c0.7-0.5,1.4,1,2.4-0.3c0.7-0.8,0.2-2.3,0.3-3.3c0.4-4.9,5.2-4.8,8.9-2.8c3.1,1.7,6.3,6.4,7.1,9.7c0.6,2.2,0.1,4.7,0.8,6.8
	c0.6,1.8,2,3.1,2.1,5.3c0.1,2.3,0.1,4.1,0.5,6.3c0.4,2.6-1.1,3.7-1.3,6c-0.3,2.6,1.7,3.3,2.8,5.2c1.1,1.9,1.1,4,1.3,6.1
	c0.2,2.1-0.1,4.3,0,6.6c0.1,2.1,1,4.2,0.8,6.3c0,0.1,0,0.1,0,0.2c0.9-0.3,1.8-0.9,2.6-1.8c2.5-3.2,4.9-7,8.4-9.6
	c3.7-2.7,7.7-1.2,11.8-0.6c3.2,0.4,7.6,1.5,10.5,3.8c3.2,2.5,5.1,6.1,8.4,8.3c6.4,4.2,7.9,10.7,9.7,17.5c0.8,3.3,2,6.1,2.5,9.6
	c0.6,4,2.2,7.7,2.5,11.8c0.3,4.3,1.6,7.7,4.2,11.2c2.3,3.2,4.3,6.6,5.7,10.2c0.9,2.3,1.8,9.4,5.2,9.5c0.3,0,0.6,0,1-0.2
	c2.9-1,3.6-7.1,3.5-9.6c-0.2-3.6-2.3-6.8-3.6-10.1c-0.6-1.5-1.3-3.3-1.9-4.9c-0.8-2.1-0.2-3.1-0.2-5.3c0-3.3-1.9-7.6-3.3-10.4
	c-0.8-1.6-2.1-3.5-1.9-5.5c0.4-4.2,2.7-1.1,5-2.4c1.9-1.1,1-4,0.8-5.8c-0.3-2.2-0.1-4.1-0.2-6.4c-0.3-4.4-3.7-6.9-3.9-11
	c-0.1-2,0.9-4.3,1.1-6.3c0.2-1.4,0.3-4.4-0.1-5.8c-0.4-1.5-1.3-1.7-2.2-3c-2.6-3.7-0.7-8.3-1.8-12.4c-1.1-3.9-1.4-7.4-3.5-11
	c-2.1-3.6-4.5-6.3-3.1-10.4c1.6-4.5,1.9-7.4,0.3-11.9c-1.4-4.1-1.4-8.4-3.1-12.3c-1.7-3.9-5.4-5.3-6.5-9.1
	c-1.1-3.9-1.3-8.2-2.5-12.1c-0.6-1.8-1.3-3.7-2.3-5.4c-0.9-1.6-1.6-3.8-2.5-5.1c-1.3-1.7-3.5-2.6-4.9-4.2c-2.5-2.9-2.2-3.9-1.8-7.5
	c0.5-4.7-0.8-8.7-1.6-13c-0.4-2.1-0.6-3.9-1.5-5.9c-0.8-1.8-2.5-3.3-3.2-5c-1.7-3.9-0.5-9-2-12.9c-0.5-1.3-2-4.5-1-6
	c1.5-2.1,3.2,0.7,4.8-1.8c2.9-4.4-1.2-8.1-3.3-11.2c-1.4-2.1-0.8-4.1-0.8-6.6c0-2.7-0.5-3.6-1.6-5.6c-1.1-2.1-0.8-3.1-1.2-5.4
	c-0.3-1.9-1.3-3.1-2.1-4.7c-1.8-3.3-4.5-6.9-5-10.5c-0.5-3.8-0.3-7.3-1.9-10.9c-1.5-3.4-5.1-6.5-5-10.4c0-3.9,1.9-8.7,0.6-12.6
	c-1.6-4.8-7.5-1.2-8.5,2.2c-0.4,1.5,1,5.4-0.6,6.3c-2.3,1.2-2.8-3-3.2-4.1c-0.8-2.3-4.4-7.1-6.8-8.3c-4.3-2-4.9,4.8-6.9,7.6
	c-1.1,1.6-2.5,3-4,4.4c0.5,0,1.1,0.2,1.6,0.5C659.8,488.7,659.2,494.8,659.6,497.8z"></path>
                                                <text transform="matrix(1 0 0 1 678 649.9847)" class="st1 st2">রাঙামাটি
                                                </text>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8637">
                                                <path id="dist_337" class="st0" d="M605.7,603c2.7,3.9,0.2,8.5,2.1,12.3c1.7,3.6,5.7,5.7,7.6,9.3c2,4,0.8,8.8,6.7,8.2c4.2-0.4,8-2.8,10.6,1.7
	c2.3,3.9-0.5,9.2,4.4,11.3c1.6,0.7,3.1,0.8,4.5,1.3c0.2-0.4,0.5-0.7,0.8-1.1c1.3-1.5,3.3-2,4.9-3.1c4.4-3.1,1.2-6.9,0.8-11
	c-0.2-2.1,0.1-4.7,0-6.4c-0.2-1.8-1.9-4.2-1.3-5.9c0.6-1.9,3.6-2.5,4.7-2.9c2.1-0.8,2.6-1.2,4.1-3.2c2.4-3.2,5.5-5,8.5-7.4
	c1.1-0.9,3.6-2,3.5-3.6c-0.1-1.3-2.7-3-3-4.7c-0.4-2.5,0-3.9-1.1-6.3c-0.9-1.9-1.8-4-3-5.7c-0.7-1-3.9-3.1-2.6-4.7
	c0.9-1.1,3.5,1.5,5.1,1c2.4-0.7,1.6-2.8,4.5-3c2.2-0.1,3.9,1.3,6.3-0.3c5-3.3,0.5-6.3-0.5-9.9c-0.5-2-0.6-3.4-1.1-5.2
	c-0.5-1.8-0.9-3.5-1.7-5.2c-1-2.2-2.4-3.4-3.6-5.4c-1.1-1.9-0.1-4.2-0.5-6.4c-0.4-2.4-1.2-5.8-3-7.6c-1.4-1.4-2.2-0.7-3.6-1.3
	c-1.6-0.8-2.8-2.8-3.4-4.6c-0.8-2.6,0.1-3,1.9-4.5c3.6-2.9,6.3-5.3,7.5-9.8c2.2-8.7-4.9-13.4-6-21.4c-0.4-3,0.2-9.1-2.5-10.9
	c-0.5-0.4-1.1-0.5-1.6-0.5c-2.8-0.1-5.6,3.3-9,1.5c-0.8-0.4-2.6-4.2-3.5-5.2c-1.2-1.5-2.6-4.4-4-5.4c-3.5-2.7-5.1,3.5-5.2,6.5
	c-0.2,4.3,1.5,8.5,2.1,12.6c0.6,4.2,1.7,8.3,2.5,12.4c0.4,2.1,0.4,4.5-0.1,6.6c-0.5,2.6-1.4,2.7-2.8,4.6c-1,1.3-0.7,3.2-1.6,4.4
	c-1.3,1.8-3.7,1.1-5.4,2c-3.1,1.6-3.8,5.8-7.6,7.1c-2-1.5-1.1-4.5-4.1-4.9c-1.6,1.6-0.8,4.4-1.2,6.5c-0.3,1.9-1.1,4-1.6,5.8
	c-0.8,3-1.6,2.3-3.8,3.9c-1.8,1.3-2.6,3.3-2,5.5c1.1,3.7,4.7,6.4,6.5,9.7c1.7,3.3,3.1,7.7,3.8,11.3c0.5,2.3,0.7,4.8,1.4,7.1
	c0.7,2.3,2.4,4.4,1.6,6.9c-0.7,2.2-2.6,3.8-4.7,4.3c-2.1,0.5-1.8-0.6-3.2,1.2c-1.6,2-1.3,5.1-3.2,7.1c-1.6,1.7-4.1,2.4-5.7,4
	C605,602.1,605.4,602.5,605.7,603z"></path>
                                                <text transform="matrix(1 0 0 1 595 552.1001)" class="st1 st2">খাগড়াছড়ি
                                                </text>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8633">
                                                <g id="dist_55">
                                                    <g>
                                                        <path class="st0" d="M577,684.7c-1.8-0.8-2.3,2-2.3,3.3c0,1.8,0.2,2.5-0.6,4.3c-1.2,2.7-3.1,5.1-3.7,8c-0.6,3.1-0.6,6.2-0.2,9.3
				c0.5,3.3,1.9,5.1,3.4,7.9c1.5,2.7,2,6,3.9,8.4c1.7,2.1,4,4.3,6.3,5.6c6.2,3.3,11.5-2.8,10.1-9.3c-0.3-1.3-1.3-2.4-1.6-3.8
				c-0.3-1.6-0.3-3.5-0.4-5.1c-0.1-3-0.9-5.5-2.9-8.1c-2-2.6-4.2-5.2-6.5-7.6c-2.2-2.3-2.1-5.4-3.1-8.2c-0.5-1.5-1.8-4.5-3.6-4.5"></path>
                                                        <path class="st0" d="M567.7,655.4c-1.3-1.6-6.8-1.3-7.7,1.4c-1.5,4.1,3.3,3.9,5.4,5c2.2,1.1,5.4,4,6.1-0.6
				c0.3-2.1-2.7-5.3-4.7-5.5"></path>
                                                        <path class="st0"
                                                              d="M558.9,663.1c-3-3.3-9.5,1.2-5.5,3c1.1,0.5,4.8,0.9,6,0.6c3-0.9,1.4-3.1-1.1-3.3"></path>
                                                        <path class="st0"
                                                              d="M558.6,671.3c-1.8-2.8-8.4,0.9-3.2,3.5c3.8,1.9,6.7-1.2,2.7-3.8"></path>
                                                        <path class="st0" d="M565.2,686.4c-0.2-2-6.5-6.4-8.5-6.9c-5.4-1.4-4.4,5.7-4.4,9.1c0,1.6-0.8,5-0.3,6c1.9,4,1.6-2.5,1.6-3.6
				c0-1.1,0.5-1.9,0.6-2.7c0-0.4-0.2-2.3,0-2.8c0.9-1.7,3.5-1.9,5.2-1.1c0.7,0.4,0.3,1.2,0.9,1.5c0.4,0.3,1.7-0.1,1.9,0.1
				c1,1.2,0.5,1.8,0.9,3.3c1.7,0.1,2.2-1.8,1.6-3"></path>
                                                        <path class="st0"
                                                              d="M557.5,688c-1.6,1.1-1.1,4.9,0.1,6c2-0.5,2.2-6.5-0.3-6.2c-0.2,0.4-0.2,0.7-0.3,1.1"></path>
                                                    </g>
                                                    <path class="st0" d="M668.2,784.9c0.9,0.2-3.2-9.4-2.7-9.3c1.2,0.2,2-0.2,3.7-0.6c2.7-0.6,3.1,0.8,5.2,1.9c4.9,2.6,6.5-1.8,8.5-5.2
			c1.7-2.8,5.9-7.1,3.6-10.8c-0.6-1-1.7-0.8-2.5-1.6c-0.8-0.8-0.7-1.7-1.1-2.7c-0.9-2-1.7-3.1-3.3-4.6c-3.4-3.2-2-6-1.3-10.5
			c0.4-2.7,1-5.9,0.5-8.6c-0.6-3.3-3.5-5.3-3.5-9c0-1.9,1.2-3.5,1.4-5.3c0-0.1,0-0.1,0-0.2c0.1-2.2-0.7-4.2-0.8-6.3
			c-0.1-2.3,0.2-4.4,0-6.6c-0.2-2.1-0.2-4.2-1.3-6.1c-1.1-1.9-3.1-2.6-2.8-5.2c0.2-2.4,1.7-3.4,1.3-6c-0.3-2.2-0.3-4-0.5-6.3
			c-0.1-2.2-1.5-3.4-2.1-5.3c-0.7-2.1-0.2-4.6-0.8-6.8c-0.9-3.2-4.1-8-7.1-9.7c-3.7-2-8.4-2.1-8.9,2.8c-0.1,1.1,0.4,2.5-0.3,3.3
			c-1,1.2-1.7-0.3-2.4,0.3c-1.5,1.2-0.8,3.9-2.2,5.7c-0.2,0-0.4-0.1-0.5-0.2c-0.3-2.4,1.2-4.3-0.1-6.7c-1.4-2.6-2.5-2.6-2.2-6.1
			c0.3-3.1,0.5-6.8-1.1-9.6c-0.8-1.4-1.9-2.1-3.1-2.5c-1.4-0.5-2.9-0.7-4.5-1.3c-5-2.1-2.1-7.3-4.4-11.3c-2.7-4.5-6.4-2.1-10.6-1.7
			c-5.9,0.6-4.7-4.2-6.7-8.2c-1.8-3.7-5.8-5.8-7.6-9.3c-1.8-3.8,0.7-8.4-2.1-12.3c-0.4-0.5-0.7-0.9-1.1-1.1c-2.5-1.6-5.7,1.4-8.2,2.9
			c-1.1,0.7-3.8,2.7-5.1,2.9c-2.4,0.3-2.9-2-5.2-2.5c-1.5-0.3-3.1-0.4-4.8-0.3c-1.2,2.5-3.9,4-5.7,6.5c-4.6,6.5-11.3,13-11.7,21.5
			c-0.1,2.3,1.8,7.6,0.9,9.9c0.2,0.4,0.5,0.7,0.7,1.1c0.4,0.7,0.9,1.6,1.5,2.3c0.6,0.7,1.4,1.2,2.4,1.1c2-0.3,2.9-3.4,3.2-5
			c0.4-2.1,0.9-4.7,1.1-6.7c0.2-1.9-1.1-4.3,1.4-5.5c1.4,1.3-0.5,4.3-0.5,6.1c-0.1,2.2,0.5,3.8,0.9,5.8c1.2,6.1-1.7,11.6,1.2,17.3
			c2.5,4.8,6.7,8.3,10.2,12.4c2.8,3.3,6.1,5.6,8.5,9.3c2.2,3.3,4.6,6.4,6.7,9.6c1.1,1.6,2.4,3.3,3.2,4.9c0.8,1.8,1,3.6,2.1,5.3
			c1.1,1.6,2.6,2.7,3.9,4.1c3.7,4.3,6.9,8.9,8.4,14.5c0.9,3.6,3.2,5.9,3.7,9.7c0.6,3.7-0.5,8.7,1.5,12c2.3,3.7,3.4-0.5,5.4-1.7
			c3.5-2.2,5,3.4,5.7,6.2c0.5,1.9-0.4,3.4-0.5,5.8c0,2.3,0.3,4.5,1.1,6.6c0.7,2.1,1.1,4.4,3.6,3.9c1.8-0.4,3.4-2.7,4.8-3.8
			c2.9-2.6,6.7-4.1,10.6-2.1c3.8,1.9,6.3,4.9,10.7,5.2c-2.6,1.3-7.4-2.4-9.7-3.6c-2.4-1.2-7.3-1.2-9.5,0.8c-1.3,1.2-0.9,3.2-1.6,4.7
			c-0.8,1.8-1.7,1.8-3.1,3c-1.3,1.1-2.4,1.8-1.9,4.4c0.3,1.5,1.6,3.5,2.7,4.7c0.9,1,5,11.4,5.9,11.4c2.3,0,3.6,1.9,6.3,1
			C660.5,785.6,663.7,783.9,668.2,784.9z"></path>
                                                    <text transform="matrix(1 0 0 1 620 704.9903)" class="st1 st2">চট্টগ্রাম
                                                    </text>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8636">
                                                <path id="dist_333" class="st0" d="M563.8,632.9c0.5-8.5,7.1-15,11.7-21.5c1.8-2.5,4.5-4,5.7-6.5c0.5-0.9,0.7-2,0.7-3.3c-0.2-4.6-4.4-6.3-6-10.2
	c-1.8-4.1,0.9-8.4-1.7-12.6c-1.2-2-2.7-2.8-3.3-5.2c-0.5-2-0.1-3.9-0.8-5.8c-1.3-4.1-4.7-6.7-7.5-9.8c-1.5-1.7-1.7-3.2-4.3-2.8
	c-2.6,0.3-3.3,1.9-3.6,4.1c-1,7.8-1.8,18.4,2.7,25c1.1,1.5,2.7,2.5,2,4.9c-0.7,2.4-2.8,2.2-4.7,1.4c-1.1-0.5-2.6-2.4-4-3.2
	c-0.8,2.6-5.2,4.2-7.7,5.4c-2,0.9-3.3,1.4-5.3,1.4c-2.4,0-3.9-0.3-6-0.6c-0.5-0.1-0.9-0.1-1.4-0.2c0.1,0.2,0.2,0.3,0.2,0.5
	c0.7,1.6,1.2,3.5,2,5.2c2.2,4.8-3.2,6.9-2,12.1c0.4,1.7,1.3,3.5,2.7,4.7c2.5,2.3,2.8,0.8,5.3,0.2c2.4-0.6,3.8,0.4,5.2,1.9
	c1.1,1.2,3.1,2.7,4.1,3.9c2.8,3.6-4.2,5.5-2.8,9.6c1.3,3.9,6.9,3.3,9.7,5.9c3.1,2.8,5.5,4.8,9.6,5.9c0.2-0.2,0.3-0.4,0.4-0.6
	C565.7,640.5,563.7,635.2,563.8,632.9z"></path>
                                                <text transform="matrix(1 0 0 1 541.3998 610.4999)" class="st1 st2">ফেনী
                                                </text>
                                            </a>

                                            <path class="st0"
                                                  d="M453.9,472.5c0-0.1,0.1-0.1,0.1-0.2c0,0-0.1,0-0.1-0.1C453.9,472.3,453.9,472.4,453.9,472.5z"></path>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8634">
                                                <path id="dist_144" class="st0" d="M537.7,594.2c2,0,3.3-0.6,5.3-1.4c2.6-1.1,6.9-2.8,7.7-5.4c0.2-0.6,0.2-1.2,0-1.8c-0.5-1.8-1.9-3.2-2.9-4.8
	c-1.2-2-1.2-2.8-1.3-5.3c-0.2-4.3-0.9-8.6-1.4-12.9c-0.4-4.2-3.3-6.7-3.6-11c-0.2-4.7-2-7.6-3.3-11.8c-2.4-7.9-2.7-15.8-8.6-22.2
	c-1.3-1.4-3-2.2-4.3-3.6c-1.9-2-1.5-3.2-1.6-5.6c-0.1-2.2,0-4-1.7-5.7c-1.7-1.7-3.3-1.6-4.1-4.2c-0.6-2.1-0.2-4.1-1.3-6.1
	c0,0,0,0,0,0c-1.8-0.3-3.6-1-4.9-1.9c-3-2-5.8-6.5-8-9.6c-2.5-3.5-5.3-5.7-8.6-8.3c-4.6-3.6-6.1-0.1-10.7,0.9
	c-2.1,0.4-4.2,0.8-6.3,1.1c-0.6,0.9-1.2,1.8-2.3,2.6c-1.6,1.3-3.5,2.6-5.5,3.4c-2,0.7-4.1,0.7-6.1,1.8c-4.5,2.7-1,6.9-2.7,10.8
	c-1.3,2.9-7.2,6.6-6.6,10.2c0.4,2,3.3,2.9,4.5,4.4c5.8,7.2,0.2,11.5-3.9,17c-1.5,2-1.8,4.9-2.1,7.7c1.7-0.8,3.2-1.8,5-3.1
	c2.9-2.1,6.5-6.1,10.2-6.6c4.4-0.6,5.6,3.9,7.3,7.5c1.7,3.6,3.4,5.8,5.8,9c1.2,1.7,2.5,3.1,4,4.5c2,1.9,1.7,2.3,2.5,4.9
	c1.3,3.9,5.5,5.4,7.4,8.8c1.1,1.9,2,3.9,1.6,6.3c-0.4,2.2-1.8,4-1.9,6.3c-0.2,4.9,0,7-4.2,10.1c-0.9,0.7-1.8,1.5-2.7,2
	c1.4,2,3.3,3.5,5.8,4.4c1.9,0.7,4.1,0.4,6,1.1c1.9,0.7,3.7,1.8,5.7,2.5c7.6,2.9,16.1,2,24.2,3.1c0.5,0.1,0.9,0.1,1.4,0.2
	C533.8,593.9,535.3,594.2,537.7,594.2z"></path>
                                                <g>
                                                    <text transform="matrix(1 0 0 1 499.4496 548.6785)" class="st1 st2">
                                                        কুমিল্লা
                                                    </text>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8632">
                                                <g id="dist_243">
                                                    <path class="st0" d="M426.7,543.7c0.4,0.2,0.8,0.5,1.2,0.8c3.5,2.7,2.4,7.3,4,10.9c1.2,2.6,2,4.6,2.5,6.9c0.5-0.2,0.9-0.4,1.2-0.9
			c0.8-1.1,0.6-3,1.4-4.4c1.1-1.9,1.7-2.2,1.7-4.6c0-3.9-1.4-7.5-1.6-11.5c-0.2-4.2-2.1-5.9-3.6-9.6c-0.2-0.5-0.6-1.3-0.9-2.1
			c-0.5-1.3-0.8-2.7-0.2-3.6c1.6-2.3,3.6,0.8,5.3,0.5c3.3-0.5,3.1-6.6,3.8-9.1c0,0,0-0.1,0-0.1c-1,2-2.2,3.9-3.5,5.4
			c-1.5,1.7-3.4,0.9-5.2,2.3c-0.4,0.3-0.9,0.8-1.4,1.3c-0.8,0.8-1.6,1.8-2.3,2.4c-1.7,1.6-2.2,3-2.4,5.3c-0.3,2.9,0.8,3,1.9,5
			C429.9,541.2,428.6,542.9,426.7,543.7z"></path>
                                                    <path class="st0" d="M495.7,557.6c-2-3.4-6.1-4.9-7.4-8.8c-0.8-2.5-0.6-3-2.5-4.9c-1.5-1.5-2.8-2.9-4-4.5c-2.3-3.2-4-5.4-5.8-9
			c-1.7-3.5-2.9-8-7.3-7.5c-3.7,0.5-7.2,4.4-10.2,6.6c-1.8,1.3-3.4,2.4-5,3.1c-0.1,1.5-0.3,2.9-0.6,4.1c-1.2,5.2-5.2,4.3-8.6,7.3
			c-3.9,3.6-0.8,8.8-2.2,13.2c-2.4,7.6,0.4,11.3,3.3,18.4c1.5,3.7,1.7,7.6,2.7,11.3c2.3,8.5-0.4,2.4,1.3,10.7
			c0.9-0.2,1.8-0.4,2.9-0.4c9.4,0.1,12.9-9.6,18.6-14.9c3.2-3,6.5-2.9,10.8-2.1c1.4,0.3,2.6,1.4,3.9,1.9c0.3,0.2,0.7,0.3,1,0.3
			c0.7,0.1,1.3-0.1,1.9-0.4c0.9-0.5,1.8-1.3,2.7-2c4.2-3.1,4-5.2,4.2-10.1c0.1-2.3,1.6-4.1,1.9-6.3
			C497.8,561.5,496.8,559.5,495.7,557.6z"></path>
                                                    <path class="st0" d="M433.5,575.7c-0.5,1-1.1,2-1.8,3c-2.3,3.5-5.5,6.2-5.4,10.8c0.1,2.4,1.2,3.7,2.1,5.6c0.7,1.6,0.8,2.1,0.2,2.4
			c0.8,0.5,1.7,0.9,2.6,1.4c0.9,0.5,1.9,0.9,2.7,1.6c0.5,0.4,1.2,1.9,1.8,2.1c0.7,0.3,1.7,0.2,2.8,0c0.1,0,0.3-0.1,0.4-0.1
			c0.4-1.8,0.7-3.5,1.1-5.4c0.6-2.5,1.9-3,3.4-4.9c2.4-3,2.2-7.9,0.3-11.1C441,576.9,437.4,575.9,433.5,575.7z"></path>
                                                    <text transform="matrix(1 0 0 1 451.7003 566.8002)" class="st1 st2">
                                                        চাঁদপুর
                                                    </text>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8652">
                                                <g id="dist_410">
                                                    <path class="st0" d="M414.2,567.4c-1-2.1-1.9-4.5-4.4-5.2c-1.6-2.2-3.7-0.7-5.9-0.3c-7.8,1.3-5.8-5.8-10.6-8.3
			c-1.8-0.9-3.9-0.8-5.8-1.6c-1.8-0.7-3-2-4.5-3.2c-3.2-2.6-7-3.8-10.7-3.8c-0.6,2.5,1.1,3.6,2.7,5c4.5,3.7,0.1,6.5,1.8,10.9
			c1.8,4.5,6.4,3.7,7.8,8.5c1,3.6,2.3,7.3,4.9,10.2c2.8,3.2,6.5,3.1,8,7.6c0.3,1,0.2,1.9,0.6,2.8c0.4,1,1.3,1.5,1.7,2.4
			c0.7,1.9,0.5,3.4-0.8,4.4c2.7,0.9,5.5,1.4,7.5,3.5c1.2,1.3,1.9,3.9,3.6,4.2c1.5,0.2,4.4-1.9,5.5-2.7c2.3-1.7,2.9-1.7,5.7-1.8
			c2.2,0,3.5-1.1,5.3-1.9c1-0.4,1.7-0.6,2.1-0.8c0.6-0.3,0.5-0.8-0.2-2.4c-0.8-1.9-2-3.1-2.1-5.6c-0.2-4.6,3.1-7.3,5.4-10.8
			c0.7-1,1.3-2,1.8-3c-5.1-0.3-10.6,0.6-14.9-2.6C416.4,571.5,415.2,569.7,414.2,567.4z"></path>
                                                    <path class="st0" d="M377.1,535c3.2,1.7,5.2,4.5,7.7,7.1c1.1,1.2,2.4,2.6,3.6,3.5c2.6,1.9,5.3,3.6,8.5,4.3c1.8,0.4,3.6,0.8,5.3,1.9
			c4,2.5,5.1,4.6,10.1,5c3.8,0.3,8,0.5,11.5,2.5c2,1.1,7.7,4.1,10.6,3c-0.5-2.3-1.4-4.3-2.5-6.9c-1.6-3.6-0.5-8.1-4-10.9
			c-0.4-0.3-0.8-0.6-1.2-0.8c-1.5,0.6-3.5,0.8-5.1,0.5c-2.2-0.4-3.8-0.6-6-0.5c-3.2,0-3.2-1-5.3-3.2c-2.4-2.5-6-4.9-9.2-6.4
			c-2.1-0.9-3.6-1.3-5.7-1c-1.2,0.1-1.4,0.8-2.8,0.4c-0.8-0.2-1.7-1.2-2.5-1.7c-1.6-0.8-3.4-1.5-5.1-2.1c-0.9-0.3-1.8-0.3-2.7-0.6
			c-1.4-0.6-1.4-1.2-2.4-2c-0.1-0.1-0.3-0.2-0.4-0.3c-3-2.2-5.6-3.2-9.3-4.2c-0.9-0.2-2.4-0.6-3.7-1.1c-0.6,0.9-1.4,1.3-2.1,1.6
			c0,0.1,0,0.2,0,0.2c0,1.4-0.5,2.6-1.2,3.8c0.8,0.8,1.7,1.6,2.8,2.5c3.3,2.6,7.1,3.4,10.9,5.3C376.9,534.9,377,534.9,377.1,535z"></path>
                                                    <text transform="matrix(1 0 0 1 380.6018 565)" class="st1 st2">শরীয়তপুর
                                                    </text>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8648">
                                                <path id="dist_385" class="st0" d="M442,506.8c-0.7-1.3-1-2.5-1.4-3.8c-0.1,0.1-0.2,0.2-0.3,0.2c-1.6,1.1-4-1-5.7-0.8c-2.4,3.1-3.9,6.2-7.4,8
	c-4.5,2.3-5.7-0.5-8.9-3.3c-2.6-2.3-5.9-3.4-8.4-5.6c-2,1.8-4.7-1-6.8-1.7c-3.2-1.1-6.1,0.5-9.3,0c-4.5-0.7-11.2-10-15.5-3.5
	c-0.9,1.4-1,2.7-1.7,4.3c-0.6,1.4-1.6,2.3-2.4,3.5c-1.7,2.5-2.8,5.3-3.8,8.2c-1,2.9-1.8,6-3.5,8.6c-0.1,0.2-0.2,0.3-0.3,0.5
	c1.3,0.6,2.8,0.9,3.7,1.1c3.8,1,6.3,2,9.3,4.2c0.1,0.1,0.3,0.2,0.4,0.3c1,0.8,1,1.4,2.4,2c0.9,0.4,1.8,0.3,2.7,0.6
	c1.7,0.5,3.5,1.2,5.1,2.1c0.8,0.4,1.7,1.4,2.5,1.7c1.4,0.4,1.5-0.3,2.8-0.4c2.1-0.3,3.6,0.1,5.7,1c3.3,1.5,6.9,3.8,9.2,6.4
	c2.1,2.3,2.1,3.3,5.3,3.2c2.2,0,3.9,0.1,6,0.5c1.6,0.3,3.6,0.2,5.1-0.5c2-0.8,3.2-2.6,1.7-5.2c-1.1-2-2.2-2.1-1.9-5
	c0.2-2.3,0.7-3.7,2.4-5.3c0.7-0.6,1.5-1.6,2.3-2.4c0.5-0.5,1-1,1.4-1.3c1.8-1.3,3.7-0.5,5.2-2.3c1.3-1.5,2.6-3.4,3.5-5.4
	c0.2-0.5,0.4-1,0.7-1.6c0.4-1,0.7-2,0.9-3C443.5,510,443,508.8,442,506.8z"></path>
                                                <g>
                                                    <text transform="matrix(1 0 0 1 380.6019 522.862)" class="st1 st2">
                                                        মুন্সিগঞ্জ
                                                    </text>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8649">
                                                <path id="dist_247" class="st0" d="M454.6,488.1c-0.7-4.2-5.3-6-3-10.9c0.2-0.4,0.5-1,0.8-1.6c-0.3,0-0.7-0.1-1.2-0.4c0,0-0.1-0.1-0.1-0.1
	c-0.7-0.7-0.9-2.5-1.8-3.5c-1.9-1.9-4.5-4.2-7-3.8c-1.1,0.2-3.1,1.6-4.3,1.1c-1.5-0.6-0.9-2.8-1-3.9c-0.3-2.3-0.8-2.5-2.6-2.8
	c-1-0.2-0.9,0.6-1.9-0.3c-0.5-0.4-0.8-1.7-1.1-2.3c-1-2.5-0.6-5.3-1.2-8c-0.9,0.4-1.6-0.2-2.8-0.6c-1.2-0.5-2.9-1.3-3.3,1
	c-3,0.6-3.4-0.9-5.7-2c-2-0.9-3.8,0.4-4.7,2.1c-1,2-1,4.4-4,4.3c-0.3,0-0.5,0-0.8-0.1c1,1.5,1.1,2.4,1.4,4.2c0.3,2.3,1.1,2,2.2,3.7
	c1.5,2.4,0.1,7.2,0.3,10c0.1,1.6,0.3,3.3,1.1,4.7c0.9,1.5,1.7,1.9,1.2,3.9c-0.4,1.8-1.6,2.2-2.6,3.5c-1.1,1.3-1.1,2.7-1.3,4.3
	c-0.3,2.9,0.8,7.3-0.6,9.7c-0.3,0.5-0.6,0.9-0.9,1.1c2.5,2.3,5.8,3.3,8.4,5.6c3.2,2.8,4.4,5.6,8.9,3.3c3.5-1.8,5-4.8,7.4-8
	c1.7-0.2,4.1,1.8,5.7,0.8c0.1-0.1,0.2-0.2,0.3-0.2c0.4,1.2,0.8,2.5,1.4,3.8c1,2,1.5,3.2,1,5.6c-0.2,1-0.5,2-0.9,3
	c0.7-1.2,1.5-2.5,2-3.5c0.8-1.8,1.7-2.9,3.1-4.3c1.4-1.4,2.7-2.3,2.3-4.4c-0.1-0.7-1.1-1.6-1.3-2.5c-0.3-1-0.4-2-0.1-3.1
	C449.3,493.7,455.3,491.9,454.6,488.1z"></path>
                                                <g>
                                                    <text transform="matrix(1 0 0 1 415.3541 493.0718)" class="st1 st2">
                                                        নারায়ণগঞ্জ
                                                    </text>
                                                </g>
                                            </a>

                                            <path class="st0" d="M491.7,429.9c0.4-0.4,0.8-0.8,1-1.3c0.2-0.7,0.2-1.5,0.1-2.2c-0.1,0.2-0.1,0.4-0.2,0.7
	C492.4,427.9,492.2,429,491.7,429.9z"></path>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8641">
                                                <path id="dist_1148" class="st0" d="M411.3,490.7c0.2-1.6,0.2-3,1.3-4.3c1.1-1.3,2.2-1.7,2.6-3.5c0.5-2-0.3-2.4-1.2-3.9c-0.8-1.4-1-3.1-1.1-4.7
	c-0.1-2.8,1.3-7.6-0.3-10c-1.1-1.7-1.9-1.4-2.2-3.7c-0.3-1.8-0.4-2.7-1.4-4.2c-2-0.5-2.6-2.5-4.8-0.7c-1.1,0.9-1.6,2.6-3.6,0.9
	c-1.2-1-1-2.8-1.5-4.2c-0.5-1.5-1.3-2.9-2.6-4c-1.3-1.1-3.1-1-4-2.3c-0.8-1.1-0.4-3.2-0.9-4.5c-0.5-1.4-1.5-2.8-2.6-3.8
	c-1.2-1.1-2.5-1.6-3.5-3c-0.8-1.2-1.2-2.6-2.2-3.6c-2.7-3.1-4.9,0.8-8-0.9c-2.2-1.2-3-5.3-4.6-7.6c0,0,0,0,0-0.1
	c-0.4,0.9-1.2,1.6-2.9,3c-2,1.6-3.5,3.8-5.4,5.8c-2.7,3-4.5,3.2-8.1,4.2c-2.8,0.7-5.5,1.4-8.2,2.6c-0.9,0.4-2.1,1.3-3.4,2.2
	c0.5,1.2,1,2.4,2,3.5c2,2.4,3.1,4.9,4.8,7.5c1.7,2.6,4.1,4.2,6,6.6c1,1.2,1.3,2.7,2.1,3.9c0.8,1.3,2.3,2.4,3.5,3.5
	c2.4,2,5.7,2.6,8.7,2.2c1.3-0.2,3.2-1,4.3-0.1c0.9,0.8,1,3.4,1.1,4.5c0.1,1.8-0.5,3-1.1,4.7c-0.5,1.6-0.6,3.2-1.2,4.8
	c-0.4,1.1-1.2,3.1-2.7,3.3c-1.5,0.2-2.6-1.5-3.5-2.4c-2.5-2.5-4.9-2.5-7.4-0.3c-2.2,2-4.6,4.3-7.6,4.8c-3.4,0.5-5.7,0.3-7,4.2
	c-0.5,1.4-0.7,2.7-1.4,4.1c-0.7,1.3-1.8,2.4-2.3,3.7c-0.4,1.1-0.1,3.2-1.2,4c0.2,0.3,0.5,0.7,0.7,1c2,2.4,4.9,3.2,7.1,5.1
	c1.2,1,1.6,2.5,2.5,3.7c1.1,1.4,2.3,2.1,3.7,3.3c2.6,2.2,5,4.1,8.1,5.3c1.8,0.6,2.5,0.5,2.6,2.4c0.8-0.3,1.5-0.7,2.1-1.6
	c0.1-0.1,0.2-0.3,0.3-0.5c1.7-2.7,2.5-5.7,3.5-8.6c0.9-2.9,2.1-5.7,3.8-8.2c0.8-1.2,1.9-2.2,2.4-3.5c0.6-1.5,0.8-2.9,1.7-4.3
	c4.4-6.5,11,2.8,15.5,3.5c3.2,0.5,6.1-1.1,9.3,0c2.1,0.7,4.8,3.5,6.8,1.7c0.3-0.3,0.6-0.6,0.9-1.1C412.1,498,411,493.6,411.3,490.7z
	"></path>

                                                <text transform="matrix(1 0 0 1 380.6021 487.4747)" class="st1 st2">ঢাকা
                                                </text>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8642">
                                                <g id="dist_315">
                                                    <path class="st0" d="M298.2,500c-1,3.9,2.2,5.8,2.7,9.3c0.4,3.3-2.7,5.5-5.8,4.5c-1.4-0.4-2.4-1.3-3.7-2c-1.7-0.9-3-0.7-4.7-0.7
			c-3.3,0.1-6.5,0.1-9.7,0.6c-1.8,0.3-3,0.1-4.3,1.6c-1,1.2-0.6,2.6-1.9,3.5c-0.2,0.1-0.3,0.2-0.5,0.3c-0.1,0.3-0.2,0.5-0.3,0.8
			c-1,2.1-6.1,4-4.8,7c1.2,2.6,6.8,0.4,9.1,1.8c4.4,2.7,11.3,8.6,8.4,14.5c-1.6,3.1-2.2,5.6-2,9.3c0.1,1.4,0.3,2.6-0.4,3.6
			c1.1,0.2,2.1,0.3,3.3,1c1.3,0.9,2.3,1.7,3,3.2c1.6,3.3-1,5.5-0.4,8.6c0.5,2.5,2,2.1,4,2.3c2.5,0.2,1.9,1.2,3.4,2.6
			c0.1,0.1,0.3,0.2,0.5,0.3c2.2,1.2,6.4-0.7,7.9-2.4c2.7-3.1-0.1-6.9,1.1-10.2c1.4-0.5,2.9,0.1,4.3-0.4c1.2-0.4,2.1-1.4,2.9-2.3
			c1.6-1.9,2.8-7.3,6.6-5.8c1.5,0.6,1.7,2.7,3.3,2.9c1.9,0.2,1.7-1.7,3-2.3c3.3-1.3,3.4,4.2,6.6,4.2c4.3-0.1,2.2-5.5,4.5-7.1
			c1.1,0.4,1,1.2,1.7,2c0.7,0.7,1.8,0.9,2,2c1.8,0.4,2.9,0.8,4.2,0.1c0.3-0.2,0.7-0.4,1.1-0.7c1.6-1.3,2.5-3.3,4.9-1.8
			c2.2,1.3,5.1,8.2,8.3,4.4c2-2.3,1.2-6.8,0.8-9.5c-0.4-2.6-0.5-5.8,0.1-8.5c-0.3-0.2-0.6-0.4-0.9-0.6c-3.1-2.2-4.7-5.5-7.1-8.3
			c-1.4-1.6-4.4-2.1-6-2.4c-4.3-0.9-9.3,0.6-13.4-1.5c-4.2-2.2-4.5-5.9-4.7-9.9c-0.2-3.6-2.5-6.9-4.5-9.9c-3.2-4.8-7.6-9.8-13-11.8
			c-0.5,1.1-1.2,2.1-2.1,3C303.4,497.6,299.2,496.2,298.2,500z"></path>
                                                    <path class="st0" d="M364.4,523c0-1.9-0.8-1.8-2.6-2.4c-3.2-1.2-5.5-3.1-8.1-5.3c-1.4-1.1-2.6-1.9-3.7-3.3
			c-0.9-1.2-1.4-2.7-2.5-3.7c-2.2-1.9-5.1-2.7-7.1-5.1c-0.3-0.3-0.5-0.6-0.7-1c0,0-0.1,0-0.1,0.1c-0.9,0.5-3.4-0.4-4.5-0.6
			c-2.9-0.5-5.9-2.3-8.6-3.3c-0.9-0.3-1.7-0.7-2.4-1.1c2,2.7,4.3,5.3,6.7,7.1c2.8,2.1,6.8,3.8,9.8,5.5c1.6,0.9,3.2,1.3,4.5,2.3
			c1.4,1,2.8,2.2,4.3,3.1c2.9,1.6,6.4,2.5,8.4,5.3c1.8,2.4,3.3,4.5,5.3,6.5c0.7-1.1,1.2-2.4,1.2-3.8
			C364.4,523.2,364.4,523.1,364.4,523z"></path>
                                                    <text transform="matrix(1 0 0 1 293.1761 539.6003)" class="st1 st2">
                                                        ফরিদপুর
                                                    </text>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8647">
                                                <g id="dist_374">
                                                    <path class="st0" d="M302,443.5L302,443.5c-0.3,0.2-0.6,0.4-0.8,0.5c0,0-0.1,0-0.1,0.1c-0.2,0.1-0.4,0.3-0.7,0.4c0,0-0.1,0-0.1,0.1
		c-0.2,0.1-0.4,0.2-0.6,0.2c0,0-0.1,0-0.1,0c-0.2,0.1-0.3,0.1-0.5,0.1c-2.5,3.7-5.6,7.9-5.2,11.4c0.4,3.6,4,3.3,5.9,6.2
		c0.1,0.2,0.2,0.4,0.3,0.5c0.1-1,0.3-2,0.6-2.9c0.8-2.5,2.8-4.3,3.9-6.8c1.3-3.2,0.8-6,0.4-8.8C304.6,443.8,302.4,444.3,302,443.5z"></path>
                                                    <path class="st0" d="M335.1,501.8c1.1,0.2,3.6,1.1,4.5,0.6c0,0,0.1,0,0.1-0.1c1.1-0.8,0.8-2.9,1.2-4c0.5-1.3,1.6-2.4,2.3-3.7
		c0.7-1.3,1-2.6,1.4-4.1c1.2-3.9,3.6-3.6,7-4.2c3-0.5,5.3-2.8,7.6-4.8c2.6-2.2,4.9-2.2,7.4,0.3c1,1,2,2.6,3.5,2.4
		c1.4-0.2,2.2-2.2,2.7-3.3c0.6-1.6,0.6-3.2,1.2-4.8c0.6-1.7,1.2-2.9,1.1-4.7c0-1.2-0.2-3.7-1.1-4.5c-1.1-1-3-0.1-4.3,0.1
		c-3,0.4-6.3-0.1-8.7-2.2c-1.2-1-2.6-2.1-3.5-3.5c-0.8-1.3-1.1-2.7-2.1-3.9c-1.9-2.4-4.3-4-6-6.6c-1.7-2.6-2.8-5.1-4.8-7.5
		c-0.9-1.1-1.5-2.3-2-3.5c-1.8,1.2-3.7,2.4-5.2,1.8c-3.2-1.4-0.4-5.4-5.1-3.7c-3,1-3.8,4.1-6.1,5.9c-1.8,1.4-7.7,3.1-12.6,3.7
		c0.1,0.6,0.1,1.2,0.1,1.8c0.1,5.6-0.9,10.1,0.5,15.6c1,3.9,0.8,6.9,0.6,11c-0.3,5.8,2.8,11.4,5.7,16.2c0.9,1.6,2.1,3.3,3.3,5
		c0.8,0.4,1.6,0.8,2.4,1.1C329.2,499.5,332.2,501.4,335.1,501.8z"></path>

                                                    <g>
                                                        <g>
                                                            <text transform="matrix(1 0 0 1 312.7818 467.4414)"
                                                                  class="st1 st2">
                                                                মানিকগঞ্জ
                                                            </text>
                                                        </g>
                                                    </g>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8660">
                                                <path id="dist_463" class="st0" d="M257.6,563.4c0.7-1,0.8-2.6,2-3.3c2.1-1.2,6.6,0.9,9.2,0.5c1.4-0.2,3-0.6,4.1-1.5c1.2-1,1.5-2.2,3-2.9
	c1.4-0.6,2.8-0.3,4-1.5c0.2-0.2,0.3-0.3,0.4-0.5c0.7-1.1,0.5-2.2,0.4-3.6c-0.2-3.7,0.5-6.2,2-9.3c3-5.9-4-11.8-8.4-14.5
	c-2.3-1.4-7.9,0.8-9.1-1.8c-1.3-2.9,3.8-4.9,4.8-7c0.1-0.3,0.2-0.5,0.3-0.8c-4.9,2.6-7.5-10.4-9.5-12.8c-0.8-1-2.6-1.9-3.6-2.6
	c-1.5-1-2.6-1.6-4.4-2c-3.1-0.6-5.6-1.3-8.9-0.9c-0.8,0.1-1.6,0.1-2.3,0.1c0.5,1.3,0.6,2.7,0,4.2c-1.2,3.1-2.8,4.4-2.8,8.1
	c0,4-2.4,4-4.3,6.8c-1.6,2.3-2.1,6.3-1.4,9c0.7,3,2.3,6.2,0.6,9.1c-1.9,3-6,2.4-7.9,5c-1.8,2.5-1.4,6.2-1.1,9c0,0.4,0,0.7,0,1.1
	c1.4-0.2,2.7-0.3,4,0c1.7,0.4,2.8,1.5,4.3,2.1c1.7,0.7,2.5,0.8,3.3,2.7c0.5,1.3,0.2,2.8,1.3,3.8c1.4,1.4,2.9,0.6,4.5,0.2
	c3.8-0.8,4.6,2.8,7.4,4.4c1.2,0.7,3,0.4,4,1.1c0.3,0.2,0.6,0.7,0.8,1.2c0.1-0.1,0.3-0.2,0.4-0.3
	C255.6,565.7,256.9,564.4,257.6,563.4z"></path>
                                                <text transform="matrix(1 0 0 1 235.5818 548.6001)" class="st1 st2">মাগুরা
                                                </text>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8651">
                                                <g id="dist_368">
                                                    <path class="st0" d="M293.1,474.7c-3.1,0.2-6.1,1-9.1,1.3c-6.1,0.6-14.2,0.4-18.9-3c-5.8-4.1-8.4-8.3-15.3-10.5
		c-4.6-1.4-8.7-2.5-13-1.5c1.6,1.4,2.7,3.5,3.1,5.3c0.7,3.6,0.5,6.1-1,9.4c0,0,0,0,0,0c2.9-0.1,5.9,0.1,8.8-0.5
		c2.2-0.5,4.3-2,6.6-1.3c2.3,0.7,2.9,2.2,4.3,3.5c1.6,1.4,3.9,1.7,5.4,2.9c0.6,0.6,0.9,1.7,1.6,2.4c0.8,0.7,1.6,0.7,2.4,1.2
		c1.8,1.2,2.5,2.6,4.7,3.6c1.9,0.8,3.8,0.9,5.7,2c3.2,1.8,6.7,3.6,10.4,2.5c3.2-1,6-3.6,9-5.2c1.6-0.8,6.7-0.6,7.5-2.4
		c0.7-1.5-3.6-5.4-4.3-7.2c-0.5-1.3-1.1-3-1.1-4.5c0-0.1,0-0.2,0-0.4C298.2,475.4,296.8,474.5,293.1,474.7z"></path>
                                                    <path class="st0" d="M233.7,487.7c0,0,0.1,0.1,0.1,0.1c2.4,2.2,4,4,5.6,6.8c0.9,1.4,1.8,2.9,2.4,4.4c0.8,0,1.6,0,2.3-0.1
		c3.2-0.5,5.7,0.3,8.9,0.9c1.8,0.4,2.9,1,4.4,2c1,0.7,2.8,1.6,3.6,2.6c1.9,2.4,4.5,15.4,9.5,12.8c0.2-0.1,0.3-0.2,0.5-0.3
		c1.3-0.9,1-2.3,1.9-3.5c1.2-1.5,2.5-1.4,4.3-1.6c3.2-0.5,6.4-0.5,9.7-0.6c1.8-0.1,3.1-0.2,4.7,0.7c1.3,0.7,2.3,1.6,3.7,2
		c3,1,6.2-1.2,5.8-4.5c-0.4-3.5-3.7-5.4-2.7-9.3c1-3.8,5.2-2.3,7.6-4.8c0.9-0.9,1.6-1.9,2.1-3c-3.1-1.2-6.5-1.3-10.1,0.1
		c-5.1,2-8.2,6.5-14.3,6.3c-3.9-0.1-7-2.2-9.9-4.7c-3.4-2.9-6-4.6-9.6-6.6c-3.2-1.8-6.3-6.2-10.2-6.6c-2.2-0.2-4.7,0.8-6.9,0.8
		c-2.2,0-4.9,0.5-6.9,0.1c-1.1-0.2-2.2-0.8-3.3-1.3c-0.5,1-1,2.1-1.4,3.3C234.9,485.1,234.4,486.6,233.7,487.7z"></path>

                                                    <g>
                                                        <g>
                                                            <text transform="matrix(1 0 0 1 240.2578 493.0718)"
                                                                  class="st1 st2">
                                                                রাজবাড়ী
                                                            </text>
                                                        </g>
                                                    </g>

                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8643">
                                                <path id="dist_245" class="st0" d="M379.5,402.6c-1.4,2.3-3.7,4.3-5.1,6.8c-1.4,2.5-2.7,5.5-2.9,8.2c-0.2,2.5-0.1,3.6-0.6,4.7c0,0,0,0,0,0.1
	c1.6,2.3,2.3,6.3,4.6,7.6c3.1,1.7,5.2-2.3,8,0.9c1,1.1,1.4,2.5,2.2,3.6c1,1.4,2.2,2,3.5,3c1.1,0.9,2.1,2.4,2.6,3.8
	c0.5,1.3,0.1,3.4,0.9,4.5c1,1.4,2.7,1.3,4,2.3c1.3,1.1,2,2.5,2.6,4c0.5,1.4,0.4,3.2,1.5,4.2c2,1.8,2.5,0,3.6-0.9
	c2.2-1.8,2.7,0.3,4.8,0.7c0.2,0.1,0.5,0.1,0.8,0.1c3,0.1,2.9-2.3,4-4.3c0.9-1.7,2.7-3,4.7-2.1c2.3,1.1,2.7,2.6,5.7,2
	c0.4-2.3,2.1-1.4,3.3-1c1.3,0.5,1.9,1.1,2.8,0.6c0.2-0.1,0.5-0.3,0.8-0.6c2-2.1,1.5-5.8,2.9-8.3c0.9-1.5,1.7-1.9,3.2-2.7
	c1.5-0.8,2-1.6,2.1-3.5c0.1-1.8-0.5-3-1.4-4.4c-0.7-1.1-2-2.4-1.7-3.9c0.4-1.9,2.3-1.9,3.7-2.7c0.9-0.6,2-1.9,2.5-2.9
	c1.4-2.7,1.2-6.2,0.5-9.2c-0.8-3.1-0.2-6.7-1-9.9c-0.4-1.6-1.3-2.9-0.9-4.5c0,0,0,0,0,0c-0.9-0.3-1.8-0.7-2.5-1.3
	c-2.1-1.6-2.9-4.9-4.1-7.2c-0.2-0.3-0.4-0.7-0.6-1c-2.4,0.9-5.5-1.8-8.1-1.9c-2.9,0-6.9,0.9-9.5-0.2c-1.3-0.6-2.3-1.9-3.7-2.3
	c-1.7-0.6-3.4,0-4.9-0.1c-1.3-0.1-3.3-1.8-4.6-1.6c-1.2,0.2-2.1,2-2.7,2.9c-2.3,3.8-4.8,8.5-10.2,5.6c-3.5-1.9-5-0.8-8.5,0.8
	c-0.4,0.2-0.8,0.4-1.1,0.5c0,0.2,0,0.5,0,0.7C380.4,397.7,381.5,399.3,379.5,402.6z"></path>
                                                <g>
                                                    <g>
                                                        <text transform="matrix(1 0 0 1 382.6753 416.4902)" class="st1 st2">
                                                            গাজীপুর
                                                        </text>
                                                    </g>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8645">
                                                <path id="dist_250" class="st0" d="M522.7,366.5c-0.2-1.7-1-2.7-0.9-4.4c0.2-1.7,0.4-3.1,0.1-4.9c-0.4-2-1.2-2-2.6-3.3c-2.6-2.4-1.7-6.5,0.2-9
	c1.5-1.9,1.6-3.8,2.2-5.7c-1.1-4.6-2.8-9.8-6.7-13.3c-3.2,4-7.1,4.5-12.6,5.7c-0.7,0.7-4,3.4-5.4,3.7c-2.7,0.4-5.1-1.8-8.2-1.2
	c-1.2,0.2-1.4,1.4-3,1.6c-1.3,0.1-2.9-1.3-4.1-1.3c-2.1,0.1-5.2,3.6-6.7,0.5c-3.3,0.5-6,6.7-9.4,2.5c-3.3,0.9-3.5,3.9-5.5,5.6
	c-0.8,0.7-1.6,1.1-2.5,1.3c0.1,0.3,0.2,0.8,0.3,1.5c0.3,3.2,0.3,6.2-2.8,7.7c-1.5,0.7-3.1,0.6-4.3,1.6c-1.4,1.1-1.6,2.4-3.6,2.6
	c-3.7,0.5-5-3.5-8.4-0.8c-2.6,2.1-4.6,4-8,2.3c-1.4-0.7-2.4-1.6-4.1-1c-1.5,0.5-2.2,1.9-3.9,2.3c-1.3,0.3-3.6-0.3-3.3,1.8
	c0.2,1.2,2.1,2.3,3.1,2.8c2.7,1.6,5.8,1.3,7.6,4.2c1.6,2.7,1.4,6.1,2.3,9c0.9,2.9,2.4,6.6,1.7,9.9c-0.1,0.5-0.1,0.9-0.2,1.4
	c0,0-0.1,0-0.1,0.1c0.2,0.3,0.4,0.7,0.6,1c1.3,2.2,2,5.6,4.1,7.2c0.7,0.5,1.5,0.9,2.5,1.3c2.1,0.7,4.7,1,6.6,0.6
	c1.5-0.3,3.5-0.8,4.9-1.4c1.5-0.7,2.2-2.6,3.9-2.5c4.1,0.3,1.6,6.2,2,8.3c0.5,3.1,3.9,4,6.2,5.5c3.3,2.1,1.7,5.2,3.9,7.8
	c1,1.2,2.3,1.8,3.7,2.6c1.3,0.8,2.1,1.6,3.3,2.4c2.4,1.6,4.7,3,7.1,4.9c1.4,1.1,2.2,1.2,3.6,2c1.2,0.6,2,2.1,3.5,2.1
	c0.2,0,0.5,0,0.7-0.1c0.1,0,0.1-0.1,0.2-0.1c0.2-0.4,0.7-0.8,1.2-1.2c0.5-0.9,0.7-2,0.9-2.8c0.1-0.2,0.1-0.4,0.2-0.7
	c-0.3-1.6-1.4-3-2-4.4c-1.4-3.1-2.1-6.4-3.9-9.3c-1-1.6-1.6-4.1,1.2-3.1c1.8,0.6,2.7,2.9,3.5,4.2c1.1,2.1,1.5,3.8,2,6.2
	c0.3,1.1,0.5,1.7,0.8,2.1c1-2.5,1.9-5.3,1.5-8.1c-0.4-3-2.4-5.3-3.2-8.3c-0.9-3.4,2.2-5.4,4.9-6.8c2.9-1.4,5.6-2.7,8.5-3.7
	c1.2-0.4,3-0.8,4-1.6c1.2-0.9,1.5-2.9,2.7-3.8c0.4-0.3,0.9-0.5,1.4-0.6c-0.3-0.7-0.2-1.5,0.4-2.7c0.7-1.4,2-1.8,3-3
	c0.6-0.9,0.7-1.9,0.8-2.9c-0.3-0.4-0.5-0.9-0.8-1.4c-2.2-4.8,1.5-5.6,4.4-7.4c0.1-0.2,0.1-0.3,0.2-0.5
	C522.6,369.7,522.9,368.2,522.7,366.5z"></path>
                                                <g>
                                                    <g>
                                                        <text transform="matrix(1 0 0 1 447.9834 379.498)" class="st1 st2">
                                                            কিশোরগঞ্জ
                                                        </text>
                                                    </g>
                                                </g>
                                            </a>
                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8685">
                                                <g id="dist_260">
                                                    <path class="st0" d="M514.4,386.5c-0.6,1.2-0.6,2-0.4,2.7c0.4,1.1,1.6,1.7,2.7,2.4c0-0.9,0-1.7,0.4-2.8c0.7-1.8,2-2.5,2.1-4.7
			c0.1-1.6-0.5-2.5-1.1-3.5c-0.1,1-0.2,2-0.8,2.9C516.5,384.7,515.1,385.1,514.4,386.5z"></path>
                                                    <path class="st0" d="M584.6,394.6c-2-2.6-2-5-2.8-7.9c-0.9-3.2-1.8-5.5-2-9.1c-0.2-2.9,0-6.8-0.4-9.5c-0.6-3.7-2.8-4.7-2.1-8.7
			c0.4-2.6,1-5.4,1.3-8.6c0.7-5.8,4.3-10.1,8.1-14.9c1.6-2.1,2-3.4,2.1-5.2c-0.2-0.1-0.3-0.2-0.5-0.3c-4.5-3.4-5-8.8-5.9-13.8
			c-0.7,0.4-1.4,0.7-2.2,0.9c-3.1,0.8-6.6-1.4-9.2-0.5c-2.3,0.8-4.6,4.2-6.9,5.4c-2.9,1.5-5.5,1.3-8.6,2.1c-1.1,0.3-2.1,1.8-3.3,1.7
			c-2.5-0.2-2.4-1.9-4-3c-11.7-7.6-16.9,12.6-26.5,16.1c0,0,0,0,0,0c-0.6,2-0.8,3.8-2.2,5.7c-1.9,2.5-2.8,6.5-0.2,9
			c1.4,1.3,2.3,1.3,2.6,3.3c0.3,1.8,0.1,3.2-0.1,4.9c-0.2,1.7,0.6,2.7,0.9,4.4c0.2,1.7-0.1,3.1-0.7,4.7c-0.1,0.2-0.1,0.3-0.2,0.5
			c0.7-0.4,1.3-0.9,1.9-1.5c1.9-2.2,1.7-4.2,4.1-6.3c1-0.8,2.3-1.4,3.2-2.3c1.2-1.4,1-2.5,1.6-3.9c0.6-1.4,1.9-2.3,2.8-3.5
			c1-1.4,1.3-3.2,2.4-4.2c0.7,1.1-4.4,8.5-4.9,10.5c-1.1,3.8-3.1,6.8-6.1,9.8c-2.6,2.7-5.8,5.3-6.2,9.1c-0.5,4.1,4.6,6.4,1.4,10.8
			c-1,1.4-1.9,1.9-2.2,3.6c1.7,1.9,3.2,4.3,6.3,3c2.8-1.2,3.2-5.1,5.8-6.3c3.1-1.5,6.6,1.5,4.8,4.4c-1,1.7-2,2.2-3.5,3.1
			c-1.1,0.7-2.8,1.9-1.8,3.3c0.5,0.7,1.6-0.1,2.1,0.8c0.5,0.8-0.1,1.6-0.5,2.3c-0.9,1.4-2.4,1.4-3.4,2.8c-1.9,2.8-0.4,6.4,1.1,8.9
			c1.6,2.6,3.8,4.6,4.6,7.6c0.9,3.2-0.7,6.1-0.2,9.5c0.2,1.5,0.9,2.5,1.9,3.2c1.2,0.9,2.8,1.3,4.5,1.5c3.9,0.6,9.4-0.7,9.7-5.4
			c0.1-0.8-0.4-1.6-0.2-2.5c0.1-0.8,0.8-1.3,0.9-2.1c0.5-2.8-4.1-5.1-3.1-7.6c2-5.1,15-0.1,18.3,0.6c5.4,1.1,13.6,2.7,17.5-2.5
			c3.7-5.2,4.6-11.3,5.4-17.2c0.1-0.9,0.2-1.8,0.4-2.7C588.2,396.9,586.4,396.9,584.6,394.6z"></path>
                                                    <g>
                                                        <g>
                                                            <text transform="matrix(1 0 0 1 536.5234 381.0771)"
                                                                  class="st1 st2">
                                                                হবিগঞ্জ
                                                            </text>
                                                        </g>
                                                    </g>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8686">
                                                <path id="dist_244" class="st0" d="M663.8,298.1c-3.4,1.9-5.5,0.9-9,1.3c-5.7,0.8-7.6,8.2-9.5,12.8c-1.1,2.5-0.1,6.3-1.4,8.5
	c-1.3,2.2-5.9,2.8-8.2,2.6c-2.9-0.3-5.1-2.3-7.9-3.2c-4-1.3-4.9-0.4-8.1,1.1c-3.1,1.4-5.3,1.1-8.7,1.7c-3,0.6-4.4,2.8-7,4.1
	c-4.2,2.2-10.9,6.4-15.3,3.7c-0.1,1.8-0.5,3.2-2.1,5.2c-3.8,4.8-7.4,9.1-8.1,14.9c-0.4,3.1-0.9,5.9-1.3,8.6
	c-0.6,4.1,1.5,5.1,2.1,8.7c0.5,2.7,0.3,6.5,0.4,9.5c0.2,3.6,1.1,5.8,2,9.1c0.8,2.9,0.8,5.3,2.8,7.9c1.7,2.3,3.6,2.3,5.6,3.9
	c0.2,0.2,0.4,0.3,0.7,0.6c2.4,2.2,2.2,5.7,5.3,7.6c1.7,1,5.9,2.5,7.8,2.8c6.6,0.9,4.5-9.3,1.2-12.8c0.8-0.8,0.8-0.8,2-0.8
	c1.3,3.4,4.4,1.2,6.8,1.3c3.6,0.1,4.6,1.6,6.5,4.5c2.4,3.7,6.3,10.4,9.1,3.3c1.7-4.5,2.5-10.9,3.4-15.7c0.7-3.7-1.2-4.3-1.8-7.8
	c-0.3-2.1,0.7-5.6,3.4-2.9c5.5-0.8,10.1,0,5.6-6c-0.7-1-3.3-1.3-1.7-3.5c1-1.3,2.9-0.1,4.2,0.1c3.6,0.6,5.8,1,9.1,0
	c3-0.9,5.7-2.3,7.9-4.4c1.9-1.9,5.3-4.4,6.4-6.3c2.3-4-7.2-16,1.8-15.6c2.8,0.1,5,5.3,7.8,3.6c2.9-1.7,0.5-7.2,0.4-9.4
	c-0.7-13.7,9.4-25,7.4-38.3c-0.6-4.1-6-11.5-9.5-11.4c-0.9,1.5-2.6,2.6-4.2,4.7C668,294.5,666.7,296.5,663.8,298.1z"></path>
                                                <g>
                                                    <g>
                                                        <text transform="matrix(1 0 0 1 585.7119 359.0332)" class="st1 st2">
                                                            মৌলভীবাজার
                                                        </text>
                                                    </g>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8688">
                                                <path id="dist_88" class="st0" d="M584.3,256.1c-2.5,7.5,5.9,14.4,9,20.7c-0.2,2.1-1.5,4.2-4,4.1c-0.4,4.8,0.4,5.2-3.8,7.8c3,2.9-0.3,4.7-1.3,7.3
	c-1.5,4.1,1.1,4.4,2.6,7.9c1.9,4.6-0.1,10.3-4.4,12.7c1,5,1.5,10.4,5.9,13.8c0.2,0.1,0.3,0.2,0.5,0.3c4.4,2.7,11.1-1.5,15.3-3.7
	c2.6-1.4,4-3.5,7-4.1c3.4-0.7,5.6-0.4,8.7-1.7c3.3-1.4,4.1-2.4,8.1-1.1c2.8,0.9,5,2.9,7.9,3.2c2.3,0.3,6.8-0.4,8.2-2.6
	c1.3-2.2,0.4-5.9,1.4-8.5c1.9-4.6,3.7-12,9.5-12.8c3.5-0.5,5.6,0.5,9-1.3c2.9-1.6,4.2-3.7,6.1-6.3c1.6-2.1,3.2-3.2,4.2-4.7
	c0.2-0.4,0.4-0.8,0.6-1.2c0.2-0.6,0-1.2,0.1-2c0.8-4,0.4-5.1,4.7-5.5c7.4-0.8,9.5,3.9,14.7,7c2.9,1.6,14.2,0,17.3-3
	c1.9-1.8,2.5-6.3,1.2-8.5c-1.7-3-5.1-2.2-6.9-4.5c-0.5-0.7-1.4-2.8-2-3.7c-0.7-1-1.8-1.9-2.5-2.9c-1.9-2.9-1.6-5.1-4.9-6.9
	c-2.8-1.6-4.9-2.4-7.5-4.5c-3-2.5-3.5-2.1-6.9-2.1c-7.3-0.1-8.5-6-14.8-7.8c-3.1-0.9-6.1,0.6-9.1-0.7c-2.5-1.1-3.9-3.8-6.3-5.4
	c-5.5-3.7-11.6-1.8-18-2.1c-6.8-0.3-13.5-0.6-20.2,0.7c-6.2,1.2-11.9,2.5-17.7,4.9c-2.7,1.1-5,2.8-7.4,4.2
	C595.9,245.5,585.5,252.5,584.3,256.1z"></path>
                                                <g>
                                                    <g>
                                                        <text transform="matrix(1 0 0 1 609.3027 286.0322)" class="st1 st2">
                                                            সিলেট
                                                        </text>
                                                    </g>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8674">
                                                <path id="dist_320" class="st0" d="M293.9,456.3c-0.4-3.4,2.7-7.7,5.2-11.4c-1.1,0.2-1.9-0.6-3.9-1.9c-2-1.4-4.9-1.9-6.8-3.9
	c-1.2-1.3-0.9-2.9-2.1-4.1c-1.6-1.7-2.4-0.9-4.4-1.8c-2.7-1.3-4.6-3.1-7.8-3.7c-4.3-0.9-5-1.1-5.8-5.6c-8.5-2.4-3-7.2-5.8-13.3
	c-2.1-4.4-2.9,0.9-6.2-0.7c-2-1-1.4-4.9-1.6-6.6c-3.4,1-5.1,0.6-6.5-2.9c-1.8-4.6-1.3-4.2-5.9-5.8c-3.5-1.2-5.4-2.2-9.4-2
	c-0.6,0-1.3,0.1-2,0.2c0,0.3-0.1,0.6-0.3,1c-0.7,1.4-2.3,1.7-3.1,2.9c-2,2.7-0.8,6.4-2.1,9.3c-1.1,2.5-3.7,4.5-5.9,6
	c-2.3,1.6-3.6,4.6-5.5,6.9c-1.6,2.1-5.2,3.6-7.8,4.1c-1.7,0.3-3.1,0-4.7,0.7c-1.6,0.7-2.4,2.3-3.9,3.1c-3.6,2.1-5.4-3-8.1-1.7
	c-1.2,0.6-1.2,2.4-2.2,3.2c-0.4,0.3-0.8,0.5-1.2,0.5c1.1,1.9,2.5,3.8,4.1,5.1c2.1,1.8,5.1,1.7,7.3,3.4c1.9,1.4,4.2,5,5.2,7.2
	c1.3,2.8,3.1,6.5,4,9.4c1.3,0.7,3,0.8,4.5,1.3c1.8,0.6,2.4,1.5,3.9,2.5c2.4,1.6,7,1.1,9.7,1c1.8-0.1,3.3,0.4,5,0.6
	c1.5,0.2,3.4,0.2,4.9,0.7c0.8,0.2,1.5,0.7,2.1,1.2c4.3-1,8.4,0,13,1.5c6.9,2.2,9.6,6.4,15.3,10.5c4.7,3.4,12.8,3.6,18.9,3
	c2.9-0.3,6-1.2,9.1-1.3c3.7-0.2,5.1,0.6,6.8-2.3c0.1-3.1-0.2-6.3,0.2-9.4c-0.1-0.2-0.2-0.4-0.3-0.5
	C297.9,459.6,294.3,459.9,293.9,456.3z"></path>
                                                <g>
                                                    <g>
                                                        <text transform="matrix(1 0 0 1 224.8926 444.0195)" class="st1 st2">
                                                            পাবনা
                                                        </text>
                                                    </g>
                                                </g>
                                            </a>
                                            <path class="st0"
                                                  d="M314.2,354.8c-0.1-0.3-0.2-0.5-0.4-0.7C313.9,354.3,314,354.6,314.2,354.8z"></path>
                                            <path class="st0" d="M302.6,443.1c-0.2,0.1-0.4,0.3-0.6,0.4l0,0v0c0.4,0.8,2.6,0.3,3,1c-0.1-1-0.2-2.1-0.2-3.1
	c-0.3,0.3-0.7,0.6-1,0.9C303.4,442.6,303,442.8,302.6,443.1z"></path>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8676">
                                                <g id="dist_281">
                                                    <path class="st0" d="M299.2,320.7c-1-0.9-2.1-1.9-3-3c-0.2-0.3-0.4-0.6-0.5-0.8c0,0.4,0.1,0.9,0.1,1.3c0.4,3.9,1.2,7.7,2,11.5
		c0.7,3.3,1.6,7.4,4.3,9.7c1.1,0.9,2.4,1.5,3.7,2.1c-1.9-4-2.4-11.5-3-13.5C301.9,325,301.5,322.9,299.2,320.7z"></path>
                                                    <path class="st0" d="M284.3,319.2c1.1,5.8,0,14.8-8,13.6c-2.3-0.4-7.3-3-8.5,0.8c-0.6,2,1.2,7.3,2.2,8.9c1.6,2.4,5,3.4,6.4,5.8
		c1.4,2.4,0,6.4-2.4,7.8c-2.9,1.6-7,0-9.7-0.6c-1.2-0.3-3.7-0.2-4.7,0.3c-1.1,0.6-1.7,1.9-2.8,2.6c-3.3,2-5.1-0.2-7.9-1.5
		c-2.8-1.4-6.4,0.5-9.5,0.3c-1-0.1-1.8-0.4-2.5-0.9c-1,1-2,1.9-2.9,3c-1.6,2.2-2.9,4.5-4.7,6.8c-2.1,2.6-1.1,5.6-3.6,8.1
		c-1,1-2.3,2-1.8,3.8c0.7,2,2.4,1,3.7,2c2.6,1.9,1.6,6.1,2.2,8.9c0.3,1.5,1.4,2.5,1.2,4c0.7-0.1,1.4-0.2,2-0.2
		c3.9-0.2,5.9,0.8,9.4,2c4.6,1.6,4.1,1.2,5.9,5.8c1.4,3.5,3.1,3.9,6.5,2.9c0.2,1.8-0.4,5.6,1.6,6.6c3.3,1.6,4.1-3.6,6.2,0.7
		c2.8,6-2.7,10.9,5.8,13.3c0.8,4.5,1.5,4.7,5.8,5.6c3.2,0.7,5.1,2.5,7.8,3.7c2,0.9,2.9,0.1,4.4,1.8c1.2,1.2,0.8,2.8,2.1,4.1
		c1.8,2,4.7,2.5,6.8,3.9c2,1.4,2.8,2.1,3.9,1.9c0.2,0,0.3-0.1,0.5-0.1c0,0,0.1,0,0.1,0c0.2-0.1,0.4-0.1,0.6-0.2c0,0,0.1,0,0.1-0.1
		c0.2-0.1,0.4-0.2,0.7-0.4c0,0,0.1,0,0.1-0.1c0.3-0.2,0.5-0.3,0.8-0.5c0.2-0.1,0.4-0.2,0.6-0.4c0.4-0.3,0.8-0.6,1.2-0.9
		c0.4-0.3,0.7-0.6,1-0.9c0-0.2,0-0.3,0-0.5c0.3-4.1-0.5-8-0.5-12.3c0-4.2-2.4-8.3-1.2-12.4c0.9-3,3.5-5.3,3.9-8.5
		c0.4-2.9,0.5-6,0.8-9.1c0.5-4.4-2.4-7.4-4.1-11c-2.3-4.8,0.2-6.8,1.6-11.3c0.8-2.4,0.3-3.3-0.6-5.4c-0.9-2.1-1.1-4-1.9-6.1
		c-0.7-2-1.6-3.1-3.1-4.6c-2.2-2.1-3-3.7-4.7-6.1c0,0,0,0,0,0c-2.8-4.1-1.8-7.5-2.7-12.1c-0.8-4-3.2-7.8-4.6-11.8
		c-1.5-4-1-7.8-3.4-11.8c-1.6-2.6-3.2-5.8-4.2-9c0.1,0.5,0.2,1.1,0.3,1.5C281.5,313.9,283.7,316.2,284.3,319.2z"></path>
                                                    <g>
                                                        <g>
                                                            <text transform="matrix(1 0 0 1 242.9976 385.9844)"
                                                                  class="st1 st2">
                                                                সিরাজগঞ্জ
                                                            </text>
                                                        </g>
                                                    </g>
                                                </g>
                                            </a>

                                            <path class="st0"
                                                  d="M309,343.8C309,343.8,309,343.8,309,343.8c0.1,0,0-0.1,0-0.2C309,343.7,309,343.7,309,343.8z"></path>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8656">
                                                <path id="dist_241" class="st0" d="M180.4,628.5c0.8,0.4,3.5-0.2,4.6-0.3c2-0.2,2.8-0.8,4.3-2.1c1.2-1,2.8-2.4,4.4-1.8c1.1,0.4,1.6,1.9,3.1,2.5
	c1.2,0.6,3.3,0.9,4.7,0.5c2.9-0.7,9.9-2.9,9.7,2.7c-0.1,2.6-0.9,5.8,0.8,7.9c1.5,1.9,3,3.3,4.2,5.2c2,3.1,4.4,1.9,6.4-0.3
	c0.9-1,1.8-2.7,3.3-3.1c1.7-0.4,3.3,0.2,5.1-0.5c0,0,0,0,0.1,0c2.7-1,5.5-2.7,8.6-2.3c1.5,0.2,2.9,1.5,4.1,1.7
	c1.7,0.2,3.1-1.8,3.5-3.1c0.5-1.4,0.5-3.3,0-4.8c-0.4-1.2-1.9-2.4-2.2-3.5c-0.5-2,1.1-2,2.3-3.2c1-1,1.6-2.6,2.6-3.7
	c1-1.1,2.2-2,3.1-3.3c0.8-1.1,1.5-2.7,2.5-3.7c2.2-2.3,6.5-2.4,9-0.5c2.1,1.7,3.2,5.1,4.8,7.2c3.8,0.5,4.9-2.1,3.6-4.6
	c-0.2-0.3-0.4-0.6-0.6-0.9c-2-2.6-0.7-5.4-2.6-8.1c-1.3-1.9-2.3-5.6-4.8-6.3c-1.7-0.5-3.1,0.3-4.7-0.8c-1.8-1.2-1.1-2.9-2.1-4.4
	c-0.9-1.4-2.9-1.7-4.5-1.8c-3.5-0.2-3.9-2-3.7-5.3c0.2-3.1,3-5.4,3.5-8.4c0.5-2.9,1.6-6.4,1.4-9.5c0-0.8-0.2-2.2-0.6-3.2
	c-0.2-0.5-0.5-0.9-0.8-1.2c-1-0.8-2.8-0.4-4-1.1c-2.7-1.6-3.6-5.1-7.4-4.4c-1.5,0.3-3,1.1-4.5-0.2c-1.1-1.1-0.8-2.6-1.3-3.8
	c-0.8-1.9-1.5-2-3.3-2.7c-1.5-0.6-2.6-1.7-4.3-2.1c-1.3-0.3-2.6-0.1-4,0c-0.2,2.6-2,4.9-4.1,6.7c-2.4,1.9-4.1,4.8-6.6,6.1
	c-3,1.6-5.3,0.5-8.1-1.6c-2-1.5-6.2-1.9-7-4.2c-1-2.9,2.9-4.9,0.4-7.6c-0.9-0.9-2.7-2.1-4.1-1.9c-1.6,0.2-1.9,1.4-2.9,2.4
	c-1.9,1.9-6,2.9-7.2,5.2c-1.8,3.3,2.2,3.6,2.8,5.8c0.8,2.8-3.7,3.5-5.3,3.9c-3,0.6-4,1-4.1,4.3c-0.1,2.5,0.2,4.3-1.2,5.2
	c0.2,0.1,0.4,0.3,0.6,0.4c2.8,1.9,6.1,1.6,9.1,2c1.7,0.3,2.7,0.8,3.1,2.7c0.4,2.1-0.4,2.6-1.9,3.7c-2.8,2.1-5.1,3.7-7.3,6.5
	c-1.8,2.4-4.5,3.3-6.4,5.6c-2.7,3.4-0.9,5.4,0.7,8.6c1.9,3.8-1.6,4.9-2.8,8.3c-0.9,2.7,0.7,6.7,2.7,8.5c0.8,0.7,2.1,1.2,3,1.8
	c0.2,0.1,0.4,0.3,0.6,0.5C179.8,625.2,178.7,627.7,180.4,628.5z"></path>
                                                <text transform="matrix(1 0 0 1 194.3 604.5135)" class="st1 st2">যশোর</text>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8662">
                                                <path id="dist_269" class="st0" d="M139.3,508.6c3.2-1.6,5.7-1.9,8-5.1c0.9-1.2,1.6-2.7,2.9-3.5c1.2-0.8,2.9-0.8,4.1-1.7c4.6-3.5,3.9-11.4,6.4-16
	c1.4-2.5,3.7-4.3,4.6-6.8c0.3-0.7,0.6-1.4,0.9-2c-0.9-2.1-0.9-5.2-0.5-6.6c1-3.4,0.2-4.9-3.3-6.2c-1.4-0.5-3.2-0.7-4.4-1.6
	c-1.3-1-1.6-2.4-2.6-3.6c-0.6-0.8-1.4-1-2.3-1.4c-0.8,1.1-2.1,1.5-2.7,2.8c-0.8,1.6,0,2.9,0.1,4.5c0,3.8-4.1,3.2-6.6,4.4
	c-2.6,1.2-3.7,4.2-6.6,5.4c-2.9,1.1-6.6,0.8-9.7,1.6c-4.8,1.2-1.2,4.1-0.6,7.3c0.5,2.8-1.9,5.6-2.5,8.4c-0.8,3.2,0,5.9,0.9,8.8
	c1.2,3.7-0.7,5.9-1,9.5c-0.3,4.3,3,3.8,4.9,6.4c0.9,1.2,0.7,2.7,2.2,3.6c1.1,0.7,2.9,0.4,3.8-0.6c0,0,0.1-0.1,0.1-0.1
	c1.1-1.3,0.3-2.7,0.9-4.2C136.9,510.3,138,509.3,139.3,508.6z"></path>
                                                <text transform="matrix(1 0 0 1 98.5 487.4747)" class="st1 st2">মেহেরপুর
                                                </text>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8659">
                                                <g id="dist_272">
                                                    <path class="st0" d="M158.2,459.1c1.2,0.9,3,1.1,4.4,1.6c3.5,1.2,4.3,2.8,3.3,6.2c-0.4,1.5-0.5,4.5,0.5,6.6
			c0.4,0.8,0.9,1.5,1.6,1.9c2.4,1.2,2.3-1.2,3.5-2c1.4-0.9,2.8,0.5,3.2,1.9c0.7,2.1-2.6,6.8,1.4,7.8c1.8,0.5,2.2-1,3.7,1
			c0.8,1,1.1,3.6,2.6,3.7c1.5,0.1,2-2.5,3.4-2.8c1.9-0.4,1,2.2,1.4,3.7c0.8,2.8,3.9,4.5,6.2,6.1c0.4-0.2,0.7-0.4,1-0.6
			c1.2-1,2-2.4,2.5-3.9c0.5-1.8-0.4-5.2,2-4.5c1.4,0.4,3.5,2.5,4.5,3.5c1.4,1.4,2.4,3,3.8,4.4c2.5-0.5,4.4-3.4,6.5-4.8
			c2.6-1.7,5-1.6,7.7-1.2c1.6,0.3,2.9-0.2,4.3,0c1.5,0.1,2.7,1.1,4.2,1.4c1.9,0.4,3.1-0.3,3.9-1.5c0.8-1.1,1.2-2.6,1.7-4
			c0.4-1.2,0.9-2.3,1.4-3.3c-0.9-0.4-1.8-0.8-2.7-1c-4.1-0.9-8.3-1-12.1-1.6c-3.6-0.6-7-3.6-9.3-6.3c-2.9-3.4-5.5-6.9-8.2-10.5
			c-1-1.3-2.4-2.6-3.1-4.3c-0.8-1.7-1-3-2.3-4.4c-1.2-1.4-3.3-2.3-4.5-3.9c-1-1.3-1.2-2.8-2.4-4.2c-2.8-3.2-6.4-1.9-10-0.6
			c-3.6,1.4-6.9,4.7-10.6,5.9c-3.9,1.2-9.1-0.4-11.8-3.1c-2.5-2.6-3.8-7.5-4.1-10.9c-0.3-3.7-0.4-8.6-2-12.5
			c-0.9-0.2-1.8-0.5-2.6-1.2c0,0,0,0.1-0.1,0.1c-1.2,2.6,0.4,6.6-2,8.7c-1,0.9-4.2,1-3.9,3.3c0.1,0.9,2.3,2.9,2.9,3.7
			c1.8,2.2,4.4,7.1,2.2,10.1c0,1.6,0,4,1.1,5.2c0.6,0.7,1.3,1,2.1,1.3c0.8,0.3,1.6,0.6,2.3,1.4C156.6,456.6,156.9,458.1,158.2,459.1z
			"></path>
                                                    <path class="st0" d="M240,466.4c-0.4-1.9-1.5-4-3.1-5.3c-0.6-0.5-1.3-1-2.1-1.2c-1.5-0.5-3.4-0.5-4.9-0.7c-1.7-0.2-3.2-0.7-5-0.6
			c-2.7,0.1-7.3,0.6-9.7-1c-1.6-1-2.1-1.9-3.9-2.5c-1.4-0.5-3.2-0.6-4.5-1.3c-0.9-3-2.7-6.6-4-9.4c-1-2.2-3.2-5.7-5.2-7.2
			c-2.2-1.7-5.2-1.6-7.3-3.4c-1.6-1.4-3-3.3-4.1-5.1c-1.1,0.1-2.3-0.4-3.3-0.8c-1.8-0.7-2.9-0.9-4.8-0.6c-1.5,0.3-3,1-4.5,1.1
			c-1.2,0.1-2.3-0.1-3.3-0.3c-1.6,1.5-4,2.5-5.9,2.2c-1.9-0.3-1.9-2.3-2.9-3.7c-0.5-0.6-1.1-1.2-1.8-1.6c1.4,3.2,1.5,6.6,2.7,9.7
			c0.7,1.9,1.8,2.6,3.6,3.9c1.5,1.1,2.6,2.4,4.1,3.5c3,2.3,9.9-0.8,12.9-2.2c4.1-1.9,8-2.5,12.3-1c3.8,1.4,5.6,5,6.9,8.5
			c1.4,3.7,1.6,7.7,4.1,10.8c4.4,5.4,9.8,8.6,15.7,11.9c2.8,1.6,5.3,3.2,8.5,4.1c2.8,0.8,5.4,1.8,8.5,1.7
			C240.4,472.5,240.7,470,240,466.4z"></path>
                                                    <g>
                                                        <g>
                                                            <text transform="matrix(1 0 0 1 172.1743 467.4414)"
                                                                  class="st1 st2">
                                                                কুষ্টিয়া
                                                            </text>
                                                        </g>
                                                    </g>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8672">
                                                <path id="dist_487" class="st0" d="M171.2,364c1.6,0.8,2.5,1.6,3.7,2.9c-0.9,2.3-2.7,4.3-3.7,6.6c-1.1,2.7-0.2,4.9-0.1,7.8
	c0.1,2.8,0.3,5.4-1.4,7.8c-1.5,2-4.7,2.2-5.9,4.6c-0.6,1.2-0.6,3.4-0.3,4.7c0.2,0.6,0.5,1.5,1,1.9c0.6,0.5,1.6-0.2,2.1,0.8
	c0.4,0.9-1.6,2.9-1.6,4.1c0,1.8,1.4,2.6,1.6,4.3c0.5,3.4-1.4,5.9,0.3,9.4c1,2.3,5.8,3.7,4.9,6.6c-0.3,0.9-0.8,1.7-1.5,2.4
	c1.1,0.2,2.2,0.4,3.3,0.3c1.6-0.1,3-0.8,4.5-1.1c1.9-0.3,3,0,4.8,0.6c1,0.4,2.2,0.9,3.3,0.8c0.4,0,0.8-0.2,1.2-0.5
	c1-0.8,0.9-2.6,2.2-3.2c2.7-1.3,4.6,3.8,8.1,1.7c1.4-0.8,2.3-2.4,3.9-3.1c1.6-0.7,3.1-0.4,4.7-0.7c2.6-0.5,6.2-2.1,7.8-4.1
	c1.8-2.3,3.2-5.3,5.5-6.9c2.2-1.5,4.8-3.5,5.9-6c1.2-2.9,0-6.5,2.1-9.3c0.9-1.2,2.4-1.4,3.1-2.9c0.2-0.4,0.3-0.7,0.3-1
	c0.2-1.4-0.9-2.5-1.2-4c-0.6-2.8,0.4-7-2.2-8.9c-1.3-1-3.1,0-3.7-2c-0.6-1.8,0.7-2.7,1.8-3.8c2.5-2.5,1.5-5.5,3.6-8.1
	c1.8-2.3,3.1-4.6,4.7-6.8c0.8-1.1,1.9-2,2.9-3c-1.6-1.2-2.7-3.3-4.1-4.6c-1.9-1.8-4.6-4.2-7.2-4.9c-2.1-0.6-3.4,0.3-5.5,0.5
	c-2.7,0.3-5.5-0.4-8.1-0.5c-3.1-0.2-4.9-1.5-7.2-3.7c-0.6-0.6-1.1-1.4-1.7-2.1c-1.4,0.5-2.7,0.9-3.5,2.3c-1.3,2.6,0,6.6,0.2,9.5
	c0.2,3.6,0.9,5.9-2.7,7.9c-3,1.7-6.2,1-8.3-1.5c-2.6-3.1-4.9-2.5-8.5-3.2c-0.2,1.3-0.9,2.6-1.5,3.5
	C177.6,360.8,170.8,362.3,171.2,364z"></path>
                                                <g>
                                                    <g>
                                                        <text transform="matrix(1 0 0 1 179.2534 392.8789)" class="st1 st2">
                                                            নাটোর
                                                        </text>
                                                    </g>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8675">
                                                <path id="dist_50" class="st0" d="M180,355.6c-2-0.4-5.5-1.8-6.5-3.8c-0.8-1.6-0.2-3.6-1.4-5.3c-1-1.4-2.2-1.2-3.7-1.9c-1.7-0.8-2.2-1.7-4.1-1.9
	c-1.7-0.2-3.3-0.4-5-0.6c-1.3-0.1-3.4,0.3-4.4-0.8c-1.1-1.2-0.2-3.1-2.3-3.2c-1.5-0.1-2.7,1.9-4.1,2.1c-1.7,0.3-2.9-1-4.7-0.4
	c-1.8,0.6-2.3,1.9-2.9,3.5c-0.9,2.1-3.2,5.5-5.9,5.4c-1.4,0-2.5-1.5-4.4-1.2c-1.7,0.2-3.2,1.7-5,1.4c-1.4-0.3-2.6-1.4-4.1-1.7
	c-1.6-0.3-3.1-0.4-4.5-1.5c-1.7-1.2-1.9-3.7-3.5-5c-1.1-0.9-2.9-1.2-4.6-1.4c-0.3,2.1-0.9,4-3.9,4.1c-2,0.1-2.4-0.7-4.1,0.5
	c-1.1,0.8-2.3,2-3.1,2.9c-2,2.2-3.3,5-5.6,6.7c-2.7,2-5.6,1.1-8.6,2.1c-4.7,1.4-3.3,12.3-3.1,16.5c0.1,2.4,0.1,6.8,1.7,8.6
	c1.9,2.1,4.8,2.5,6.3,4.9v-0.1c0,0.1,0,0.1,0,0.2c0.1,0.1,0.1,0.2,0.1,0.2c-0.2,0-0.2-0.1-0.1-0.2c0,0,0,0,0,0v0.3
	c-0.3,0.1-0.7,0.2-1,0.3c0.5,0.2,1.1,0.5,1.6,0.8c0.8,0.4,1.6,0.9,2.3,1.4c0.5,0.2,1,0.5,1.5,0.7c1.8,0.9,3.6,2.4,5.3,4
	c1,0.9,1.9,1.9,2.7,2.8c2.5,2.7,5.8,5.5,8.5,7.7c3.2,2.7,6.8,2.7,10.7,3.3c4.1,0.6,8.3-1,12.4-0.8c3.4,0.2,8.3,1.4,11.5,2.5
	c1.8,0.6,3.1,1.6,4.3,2.6c0.9,0.8,1.8,1.7,2.8,2.6c2.1,1.9,4.4,2.7,6.1,5.5c0,0,0,0,0,0c0.3,0.5,0.6,2.1,0.8,2.8
	c0.4,0.9,1,1.6,1.4,2.5c0,0,0,0.1,0.1,0.1c0.7,0.5,1.3,1,1.8,1.6c1.1,1.4,1,3.3,2.9,3.7c1.9,0.4,4.4-0.6,5.9-2.2
	c0.7-0.7,1.3-1.5,1.5-2.4c0.9-2.9-3.9-4.4-4.9-6.6c-1.6-3.5,0.2-6.1-0.3-9.4c-0.2-1.7-1.7-2.6-1.6-4.3c0-1.2,2.1-3.2,1.6-4.1
	c-0.5-1-1.5-0.3-2.1-0.8c-0.5-0.4-0.8-1.3-1-1.9c-0.4-1.3-0.4-3.5,0.3-4.7c1.2-2.4,4.4-2.6,5.9-4.6c1.8-2.4,1.6-5,1.4-7.8
	c-0.1-2.8-1-5,0.1-7.8c0.9-2.4,2.8-4.3,3.7-6.6c-1.1-1.3-2.1-2.1-3.7-2.9c-0.4-1.7,6.4-3.2,7.6-4.9c0.7-0.9,1.3-2.2,1.5-3.5
	C180.3,355.7,180.2,355.7,180,355.6z"></path>
                                                <g>
                                                    <g>
                                                        <text transform="matrix(1 0 0 1 109.0039 381.459)" class="st1 st2">
                                                            রাজশাহী
                                                        </text>
                                                    </g>
                                                </g>
                                            </a>

                                            <path class="st0"
                                                  d="M88.8,385.7v0.1c0,0,0,0,0,0C88.9,385.8,88.9,385.8,88.8,385.7z"></path>
                                            <path class="st0"
                                                  d="M89,386.1c0-0.1-0.1-0.2-0.1-0.2C88.9,386,88.8,386.1,89,386.1z"></path>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8671">
                                                <path id="dist_280" class="st0" d="M96.5,295.1c0.9,1.5-0.2,3.1,1.8,3.7c1.7,0.5,3.1-1.1,4.5-0.4c1.6,0.8,1.2,2.5,1.1,3.8c-0.3,3,0.8,6.2-1.1,9
	c-2.1,3-5.1,1.4-7.6,2.7c-3.8,1.9,3.4,3.6,3.3,6c-0.1,1.5-2.6,2.3-3.2,3.9c2.4,2.5,9.8,0.4,10,5.8c0.1,1.3-0.9,1.7-0.8,2.9
	c0,1.3,1.2,1.8,1.3,2.9c0.1,2.2-3.7,2.9-3.5,4.9c1.8,0.4,3-0.9,4.9-0.7c0.6,0.1,1.3,0.1,2.1,0.2c1.7,0.2,3.5,0.5,4.6,1.4
	c1.6,1.3,1.8,3.7,3.5,5c1.4,1,2.9,1.2,4.5,1.5c1.5,0.3,2.7,1.4,4.1,1.7c1.8,0.3,3.3-1.2,5-1.4c1.9-0.3,3,1.2,4.4,1.2
	c2.7,0.1,5-3.3,5.9-5.4c0.7-1.6,1.1-2.9,2.9-3.5c1.8-0.6,3,0.7,4.7,0.4c1.4-0.3,2.5-2.2,4.1-2.1c2,0.1,1.2,2,2.3,3.2
	c1,1.1,3.1,0.7,4.4,0.8c1.6,0.1,3.3,0.4,5,0.6c1.9,0.2,2.5,1.1,4.1,1.9c1.4,0.7,2.7,0.5,3.7,1.9c1.2,1.6,0.5,3.6,1.4,5.3
	c1,1.9,4.5,3.3,6.5,3.8c0.1,0,0.2,0,0.3,0.1c3.6,0.7,5.9,0.1,8.5,3.2c2.1,2.5,5.3,3.2,8.3,1.5c3.6-2,2.9-4.3,2.7-7.9
	c-0.1-2.9-1.5-6.9-0.2-9.5c0.7-1.4,2.1-1.9,3.5-2.3c1.5-0.5,2.9-1.1,3.3-3c0.7-3.2-1.9-6-3.8-8.3c-0.9-1.1-1.6-2.9-3.1-3.2
	c-2.1-0.5-2.1,1.5-3.3,2.2c-2.4,1.5-1.6-5.3-2.7-6.9c-1.7-2.4-6.3-2.9-8.6-1c-1.1,0.9-5.5,7.5-7.4,3.8c-0.6-1,0.3-3.7,0.4-4.9
	c0.1-1.6,0.4-3.1,1-4.6c0.6-1.6,1-3.2,1.4-4.9c-1.1-1.1,0.4-5.9,0.7-7.2c0.8-3.2,0.2-6.6,0.6-9.7c0.5-3.1,1.3-6.1,1.7-9.1
	c0.5-3.2,0.1-6.6-2.7-8.5c-3-2-4.2,1.7-7.3,1.9c-4.5,0.2-4.2-3.9-4.1-7.2c0.1-1.7,0.1-3.2,0.6-4.8c0.4-1.2,1.3-3,1.3-4.3
	c-0.1-2.3-4.5-4.5-3-7.6c-2.1-1.5-3.7-3.5-6.1-4.5c-3.6-1.6-5.5,0.6-8,2.6c-6.2,5-10.1-1.7-16.1-2.3c-4.2-0.4-10,0.1-13.8,1.6
	c-1.9,0.7-3.3,2.6-5.1,3.6c-2.4,1.4-3.7-1.1-5.2-2.4c-2-1.8-4.4-1.9-6.8-2.7c-2.3-0.8-6.8-1.7-8.6,0.8c-1.8,2.6,0.3,5.8,1.2,8.2
	c1.2,3.3-1.2,5.6-1.2,8.9c0,3.4,1.1,6.3,1.2,9.5c0.2,3.6-1.8,6-3.7,8.9c-0.9,1.4-1.2,3-2.3,4.3c-0.7,0.9-2.6,2.5-1.3,3.8
	c0,0,0,0,0,0C93.7,294.9,95.3,293.1,96.5,295.1z"></path>

                                                <g>
                                                    <g>
                                                        <text transform="matrix(1 0 0 1 130.6436 309.4521)" class="st1 st2">
                                                            নওগাঁ
                                                        </text>
                                                    </g>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8678">
                                                <g id="dist_322">
                                                    <path class="st0" d="M247.6,183.7c-2.9,0.3-7-1.4-7.2,3.1c-0.2,3,2.8,5.2,2.7,8.2c-0.1,2.6-2.3,5.5-3.7,7.7
		c-1.7,2.7-2.9,5.4-4.1,8.2c-1.1,2.6-2.6,5-3.8,7.5c-1.5,3-1.1,6.5-2.3,9.5c-0.8,2.2-2.3,6.2-5.1,6.8c-0.3,0.1-0.7,0-1-0.1
		c0,0.3-0.1,0.6-0.1,1c-0.5,3.7-1.6,7.6-5.8,8.3c-2.6,0.4-5.8-0.7-7.3,1.2c-0.4,0.4-0.6,1.1-0.7,1.9c-0.6,4.1,1.2,5.8,5,6.4
		c3.1,0.5,5.8,2,8.7,3.1c2.3,0.9,3.7,2.8,5.4,4.3c0.4,0.4,0.9,0.7,1.4,1c1.4,0.9,2.9,1.4,4.2,2.5c1.2,1,1.9,2.4,3,3.4
		c2.4,2,6.4,0.2,9.1,0.8c3.1,0.7,5.5,2.9,8.4,3.7c2.8,0.8,5.9,2.8,8.9,2.7c1.7-0.1,3-0.4,4.5-0.8c1.4-0.4,2.6-1.4,3.9-1.7
		c2.6-0.5,5.8,1.1,8.2,0c0.4-0.2,0.7-0.4,1-0.7c2.4-2.1,1-6.2,0.4-8.7c-0.9-3.4-0.3-6.7-0.2-10.1c0-3.8,0.4-6.2,2.6-9.3
		c2-2.8,2.2-5.4,3.4-8.4c0.8-2,1.3-2.7,1.2-4.9c0-0.5,0-0.9,0.1-1.3c-1.2-0.7-1.3-1.4-1.5-3.2c-0.4-2.6-1.2-6.1-4.1-7
		c-2-0.6-2.5,1.1-3.5-1.5c-0.5-1.3-1.1-3.5-1.3-4.9c-0.2-1-0.2-2.1-0.3-3.2c-3-2.4-5.2-5.7-6.1-9.6c-1-4.8,0.8-8.4-2.1-12.8
		c-2-3.2-4.4-7.2-7.3-9.7c-1-0.9-2.1-1.8-3.2-2.4c-0.5,0.3-0.9,0.7-1.4,1.1C254.4,178.8,252.4,183.3,247.6,183.7z"></path>
                                                    <path class="st0" d="M280.9,196c-0.1-2.3-1.2-4.1-3.1-5.3c-2.3-1.5-3.4-1.7-4.1-4.6c-0.3-1.2-0.3-2.3-1-3.3
		c-1.7-2.4-4.5-3.9-6.7-5.9c2.7,2.8,5.6,5.5,7.4,9.1c1.9,4,1.4,7.9,2.4,12.1c0.4,1.6,1.1,3.1,1.9,4.5c0-0.4,0.1-0.9,0.2-1.3
		C280.2,199.8,281.1,199.1,280.9,196z"></path>

                                                    <g>
                                                        <g>
                                                            <text transform="matrix(1 0 0 1 235.582 244.3018)"
                                                                  class="st1 st2">
                                                                গাইবান্ধা
                                                            </text>
                                                        </g>
                                                    </g>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8689">
                                                <g id="dist_47">
                                                    <path class="st0" d="M259.9,170.4c-0.1-0.1-0.1-0.1-0.2-0.2c-0.6-0.5-1.3-1-1.9-1.5c-0.1-0.1-0.2-0.1-0.3-0.2
		c-0.2-0.2-0.4-0.4-0.6-0.5c-0.1-0.1-0.2-0.2-0.3-0.3c-0.2-0.2-0.4-0.4-0.6-0.6c-0.1-0.1-0.2-0.2-0.3-0.3c-0.3-0.3-0.5-0.6-0.8-0.9
		c-1.8-2.1-1.4-4.8-2.8-7c-1.3-2.1-3-3.8-4.5-5.6c-1-1.1-1.8-2.4-2.3-3.8c-1.9,0.6-3.6-0.3-5.8-1.3c-1.4-0.6-2.7-0.7-4.2-1.1
		c-1.6-0.5-2.9-2.2-4.2-3.1c-1.7-1.2-4.2-1.5-5.6-3.1c-1.6-1.9-2-5-4.1-6.8c-0.9-0.8-1.8-1.4-2.7-2c0.6,1.9,1.2,3.9,1.5,6
		c0.5,3.5,2.2,6.6,4.1,9.8c1.4,2.4,3.6,5.1,5.5,7.1c3.4,3.5,8.7,4.5,12.1,8c1.9,1.9,2.5,3.4,5.4,4.3c2.7,0.8,5.7,0.7,8.4,1.5
		c0.3,0.1,0.6,0.2,0.9,0.3c0.1,0,0.2,0.1,0.3,0.1c1.6,0.6,3.2,1.5,4.5,2.5c-0.1-0.1-0.2-0.2-0.4-0.3
		C260.7,171.1,260.3,170.8,259.9,170.4z"></path>
                                                    <path class="st0" d="M210.9,127.5c-0.6-0.5-1.1-0.5-1.6-0.8c-2.2-1.4-4.1-2.4-6.8-2.1c-0.9,0.1-1.4,0.2-2,0.2c0.5,2.2,0,4.4-1.3,7
		c-1.1,2.2-2.7,3.3-5,4.1c-2.1,0.7-3.8,1-4.9,3c-1.1,2-0.5,3.7-2.7,5.2c-3.3,2.2-7.3,4.9-11,5.8c-4.3,1.1-7,4.8-8,8.6
		c-0.3,1.1-0.6,4.1-2,4.4c0,0,0,0,0,0c0.8,1.6,2.2,2.6,3.5,4.4c1.7,2.5,2.8,5.3,5,7.4c1,1,2.5,1.7,3.2,3c0.7,1.3,0.6,2.8,1.3,4.2
		c1.3,2.7,4.7,4.5,7.6,4.8c2,0.2,3.6-0.1,5.2,1.6c1.2,1.2,1.9,3,2.4,4.6c1.6,5.1-0.5,10.6,4.4,14.4c1.5,1.1,2.1,2.1,3.1,3.7
		c1.5,2.6,2.8,5,5.3,6.8c2.4,1.8,5.4,1.8,7.4,4.2c2,2.4,2.3,5.4,4,8c0.8,1.3,3.5,3.9,5.3,4.6c0.4,0.2,0.8,0.2,1,0.1
		c2.8-0.6,4.3-4.6,5.1-6.8c1.1-3,0.8-6.5,2.3-9.5c1.2-2.5,2.7-4.9,3.8-7.5c1.2-2.9,2.4-5.6,4.1-8.2c1.4-2.1,3.5-5,3.7-7.7
		c0.2-3.1-2.9-5.2-2.7-8.2c0.3-4.5,4.3-2.8,7.2-3.1c4.8-0.4,6.8-4.9,9.9-8c0.4-0.4,0.9-0.8,1.4-1.1c-0.5-0.2-1-0.5-1.5-0.6
		c-4.5-1.4-8,1.5-12-1.9c-2.6-2.2-4.3-6-7.5-7.4c-3.2-1.4-5.2-2.1-8-4.6c-4.1-3.6-7.8-6.7-10.8-11.5c0,0,0,0,0,0
		c-3.4-5.5-3.4-12.3-5.1-18.5c-0.9-0.2-1.7-0.5-2.4-1.3C211.3,128.5,211.2,127.8,210.9,127.5z"></path>

                                                    <g>
                                                        <g>
                                                            <text transform="matrix(1 0 0 1 197.7163 179.9531)"
                                                                  class="st1 st2">
                                                                রংপুর
                                                            </text>
                                                        </g>
                                                    </g>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8682">
                                                <path id="dist_483" class="st0" d="M80.3,88.1c4.1,0,9.7,0.1,13.2-2.2c1.9-1.3,3.7-1.6,6-0.7c2,0.8,4.1,2.1,5.8,3.6c0.8,0.7,1.4,1.6,2.2,2.3
	c4,3.5,9,4.7,11.5,10c1,2.2,0.3,3.9,0.3,6.2c0,0.4,0.1,0.8,0.2,1.2c0.4,1.4,1.4,2.5,2.5,3.6c1.4,1.3,3.5,3.3,5.4,3.5
	c2,0.1,4-1.2,5.9-0.9c1,0.2,1.7,1.1,2.8,0.9c0.1,0,0.2,0,0.2-0.1c0.8-0.3,1.3-1.4,1.6-2c1-1.8,2.1-3.6,3.2-5.4
	c2.2-3.6,0.2-9.4,0-13.2c-0.1-2.3-0.5-4.3,0.1-6.6c0.5-2,2-3.9,0.3-5.8c-1.9-2.2-3.8-3.6-4.1-6.7c-0.2-1.9,0-3.8,0.2-5.6
	c0.2-1.6,0.7-2.3,1.2-3.7c0.3-0.8,0.4-1.8,0.3-2.8c-0.1-1.6-0.5-3.2-1.2-4.3c-1.7-2.8-6-0.6-7.8-4.2c-0.5-1-0.7-2-1.2-3
	c-0.5-1-1.3-1.9-2-2.8c-1.5-1.8-2.9-3.1-4.8-4.4c-1.8-1.3-2.5-2.7-3.6-4.5c-0.7-1.2-1.8-2.7-3.1-3.3c-0.9-0.4-2.8,0-3.5,0.8
	c-0.5,0.6-1.8,1.4-2.7,1.2c-0.8-0.1-1-0.6-1.6-1.3c-0.7-0.8-1.2-1.7-1.9-2.5c-0.7-0.7-1.4-1-2.2-1.5c-1.4-1-2.3-2.7-3.5-3.8
	c-1.3-1.2-2.7-1.9-4.1-2.9c-2.1-1.4-3.6-1.6-5.8-2.3c-2-0.6-3.3-2.3-3.4-4.4c-0.1-2.1,1.1-4,0.8-6.3c-0.1-0.8-0.5-2-1.1-2.6
	c-4.4-4.4-6.4,8.8-7.1,10.7c-1.3,3.8-3.1,7.2-5.2,10.7c-1.1,1.9-2.4,3.5-1.6,5.7c0.5,1.4,1.6,3.9,2.7,4.9c2.2,1.9,2.2-2.6,2.4-3.9
	c0.5-2.5,2.2-3.9,4.5-2.2c1.9,1.5,3.2,2.3,5.7,2.3c2.1,0,4.8-0.5,5.9,1.8c0.8,1.8,1.4,3.9,2.5,5.7c0.6,0.9,1.5,1.6,2.1,2.5
	c0.7,0.9,1,2,1.6,3c0.8,1.5,1.6,4.8-0.8,5.3c-0.9,0.2-1.8-0.4-2.8-0.6c-1-0.2-2-0.2-3-0.3c-3.8-0.3-7.6,3.4-10.1,6
	c-1.9,2-4.5,3.6-5.6,6.2c-0.6,1.5-0.2,3.1,0,4.6c0.2,1.4,0.8,3,0.3,4.3c-0.6,1.6-2.7,3.2-4,4c-1.2,0.8-5.1,2-5.6,3.3
	c-0.1,0.2,0,0.4,0.1,0.6c0.8,0.8,4.3,0.7,5.2,0.9C76,88,78,88.1,80.3,88.1z"></path>
                                                <g>
                                                    <text transform="matrix(1 0 0 1 92.6436 80.0669)" class="st1 st2">
                                                        পঞ্চগড়
                                                    </text>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8679">
                                                <g id="dist_301">
                                                    <path class="st0" d="M279.1,217.3c1,2.6,1.5,0.9,3.5,1.5c2.9,0.9,3.7,4.4,4.1,7c0.3,1.8,0.3,2.5,1.5,3.2c0.2,0.1,0.3,0.2,0.5,0.3
		c0.6,0.3,3.5,1.4,4.1,1.3c0.6-0.2,1-0.6,1.2-1.2c0.9-2.2,0.1-6.5,0-8.1c-0.1-1.3-0.5-2.9-0.9-4.5c-1.8-2.5-5-3.3-8.7-4.1
		c-2.6-0.6-5-1.8-7.1-3.4c0,1.1,0.1,2.2,0.3,3.2C278,213.7,278.6,215.9,279.1,217.3z"></path>
                                                    <path class="st0" d="M252.4,118.2c2.1,2.5,4.8,4.1,6.8,6.6c2.2,2.7,4.4,4.7,4.7,8.3c0.3,3,0,6.5-1.8,8.9c-2,2.7-5,1.9-7.7,2.4
		c-2.9,0.5-5.1,2.3-7.2,4.1c-0.7,0.6-1.3,0.9-1.9,1.1c0.5,1.4,1.3,2.7,2.3,3.8c1.6,1.8,3.2,3.5,4.5,5.6c1.4,2.2,1.1,4.9,2.8,7
		c0.3,0.3,0.5,0.6,0.8,0.9c0.1,0.1,0.2,0.2,0.3,0.3c0.2,0.2,0.4,0.4,0.6,0.6c0.1,0.1,0.2,0.2,0.3,0.3c0.2,0.2,0.4,0.4,0.6,0.5
		c0.1,0.1,0.2,0.2,0.3,0.2c0.6,0.5,1.3,1,1.9,1.5c0.1,0.1,0.1,0.1,0.2,0.2c0.4,0.3,0.8,0.6,1.1,1c0.1,0.1,0.2,0.2,0.4,0.3
		c0,0,0,0,0,0c0,0,0,0,0,0c0.7,0.5,1.3,1,1.8,1.5c0.8,0.8,0.8,1.2,1.7,2.1c0.3,0.3,0.4,0.6,0.7,1c0.2,0.2,0.2,0.5,0.4,0.7
		c2.2,2,5,3.5,6.7,5.9c0.7,1,0.7,2.1,1,3.3c0.7,2.9,1.8,3.1,4.1,4.6c1.9,1.2,3,3,3.1,5.3c0.2,3.1-0.8,3.8-3.1,5.4
		c-0.1,0.4-0.1,0.8-0.2,1.3c1.4,2.2,3.2,4.1,5.2,5.6c1.7,1.3,3.7,2.4,5.8,2.8c1.5,0.3,3.1-0.3,4.6-0.4c0.6-1.1,1.4-2.1,2.3-3.2
		c0.2-1,0.3-2,0.6-2.9c0.7-2,1.4-3.7,1.9-5.8c0.4-1.8,0.9-3.3,1-5.1c0-0.6,0-1.1,0.1-1.7c0,0,0-0.1,0-0.1c-0.3-5.4,0.7-10.1,3-15.1
		c1.5-3.3,4-4.7,4.1-8.5c0.2-4.7-1.8-9.6-0.5-14.2c0.2-0.8,0.6-1.6,1-2.2c0-1.6-0.2-3.2-1.2-4.5c-2.3-2.9-2.9-4.4-2.5-8.2
		c0.3-3.2,0.4-6.8,1.9-9.7c0.9-1.7,6.2-6.7,4.9-8.7c-0.8-1.2-2.9-0.1-4.1-0.9c-1.8-1.1-0.6-2.2-0.2-3.8c0.8-3.4-2-3.7-4.2-5.3
		c-2.5-1.9-6.1-4.6-5.7-8.2c0.4-3.5,0.6-6.3-1-9.5c-1.4-2.7-3.2-5.1-5.8-6.4c-2.4-1.3-7.3-0.3-8.7-2.8c-1.5-2.7,1.7-6.9-0.4-9.7
		c-2.5-3.3-6.1,0.4-6.3,3.1c-0.4,4.1-3.2,3.9-6.2,6.4c-2.9,2.4-1.8,5.5,0,8.3c1.6,2.5,4.4,4.1,5.4,7c0.4,1.2,1.1,3.5-0.2,4.2
		c-1.3,0.7-3.3-0.6-4.8,0.3c-2.9,1.7-1.9,5.8-2,8.7c-0.1,1.6-0.1,3.2-1.4,4.3c-0.6,0.5-1.4,0.8-2.2,0.6c-1.3-0.4-0.8-1-1.3-1.8
		c-2.1-2.7-5.2-3.5-8.4-2.7c-1.2,0.3-2.3,0.6-3.2,1.3c0.3,0.2,0.7,0.4,1,0.7C250.8,115.6,251.5,117.1,252.4,118.2z"></path>

                                                    <g>
                                                        <text transform="matrix(1 0 0 1 261.0161 159.2661)" class="st1 st2">
                                                            কুড়িগ্রাম
                                                        </text>
                                                    </g>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8669">
                                                <path id="dist_277" class="st0" d="M283.8,289.9c-0.2-0.3-0.3-0.7-0.5-1c0-0.1-0.1-0.2-0.1-0.3c-0.1-0.3-0.2-0.5-0.3-0.8c-0.1-0.4-0.2-0.7-0.4-1.1
	c-0.5-1.5-0.6-3.1-1-4.5c-0.4-1.4-1.1-2.6-1.6-4.1c-0.6-1.7-0.1-4-0.2-5.9c-2.4,1-5.7-0.5-8.2,0c-1.4,0.3-2.6,1.3-3.9,1.7
	c-1.6,0.4-2.9,0.7-4.5,0.8c-2.9,0.1-6.1-1.9-8.9-2.7c-3-0.8-5.4-3.1-8.4-3.7c-2.7-0.6-6.7,1.2-9.1-0.8c-1.1-0.9-1.8-2.4-3-3.4
	c-1.3-1.1-2.7-1.6-4.2-2.5c-0.5-0.3-0.9-0.6-1.4-1c-0.2,0.2-0.4,0.3-0.7,0.5c-1,0.6-2.7,0.4-3.5,1.6c-0.7,1.2,0.1,2.6-1.1,4
	c-1,1.2-2.8,1.5-3.7,2.6c-1,1.3-0.4,3.2-0.4,4.9c-1.2,0.7-2.7,1.2-3.7,2.3c-1.1,1.3-1.1,2.9-1.6,4.3c-0.9,2.4-2.4,6.3-4.1,8.2
	c-1,1.1-2.7,2.4-4.1,2.6c-1.8,0.3-2.8-1-4.5-1.2c-4.2-0.5-6.1,1.2-6,5.1c0.1,3.2,3,6.2,0.6,9.1c-1.3,1.5-2.5,2.1-4.3,2.2
	c-1.7,0.1-3.9,0-5.5,0.3c-1.6,0.3-2.3,1.6-3.6,2.4c-0.8,0.5-1.3,0.5-1.6,0.2c-0.4,1.7-0.8,3.3-1.4,4.9c-0.6,1.5-0.9,3-1,4.6
	c-0.1,1.2-0.9,3.8-0.4,4.9c2,3.7,6.3-2.9,7.4-3.8c2.3-1.9,6.9-1.4,8.6,1c1.2,1.7,0.3,8.5,2.7,6.9c1.2-0.8,1.2-2.7,3.3-2.2
	c1.6,0.4,2.2,2.2,3.1,3.2c1.9,2.2,4.5,5,3.8,8.3c-0.4,2-1.9,2.5-3.3,3c0.6,0.7,1.1,1.5,1.7,2.1c2.2,2.2,4,3.5,7.2,3.7
	c2.7,0.2,5.5,0.8,8.1,0.5c2-0.2,3.3-1.1,5.5-0.5c2.6,0.7,5.3,3.1,7.2,4.9c1.4,1.3,2.5,3.4,4.1,4.6c0.7,0.5,1.5,0.9,2.5,0.9
	c3,0.2,6.6-1.6,9.5-0.3c2.8,1.4,4.6,3.6,7.9,1.5c1.1-0.7,1.7-2,2.8-2.6c1-0.5,3.6-0.6,4.7-0.3c2.7,0.6,6.8,2.2,9.7,0.6
	c2.4-1.4,3.8-5.3,2.4-7.8c-1.4-2.4-4.8-3.4-6.4-5.8c-1.1-1.6-2.8-6.9-2.2-8.9c1.2-3.8,6.1-1.2,8.5-0.8c8,1.2,9.2-7.8,8-13.6
	c-0.6-3-2.8-5.3-3.5-8.2c-0.1-0.5-0.2-1-0.3-1.5c-0.6-2-0.8-4.1-0.5-6c0.1-0.7,0.3-1.3,0.5-2c0.4-5.2,1.3-5.9,3.2-8.8
	c0.2-0.4,0.4-0.8,0.5-1.2c0-0.1,0.1-0.3,0.2-0.4C284.1,290.6,283.9,290.3,283.8,289.9C283.8,290,283.8,289.9,283.8,289.9z"></path>

                                                <g>
                                                    <g>
                                                        <text transform="matrix(1 0 0 1 224.2925 316.9307)" class="st1 st2">
                                                            বগুড়া
                                                        </text>
                                                    </g>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8631">
                                                <g id="dist_328">
                                                    <path class="st0" d="M514.1,389.2c-0.5,0.1-1,0.3-1.4,0.6c-1.2,0.9-1.5,2.9-2.7,3.8c-1,0.8-2.8,1.2-4,1.6c-2.9,1-5.6,2.3-8.5,3.7
		c-2.7,1.4-5.9,3.4-4.9,6.8c0.8,2.9,2.8,5.2,3.2,8.3c0.4,2.8-0.5,5.6-1.5,8.1c0.5,0.7,1.2,0.5,2.7,0.4c2.7-0.1,2.9-0.5,5.2-2.3
		c1.5-1.2,3.2-1.8,4.7-3c4.7-3.8,6.7-8.8,6.7-14.8c0-1.9-0.8-2.9,0-4.9c0.6-1.4,2.2-2.5,2.7-3.8c0.4-0.8,0.4-1.5,0.4-2.2
		C515.6,390.9,514.5,390.3,514.1,389.2z"></path>
                                                    <path class="st0" d="M535,433.1c-0.5-3.4,1.1-6.2,0.2-9.5c-0.8-2.9-3-5-4.6-7.6c-1.5-2.5-3.1-6.1-1.1-8.9c1-1.4,2.5-1.4,3.4-2.8
		c0.4-0.7,1-1.5,0.5-2.3c-0.5-0.9-1.6-0.1-2.1-0.8c-1-1.4,0.7-2.6,1.8-3.3c1.5-0.9,2.5-1.4,3.5-3.1c1.8-3-1.8-5.9-4.8-4.4
		c-2.6,1.2-3,5.1-5.8,6.3c-3.2,1.3-4.6-1.1-6.3-3c0,0.1,0,0.1,0,0.2c-0.3,2.1,0.4,3-0.9,4.9c-0.7,1.1-6.1,7-2.2,7.2
		c3,6.7-7.9,15.3-12.5,18.7c-3.5,2.5-7.1,4.3-5.6,9.3c1.2,3.9,3.4,6.6,3.6,11c0.3,4.9-0.9,5.7-4.4,8.2c-3.1,2.3-3.9,6.1-6.5,8.8
		c-2.5,2.5-6.4,2.7-8.9,5.2c-2.3,2.3-2.7,5.1-4.1,7.5c2-0.4,4.1-0.7,6.3-1.1c4.6-0.9,6.1-4.5,10.7-0.9c3.3,2.6,6.1,4.8,8.6,8.3
		c2.1,3,5,7.6,8,9.6c1.3,0.9,3.1,1.6,4.9,1.9c2.3,0.4,4.8,0.1,6.3-1.2c4-3.3-1.7-5.6-4.5-7.2c-1.3-0.7-4.6-2.6-4.4-4.4
		c0.3-2.4,3.8-2.3,5.2-2.5c1.4-0.2,5.5,0.1,6.5-0.9c1.3-1.3,0.4-4.5,0.6-6.2c0.4-4.2,2.9-7.7,3.3-12.1c0.5-4.5,0.3-8.5,3.2-11.9
		c2.5-2.9,2.6-6.4,3.9-9.8C535.9,435.6,535.2,434.6,535,433.1z"></path>
                                                    <path class="st0" d="M489.6,431.3c0.2,2.7-0.4,4.1-2.7,6.3c-2.4,2.3-3,4.5-4.5,7.2c-1.5,2.6-4.4,4.9-6.4,7.2
		c-1.9,2.3-3.4,5.5-6.2,6.9c-3,1.5-6.3-1.1-9,0.9c-0.5,0.3-0.9,1.3-1.3,1.5c-1.1,0.6-1.4,0.1-2.4,0.2c-1.7,0.2-2.7,0.8-3.5,2.2
		c-1.9,3.2,0.4,5.3,0.5,8.3c0,0,0.1,0,0.1,0.1c1.2-2,2.6-3.6,4-3.2c1.9,0.5,4.4,6.4,5.5,3.6c0,0,0,0,0.1,0c-0.1-0.5-0.2-0.9-0.2-1.4
		c0-0.3,0-0.5,0.1-0.9c0-0.2,0.1-0.3,0.1-0.5c0.4-1,1.9-3.2,2.7-3.9c1.5-1.4,2.7-0.9,4.7-1.1c1.6-0.2,3.3-1,4.9-1.1
		c1.6,0,3.1,0.9,4.8,0.3c2.7-1,4.3-5.2,7-5.8c0.1,0.5,0.5,0.8,0.6,1.1c0.9-1.7,2-3.7,3-5.3c0.8-1.3,2.5-2.3,3.3-3.8
		c0.5-0.8,0.2-2,0.7-2.8c0.4-0.7,1.6-1,2.2-1.7c1.4-1.7,1.2-3.3,0.4-5.2c-0.7-1.7-1.8-3.2-2.6-4.9c-0.4-0.8-0.4-1.8-1.1-2.4
		c-0.9-0.7-2.3,0.1-2.9-0.4c-0.9-0.8-1.1-1.3-0.9-1.8c-0.1,0-0.1,0.1-0.2,0.1C490.1,431.3,489.9,431.3,489.6,431.3z"></path>
                                                    <g>
                                                        <g>
                                                            <text transform="matrix(1 0 0 1 501.9131 462.5039)"
                                                                  class="st1 st2">
                                                                ব্রাহ্মণবাড়িয়া
                                                            </text>
                                                        </g>
                                                    </g>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8666">
                                                <path id="dist_256" class="st0" d="M371.8,245.1c0.3,1.4-0.8,3.8-1.1,5.1c-0.3,1.6-0.7,3.3-0.6,4.9c0.1,1.1,0.6,2.5,1,3.5c0.5,1.1,1.6,1.8,2.1,2.9
	c1,2.6-2.6,3.7-4.3,4.8c-1.1,0.7-3,4.2-2.9,7.3c0.2,4.9,4.4,6.7,4.8,7.3c1.3,2.1,0,2.6-1.2,3.9c-2.2,2.4,0.6,5.6-1.9,8.2
	c-1.1,1.1-2.3,1.2-3.6,1.7c-0.5,0.2-0.4,1.6-1.6,3.1c-0.9,1.2-2.3,1.7-3.2,2.8c-1,1.2-1.4,2.8-2.3,4.1c-1.7,2.6-2.4,4.9-5.5,5.9
	c-0.8,0.3-1.6,0.5-2.4,0.6c-0.2,0-0.6,0.3-0.7,0.4c-0.9,2.3-1.8,5-1.5,6.8c0.3,2.4,4.6,5.4,6.5,6.7c2.4,1.6,4.1,5.2,3.1,8.1
	c-0.6,1.6-2.4,2.6-2.9,4.3c-0.2,0.9-0.5,3.7-0.5,4.7c0.2,1.8,1.4,2.8,2.4,4.2c1,1.4,1.4,2.9,2.1,4.5c1.7,3.7,5,6.5,8.5,8.4
	c1.1,0.6,2.5,0.7,3.5,1.2c2.1,1.1,0.5,1.4,0.2,3.5c-0.3,1.9,0.9,1.6,1.4,3.1c0.7,1.9-0.7,1.9-1.8,3.3c-0.9,1.2-1.3,2.3-1.4,3.9
	c-0.3,2.7,0,6.3,2.1,8.1c2.3,1.9,3.4,4.1,5,6.7c0.7,1.1,1.6,2.9,2.7,3.7c1.1,0.9,1.8,0.8,2.7,0.5c0.4-0.1,0.7-0.3,1.1-0.5
	c3.5-1.6,5.1-2.7,8.5-0.8c5.4,3,7.9-1.7,10.2-5.6c0.6-1,1.5-2.7,2.7-2.9c1.3-0.3,3.3,1.4,4.6,1.6c1.6,0.2,3.3-0.4,4.9,0.1
	c1.4,0.5,2.4,1.8,3.7,2.3c2.6,1.1,6.6,0.2,9.5,0.2c2.4,0,5.4,2.4,7.7,2c0.3-0.1,0.6-0.4,0.6-0.5c0.1-0.4,0.1-0.8,0.2-1.1
	c0.7-3.2-0.8-7-1.7-9.9c-0.9-2.9-0.6-6.3-2.3-9c-1.8-2.9-4.8-2.6-7.6-4.2c-0.9-0.6-2.9-1.6-3.1-2.8c-0.3-2.1,2.1-1.5,3.3-1.8
	c1.6-0.4,2.3-1.8,3.9-2.3c1.7-0.6,2.7,0.3,4.1,1c3.4,1.7,5.3-0.3,8-2.3c3.4-2.7,4.8,1.3,8.4,0.8c2-0.3,2.2-1.5,3.6-2.6
	c1.3-1,2.8-0.9,4.3-1.6c3.2-1.4,3.2-4.5,2.8-7.7c-0.1-0.7-0.2-1.1-0.3-1.5c-0.4-0.9-1-1-2.2-2c-1.4-1-0.9-2.7-2.2-3.8
	c-1.5-1.3-2.8-0.8-3.7-2.7c-0.8-1.7-0.4-2.6-2.5-3.5c-2.6-1.2-5.5-0.5-7.3-3.2c-2.2-3.4-0.4-5.9,1.3-8.9c1.1-2,2.5-6.6-1.1-6.8
	c-0.1,0-0.4-0.2-0.4-0.3c-0.2-2.3,1-5.9-1-7.5c-1.4-1.1-5.2,0.4-6.8,0.8c-2.1,0.5-2,0.4-3.6-0.6c-1.7-1-2.8-0.4-4.6-0.8
	c-3.4-0.8-3.9-4.3-4.3-7c-0.2-1.4-0.2-3-1.2-4.2c-1.1-1.2-2.7-1.7-3.8-3c-1.1-1.3-1.9-2.5-2.1-4.1c-0.2-1.8,0.2-3.7-1-5.2
	c-1.1-1.5-3.4-1.8-4.2-3.6c-1-2,0-4.8-1.4-6.8c-3.6-5.2-7,3.9-10.7,4.9c-4.4,1.2-2.4-5.2-2.7-7.4c-0.2-2-1.6-2.2-1.4-4.1
	c0.1-2,1.1-2.6,2.6-3.5c2.3-1.4,4.6-3.4,1.4-5.7c-1.2-0.9-3.4-1.1-2.1-3c1-1.4,3.6-0.4,3.8-2.2c0.1-1-3.9-2-8.3-1.7
	c-3.5,0.2-4-4.6-7.3-5.7c-3.5-1.1-6.5,0.1-10.1-0.3c-0.9-0.1-1.2,0.2-1.1,0.2C370.8,243.4,371.6,244.2,371.8,245.1z"></path>
                                                <g>
                                                    <g>
                                                        <text transform="matrix(1 0 0 1 368.5103 331.8945)" class="st1 st2">
                                                            ময়মনসিংহ
                                                        </text>
                                                    </g>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8654">
                                                <g id="dist_285">
                                                    <g>
                                                        <path class="st0" d="M332.9,790.7c2.4,1.4,2.8,7.6,3,10.4c0.2,2.2,2.9,10.9-1.9,9.6c-4.2-1.2-1.8-7.4-1.6-10.1
			c0.2-3.5-3.1-7.6,0.3-9.9c0.4,0.1,0.3,0.4,0.6,0.6"></path>
                                                        <path class="st0"
                                                              d="M328.2,812.4c3.1,0.8,1.9,5.7-0.5,7.4c-1.1-2.4,0.1-4.8-1.1-7.1c0.1-0.1,0.7-0.1,0.5,0"></path>
                                                        <path class="st0" d="M299.4,805.6c-3.7-3.5-3.5,3.7-3.2,5.5c0.4,3-2.5,6.4-0.7,8.9c0.8,1,2.3,1.1,3.1,2.4c0.9,1.5,0.4,3.1,1.2,4.6
			c1.3,2.7,5.3,2.2,7.6,3.9c6.7-2.8-1.3-9.1-3.9-11.2c-2.7-2.2-4-2.5-3.8-6.4c0.1-2.9,0.7-5.8-1.1-8"></path>
                                                        <path class="st0" d="M289.8,819.8c-0.1,1.1,2.2,2.4,3,3.6c1,1.6,0.9,3.4,1.4,5.2c0.7,2.4,6.1,7.4,2.2,8.2
			c-2.2,0.5-6.8-4.3-7.4-6.3c-0.6-2.2,0.5-3.9,0.3-6.1c-0.1-1.3-2.2-4.7,1.1-3.8"></path>
                                                    </g>
                                                    <g>
                                                        <path class="st0" d="M333.4,746.2c-0.2-1.7-0.2-3.2-0.6-4.7c-0.6-2-1.8-2.9-2.8-4.3c-1.6-2.3-3-5.5-2.9-8.2
			c0.1-2.9,1.2-5.9,2.9-8.4c0.9-1.4,1.6-2.3,2.1-3.9c0.7-2.6,1.2-5.5-0.4-7.7c-1.2-1.7-3.6-3.5-1.6-5.6c1.8-2,6.4-1.8,7.5-4.4
			c1.7-3.7-4.8-2.6-6-4.7c-1.9-3.5,4.3-3.6,5.8-3.1c2.1,0.6,5.3,4.2,7.6,3c0.3-1.6-0.7-1.9-1.6-2.9c-0.8-0.8-1.4-1.7-1.8-3.1
			c-0.8-2.5,0.8-4.6-1.1-6.6c-1.2-1.2-2.2-1.4-2.8-3.1c-0.6-1.5-0.3-3.2-0.7-4.7c-0.7-3.3-2.2-5.4-4.1-8.2c-1.6-2.4-2.7-6.1-2.5-9
			c0.2-3.6,1.2-5.6,2.9-8.6c0.9-1.6,1.6-2.4,1.1-4.3c-0.4-1.7-1.2-2.3-0.6-4.2c0.7-2.2,2.7-4.4,4-6.4c-0.3-0.5-0.4-1.1-0.8-2
			c-1.4-3.5-3.9-2.9-6.5-4.4c-1.4,1-3,1.6-5.1,1.7c-2.9,0.2-3.1,0.1-4.6-2.5c-1.1-1.8-1.7-2.4-3.6-3.9c-2.8-2.3-4.5-6-7.3-7.8
			c-0.6,1-1.7,1.4-3,1.3c0,0.4-0.1,0.9-0.1,1.3c-0.3,1.8-1.3,3.8-2.3,5.4c-2,3.3-5.1,5.6-8.2,8c-3.9,3-5.8,5-6,10.2
			c-0.2,4.6,0.3,7.5-2.3,11.5c-2.1,3.4-4.6,6.6-6.6,10.2c-2,3.7-3.6,7.7-3.2,12.1c0.4,4.5,2.3,7.7,4.1,11.6c2.2,5,2,10.6,5,15.6
			c1.1,1.9,1.9,3.6,2.2,5.8c0.4,2.4,1.4,3.8,1.9,6c0.8,3.9-1.9,8.1-2.1,12.1c-0.2,4.1-0.9,8.8-2.8,12.3c-2.1,3.9-4.9,5.7-2.4,9.9
			c1,1.6,2.7,2.8,3.3,4.7c0.6,1.8,0.3,4.9,0.2,6.7c-0.1,3.5-2.5,5.5-2.9,8.2c-0.1,0.8-0.1,1.7,0.3,2.7c1.4,4.1,1.8,7.5,1,12.1
			c-0.3,1.8-1.9,4.2-0.8,6c1.4,2.2,3.3,1.1,4-0.8c1.3-3.4,1.5-9.3,1.4-12.6c-0.2-4.3,0.6-9.1-0.3-13.2c-0.9-4.6-0.6-7.7,1.6-12.1
			c0.8-1.8,2.7-3,2.9-5.1c2.9,0.7-1.2,6.4-1.6,8c-0.9,3.3-0.8,7.1,0.2,10.4c1.1,3.5,2,6.4,2.2,10.2c0.2,3.5,0,6.9-1.4,10.2
			c-1.6,3.7-3.1,7.6-2.5,11.8c0.5,3.3,4.2,8.1,8.2,5.7c1.7-1.1,1.4-3.8,3.7-1.1c1.4,1.6,0.8,3.5,1.6,5.2c0.6,1.2,2.5,3.1,3.8,3.3
			c2.2,0.4,3.6-2.1,6-1c0.8,3.1,2.2,7.6,6,8.3c4.8,0.8,7.1-3.8,7.5-8c0.2-2.2,0.1-4.3,0.5-6.4c0.4-2.2,0.8-4,0.3-6.3
			c-0.8-3.9-4.9-7.6-3.4-11.9c2.1-5.9,6.8,0.8,10.2-0.7c1.9-0.9,2.1-3.9,2.2-5.8c0.1-2.2,0.9-4.3,0.8-6.3c-0.2-3.7-2.9-7.6-3.9-11
			c-1.1-3.7-1-6.3-0.5-9.8C334.1,748.3,333.6,747.6,333.4,746.2z"></path>
                                                    </g>
                                                    <text transform="matrix(1 0 0 1 276.1 717.514)" class="st1 st2">বাগেরহাট
                                                    </text>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8630">
                                                <path id="dist_376" class="st0" d="M761.8,869.3c-2-3.5-2.7-7.3-4.1-11c-1.5-3.9-3.4-8.3-4.6-12.2c-0.9-3-0.6-6.6-1.1-9.7
	c-0.6-3.6-1.3-7.1-1.8-10.7c-1.2-7.8-1.9-16.1-1.7-23.9c0.1-4.3,0.1-8.8-0.6-13c-3.4-0.1-4.3-7.2-5.2-9.5c-1.4-3.7-3.4-7-5.7-10.2
	c-2.6-3.5-3.9-6.9-4.2-11.2c-0.3-4.1-1.9-7.8-2.5-11.8c-0.5-3.5-1.6-6.3-2.5-9.6c-1.8-6.9-3.3-13.3-9.7-17.5
	c-3.3-2.2-5.2-5.8-8.4-8.3c-2.9-2.3-7.3-3.4-10.5-3.8c-4.1-0.6-8.1-2.1-11.8,0.6c-3.5,2.5-5.9,6.4-8.4,9.6c-0.8,0.9-1.6,1.5-2.6,1.8
	c-0.2,1.8-1.4,3.4-1.4,5.3c0,3.7,2.9,5.7,3.5,9c0.5,2.7-0.1,5.9-0.5,8.6c-0.7,4.5-2.1,7.3,1.3,10.5c1.6,1.5,2.5,2.6,3.3,4.6
	c0.4,1,0.3,1.8,1.1,2.7c0.8,0.8,1.9,0.6,2.5,1.6c2.2,3.7-2,7.9-3.6,10.8c-2,3.4-3.7,7.7-8.5,5.2c-2.1-1.1-2.5-2.5-5.2-1.9
	c-1.7,0.4-2.5,0.8-3.7,0.6c0,0.4,0.1,0.9,0.1,1.4c0.6,4.1,2.4,7.1,3,11.3c0.3,2.2,0,4.5,0.5,6.6c0.3,0.9,0.3,1.5,1,2.2
	c1.8,1.9,0.8,0.6,2.8,0.2c0.9-0.2,1.6-0.8,2.8-0.5c1.3,0.4,1.3,1.8,2.7,1.8c2,0,3.4-2.4,3.4-4.1c0-2.2-1.6-3.7-1.9-5.8
	c-0.4-3,1.2-3,3-0.8c1.2,1.6,1.3,3.3,2.4,5c1.2,1.8,2.9,2.4,4.2,3.6c1.8,1.6,2.1,2.8,0,4.3c-2.1,1.6-3.1,0-5,0.2
	c-2.3,0.3-2.8,2-3.8,3.6c-1.3,2.2-1.7,2.4-4.4,3c-2.2,0.5-4.6,0.6-4.9,3.6c-0.3,2.6,2.2,3.2,3.2,5.2c2.2,4.2-0.8,8.4,4.4,11
	c2,1,3.8,1,4.1,3.8c0.2,2.7-1.8,3.3-3,5.1c-2.4,3.6,4,5.2,6.6,7.3c3.3,2.7,5.8,5,6.1,9.5c0.2,3.6-1.7,9.8-6.3,7.5
	c-1.7-0.8-1.8-3.3-3.6-4.1c-2.3-1-3.9,0.6-4.7,2.6c-1.4,3.2,1.1,8.8,1.7,12.1c0.3,1.8,0.6,4.9,1.6,6.3c1.9,2.9,4.1,2.5,3.9,6.6
	c-0.1,3.6-2.1,7.1-1.1,10.7c0.4,1.6,1.1,2,1.9,1.7c0.6-0.2,1.3-0.9,2.2-1.7c1.2-1.2,2.6-2.8,3.6-4.2c3.3-4.6-1.6-7.1-2.7-11.2
	c-0.5-1.7-0.6-4.9,0.4-6.5c1.3-2,3.8-2.1,5.4-3.4c3.1-2.7,1.9-6.3,2.8-9.8c0.5-2,1.6-2.9,3.9-2.5c1.3,0.2,3.1,2.4,4.7,1.7
	c2.4-1,1.5-6.9,3.8-8.9c4.4-3.9,9.7,1.2,11.8,5.1c1,1.9,0.9,3.7,1.4,5.7c0.9,3.6,4.1,5.7,7.7,6.3c4.5,0.7,7.4-3.2,11.7-1.3
	c3.5,1.5,5.4,6.2,6,9.8c0.5,3.3-1,10.5,4.2,9.3c2.4-0.5,2.9-2.5,4.6-3.9c1.6-1.3,3.6-1.3,5.3-2.4C767.3,876,763.7,872.6,761.8,869.3
	z"></path>
                                                <text transform="matrix(1 0 0 1 696.8544 816.1004)" class="st1 st2">
                                                    বান্দরবান
                                                </text>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8687">
                                                <path id="dist_252" class="st0" d="M471.1,254.9c-0.6,2.6,1.4,1.9,1.9,3.3c0.8,2.3,0.5,1.7-0.2,4c-0.6,1.9-1.7,1.4-1.2,3.6c0,0.1,2.1,2.1,2.5,3
	c2.6,6.8-2.6,11.1,6.5,14c5.4,1.7,10.8,2.5,15.7,5.3c2.6,1.5,4.5,2.4,5.8,5.4c1,2.4-0.5,6.2,1.2,7.9c1.3-1.4,1.6-5.9,4.5-5.7
	c2.8,0.2,2.5,5.1,2.1,7.4c-0.8,5-7.3,8.8,0.4,11.5c5.9,2.1,10.3,3.1,5.9,9.9c-0.3,0.5-0.7,1-1,1.4c3.8,3.5,5.6,8.7,6.7,13.3
	c0,0,0,0,0,0c9.6-3.6,14.8-23.7,26.5-16.1c1.6,1.1,1.5,2.8,4,3c1.2,0.1,2.2-1.4,3.3-1.7c3.1-0.8,5.7-0.7,8.6-2.1
	c2.3-1.2,4.6-4.6,6.9-5.4c2.6-0.9,6,1.3,9.2,0.5c0.8-0.2,1.5-0.5,2.2-0.9c4.3-2.4,6.3-8.1,4.4-12.7c-1.5-3.5-4.1-3.8-2.6-7.9
	c1-2.6,4.3-4.5,1.3-7.3c4.2-2.5,3.4-2.9,3.8-7.8c2.5,0.2,3.8-2,4-4.1c-3.1-6.3-11.5-13.2-9-20.7c1.2-3.6,11.6-10.6,4.2-13
	c-0.1,0-0.3-0.1-0.5-0.1c-3.7-1-5.4,0.7-9.1-1.7c-2.5-1.6-4.5-4.2-7.8-3.6c-5.8,0.9-10.1,8.6-16.8,6.9c-3.1-0.8-4.2-4-6.7-5.7
	c-2.4-1.6-6.3-2.4-9-2.4c-3.2,0-6.2,1.3-9.5,0.2c-2.7-0.9-4.5-2.7-7.4-3.3c-6.1-1.3-12.2,1.7-18.6,2.2c-3.3,0.2-6.8-0.4-9.9,0.4
	c-2.7,0.7-5.5,2.4-8.3,3.3c-2.9,0.9-7.9,1.4-11.5,3c0.2,0,0.5,0,0.7,0C470.9,247.1,482.3,253.8,471.1,254.9z"></path>
                                                <g>
                                                    <g>
                                                        <text transform="matrix(1 0 0 1 517.4111 281.8965)" class="st1 st2">
                                                            সুনামগঞ্জ
                                                        </text>
                                                    </g>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8663">
                                                <path id="dist_248" class="st0" d="M310.3,612.1c-0.1-1.7-2.2-3.2-3.5-4.4c-2.2-2.1-1.3-1.8-1.7-4.2c-0.5-2.7-4.8-6.4-6.8-8.7
	c-1.3-1.5-2.7-2.8-0.9-5.2c0.9-1.1,3.2-2,4.3-3.1c1.8-1.8,3-4,0.1-4.9c-2.1-0.6-3.7,0.6-5.8-0.8c-2.7-1.8-2.6-5.4-1.8-8.7
	c-0.2-0.1-0.3-0.2-0.5-0.3c-1.6-1.4-0.9-2.4-3.4-2.6c-2-0.2-3.5,0.3-4-2.3c-0.6-3.1,2-5.4,0.4-8.6c-0.7-1.4-1.7-2.3-3-3.2
	c-1.2-0.8-2.1-0.8-3.3-1c-0.1,0.2-0.3,0.4-0.4,0.5c-1.2,1.2-2.6,0.9-4,1.5c-1.6,0.7-1.8,1.9-3,2.9c-1.1,0.9-2.7,1.3-4.1,1.5
	c-2.5,0.4-7-1.7-9.2-0.5c-1.2,0.7-1.3,2.3-2,3.3c-0.8,1-2,2.3-3.1,3.1c-0.1,0.1-0.3,0.2-0.4,0.3c0.4,1,0.6,2.4,0.6,3.2
	c0.2,3.1-0.9,6.6-1.4,9.5c-0.6,3-3.3,5.3-3.5,8.4c-0.2,3.4,0.2,5.1,3.7,5.3c1.5,0.1,3.5,0.4,4.5,1.8c1,1.5,0.3,3.2,2.1,4.4
	c1.6,1.1,3.1,0.3,4.7,0.8c2.5,0.7,3.5,4.5,4.8,6.3c1.9,2.7,0.6,5.5,2.6,8.1c0.2,0.3,0.4,0.6,0.6,0.9c1.8-0.5,3.5-1.7,5.9-1.4
	c2.1,0.3,3.6,2.1,6.1,1.6c1.8-0.4,4.2-2.1,5.7-3.1c1.9-1.2,3.2-2.1,5.6-2.1c2.7,0,3.1,1.2,5,2.7c1.2,1,3.8,2,5.9,2.1
	c1.3,0,2.5-0.3,3-1.3C310.3,613.5,310.4,612.9,310.3,612.1z"></path>
                                                <text transform="matrix(1 0 0 1 249.8582 591.4)" class="st1 st2">নড়াইল
                                                </text>
                                            </a>
                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8680">
                                                <g id="dist_356">
                                                    <path class="st0" d="M191.2,109.8c1.9,3.8,3.9,7,6.7,10.1c1.4,1.7,2.3,3.2,2.7,4.8c0.5,0,1.1-0.1,2-0.2c2.7-0.3,4.6,0.7,6.8,2.1
		c0.6,0.4,1,0.3,1.6,0.8c0.3,0.3,0.4,1,0.7,1.4c0.7,0.7,1.5,1,2.4,1.3c-0.5-1.7-1.1-3.4-2-4.9c-2-3.5-4.8-6.3-7.7-9
		c-5.2-5-11.1-9.1-16.8-13.5c0.1,0.8,0.2,1.5,0.4,2.2C188.6,106.6,190.4,108.2,191.2,109.8z"></path>
                                                    <path class="st0" d="M177.6,85c1.1,2,3.6,1.6,5.1,2.6c2.8,1.8,3.5,5.8,4.2,9c6,5,12.1,9.9,17.9,15.1c2.9,2.6,5.6,5,7.9,8.2
		c2.1,3,4.1,6.1,5.3,9.6c0.3,0.9,0.6,1.8,0.9,2.7c0.9,0.6,1.8,1.3,2.7,2c2.1,1.8,2.5,4.9,4.1,6.8c1.4,1.6,3.9,1.9,5.6,3.1
		c1.2,0.9,2.6,2.6,4.2,3.1c1.5,0.5,2.8,0.5,4.2,1.1c2.2,0.9,3.9,1.9,5.8,1.3c0.6-0.2,1.2-0.5,1.9-1.1c2.1-1.8,4.3-3.6,7.2-4.1
		c2.7-0.5,5.7,0.3,7.7-2.4c1.8-2.4,2.1-5.9,1.8-8.9c-0.3-3.6-2.5-5.6-4.7-8.3c-2-2.5-4.7-4.1-6.8-6.6c-0.9-1-1.5-2.6-2.5-3.5
		c-0.3-0.3-0.7-0.5-1-0.7c-1.2-0.6-2.4-0.5-3.8-1.1c-2-0.8-1.7-1.6-2.3-3.5c-0.5-1.7-1.4-3.4-3.4-2.3c-2.3,1.2-3.3,7.1-6.7,4.9
		c-1.3-0.8-1.6-2.5-2.8-3.6c-0.9-0.8-2.2-1.8-3.4-2.2c-2.3-0.7-5.1-0.4-7.3-1.6c-2-1.1-2.1-3-3.1-4.9c-0.8-1.4-1.7-2.5-2.9-3.7
		c-1.7-1.7-3-2.2-5.3-2.8c-3.2-0.9-4.2-2.4-6.3-4.9c-2.3-2.7-2-5-2.2-8.4c-0.2-3.1-1.1-6.1-2.9-8.6c-1.1-1.5-7.3-5.3-5.1-6.6
		c1.4-0.8,3.4,1.1,3.7-1.6c0.1-1.3-1.1-2.5-1.9-3.4c-1-1.2-2-1.7-3.2-2.6c-1.6-1.2-1.6-2.2-2.4-3.8c-0.5-1-1.4-2.6-2.4-3.1
		c-0.7-0.4-1.4-0.4-2.3-0.4c-0.6,0-1.7,0.5-2.3,0.4c-1.9-0.4-1.6-1.9-2.7-3.1c-1-1-2.4-1.5-3.4-2.6c-1.2-1.4-2.6-3.8-4.5-4.4
		c-2.9-0.9-3.1,2.5-4.8,4c-1.1,1-2.6,1.4-3.6,2.3c-2.8,2.5,0.7,4.5,1.8,7.1c1.3,2.7,1.8,7,5.9,5.2c1.9-0.8,2.8-2,3.6,1
		c0.5,1.8,0.1,3.1,1.6,4.5c1.7,1.5,4.8,2.3,7,2.9c1.8,2,5.7,3.9,2.7,6.5c-1.2,1.1-2.6,1.1-4.1,1.5c-1.7,0.5-2.4,1.2-3.5,2.3
		c-0.3,0.3-0.5,0.5-0.8,0.8c0.2,0.3,0.3,0.5,0.5,0.7C177.5,80.8,176.6,83.3,177.6,85z"></path>
                                                </g>
                                                <g>
                                                    <g>
                                                        <text transform="matrix(1 0 0 1 198.0366 102.1973)" class="st1 st2">
                                                            লালমনিরহাট
                                                        </text>
                                                    </g>
                                                </g>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8677">
                                                <path id="dist_282" class="st0" d="M188.7,239.3c1.3,1,3,0.8,4.5,0.8c3.4,0,6-1.4,9.4,0.3c2.4,1.2,4.6,3.4,7.2,4.6c1.5-1.9,4.7-0.8,7.3-1.2
	c4.3-0.7,5.4-4.5,5.8-8.3c0-0.3,0.1-0.6,0.1-1c-1.8-0.7-4.5-3.3-5.3-4.6c-1.7-2.6-1.9-5.6-4-8c-2-2.3-5-2.4-7.4-4.2
	c-2.5-1.8-3.8-4.2-5.3-6.8c-0.9-1.6-1.6-2.6-3.1-3.7c-4.9-3.7-2.8-9.3-4.4-14.4c-0.5-1.6-1.2-3.3-2.4-4.6c-1.6-1.7-3.2-1.4-5.2-1.6
	c-2.9-0.3-6.2-2-7.6-4.8c-0.7-1.4-0.6-2.9-1.3-4.2c-0.7-1.3-2.2-2-3.2-3c-2.2-2.1-3.3-4.9-5-7.4c-1.3-1.8-2.6-2.9-3.5-4.4
	c-1.4,0.3-2.7-2.4-3.3-3.4c-1.6-2.9-4.3-4.4-7.1-6.1c-3.5-2-3.5-3.9-4.1-7.5c-0.5-3.1-2.5-5.7-3.3-8.9c-0.8-3.2-2.2-5.7-5-7.6
	c-1.2-0.8-2.6-1.7-3.5-2.7c-1.4-1.7-1.1-2.2-0.9-4.3c0.2-2.8-1.9-4.7-2.4-6.9c-1,0.2-1.8-0.7-2.8-0.9c-1.9-0.4-4,1-5.9,0.9
	c-1.9-0.1-4.1-2.1-5.4-3.5c-1.1-1.1-2.1-2.2-2.5-3.6c-0.8,0.6-1.8,1-2.9,1.4c-1.8,0.7-1.5,1.3-2.4,2.7c-2.2,3.2-4.6,0.8-7,2.4
	c-2.9,1.9-1.2,6.7-1.9,9.5c-0.7,2.9-3.8,4.5-5.7,6.7c-2.2,2.7,0.2,6-2.5,7.8c-2.7,1.9-6.4,2.2-9.5,2.8c-8.3,1.7-5,9.4-4.1,15.4
	c0.5,3.4-0.5,5.5,2.2,8.1c1.8,1.7,5,4.9,3.3,7.7c0.3,0.3,0.6,0.5,0.9,0.7c1.6,0.8,2.9,0.1,4.3,1.6c1,1.1,1.5,2.7,1.7,4.1
	c0.6,3.5,1,5.4,3.8,7.9c1.2,1.1,2.6,1.6,3.8,2.8c1.2,1.2,1.6,3.1,2.9,4.1c1.1,0.9,2.5,1.1,3.6,1.8c1.2,0.8,2.2,2.3,3.6,2.7
	c2.7,0.7,5.8-0.6,8.4,1.7c1,0.8,1.1,1.9,2.4,2.3c0.2,0.1,1.3-0.7,2-0.5c0.9,0.2,1.4,1.4,2.1,1.9c1.4,0.9,3.3,1.3,4.8,0.5
	c1.4-0.7,1.4-2.4,2.6-3.2c1.5-1.1,3.1,0,4.7,0.1c1.5,0.1,2.7-0.2,4.2-1c2.6-1.3,3.6-5.4,5.9-1.5c0.3,0.4,0.5,1.7,0.9,2
	c0.7,0.5,1.5-0.2,2.4,0.3c1.1,0.6,1.5,2.6,1.7,3.7c1.2,5.5-1.4,10.7,2.4,15.7c1.7,2.2,3.7,3.3,5.6,5.1c1.9,1.8,2.5,3.2,5,4.3
	c2.9,1.3,6.1,0.4,9.2,1.6c1.4,0.6,2.1,1.6,3.2,2.6c0.3,0.2,0.6,0.4,0.9,0.6c1.2,0.6,2.4,0.3,3.6,1.1
	C187,236.7,187.6,238.4,188.7,239.3z"></path>
                                                <g>
                                                    <g>
                                                        <text transform="matrix(1 0 0 1 116.6919 182.5518)" class="st1 st2">
                                                            দিনাজপুর
                                                        </text>
                                                    </g>
                                                </g>
                                            </a>
                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8684">
                                                <path id="dist_299" class="st0" d="M85.7,165.4c-2.7-2.6-1.7-4.7-2.2-8.1c-0.9-6-4.2-13.8,4.1-15.4c3.1-0.6,6.8-1,9.5-2.8c2.7-1.9,0.3-5.2,2.5-7.8
	c1.8-2.2,4.9-3.8,5.7-6.7c0.7-2.8-1-7.6,1.9-9.5c2.4-1.6,4.8,0.8,7-2.4c1-1.4,0.7-2,2.4-2.7c1-0.4,2.1-0.8,2.9-1.4
	c-0.1-0.4-0.2-0.8-0.2-1.2c0-2.3,0.7-4-0.3-6.2c-2.4-5.3-7.5-6.5-11.5-10c-0.8-0.7-1.4-1.6-2.2-2.3c-1.6-1.5-3.7-2.8-5.8-3.6
	c-2.3-0.9-4.1-0.6-6,0.7c-3.5,2.3-9.1,2.2-13.2,2.2c-2.3,0-4.3-0.1-6.6-0.6c-0.9-0.2-4.4-0.1-5.2-0.9c-2.6,0.5-5.1,1.3-7.4,2.3
	c-2.5,1.1-5.4,3.5-7.4,5.6c-2.1,2.2-4,5.1-4.3,8c-0.3,3.2,1.8,5.8,1.6,8.8c-0.2,3.3-3.6,5-4.5,8c-0.8,2.8-0.6,6.4-2.3,9.1
	c-1.8,2.8-4,3.8-2.8,7.4c0.5,1.6,1.4,2.1,2.4,3.4c1.1,1.4,0.8,2.8,0.7,4.5c-0.1,2.9-2,6.4,0.2,8.9c1.8,2.1,5.1,4.3,7.5,1.9
	c1.3-1.3,1.2-2.4,3.3-2.7c1.7-0.2,3.2,0.7,5,0.2c1.6-0.4,2.4-1.1,4.1,0c1.7,1.1,1.2,1.8,2,3.5c0.9,1.9,4.2,3.3,6,4.2
	c2.4,1.3,4.1,2.4,6.2,4.2c1,0.8,2.1,1.1,3.3,1.9c2.7,2,3.3,6,6.6,7.5c0.1-0.1,0.1-0.1,0.1-0.2C90.7,170.3,87.5,167.1,85.7,165.4z"></path>

                                                <g>
                                                    <g>
                                                        <text transform="matrix(1 0 0 1 56.3159 123.2871)" class="st1 st2">
                                                            ঠাকুরগাঁও
                                                        </text>
                                                    </g>
                                                </g>

                                            </a>
                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8681">
                                                <g id="dist_283">
                                                    <path class="st0" d="M138.8,66.6c-0.5,1.4-1,2.1-1.2,3.7c-0.2,1.9-0.4,3.7-0.2,5.6c0.3,3.1,2.2,4.6,4.1,6.7
			c1.7,1.9,0.2,3.7-0.3,5.8c-0.5,2.3-0.2,4.3-0.1,6.6c0.2,3.8,2.2,9.6,0,13.2c-1.1,1.8-2.2,3.5-3.2,5.4c-0.4,0.6-0.8,1.7-1.6,2
			c-0.1,0-0.2,0.1-0.2,0.1c0.5,2.3,2.6,4.1,2.4,6.9c-0.2,2.2-0.6,2.7,0.9,4.3c0.9,1,2.3,1.9,3.5,2.7c2.7,1.9,4.2,4.3,5,7.6
			c0.8,3.1,2.8,5.8,3.3,8.9c0.6,3.6,0.6,5.4,4.1,7.5c2.8,1.6,5.5,3.2,7.1,6.1c0.6,1.1,1.9,3.7,3.3,3.4c0,0,0,0,0,0
			c1.4-0.3,1.7-3.3,2-4.4c1-3.9,3.8-7.6,8-8.6c3.7-1,7.7-3.7,11-5.8c2.2-1.5,1.6-3.3,2.7-5.2c1.2-2,2.8-2.3,4.9-3
			c2.2-0.8,3.9-2,5-4.1c1.3-2.6,1.8-4.9,1.3-7c-0.3-1.6-1.2-3.2-2.7-4.8c-2.7-3.1-4.8-6.3-6.7-10.1c-0.8-1.6-2.7-3.2-3.2-5
			c-0.2-0.7-0.3-1.4-0.4-2.2c-3.2-2.5-6.3-5.1-9.2-8c-4.2-4.2-6.9-9.5-10.9-13.8c-3.3-3.5-5.7-6.8-8-10.8c-1.3,0.2-2.6,0.6-4,0.8
			c-4.8,0.7-7.3-3.2-11.1-5.4c-1.3-0.8-3.4-1.5-5.3-1.6C139.2,64.8,139.1,65.8,138.8,66.6z"></path>
                                                    <path class="st0" d="M183.8,94.2c1,0.8,2,1.7,3,2.5c-0.6-3.2-1.4-7.2-4.2-9c-1.5-1-4-0.6-5.1-2.6c-1-1.7-0.1-4.2-1.1-6
			c-0.1-0.2-0.3-0.5-0.5-0.7c-2-2.8-6.4-5.9-9.2-7.4c-0.8-0.4-1.6-0.7-2.4-0.9C168.8,79.7,175.7,87.2,183.8,94.2z"></path>

                                                    <g>
                                                        <g>
                                                            <text transform="matrix(1 0 0 1 142.6841 127.0239)"
                                                                  class="st1 st2">
                                                                নীলফামারী
                                                            </text>
                                                        </g>
                                                    </g>
                                                </g>
                                            </a>
                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8670">
                                                <path id="dist_1652" class="st0" d="M171.2,261.1c0,1.3-0.9,3-1.3,4.3c-0.5,1.6-0.5,3-0.6,4.8c-0.2,3.3-0.4,7.4,4.1,7.2c3.1-0.1,4.3-3.9,7.3-1.9
	c2.7,1.9,3.1,5.3,2.7,8.5c-0.4,3-1.2,6-1.7,9.1c-0.5,3.1,0.1,6.5-0.6,9.7c-0.3,1.3-1.7,6.1-0.7,7.2c0.3,0.3,0.8,0.3,1.6-0.2
	c1.3-0.8,2-2.1,3.6-2.4c1.6-0.3,3.8-0.1,5.5-0.3c1.8-0.2,3.1-0.7,4.3-2.2c2.4-2.9-0.5-5.9-0.6-9.1c-0.2-3.9,1.8-5.6,6-5.1
	c1.7,0.2,2.7,1.5,4.5,1.2c1.5-0.2,3.2-1.5,4.1-2.6c1.7-2,3.3-5.8,4.1-8.2c0.5-1.4,0.5-3.1,1.6-4.3c1-1.1,2.5-1.5,3.7-2.3
	c0.1-1.6-0.6-3.6,0.4-4.9c0.9-1.1,2.7-1.4,3.7-2.6c1.2-1.4,0.4-2.8,1.1-4c0.8-1.3,2.5-1,3.5-1.6c0.2-0.1,0.5-0.3,0.7-0.5
	c-1.8-1.5-3.2-3.4-5.4-4.3c-2.9-1.1-5.6-2.6-8.7-3.1c-3.7-0.6-5.6-2.3-5-6.4c0.1-0.9,0.4-1.5,0.7-1.9c-2.5-1.2-4.7-3.4-7.2-4.6
	c-3.5-1.7-6-0.3-9.4-0.3c-1.5,0-3.2,0.2-4.5-0.8c-1.1-0.9-1.8-2.6-3.1-3.3c-1.3-0.7-2.4-0.5-3.6-1.1c-2.3,0.4-5,0.8-6.6,2.4
	c-2.7,2.6-1.7,5.9-1.5,9c0.1,1.7,0,3.5-1.2,4.8c-1.1,1.1-3.4,1-4.1,2c-0.1,0.2-0.2,0.3-0.3,0.5C166.7,256.6,171.1,258.8,171.2,261.1
	z"></path>
                                                <g>
                                                    <g>
                                                        <text transform="matrix(1 0 0 1 172.6226 267.4756)" class="st1 st2">
                                                            জয়পুরহাট
                                                        </text>
                                                    </g>
                                                </g>
                                            </a>
                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8627">
                                                <path id="dist_339" class="st0" d="M370.1,652.3c0.8,3.9-1.5,5.3-3.2,8c-2.2,3.6,1.4,17.2-5.9,16.1c-3.4-0.5-5.3-1.7-7.3,2.5
	c-1.6,3.3,1.6,4.1,2.5,7c0.5,1.6-0.2,3.2,0.5,4.7c0.7,1.6,2,2.2,3.7,2.1c1.7-0.1,3-1.3,4.5,0.1c1.2,1.1,0.7,2.4-0.4,3.8
	c-2.1,2.8-5,2.1-8.3,2.4c-3.6,0.2-4.5,2.6-4.5,6.2c0,1.8-0.1,2.8-0.7,4.5c-0.6,1.9-0.4,2.7,1.5,3.8c1.4,0.9,3,1,4.3,1.8
	c0.9,0.5,1.3,1.2,1.8,1.5c0.4,0.3,1,0.4,1.9,0.1c3.6-1,3.3-4.1,5-6.6c1.5-2.1,4.9-4,7-5.6c2.4-1.8,5.2-3.7,5.8-7
	c0.4-2.7,1.2-3.9,2.8-5c-0.3-0.1-0.6-0.1-0.9-0.2c-0.5-1.8,3.8-4.7,4.9-6c1.5-1.8,3.6-3,5.4-4.5c1.7-1.4,3-3.2,4.7-4.4
	c1.8-1.2,3.8-2.4,5.3-4.1c-0.5-1.4,2.4-3.2,2.5-4.8c0-0.8-0.6-1.9-0.6-2.9c0-1.2,0.1-2.3,0.3-3.5c0.3-1.9,1.8-4.5-0.2-6
	c-2.3-1.8-4.7,0-6.9,0.3c-2.5,0.4-6.2-1.6-8-3.2c-1.1-0.9-1.4-2.4-2.5-3.3c-1.4-1.1-2.7-0.6-4.3-1.2c-1.6-0.6-1.6-2.2-2.7-3.3
	c-1.4-1.3-2.4-1.2-4.1-0.7c-2,0.6-3.6,1.4-5.2,1.5c0,0.5,0,1.1,0,1.7C369,649.7,369.8,650.8,370.1,652.3z"></path>
                                                <text transform="matrix(1 0 0 1 356.1998 690.5247)" class="st1 st2">ঝালকাঠি
                                                </text>
                                            </a>

                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8644">
                                                <path id="dist_314" class="st0" d="M364.7,595.3c-1-2-2-4.3-4.1-5.3c-1.8-0.8-3.9-0.7-5.8-1.6c-1.9-0.9-2.4-2.1-4.1-3.3c-1.7-1.1-4.2-0.9-6.2-0.9
	c-2.6,0-3.4,0-5.1,1.7c-1.8,1.7-1.9,2.7-4.2,0.8c-4.8-4.1,0.2-7,3.6-8.8c1.7-0.9,3.4-2.1,4.9-3.1c2.4-1.7,3-1.9,2.1-4.6
	c-0.9-2.6-1.5-3.3,0.1-5.8c1.2-1.8,2.7-2.8,1.1-5.1c-1.3-1.8-3-1.7-3.8-4.2c-0.3-0.9-0.4-1.7-0.6-2.4c-1.3,0.7-2.4,0.3-4.2-0.1
	c-0.3-1.1-1.4-1.3-2-2c-0.7-0.7-0.6-1.6-1.7-2c-2.3,1.6-0.2,7.1-4.5,7.1c-3.1,0-3.3-5.5-6.6-4.2c-1.4,0.5-1.1,2.5-3,2.3
	c-1.6-0.2-1.9-2.3-3.3-2.9c-3.7-1.5-5,4-6.6,5.8c-0.8,1-1.6,1.9-2.9,2.3c-1.4,0.5-2.9-0.1-4.3,0.4c-1.3,3.3,1.6,7.1-1.1,10.2
	c-1.5,1.7-5.7,3.5-7.9,2.4c-0.7,3.2-0.9,6.9,1.8,8.7c2.1,1.4,3.7,0.1,5.8,0.8c2.9,0.9,1.7,3.1-0.1,4.9c-1.2,1.2-3.4,2-4.3,3.1
	c-1.8,2.4-0.4,3.7,0.9,5.2c2,2.4,6.3,6,6.8,8.7c0.4,2.5-0.5,2.2,1.7,4.2c1.3,1.2,3.4,2.7,3.5,4.4c0.1,0.8-0.1,1.5-0.3,2
	c2.9,1.8,4.5,5.5,7.3,7.8c1.8,1.5,2.5,2.1,3.6,3.9c1.5,2.6,1.7,2.6,4.6,2.5c2.1-0.1,3.7-0.7,5.1-1.7c1.6-1.1,3.1-2.6,4.8-4.4
	c1.2-1.2,2.9-3.1,4.5-3.8c1.9-0.8,4.5-0.4,6.6-0.9c2.3-0.6,3.2-2.3,4.9-3.5c1.6-1.1,3.6-1.1,5.2-2.3c1.7-1.3,2.3-3.4,3.8-4.9
	c0.6-0.6,1.5-1.1,2.3-1.5c0.1-1.5,2-2.7,2.5-4.2C365.8,599.1,365.6,597.1,364.7,595.3z"></path>
                                                <text transform="matrix(1 0 0 1 297.802 604.5135)" class="st1 st2">গোপালগঞ্জ
                                                </text>
                                            </a>
                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8646">
                                                <path id="dist_311" class="st0" d="M357.5,545.1c0.4,2.7,1.2,7.2-0.8,9.5c-3.3,3.8-6.1-3-8.3-4.4c-2.5-1.5-3.4,0.5-4.9,1.8
	c-0.4,0.3-0.7,0.6-1.1,0.7c0.2,0.7,0.3,1.5,0.6,2.4c0.7,2.4,2.5,2.4,3.8,4.2c1.6,2.3,0.1,3.3-1.1,5.1c-1.7,2.5-1,3.3-0.1,5.8
	c0.9,2.7,0.3,2.9-2.1,4.6c-1.4,1.1-3.2,2.2-4.9,3.1c-3.4,1.8-8.4,4.6-3.6,8.8c2.3,2,2.4,1,4.2-0.8c1.7-1.7,2.5-1.7,5.1-1.7
	c2.1,0,4.6-0.2,6.2,0.9c1.7,1.2,2.2,2.4,4.1,3.3c1.9,0.9,4,0.8,5.8,1.6c2.1,0.9,3.1,3.3,4.1,5.3c0.9,1.8,1.1,3.8,0.4,5.8
	c-0.5,1.5-2.4,2.7-2.5,4.2c0,0.1,0,0.2,0,0.4c0.5-0.1,0.6-0.3,1,0c3.1,2.2,9,0.9,12.3,1.4c2.2,0.3,3.2,1.5,5,2.6
	c2.1,1.2,3.3,0.9,5.8,0.9c3.1,0,9.3,0.4,7.6-4.7c-0.7-2.1-2.5-2.7-1.6-5.5c0.9-3.1,2.7-2.1,5.1-2.9c0.5-0.2,0.9-0.4,1.3-0.7
	c1.3-1,1.5-2.5,0.8-4.4c-0.4-0.9-1.2-1.4-1.7-2.4c-0.4-0.9-0.2-1.8-0.6-2.8c-1.5-4.5-5.2-4.4-8-7.6c-2.6-2.9-3.9-6.6-4.9-10.2
	c-1.3-4.8-6-4.1-7.8-8.5c-1.7-4.4,2.7-7.2-1.8-10.9c-1.6-1.4-3.3-2.4-2.7-5c-0.2,0-0.4,0-0.5,0c-4.5,0.1-6.6-3.3-9.9-5.9
	c-1.4-1.1-3-1.8-4.4-2.6C357,539.3,357.1,542.5,357.5,545.1z"></path>
                                                <text transform="matrix(1 0 0 1 333.9953 582.3002)" class="st1 st2">
                                                    মাদারীপুর
                                                </text>
                                            </a>
                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8673">
                                                <g id="dist_343">
                                                    <path class="st0" d="M54.2,366.8c-1.1-0.4-2.3-0.4-3.5-0.6c0.2,0.2,0.4,0.3,0.6,0.5c2.2,1.8,3.9,4.4,6.2,6c0.4,0.3,0.8,0.5,1.2,0.7
		C58.3,370.5,57.2,367.8,54.2,366.8z"></path>
                                                    <path class="st0" d="M107.1,339.4c-1.8-0.2-3,1.1-4.9,0.7c-0.2-2,3.6-2.7,3.5-4.9c-0.1-1.1-1.3-1.6-1.3-2.9c0-1.2,0.9-1.6,0.8-2.9
		c-0.2-5.4-7.6-3.3-10-5.8c0.6-1.5,3.1-2.3,3.2-3.9c0.1-2.3-7.1-4.1-3.3-6c2.5-1.2,5.5,0.4,7.6-2.7c1.9-2.8,0.8-6,1.1-9
		c0.1-1.3,0.5-2.9-1.1-3.8c-1.4-0.7-2.9,0.9-4.5,0.4c-2-0.6-0.9-2.2-1.8-3.7c-1.2-2-2.8-0.2-4-1.4c0,0,0,0,0,0
		c-0.6,0.4-1.1,0.8-1.7,1.2c-2.5,1.8-6.3,1.6-7,5.1c-0.5,2.7,2.8,7.2-2.1,7.4c-1.2,0-3-0.4-4.5-0.4c-1.4,0-3.9,1.1-5,0.8
		c-1.8-0.4-2.7-5.7-3.5-7.4c-1.5-3.3-3.7-4.4-7.4-3.9c-3.2,0.5-4.8,2.6-6,5.5c-1.5,3.6,0.1,4.8,1.5,7.9c2.2,4.9-6.2,11.7-9.4,14.8
		c-2.2,2.1-4.3,4.4-5.1,7.7c-0.7,3-1.2,5.7-3.5,8.2c-2.1,2.3-5,3.4-4.6,6.8c0,0,0,0.1,0,0.1c2.3,1,4.4,3,5.8,4.9
		c1,1.4,1.3,1.8,2.5,3c1.1,1.1,2.7,2.2,2.7,3.9c1.8,0.6,3,1.6,4.9,2c1.8,0.4,4.3,0.4,6,1.1c3.5,1.5,6,4.6,7.6,8
		c1.1,2.2,1.1,4.2,1.1,6.3c0,1.8-0.1,3.7,0.4,5.7c0.8,3,3.8,7.3,7.1,8.1c3.9,0.9,7.5-2.6,11-3.5c3.2-0.8,5.7,0.2,8.4,1.5
		c-0.7-0.5-1.5-1-2.3-1.4c-0.5-0.3-1.1-0.5-1.6-0.8c0.4-0.1,0.7-0.2,1-0.3v-0.3c-1.6-2.4-4.4-2.8-6.3-4.9c-1.6-1.8-1.6-6.2-1.7-8.6
		c-0.2-4.3-1.7-15.1,3.1-16.5c3-0.9,5.9-0.1,8.6-2.1c2.4-1.7,3.6-4.5,5.6-6.7c0.9-0.9,2-2.1,3.1-2.9c1.7-1.1,2.1-0.4,4.1-0.5
		c2.9-0.1,3.6-2,3.9-4.1C108.4,339.5,107.7,339.5,107.1,339.4z"></path>

                                                </g>
                                                <g>
                                                    <g>
                                                        <text transform="matrix(1 0 0 1 24.6655 344.0073)" class="st1 st2">
                                                            চাঁপাইনবাবগঞ্জ
                                                        </text>
                                                    </g>
                                                </g>
                                            </a>
                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8667">
                                                <path id="dist_253" class="st0" d="M392.9,252.2c-1.3,1.9,0.8,2.1,2.1,3c3.1,2.3,0.9,4.3-1.4,5.7c-1.5,0.9-2.5,1.5-2.6,3.5
	c-0.1,1.9,1.2,2.2,1.4,4.1c0.2,2.2-1.8,8.6,2.7,7.4c3.7-1,7.1-10.1,10.7-4.9c1.4,2,0.4,4.8,1.4,6.8c0.9,1.8,3.1,2.1,4.2,3.6
	c1.2,1.5,0.8,3.4,1,5.2c0.2,1.7,1,2.8,2.1,4.1c1.1,1.3,2.7,1.8,3.8,3c1,1.1,1,2.7,1.2,4.2c0.4,2.7,1,6.2,4.3,7
	c1.8,0.5,2.9-0.2,4.6,0.8c1.7,1,1.6,1.1,3.6,0.6c1.6-0.4,5.4-1.9,6.8-0.8c2.1,1.7,0.7,5.5,1.1,7.8c4-0.1,2.6,4.7,1.5,6.8
	c-1.7,3.1-3.6,5.6-1.3,8.9c1.8,2.7,4.7,2,7.3,3.2c2.1,0.9,1.6,1.8,2.5,3.5c0.9,1.9,2.2,1.4,3.7,2.7c1.3,1.1,0.9,2.8,2.2,3.8
	c1.2,0.9,1.8,1,2.2,2c0.8-0.2,1.7-0.7,2.5-1.3c2-1.7,2.2-4.7,5.5-5.6c3.3,4.2,6-2,9.4-2.5c1.5,3.1,4.6-0.4,6.7-0.5
	c1.2-0.1,2.8,1.4,4.1,1.3c1.6-0.1,1.8-1.3,3-1.6c3.1-0.6,5.4,1.6,8.2,1.2c1.4-0.2,4.7-3,5.4-3.7c5.5-1.2,9.4-1.7,12.6-5.7
	c0.3-0.4,0.7-0.9,1-1.4c4.4-6.8,0-7.8-5.9-9.9c-7.7-2.7-1.2-6.6-0.4-11.5c0.4-2.2,0.7-7.2-2.1-7.4c-3-0.2-3.2,4.3-4.5,5.7
	c-1.8-1.6-0.2-5.5-1.2-7.9c-1.3-3-3.2-3.9-5.8-5.4c-4.8-2.8-10.3-3.6-15.7-5.3c-9.1-2.9-3.9-7.2-6.5-14c-0.3-0.9-2.4-2.9-2.5-3
	c-0.4-2.2,0.6-1.7,1.2-3.6c0.7-2.3,1-1.7,0.2-4c-0.5-1.5-2.5-0.7-1.9-3.3c11.2-1.1-0.2-7.8,3.2-12.8c-0.2,0-0.5,0-0.7,0
	c-3.1,0.3-5.8,2.1-9.1,2.4c-3.5,0.2-6.8-0.1-10-1.1c-6.7-2.2-10.4,2.7-17.6,1.5c-3-0.5-5.5-2.6-8.3-2.6c-3.2,0-6,1.4-9.4,1.3
	c-6.6,0-11.1,4.4-17.4,5.3c-1.5,0.2-3.2,0.3-4.9,0.4c0,0.2,0,0.4-0.1,0.6C396.2,251.7,393.9,250.8,392.9,252.2z"></path>
                                                <g>
                                                    <g>
                                                        <text transform="matrix(1 0 0 1 423.0068 288.9023)" class="st1 st2">
                                                            নেত্রকোনা
                                                        </text>
                                                    </g>
                                                </g>
                                            </a>
                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8629">
                                                <g id="dist_483">
                                                    <path class="st0" d="M341.8,744.2c0.9-1.5,0.3-5.2,1.9-5.8c2.6-1,2,3.3,4.7,2.2c3.5-5.4,0.6-12.6,6.4-17.1c2.4-1.9,3.5-3.9,3.9-6.9
	c-0.6-0.3-0.9-1-1.8-1.5c-1.3-0.8-2.9-0.9-4.3-1.8c-1.9-1.1-2.1-1.9-1.5-3.8c0.6-1.8,0.7-2.7,0.7-4.5c0-3.6,0.9-6,4.5-6.2
	c3.2-0.2,6.2,0.4,8.3-2.4c1-1.3,1.5-2.7,0.4-3.8c-1.5-1.4-2.9-0.2-4.5-0.1c-1.7,0.1-2.9-0.5-3.7-2.1c-0.7-1.5,0.1-3-0.5-4.7
	c-1-2.9-4.1-3.7-2.5-7c2-4.1,3.9-3,7.3-2.5c7.3,1.1,3.7-12.5,5.9-16.1c1.7-2.7,4-4.1,3.2-8c-0.3-1.5-1.1-2.6-1.2-4.3
	c0-0.6,0-1.1,0-1.7c-1,0-1.9-0.3-3-1.1c-1.2-0.9-1.5-1.7-2.9-2.5c-1.3-0.7-2.6-1-3.9-1.6c-2.8-1.3-3.8-3.6-6-5.3
	c-2.5-2-6.1-0.1-9-0.6c-1.5-0.3-3-0.8-4.3-1.2c-1-0.3-1.5-0.6-1.8-1.1c-1.3,2-3.3,4.2-4,6.4c-0.6,1.9,0.2,2.5,0.6,4.2
	c0.4,2-0.2,2.8-1.1,4.3c-1.8,3-2.8,5-2.9,8.6c-0.2,3,0.9,6.7,2.5,9c1.9,2.8,3.4,4.9,4.1,8.2c0.3,1.5,0.1,3.2,0.7,4.7
	c0.6,1.7,1.7,1.9,2.8,3.1c1.9,2,0.3,4.1,1.1,6.6c0.4,1.3,1.1,2.3,1.8,3.1c0.9,0.9,1.9,1.2,1.6,2.9c-2.3,1.2-5.4-2.4-7.6-3
	c-1.5-0.4-7.7-0.3-5.8,3.1c1.1,2.1,7.7,1,6,4.7c-1.2,2.5-5.7,2.4-7.5,4.4c-2,2.1,0.4,4,1.6,5.6c1.6,2.2,1.1,5.1,0.4,7.7
	c-0.4,1.6-1.1,2.5-2.1,3.9c-1.7,2.5-2.8,5.5-2.9,8.4c-0.1,2.7,1.2,6,2.9,8.2c1.1,1.5,2.3,2.4,2.8,4.3c0.5,1.5,0.4,3.1,0.6,4.7
	c0.2,1.4,0.7,2.1,1.4,2.4c0.6,0.3,1.4,0.1,2.3-0.2C339,747.6,341,745.6,341.8,744.2z"></path>

                                                </g>
                                                <text transform="matrix(1 0 0 1 324.0998 664.3636)" class="st1 st2">পিরোজপুর
                                                </text>
                                            </a>
                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8655">
                                                <path id="dist_364" class="st0" d="M164,552.3c1.6,0.4,2.5,2,4.1,2.1c1.7,0.1,3.2-0.9,4.3-1.9c1.4-1.2,1.6-2.4,2.5-3.9c1.1-1.8,2.2-1.3,3.8-2.1
	c2.8-1.5,3.1-4.9,2.7-7.6c-0.2-1.6-0.9-3-0.8-4.7c0.1-1.4,1-3.2,0.3-4.7c-0.7-1.6-2.3-1.1-3.1-2.3c-1-1.5-0.1-3.1,1.4-3.8
	c1.4-0.7,2.9-0.2,4.4-0.4c2-0.2,2.7-0.9,3.8-2.4c1.8-2.5,2.2-5.8,1.8-8.9c-0.4-2.7-1.8-6-1.5-8.7c0.5-3.8,4.5-3.7,6-6.6
	c0.4-0.7,0.6-1.5,0.6-2.3c-0.3,0.2-0.6,0.5-1,0.6c-2.4-1.6-5.5-3.3-6.2-6.1c-0.4-1.5,0.5-4.1-1.4-3.7c-1.3,0.3-1.9,2.9-3.4,2.8
	c-1.6-0.1-1.9-2.6-2.6-3.7c-1.5-2-1.9-0.5-3.7-1c-4-1.1-0.7-5.7-1.4-7.8c-0.4-1.4-1.8-2.8-3.2-1.9c-1.2,0.7-1.1,3.2-3.5,2
	c-0.7-0.4-1.2-1-1.6-1.9c-0.3,0.6-0.7,1.3-0.9,2c-0.9,2.5-3.3,4.4-4.6,6.8c-2.5,4.5-1.8,12.5-6.4,16c-1.2,0.9-2.8,1-4.1,1.7
	c-1.3,0.8-2.1,2.3-2.9,3.5c-2.4,3.2-4.8,3.5-8,5.1c-1.3,0.6-2.4,1.7-2.9,3.1c-0.5,1.5,0.2,2.9-0.9,4.2c0.3,0.5,0.5,1,0.7,1.5
	c1.1,2.6,2.6,5.1,4.9,6.7c2.4,1.7,4.2,2.2,6.1,4.8c1.3,1.8,2.9,4.2,4.9,5.4c1.4,0.8,2.6,0.6,3.9-0.3c1.2-0.8,1.9-2.6,3.4-2.6
	c2.4,2.2,1.4,3.6,0.1,6.1c-1.2,2.5-0.3,4.1-3.8,4.2c-2.4,2.4,0,4.8,0.8,7c0.8,2.4-1.3,5.1-0.5,7.2c0,0.1,0,0.1,0.1,0.2
	C158.9,554.8,160.6,551.5,164,552.3z"></path>
                                                <text transform="matrix(1 0 0 1 134.5218 520.9746)" class="st1 st2">
                                                    চুয়াডাঙ্গা
                                                </text>
                                            </a>
                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8657">
                                                <path id="dist_312" class="st0" d="M178.6,570.4c0.2-3.3,1.1-3.7,4.1-4.3c1.7-0.3,6.2-1.1,5.3-3.9c-0.7-2.2-4.6-2.5-2.8-5.8
	c1.2-2.3,5.3-3.3,7.2-5.2c1-1,1.3-2.2,2.9-2.4c1.4-0.2,3.2,1,4.1,1.9c2.6,2.7-1.3,4.6-0.4,7.6c0.7,2.3,5,2.7,7,4.2
	c2.7,2.1,5.1,3.2,8.1,1.6c2.5-1.3,4.2-4.2,6.6-6.1c2.1-1.7,3.9-4,4.1-6.7c0-0.4,0-0.7,0-1.1c-0.3-2.8-0.7-6.5,1.1-9
	c1.9-2.6,6.1-2,7.9-5c1.8-2.9,0.1-6.1-0.6-9.1c-0.6-2.7-0.2-6.7,1.4-9c1.9-2.8,4.3-2.8,4.3-6.8c0-3.7,1.7-5,2.8-8.1
	c0.6-1.5,0.4-2.9,0-4.2c-0.5-1.5-1.5-3-2.4-4.4c-1.6-2.7-3.2-4.6-5.6-6.8c0,0-0.1-0.1-0.1-0.1c-0.8,1.2-2,1.9-3.9,1.5
	c-1.4-0.3-2.7-1.2-4.2-1.4c-1.5-0.2-2.8,0.3-4.3,0c-2.7-0.5-5.1-0.6-7.7,1.2c-2.1,1.4-4.1,4.2-6.5,4.8c-1.4-1.4-2.3-3.1-3.8-4.4
	c-1-1-3.2-3.1-4.5-3.5c-2.3-0.7-1.5,2.6-2,4.5c-0.4,1.5-1.3,2.9-2.5,3.9c-0.1,0.8-0.2,1.6-0.6,2.3c-1.5,2.9-5.5,2.8-6,6.6
	c-0.3,2.6,1.1,5.9,1.5,8.7c0.4,3.1,0,6.4-1.8,8.9c-1.1,1.5-1.8,2.2-3.8,2.4c-1.5,0.2-3-0.3-4.4,0.4c-1.5,0.7-2.4,2.3-1.4,3.8
	c0.8,1.2,2.4,0.7,3.1,2.3c0.7,1.5-0.2,3.4-0.3,4.7c-0.1,1.7,0.6,3.1,0.8,4.7c0.4,2.7,0.1,6.1-2.7,7.6c-1.6,0.8-2.7,0.3-3.8,2.1
	c-0.9,1.5-1.1,2.7-2.5,3.9c-1.2,1-2.6,2.1-4.3,1.9c-1.6-0.1-2.6-1.7-4.1-2.1c-3.4-0.8-5.1,2.6-7.8,3.9c0-0.1-0.1-0.1-0.1-0.2
	c-0.6,0.4-1.1,0.7-1.7,1.7c-1,1.7-0.3,2.9-0.7,4.5c-0.7,2.5-3.7,2.7-5.7,3.3c-3.3,4.9,8.9,9.2,11.3,11.9c3.6,3.9,4.2-0.7,7.1-2.3
	c1.4-0.7,3.1-0.4,4.4,0.2c1.9,0.8,2.3,1,4.5,0.9c0.9-0.1,1.6-0.3,2.1-0.5C178.8,574.7,178.5,572.9,178.6,570.4z"></path>
                                                <text transform="matrix(1 0 0 1 187.7887 519.9001)" class="st1 st2">ঝিনাইদহ
                                                </text>
                                            </a>
                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8635">
                                                <g id="dist_264">
                                                    <path class="st0" d="M651.8,830.5c-3.3-1.5-2.1,5.7-2.5,7c-0.8,3.4-4,4.8-5.8,7.6c-1.5,2.4-1.1,6.4,0.4,9c1.9,3.3,3,4.5,3.2,8.4
			c0.2,3.3,1.7,7,5.1,8.3c1.3-0.9,1.6-2.1,2.3-3.3c0.8-1.4,1.8-2,3-3.1c2.4-2.3,2.1-5.8,1.5-8.8c-0.3-1.6-0.9-3.2-0.7-4.9
			c0.2-1.6,1.2-2.7,1.7-4.1c1-3,0.4-6.3-1.3-8.8c-1.9-2.7-4.2-6.1-7.4-7.3"></path>
                                                    <path class="st0" d="M646.2,824.3c-0.6,2.6-1.4,5.8-2.9,8.2c-1,1.5-1.6,2.3-1.8,4.1c-0.1,0.8-0.5,4,1.2,3.1c0.8-0.4,1-3.3,1.4-4.1
			c0.6-1.3,1.6-2.3,2.5-3.5c0.8-1.2,1.5-2.8,1.6-4.1c0.1-0.9-0.3-4.5-1.8-3.4c-0.1,0.1-0.4,0.7-0.5,0.8"></path>
                                                    <path class="st0" d="M643.1,800.4c-1.5-2.4-3.9,2.6-4.1,3.9c-0.2,1.4,0,2.9-0.3,4.3c-0.2,1.3-0.9,2.3-1,3.8c-0.3,2.9-0.7,5.2-0.2,8
			c0.2,1.3,0.8,2.6,1,3.9c0.2,1.4-0.5,2.8-0.2,4.1c2.8,0.6,3.9-11.6,3.9-13.8c0-1.5,0.2-2.7,0.6-4.1c0.4-1.4,1.2-2,1.8-3.2
			c1.1-2.3,0-4.8-1.5-6.6"></path>
                                                    <path class="st0" d="M684.3,895.1c-1-3.6,1-7.1,1.1-10.7c0.1-4.1-2-3.7-3.9-6.6c-1-1.4-1.3-4.5-1.6-6.3c-0.6-3.4-3.1-8.9-1.7-12.1
			c0.9-2,2.4-3.6,4.7-2.6c1.8,0.8,1.9,3.3,3.6,4.1c4.6,2.3,6.5-3.9,6.3-7.5c-0.3-4.5-2.8-6.8-6.1-9.5c-2.6-2.1-9-3.7-6.6-7.3
			c1.2-1.9,3.3-2.5,3-5.1c-0.2-2.8-2-2.8-4.1-3.8c-5.2-2.6-2.2-6.8-4.4-11c-1.1-2-3.6-2.6-3.2-5.2c0.4-3,2.7-3.1,4.9-3.6
			c2.7-0.6,3-0.8,4.4-3c1-1.7,1.5-3.4,3.8-3.6c1.9-0.2,2.9,1.4,5-0.2c2.1-1.6,1.8-2.8,0-4.3c-1.3-1.2-3-1.8-4.2-3.6
			c-1.1-1.7-1.1-3.4-2.4-5c-1.8-2.2-3.4-2.2-3,0.8c0.3,2.1,1.9,3.6,1.9,5.8c0,1.7-1.3,4.1-3.4,4.1c-1.4,0-1.4-1.4-2.7-1.8
			c-1.2-0.4-1.9,0.3-2.8,0.5c-2,0.4-0.9,1.7-2.8-0.2c-0.7-0.8-0.8-1.3-1-2.2c-0.6-2.1-0.2-4.4-0.5-6.6c-0.6-4.1,0.1,0.7-0.5-3.4
			c-0.1-0.5-7.1-0.4-11.9,2.1c-2.3,1.2-8-2.8-7.7,0.3c0.1,2.2,0.1,1.2,0,3.1c-0.3,5.2,1.1-1.7,3,2.4c1.1,2.3,0.4,3.4,0.6,5.8
			c0.1,2.5,2.4,3,2.8,5.2c0.7,4.4-6.3,5.3-4.6,9.8c2.6,1.8,10.6-3.1,10.1,3.1c-0.2,2-2.4,2.8-3.3,4.4c-0.9,1.6-1.1,4.3-0.9,6.3
			c0.7,7.7,9.4,12.4,10.5,19.7c0.8,5.3-0.6,8-2.5,12.9c-1.5,3.9-1.6,8.5-0.5,12.6c1.9,7.7,7.7,14.3,8.5,22.5
			c1.6,15.7,11.5,29.7,19.8,42.6c2.1,3.3,4.9,6.9,6.5,10.5c1.6,3.7,2.9,7.5,4.9,11c1.7,2.9,4.1,5.7,6,8.6c1.6,2.4,3,5,4.6,7.5
			c1.5,2.4,3.3,4.4,4.5,6.8c1.4,2.8,2.5,5.6,3.4,8.6c0.2,0.8,0.5,1.4,0.6,2.2c-0.5-6.1-4.6-11.8-5.8-17.6c-1.2-6-3.8-11.4-4.4-17.5
			c-0.4-4-2-7.2-3.4-11c-0.6-1.8-1.3-3.1-2.4-4.7c-1.2-1.8-3.3-2.6-4.4-4.1c-1.4-1.8-0.6-4.9-1.1-7.1c-0.3-1.2-0.6-2.8-1.3-3.9
			c-0.7-1.1-2-1.8-2.9-2.9c-0.9-1-4.4-4.7-4-6.2c0.8-2.9,5.7,0.5,7.4,0c0.4-0.9-3.3-5.8-4-7.2c-1.4-2.8-3.7-4.2-5.7-6.5
			c-1.7-2.1-3.3-4.6-4.3-7.2c-0.1-0.1-0.1-0.3-0.1-0.4C685.4,897.1,684.8,896.7,684.3,895.1z"></path>

                                                </g>
                                                <text transform="matrix(1 0 0 1 614 839.8581)" class="st1 st2">কক্সবাজার
                                                </text>
                                            </a>
                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8668">
                                                <path id="dist_278" class="st0" d="M314.9,243.2c-0.5,1.7-0.5,3.4-0.9,5.2c-0.4,1.6-1.1,3-1.2,4.7c-0.1,1.9,0.2,3,1.2,4.4c0.8,1.1,2.2,1.8,2.9,2.9
	c0.8,1.3,0.9,3.9,0.7,5.5c-0.3,2-1.9,3.1-2.5,4.9c-0.5,1.7-0.3,4.1,0.2,5.8c1,3.3,6,5.3,8.6,7.4c2.8,2.3,5.5,5.5,8.8,7.2
	c1.5,0.8,2.7,0.8,4.3,1.4c1.6,0.5,2.5,1.5,4.1,1.7c2.9,0.3,6.4-0.1,8.9-1.6c0.6-0.4,0.7-1,1.6-1.3c0.7-0.2,2,0,2.7,0.2
	c1.6,0.4,2.4,1.5,3.8,2.4c1.3,0.9,3.9,0.6,5,1.2c0.3-0.2,0.7-0.4,1.2-0.5c1.3-0.5,2.6-0.6,3.6-1.7c2.5-2.6-0.3-5.8,1.9-8.2
	c1.2-1.3,2.9-2.1,1.2-3.9c-0.8-0.9-3.9-2.5-4.4-5.1c-0.4-1.6-1.1-5.6,2.6-9.5c1.4-1.4,5.2-2.3,4.2-4.9c-0.4-1-1.6-1.8-2.1-2.9
	c-0.4-1-0.9-2.4-1-3.5c-0.2-1.7,0.3-3.4,0.6-4.9c0.3-1.4,1.4-3.7,1.1-5.1c-0.2-0.9-1.1-1.9-2.3-2.7c-1.6-1.2-3.8-2.1-4.9-2.5
	c-5.7-1.6-14.8,1.4-19.2-3.5c-2-2.2-4.2-4.7-7.5-5.1c-1.4-0.1-3.2,0.4-4.7-0.1c-1.2-0.4-2.1-1.5-3.3-2.1c-2.3-1.3-5.3-2.3-8-1.8
	C324,230.4,315.8,240.3,314.9,243.2z"></path>
                                                <g>
                                                    <g>
                                                        <text transform="matrix(1 0 0 1 324.6455 266.7627)" class="st1 st2">
                                                            শেরপুর
                                                        </text>
                                                    </g>
                                                </g>
                                            </a>
                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8650">
                                                <path id="dist_386" class="st0" d="M453.4,463.9c0.9-1.4,1.9-2,3.5-2.2c1-0.2,1.4,0.4,2.4-0.2c0.4-0.2,0.8-1.2,1.3-1.5c2.7-2,6,0.6,9-0.9
	c2.8-1.4,4.3-4.6,6.2-6.9c1.9-2.3,4.9-4.6,6.4-7.2c1.6-2.7,2.2-5,4.5-7.2c2.4-2.3,2.9-3.6,2.7-6.3c-1.4,0-2.3-1.5-3.5-2.1
	c-1.4-0.8-2.2-0.9-3.6-2c-2.4-1.8-4.7-3.3-7.1-4.9c-1.2-0.8-2-1.7-3.3-2.4c-1.3-0.7-2.6-1.4-3.7-2.6c-2.2-2.5-0.6-5.6-3.9-7.8
	c-2.4-1.5-5.7-2.5-6.2-5.5c-0.4-2.1,2.1-8-2-8.3c-1.7-0.1-2.4,1.8-3.9,2.5c-1.4,0.6-3.4,1.1-4.9,1.4c-1.9,0.4-4.5,0.1-6.6-0.6
	c0,0,0,0,0,0c-0.4,1.6,0.4,2.9,0.9,4.5c0.8,3.2,0.2,6.8,1,9.9c0.7,3,0.9,6.5-0.5,9.2c-0.5,1-1.6,2.3-2.5,2.9
	c-1.3,0.9-3.3,0.8-3.7,2.7c-0.3,1.5,1,2.8,1.7,3.9c0.9,1.4,1.5,2.6,1.4,4.4c-0.1,1.9-0.6,2.7-2.1,3.5c-1.5,0.8-2.4,1.2-3.2,2.7
	c-1.4,2.5-0.9,6.2-2.9,8.3c-0.3,0.3-0.5,0.5-0.8,0.6c0.6,2.7,0.1,5.5,1.2,8c0.2,0.6,0.6,1.9,1.1,2.3c0.9,0.8,0.8,0.1,1.8,0.3
	c1.8,0.3,2.3,0.6,2.6,2.8c0.2,1.2-0.5,3.3,1,3.9c1.2,0.5,3.2-0.9,4.3-1.1c2.5-0.5,5.1,1.9,7,3.8c0.9,0.9,1.1,2.8,1.8,3.5
	c0,0,0.1,0.1,0.1,0.1c0.4,0.4,0.8,0.5,1.2,0.4c0.4-1,1-2,1.6-3c0-0.1,0-0.2,0-0.3C453.9,469.2,451.5,467.1,453.4,463.9z"></path>
                                                <g>
                                                    <g>
                                                        <text transform="matrix(1 0 0 1 443.4795 442.6436)" class="st1 st2">
                                                            নরসিংদী
                                                        </text>
                                                    </g>
                                                </g>
                                            </a>
                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8665">
                                                <g id="dist_530">
                                                    <path class="st0" d="M292.9,230.5c-0.6,0.2-3.5-1-4.1-1.3c-0.2-0.1-0.4-0.2-0.5-0.3c-0.1,0.4-0.1,0.9-0.1,1.3
		c0.1,2.2-0.4,2.9-1.2,4.9c-1.2,3.1-1.4,5.7-3.4,8.4c-2.2,3.1-2.6,5.5-2.6,9.3c0,3.4-0.6,6.7,0.2,10.1c0.6,2.5,1.9,6.6-0.4,8.7
		c-0.3,0.3-0.7,0.5-1,0.7c0.1,1.9-0.4,4.2,0.2,5.9c0.5,1.5,1.2,2.7,1.6,4.1c0.4,1.5,0.5,3,1,4.5c0.1,0.4,0.2,0.7,0.4,1.1
		c0.1,0.3,0.2,0.5,0.3,0.8c0,0.1,0.1,0.2,0.1,0.3c0.1,0.3,0.3,0.7,0.5,1c0,0,0,0,0,0c0.2,0.3,0.3,0.7,0.5,1c0.1-0.2,0.3-0.3,0.3-0.5
		c0.5-3.3,4.3-8.6,2.7-12c-1-2-2.8-2.1-3.5-4.5c-0.6-2-0.1-3.8,0.9-5.7c2.2-4,5.1-5.9,4.6-10.8c-0.4-3.9,0.1-9.8,1.2-13.6
		c1-3.6,4.2-6.2,4.5-10.1c0.1-1.4,0.1-2.7,0.1-4.1c-0.3-0.1-0.7-0.3-1-0.5C293.9,229.8,293.5,230.3,292.9,230.5z"></path>
                                                    <path class="st0" d="M300.7,247.6c1.2,3.9,4,6.8,4.8,10.9c0.8,4.3-0.3,8.8-2.3,12.7c-1.8,3.5-4.5,6.8-5.7,10.5
		c-0.7,2-0.4,4.2-1,6.2c-0.5,2-1.5,3.6-2.6,5.3c-1.3,2-3.2,4.4-2.5,7.1c0.6,2.8,3.1,4,3.5,7c0.3,3.1,0.5,6.4,0.8,9.5
		c0.2,0.3,0.3,0.6,0.5,0.8c0.8,1.1,2,2,3,3c2.3,2.3,2.6,4.4,3.5,7.4c0.6,2,1.1,9.4,3,13.5c1.2,0.6,2.4,1.2,3.2,2.3
		c0-0.1,0-0.1,0-0.2c0.9-3.8,4.5-6.9,5.9-10.5c1.5-3.8,3.4-7.8,5.7-11.4c0.8-1.4,2.4-2.6,3.7-1.9c0.3,0.2,0.7,1.4,1.2,1.7
		c0.8,0.6,1.3,0.5,2.3,0.6c3.4,0.2,5.7-2.7,8-4.7c2.4-2.1,3.7-4.7,6.8-5.2c2.1-0.3,4.1-0.5,6.1-0.9c1-0.2,2-0.4,3-0.7
		c3.1-1,3.8-3.2,5.5-5.9c0.8-1.3,1.3-2.9,2.3-4.1c0.9-1.1,2.3-1.6,3.2-2.8c1.2-1.6,1.1-2.3,0.4-2.6c-1.1-0.6-3.6-0.3-5-1.2
		c-1.3-0.9-2.2-2-3.8-2.4c-0.7-0.2-1.9-0.4-2.7-0.2c-0.9,0.3-0.9,0.9-1.6,1.3c-2.5,1.5-6,1.9-8.9,1.6c-1.6-0.2-2.5-1.2-4.1-1.7
		c-1.6-0.5-2.7-0.6-4.3-1.4c-3.2-1.7-6-4.9-8.8-7.2c-2.6-2.1-7.6-4.1-8.6-7.4c-0.5-1.6-0.7-4.1-0.2-5.8c0.6-1.8,2.2-2.9,2.5-4.9
		c0.2-1.6,0.1-4.2-0.7-5.5c-0.7-1.1-2.1-1.8-2.9-2.9c-1-1.4-1.3-2.5-1.2-4.4c0.1-1.7,0.8-3.1,1.2-4.7c0.4-1.7,0.3-3.5,0.9-5.2
		c0.9-2.9,9.1-12.8,7.1-15.9c-0.1-0.1-0.2-0.3-0.3-0.4c-1.2,0.4-2.8,0.2-4.1,0.6c-1.2,0.4-2.3,1.1-3.5,1.4c-2.6,0.7-5.1,0.6-7.8,1
		c-0.1,0-0.1,0-0.2,0c-0.7,2.1-2,4-3.7,6.1C299.4,239.7,299.3,243.3,300.7,247.6z"></path>

                                                </g>
                                                <g>
                                                    <g>
                                                        <text transform="matrix(1 0 0 1 297.3022 307.8799)" class="st1 st2">
                                                            জামালপুর
                                                        </text>
                                                    </g>
                                                </g>
                                            </a>
                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8653">
                                                <path id="dist_329" class="st0" d="M332.5,438.1c4.7-1.7,1.9,2.3,5.1,3.7c1.5,0.6,3.4-0.5,5.2-1.8c1.3-0.9,2.4-1.8,3.4-2.2
	c2.8-1.2,5.4-1.9,8.2-2.6c3.6-0.9,5.4-1.2,8.1-4.2c1.8-2.1,3.4-4.2,5.4-5.8c1.7-1.3,2.5-2.1,2.9-3c0.5-1.1,0.4-2.2,0.6-4.7
	c0.2-2.7,1.5-5.8,2.9-8.2c1.4-2.4,3.7-4.4,5.1-6.8c2-3.3,0.9-4.9,0.9-8.5c0-0.2,0-0.5,0-0.7c-0.8,0.3-1.6,0.4-2.7-0.5
	c-1.1-0.8-2-2.6-2.7-3.7c-1.6-2.6-2.7-4.7-5-6.7c-2.1-1.8-2.3-5.3-2.1-8.1c0.2-1.5,0.5-2.6,1.4-3.9c1.1-1.4,2.5-1.5,1.8-3.3
	c-0.5-1.5-1.7-1.2-1.4-3.1c0.3-2.1,1.9-2.4-0.2-3.5c-1-0.5-2.4-0.6-3.5-1.2c-3.5-2-6.7-4.7-8.5-8.4c-0.7-1.5-1.1-3.1-2.1-4.5
	c-1-1.4-2.3-2.4-2.4-4.2c-0.1-1.1,0.2-3.9,0.5-4.7c0.5-1.7,2.3-2.7,2.9-4.3c1-2.9-0.7-6.4-3.1-8.1c-1.9-1.3-6.2-4.3-6.5-6.7
	c-0.2-1.8,0.8-4.7,1.6-7.1c-2,0.4-4,0.5-6.1,0.9c-3.1,0.5-4.4,3-6.8,5.2c-2.3,2-4.7,4.9-8,4.7c-0.9-0.1-1.5,0-2.3-0.6
	c-0.5-0.3-0.9-1.5-1.2-1.7c-1.3-0.7-2.8,0.5-3.7,1.9c-2.2,3.6-4.2,7.6-5.7,11.4c-1.4,3.6-5,6.6-5.9,10.5c0,0.1,0,0.2,0,0.2
	c0,0,0,0.1,0.1,0.1c0.1,0.1,0.3,0.2,0.3,0.3c0.1,0.2,0.2,0.5,0.3,0.7c0.8,1.8,0.8,3.6,2,5.5c0.7,1.2,1.5,2.3,2,3.6
	c0.2,0.2,0.3,0.5,0.4,0.7c0.4,0.7,0.8,1.4,0.9,2.2c0.1,0.4,0.2,0.7,0.3,1c0.9,3.2,2.8,5.9,3.3,9.2c0.1,0.4,0.7,2.3,0.7,2.7
	c0.1,2.4,0.4,3,0.5,5.9c0.1,2.1,0.1,3.9-0.2,5.8c-0.6,4.2-2.3,8.2-2.9,12.4c0,0,0,0,0,0c-0.6,3.9-1.5,7.7-2.2,11.5
	c-0.4,2.2-0.4,4.2-0.3,6.6c0.3,4.4,1.8,8.7,1.4,13.2c-0.4,3.9-2.5,7.4-3,11.2c-0.5,3.7,0.8,7.4,1.3,11.1c4.9-0.6,10.8-2.3,12.6-3.7
	C328.8,442.2,329.6,439.1,332.5,438.1z"></path>
                                                <text transform="matrix(1 0 0 1 317.6667 391.6)" class="st1 st2">টাঙ্গাইল
                                                </text>
                                            </a>
                                            <a href="{{ url("dashboard/service/".$service."/district") }}/8639">
                                                <g id="dist_266">
                                                    <path class="st0" d="M565.5,643.8c-0.2-0.4-0.5-0.7-0.7-1.1c-0.1,0.2-0.2,0.4-0.4,0.6c-4.1-1-6.5-3-9.6-5.9c-2.8-2.6-8.4-2-9.7-5.9
			c-1.4-4.1,5.6-6,2.8-9.6c-1-1.3-3-2.7-4.1-3.9c-1.4-1.5-2.8-2.5-5.2-1.9c-2.5,0.6-2.7,2.1-5.3-0.2c-1.4-1.2-2.3-3-2.7-4.7
			c-1.2-5.2,4.2-7.3,2-12.1c-0.8-1.7-1.3-3.6-2-5.2c-0.1-0.2-0.2-0.3-0.2-0.5c-8.1-1.1-16.7-0.2-24.2-3.1c-2-0.8-3.8-1.8-5.7-2.5
			c-1.9-0.7-4.1-0.4-6-1.1c-2.5-0.9-4.5-2.4-5.8-4.4c-0.6,0.3-1.3,0.5-1.9,0.4c-0.3-0.1-0.7-0.2-1-0.3c-0.2,2-0.1,3.9-1.1,5.8
			c-1.6,2.8-3.4,5-4.2,8.2c-1.9,8,6.2,7.5,11.3,10.6c5,3,3.9,12.1,0,15.8c-2.1,1.9-4,3.5-5,6.2c-1.1,3,1,5.5-0.7,8.2
			c-0.8,1.2-2.4,2.2-2.7,3.7c-0.2,1.1,0.8,3.1,1.3,4.1c1.3,2.1,2.9,4.5,4.7,6.2c2.9,2.7,5.5,3.7,9.2,3.7c2.3,0,5.6-1.8,7.8-0.5
			c2.6,1.6,2.3,7.8,1.9,10.4c-0.5,3.6-1.8,5.6-3.4,8.6c-1.7,3.1-1.6,6.1-5.8,6.6c-1.5,0.2-7.8,0.4-6.9,3c0.1,0.2,0.1,0.3,0.3,0.5
			c0.6,0.9,2.6,1.2,3.6,1.6c1.3,0.5,2.7,1.1,3.9,1.7c2.5,1.4,3.9,4.9,7.2,4.6c4.5-0.4,0.7-6,3.3-7.6c3.5-2.2,4.9,4,6.1,5.7
			c1.4,2.2,3.3,1,5.4,1.6c1.1,0.3,1.3,1,2.1,1.6c1.1,0.7,2.3,1.1,3.5,1.9c1.1,0.7,2.1,2.1,3.3,2.3c2.8,0.6,5.7-2.7,7.3-4.5
			c1.2-1.4,2.4-2.2,2.5-4.2c0-1.2-1.6-2.7-1.3-3.9c0.3-1,2.7-1.3,3-2.9c0.2-1.1-0.5-3.3-1-4.3c-1.3-2.7-4.3-4.1-6-6.4
			c-1.1-1.5-5.1-6.8-0.8-5.6c3.3,0.9,4.5,4.2,8.2,3.8c3.9-0.4,4.7-2.8,6.3-5.8c1.6-2.9,2.5-5.7,3.6-8.8c1-2.7,3.2-4.9,6.1-5
			c1.9-0.1,2.7,1.4,4.5,1.4c1.8,0,2.8-0.9,3.4-2.5c0.3-0.7,0.4-1.4,0.5-2.1C566.4,645.4,565.9,644.5,565.5,643.8z"></path>
                                                    <path class="st0"
                                                          d="M508.9,697.9c1.4,0.5,5.1,2.2,6.5,1.7c2.1-0.6,2.2-4.1,0.3-3.7l0.5-0.2C515.3,694.7,508.6,694.7,508.9,697.9z"></path>
                                                    <path class="st0" d="M529.8,724.3c-1.3-4.4-0.7-8.1-0.8-12.4c-0.1-2.8-0.6-6.4-2.3-8.7c-1.8-2.3-6.2-3.9-8.1-0.7
			c-1.3,2.3,0.6,4.1,1,6.3c0.8,4.3-1.6,8.2-2.2,12.3c-0.6,4.2-1,8.9-0.8,13.2c0.2,4.2,1.4,8.5,0.6,12.6c-0.9,4.8-3.6,9.2-4.1,14
			c-0.6,5.6,1.9,8.3,4.7,12.9c2.4-1.5-0.9-4.6,2.7-4.9c2.6-0.2,3.4,3.5,6,1.1c2.2-2,2.9-5.9,3.5-8.7c0.3-1.4,0.4-3,1-4.2
			c0.8-1.9,2.5-3.1,3-5.2c0.5-2.1,0.7-3.5,1.6-5.5c2.1-4.8-0.2-7.2-1.9-11.5C532.2,731.5,530.8,727.9,529.8,724.3z"></path>
                                                    <path class="st0" d="M532.3,705.7c0.1,0.3,0.1,0.7,0.2,1.1c-0.5,1.8,1,2.7,2.1,4.1c1.4,1.7,1.7,2.9,2.3,4.9
			c0.5,1.7,3.1,8.5,5.4,5.4c1.7-2.2-0.6-8.5-1.5-10.6C539.7,707.9,535.7,703.2,532.3,705.7z"></path>
                                                    <path class="st0" d="M535.6,720.2c-1.9-2.1-5.2-2.2-3.1,0.8v0.3c0.2,0.9,0.1,3.1,0.5,3.9c0.3,0.6,2,1.8,2.5,2.4
			c2.3,2.4,3.5,3.6,2.7-0.5C537.7,724.3,537.6,722.4,535.6,720.2z"></path>
                                                    <path class="st0"
                                                          d="M508.3,774.5l1.1-0.6c-4.3-0.5-5.3,9.1-1.3,8.6C514.2,781.8,512.5,772.8,508.3,774.5z"></path>
                                                    <path class="st0"
                                                          d="M497.7,706.9c3.1,1,4.2,0.1,4.9-3l-0.3-0.8C499.1,699.3,498.1,704.5,497.7,706.9z"></path>

                                                </g>
                                                <text transform="matrix(1 0 0 1 491.7 649.9847)" class="st1 st2">নোয়াখালী
                                                </text>
                                            </a>




                                        </svg>
                                    </div>
                                    <!-- Map SVG Ends -->
                                </div>
                                <div class="col-md-6">
                                    <table class="table no-padding" border="0" width="100%">
                                        <thead>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $serviceProviderInfo[0] }} </td>
                                            <td class="text-center">দৈনিক গড় আয়</td>
                                            <td class="text-center">সেবা প্রদান</td>
                                            <td class="text-center">সেবা গ্রহীতা</td>
                                        </tr>
                                        </thead>
                                        <thead>
                                        <tr>
                                            <td width="20" class="text-center">
                                                <button class="btn btn-xs btn-link" onclick="showDis(this,'68')">
                                                    <i class="fa fa-plus text-sm" id="icon_68"></i>
                                                    <i class="fa fa-minus text-active hide"></i>
                                                </button>
                                            </td>
                                            <td class="text-left">ঢাকা</td>
                                            <td class="text-center">২৭২</td>
                                            <td class="text-center">২৪৬</td>
                                            <td class="text-center">২৫</td>
                                            <td class="text-center">১</td>
                                        </tr>
                                        </thead>
                                        <tbody class="district_68 district" style="display: none;">
                                        <tr>
                                            <td></td>
                                            <td>ঢাকা</td>
                                            <td class="text-left">১৭১</td>
                                            <td class="text-center">১৫৯</td>
                                            <td class="text-center">১১</td>
                                            <td class="text-center">১</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>গাজীপুর</td>
                                            <td class="text-left">১৪</td>
                                            <td class="text-center">১২</td>
                                            <td class="text-center">২</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>মানিকগঞ্জ</td>
                                            <td class="text-left">১৯</td>
                                            <td class="text-center">১৭</td>
                                            <td class="text-center">২</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>মুন্সিগঞ্জ</td>
                                            <td class="text-left">১১</td>
                                            <td class="text-center">১০</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>নরসিংদী</td>
                                            <td class="text-left">৪</td>
                                            <td class="text-center">৩</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>ফরিদপুর</td>
                                            <td class="text-left">৪</td>
                                            <td class="text-center">২</td>
                                            <td class="text-center">২</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>নারায়ণগঞ্জ</td>
                                            <td class="text-left">১৩</td>
                                            <td class="text-center">১১</td>
                                            <td class="text-center">২</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>টাঙ্গাইল</td>
                                            <td class="text-left">১৭</td>
                                            <td class="text-center">১৫</td>
                                            <td class="text-center">২</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>জামালপুর</td>
                                            <td class="text-left">১০</td>
                                            <td class="text-center">১০</td>
                                            <td class="text-center">০</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>মাদারীপুর</td>
                                            <td class="text-left">৫</td>
                                            <td class="text-center">৪</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>কিশোরগঞ্জ</td>
                                            <td class="text-left">৬</td>
                                            <td class="text-center">৬</td>
                                            <td class="text-center">০</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>রাজবাড়ী</td>
                                            <td class="text-left">৪</td>
                                            <td class="text-center">৩</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>গোপালগঞ্জ</td>
                                            <td class="text-left">২</td>
                                            <td class="text-center">২</td>
                                            <td class="text-center">০</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        </tbody>

                                        <thead>
                                        <tr>
                                            <td width="20" class="text-center">
                                                <button class="btn btn-sm btn-link" onclick="showDis(this,'36')">
                                                    <i class="fa fa-plus text-sm" id="icon_36"></i>
                                                    <i class="fa fa-minus text-active hide"></i>
                                                </button>
                                            </td>
                                            <td class="text-left">চট্টগ্রাম</td>
                                            <td class="text-center">১৪৯</td>
                                            <td class="text-center">১৩৭</td>
                                            <td class="text-center">১১</td>
                                            <td class="text-center">১</td>
                                        </tr>
                                        </thead>
                                        <tbody class="district_36 district" style="display: none;">
                                        <tr>
                                            <td></td>
                                            <td>চাঁদপুর</td>
                                            <td class="text-left">১৬</td>
                                            <td class="text-center">১৬</td>
                                            <td class="text-center">০</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>চট্টগ্রাম</td>
                                            <td class="text-left">৫৩</td>
                                            <td class="text-center">৫০</td>
                                            <td class="text-center">২</td>
                                            <td class="text-center">১</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>কুমিল্লা</td>
                                            <td class="text-left">১৩</td>
                                            <td class="text-center">১১</td>
                                            <td class="text-center">২</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>ব্রাহ্মণবাড়িয়া</td>
                                            <td class="text-left">১১</td>
                                            <td class="text-center">১০</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>বান্দরবান</td>
                                            <td class="text-left">১২</td>
                                            <td class="text-center">১২</td>
                                            <td class="text-center">০</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>নোয়াখালী</td>
                                            <td class="text-left">৮</td>
                                            <td class="text-center">৬</td>
                                            <td class="text-center">২</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>খাগড়াছড়ি</td>
                                            <td class="text-left">১১</td>
                                            <td class="text-center">৯</td>
                                            <td class="text-center">২</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>কক্সবাজার</td>
                                            <td class="text-left">৬</td>
                                            <td class="text-center">৬</td>
                                            <td class="text-center">০</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>রাঙ্গামাটি</td>
                                            <td class="text-left">১২</td>
                                            <td class="text-center">১১</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>লক্ষ্মীপুর</td>
                                            <td class="text-left">৩</td>
                                            <td class="text-center">৩</td>
                                            <td class="text-center">০</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>ফেনী</td>
                                            <td class="text-left">৪</td>
                                            <td class="text-center">৩</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        </tbody>

                                        <thead>
                                        <tr>
                                            <td width="20" class="text-center">
                                                <button class="btn btn-sm btn-link" onclick="showDis(this,'69')">
                                                    <i class="fa text-sm fa-plus" id="icon_69"></i>
                                                    <i class="fa fa-minus text-active hide"></i>
                                                </button>
                                            </td>
                                            <td class="text-left">রংপুর</td>
                                            <td class="text-center">১৪৭</td>
                                            <td class="text-center">১৩০</td>
                                            <td class="text-center">১৪</td>
                                            <td class="text-center">৩</td>
                                        </tr>
                                        </thead>
                                        <tbody class="district_69 district" style="display: none;">
                                        <tr>
                                            <td></td>
                                            <td>দিনাজপুর</td>
                                            <td class="text-left">২৯</td>
                                            <td class="text-center">২৬</td>
                                            <td class="text-center">২</td>
                                            <td class="text-center">১</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>রংপুর</td>
                                            <td class="text-left">৩৫</td>
                                            <td class="text-center">৩৩</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">১</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>ঠাকুরগাঁও</td>
                                            <td class="text-left">১৪</td>
                                            <td class="text-center">১৩</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>লালমনিরহাট</td>
                                            <td class="text-left">৯</td>
                                            <td class="text-center">৭</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">১</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>পঞ্চগড়</td>
                                            <td class="text-left">১৪</td>
                                            <td class="text-center">১২</td>
                                            <td class="text-center">২</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>কুড়িগ্রাম</td>
                                            <td class="text-left">১৭</td>
                                            <td class="text-center">১৪</td>
                                            <td class="text-center">৩</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>গাইবান্ধা</td>
                                            <td class="text-left">১৪</td>
                                            <td class="text-center">১৩</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>নীলফামারী</td>
                                            <td class="text-left">১৫</td>
                                            <td class="text-center">১২</td>
                                            <td class="text-center">৩</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        </tbody>

                                        <thead>
                                        <tr>
                                            <td width="20" class="text-center">
                                                <button class="btn btn-sm btn-link" onclick="showDis(this,'65')">
                                                    <i class="fa text-sm fa-plus" id="icon_65"></i>
                                                    <i class="fa fa-minus text-active hide"></i>
                                                </button>
                                            </td>
                                            <td class="text-left">খুলনা</td>
                                            <td class="text-center">১২৪</td>
                                            <td class="text-center">৯১</td>
                                            <td class="text-center">৩১</td>
                                            <td class="text-center">২</td>
                                        </tr>
                                        </thead>
                                        <tbody class="district_65 district" style="display: none;">
                                        <tr>
                                            <td></td>
                                            <td>চুয়াডাঙ্গা</td>
                                            <td class="text-left">৫</td>
                                            <td class="text-center">৪</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>নড়াইল</td>
                                            <td class="text-left">৭</td>
                                            <td class="text-center">৬</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>মাগুরা</td>
                                            <td class="text-left">১২</td>
                                            <td class="text-center">৭</td>
                                            <td class="text-center">৫</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>খুলনা</td>
                                            <td class="text-left">২৬</td>
                                            <td class="text-center">১৮</td>
                                            <td class="text-center">৬</td>
                                            <td class="text-center">২</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>সাতক্ষীরা</td>
                                            <td class="text-left">১১</td>
                                            <td class="text-center">৯</td>
                                            <td class="text-center">২</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>যশোর</td>
                                            <td class="text-left">২৫</td>
                                            <td class="text-center">১৮</td>
                                            <td class="text-center">৭</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>বাগেরহাট</td>
                                            <td class="text-left">১৬</td>
                                            <td class="text-center">১৩</td>
                                            <td class="text-center">৩</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>ঝিনাইদহ</td>
                                            <td class="text-left">৯</td>
                                            <td class="text-center">৭</td>
                                            <td class="text-center">২</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>কুষ্টিয়া</td>
                                            <td class="text-left">১০</td>
                                            <td class="text-center">৭</td>
                                            <td class="text-center">৩</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>ঝিনাইদহ</td>
                                            <td class="text-left">২</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>মেহেরপুর</td>
                                            <td class="text-left">১</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">০</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        </tbody>

                                        <thead>
                                        <tr>
                                            <td width="20" class="text-center">
                                                <button class="btn btn-sm btn-link" onclick="showDis(this,'66')">
                                                    <i class="fa text-sm fa-plus" id="icon_66"></i>
                                                    <i class="fa fa-minus text-active hide"></i>
                                                </button>
                                            </td>
                                            <td class="text-left">বরিশাল</td>
                                            <td class="text-center">১০৭</td>
                                            <td class="text-center">৯৩</td>
                                            <td class="text-center">১৪</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        </thead>
                                        <tbody class="district_66 district" style="display: none;">
                                        <tr>
                                            <td></td>
                                            <td>শরীয়তপুর</td>
                                            <td class="text-left">১</td>
                                            <td class="text-center">০</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>পটুয়াখালী</td>
                                            <td class="text-left">২৩</td>
                                            <td class="text-center">২০</td>
                                            <td class="text-center">৩</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>ভোলা</td>
                                            <td class="text-left">২২</td>
                                            <td class="text-center">১৮</td>
                                            <td class="text-center">৪</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>বরিশাল</td>
                                            <td class="text-left">২৯</td>
                                            <td class="text-center">২৭</td>
                                            <td class="text-center">২</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>ঝালকাঠি</td>
                                            <td class="text-left">১১</td>
                                            <td class="text-center">১০</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>পিরোজপুর</td>
                                            <td class="text-left">১১</td>
                                            <td class="text-center">৯</td>
                                            <td class="text-center">২</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>বরগুনা</td>
                                            <td class="text-left">১০</td>
                                            <td class="text-center">৯</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        </tbody>

                                        <thead>
                                        <tr>
                                            <td width="20" class="text-center">
                                                <button class="btn btn-sm btn-link" onclick="showDis(this,'67')">
                                                    <i class="fa text-sm fa-plus" id="icon_67"></i>
                                                    <i class="fa fa-minus text-active hide"></i>
                                                </button>
                                            </td>
                                            <td class="text-left">সিলেট</td>
                                            <td class="text-center">১০৬</td>
                                            <td class="text-center">৯২</td>
                                            <td class="text-center">১৪</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        </thead>
                                        <tbody class="district_67 district" style="display: none;">
                                        <tr>
                                            <td></td>
                                            <td>মৌলভীবাজার</td>
                                            <td class="text-left">২৬</td>
                                            <td class="text-center">১৮</td>
                                            <td class="text-center">৮</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>সিলেট</td>
                                            <td class="text-left">৪৩</td>
                                            <td class="text-center">৪০</td>
                                            <td class="text-center">৩</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>সুনামগঞ্জ</td>
                                            <td class="text-left">২১</td>
                                            <td class="text-center">২০</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>হবিগঞ্জ</td>
                                            <td class="text-left">১৬</td>
                                            <td class="text-center">১৪</td>
                                            <td class="text-center">২</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        </tbody>

                                        <thead>
                                        <tr>
                                            <td width="20" class="text-center">
                                                <button class="btn btn-sm btn-link" onclick="showDis(this,'60')">
                                                    <i class="fa text-sm fa-plus" id="icon_60"></i>
                                                    <i class="fa fa-minus text-active hide"></i>
                                                </button>
                                            </td>
                                            <td class="text-left">রাজশাহী</td>
                                            <td class="text-center">৯০</td>
                                            <td class="text-center">৭৭</td>
                                            <td class="text-center">১৩</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        </thead>
                                        <tbody class="district_60 district" style="display: none;">
                                        <tr>
                                            <td></td>
                                            <td>নাটোর</td>
                                            <td class="text-left">১০</td>
                                            <td class="text-center">৯</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>নওগাঁ</td>
                                            <td class="text-left">৮</td>
                                            <td class="text-center">৭</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>বগুড়া</td>
                                            <td class="text-left">১০</td>
                                            <td class="text-center">৯</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>রাজশাহী</td>
                                            <td class="text-left">৩৪</td>
                                            <td class="text-center">২৭</td>
                                            <td class="text-center">৭</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>সিরাজগঞ্জ</td>
                                            <td class="text-left">১০</td>
                                            <td class="text-center">৮</td>
                                            <td class="text-center">২</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>পাবনা</td>
                                            <td class="text-left">১০</td>
                                            <td class="text-center">১০</td>
                                            <td class="text-center">০</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>চাঁপাইনবাবগঞ্জ</td>
                                            <td class="text-left">৬</td>
                                            <td class="text-center">৫</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>জয়পুরহাট</td>
                                            <td class="text-left">২</td>
                                            <td class="text-center">২</td>
                                            <td class="text-center">০</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        </tbody>

                                        <thead>
                                        <tr>
                                            <td width="20" class="text-center">
                                                <button class="btn btn-sm btn-link" onclick="showDis(this,'6557')">
                                                    <i class="fa text-sm fa-plus" id="icon_6557"></i>
                                                    <i class="fa fa-minus text-active hide"></i>
                                                </button>
                                            </td>
                                            <td class="text-left">ময়মনসিংহ</td>
                                            <td class="text-center">৩২</td>
                                            <td class="text-center">৩১</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        </thead>
                                        <tbody class="district_6557 district" style="display: none;">
                                        <tr>
                                            <td></td>
                                            <td>ময়মনসিংহ</td>
                                            <td class="text-left">১৩</td>
                                            <td class="text-center">১২</td>
                                            <td class="text-center">১</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>শেরপুর</td>
                                            <td class="text-left">৫</td>
                                            <td class="text-center">৫</td>
                                            <td class="text-center">০</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>জামালপুর</td>
                                            <td class="text-left">১০</td>
                                            <td class="text-center">১০</td>
                                            <td class="text-center">০</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>নেত্রকোণা</td>
                                            <td class="text-left">৬</td>
                                            <td class="text-center">৬</td>
                                            <td class="text-center">০</td>
                                            <td class="text-center">০</td>
                                        </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Service Status End -->
                </div>
            </div>
            <!-- END ROW -->

            <!-- START ROW -->
            <div class="card social-card share  full-width m-b-10 no-border" data-social="item">
                <div class="card-header border-bottom">
                    <h5 class="text-primary pull-left fs-16">{{ @$service_name }} ব্যবস্থাপনা ব্যায় </h5>
                    <div class="pull-right small hint-text">
                        5,345 <i class="fa fa-comment-o"></i>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-description">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 d-flex flex-column">
                            <!-- Service Status -->
                            <div id="finance-container"
                                 style="min-width: 600px; height: 300px; margin: 0 auto"></div>
                            <!-- Service Status End -->
                        </div>
                        <div class="col-lg-3 m-b-10 d-flex flex-column">

                            <div class="row">
                                <div class="col-md-12 m-b-10">
                                    <!-- START WIDGET D3 widget_graphTileFlat-->
                                    <div class="widget-8 card no-border bg-warning no-margin widget-loader-bar">
                                        <div class="container-xs-height full-height">
                                            <div class="row-xs-height">
                                                <div class="col-xs-height col-top">
                                                    <div class="card-header  top-left top-right">
                                                        <div class="card-title text-black hint-text">
                                                        <span class="fs-14 all-caps">প্রাক্কলিত ব্যায়<i
                                                                class="fa fa-chevron-right"></i>
                                                        </span>
                                                        </div>
                                                        <div class="card-controls">
                                                            <ul>
                                                                <li>
                                                                    <a data-toggle="refresh" class="card-refresh text-black"
                                                                       href="#"><i class="card-icon card-icon-refresh"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-xs-height ">
                                                <div class="col-xs-height col-top relative">
                                                    <div class="p-l-20">
                                                        <span class=" h3 no-margin p-b-5 text-black">৮,৫৭,৮৬০ টাকা</span>
                                                        <span class=" text-white">
                                                    <i class="fa fa-caret-up m-l-10"></i> ৯%
                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END WIDGET -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 m-b-10">
                                    <!-- START WIDGET D3 widget_graphTileFlat-->
                                    <div class="widget-8 card no-border bg-success no-margin widget-loader-bar">
                                        <div class="container-xs-height full-height">
                                            <div class="row-xs-height">
                                                <div class="col-xs-height col-top">
                                                    <div class="card-header  top-left top-right">
                                                        <div class="card-title text-black hint-text">
                                                        <span class="fs-14 all-caps">অনুমোদিত ব্যায় <i
                                                                class="fa fa-chevron-right"></i>
                                                        </span>
                                                        </div>
                                                        <div class="card-controls">
                                                            <ul>
                                                                <li>
                                                                    <a data-toggle="refresh" class="card-refresh text-black"
                                                                       href="#"><i class="card-icon card-icon-refresh"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-xs-height ">
                                                <div class="col-xs-height col-top relative">
                                                    <div class="p-l-20">
                                                        <span class=" h3 no-margin p-b-5 text-black">৩৭,০০০ টাকা</span>
                                                        <span class=" text-white">
                                                    <i class="fa fa-caret-up m-l-10"></i> ৭%
                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END WIDGET -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 m-b-10">
                                    <!-- START WIDGET D3 widget_graphTileFlat-->
                                    <div class="widget-8 card no-border bg-info-lighter no-margin widget-loader-bar">
                                        <div class="container-xs-height full-height">
                                            <div class="row-xs-height">
                                                <div class="col-xs-height col-top">
                                                    <div class="card-header  top-left top-right">
                                                        <div class="card-title text-black hint-text">
                                                    <span class="fs-14 all-caps">প্রকৃত ব্যায়  <i
                                                            class="fa fa-chevron-right"></i></span>
                                                        </div>
                                                        <div class="card-controls">
                                                            <ul>
                                                                <li>
                                                                    <a data-toggle="refresh" class="card-refresh text-black"
                                                                       href="#"><i class="card-icon card-icon-refresh"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-xs-height ">
                                                <div class="col-xs-height col-top relative">
                                                    <div class="p-l-20 p-r-20">
                                                        <span class=" h3 no-margin p-b-5 text-black">৩০জন</span>
                                                        <span class=" text-white pull-right">
                                                    <i class="fa fa-caret-up m-l-10"></i> ৩%
                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END WIDGET -->
                                </div>
                            </div>
                            <!-- Service Status End -->
                        </div>
                        <div class="col-lg-3 m-b-10 d-flex flex-column">
                            <table class="table table-condensed">
                                <tr>
                                    <td>খাত ভিত্তিক অনুমোদিত ব্যায়</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>ক। টেকনলজি</td>
                                    <td>৫৬,৪৫,৮৯৯ টাকা</td>
                                </tr>
                                <tr>
                                    <td>খ। ট্রেনিং</td>
                                    <td>৫৬,৪৫,৮৯৯ টাকা</td>
                                </tr>
                                <tr>
                                    <td>গ। প্রোমোশন</td>
                                    <td>৫৬,৪৫,৮৯৯ টাকা</td>
                                </tr>
                                <tr>
                                    <td>ঘ। এইচ আর</td>
                                    <td>৫৬,৪৫,৮৯৯ টাকা</td>
                                </tr>
                                <tr>
                                    <td>ঙ। অন্যান্য</td>
                                    <td>৫৬,৪৫,৮৯৯ টাকা</td>
                                </tr>
                            </table>
                            <!-- Service Status End -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END ROW -->

            <!-- START ROW -->
            <div class="card social-card share  full-width m-b-10 no-border" data-social="item">
                <div class="card-header border-bottom">
                    <h5 class="text-primary pull-left fs-16">{{ @$service_name }} ভিত্তিক ইভেন্ট সমূহ</h5>
                    <div class="pull-right small hint-text">
                        5,345 <i class="fa fa-comment-o"></i>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-description">
                    <div class="timeline-container top-circle">
                        <section class="timeline">
                            <div class="timeline-block">
                                <div class="timeline-point success">
                                    <i class="pg-map"></i>
                                </div>
                                <!-- timeline-point -->
                                <div class="timeline-content">
                                    <div class="card social-card share full-width">
                                        <div class="circle" data-toggle="tooltip" title="" data-container="body"
                                             data-original-title="Label">
                                        </div>
                                        <div class="card-header clearfix">
                                            <h5>ইভেন্ট এর শিরোনাম</h5>
                                            <h6><span class="location semi-bold"><i class="fa fa-map-marker"></i> ইভেন্টএর স্থান</span>
                                            </h6>
                                        </div>
                                        <div class="card-description">
                                            <p>আমার সোনার বাংলা, আমি তোমায় ভালোবাসি। চিরদিন তোমার আকাশ, তোমার বাতাস, আমার প্রাণে বাজায় বাঁশি॥ ও মা, ফাগুনে তোর আমের বনে ঘ্রাণে পাগল করে, মরি হায়, হায় রে— ও মা, অঘ্রাণে তোর ভরা ক্ষেতে আমি কী দেখেছি মধুর হাসি॥</p>
                                        </div>
                                    </div>
                                    <div class="event-date">
                                        <h6 class="all-caps fs-16 text-black m-t-0">ইভেন্ট এর শিরোনাম</h6>
                                        <small class="fs-14 text-black">২১ ফেব্রুয়ারী, ২০১৯ বিকাল ৭ঃ৩০</small>
                                    </div>
                                </div>
                                <!-- timeline-content -->
                            </div>
                            <!-- timeline-block -->
                            <div class="timeline-block">
                                <div class="timeline-point small">
                                </div>
                                <!-- timeline-point -->
                                <div class="timeline-content">
                                    <div class="card  social-card share full-width">
                                        <div class="circle" data-toggle="tooltip" title="" data-container="body"
                                             data-original-title="Label">
                                        </div>
                                        <div class="card-header clearfix">
                                            <h5>ইভেন্ট এর শিরোনাম</h5>
                                            <h6><span class="location semi-bold"><i class="fa fa-map-marker"></i> ইভেন্টএর স্থান</span><h6>
                                        </div>
                                        <div class="card-description">
                                            আমার সোনার বাংলা, আমি তোমায় ভালোবাসি।
                                            চিরদিন তোমার আকাশ, তোমার বাতাস, আমার প্রাণে বাজায় বাঁশি॥
                                            ও মা, ফাগুনে তোর আমের বনে ঘ্রাণে পাগল করে,
                                            মরি হায়, হায় রে—
                                            ও মা, অঘ্রাণে তোর ভরা ক্ষেতে আমি কী দেখেছি মধুর হাসি॥

                                            কী শোভা, কী ছায়া গো, কী স্নেহ, কী মায়া গো—
                                            কী আঁচল বিছায়েছ বটের মূলে, নদীর কূলে কূলে।
                                            মা, তোর মুখের বাণী আমার কানে লাগে সুধার মতো,
                                            মরি হায়, হায় রে—
                                            মা, তোর বদনখানি মলিন হলে, ও মা, আমি নয়নজলে ভাসি॥
                                        </div>
                                    </div>
                                    <div class="event-date">
                                        <h6 class="all-caps fs-16 text-black m-t-0">ইভেন্ট এর শিরোনাম</h6>
                                        <small class="fs-14 text-black">২১ ফেব্রুয়ারী, ২০১৯ বিকাল ৭ঃ৩০</small>
                                    </div>
                                </div>
                                <!-- timeline-content -->
                            </div>
                        </section>
                        <!-- timeline -->
                    </div>
                </div>
                <div class="card-footer clearfix">
                    <div class="pull-left">বিস্তারিত</div>
                    <div class="pull-right hint-text">
                        সর্বশেষ আপডেটঃ ১৪-০২-২০১৯
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- END ROW -->

        </div>
        <!-- END CONTAINER FLUID -->
    </div>
@endsection
@section('script')

    {!! HTML::script('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') !!}
    {!! HTML::script('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js') !!}

    {!! HTML::script('assets/js/dashboard.js') !!}
    {!! HTML::script('assets/js/scripts.js') !!}
    <!-- High Chart JS Starts -->
    {!! HTML::script('js/lib/highcharts/code/highcharts.js') !!}
    {!! HTML::script('js/lib/highcharts/code/highcharts-more.js') !!}
    {!! HTML::script('js/lib/highcharts/code/modules/exporting.js') !!}
    <!-- High Chart JS Ends -->

    <script type="text/javascript">

        function showDis(e, target) {
            $('.district_' + target).toggle();
            $('#icon_' + target).toggleClass('fa-plus');
            $('#icon_' + target).toggleClass('fa-minus');
//            $(e).closest('i').next().find('.fa').css( "background-color", "red" );
        }

        $(function () {
            $('.district').hide();
        });

        //var height= $("#servie-provide").height();
        var height= 250;
        var width= $("#servie-provide").width();

        //
        Highcharts.chart('service-indicator', {
            chart: {
                type: 'line',
                margin: 0,
                width: width,
                height: height,
                defaultSeriesType: 'areaspline'
            },
            title: {
                text: 'Monthly Average Temperature'
            },
            credits: {
                enabled: false
            },
            xAxis: {
                categories: ['ফেব্রু ১ ', 'ফেব্রু ২', 'ফেব্রু ৩', 'ফেব্রু ৪', 'ফেব্রু ৫', 'ফেব্রু ৬', 'ফেব্রু ৭', 'ফেব্রু ৮', 'ফেব্রু ৯', 'ফেব্রু ১০', 'ফেব্রু ১১ ', 'ফেব্রু ১২', 'ফেব্রু ১৩', 'ফেব্রু ১৪', 'ফেব্রু ১৫', 'ফেব্রু ১৬', 'ফেব্রু ১৭', 'ফেব্রু ১৮', 'ফেব্রু ১৯', 'ফেব্রু ২০', 'ফেব্রু ২১ ', 'ফেব্রু ২২', 'ফেব্রু ২৩', 'ফেব্রু ২৪', 'ফেব্রু ২৫', 'ফেব্রু ২৬', 'ফেব্রু ২৭', 'ফেব্রু ২৮']
            },
            yAxis: {
                title: {
                    text: 'হাজার'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [
                    @foreach($indicatorLists as $indicator)
                {
                    name: '{{ $indicator }}',
                    data: [{{ App\Common:: randonNumbers(28,17,7) }}]
                },
                @endforeach
            ]
        });
        // Service Provide graph

        // Indicator
        Highcharts.chart('service-provide', {
            chart: {
                type: 'line',
                margin: 0,
                width: width,
                height: height,
                defaultSeriesType: 'areaspline'            },
            credits: {
                enabled: false
            },
            xAxis: {
                categories: ['ফেব্রু ১ ', 'ফেব্রু ২', 'ফেব্রু ৩', 'ফেব্রু ৪', 'ফেব্রু ৫', 'ফেব্রু ৬', 'ফেব্রু ৭', 'ফেব্রু ৮', 'ফেব্রু ৯', 'ফেব্রু ১০', 'ফেব্রু ১১ ', 'ফেব্রু ১২', 'ফেব্রু ১৩', 'ফেব্রু ১৪', 'ফেব্রু ১৫', 'ফেব্রু ১৬', 'ফেব্রু ১৭', 'ফেব্রু ১৮', 'ফেব্রু ১৯', 'ফেব্রু ২০', 'ফেব্রু ২১ ', 'ফেব্রু ২২', 'ফেব্রু ২৩', 'ফেব্রু ২৪', 'ফেব্রু ২৫', 'ফেব্রু ২৬', 'ফেব্রু ২৭', 'ফেব্রু ২৮']
            },
            yAxis: {
                title: {
                    text: 'হাজার'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: false
                    },
                    enableMouseTracking: true
                }
            },
            series: [{
                name: 'প্রত্যাশিত সেবা প্রদান',
                data: [{{ App\Common:: randonIncreasingNumbers(28,30,20) }}]
            }, {
                name: 'প্রকৃত সেবা প্রদান',
                data: [{{ App\Common:: randonNumbers(28,17,7) }}]
            }]
        });

        // Office/Institute status
        Highcharts.chart('container', {
            chart: {
                type: 'line',
                margin: 0,
                width: width,
                height: height,
                defaultSeriesType: 'areaspline'
            },
            title: {
                text: 'Monthly Average Temperature'
            },
            credits: { enabled: false},
            xAxis: {
                categories: ['ফেব্রু ১ ', 'ফেব্রু ২', 'ফেব্রু ৩', 'ফেব্রু ৪', 'ফেব্রু ৫', 'ফেব্রু ৬', 'ফেব্রু ৭', 'ফেব্রু ৮', 'ফেব্রু ৯', 'ফেব্রু ১০', 'ফেব্রু ১১ ', 'ফেব্রু ১২', 'ফেব্রু ১৩', 'ফেব্রু ১৪', 'ফেব্রু ১৫', 'ফেব্রু ১৬', 'ফেব্রু ১৭', 'ফেব্রু ১৮', 'ফেব্রু ১৯', 'ফেব্রু ২০', 'ফেব্রু ২১ ', 'ফেব্রু ২২', 'ফেব্রু ২৩', 'ফেব্রু ২৪', 'ফেব্রু ২৫', 'ফেব্রু ২৬', 'ফেব্রু ২৭', 'ফেব্রু ২৮']
            },
            yAxis: {
                title: {
                    text: 'হাজার'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [
            @foreach($serviceLists as $serviceList)
                {
                    name: '{{ $serviceList }}',
                    data: [{{ App\Common:: randonNumbers(28,17,7) }}]
                },
            @endforeach
            ]
        });

        // Office/Institute status
        Highcharts.chart('institute-container', {
            chart: {
                type: 'column',
                margin: 0,
                width: width,
                height: height,
                defaultSeriesType: 'areaspline'
            },
            title: {
                text: 'Browser market shares. January, 2018'
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Total percent market share'
                }

            },
            credits: {
                enabled: false
            },
            legend: {
                enabled: false
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f} হাজার সেবা প্রদান<br/>'
            },

            "series": [
                {
                    "name": "Browsers",
                    "colorByPoint": true,
                    "data": [
                            @foreach($sample_udc as $udc)
                                {
                                    name: '{{ $udc }}',
                                    "y": {{ rand(30, 98) }}
                                },
                            @endforeach
                    ]
                }
            ]
        });

        // Office/Institute status
        Highcharts.chart('user-container', {
            chart: {
                type: 'line',
                margin: 0,
                width: width,
                height: height,
                defaultSeriesType: 'areaspline'
            },
            credits: {
                enabled: false
            },
            title: {
                text: 'Monthly Average Temperature'
            },
            xAxis: {
                categories: ['ফেব্রু ১ ', 'ফেব্রু ২', 'ফেব্রু ৩', 'ফেব্রু ৪', 'ফেব্রু ৫', 'ফেব্রু ৬', 'ফেব্রু ৭', 'ফেব্রু ৮', 'ফেব্রু ৯', 'ফেব্রু ১০', 'ফেব্রু ১১ ', 'ফেব্রু ১২', 'ফেব্রু ১৩', 'ফেব্রু ১৪', 'ফেব্রু ১৫', 'ফেব্রু ১৬', 'ফেব্রু ১৭', 'ফেব্রু ১৮', 'ফেব্রু ১৯', 'ফেব্রু ২০', 'ফেব্রু ২১ ', 'ফেব্রু ২২', 'ফেব্রু ২৩', 'ফেব্রু ২৪', 'ফেব্রু ২৫', 'ফেব্রু ২৬', 'ফেব্রু ২৭', 'ফেব্রু ২৮']
            },
            yAxis: {
                title: {
                    text: 'ইউ ডি সি এর সংখ্যা'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                name: 'নিবন্ধিত',
                data: [{{ App\Common:: randonNumbers(28,150,155) }}]
            }, {
                name: 'সক্রিয়',
                data: [{{ App\Common:: randonNumbers(28,110,75) }}]
            }]
        });


        var height2= 250;
        var width2= $("#business-box").width();


        @if($serviceProviderInfo[2] == 'business')

        // UDC Income Range
        var ranges = [
                [1246406400000, 14.3, 27.7],
                [1246492800000, 14.5, 27.8],
                [1246579200000, 15.5, 29.6],
                [1246665600000, 16.7, 30.7],
                [1246752000000, 16.5, 25.0],
                [1246838400000, 17.8, 25.7],
                [1246924800000, 13.5, 24.8],
                [1247011200000, 10.5, 21.4],
                [1247097600000, 9.2, 23.8],
                [1247184000000, 11.6, 21.8],
                [1247270400000, 10.7, 23.7],
                [1247356800000, 11.0, 23.3],
                [1247443200000, 11.6, 23.7],
                [1247529600000, 11.8, 20.7],
                [1247616000000, 12.6, 22.4],
                [1247702400000, 13.6, 19.6],
                [1247788800000, 11.4, 22.6],
                [1247875200000, 13.2, 25.0],
                [1247961600000, 14.2, 21.6],
                [1248048000000, 13.1, 17.1],
                [1248134400000, 12.2, 15.5],
                [1248220800000, 12.0, 20.8],
                [1248307200000, 12.0, 17.1],
                [1248393600000, 12.7, 18.3],
                [1248480000000, 12.4, 19.4],
                [1248566400000, 12.6, 19.9],
                [1248652800000, 11.9, 20.2],
                [1248739200000, 11.0, 19.3],
                [1248825600000, 10.8, 17.8],
                [1248912000000, 11.8, 18.5],
                [1248998400000, 10.8, 16.1]
            ],
            averages = [
                [1246406400000, 21.5],
                [1246492800000, 22.1],
                [1246579200000, 23],
                [1246665600000, 23.8],
                [1246752000000, 21.4],
                [1246838400000, 21.3],
                [1246924800000, 18.3],
                [1247011200000, 15.4],
                [1247097600000, 16.4],
                [1247184000000, 17.7],
                [1247270400000, 17.5],
                [1247356800000, 17.6],
                [1247443200000, 17.7],
                [1247529600000, 16.8],
                [1247616000000, 17.7],
                [1247702400000, 16.3],
                [1247788800000, 17.8],
                [1247875200000, 18.1],
                [1247961600000, 17.2],
                [1248048000000, 14.4],
                [1248134400000, 13.7],
                [1248220800000, 15.7],
                [1248307200000, 14.6],
                [1248393600000, 15.3],
                [1248480000000, 15.3],
                [1248566400000, 15.8],
                [1248652800000, 15.2],
                [1248739200000, 14.8],
                [1248825600000, 14.4],
                [1248912000000, 15],
                [1248998400000, 13.6]
            ];
        Highcharts.chart('udc-income-container', {
            chart: {
                margin: 0,
                width: width,
                height: height,
                //defaultSeriesType: 'areaspline'
            },
            title: {
                text: 'July temperatures'
            },
            xAxis: {
                type: 'datetime'
            },
            credits: {
                enabled: false
            },

            yAxis: {
                title: {
                    text: null
                }
            },

            tooltip: {
                crosshairs: true,
                shared: true,
                valueSuffix: '°C'
            },

            legend: {},

            series: [{
                name: 'প্রতিদিনের গড় আয়',
                data: averages,
                zIndex: 1,
                marker: {
                    fillColor: 'white',
                    lineWidth: 2,
                    lineColor: Highcharts.getOptions().colors[0]
                }
            }, {
                name: 'প্রতিদিনের সরবচ্চ ও সর্বনিম্ন',
                data: ranges,
                type: 'arearange',
                lineWidth: 0,
                linkedTo: ':previous',
                color: Highcharts.getOptions().colors[0],
                fillOpacity: 0.3,
                zIndex: 0,
                marker: {
                    enabled: false
                }
            }]
        });


        // UDC Income Range
        var ranges2 = [
                    @foreach($sample_udc as $udc)
                        ['{{ $udc }}', {{ rand(150, 130) }}, {{ rand(50, 70) }}],
                    @endforeach

            ],
            averages2 = [
                    @foreach($sample_udc as $udc)
                    ['{{ $udc }}', {{ rand(90, 110) }}],
                    @endforeach
            ];
        Highcharts.chart('udc-personal-income-container', {

            title: {
                text: 'July temperatures'
            },

            xAxis: {
                type: 'datetime'
            },
            credits: {
                enabled: false
            },

            yAxis: {
                title: {
                    text: null
                }
            },

            tooltip: {
                crosshairs: true,
                shared: true,
                valueSuffix: ' হাজার'
            },

            legend: {},

            series: [{
                name: 'প্রতিদিনের গড় আয়',
                data: averages2,
                zIndex: 1,
                marker: {
                    fillColor: 'white',
                    lineWidth: 2,
                    lineColor: Highcharts.getOptions().colors[0]
                }
            }, {
                name: 'প্রতিদিনের সরবচ্চ ও সর্বনিম্ন',
                data: ranges2,
                type: 'arearange',
                lineWidth: 0,
                linkedTo: ':previous',
                color: Highcharts.getOptions().colors[0],
                fillOpacity: 0.3,
                zIndex: 0,
                marker: {
                    enabled: false
                }
            }]
        });

        @endif

        Highcharts.chart('finance-container', {
            credits: {
                enabled: false
            },
            chart: {
                type: 'area'
            },
            title: {
                text: 'US and USSR nuclear stockpiles'
            },

            xAxis: {
                allowDecimals: false,
                labels: {
                    formatter: function () {
                        return this.value; // clean, unformatted number for year
                    }
                }
            },
            yAxis: {
                title: {
                    text: 'ব্যায় (লক্ষ)'
                },
                labels: {
                    formatter: function () {
                        return this.value / 1000 + 'k';
                    }
                }
            },
            tooltip: {
                pointFormat: '{series.name} had stockpiled <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
            },
            plotOptions: {
                area: {
                    pointStart: 1940,
                    marker: {
                        enabled: false,
                        symbol: 'circle',
                        radius: 2,
                        states: {
                            hover: {
                                enabled: true
                            }
                        }
                    }
                }
            },
            series: [{
                name: 'প্রাক্কলিত ব্যায়',
                data: [
                    null, null, null, null, null, 6, 11, 32, 110, 235,
                    369, 640, 1005, 1436, 2063, 3057, 4618, 6444, 9822, 15468,
                    20434, 24126, 27387, 29459, 31056, 31982, 32040, 31233, 29224, 27342,
                    26662, 26956, 27912, 28999, 28965, 27826, 25579, 25722, 24826, 24605,
                    24304, 23464, 23708, 24099, 24357, 24237, 24401, 24344, 23586, 22380,
                    21004, 17287, 14747, 13076, 12555, 12144, 11009, 10950, 10871, 10824,
                    10577, 10527, 10475, 10421, 10358, 10295, 10104, 9914, 9620, 9326,
                    5113, 5113, 4954, 4804, 4761, 4717, 4368, 4018
                ]
            }, {
                name: 'অনুমদিত ব্যায়',
                data: [null, null, null, null, null, null, null, null, null, null,
                    5, 25, 50, 120, 150, 200, 426, 660, 869, 1060,
                    1605, 2471, 3322, 4238, 5221, 6129, 7089, 8339, 9399, 10538,
                    11643, 13092, 14478, 15915, 17385, 19055, 21205, 23044, 25393, 27935,
                    30062, 32049, 33952, 35804, 37431, 39197, 45000, 43000, 41000, 39000,
                    37000, 35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000, 22000,
                    21000, 20000, 19000, 18000, 18000, 17000, 16000, 15537, 14162, 12787,
                    12600, 11400, 5500, 4512, 4502, 4502, 4500, 4500
                ]
            },{
                name: 'প্রকৃত ব্যায়',
                data: [null, null, null, null, null, null, null, null, null, null,
                    5, 25, 50, 120, 150, 200, 426, 660, 869, 1060,
                    1605, 2471, 3322, 4238, 5221, 6129, 7089, 8339, 9399, 10538,
                    11643, 13092, 14478, 5915, 7385, 9055, 11205, 13044, 15393, 17935,
                    20062, 22049, 23952, 25804, 27431, 29197, 35000, 33000, 31000, 29000,
                    27000, 25000, 23000, 21000, 29000, 27000, 25000, 24000, 23000, 22000,
                    21000, 20000, 19000, 18000, 18000, 17000, 16000, 15537, 14162, 12787,
                    12600, 11400, 5500, 4512, 4502, 4502, 4500, 4500
                ]
            }]
        });
        chart.reflow();

    </script>
@endsection
