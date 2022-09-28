
        @foreach($indicator_lists as $key=>$indicator_list)
            <div class="col-md-4 min-100 pointer">
                @php
                $display_name=($indicator_list->short_form != "")?$indicator_list->short_form:$indicator_list->bangla_name;
                $display_value=english_to_bangla(\App\Common::bdtFormat($data[$indicator_list->id]['sum']));
                $project_name=$data[$indicator_list->id]['project_name'];
                @endphp
                <div class="box-menu card  padding-15" onclick="drawTimeLineChart({{$indicator_list->id}},'Area','{{$project_name." : ".$display_name}}','{{ $display_value." ".$indicator_list->unit }}','{{$data[$indicator_list->id]['slug']}}')">
                    <input type="hidden" id="timeline_indicator_id" value="{{$indicator_list->id}}">
                    <div class="txt-stl-3 p-b-4 m-b-5 border-bottom-light txt-16" style="color:#8cc63f;">{{ $data[$indicator_list->id]['project_name'] }}</div>
					<div class="txt-stl-3">{{$display_name}} </div>
						{{--<span class="sparkline_{{ $indicator_list->id }}" data-sparkline="{{$data[$indicator_list->id]['spark_line_data']}}"></span>--}}
                    <div class="txt-stl-1 m-t-5">{{ $display_value }} </div>
                    <div class="txt-stl-3">{{ $indicator_list->unit }}</div>
                </div>
            </div>
        @endforeach
        <script>
            // Sparkline
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
                $tds = $('span[data-sparkline]'),
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

                    }
                }
            }
            doChunk();
        </script>