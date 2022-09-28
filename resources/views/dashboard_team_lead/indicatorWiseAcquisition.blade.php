@extends('layout.frontend')
@push('top_css')
    <link class="stylesheet" href="{{ custom_asset('assets/css/indicator.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
    <div class="container-fluid p-3 mb-5">
        <div class="row">
            <div class="col-9 pr-0">
                <div style="border:1px solid #50beff;border-radius: 15px;" class="p-2 bg-white">
                    <div class="text-center">
                        <h4>সূচক ভিত্তিক অর্জন</h4>
                        <h6 class="text-muted">সর্বশেষ আপডেট : {{$last_operation_date}}</h6>
                    </div>
                    <table width="100%" class="table">
                        <thead>
                        <tr>
                            <th class="text-right font-sm borderless"></th>
                            <th colspan="2" class="borderless"></th>
                            <th colspan="2" class="text-center font-lg borderless" style="color:darkviolet !important;">
                                এখন
                                পর্যন্ত অগ্রগতি
                            </th>
                            <th colspan="2" class="text-center font-lg borderless" style="color: #0096cf !important;">
                                <div>
                                    প্রস্তাবিত সময়সীমার শেষপর্যন্ত
                                </div>
                                <div style="margin:-15px;">
                                    <i class="fa fa-caret-down" style="font-size:48px;"></i>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-right font-sm borderless"></th>
                            <th colspan="2" class="borderless"></th>
                            <th colspan="2"
                                class="text-center font-md borderless border-l border-r">
                                {{$current_month_year}}
                                পর্যন্ত
                            </th>
                            <th colspan="2" class="text-center font-md borderless border-l">
                                ডিসেম্বর, {{ english_to_bangla($current_year) }} পর্যন্ত
                            </th>
                        </tr>
                        <tr>
                            <th class="text-right font-sm borderless"></th>
                            <th colspan="2" class="text-right font-sm borderless"><p style="color:#013281">{{$current_month_year}}</p> </th>
                            <th class="text-center font-md borderless border-l border-b">লক্ষ্যমাত্রা</th>
                            <th class="font-md borderless border-r border-b" style="padding-left: 73px !important;">অর্জন</th>
                            <th class="text-center font-md borderless border-l border-b">লক্ষ্যমাত্রা</th>
                            <th class="font-md borderless border-b" style="padding-left: 60px !important;">অর্জন</th>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach($indicator_data as $info)

                            <tr>
                                <td width="10%" class="borderless">
                                    {{$info['project_name']}}
                                </td>
                                <td width="10%" class="borderless">
                                    <div class="d-flex flex-row">
                                        <a href="{{url('dashboard/indicator-wise-prediction/'.$info['project_id'].'/'.$info['id'])}}"
                                           class="hoverBtn wrap-word" style="color:black;width: 135px !important;"
                                           data-toggle="tooltip" title="{{$info['bangla_name']}} ({{$info['unit']}})">
                                             <span class="onHover" style="color:#2f98ba"><i
                                                         class="fa fa-arrow-right"></i> </span>
                                            {{$info['bangla_name']}}
                                        </a>
                                        <p class="text-black">({{$info['unit']}})</p>
                                    </div>
                                </td>
                                <td width="15%" class="text-center borderless p-0">
                                    <div class="progress blue-progress">
                                        <div class="progress-bar progress-bar-complete" role="progressbar"
                                             style="width: {{$info['percentage']}}%;"
                                             aria-valuenow="{{$info['percentage']}}" aria-valuemin="0"
                                             aria-valuemax="100">
                                        </div>
                                        <span>{{english_to_bangla($info['percentage'])}}%</span>
                                    </div>
                                </td>
                                <td width="10%" class="text-center borderless border-l p-0">
                                    <div style="background-color: #e3e3e3">
                                        {{english_to_bangla(bdtFormat($info['target_data']))}}
                                    </div>
                                </td>
                                <td width="25%" class="text-center borderless border-r p-0">
                                    <div class="form-inline">
                                <span class="col-9" style="background-color: #e3e3e3">
                                    {{english_to_bangla(bdtFormat($info['real_data']))}}
                                </span>
                                        @php
                                            $progress = english_to_bangla($info['percentage']);
                                        @endphp
                                        <span class="py-1">
                                        @if($info['percentage'] < 25 && $info['percentage'] >= 0)
                                                <div class="circle red-circle">
                                            <span class="text-black fs-10">{{$progress}}%</span>
                                        </div>
                                            @elseif($info['percentage'] < 50 && $info['percentage'] >= 25)
                                                <div class="circle orange-circle">
                                            <span class="text-black fs-10">{{$progress}}%</span>
                                        </div>
                                            @elseif($info['percentage'] < 75 && $info['percentage'] >= 50)
                                                <div class="circle blue-circle">
                                            <span class="text-black fs-10" style="font-size: 8px;">{{$progress}}%</span>
                                        </div>
                                            @elseif($info['percentage'] >= 75)
                                                <div class="circle green-circle">
                                            <span class="text-black fs-10">{{$progress}}%</span>
                                        </div>
                                            @endif
                                </span>
                                    </div>

                                </td>
                                <td width="10%" class="text-center borderless border-l p-0">
                                    <div
                                            style="background-color: #e3e3e3"> {{english_to_bangla(bdtFormat($info['target_end_data']))}}</div>
                                </td>
                                <td width="25%" class="text-center borderless p-0">
                                    <div class="form-inline">
                                    <span class="col-9"
                                          style="background-color: #e3e3e3"> {{english_to_bangla(bdtFormat($info['target_end_real_data']))}} </span>
                                        <span class="py-1">
                                         @php
                                             $target_end_progress = english_to_bangla($info['target_end_percentage']);
                                         @endphp
                                    <span class="py-1">
                                        @if($info['target_end_percentage'] < 25 && $info['target_end_percentage'] >= 0)
                                            <div class="circle red-circle">
                                            <span class="text-black fs-10">{{$target_end_progress}}%</span>
                                        </div>
                                        @elseif($info['target_end_percentage'] < 50 && $info['target_end_percentage'] >= 25)
                                            <div class="circle orange-circle">
                                            <span class="text-black fs-10">{{$target_end_progress}}%</span>
                                        </div>
                                        @elseif($info['target_end_percentage'] < 75 && $info['target_end_percentage'] >= 50)
                                            <div class="circle blue-circle">
                                            <span class="text-black fs-10">{{$target_end_progress}}%</span>
                                        </div>
                                        @elseif($info['target_end_percentage'] >= 75)
                                            <div class="circle green-circle">
                                            <span class="text-black fs-10">{{$target_end_progress}}%</span>
                                        </div>
                                        @endif
                                    </span>
                                    </span>
                                    </div>
                                </td>
                            </tr>


                        @endforeach
                        </tbody>

                    </table>
                    <hr>

                    <div class="row">
                        <div class="offset-4 col-8">
                            <div class="form-inline pull-right">

                                <div class="legend-circle green-circle mt-1">
                                </div>
                                <span style="font-size: 10px;" class="px-1">খুবই সন্তোষজনক (৮০% +)</span>

                                <div class="legend-circle blue-circle mt-1">
                                </div>
                                <span style="font-size: 10px;" class="pl-2 pr-1">তুলনামূলকভাবে সন্তোষজনক (৬০%-৭৯%)</span>

                                <div class="legend-circle orange-circle mt-1">
                                </div>
                                <span style="font-size: 10px;" class="px-1">সন্তোষজনক নয়(৫০% - ৫৯%)</span>

                                <div class="legend-circle red-circle mt-1">
                                </div>
                                <span style="font-size: 10px;" class="pl-2 pr-1">অতি দূর্বল, গ্রহণযোগ্য নয়(০%-৪৯%)</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div style="border:1px solid #50beff;border-radius: 15px;" class="p-2 bg-white">
                    <div class="d-flex flex-column ">
                        <div class="p-2 text-center">
                            <h5 class="m-0">সর্বমোট সূচক </h5>
                            <h4 class="m-0">{{english_to_bangla($total_indicators)}} টি </h4>
                        </div>
                        <div class="blue-border-top">
                            <div id="container-target-achievement" class="chart-container pl-4"
                                 style="width: 250px; height: 250px;">
                            </div>
                            <div class="text-center">
                                <h6 class="m-0">অর্জিত হয়নি</h6>
                                <h5 class="m-0"
                                    style="font-weight: bold;color:red;">{{$indicator_not_met_target_percentage}}%</h5>
                            </div>
                        </div>
                        <span class="border border-primary"></span>
                        <div class="form-inline blue-border-top">
                            <div class="col-2 mt-1">
                                <span class="blue-dot"></span>
                            </div>
                            <div class="col-7">
                                <h6>লক্ষ্যমাত্রা অর্জন :</h6>
                            </div>
                            <div class="col-3">
                                <h6>{{english_to_bangla($target_met_indicator_count)}} টি </h6>
                            </div>
                        </div>

                        <div class="form-inline blue-border-top blue-border-bottom">
                            <div class="col-2 mt-1">
                                <span class="light-blue-dot"></span>
                            </div>
                            <div class="col-7">
                                <h6>লক্ষ্যমাত্রা অর্জিত হয়নি :</h6>
                            </div>
                            <div class="col-3">
                                <h6>{{english_to_bangla($target_not_met_indicator_count)}} টি </h6>
                            </div>
                        </div>
                        <div class="pt-4 pl-4">
                            {{--                                        অব্যবহৃত ৭০০০,৪৫,৫০০০০/= টাকা আগামী দুই মাসের  মধ্যে অবশ্যই খরচ করতে হবে।--}}
                        </div>
                    </div>
                </div>

            </div>

        </div>


    </div>
@endsection
@push('scripts')
    <script>
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
                enabled: true
            },

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
        var chartSpeed = Highcharts.chart('container-target-achievement', Highcharts.merge(gaugeOptions, {
            yAxis: {
                min: 0,
                max: 100
            },

            credits: {
                enabled: false
            },

            series: [{
                name: '',
                data: [{{$indicator_met_target_percentage}}],
                dataLabels: {
                    format:
                        '<div style="text-align:center;margin-top:35px;">' +
                        '<span style="font-size:13px">লক্ষ্যমাত্রা<br/>অর্জন</span><br/>' +
                        '<span style="font-size:25px">' + '{{$indicator_met_target_percentage_bangla}}' + '</span>' +
                        '<span style="font-size:25px;"> %</span>' +
                        '</div>'
                },
                tooltip: {
                    valueSuffix: ' %'
                }
            }]

        }));
    </script>
@endpush

