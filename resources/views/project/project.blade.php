@extends('layout.frontend')
@push('top_css')
    <link class="stylesheet" href="{{ custom_asset('assets/css/indicator.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@push('top_js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-zoom/1.1.1/chartjs-plugin-zoom.min.js"></script>
@endpush

@section('content')
    <input type="hidden" id="service_id" value="{{$service_details->id}}">
    <div class="container-fluid p-t-5 p-l-25 p-b-0 p-r-25">

        <div class="breadcrumb p-t-0 p-b-5 p-l-0 p-r-0">
            <div class="row">
                <div class="col-md-3" style="margin-top: -35px">
                    <img src="{{custom_asset('assets/img/projects/' . $service_details->logo)}}" class="img-fluid"
                         alt="" style="max-height: 80px;">
                    <span class="title-ds" style="font-size: 20px !important;">{{ $service_details->bangla_name }}</span>
                </div>

                <div class="top-tx text-center bg-whight col-md-7">
                    <span class="to-date"> {{english_to_bangla(date('d F,Y',strtotime(date('Y-m-d'))))}}</span>
                    @if($last_update_data_count['last_date'])
                        <a class="ani" href="{{url('monitoring')}}">
                            সর্বশেষ {{ english_to_bangla(date('d F, Y',strtotime($date))) }}
                            তারিখে ডাটা হালনাগাদ করা হয়েছে।
                            সর্বমোট {{ english_to_bangla($last_update_data_count['total_indicator']) }} টি সূচক আছে,
                            ডাটা এসেছে {{ english_to_bangla($last_update_data_count['available']) }} টির </a>
                    @else
                        এখন পর্যন্ত কোনো ডাটা হালনাগাদ করা হয় নাই
                    @endif
                </div>
                <div class="col-md-2">
                    <div class="m-l-5 btn-group dropdown dropdown-default"
                         style="float:right;box-shadow:1px 1px #d2d2d2;">
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
                                        <div class="modal-body" id="at-a-glance2">
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
        </div>

        <div class="row" id="fixedElement1">
            <div class="col-md-12 text-center">

                <div class="filter-input card">
                    <form class="form-inline">
                        <div class="form-group">
                            <label class="text-black" for="indicator_list_drop">সূচক</label>
                            <select class="form-control" id="indicator_list_drop">
                                @foreach($indicator_lists as $indicator_list)
                                    <option data-val="{{$indicator_list->geo_type}}" value="{{$indicator_list->id}}"
                                            @php $selected_indicator == $indicator_list->id ? ' selected="selected"' : ''; @endphp>
                                        {{($indicator_list->bangla_name)?$indicator_list->bangla_name:$indicator_list->bangla_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>

                <div class="filter-input card">
                    <div class="form-group mb-0">
                        {!! Form::select('division_filter', $divisions_data, '', ['placeholder'=>'বিভাগ','class' => 'form-control full-width geo_class','data-init-plugin'=>'select2', 'id' => 'divisions_data'])!!}
                    </div>

                    <div class="form-group mb-0">
                        {!! Form::select('district_filter', [], '', ['placeholder'=>'জেলা','class' => 'form-control full-width geo_class','data-init-plugin'=>'select2', 'id' => 'districts_data'])!!}
                    </div>

                    <div class="form-group mb-0">
                        {!! Form::select('upazila_filter', [], '', ['placeholder'=>'উপজেলা','class' => 'form-control full-width geo_class','data-init-plugin'=>'select2', 'id' => 'upazilas_data'])!!}
                    </div>
                </div>

                <div class="filter-input filter-buttons card">
                    <div class="btn-group btn-group-md flex-wrap" data-toggle="buttons">
                        <label class="btn btn-default"
                               onclick="onclick_date('{{$date_array['all']}}','{{$date_array['current_date']}}')">
                            <input type="radio" name="options" id="option1"
                                   value="{{$date_array['all']}},{{$date_array['current_date']}}" checked="">সামগ্রিক
                        </label>
                        <label class="btn btn-default"
                               onclick="onclick_date('{{$date_array['daily']}}','{{$date_array['current_date']}}','daily')">
                            <input type="radio" name="options" id="option2" data-val="daily"
                                   value="{{$date_array['daily']}},{{$date_array['current_date']}}">দৈনিক
                        </label>
                        <label class="btn btn-default"
                               onclick="onclick_date('{{$date_array['3month']}}','{{$date_array['current_date']}}')">
                            <input type="radio" name="options" id="option3"
                                   value="{{$date_array['3month']}},{{$date_array['current_date']}}">৩ মাসের
                        </label>
                        <label class="btn btn-default"
                               onclick="onclick_date('{{$date_array['6month']}}','{{$date_array['current_date']}}')">
                            <input type="radio" name="options" id="option4"
                                   value="{{$date_array['6month']}},{{$date_array['current_date']}}">৬ মাসের
                        </label>
                        <label class="btn btn-default"
                               onclick="onclick_date('{{$date_array['9month']}}','{{$date_array['current_date']}}')">
                            <input type="radio" name="options" id="option5"
                                   value="{{$date_array['9month']}},{{$date_array['current_date']}}">৯ মাসের
                        </label>
                        <label class="btn btn-default active"
                               onclick="onclick_date('{{$date_array['12month']}}','{{$date_array['current_date']}}')">
                            <input type="radio" name="options" id="option6"
                                   value="{{$date_array['12month']}},{{$date_array['current_date']}}">১২ মাসের
                        </label>
                        <label class="btn btn-default">
                            <input type="radio" name="options" id="reportrange" data-val="likeWise">পছন্দ মত
                        </label>
                        <button id="specific-value" value="false" onclick="specificValue();"
                                style="border:0;
                                background: #fff;
                                font-size: 22px;
                                color: #912c8a;
                                cursor: pointer;">
                            <i class="fa fa-toggle-off"></i>
                        </button>
                        <label class="mb-1" style="margin-top: 7px; padding-right: 15px">Specific</label>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-4" id="left-bar">
                <div class="row left-card-area">
                    <input type="hidden" id="first_indicator" value="{{$selected_indicator}}">
                    <input type="hidden" id="first_chart_type"
                           value="{{($indicator_lists[0]->default_chart) ? $chart_list[$indicator_lists[0]->default_chart] : $chart_list[3]}}">

                    @php $c=1; $i=1; $hichart_scripts = []; @endphp
                    @foreach($indicator_lists as $key=>$indicator_list)
                        @php $previous_date=date("Y-m-d", strtotime("-12 months",strtotime($date))) @endphp

                        <div class="col-xs-12 col-sm-6 col-md-6 m-b-10 {{ ($c % 2) == 0 ? 'pl-1' : 'pr-1' }}">
                            <a href="" class="s-box"
                               {{--                               @if($indicator_status[$indicator_list->id]['value'] != "")--}}
                               onclick="different_charts('{{$indicator_list->id}}',
                                       '{{($indicator_list->default_chart) ? $chart_list[$indicator_list->default_chart] : $chart_list[3]}}',
                                       '');"
                                    {{--                                @endif--}}
                            >
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="head">
                                            <span class="tip" data-toggle="tooltip"
                                                  data-original-title="{{$indicator_list->bangla_name}}"
                                                  data-animation="false">{{ $indicator_list->bangla_name }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="border-right-1 po-scr1 col-xs-12 col-sm-8 col-md-8 col-lg-7">
                                        @if($indicator_status[$indicator_list->id]['value'] != "")
                                            <span class="p-t-5 p-b-5">
											<b>{{english_to_bangla(number_conversion($indicator_status[$indicator_list->id]['value']))}}</b> {{$indicator_list->unit}}
												</span>
                                        @else
                                            <span class="p-t-5 p-b-5">
											<b>{{english_to_bangla(number_conversion(0))}}</b> {{$indicator_list->unit}}
												</span>
                                        @endif

                                        @php
                                            $target_topbar_value=english_to_bangla(bdtFormat($indicator_status[$indicator_list->id]['target_value']));
                                            $target_top_bar_achive=get_percentage_to_hundrade($indicator_status[$indicator_list->id]['value'],$indicator_status[$indicator_list->id]['target_value']);
                                        @endphp
                                    </div>

                                    <div class="po-scr2 p-l-0 col-xs-12 col-sm-4 col-md-4 col-lg-5">
                                        @if($indicator_status[$indicator_list->id]['value'] != "" && $indicator_status[$indicator_list->id]['target_value'] != "")

                                            @php $chart_id = 'ind_chart_' . $indicator_list->id;  @endphp
                                            <figure class="highcharts-figure clearfix m-0">
                                                <div id="{{ $chart_id }}" class="chart-container"></div>
                                            </figure>

                                            @php
                                                $hichart_scripts[] = "var gaugeOptions = {
                                                chart: {
                                                    type: 'solidgauge'
                                                },

                                                title: null,

                                                pane: {
                                                    center: ['50%', '85%'],
                                                    size: '100%',
                                                    startAngle: -90,
                                                    endAngle: 90,
                                                    background: {
                                                        backgroundColor:
                                                            Highcharts.defaultOptions.legend.backgroundColor || '#EEE',
                                                        innerRadius: '60%',
                                                        outerRadius: '100%',
                                                        shape: 'arc'
                                                    }
                                                },

                                                exporting: {
                                                    enabled: false
                                                },

                                                tooltip: {
                                                    enabled: false
                                                },

                                                // the value axis
                                                yAxis: {
                                                    stops: [
                                                        [0.1, '#55BF3B'], // green
                                                        [0.5, '#55BF3B'], // green
                                                        [0.9, '#55BF3B'] // green
                                                    ],
                                                    lineWidth: 0,
                                                    tickWidth: 0,
                                                    minorTickInterval: null,
                                                    tickAmount: 2,
                                                    title: {
                                                        y: -60
                                                    },
                                                    labels: {
                                                        y: 10
                                                    }
                                                },

                                                plotOptions: {
                                                    solidgauge: {
                                                        dataLabels: {
                                                            y: 0,
                                                            borderWidth: 0,
                                                            useHTML: true
                                                        }
                                                    }
                                                }
                                            };
                                            var chartSpeed = Highcharts.chart('" . $chart_id . "', Highcharts.merge(gaugeOptions, {
                                                yAxis: {
                                                    min: 0,
                                                    max: 100
                                                },

                                                credits: {
                                                    enabled: false
                                                },

                                                series: [{
                                                    data: [" . $target_top_bar_achive . "],
                                                    dataLabels: {
                                                        format:
                                                            '<div style=\"text-align:center\">' +
                                                            '<span style=\"font-size:10px\">{y} %</span><br/>' +
                                                            '</div>'
                                                    }
                                                }]

                                            }));";
                                            @endphp
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="left-card-footer">
                                            @if($indicator_status[$indicator_list->id]['value'] != "" && $indicator_status[$indicator_list->id]['target_value'] != "")
                                                <i class="sort-tx"> {{ __('lavel.target_achive', ['target_value' => $target_topbar_value,'target_achive_parcent'=>english_to_bangla($target_top_bar_achive)]) }}</i>
                                            @else
                                                <i class="sort-tx text-danger">ডাটা পাওয়া যায় নাই।</i>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        @php
                            $i++; $c++;
                            if($i == 4){ $i=1; }
                        @endphp
                    @endforeach
                </div>
            </div>

            <div class="col-md-8" id="right-bar">
                <div class="row">
                    <div class="col-sm-12">
                        @include('project.chart_portion')
                    </div>
                </div>
                <div class="row">
                    {{--                    <div class="col-md-6"></div>--}}
                    <div class="col-md-12">
                        @include('project.office-list')
                    </div>
                </div>
            </div>

        </div>

        <input type="hidden" id="progress_report" data-val>

        @include('project.indicator_progress')

        @include('project.compare_portion')

        @if(!empty($service_data))
            @include('project.service')
        @endif

        @if($has_disaggrigation)
            @include('project.disagrrigation')
        @endif

        @if($has_geo_data)
            <div class="card bg-white" id="map_div"></div>
        @endif
    </div>

    <!-- Modal Map-->
    <div class="map-dril modal fill-in" id="mapModal" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <i class="pg-close" style="font-size:25px;"></i>
        </button>
        <div class="col-md-10 offset-1">
            <div class="map-dril-hed modal-header txt-24 text-primary mt-4" id="drill_down_map_data_name"></div>
            <div class="dril-map-body modal-body" id="drill_down_map_data"></div>
            <div class="modal-footer"></div>
        </div>
        <!-- /.modal-content -->
        <!-- /.modal-dialog -->
    </div>
    <!-- Modal -->
@endsection

@push('scripts')
    @if (!empty($hichart_scripts))
        @foreach ($hichart_scripts as $script)
            <script type="text/javascript">
                $(function () {
                    <?php echo $script; ?>
                });
            </script>
        @endforeach
    @endif

    <!--end map-->
    <script>
        function map_table(indicator_id, map_date = '') {
            const project_id = $("#service_id").val();
            const [division_bbs_code, district_bbs_code, upazila_bbs_code, geo_name] = getSelectedGeoAndBbsCode();

            $.ajax({
                url: "{{ url('ajax/get-district-wise-indicator-data/') }}",
                data: {
                    "project_id": project_id,
                    "map_date": map_date,
                    "indicator_id": indicator_id,
                    "geo_name": geo_name,
                    "division_bbs_code": division_bbs_code,
                    "district_bbs_code": district_bbs_code,
                    "upazila_bbs_code": upazila_bbs_code
                },
                success: function (response) {
                    $("#geo_down").show();
                    $("#map_div").show();
                    $("#map_div").html(response);

                    if ($('#indicator_list_drop').find(":selected").attr("data-val") == 0) {
                        $('.geo_class').attr('disabled', 'disabled')
                    } else {
                        $('.geo_class').removeAttr('disabled')
                    }
                },
                error: function (xhr) {
                    $("#map_div").hide();
                    $("#geo_down").hide();
                }
            });
        }
    </script>

    <script>
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

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>

    <script>
        $(document).ready(function () {
            let indicator_id = $('#first_indicator').val();
            let chart_type = $('#first_chart_type').val();
            $('#indicator_list_drop').val(indicator_id);
            let current_date = '@php echo $date @endphp';
            let previos_date = '@php echo date("Y-m-d", strtotime("-12 months",strtotime($date))) @endphp';
            $("#running_from_date").val(previos_date);
            $("#running_to_date").val(current_date);

            let indicator_user_category = '';
            @if($has_disaggrigation)
                indicator_user_category = '{{$disag_indicator_lists[0]->indicator_user_category}}';
            @endif

            different_charts(indicator_id, chart_type, previos_date, current_date, indicator_user_category);

            //service
                    {{--            @if(!empty($service_data))--}}
                    {{--            service_cluster_time_line();--}}
                    {{--                    @endif--}}

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
                let running_graph = $("#running_graph").val();
                let indicator_user_category = $('.active input[name=user_section]').val();

                let dates = $('.active input[name=options]').val();
                dates = dates.toString();
                const date = dates.split(",", 2);

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
                            $('#districts_data').select2("enable", false)
                            $('#upazilas_data').select2("enable", false)
                        }

                        different_charts(indicator_id, running_graph, date[0], date[1], indicator_user_category)
                    })
                } else {
                    different_charts(indicator_id, running_graph, date[0], date[1], indicator_user_category);

                    $('#districts_data').empty().select2({
                        'enable': false,
                        'placeholder': "জেলা"
                    });
                    $("#upazilas_data").empty().select2({
                        'enable': false,
                        'placeholder': "উপজেলা"
                    })
                }
            });

            $('#districts_data').on('change', function () {
                // let division_bbs_code = $('#divisions_data').val();
                let district_bbs_code = $('#districts_data').val();
                let indicator_id = $('#indicator_list_drop').val();
                let geo_type = $('#indicator_list_drop').find(":selected").attr("data-val");
                let running_graph = $("#running_graph").val();
                let indicator_user_category = $('.active input[name=user_section]').val();

                let dates = $('.active input[name=options]').val();
                dates = dates.toString();
                const date = dates.split(",", 2);

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

                        different_charts(indicator_id, running_graph, date[0], date[1], indicator_user_category)
                    })
                } else {
                    $("#divisions_data").trigger('change');
                    // $("#districts_data").empty().append('<option>জেলা</option>');
                    $('#districts_data').empty().select2({
                        'enable': false,
                        'placeholder': "জেলা"
                    })
                }
            });

            $('#upazilas_data').on('change', function () {
                // let division_bbs_code = $('#divisions_data').val();
                // let district_bbs_code = $('#districts_data').val();
                let upazila_bbs_code = $('#upazilas_data').val();
                let indicator_id = $('#indicator_list_drop').val();
                let running_graph = $("#running_graph").val();
                let indicator_user_category = $('.active input[name=user_section]').val();

                let dates = $('.active input[name=options]').val();
                dates = dates.toString();
                const date = dates.split(",", 2);

                if (upazila_bbs_code != 'উপজেলা') {
                    different_charts(indicator_id, running_graph, date[0], date[1], indicator_user_category)
                } else {
                    $("#districts_data").trigger('change');
                    // $("#upazilas_data").empty().append('<option>উপজেলা</option>');
                    $("#upazilas_data").empty().select2({
                        'enable': false,
                        'placeholder': "উপজেলা"
                    })
                }
            });

        });
    </script>

    <script>
        function different_charts(indicator_id, chart_type, from_date = '', to_date = '', indicator_user_category = '', type = '') {

            if (from_date == '' && to_date == '') {
                let options = $('.active input[name=options]');
                type = options.attr('data-val');
                let dates = options.val();
                if(type == 'likeWise'){
                    dates = $("#chart_date_val_on_click_calender").val();
                }
                dates = dates.toString();
                let date = dates.split(",", 2);
                from_date = date[0];
                to_date = date[1];
            }

            chart_change(indicator_id, chart_type, from_date, to_date, type);

            $(".indicator-name").removeClass('indi-hover clicked');
            get_line_chart_data(indicator_id, from_date, to_date, type);

            //map load
            @if($has_geo_data)
            map_table(indicator_id, to_date);
            @endif

            //disaggregation data
            @if($has_disaggrigation)
            if(indicator_user_category == ''){
                indicator_user_category = $('.active input[name=user_section]').val();
            }
            make_disaggrigation(indicator_user_category, to_date);
                    @endif

            let geo_type = $('#indicator_list_drop').find(":selected").attr("data-val");
            if (geo_type == 0) {
                $("#divisions_data").select2('destroy').val('').select2();
                $("#districts_data").empty().append('<option>জেলা</option>');
                $("#upazilas_data").empty().append('<option>উপজেলা</option>');
                $('.geo_class').attr('disabled', 'disabled')
            } else {
                $('.geo_class').removeAttr('disabled')
            }
        }
    </script>

    <script>
        function printContent(el) {
            var divContents = document.getElementById('at-a-glance').innerHTML;
            var a = window.open('', '', 'height=1200, width=1200');
            a.document.write('<html>');
            a.document.write('<body >' + divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
        function printContentProgress(el) {
            var divContents = document.getElementById('at-a-glance2').innerHTML;
            var a = window.open('', '', 'height=1200, width=1200');
            a.document.write('<html>');
            a.document.write('<body >' + divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }

        function excelout() {
            //$("#exportToExcel").click(function(e){
            event.preventDefault();
            $("#at-a-glance").table2excel({
                exclude: ".noExl",
                name: "Excel Document Name"
            });

            //});
        }

        function exceloutProgress() {
            //$("#exportToExcel").click(function(e){
            event.preventDefault();
            $("#at-a-glance2").table2excel({
                exclude: ".noExl",
                name: "Excel Document Name"
            });

            //});
        }
    </script>

    <!--map drill down-->
    <script>
        function map_drill_down(geo_id, geo_name, indicator_id) {
            let project_id = $("#service_id").val();
            let type = 3;
            let temp_geo_name = '<i class="fa fa-map-o" aria-hidden="true"></i> ' + geo_name;
            let map_date = $('#map_date').val();

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
                $('#mapModal').modal('show');
                if (size == "default") {
                    modalElem.children('.modal-dialog').removeClass('modal-lg');
                } else if (size == "full") {
                    modalElem.children('.modal-dialog').addClass('modal-lg');
                }
            }
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $.fn.datepicker.defaults.format = "yyyy-mm-dd";
            $('#reportDate').datepicker({
                minViewMode: "months"
            }).on('changeDate',function() {
                let date = $("#top_portion_date").val();
                $('.datepicker-dropdown').css('display','none');
                get_report_data(date)
            });
        });

        $('.at-aglance-button').click(function () {
            get_report_data()
        });

        function get_report_data(date=''){
            $("#at-a-glance").css("display","block");
            $("#at-a-glance2").css("display","none");
            project_id = $("#service_id").val();
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
    </script>

    <script type="text/javascript">
        function event_click(id) {
            //alert(a);
            $.ajax({
                url: "{{ url('ajax/get-event-details/') }}",
                data: {"id": id},
                success: function (response) {
                    var event_title = document.getElementById('event_title');
                    var event_date = document.getElementById('event_date');
                    var event_details = document.getElementById('event_details');
                    for (var i = 0; i < response.length; i++) {
                        var item = response[i];
                        event_title.innerHTML = item.title;
                        event_date.innerHTML = item.created_at;
                        event_details.innerHTML = item.details;
                        document.getElementById("task_details_card").style.display = "none";
                        document.getElementById("event_details_card").style.removeProperty('display');
                    }
                },
                error: function (xhr) {
                    alert("error");
                }
            });
        }
    </script>

    <script type="text/javascript">
        function task_click(taskId) {
            $.ajax({
                url: "{{ url('ajax/get-event-list/') }}",
                data: {"task_id": taskId},
                success: function (response) {
                    var event_list = document.getElementById('event_list');
                    var task_titleId = document.getElementById('task_title');
                    var task_dateId = document.getElementById('task_date');
                    var task_title;
                    var task_date;
                    var event = '';
                    for (var i = 0; i < response.length; i++) {
                        var item = response[i];
                        task_title = item.task_name;
                        task_date = item.date;
                        event +=
                            '<div class="task clearfix row" onclick="event_click(' + item.id + ')">' +
                            '<div class="task-list-title col-10 justify-content-between">' +
                            '<a href="#" class="text-master" id="">' + item.title + ' </a>' +

                            '</div>' +
                            '</div>';
                    }
                    event_details_card
                    document.getElementById("event_details_card").style.display = "none";
                    document.getElementById("task_details_card").style.removeProperty('display');
                    task_titleId.innerHTML = task_title;
                    task_dateId.innerHTML = task_date;
                    event_list.innerHTML = event;
                },
                error: function (xhr) {
                    alert("error");
                }
            });
        }
    </script>

    <script type="text/javascript">
        function back_click() {
            document.getElementById("event_details_card").style.display = "none";
            document.getElementById("task_details_card").style.removeProperty('display');
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function () {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                var dt = start.format('YYYY-m-d, ') + ' - ' + end.format('YYYY-m-d');
                $("#task_custom_date_pick").val(dt);
            }

            var $picker = $('#task_custom_date_pick').daterangepicker({
                opens: 'center',
                drops: 'up',
                linkedCalendars: false,
                autoUpdateInput: false,
                showCustomRangeLabel: false,
                //parentEl:'',
                startDate: start,
                endDate: end
            }, cb);

            cb(start, end);

            $picker.on('show.daterangepicker', function (ev, picker) {
                if (picker.element.offset().top - $(window).scrollTop() + picker.container.outerHeight() > $(window).height()) {
                    picker.drops = 'up';
                } else {
                    picker.drops = 'down';
                }
                picker.move();
            });
        });

        function expandSidebar(){
            let flag = document.getElementById('expand-button').value;
            if(flag == "true"){
                document.getElementById('left-bar').style.display = 'none';
                document.getElementById('right-bar').className = 'col-md-12';
                document.getElementById('expand-button').value = false;
                document.getElementById('expand-button').innerHTML = '<i class="fa fa-toggle-on"></i>'
            } else {
                document.getElementById('left-bar').style.display = 'block';
                document.getElementById('right-bar').className = 'col-md-8';
                document.getElementById('expand-button').value = true;
                document.getElementById('expand-button').innerHTML = '<i class="fa fa-toggle-off"></i>'
            }

            onLoadAction();
        }

        function specificValue(){
            let specFlag = document.getElementById('specific-value').value;
            if(specFlag == "true"){
                document.getElementById('specific-value').value = false;
                document.getElementById('specific-value').innerHTML = '<i class="fa fa-toggle-off"></i>'
            } else {
                document.getElementById('specific-value').value = true;
                document.getElementById('specific-value').innerHTML = '<i class="fa fa-toggle-on"></i>'
            }

            onLoadAction();
        }

        function onLoadAction(){
            let indicator_id = $('#indicator_list_drop').val();
            let from_date = '';
            let to_date = '';
            let options = $('.active input[name=options]');
            let type = options.attr('data-val');

            if(type == 'likeWise'){
                let likewise_option = $("#chart_date_val_on_click_calender").val();
                if(likewise_option.length > 0){
                    let dates = likewise_option.toString();
                    const date = dates.split(",", 2);
                    from_date = date[0];
                    to_date = date[1];
                }
            }

            different_charts(indicator_id,
                '{{($indicator_list->default_chart) ? $chart_list[$indicator_list->default_chart] : $chart_list[3]}}',
                from_date, to_date, '', type);
        }
    </script>
    <script>
        function get_progress_report(){
            $("#at-a-glance").css("display","none");
            $("#at-a-glance2").css("display","block");
            var indicatorName=$('#progress_report').attr('data-val');
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
            details=$('#progress_report').val();
            let unit="টি";
            let resp = `
                        <div class="col-8">
                            <h2>`+indicatorName+`</h2>
                        </div>
                        <div class="table-responsive ">
                            <table id="at-a-glance-progress" class="table col-md-12 table-borderless " cellspacing="0"
                                    width="100%">
                                `+ details +`
                            </table>
                        </div>
                        <div class="tbl-footer m-t-10" style="text-align:right;">
                            <a href="#" onclick="exceloutProgress()"><i class="fa fa-file-excel-o fa-2x" aria-hidden="true"></i></a>
                            <a href="#" onclick="printContentProgress('at-a-glance-progress')"><i class="fa fa-print fa-2x" aria-hidden="true"></i></a>
                        </div>`;
            $("#at-a-glance2").html(resp)
        }
    </script>
@endpush


