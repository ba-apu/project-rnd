@extends('layout.frontend')
@section('content')
    <div class="content sm-gutter">
        <!-- START BREADCRUMBS -->
        <div class="bg-white">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="service-title t-center mar-l-n"> {{ $serviceName }} </div>
                    </div>

                    <div class="col-md-6 col-sm-6 t-center mx-auto">
                        <div class="pull-right padding-10 pull-n mar-r-n pad-t-n">
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
                    </div>
                </div>
            </div>
        </div>
        <!-- END BREADCRUMBS -->

        <!-- START CONTAINER FLUID -->
        <div class="container-fluid padding-25 sm-padding-10">

            <div class="card  card-transparent bg-white ">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx">

                    @foreach($serviceIndicator as $key => $indicator)
                        <li class="nav-item" title="{{ $indicator }}">
                            <a href="#" {!! $key == 0 ? 'class="active"' : ""  !!}  data-toggle="tab" data-target="#slide{{++$key}}">
                                <span>
                                <div class="txt-stl-4">{{ \App\Common::trim_text($indicator,40)  }}</div>
                                <div class="txt-stl-5">{{ \App\Common::randSingleNum(15, 35) }} কোটি</div>
                                <div class="txt-stl-3 text-success txt-11"><i class="fa fa-arrow-up" aria-hidden="true"></i> ৫%</div>
                                <div class="txt-stl-6 text-muted txt-11">গত ৩০ দিনে</div>
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="service_timeline-div" class="m-b-20 "></div>
                    <!--div class="tab-pane slide-left active" id="slide1">
                        <div id="service_timeline-div" class="m-b-20 "></div>
                    </div-->

                @foreach($serviceIndicator as $key => $indicator)
                    <!--div class="tab-pane slide-left" id="slide{{$key+2}}">
                            <br><br>
                            <img class="img-responsive" src="{{ custom_asset('assets/img/1.png') }}">
                            <br>
                        </div-->
                    @endforeach


                    <div class="card-header t-center pad-r-n p-b-0 p-r-0">
                        <div class="row">
                            <div class="col-sm-12 col-md-3 border m-b-10">
                                <div class="pull-left pull-n">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-xs btn-primary ">
                                            <input type="radio" name="options" id="option2">
                                            <i class="fa fa-area-chart" aria-hidden="true"></i>
                                        </label>
                                        <label class="btn btn-xs active btn-success">
                                            <input type="radio" name="options" id="option1" checked="">
                                            <i class="fa fa-pie-chart" aria-hidden="true"></i>
                                        </label>
                                        <label class="btn btn-xs btn-warning">
                                            <input type="radio" name="options" id="option2">
                                            <i class="fa fa-line-chart" aria-hidden="true"></i>
                                        </label>
                                        <label class="btn btn-xs btn-info">
                                            <input type="radio" name="options" id="option3">
                                            <i class="fa fa-bar-chart" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 border m-b-5 mx-auto text-center">
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default btn-xs ">
                                        <input type="radio" name="options" id="option2">সাপ্তাহিক
                                    </label>
                                    <label class="btn btn-default btn-xs active">
                                        <input type="radio" name="options" id="option1" checked="">মাসিক
                                    </label>
                                    <label class="btn btn-default btn-xs ">
                                        <input type="radio" name="options" id="option2">ত্রৈমাসিক
                                    </label>
                                    <label class="btn btn-default btn-xs">
                                        <input type="radio" name="options" id="option3">ষাণ্মাসিক
                                    </label>
                                    <label class="btn btn-default btn-xs">
                                        <input type="radio" name="options" id="option3">পছন্দ মত
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3">
                                <div class="pull-n mar-r-n pull-right">
                                    <a class="btn btn-link text-primary" href="{{ url('dashboard/service/digital_centre') }}">
                                        বিস্তারিত জানতে
                                        <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card  card-transparent bg-white padding-15">
                <div class="card-header border-bottom txt-18 text-primary ">{{ $serviceProviderInfo[2] }}ঃ {{ \App\Common::randSingleNum(150000000, 3500000000) }} টি  </div>
                <div class="card-block bg-white">

                    <div class="row m-t-15">
                        <div class="col-md-5" id="service_cluster_timeline-maser">
                            @foreach($serviceIndicator as $key => $indicator)
                                <div class="list-box">
                                    <div class="row m-t-5">
                                        <div class="col-md-8 ">
                                            <div class="txt-14">
                                                <i class="fa fa-circle fs-11" style="color: {{ $colors[$key] }}"></i>
                                                {{ $indicator }}
                                            </div>
                                            <div
                                                    class="hint-text hint-text txt-11">{{ $serviceIndicatorNote[$key] }}</div>
                                        </div>
                                        <div class="col-md-4">
                                                <span
                                                        class="pull-right txt-16 padding-10">{{ \App\Common::randSingleNum(150000, 3500000) }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-7" >
                            <div id="service_cluster_timeline-div"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card  card-transparent bg-white">

                <div class="card-block bg-white">
                    <div class="card-header border-bottom txt-18 m-b-20 text-primary">{{ $serviceProviderInfo[3] }}ঃ ১১৬ টি  </div>
                    <div class="row">
                        <div class="col-md-3 ">

                            <div class="m-t-15">
                                <div class="hint-text hint-text txt-11">(সর্বাধিক ব্যবহৃত ১০টি সেবা )</div>
                                @foreach($serviceLists as $key => $service)
                                    <div class="list-box padding-5">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="txt-14">
                                                    <i class="fa fa-circle fs-11" style="color: {{ $colors[$key] }}"></i>
                                                    {{  \App\Common::trim_text($service,75)  }}</div>
                                            </div>
                                            <div class="col-md-3">
                                                        <span
                                                                class="pull-right txt-14">{{ \App\Common::randSingleNum(150000, 3500000) }}</span>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="menu-bar setting-icon">
                                                    <ul>
                                                        <li>
                                                            <a href="javascript:;"><i class="fa fa-cog"></i></a>
                                                            <ul class="">
                                                                <li class=""><a href="">Basic</a></li>
                                                                <li class=""><a href="">Basic 2</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <a href="#" class="r-all">বিস্তারিত জানতে <i class="fa fa-angle-right" aria-hidden="true"></i></a>

                        </div>
                        <div class="col-md-3 " style="min-height: 200px">
                            <div id="service_pie-div"></div>
                        </div>
                        <div class="col-md-6 ">
                            <div id="services_lists_timeline-div"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Citizen  -->
            <div class="card  card-transparent bg-white">

                <div class="card-block bg-white">
                    <div class="card-header border-bottom txt-18 m-b-20 text-primary">সেবা গ্রহীতা</div>
                    <div class="row m-t-20">
                        <div class="col-md-4">
                            <div class="list-box">
                                <div class="row m-t-5">
                                    <div class="col-md-8 ">
                                        <div class="txt-14">পুরুষ</div>
                                        <div class="hint-text hint-text txt-11">আমার সোনার বাংলা</div>
                                    </div>
                                    <div class="col-md-4">
                                            <span
                                                    class="pull-right txt-16 padding-10">{{ \App\Common::randSingleNum(150000, 3500000) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-box">
                                <div class="row m-t-5">
                                    <div class="col-md-8 ">
                                        <div class="txt-14">মহিলা</div>
                                        <div class="hint-text hint-text txt-11">আমার সোনার বাংলা</div>
                                    </div>
                                    <div class="col-md-4">
                                            <span
                                                    class="pull-right txt-16 padding-10">{{ \App\Common::randSingleNum(150000, 3500000) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-box">
                                <div class="row m-t-5">
                                    <div class="col-md-8 ">
                                        <div class="txt-14">কিশোর</div>
                                        <div class="hint-text hint-text txt-11">আমার সোনার বাংলা</div>
                                    </div>
                                    <div class="col-md-4">
                                            <span
                                                    class="pull-right txt-16 padding-10">{{ \App\Common::randSingleNum(150000, 3500000) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-box">
                                <div class="row m-t-5">
                                    <div class="col-md-8 ">
                                        <div class="txt-14">যুবক</div>
                                        <div class="hint-text hint-text txt-11">আমার সোনার বাংলা</div>
                                    </div>
                                    <div class="col-md-4">
                                            <span
                                                    class="pull-right txt-16 padding-10">{{ \App\Common::randSingleNum(150000, 3500000) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-box">
                                <div class="row m-t-5">
                                    <div class="col-md-8 ">
                                        <div class="txt-14">বয়স্ক</div>
                                        <div class="hint-text hint-text txt-11">আমার সোনার বাংলা</div>
                                    </div>
                                    <div class="col-md-4">
                                            <span
                                                    class="pull-right txt-16 padding-10">{{ \App\Common::randSingleNum(150000, 3500000) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-box">
                                <div class="row m-t-5">
                                    <div class="col-md-8 ">
                                        <div class="txt-14">বৃদ্ধ</div>
                                        <div class="hint-text hint-text txt-11">আমার সোনার বাংলা</div>
                                    </div>
                                    <div class="col-md-4">
                                            <span
                                                    class="pull-right txt-16 padding-10">{{ \App\Common::randSingleNum(150000, 3500000) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-box">
                                <div class="row m-t-5">
                                    <div class="col-md-8 ">
                                        <div class="txt-14">প্রতিবন্ধী</div>
                                        <div class="hint-text hint-text txt-11">আমার সোনার বাংলা</div>
                                    </div>
                                    <div class="col-md-4">
                                            <span
                                                    class="pull-right txt-16 padding-10">{{ \App\Common::randSingleNum(150000, 3500000) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-box">
                                <div class="row m-t-5">
                                    <div class="col-md-8 ">
                                        <div class="txt-14">ক্ষুদ্র ও নৃতাত্ত্বিক জাতিগোষ্ঠী</div>
                                        <div class="hint-text hint-text txt-11">আমার সোনার বাংলা</div>
                                    </div>
                                    <div class="col-md-4">
                                            <span
                                                    class="pull-right txt-16 padding-10">{{ \App\Common::randSingleNum(150000, 3500000) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8" style="min-height: 200px">
                            <div id="sex_pie-div" style="height: 400px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card  card-transparent bg-white">

                <div class="card-block bg-white" >
                    <div class="card-header border-bottom txt-18 m-b-20 text-primary">{{ $serviceProviderInfo[0] }}ঃ {{ \App\Common::randSingleNum(4500, 5000) }} জন</div>
                    <div id="provider-timeline-div"></div>
                    <div class="row m-t-20">
                        <div class="col-md-4">
                            @foreach($indicatorLists as $key => $indicator)
                                <div class="list-box">
                                    <div class="row m-t-5">
                                        <div class="col-md-8 ">
                                            <div class="txt-14">
                                                <i class="fa fa-circle fs-11" style="color: {{ $colors[$key] }}"></i>
                                                {{ $indicator }}
                                            </div>
                                            <div class="hint-text hint-text txt-11">আমার সোনার বাংলা</div>
                                        </div>
                                        <div class="col-md-4">
                                            <span
                                                    class="pull-right txt-16 padding-10">{{ \App\Common::randSingleNum(500, 1500) }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-8" style="min-height: 200px">
                            <div id="provider-stability-timeline-div"></div>
                        </div>
                    </div>
                </div>
            </div>

        @php $serviceArr = array("digital_centre", "dfs", "ekpay",); @endphp
        @if(in_array($mainService,$serviceArr))
            <!-- Financial -->
                <div class="card  card-transparent bg-white">

                    <div class="card-block bg-white">
                        <div class="card-header border-bottom txt-18 m-b-20 text-primary">লেনদেন এবং মুনাফা</div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="widget-8 card no-border bg-warning no-margin widget-loader-bar">
                                    <div class="container-xs-height full-height">
                                        <div class="row-xs-height ">
                                            <div class="col-xs-height col-top relative">
                                                <div class="p-l-20">
                                                    <div class="fs-16 text-black m-t-20">সর্বমোট লেনদেন </div>
                                                    <div class="h3 no-margin p-b-5 text-black">{{ \App\Common::randSingleNum(50000000, 500000000) }} টাকা</div>
                                                    <div class="p-b-5 text-black m-t-20">গত ৩০ দিনে লেনদেন  {{ \App\Common::randSingleNum(500000, 5000000) }} টাকা</div>
                                                    <span class="small hint-text pull-left txt-11">পূর্বের ৩০ দিনের তুলনায়  {{ \App\Common::randSingleNum(5, 13) }}% বেশী</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-8 card no-border bg-success no-margin widget-loader-bar">
                                    <div class="container-xs-height full-height">
                                        <div class="row-xs-height ">
                                            <div class="col-xs-height col-top relative">
                                                <div class="p-l-20">
                                                    <div class="fs-16 text-black m-t-20">সর্বমোট মুনাফা </div>
                                                    <div class="h3 no-margin p-b-5 text-black">{{ \App\Common::randSingleNum(50000000, 500000000) }} টাকা</div>
                                                    <div class="p-b-5 text-black m-t-20">গত ৩০ দিনে আয়  {{ \App\Common::randSingleNum(500000, 5000000) }} টাকা</div>
                                                    <span class="small hint-text pull-left txt-11">পূর্বের ৩০ দিনের তুলনায়  {{ \App\Common::randSingleNum(5, 13) }}% বেশী</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div id="container"></div>
                            </div>
                        </div>
                    </div>
                </div>
        @endif

        <!-- Map -->
            <div class="card  card-transparent bg-white">

                <div class="card-block bg-white">
                    <div class="card-header border-bottom txt-18 m-b-20 text-primary">সারাদেশ </div>
                    <div class="row">
                        <div class="col-md-6">
                            @include('components.map')
                        </div>
                        <div class="col-md-6">
                            <div class="m-b-20"></div>
                            <div class="no-padding auto-overflow widget-11-2-table" style="height: 700px;">
                                <table id="table-sparkline" width="100%">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        @foreach($serviceIndicator as $indicator)
                                            <th title="{{ $indicator }}"><div class="vertical">{{ \App\Common::trim_text($indicator,50)  }}</div></th>
                                        @endforeach
                                    </tr>
                                    @foreach($districts as $key => $district)
                                        <tr>
                                            <th>{{ $district->name }}</th>
                                            @foreach($serviceIndicator as $indicator)
                                                <td>{{ \App\Common::randSingleNum(10, 100) }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Budget -->
            <div class="card  card-transparent bg-white">

                <div class="card-block bg-white">
                    <div class="card-header border-bottom txt-18 m-b-20 text-primary">{{ @$service_name }} আর্থিক অগ্রগতি</div>
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
                                                        <div class="card-title text-black">
                                                            <span class="fs-16 pa-lef text-black m-t-20">প্রাক্কলিত ব্যায় </span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-xs-height ">
                                                <div class="col-xs-height col-top relative">
                                                    <div class="p-l-20">
                                                        <div class=" h3 no-margin p-b-5 text-black">{{ \App\Common::randSingleNum(15000000, 350000000) }} টাকা</div>
                                                        <div class="p-b-5 text-black">এটুয়াই এর সর্বমোট বাজেটের ৯%</div>
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
                                                        <div class="card-title text-black">
                                                            <span class="fs-16 pa-lef text-black m-t-20">অনুমোদিত ব্যায় </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-xs-height ">
                                                <div class="col-xs-height col-top relative">
                                                    <div class="p-l-20">
                                                            <span
                                                                    class=" h3 no-margin p-b-5 text-black">{{ \App\Common::randSingleNum(15000000, 350000000) }} টাকা</span>
                                                        <div class="p-b-5 text-black">প্রাক্কলিত বাজেটের ৯%</div>

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
                                    <div
                                            class="widget-8 card no-border bg-info-lighter no-margin widget-loader-bar">
                                        <div class="container-xs-height full-height">
                                            <div class="row-xs-height">
                                                <div class="col-xs-height col-top">
                                                    <div class="card-header  top-left top-right">
                                                        <div class="card-title text-black">
                                                            <span class="fs-16 pa-lef text-black m-t-20">প্রকৃত ব্যায়  </span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-xs-height ">
                                                <div class="col-xs-height col-top relative">
                                                    <div class="p-l-20 p-r-20">
                                                        <div class=" h3 no-margin p-b-5 text-black">{{ \App\Common::randSingleNum(15000000, 350000000) }} </div>
                                                        <div class="p-b-5 text-black">অনুমোদিত বাজেটের ৯%</div>

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

            <!-- Work Plan -->
            <div class="card  card-transparent bg-white">

                <div class="card-block bg-white">
                    <div class="card-header border-bottom txt-18 m-b-20 text-primary">{{ @$service_name }} কর্ম পরকল্পনা</div>
                    <div class="card no-border no-margin widget-loader-circle todolist-widget align-self-stretch">

                        <div class="row">
                            <div class="col-lg-6 col-sm-6 d-flex flex-column">
                                <div class="list-box bg-success padding-5">
                                    <div class="row m-t-5 m-b-5 ">
                                        <div class="col-md-8 "><div class="txt-14">কর্মপরিকল্পনা আমার সোনার বাংলা </div></div>
                                        <div class="col-md-4"> <span class="pull-right txt-14 ">১৭/০৩/২০১৯</span> </div>
                                    </div>
                                </div>
                                <div class="list-box bg-warning padding-5">
                                    <div class="row m-t-5 m-b-5">
                                        <div class="col-md-8 "><div class="txt-14">কর্মপরিকল্পনা আমার সোনার বাংলা </div></div>
                                        <div class="col-md-4"> <span class="pull-right txt-14 ">১৭/০৩/২০১৯</span> </div>
                                    </div>
                                </div>
                                <div class="list-box bg-danger padding-5">
                                    <div class="row m-t-5 m-b-5">
                                        <div class="col-md-8 "><div class="txt-14 text-white">কর্মপরিকল্পনা আমার সোনার বাংলা </div></div>
                                        <div class="col-md-4"> <span class="pull-right txt-14 ">১৭/০৩/২০১৯</span> </div>
                                    </div>
                                </div>
                                <div class="list-box bg-info-lighter padding-5">
                                    <div class="row m-t-5 m-b-5">
                                        <div class="col-md-8 "><div class="txt-14">কর্মপরিকল্পনা আমার সোনার বাংলা </div></div>
                                        <div class="col-md-4"> <span class="pull-right txt-14 ">১৭/০৩/২০১৯</span> </div>
                                    </div>
                                </div>
                                <div class="list-box bg-info-lighter padding-5">
                                    <div class="row m-t-5 m-b-5">
                                        <div class="col-md-8 "><div class="txt-14">কর্মপরিকল্পনা আমার সোনার বাংলা </div></div>
                                        <div class="col-md-4"> <span class="pull-right txt-14 ">১৭/০৩/২০১৯</span> </div>
                                    </div>
                                </div>
                                <div class="list-box bg-info-lighter padding-5">
                                    <div class="row m-t-5 m-b-5">
                                        <div class="col-md-8 "><div class="txt-14">কর্মপরিকল্পনা আমার সোনার বাংলা </div></div>
                                        <div class="col-md-4"> <span class="pull-right txt-14 ">১৭/০৩/২০১৯</span> </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6 col-sm-6 d-flex flex-column">
                                <div class="card-header">
                                    <div class="card-title">১৭/০৩/২০১৯
                                    </div>
                                    <div class="card-controls">
                                        <ul>
                                            <li><a href="#" class="portlet-refresh text-black" data-toggle="refresh"><i class="portlet-icon portlet-icon-refresh"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="list-unstyled p-l-20 p-r-20 p-t-10 m-b-20">
                                    <li>
                                        <h5 class="pull-left normal no-margin">কর্মপরিকল্পনা আমার সোনার বাংলা </h5>
                                        <a href="#" class="text-black pull-right m-l-5" data-toggle="refresh"><i class="fa fa-angle-right"></i></a>
                                        <a href="#" class="text-black pull-right m-r-5" data-toggle="refresh"><i class="fa fa-angle-left"></i></a>
                                    </li>
                                    <div class="clearfix"></div>
                                </ul>
                                <div class="task-list p-t-0 p-r-20 p-b-20 p-l-20 clearfix flex-1">
                                    <!-- START TAKS !-->
                                    <div class="task clearfix row completed">
                                        <div class="task-list-title col-10 justify-content-between">
                                            <a href="#" class="text-master strikethrough" data-task="name">আমার সোনারবাংলা, আমি তোমায় ভালোবাসি
                                            </a>
                                            <i class="fs-14 pg-close hidden"></i>
                                        </div>
                                        <div class="checkbox checkbox-circle no-margin text-center col-2 d-flex justify-content-center">
                                            <input type="checkbox" checked="checked" value="1" id="todocheckbox" data-toggler="task" class="hidden">
                                            <label for="todocheckbox" class=" no-margin no-padding absolute"></label>
                                        </div>
                                    </div>
                                    <!-- END TAKS !-->
                                    <!-- START TAKS !-->
                                    <div class="task clearfix row">
                                        <div class="task-list-title col-10 justify-content-between">
                                            <a href="#" class="text-master" data-task="name">আমার সোনারবাংলা, আমি তোমায় ভালোবাসি
                                            </a>
                                            <i class="fs-14 pg-close hidden"></i>
                                        </div>
                                        <div class="checkbox checkbox-circle no-margin text-center col-2 d-flex justify-content-center">
                                            <input type="checkbox" value="1" id="todocheck2" data-toggler="task" class="hidden">
                                            <label for="todocheck2" class=" no-margin no-padding absolute"></label>
                                        </div>
                                    </div>
                                    <!-- END TAKS !-->
                                    <!-- START TAKS !-->
                                    <div class="task clearfix row">
                                        <div class="task-list-title col-10 justify-content-between">
                                            <a href="#" class="text-master" data-task="name">আমার সোনারবাংলা, আমি তোমায় ভালোবাসি
                                            </a>
                                            <i class="fs-14 pg-close hidden"></i>
                                        </div>
                                        <div class="checkbox checkbox-circle no-margin text-center col-2 d-flex justify-content-center">
                                            <input type="checkbox" value="1" id="todocheck3" data-toggler="task" class="hidden">
                                            <label for="todocheck3" class=" no-margin no-padding absolute"></label>
                                        </div>
                                    </div>
                                    <!-- END TAKS !-->
                                    <!-- START TAKS !-->
                                    <div class="task clearfix row">
                                        <div class="task-list-title col-10 justify-content-between">
                                            <a href="#" class="text-master" data-task="name">আমার সোনারবাংলা, আমি তোমায় ভালোবাসি
                                            </a>
                                            <i class="fs-14 pg-close hidden"></i>
                                        </div>
                                        <div class="checkbox checkbox-circle no-margin text-center col-2 d-flex justify-content-center">
                                            <input type="checkbox" value="1" id="todocheck4" data-toggler="task" class="hidden">
                                            <label for="todocheck4" class=" no-margin no-padding absolute"></label>
                                        </div>
                                    </div>
                                    <!-- END TAKS !-->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card  card-transparent bg-white">

                <div class="card-block bg-white">
                    <div class="card-header border-bottom txt-18 text-primary">{{ @$service_name }} ভিত্তিক ইভেন্ট সমূহ</div>
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
                                            <p>আমার সোনার বাংলা, আমি তোমায় ভালোবাসি। চিরদিন তোমার আকাশ, তোমার বাতাস,
                                                আমার প্রাণে বাজায় বাঁশি॥ ও মা, ফাগুনে তোর আমের বনে ঘ্রাণে পাগল করে, মরি
                                                হায়, হায় রে— ও মা, অঘ্রাণে তোর ভরা ক্ষেতে আমি কী দেখেছি মধুর হাসি॥</p>
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
                                            <h6><span class="location semi-bold"><i class="fa fa-map-marker"></i> ইভেন্টএর স্থান</span>
                                                <h6>
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
            </div>
        </div>

    </div>
    <!-- END CONTAINER FLUID -->
    <!-- </div> -->

    <!-- Modal -->
    <div class="modal fade fill-in" id="modalSlideUp" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <i class="pg-close"></i>
        </button>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header txt-24 text-primary text-center"> পাবনা </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- <table class="table table-condensed table-hover"> -->
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th></th>
                                    @foreach($serviceIndicator as $indicator)
                                        <th title="{{ $indicator }}"><div class="vertical">{{ \App\Common::trim_text($indicator,50)  }}</div></th>
                                    @endforeach
                                </tr>
                                {{-- dd($pabna) --}}
                                @foreach($pabna as $key => $upzila)
                                    <tr>
                                        <th>{{ $upzila->name }}</th>
                                        @foreach($serviceIndicator as $indicator)
                                            <td>{{ \App\Common::randSingleNum(10, 100) }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ custom_asset('assets/img/pabna-map.jpg') }}" class="img-responsive">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Modal -->


    <style>
        .vertical{
            writing-mode: tb-rl;
            -webkit-transform: rotate(180deg);
            -moz-transform: rotate(180deg);
            -o-transform: rotate(180deg);
            -ms-transform: rotate(180deg);
            transform: rotate(180deg);
            white-space: nowrap;
            display: block;
            bottom: 0;
        }
    </style>
@endsection
@section('script')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="{{custom_asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{custom_asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js')}}"></script>

    <script src="{{custom_asset('assets/js/dashboard.js')}}"></script>
    <script src="{{custom_asset('assets/js/scripts.js')}}"></script>

    <!-- High Chart JS Starts -->
    <!--{ !!-- HTML::script('js/lib/highcharts/code/highcharts.js') !! } -->

    <script src="{{custom_asset('js/lib/highcharts/code/highcharts.js')}}"></script>
    <script src="{{custom_asset('js/lib/highcharts/code/highcharts-more.js')}}"></script>
    <script src="{{custom_asset('js/lib/highcharts/code/modules/data.js')}}"></script>
    <!-- High Chart JS Ends -->
    <script>
        function drawTimeLineChart(){
            $.ajax({
                url: "{{ url('dashboard/graph/service_timeline') }}",
                data: {"numbers": "12", "unit": "MONTH"},
                success: function (response) {
                    //Do Something
                    $("#service_timeline-div").html(response);
                },
                error: function (xhr) {
                    alert("Something Wnt Wrong");
                    //Do Something to handle error
                }
            });
        }

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var target = $(e.target).attr("data-target") // activated tab
            //alert(target);
            drawTimeLineChart();
        });

        $( document ).ready(function() {
            console.log( "ready!" );
            // Service Time Line
            $.ajax({
                url: "{{ url('dashboard/graph/service_timeline') }}",
                data: {"numbers": "12", "unit": "MONTH"},
                success: function (response) {
                    //Do Something
                    $("#service_timeline-div").html(response);
                },
                error: function (xhr) {
                    alert("Something Wnt Wrong");
                    //Do Something to handle error
                }
            });


            // Service Cluster Time Line
            var service_cluster_timeline_maser = $('#service_cluster_timeline-maser').height();
            $.ajax({
                url: "{{ url('dashboard/graph/service_cluster_timeline') }}",
                data: {"numbers": "2", "unit": "MONTH", "height":service_cluster_timeline_maser},
                success: function (response) {
                    //Do Something
                    $("#service_cluster_timeline-div").html(response);
                },
                error: function (xhr) {
                    alert("Something Wnt Wrong");
                    //Do Something to handle error
                }
            });

            // Service Pie
            $.ajax({
                url: "{{ url('dashboard/graph/service_pie') }}",
                data: {"numbers": "2", "unit": "MONTH"},
                success: function (response) {
                    //Do Something
                    $("#service_pie-div").html(response);
                },
                error: function (xhr) {
                    alert("Something Wnt Wrong");
                    //Do Something to handle error
                }
            });

            // Service Pie
            $.ajax({
                url: "{{ url('dashboard/graph/services_lists_timeline') }}",
                data: {"numbers": "2", "unit": "MONTH"},
                success: function (response) {
                    //Do Something
                    $("#services_lists_timeline-div").html(response);
                },
                error: function (xhr) {
                    alert("Something Wnt Wrong");
                    //Do Something to handle error
                }
            });

            // Provider Status
            $.ajax({
                url: "{{ url('dashboard/graph/provider-timeline') }}",
                data: {"numbers": "2", "unit": "MONTH"},
                success: function (response) {
                    //Do Something
                    $("#provider-timeline-div").html(response);
                },
                error: function (xhr) {
                    alert("Something Wnt Wrong");
                    //Do Something to handle error
                }
            });

            // Provider Status
            $.ajax({
                url: "{{ url('dashboard/graph/provider-stability-timeline') }}",
                data: {"numbers": "2", "unit": "MONTH"},
                success: function (response) {
                    //Do Something
                    $("#provider-stability-timeline-div").html(response);
                },
                error: function (xhr) {
                    alert("Something Wnt Wrong");
                    //Do Something to handle error
                }
            });
        });
    </script>
    <script>
        Highcharts.setOptions({
            colors: ['#05AFE1', '#E60088', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
        });

        // Age categories
        var categories = [
            '০-১৫ বছর', '১৫-২০ বছর', '২০-২৯ বছর', '৩০-৩৯ বছর', '৪০-৪৯ বছর', '৫০-৫৯ বছর', '৬০-৬৯ বছর', '৭০-৭৯ বছর', '৮০+'
        ];
        Highcharts.chart('sex_pie-div', {
            chart: {
                type: 'bar',
                style: {
                    fontFamily: "SolaimanLipi"
                }
            },
            title: {
                text: 'Population pyramid for Germany, 2018'
            },
            subtitle: {
                text: 'বিভিন্ন বয়সী নারি-পুরুষের সেবা গ্রহণ'
            },
            xAxis: [{
                categories: categories,
                reversed: false,
                labels: {
                    step: 1
                }
            }, { // mirror axis on right side
                opposite: true,
                reversed: false,
                categories: categories,
                linkedTo: 0,
                labels: {
                    step: 1
                }
            }],
            yAxis: {
                title: {
                    text: null
                },
                labels: {
                    formatter: function () {
                        return Math.abs(this.value) + 'টি';
                    }
                }
            },

            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },

            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + ', age ' + this.point.category + '</b><br/>' +
                        'Population: ' + Highcharts.numberFormat(Math.abs(this.point.y), 0);
                }
            },

            series: [{
                name: 'পুরুষ',
                data: [-2000, -3000, -5000, -9000, -6000, -5000, -4000, -3000, -2000]
            }, {
                name: 'নারী',
                data: [1000, 2000, 3000, 6000, 2500, 5000, 3000, 2000, 500]
            }]
        });

    </script>
    <style>
        .chart {
            height: 160px;
            margin: 0 auto;
            border-bottom: 1px dashed #666;
        }
    </style>
    <script type="text/javascript">
        /*
        The purpose of this demo is to demonstrate how multiple charts on the same page
        can be linked through DOM and Highcharts events and API methods. It takes a
        standard Highcharts config with a small variation for each data set, and a
        mouse/touch event handler to bind the charts together.
        */


        /**
         * In order to synchronize tooltips and crosshairs, override the
         * built-in events with handlers defined on the parent element.
         */
        ['mousemove', 'touchmove', 'touchstart'].forEach(function (eventType) {
            document.getElementById('container').addEventListener(
                eventType,
                function (e) {
                    var chart,
                        point,
                        i,
                        event;

                    for (i = 0; i < Highcharts.charts.length; i = i + 1) {
                        chart = Highcharts.charts[i];
                        // Find coordinates within the chart
                        event = chart.pointer.normalize(e);
                        // Get the hovered point
                        point = chart.series[0].searchPoint(event, true);

                        if (point) {
                            point.highlight(e);
                        }
                    }
                }
            );
        });

        /**
         * Override the reset function, we don't need to hide the tooltips and
         * crosshairs.
         */
        Highcharts.Pointer.prototype.reset = function () {
            return undefined;
        };

        /**
         * Highlight a point by showing tooltip, setting hover state and draw crosshair
         */
        Highcharts.Point.prototype.highlight = function (event) {
            event = this.series.chart.pointer.normalize(event);
            this.onMouseOver(); // Show the hover marker
            this.series.chart.tooltip.refresh(this); // Show the tooltip
            this.series.chart.xAxis[0].drawCrosshair(event, this); // Show the crosshair
        };

        /**
         * Synchronize zooming through the setExtremes event handler.
         */
        function syncExtremes(e) {
            var thisChart = this.chart;

            if (e.trigger !== 'syncExtremes') { // Prevent feedback loop
                Highcharts.each(Highcharts.charts, function (chart) {
                    if (chart !== thisChart) {
                        if (chart.xAxis[0].setExtremes) { // It is null while updating
                            chart.xAxis[0].setExtremes(
                                e.min,
                                e.max,
                                undefined,
                                false,
                                {trigger: 'syncExtremes'}
                            );
                        }
                    }
                });
            }
        }

        Highcharts.setOptions({
            colors: ['#F7CF5F','#8BC541','#9AC7E0','#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
        });

        // Get the data. The contents of the data file can be viewed at
        Highcharts.ajax({
            url: '{{ custom_asset('data/activity-data.json') }}',
            dataType: 'text',
            success: function (activity) {

                activity = JSON.parse(activity);
                activity.datasets.forEach(function (dataset, i) {

                    // Add X values
                    dataset.data = Highcharts.map(dataset.data, function (val, j) {
                        return [activity.xData[j], val];
                    });

                    var chartDiv = document.createElement('div');
                    chartDiv.className = 'chart';
                    document.getElementById('container').appendChild(chartDiv);

                    Highcharts.chart(chartDiv, {
                        chart: {
                            marginLeft: 40, // Keep all charts left aligned
                            spacingTop: 20,
                            spacingBottom: 20
                        },
                        colors: ['#F7CF5F','#8BC541'],
                        title: {
                            text: dataset.name,
                            align: 'left',
                            margin: 0,
                            x: 30
                        },
                        credits: {
                            enabled: false
                        },
                        legend: {
                            enabled: false
                        },
                        xAxis: {
                            crosshair: true,
                            events: {
                                setExtremes: syncExtremes
                            },
                            labels: {
                                format: '{value} '
                            }
                        },
                        yAxis: {
                            title: {
                                text: null
                            }
                        },
                        tooltip: {
                            positioner: function () {
                                return {
                                    // right aligned
                                    x: this.chart.chartWidth - this.label.width,
                                    y: 10 // align to title
                                };
                            },
                            borderWidth: 0,
                            backgroundColor: 'none',
                            pointFormat: '{point.y}',
                            headerFormat: '',
                            shadow: false,
                            style: {
                                fontSize: '18px'
                            },
                            valueDecimals: dataset.valueDecimals
                        },
                        series: [{
                            data: dataset.data,
                            name: dataset.name,
                            type: dataset.type,
                            //color: Highcharts.getOptions().colors[i],
                            color: Highcharts.getOptions().colors[i],
                            fillOpacity: 0.3,
                            tooltip: {
                                valueSuffix: ' ' + dataset.unit
                            }
                        }]
                    });
                });
            }
        });

    </script>
    <style type="text/css">
        #result {
            text-align: right;
            color: gray;
            min-height: 2em;
        }
        #table-sparkline {
            margin: 0 auto;
            border-collapse: collapse;
        }
        th {
            font-weight: bold;
            text-align: left;
        }
        td, th {
            padding: 5px;
            border-bottom: 1px solid silver;
            height: 20px;
        }

        thead th {
            border-top: 1px solid silver;
            border-bottom: 1px solid silver;
        }
    </style>
    <script type="text/javascript">


        /**
         * Create a constructor for sparklines that takes some sensible defaults and merges in the individual
         * chart options. This function is also available from the jQuery plugin as $(element).highcharts('SparkLine').
         */
        Highcharts.SparkLine = function (a, b, c) {
            var hasRenderToArg = typeof a === 'string' || a.nodeName,
                options = arguments[hasRenderToArg ? 1 : 0]

            options = Highcharts.merge(defaultOptions, options);

            return hasRenderToArg ?
                new Highcharts.Chart(a, options, c) :
                new Highcharts.Chart(options, b);
        };

        var start = +new Date(),
            $tds = $('td[data-sparkline]'),
            fullLen = $tds.length,
            n = 0;

        // Creating 153 sparkline charts is quite fast in modern browsers, but IE8 and mobile
        // can take some seconds, so we split the input into chunks and apply them in timeouts
        // in order avoid locking up the browser process and allow interaction.
        function doChunk() {
            var time = +new Date(),
                i,
                len = $tds.length,
                $td,
                stringdata,
                arr,
                data,
                chart;

            for (i = 0; i < len; i += 1) {
                $td = $($tds[i]);
                stringdata = $td.data('sparkline');
                arr = stringdata.split('; ');
                data = $.map(arr[0].split(', '), parseFloat);
                chart = {};

                if (arr[1]) {
                    chart.type = arr[1];
                }
                $td.highcharts('SparkLine', {
                    chart: {
                        renderTo: (options.chart && options.chart.renderTo) || this,
                        backgroundColor: null,
                        borderWidth: 0,
                        type: 'area',
                        margin: [2, 0, 2, 0],
                        width: 120,
                        height: 20,
                        style: {
                            overflow: 'visible'
                        },

                        // small optimalization, saves 1-2 ms each sparkline
                        skipClone: true
                    },
                    title: {
                        text: ''
                    },
                    credits: {
                        enabled: false
                    },
                    xAxis: {
                        labels: {
                            enabled: false
                        },
                        title: {
                            text: null
                        },
                        startOnTick: false,
                        endOnTick: false,
                        tickPositions: []
                    },
                    yAxis: {
                        endOnTick: false,
                        startOnTick: false,
                        labels: {
                            enabled: false
                        },
                        title: {
                            text: null
                        },
                        tickPositions: [0]
                    },
                    legend: {
                        enabled: false
                    },
                    // tooltip: {
                    // hideDelay: 0,
                    // outside: true,
                    // shared: true
                    // },
                    plotOptions: {
                        series: {
                            animation: false,
                            lineWidth: 1,
                            shadow: false,
                            states: {
                                hover: {
                                    lineWidth: 1
                                }
                            },
                            marker: {
                                radius: 1,
                                states: {
                                    hover: {
                                        radius: 2
                                    }
                                }
                            },
                            fillOpacity: 0.25
                        },
                        column: {
                            negativeColor: '#910000',
                            borderColor: 'silver'
                        }
                    },
                    series: [{
                        data: data,
                        pointStart: 1
                    }],
                    tooltip: {
                        headerFormat: '<span style="font-size: 10px">' + $td.parent().find('th').html() + ', Q{point.x}:</span><br/>',
                        pointFormat: '<b>{point.y}.000</b> USD'
                    },
                    chart: chart
                });

                n += 1;

                // If the process takes too much time, run a timeout to allow interaction with the browser
                if (new Date() - time > 500) {
                    $tds.splice(0, i + 1);
                    setTimeout(doChunk, 0);
                    break;
                }

                // Print a feedback on the performance
                if (n === fullLen) {
                    $('#result').html('Generated ' + fullLen + ' sparklines in ' + (new Date() - start) + ' ms');
                }
            }
        }
        doChunk();

    </script>
    <script>
        var chart = Highcharts.chart('finance-container', {
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
