<div class="card-block bg-white">
    {{--    {{dd($date)}}--}}
    @if(!$for_map_page)
        <div class="p-r-0 border-bottom txt-16 m-b-20 p-b-10 text-primary">
            <div class="row">
                <div class="col-sm-12">
                    <h5 class="d-inline-block plum-title m-0">ম্যাপ</h5>

                    <div class="filter-input card m-0 ml-4">
                        <form class="form-inline">
                            <div class="form-group">
                                <label class="text-black" for="indicator_list_drop">তারিখ</label>
                                <div id="map_date_div" data-provide="datepicker" class="input-group date">
                                    <input type="text" id="map_date" name="map_date" class="form-control" style="height:30px !important;" value="{{$date}}"
                                           autocomplete="off" required><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    @else
        <div class="p-r-0 border-bottom txt-16 m-b-20 p-b-10 text-primary">{{  english_to_bangla(date('F, Y',strtotime($date))) }}

        </div>
    @endif

    <div class="row">
        <div class="col-md-8">
            @include('components.map_new')
        </div>
        <div class="col-md-4">

            {{-- <div class="m-b-20"></div> --}}
            <div class="no-padding auto-overflow widget-11-2-table" id="map_table_div_two" style="height: 900px;">
                <!-- -->
                {{-- <table id="table-sparkline" class="table-bordered table-striped" width="100%" >
                    <thead class="">
                    <tr>
                        <th class="padding-10" style="background:#912C8A; color:#fff;" title="{{ $indicator->bangla_name }}" colspan="2"><i class="fa fa-building-o" aria-hidden="true"></i>
                            {{ ($indicator->short_form)?$indicator->short_form:$indicator->bangla_name }}</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($districts as $key => $district)
                        <tr>
                            @if($has_upazila)
                                <th class="p-l-10"><a href="#" @if(isset($data[$district->bbscode])) onclick="map_drill_down('{{ $district->bbscode }}','{{ $district->name }}',{{$indicator->id}})" @endif >{{ $district->name }}</a></th>
                            @else
                                <th class="p-l-10">{{ $district->name }}</th>
                            @endif

                            <td class="p-l-10">
                                @if(isset($data[$district->bbscode]))
                                    @if($data[$district->bbscode]['value'] != 0)
                                        {{ english_to_bangla(bdtFormat($data[$district->bbscode]['value']))}} {{$indicator->unit}}
                                    @else
                                        ০ {{$indicator->unit}}
                                    @endif
                                @else
                                    ০ {{$indicator->unit}}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table> --}}

                <div class="mb-3 padding-10 alert-success">
                    <i class="fa fa-building-o" aria-hidden="true"></i>
                    {{ ($indicator->short_form)?$indicator->short_form:$indicator->bangla_name }}
                </div>

                @foreach($map_data as $key => $district)
                    <div class="row pb-2">
                        <div class="col-md-4" style="font-size: 18px">
                            @if($has_upazila)
                                <a href="#" @if(isset($data[$district->bbscode])) onclick="map_drill_down('{{ $district->bbscode }}','{{ $district->name }}',{{$indicator->id}})" @endif >{{ $district->name }}</a>
                            @else
                                {{ $district->name }}
                            @endif
                        </div>

                        @php
                            $district_indicator_value = 0;
                            if(isset($data[$district->bbscode])) {
                                if($data[$district->bbscode]['value'] != 0) {
                                    $district_indicator_value = $data[$district->bbscode]['value'];
                                }
                            }
                        @endphp
                        {{--                        @php--}}
                        {{--                            $area_minvalue = 0;--}}
                        {{--                            $area_maxvalue = 100;--}}
                        {{--                            if ($district_indicator_value > 100 && $district_indicator_value < 1000) {--}}
                        {{--                                $area_minvalue = 100;--}}
                        {{--                                $area_maxvalue = 1000;--}}
                        {{--                            } elseif ($district_indicator_value > 1000 && $district_indicator_value < 10000) {--}}
                        {{--                                $area_minvalue = 1000;--}}
                        {{--                                $area_maxvalue = 10000;--}}
                        {{--                            } elseif ($district_indicator_value > 10000 && $district_indicator_value < 100000) {--}}
                        {{--                                $area_minvalue = 10000;--}}
                        {{--                                $area_maxvalue = 100000;--}}
                        {{--                            } elseif ($district_indicator_value > 100000 && $district_indicator_value < 1000000) {--}}
                        {{--                                $area_minvalue = 100000;--}}
                        {{--                                $area_maxvalue = 1000000;--}}
                        {{--                            }--}}
                        {{--                            $area_percentage = floor(($district_indicator_value * 100) / $area_maxvalue);--}}
                        {{--                        @endphp--}}

                        <div class="col-md-4">
                            {{--                            <div class="progress">--}}
                            {{--                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $district_indicator_value }}" aria-valuemin="{{ $area_minvalue }}" aria-valuemax="{{ $area_maxvalue }}" style="width: {{$area_percentage}}%;">--}}
                            {{--                                    <span class="sr-only">{{$area_percentage}}% Complete</span>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>

                        <div class="col-md-4" style="font-size: 18px">
                            @if(empty($district_indicator_value))
                                ০ {{$indicator->unit}}
                            @else
                                {{ english_to_bangla(bdtFormat($district_indicator_value))}} {{$indicator->unit}}
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>

<script>
    /**
     * Create a constructor for sparklines that takes some sensible defaults and merges in the individual
     * chart options. This function is also available from the jQuery plugin as $(element).highcharts('SparkLine').
     */
    Highcharts.SparkLine = function (a, b, c) {
        var hasRenderToArg = typeof a === 'string' || a.nodeName,
            options = arguments[hasRenderToArg ? 1 : 0],
            defaultOptions = {
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
                tooltip: {
                    hideDelay: 0,
                    outside: true,
                    shared: true
                },
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
                }
            };

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
    $(document).ready(function () {
        $("#map_date_div").datepicker({
            format: "yyyy-mm-dd",
        }).on('changeDate',function() {
            let selected_date = $('#map_date').val();
            let indicator_id = $('#indicator_list_drop').find(":selected").val();
            $('.datepicker-dropdown').css('display','none')

            map_table(indicator_id, selected_date);
        });
    });

</script>
