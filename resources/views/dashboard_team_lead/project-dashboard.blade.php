@extends('layout.frontend')
@push('top_css')
    <link class="stylesheet" href="{{ custom_asset('assets/css/indicator.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@push('top_js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>--}}
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>--}}
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-zoom/1.1.1/chartjs-plugin-zoom.min.js"></script>
@endpush

@section('content')
    <div class="container-fluid px-3 mb-1">
        <div class="row ml-1 w-75 d-inline-block" style="margin-top: -25px; margin-bottom: 10px">
            <div class="row ml-1">
                <img src="{{ custom_asset('assets/img/projects/' . $project->logo) }}"
                     alt="logo" style="max-height: 60px">
                <h4 class="ml-1" style="margin-top: 5px">{{$project->bangla_name}}</h4>
            </div>
        </div>

        <input type="hidden" id="running_indicator" value="{{array_key_first($indicator_data)}}">
        <input type="hidden" id="running_from_date" value="">
        <input type="hidden" id="running_to_date" value="">

        <div class="p-2 bg-white panel-with-border mb-3" id="indicator_progress">
            <div class="d-flex">
                <div class="text-left pl-4">
                    <h4>সূচক ভিত্তিক অগ্রগতি </h4>
                    <h6 class="text-muted">সর্বশেষ আপডেট : {{$last_operation_date}}</h6>
                </div>
                <div class="ml-auto">
                    <div class="btn-group dropdown dropdown-default"
                         style="float:right;box-shadow:1px 1px #d2d2d2;">
                        @if($project->id == 13)
                            <a href="https://uat-insightdb.oss.net.bd/login" class="btn btn-primary" type="button"
                               target="_blank">
                                রেটিং
                            </a>
                        @endif
                        <button class="btn btn-secondary at-aglance-button"
                                type="button">{{__('lavel.reporting')}} <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>
                        <div class="modal fade slide-up glance-tbl" id="ataGlanceSlideUp" tabindex="-1" role="dialog"
                             aria-hidden="false" style="overflow-x:scroll;">
                            <div class="modal-dialog" style="width:90%; max-width:90%;">
                                <div class="modal-content-wrapper">
                                    <div class="modal-content">
                                        <div class="modal-header clearfix text-left">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                <i class="pg-close fs-20"></i></button>
                                            <h5 class="m-t-0 m-b-0"><span class="semi-bold tit-co"></span></h5>
                                        </div>
                                        <div class="modal-body" id="at-a-glance">
                                            <span class="loder">
                                                <img src="{{custom_asset('pages/img/loder-a2i.gif')}}" class="img-fluid"
                                                     alt="">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mx-1">
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
                            <th colspan="2" class="text-center font-lg borderless" style="color:darkviolet !important;">
                                এখন
                                পর্যন্ত অগ্রগতি
                            </th>
                        </tr>
                        <tr>
                            <th colspan="2" class="borderless"></th>
                            <th colspan="2"
                                class="text-center font-md borderless border-l border-r">
                                {{$current_month_year}}
                                পর্যন্ত
                            </th>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-right font-sm borderless">{{$current_month_year}}</th>
                            <th class="text-center font-md borderless border-l border-b">লক্ষ্যমাত্রা</th>
                            <th class="font-md borderless border-r border-b" style="padding-left: 60px !important;">অর্জন</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($indicator_data as $key=>$info)
                            <tr>
                                <td class="borderless" style="width:18%">
                                    <div class="d-flex flex-row pt-1" style="width: 150px !important;">
                                        <a href="{{url('dashboard/indicator-wise-prediction/'.$info['project_id'].'/'.$info['id'])}}"
                                           class="hoverBtn wrap-word-landing" style="color:black;width: 135px !important;"
                                           data-toggle="tooltip" title="{{$info['bangla_name']}} ({{$info['unit']}})">
                                                <span class="onHover" style="color:#2f98ba"><i
                                                            class="fa fa-arrow-right"></i> </span>
                                            {{$info['bangla_name']}}
                                        </a>
                                        ({{$info['unit']}})
                                    </div>
                                </td>
                                <td class="text-center borderless p-0" style="width:25%">
                                    <div class="progress custom-progress">
                                        <div class="progress-bar custom-bar progress-bar-complete" role="progressbar"
                                             style="width: {{$info['percentage']}}%;"
                                             aria-valuenow="{{$info['percentage']}}" aria-valuemin="0"
                                             aria-valuemax="100">
                                        </div>
                                        <span>{{english_to_bangla($info['percentage'])}}%</span>
                                    </div>

                                </td>
                                <td class="text-center borderless border-l p-0" style="width:15%">
                                    <div style="background-color: #e3e3e3">
                                        {{english_to_bangla(bdtFormat($info['target_data']))}}
                                    </div>
                                </td>
                                <td class="text-center borderless border-r p-0" style="width:40%">
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
                                            <span class="text-black fs-11">{{$progress}}%</span>
                                        </div>
                                            @elseif($info['percentage'] < 50 && $info['percentage'] >= 25)
                                                <div class="circle orange-circle">
                                            <span class="text-black fs-11">{{$progress}}%</span>
                                        </div>
                                            @elseif($info['percentage'] < 75 && $info['percentage'] >= 50)
                                                <div class="circle blue-circle">
                                            <span class="text-black fs-11">{{$progress}}%</span>
                                        </div>
                                            @elseif($info['percentage'] >= 75)
                                                <div class="circle green-circle">
                                            <span class="text-black fs-11">{{$progress}}%</span>
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
            <div class="offset-md-4 col-8 my-2">
                <div class="d-flex flex-row ml-5 justify-content-end">
                    <div class="legend-circle green-circle mt-1">
                    </div>
                    <span class="fs-11 lh-25 px-1">খুবই সন্তোষজনক (৮০% +)</span>

                    <div class="legend-circle blue-circle mt-1">
                    </div>
                    <span class="fs-11 lh-25 px-1">তুলনামূলকভাবে সন্তোষজনক (৬০%-৭৯%)</span>

                    <div class="legend-circle orange-circle mt-1">
                    </div>
                    <span class="fs-11 lh-25 px-1">সন্তোষজনক নয়(৫০% - ৫৯%)</span>

                    <div class="legend-circle red-circle mt-1">
                    </div>
                    <span class="fs-11 lh-25 px-1">অতি দূর্বল, গ্রহণযোগ্য নয়(০%-৪৯%)</span>
                </div>
            </div>
        </div>

        <div class="p-2 bg-white panel-with-border mb-3">
            <div class="pl-3">
                <h4>সূচক ভিত্তিক তুলনা</h4>
                <h6 class="text-muted">সর্বশেষ আপডেট : {{$last_operation_date}}</h6>
            </div>
            <div class="row mx-1">
                <div class="col-3 p-0 m-0" style="height: 493px;overflow: scroll;">
                    <div class="d-flex justify-content-end">
                        <button class="btn mb-2 text-white" style="background: #912C8A;" onclick="deselectAllLineData({{json_encode($compare_indicator_lists,true)}})">Reset</button>
                    </div>
                    @foreach($compare_data as $key=>$info)
                        <div onclick="indicator_wise_line_data('{{$key}}')" data-value="{{$info['bangla_name']}}"
                             id="indicator-id-{{$key}}"
                             class="ml-1 indicator-name pl-4">
                            <div class="d-flex">
                                <h6 class="mr-auto">{{$info['bangla_name']}}</h6>
                                <span class="onHover"><i class="fa fa-caret-right fa-lg"></i> </span>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="col-9 pl-0">
                    <div class="filter-input filter-buttons card pull-right">
                        <div class="btn-group btn-group-md flex-wrap" data-toggle="buttons">
                            <img class="mt-2 mx-1" src="{{ custom_asset('assets/img/favicon/filter.png') }}"
                                 alt="logo" width="20" height="20">
                            <label class="btn btn-default"
                                   onclick="data_filtering('{{$date_array['all']}}','{{$date_array['current_date']}}')">
                                <input type="radio" name="options" id="option6"
                                       value="{{$date_array['all']}},{{$date_array['current_date']}}">সামগ্রিক
                            </label>
                            <label class="btn btn-default"
                                   onclick="data_filtering('{{$date_array['12month']}}','{{$date_array['current_date']}}', 'daily')">
                                <input type="radio" name="options" id="option2" data-val="daily"
                                       value="{{$date_array['daily']}},{{$date_array['current_date']}}">দৈনিক
                            </label>
                            <label class="btn btn-default"
                                   onclick="data_filtering('{{$date_array['3month']}}','{{$date_array['current_date']}}')">
                                <input type="radio" name="options" id="option3"
                                       value="{{$date_array['3month']}},{{$date_array['current_date']}}">৩ মাসের
                            </label>
                            <label class="btn btn-default"
                                   onclick="data_filtering('{{$date_array['6month']}}','{{$date_array['current_date']}}')">
                                <input type="radio" name="options" id="option4"
                                       value="{{$date_array['6month']}},{{$date_array['current_date']}}">৬ মাসের
                            </label>
                            <label class="btn btn-default"
                                   onclick="data_filtering('{{$date_array['9month']}}','{{$date_array['current_date']}}')">
                                <input type="radio" name="options" id="option5"
                                       value="{{$date_array['9month']}},{{$date_array['current_date']}}">৯ মাসের
                            </label>
                            <label class="btn btn-default active"
                                   onclick="data_filtering('{{$date_array['12month']}}','{{$date_array['current_date']}}')">
                                <input type="radio" name="options" id="option1"
                                       value="{{$date_array['12month']}},{{$date_array['current_date']}}" checked="">১২ মাসের
                            </label>
                            <label class="btn btn-default">
                                <input type="radio" name="options" id="reportrange" data-val="likeWise">পছন্দ মত
                            </label>
                            <button id="specific-value" value="false" onclick="specificValue();"
                                    style="border:0;
                                padding-top: 2px;
                                background: #fff;
                                font-size: 22px;
                                color: #912c8a;
                                cursor: pointer;">
                                <i class="fa fa-toggle-off"></i>
                            </button>
                            <label class="mb-1" style="margin-top: 7px; padding-right: 15px;">Specific</label>
                        </div>
                    </div>
                    <div class="dropdown" style="position: absolute;">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-lg fa-download"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" width="100%">
                            <a href="#" id="exportCompareLineChart" class="p-1">PNG</a><br>
                        </div>
                    </div>
                    <canvas id="line-canvas"></canvas>
                </div>
            </div>
        </div>

        @if($has_geo_data)
            <div class="p-2 bg-white panel-with-border mb-3">
                <div class="d-flex">
                    <div class="mr-auto pl-3">
                        <h4>সারা দেশ</h4>
                        <h6 class="text-muted">সর্বশেষ আপডেট : {{$last_operation_date}}</h6>
                    </div>
                    <div style="margin-top:36px;">
                        <div class="filter-input card">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label class="text-black" for="indicator_list_drop">সূচক</label>
                                    <select class="form-control" id="indicator_list_drop">
                                        @foreach($total_geo_indicator as $geo_indicator)
                                            <option data-val="{{$geo_indicator->geo_type}}"
                                                    value="{{$geo_indicator->id}}">{{$geo_indicator->bangla_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>

                        <div class="filter-input card">
                            <div class="form-group mb-0">
                                {!! Form::select('division_filter', $divisions, '', ['placeholder'=>'বিভাগ','class' => 'form-control full-width geo_class','data-init-plugin'=>'select2', 'id' => 'divisions_data'])!!}
                            </div>

                            <div class="form-group mb-0">
                                {!! Form::select('district_filter', [], '', ['placeholder'=>'জেলা','class' => 'form-control full-width geo_class','data-init-plugin'=>'select2', 'id' => 'districts_data'])!!}
                            </div>

                            <div class="form-group mb-0">
                                {!! Form::select('upazila_filter', [], '', ['placeholder'=>'উপজেলা','class' => 'form-control full-width geo_class','data-init-plugin'=>'select2', 'id' => 'upazilas_data'])!!}
                            </div>
                        </div>

                        <div class="filter-input card m-0 ml-4">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label class="text-black" for="indicator_list_drop">তারিখ</label>
                                    <div id="map_date_div" data-provide="datepicker" class="input-group date">
                                        <input type="text" id="map_date" style="height: 30px !important;"
                                               name="map_date"
                                               class="form-control" value="{{$date}}"
                                               autocomplete="off" required><span class="input-group-addon"><i
                                                    class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card bg-white" id="load_map_div"></div>
            </div>
        @endif

        @if($has_disaggregation)
            @include('dashboard_team_lead.disaggregation')
        @endif

    </div>

    <div class="map-dril modal fill-in" id="mapModal" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <i class="pg-close" style="font-size:25px;"></i>
        </button>
        <div class="col-md-10 offset-1">
            <div class="map-dril-hed modal-header txt-24 text-primary mt-4" id="drill_down_map_data_name"></div>
            <div class="dril-map-body modal-body" id="drill_down_map_data"></div>
            <div class="modal-footer"></div>
        </div>
    </div>
    <!-- Modal -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $("#map_date_div").datepicker({
                format: "yyyy-mm-dd",
            }).on('changeDate', function () {
                let indicator_id = $('#indicator_list_drop').find(":selected").attr("value");
                $('.datepicker-dropdown').css('display', 'none');
                load_map(indicator_id);
            });

            $("#user_section_date_div").datepicker({
                format: "yyyy-mm-dd",
            });

            // $('#option1').trigger('click');

            let current_date = '@php echo $date @endphp';
            let previous_date = '@php echo date("Y-m-d", strtotime("-12 months",strtotime($date))) @endphp';

            data_filtering(previous_date, current_date);

            let indicator_id = $('#indicator_list_drop').find(":selected").attr("value");
            load_map(indicator_id);

            var start = moment().subtract(29, 'days');
            var end = moment();

            var $picker = $('#reportrange').daterangepicker({
                opens: 'center',
                drops: 'up',
                linkedCalendars: false,
                autoUpdateInput: false,
                showCustomRangeLabel: false,
                startDate: start,
                endDate: end
            }, cb);

            function cb(start, end) {
                data_filtering(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'), 'likeWise');
            }

            $picker.on('show.daterangepicker', function (ev, picker) {
                if (picker.element.offset().top - $(window).scrollTop() + picker.container.outerHeight() > $(window).height()) {
                    picker.drops = 'up';
                } else {
                    picker.drops = 'down';
                }
                picker.move();
            });

            $("#indicator_list_drop").change(function () {
                let indicator_id = $('#indicator_list_drop').find(":selected").attr("value");
                load_map(indicator_id);
            });

            let geo_type = $('#indicator_list_drop').find(":selected").attr("data-val");
            if (geo_type == 0) {
                $("#divisions_data").val('').trigger('change');
                $("#districts_data").empty().append('<option>জেলা</option>');
                $("#upazilas_data").empty().append('<option>উপজেলা</option>');
                $('.geo_class').attr('disabled', 'disabled')
            }

            $('#divisions_data').on('change', function () {
                let geo_type = $('#indicator_list_drop').find(":selected").attr("data-val");
                let division_bbs_code = $('#divisions_data').val();
                let indicator_id = $('#indicator_list_drop').val();

                if (division_bbs_code != '') {
                    $.ajax({
                        type: "get",
                        url: "{{ url('ajax/get-districts-for-division') }}",
                        data: {
                            'bbs_code': division_bbs_code
                        }
                    }).done(function (resp) {
                        if (geo_type == '2' || geo_type == '3') {
                            var option = '<option>জেলা</option>';
                            $.each(resp, function (key, row) {
                                option += '<option value="' + key + '">' + row + '</option>'
                            });
                            $("#districts_data").empty();
                            $("#upazilas_data").empty().append('<option>উপজেলা</option>');
                            $("#districts_data").append(option);
                        } else {
                            $('#districts_data').select2("enable", false);
                            $('#upazilas_data').select2("enable", false)
                        }

                        load_map(indicator_id)
                    })
                } else {
                    load_map(indicator_id);

                    $('#districts_data').empty().select2({
                        'enable': false,
                        'placeholder': "জেলা"
                    })
                    $("#upazilas_data").empty().select2({
                        'enable': false,
                        'placeholder': "উপজেলা"
                    })
                }
            });

            $('#districts_data').on('change', function () {
                let district_bbs_code = $('#districts_data').val();
                let indicator_id = $('#indicator_list_drop').val();
                let geo_type = $('#indicator_list_drop').find(":selected").attr("data-val");

                if (district_bbs_code != 'জেলা') {
                    $.ajax({
                        type: "get",
                        url: "{{ url('ajax/get-upazilas-for-district') }}",
                        data: {
                            'bbs_code': district_bbs_code
                        }
                    }).done(function (resp) {
                        if (geo_type == '3') {
                            var option = '<option>উপজেলা</option>';
                            $.each(resp, function (key, row) {
                                option += '<option value="' + key + '">' + row + '</option>'
                            });
                            $("#upazilas_data").empty();
                            $("#upazilas_data").append(option);
                        } else {
                            $('#upazilas_data').select2("enable", false)
                        }

                        load_map(indicator_id)
                    })
                } else {
                    $("#divisions_data").trigger('change');
                    $('#districts_data').empty().select2({
                        'enable': false,
                        'placeholder': "জেলা"
                    })
                }
            });

            $('#upazilas_data').on('change', function () {
                let upazila_bbs_code = $('#upazilas_data').val();
                let indicator_id = $('#indicator_list_drop').val();

                if (upazila_bbs_code != 'উপজেলা') {
                    load_map(indicator_id)
                } else {
                    $("#districts_data").trigger('change');
                    $("#upazilas_data").empty().select2({
                        'enable': false,
                        'placeholder': "উপজেলা"
                    })
                }
            });

                    @if($has_disaggregation)
            let indicator_user_category = '{{$disag_indicator_lists[0]->indicator_user_category}}';
            make_disaggrigation(indicator_user_category);
            @endif
        });

        function specificValue(){
            let specFlag = document.getElementById('specific-value').value;
            if(specFlag == "true"){
                document.getElementById('specific-value').value = false;
                document.getElementById('specific-value').innerHTML = '<i class="fa fa-toggle-off"></i>'
            } else {
                document.getElementById('specific-value').value = true;
                document.getElementById('specific-value').innerHTML = '<i class="fa fa-toggle-on"></i>'
            }

            const running_from_date = $("#running_from_date").val();
            const running_to_date = $("#running_to_date").val();

            data_filtering(running_from_date, running_to_date);
        }

        function data_filtering(from_date, to_date, type = '') {
            const running_indicator = $("#running_indicator").val();
            $(".indicator-name").removeClass('indi-hover clicked');
            get_line_chart_data(running_indicator, from_date, to_date, type)
        }

        function load_map(indicator_id) {
            let geo_type = $('#indicator_list_drop').find(":selected").attr("data-val");
            //map load
            if (geo_type == 0) {
                $("#divisions_data").select2('destroy').val('').select2();
                $("#districts_data").empty().append('<option>জেলা</option>');
                $("#upazilas_data").empty().append('<option>উপজেলা</option>');
                $('.geo_class').attr('disabled', 'disabled');
                $("#load_map_div").html('').hide();
            } else {
                $('.geo_class').removeAttr('disabled');
                map_table(indicator_id);
            }
        }

        function map_table(indicator_id) {
            let project_id = '{{$project->id}}';
            const [division_bbs_code, district_bbs_code, upazila_bbs_code, geo_name] = getSelectedGeoAndBbsCode();

            let map_date = $('#map_date').val();

            $.ajax({
                url: "{{ url('ajax/get-district-wise-indicator-data/') }}",
                data: {
                    "project_id": project_id,
                    "map_date": map_date,
                    "indicator_id": indicator_id,
                    "geo_name": geo_name,
                    "division_bbs_code": division_bbs_code,
                    "district_bbs_code": district_bbs_code,
                    "upazila_bbs_code": upazila_bbs_code,
                    "view": 'team_lead'
                },
                success: function (response) {
                    //Do Something
                    $("#geo_down").show();
                    $("#load_map_div").show();
                    $("#load_map_div").html(response);
                    if ($('#indicator_list_drop').find(":selected").attr("data-val") == 0) {
                        $('.geo_class').attr('disabled', 'disabled')
                    } else {
                        $('.geo_class').removeAttr('disabled')
                    }
                    // $("#divisions_data").val('').trigger('change')
                },
                error: function (xhr) {
                    $("#load_map_div").hide();
                    $("#geo_down").hide();
                    //Do Something to handle error
                }
            });
        }

        function map_drill_down(geo_id, geo_name, indicator_id) {
            let project_id = '{{$project->id}}';
            let type = 3;
            let temp_geo_name = '<i class="fa fa-map-o" aria-hidden="true"></i> ' + geo_name;
            let map_date = $('#map_date').val()
            $("#drill_down_map_data_name").html(temp_geo_name);

            //call ajax for load data
            $.ajax({
                url: "{{ url('ajax/get-map-drill-down/') }}",
                data: {
                    "project_id": project_id,
                    "type": type,
                    "geo_id": geo_id,
                    "indicator_id": indicator_id,
                    "map_date": map_date
                },
                success: function (response) {
                    $("#drill_down_map_data").html(response);
                },
                error: function (xhr) {
                    $("#drill_down_map_data").html('No Data Found');
                }
            });

            let size = 'Extera';
            let modalElem = $('#mapModal');

            if (size == "mini") {
                $('#mapModal').modal('show')
            } else {
                $('#mapModal').modal('show')
                if (size == "default") {
                    modalElem.children('.modal-dialog').removeClass('modal-lg');
                } else if (size == "full") {
                    modalElem.children('.modal-dialog').addClass('modal-lg');
                }
            }
        }

        function getSelectedGeoAndBbsCode() {
            let division_bbs_code;
            let district_bbs_code;
            let upazila_bbs_code;
            let geo_name;

            let division_value = $('#divisions_data').val();
            let district_value = $('#districts_data').val();
            let upazila_value = $('#upazilas_data').val();

            if (district_value == 'জেলা') {
                district_value = undefined;
            }

            if (upazila_value == 'উপজেলা') {
                upazila_value = undefined;
            }

            if (division_value) {
                division_bbs_code = division_value;
                geo_name = 'division'
            }

            if (division_value && district_value) {
                district_bbs_code = district_value;
                geo_name = 'district'
            }

            if (division_value && district_value && upazila_value) {
                upazila_bbs_code = upazila_value;
                geo_name = 'upazila'
            }

            return [division_bbs_code, district_bbs_code, upazila_bbs_code, geo_name];
        }
    </script>

    <script>
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

        const label = "অর্জন (%)";
        const color = Chart.helpers.color;
        const config = {
            type: 'radar',
            data: {
                labels: @json(array_keys($chart_data)),
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
                maintainAspectRatio: false,

                tooltips: {
                    enabled: false,
                    callbacks: {
                        label: function (tooltipItem, data) {
                            const datasetLabel = data.datasets[tooltipItem.datasetIndex].label || '';
                            //This will be the tooltip.body
                            return datasetLabel + ': ' + tooltipItem.yLabel;
                        }
                    },
                    custom: function (tooltip) {
                        // Tooltip Element
                        let tooltipEl = document.getElementById('chartjs-tooltip');
                        if (!tooltipEl) {
                            tooltipEl = document.createElement('div');
                            tooltipEl.id = 'chartjs-tooltip';
                            tooltipEl.innerHTML = "<table></table>";
                            document.body.appendChild(tooltipEl);
                        }
                        // Hide if no tooltip
                        if (tooltip.opacity === 0) {
                            tooltipEl.style.opacity = 0;
                            return;
                        }
                        // Set caret Position
                        tooltipEl.classList.remove('above', 'below', 'no-transform');
                        if (tooltip.yAlign) {
                            tooltipEl.classList.add(tooltip.yAlign);
                        } else {
                            tooltipEl.classList.add('no-transform');
                        }

                        function getBody(bodyItem) {
                            return bodyItem.lines;
                        }

                        // Set Text
                        if (tooltip.body) {
                            const titleLines = tooltip.title || [];
                            const bodyLines = tooltip.body.map(getBody);
                            let innerHtml = '<thead>';
                            titleLines.forEach(function (title) {
                                innerHtml += '<tr>' +
                                    '<th style="text-align: left;' +
                                    ' color: white;' +
                                    ' font-family: Arial;' +
                                    ' font-size: 15px;">' + title + '</th>' +
                                    '</tr>';
                            });
                            innerHtml += '</thead><tbody>';
                            bodyLines.forEach(function (body, i) {
                                const colors = tooltip.labelColors[i];
                                let style = 'background:' + colors.backgroundColor;
                                style += '; border: 1px solid white !important';
                                const span = '<span class="chartjs-tooltip-key" style="' + style + '"></span>';
                                innerHtml += '<tr>' +
                                    '<td style="text-align: left; ' +
                                    'color: white;' +
                                    'font-family: Arial;' +
                                    'font-size: 12px">' + span + body + '</td>' +
                                    '</tr>';
                            });
                            innerHtml += '</tbody>';
                            const tableRoot = tooltipEl.querySelector('table');
                            tableRoot.innerHTML = innerHtml;
                        }
                        const position = this._chart.canvas.getBoundingClientRect();
                        // Display, position, and set styles for font
                        tooltipEl.style.opacity = 1;
                        tooltipEl.style.left = position.left + tooltip.caretX + 'px';
                        tooltipEl.style.top = position.top + tooltip.caretY + 'px';
                        tooltipEl.style.fontFamily = tooltip._fontFamily;
                        tooltipEl.style.fontSize = tooltip.fontSize;
                        tooltipEl.style.fontStyle = tooltip._fontStyle;
                        tooltipEl.style.padding = tooltip.yPadding + 'px ' + tooltip.xPadding + 'px';
                    }
                }
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
        });
    </script>

    <script>
        //Line chart data get multiple and single
        function indicator_wise_line_data(running_indicator) {
            const selected = $("#indicator-id-" + running_indicator).hasClass('clicked');
            if (!selected) {
                const running_from_date = $("#running_from_date").val();
                const running_to_date = $("#running_to_date").val();

                const type = $('.active input[name=options]').attr('data-val');

                get_line_chart_data(running_indicator, running_from_date, running_to_date, type)
            } else {
                $("#indicator-id-" + running_indicator).removeClass('indi-hover clicked');
                let ind_name = $("#indicator-id-" + running_indicator).attr('data-value');
                remove_line_from_chart(ind_name);
            }
        }

        function deselectAllLineData(indicator_lists){
            indicator_lists.map((item)=>{
                $("#indicator-id-" + item.id).removeClass('indi-hover clicked');
                let ind_name = $("#indicator-id-" + item.id).attr('data-value');
                remove_line_from_chart(ind_name);
            });
        }


        function get_line_chart_data(indicator_id, from_date, to_date, type = '') {
            $("#running_indicator").val(indicator_id);
            $("#running_from_date").val(from_date);
            $("#running_to_date").val(to_date);
            let specFlag = document.getElementById('specific-value').value;

            const point_str = [];
            const date_str = [];
            $.ajax({
                url: "{{url('ajax/get-graph-data-for-service-page/')}}",
                data: {
                    "indicator_id": indicator_id,
                    "from_date": from_date,
                    "to_date": to_date,
                    "type": type,
                    "specFlag": specFlag
                },
                success: function (response) {
                    const parsed = JSON.parse(response);

                    let loop_data = parsed['point_data'];
                    loop_data.forEach(function (element) {
                        point_str.push(element.data);
                        date_str.push(element.date);
                    });

                    if ($(".indicator-name").hasClass('indi-hover clicked')) {
                        make_multiple_line_chart(point_str, parsed['indicator_name'])
                    } else {
                        make_line_chart(point_str, date_str, parsed['indicator_name'])
                    }

                    $("#indicator-id-" + indicator_id).addClass('indi-hover clicked');
                },
                error: function (xhr) {
                }
            });
        }

        let lineChart = '';

        function make_line_chart(point_str, date_str, ind_name) {
            const config = {
                type: 'line',
                data: {
                    labels: date_str,
                    datasets: [{
                        label: ind_name,
                        backgroundColor: 'rgba(34, 167, 240, 1)',
                        borderColor: 'rgba(34, 167, 240, 1)',
                        fill: false,
                        data: point_str

                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            grid: {
                                color: 'rgba(128,151,177, 0.3)',
                                borderDash: [3, 3],
                                drawTicks: false,
                                borderColor: '#424b5f',
                            },
                            // ticks: {
                            //     align: "center",
                            //     padding: 10,
                            // },
                        },
                        x: {
                            grid: {
                                color: 'rgba(128,151,177, 0.3)',
                                borderDash: [3, 5],
                                drawTicks: false,
                                borderColor: '#424b5f'
                            },
                            // ticks: {
                            //     align: "center",
                            //     padding: 10,
                            // }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true
                        },
                        tooltip: {
                            usePointStyle: true,
                        },
                        zoom: {
                            zoom: {
                                wheel: {
                                    enabled: true,
                                },
                                pinch: {
                                    enabled: true
                                },
                                mode: 'x',
                            },
                            pan: {
                                enabled: true,
                                mode: 'x',
                            },
                            limits: {
                                x: {
                                    minRange: 3
                                },
                            },
                        }
                    }
                }
            };

            if (lineChart) lineChart.destroy(); //destroy prev chart instance
            const ctx2 = document.getElementById('line-canvas').getContext('2d');

            lineChart = new Chart(ctx2, config);
            // setTimeout(() => {
            //     lineChart.zoom(3);
            // lineChart.pan({
            //     x: Number.MAX_SAFE_INTEGER
            // }, undefined, 'default');
            // }, 10)
        }

        function make_multiple_line_chart(point_str, ind_name) {
            const color = '#' + (0x1000000 + Math.random() * 0xffffff).toString(16).substr(1, 6);
            const newDataset = {
                label: ind_name,
                backgroundColor: color,
                borderColor: color,
                data: point_str,
                fill: false,
            };
            lineChart.data.datasets.push(newDataset);
            lineChart.update();
        }

        function remove_line_from_chart(label) {
            let dataset = lineChart.data.datasets;
            $.each(dataset, function (key, value) {
                if (value) {
                    if (value.label.toString() == label.toString()) {
                        dataset.splice(key, 1);
                    }
                }
            });
            lineChart.update();
        }

        $('#exportCompareLineChart').click(function (event) {
            /* save as image */
            let link = document.createElement('a');
            link.href = lineChart.toBase64Image();
            link.download = 'lineChart.png';
            link.click();
        });
    </script>

    <script>
        $('.at-aglance-button').click(function () {
            get_report_data()
        });

        function get_report_data(date=''){
            project_id = '{{$project->id}}';
            var size = $('input[name=slideup_toggler]:checked').val();
            var modalElem = $('#ataGlanceSlideUp');
            if (size == "mini") {
                $('#ataGlanceSlideUpUpLarge').modal('show')
            } else {
                $('#ataGlanceSlideUp').modal('show');
                if (size == "default") {
                    modalElem.children('.modal-dialog').removeClass('modal-lg');
                } else if (size == "full") {
                    modalElem.children('.modal-dialog').addClass('modal-lg');
                }
            }
            $.ajax({
                type: "get",
                url: "{{ url('ajax/get-project-data-report') }}",
                data: {
                    'project_id': project_id,
                    'date': date
                }
            }).done(function (resp) {
                $("#at-a-glance").html(resp);

            });
        }

        function printContent(el) {
            var divContents = document.getElementById('ataGlanceSlideUp').innerHTML;
            var a = window.open('', '', 'height=1200, width=1200');
            a.document.write('<html>');
            a.document.write('<body >' + divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }

        function excelout() {
            event.preventDefault();
            $("#at-glance").table2excel({
                exclude: ".noExl",
                name: "Excel Document Name"
            });
        }
    </script>
@endpush
