@extends('layout.frontend')
@push('top_css')
    <link class="stylesheet" href="{{ custom_asset('assets/css/indicator.css') }}" rel="stylesheet" type="text/css"/>
    <style>
        .border-progress {
            border-top: 1px solid #E9F2FB !important;
            border-bottom: 1px solid #E9F2FB !important;
            border-radius: 5px
        }

        .running-arrow {
            margin-left: -52px;
            position: absolute;
            line-height: 55px;
        }

        .r-arrow {
            position: absolute;
            margin-top: 13px;
            margin-left: -12px;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid p-t-5 p-l-25 p-b-5 p-r-25">
        <div class="indicator-progress-card pt-0  bg-white p-3 p-b-50">
            <div class="row p-b-25">
                <input type="hidden" name="team_id" id="team_id" value="{{$project_category_id}}">
                <div class="col-6">
                    <div class="indicator-progress-title">উদ্যোগভিত্তিক অগ্রগতি</div>
                    <div class="indicator-progress-sub-title p-t-5">{{ $current_month_year }}</div>
                </div>
                <div class="col-6">
                    <div class="detail-btn text-center pull-right">
                        <a href="{{url('/dashboard/indicator-wise-acquisition/'.$project_category_id)}}">বিস্তারিত
                            &nbsp;&nbsp;<i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="row col-xs-12 mb-5">
                <div class="col-xs-12 col-md-6">
                    <div class="row">
                        <div class="col-8 offset-2">
                            <div class="row" style="position: absolute">
                                <div class="col-4 m-0 p-0" style="z-index: 999;">
                                    <div class="ellipse">
                                        <div class="grand-total-indicator">সর্বমোট ইন্ডিকেটর</div>
                                        <br>
                                        <div class="sub-total">{{english_to_bangla($total_team_indicators)}} টি</div>
                                    </div>
                                </div>
                                <div class="col-6 col-xs-12 m-0 p-0" style="z-index: 111;">
                                    <div class="vector1">
                                        <img class="img-responsive" src="{{ asset('assets/img/dashboard/DS.png') }}">
                                        <div class="vector1-text">লক্ষ্যমাত্রা অর্জনঃ
                                            &nbsp;{{english_to_bangla($total_target_met_indicator_count)}} টি
                                        </div>
                                    </div>
                                    <div class="vector2">
                                        <img class="img-responsive" src="{{ asset('assets/img/dashboard/DS.png') }}">
                                        <div class="vector2-text">লক্ষ্যমাত্রা অর্জিত হয়নিঃ
                                            &nbsp;{{english_to_bangla($total_target_not_met_count)}} টি
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6">
                    <div class="d-flex fs-16 text-black text-center font-weight-bold">
                        <div class="p-2 w-50 ">উদ্যোগ</div>
                        <div class="p-2 w-25">ইন্ডিকেটর</div>
                        <div class="p-2 w-25">লক্ষ্যমাত্রা অর্জন</div>
                        <div class="p-2 w-25">অর্জিত হয়নি</div>
                    </div>
                    @foreach($projects as $project)
                        <div class="d-flex fs-13 text-black text-center border-progress" style="
                        <?php $randomcolor = '#' . dechex(rand(1, 10000000));  ?>
                            border-left: 10px solid {{$randomcolor}} !important;
                            border-right: 5px solid {{$randomcolor}} !important;
                            ">
                            <div class="pl-4 py-2 w-50 text-left">
                                <a href="{{url('dashboard/team-lead-project/'.$project->id)}}"
                                   class="fs-16"> {{$project->bangla_name}}  </br>
                                    <span
                                        class="last-update">সর্বশেষ হালনাগাদঃ {{$indicatorInfo[$project->id]['last_operation_date']}}</span>
                                </a>
                            </div>
                            <div class="p-2 w-25">
                                <span class="lh-40">{{$indicatorInfo[$project->id]['total_indicators']}} টি</span>
                            </div>
                            <div class="p-2 w-25">
                                <span
                                    class="lh-40">{{$indicatorInfo[$project->id]['target_met_indicator_count']}} টি</span>
                            </div>
                            <div class="p-2 w-25">
                                <span class="lh-40">{{$indicatorInfo[$project->id]['target_not_met_indicator_count']}} টি</span>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <footer class="footer"
                style="background: #DAE8FC; bottom: 5px; height: 10px; margin-left: 25px;margin-right: 25px; border-radius: 0px 0px 10px 10px;"></footer>

    </div>

    <div class="container-fluid p-t-5 p-l-25 p-b-5 p-r-25">
        <div class="indicator-progress-card pt-0  bg-white p-3 p-b-50">
            <div class="row p-b-25">
                <div class="col-6">
                    <div class="indicator-progress-title">উদ্যোগভিত্তিক অগ্রগতি</div>
                    <div class="indicator-progress-sub-title p-t-5">{{ $current_month_year }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-6" id="chartjs-radar">
                    <div class="dropdown" style="position: absolute;right:15px;">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-lg fa-download"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" width="100%">
                            <a href="#" id="exportProgressRadar" class="p-1">PNG</a>
                        </div>
                    </div>
                    <canvas id="radar-canvas"></canvas>
                </div>
                <div class="col-6 side-progress">
                    <table width="100%" class="table">
                        <thead>
                        <tr>
                            <th colspan="2" class="borderless"></th>
                            <th colspan="2" class="text-center font-lg borderless"
                                style="color:darkviolet !important;">
                                এখন
                                পর্যন্ত অগ্রগতি
                            </th>
                        </tr>
                        <tr>
                            <th colspan="2" class="borderless"></th>
                            <th colspan="2"
                                class="text-center font-md borderless border-l border-r">
                                {{$current_month_year}} পর্যন্ত
                            </th>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-right font-sm borderless">{{$current_month_year}}</th>
                            <th class="text-center font-md borderless border-l border-b">সূচক</th>
                            <th class="font-md borderless border-r border-b" style="padding-left: 22px !important;">
                                লক্ষ্যমাত্রা অর্জন
                            </th>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach($projects as $project)
                            <tr>
                                <td width="18%" class="borderless">
                                    <a href="{{url('dashboard/team-lead-project/' . $project->id)}}#indicator_progress"
                                       class="hoverBtn wrap-word-landing" style="color:black;width: 135px !important;"
                                       data-toggle="tooltip" title="{{$project->bangla_name}}">
                                             <span class="onHover" style="color:#2f98ba"><i
                                                     class="fa fa-arrow-right"></i> </span>
                                        {{$project->bangla_name}}
                                    </a>
                                </td>
                                <td width="20%" class="text-center borderless p-0">
                                    <div class="progress blue-progress">
                                        <div class="progress-bar progress-bar-complete"
                                             role="progressbar"
                                             style="width: {{$indicatorInfo[$project->id]['total_progress']}}%;"
                                             aria-valuenow="{{$indicatorInfo[$project->id]['total_progress']}}"
                                             aria-valuemin="0"
                                             aria-valuemax="100">
                                        </div>
                                        <span>{{english_to_bangla($indicatorInfo[$project->id]['total_progress'])}}
                                            %</span>
                                    </div>

                                </td>
                                <td width="10%" class="text-center borderless border-l p-0">
                                    <div style="background-color: #e3e3e3">
                                        {{$indicatorInfo[$project->id]['total_indicators']}}
                                    </div>
                                </td>
                                <td width="20%" class="text-center borderless border-r p-0">
                                    <div class="form-inline">
                                            <span class="col-9" style="background-color: #e3e3e3">
                                        {{$indicatorInfo[$project->id]['target_met_indicator_count']}}
                                            </span>
                                        @php
                                            $progress = english_to_bangla($indicatorInfo[$project->id]['total_progress']);
                                        @endphp
                                        <span class="py-1">
                                                    @if($indicatorInfo[$project->id]['total_progress'] < 25 && $indicatorInfo[$project->id]['total_progress'] >= 0)
                                                <div class="circle red-circle">
                                                        <span class="text-black"
                                                              style="font-size: 8px;">{{$progress}}%</span>
                                                    </div>
                                            @elseif($indicatorInfo[$project->id]['total_progress'] < 50 && $indicatorInfo[$project->id]['total_progress'] >= 25)
                                                <div class="circle orange-circle">
                                                        <span class="text-black"
                                                              style="font-size: 8px;">{{$progress}}%</span>
                                                    </div>
                                            @elseif($indicatorInfo[$project->id]['total_progress'] < 75 && $indicatorInfo[$project->id]['total_progress'] >= 50)
                                                <div class="circle blue-circle">
                                                        <span class="text-black"
                                                              style="font-size: 8px;">{{$progress}}%</span>
                                                    </div>
                                            @elseif($indicatorInfo[$project->id]['total_progress'] >= 75)
                                                <div class="circle green-circle">
                                                        <span class="text-black"
                                                              style="font-size: 8px;">{{$progress}}%</span>
                                                    </div>
                                            @endif
                                            </span>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    <hr>
                </div>
            </div>
        </div>
        <footer class="footer"
                style="background: #DAE8FC; bottom: 5px; height: 10px; margin-left: 25px;margin-right: 25px; border-radius: 0px 0px 10px 10px;"></footer>

    </div>

    @if($operation_view)
        <div class="container-fluid p-t-5 p-l-25 p-b-5 p-r-25">
            <div class="indicator-progress-card pt-0  bg-white p-3 p-b-50">
                <div class="row p-b-25">
                    <div class="col-6">
                        <div class="indicator-progress-title">আর্থিক অগ্রগতি</div>
                        <div class="indicator-progress-sub-title p-t-5">{{english_to_bangla($fiscal_start_year_month)}}
                            হতে {{english_to_bangla($fiscal_end_year_month)}}</div>
                    </div>
                    <div class="col-6">
                        <div class="detail-btn text-center pull-right">
                            <a href="{{url('/dashboard/get-financial-progress-detail-data/'.Request::segment(3) )}}">বিস্তারিত
                                &nbsp;&nbsp;<i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-xs-12">
                        <div class="row">
                            <div class="col-4 text-center p-2">
                                <div class="ep-left-title">
                                    সমগ্র অর্থবছর, </br> {{english_to_bangla($fiscal_start_year_month)}}
                                    হতে {{english_to_bangla($fiscal_end_year_month)}}
                                </div>
                                <div id="container-expenditure" class="chart-container pl-4"
                                     style="width: 175px; height: 175px;">
                                </div>
                                {{--                            <div class="text-center" >--}}
                                {{--                                <h6 class="m-0">ব্যয়</h6>--}}
                                {{--                                <h5 class="m-0"--}}
                                {{--                                    style="font-weight: bold;color:red;">{{english_to_bangla($expenditure_percentage)}}--}}
                                {{--                                    %</h5>--}}
                                {{--                            </div>--}}
                                <div
                                    class="ep-total-taka">{{english_to_bangla(number_conversion($total_financial_year_approved))}}
                                    টাকা
                                </div>
                                <span>( {{english_to_bangla($total_financial_year_approved)}}/= )</span>
                            </div>
                            <div class="col-8 text-center pr-0">
                                <div class="pl-4">
                                    <div class="d-flex flex-row buy-progress-border-b">
                                        <div class="w-75 p-1">
                                            <span class="table-title">ত্রৈমাসিক</span>
                                        </div>
                                        <div class="w-25 p-1">
                                            <span class="table-title">বরাদ্দ</span>
                                        </div>
                                        <div class="w-25 p-1">
                                            <span class="table-title">ব্যয়</span>
                                        </div>
                                    </div>
                                    @for($i = 1; $i <= 4; $i++)
                                        @if($running == $i)
                                            <div class="running-arrow">চলমান</div>
                                            <div class="arrow-right r-arrow"></div>
                                        @endif

                                        @php
                                            if($i == 1){
                                            $q = '১ম';
                                            }elseif ($i == 2){
                                            $q = '২য়';
                                            }elseif ($i == 3){
                                            $q = '৩য়';
                                            }elseif ($i == 4){
                                            $q = '৪র্থ';
                                            }
                                        @endphp

                                        <div
                                            class="buy-progress d-flex buy-progress-border-b px-1 py-3  ep-cd ep-seleceted text-black"
                                            id="q{{$i}}-fp"
                                            onclick="financial_progress_data('{{$q}} ত্রৈমাসিক',this.id,'{{$querter_month_range['start_date']['q'.$i]}}','{{$querter_month_range['end_date']['q'.$i]}}')">
                                            <div class="w-75 text-left @if($running == $i) running @endif">{{$q}}
                                                ত্রৈমাসিক
                                                ({{english_to_bangla($start_date['q'.$i])}}
                                                - {{english_to_bangla($end_date['q'.$i])}})
                                            </div>
                                            <div
                                                class="w-25 @if($running == $i) running @endif">{{english_to_bangla($approved_amount['q'.$i])}}
                                                /=
                                            </div>
                                            <div
                                                class="w-25 @if($running == $i) running @endif">{{english_to_bangla($expenditure_percenatge['q'.$i])}}
                                                %
                                            </div>
                                        </div>
                                    @endfor

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-1 p-l-0" style="border-left: 1px solid #FFC542; padding-top: 140px;">
                        {{--                    <div class="arrow-right"></div>--}}
                        <div class="fp-ep-circle"></div>
                    </div>

                    <div class="col-5">
                        <div id="financial-side-chart"></div>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="offset-5 col-7 ">সর্বশেষ হালনাগাদঃ {{english_to_bangla($last_data_update_date)}}</div>
                </div>
            </div>
            <footer class="footer"
                    style="background: #DAE8FC; bottom: 5px; height: 10px; margin-left: 25px;margin-right: 25px; border-radius: 0px 0px 10px 10px;"></footer>
        </div>

        <div class="container-fluid p-t-5 p-l-25 p-b-5 p-r-25 mb-5">
            <div class="indicator-progress-card pt-0  bg-white p-3 p-b-50"
                 style="border: 1px solid #ABCD9D !important;">
                <div class="row p-b-25">
                    <div class="col-3">
                        <div class="indicator-progress-title">ক্রয় অগ্রগতি</div>
                        <div class="indicator-progress-sub-title p-t-5">{{english_to_bangla($fiscal_start_year_month)}}
                            হতে {{english_to_bangla($fiscal_end_year_month)}}</div>
                    </div>
                    <div class="col-6" style="text-align: center">
                        {{--                    <button type="button" class="btn-white"><i class="fa fa-sliders" aria-hidden="true"></i></button>--}}
                        {{--                    <button type="button" class="btn-white">সকল</button>--}}
                        {{--                    <button type="button" class="btn-white">সেবা</button>--}}
                        {{--                    <button type="button" class="btn-white">পণ্য</button>--}}
                        {{--                    <button type="button" class="btn-white">সরকারী পরামর্শক</button>--}}
                    </div>
                    <div class="col-3">
                        <div class="detail-btn text-center pull-right">
                            <a href="{{url('dashboard/get-buy-progress-detail-data/'.Request::segment(3))}}">বিস্তারিত
                                &nbsp;&nbsp;<i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-xs-12">
                        <div class="row">
                            <div class="col-3 text-center p-0">
                                <div id="chart-purchase-progress" class="chart-container"
                                     style="width: 150px; height: 150px;">
                                </div>
                                {{--                            <div class="text-center" style="margin-left:-12px;">--}}
                                {{--                                <h6 class="m-0">সম্পন্ন</h6>--}}
                                {{--                                <h5 class="m-0"--}}
                                {{--                                    style="font-weight: bold;color:red;">{{english_to_bangla($purchase_info['completed_purchase_percentage'])}}--}}
                                {{--                                    %</h5>--}}
                                {{--                            </div>--}}
                                <div class="px-3">
                                    <p class="fs-16 text-black my-2">
                                        প্রস্তাবিত
                                        ক্রয় {{english_to_bangla($purchase_info['proposed_total_purchase'])}} টি
                                    </p>
                                    <div class="border-box mt-2" style="background: #DFFFF0;border: 1px solid #A3FFD2;">
                                        সম্পন্ন
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{english_to_bangla($purchase_info['completed_purchase'])}}
                                        টি
                                    </div>
                                    <div class="border-box mt-2"
                                         style="background: #FFEFF8; border: 1px solid #FDCFE8;">
                                        চলমান
                                        &nbsp;&nbsp;&nbsp;{{english_to_bangla($purchase_info['ongoing_purchase'])}} টি
                                    </div>
                                    <div class="border-box mt-2"
                                         style="background: #E9F4FF; border: 1px solid #BEDEFE;">
                                        শুরু হয়নি &nbsp;{{english_to_bangla($purchase_info['yet_to_start_purchase'])}}
                                        টি
                                    </div>
                                    <div class="fs-16 text-black mt-2">
                                        সম্পন্ন হয়নি
                                    </div>
                                    <div class="mt-2"
                                         style="font-weight: 600; font-size: 28px; color: #D70544;letter-spacing: 0.1px;">{{english_to_bangla($purchase_info['not_completed_purchase_percentage'])}}
                                        %
                                    </div>
                                </div>
                            </div>

                            <div class="col-9 text-center pr-0">
                                <div class="pl-4">
                                    <div class="d-flex flex-row buy-progress-border-b">
                                        <div class="w-75 p-1">
                                            <span class="table-title">ত্রৈমাসিক</span>
                                        </div>
                                        <div class="w-25 p-1">
                                            <span class="table-title">TOR</span>
                                        </div>
                                        <div class="w-25 p-1">
                                            <span class="table-title">Approval</span>
                                        </div>
                                        <div class="w-25 p-1">
                                            <span class="table-title">EOI</span>
                                        </div>
                                        <div class="w-25 p-1">
                                            <span class="table-title">RFP</span>
                                        </div>
                                        <div class="w-25 p-1">
                                            <span class="table-title">Work Order</span>
                                        </div>
                                    </div>
                                    @for($i = 1; $i <= 4; $i++)
                                        @if($running == $i)
                                            <div class="running-arrow">চলমান</div>
                                            <div class="arrow-right r-arrow"></div>
                                        @endif

                                        @php
                                            if($i == 1){
                                            $q = '১ম';
                                            }elseif ($i == 2){
                                            $q = '২য়';
                                            }elseif ($i == 3){
                                            $q = '৩য়';
                                            }elseif ($i == 4){
                                            $q = '৪র্থ';
                                            }
                                        @endphp

                                        <div
                                            class="buy-progress d-flex buy-progress-border-b px-1 py-3  ep-cd ep-seleceted text-black"
                                            id="q{{$i}}"
                                            onclick="buy_progress_data('{{$q}} ত্রৈমাসিক',this.id,'{{$querter_month_range['start_date']['q'.$i]}}','{{$querter_month_range['end_date']['q'.$i]}}')">
                                            <div class="w-75 text-left @if($running == $i) running @endif">{{$q}}
                                                ত্রৈমাসিক
                                                ({{english_to_bangla($start_date['q'.$i])}}
                                                - {{english_to_bangla($end_date['q'.$i])}})
                                            </div>
                                            <div
                                                class="w-25 @if($running == $i) running @endif">{{english_to_bangla($type_wise_purchase['q'.$i]['tor']) }}
                                                টি
                                            </div>
                                            <div
                                                class="w-25 @if($running == $i) running @endif">{{english_to_bangla($type_wise_purchase['q'.$i]['approval']) }}
                                                টি
                                            </div>
                                            <div
                                                class="w-25 @if($running == $i) running @endif">{{english_to_bangla($type_wise_purchase['q'.$i]['eoi']) }}
                                                টি
                                            </div>
                                            <div
                                                class="w-25 @if($running == $i) running @endif">{{english_to_bangla($type_wise_purchase['q'.$i]['rfp']) }}
                                                টি
                                            </div>
                                            <div
                                                class="w-25 @if($running == $i) running @endif">{{english_to_bangla($type_wise_purchase['q'.$i]['workOrder']) }}
                                                টি
                                            </div>
                                        </div>
                                    @endfor
                                </div>

                                <div class="row p-0 m-0 mt-5 ">
                                    <div class="arrow-right-lg col-1 p-0"></div>
                                    <p class="col-10 fs-16 text-black text-left p-0 m-0 lh-25">
                                        প্রস্তাবনা মতে <span id="total_incomplete_purchase"></span> টি ক্রয় প্রক্রিয়া
                                        আগামী <span id="left_days"></span> দিনের মধ্যে অবশ্যই সম্পন্ন হতে হবে
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-1 p-l-0" style="border-left: 1px solid #FFC542; padding-top: 122px;">
                        {{--                    <div class="arrow-right"></div>--}}
                        <div class="ep-circle"></div>
                    </div>

                    <div class="col-5 p-0 m-0" id="side-chart">
                    </div>
                </div>
            </div>
            <footer class="footer"
                    style="background: #D5E8D4; bottom: 5px; height: 10px; margin-left: 25px; margin-right: 25px; border-radius: 0px 0px 10px 10px;"></footer>
        </div>
    @endif
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        $(document).ready(function () {
            $('#q' + '{{$running}}' + '-fp').trigger('click');
            $('#q' + '{{$running}}').trigger('click');
        });
        //Radar chart intialize with data

        window.chartColors = {
            blue: 'rgb(54, 162, 235)',
            purple: 'rgb(153, 102, 255)'
        };

        window.randomScalingFactor = function () {
            return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
        };

        const randomScalingFactor = function () {
            return Math.round(Math.random() * 100);
        };

        const label = "অর্জন(%)";
        const color = Chart.helpers.color;
        const config = {
            type: 'radar',
            data: {
                labels: @json(array_keys($chart_data)) ,
                datasets: [{
                    label: label,
                    backgroundColor: color(window.chartColors.purple).alpha(0.2).rgbString(),
                    borderColor: window.chartColors.purple,
                    pointBackgroundColor: window.chartColors.purple,
                    data: @json(array_values($chart_data))
                }]
            },
            options: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: false,
                    text: ''
                },
                scale: {
                    ticks: {
                        beginAtZero: true
                    }
                },
                responsive: true,
                maintainAspectRatio: false
            }
        };

        const ctx = document.getElementById("radar-canvas").getContext('2d');
        let radar_chart = new Chart(ctx, config);

        $('#exportProgressRadar').click(function (event) {
            /* set new title */
            // radar_chart.options.title.text = 'Target Achievement Radar Chart';
            // radar_chart.update({
            //     duration: 0
            // });
            // or, use
            // chart_variable.update(0);

            /* save as image */
            let link = document.createElement('a');
            link.href = radar_chart.toBase64Image();
            link.download = 'radarChart.png';
            link.click();

            /* rollback to old title */
            // radar_chart.options.title.text = 'Target Achievement Radar Chart';
            // radar_chart.update({
            //     duration: 0
            // });
            // or, use
            // chart_variable.update(0);
        });

        function buy_progress_data(q, id, start_date, end_date) {
            let team_id = $('#team_id').val();
            $.ajax({
                url: "{{ url('ajax/get-buy-progress-report-data/') }}",
                data: {
                    'q_name': q,
                    'team_id': team_id,
                    'start_date': start_date,
                    'end_date': end_date
                },
                success: function (response) {
                    $('.ep-cd').removeClass('fp-ep-selected');
                    $('#' + id).addClass('fp-ep-selected');
                    $(".ep-circle").html(q);
                    $("#side-chart").html(response);
                },
                error: function (xhr) {
                    $("#side-chart").html('No Data Found');
                }
            });
        }

        function financial_progress_data(q, id, start_date, end_date) {
            let team_id = $('#team_id').val();
            $.ajax({
                url: "{{ url('ajax/get-financial-progress-report-data/') }}",
                data: {
                    'q_name': q,
                    'team_id': team_id,
                    'start_date': start_date,
                    'end_date': end_date
                },
                success: function (response) {
                    $('.ep-cd').removeClass('ep-selected');
                    $('#' + id).addClass('ep-selected');
                    $(".fp-ep-circle").html(q);
                    $("#financial-side-chart").html(response);

                },
                error: function (xhr) {
                    $("#financial-side-chart").html('No Data Found');
                }
            });
        }

        var gaugeOptions = {
            chart: {
                type: 'solidgauge'
            },

            title: {
                text: null,
                display: false
            },

            pane: {
                center: ['50%', '50%'],
                size: '100%',
                startAngle: 0,
                endAngle: 360,
                background: {
                    backgroundColor:
                        Highcharts.defaultOptions.legend.backgroundColor || '#B1EAFD',
                    innerRadius: '65%',
                    outerRadius: '95%',
                    shape: 'arc'
                }
            },

            exporting: {
                menuItemDefinitions: {
                    // Custom definition
                },
                buttons: {
                    contextButton: {
                        // menuItems: ['downloadXLS', 'downloadCSV', 'downloadPDF', 'downloadPNG', 'downloadSVG', 'separator', 'label']
                        menuItems: ['downloadXLS', 'downloadCSV', 'downloadPDF', 'downloadPNG', 'downloadJPEG', 'downloadSVG', 'viewFullscreen']
                    }
                },
                chartOptions: { // specific options for the exported image
                    plotOptions: {
                        series: {
                            dataLabels: {
                                enabled: true,
                            }
                        }
                    }
                },
                filename: "progress_chart"
            },

            // exporting: {
            //     enabled: true
            // },

            tooltip: {
                enabled: false
            },

            // the value axis
            yAxis: {
                stops: [
                    [0.1, '#247BF3'],
                    [0.5, '#247BF3'],
                    [0.9, '#247BF3']
                ],
                lineWidth: 0,
                tickWidth: 0,
                minorTickInterval: null,
                tickAmount: 0,
                labels: {
                    y: 0
                }
            },

            plotOptions: {
                solidgauge: {
                    dataLabels: {
                        x: 0,
                        y: -30,
                        borderWidth: 0,
                        useHTML: true
                    }
                }
            }
        };
        // The speed gauge
        var chartSpeed = Highcharts.chart('container-expenditure', Highcharts.merge(gaugeOptions, {
            yAxis: {
                min: 0,
                max: 100
            },

            credits: {
                enabled: false
            },

            series: [{
                name: '',
                data: [{{$expenditure_percentage}}],
                dataLabels: {
                    format:
                        '<div style="text-align:center;margin-top:20px;">' +
                        '<span style="font-size:13px; font-weight:bold;">ব্যয়</span><br>' +
                        '<span style="font-size:13px; font-weight:bold; color:red;">{{english_to_bangla($expenditure_percentage)}} %</span>' +
                        '</div>'
                }
            }]
        }));

        var chartPurchase = Highcharts.chart('chart-purchase-progress', Highcharts.merge(gaugeOptions, {
            yAxis: {
                min: 0,
                max: 100
            },

            credits: {
                enabled: false
            },

            series: [{
                name: '',
                data: [{{$purchase_info['completed_purchase_percentage']}}],
                dataLabels: {
                    format:
                        '<div style="text-align:center;margin-top:10px;">' +
                        '<span style="font-size:13px; font-weight:bold;">সম্পন্ন</span><br>' +
                        '<span style="font-size:13px; font-weight:bold; color:red;">{{english_to_bangla($purchase_info['completed_purchase_percentage'])}} %</span>' +
                        '</div>'
                }
                // tooltip: {
                //     valueSuffix: ' %'
                // }
            }]
        }));
    </script>
@endpush
