<div class="row">
    <div class="col-12" style="text-align: center">
        <div class="ep-all-spent-title">{{$q_name}}</div>
        <div class="ep-all-spent-date">({{english_to_bangla($start_date)}} - {{english_to_bangla($end_date)}})</div>
    </div>
    <div class="col-4 text-center p-1">
        <h3>বরাদ্দ</h3>
        <div class="ep-total-taka-2">{{english_to_bangla(number_conversion($approved_amount))}} টাকা</div>
        <span>( {{english_to_bangla(bdtFormat($approved_amount))}}/= )</span>
        <div class="p-2">
            <div id="unused_percentage_chart" class="chart-container"
                 style="width: 150px; height: 150px;">
            </div>
            {{--            <div class="text-center">--}}
            {{--                <h6 class="m-0">অব্যবহৃত</h6>--}}
            {{--                <h5 class="m-0"--}}
            {{--                    style="font-weight: bold;color:red;">{{english_to_bangla($unused_percentage)}} %</h5>--}}
            {{--            </div>--}}
        </div>
        <div class="ep-total-taka">{{english_to_bangla(number_conversion($unused_amount))}} টাকা</div>
        <span>( {{english_to_bangla(bdtFormat($unused_amount))}}/= )</span>
    </div>
    <div class="col-8 side-progress" style="padding: 25px; height: 360px;">
        <div class="ep-total-taka-3">
            অবশিষ্ট সময়ঃ @if($time_left > 0) {{english_to_bangla($time_left)}} @else - @endif দিন<br>
            অব্যবহৃত টাকাঃ {{english_to_bangla(number_conversion($unused_amount))}} টাকা
            ({{english_to_bangla(bdtFormat($unused_amount))}}/=)
        </div>
        <div class="ep-table-title"><u>যে সকল খাতে খরচ করতে হবে</u></div>
        @foreach($spending_initiatives as $spending_initiative)
            <div class="row" style="padding: 10px">
                <div class="col-2 justify-content-center align-self-center">
                    <div
                            style="background: #6F52ED; height: 10px; width: 10px; border-radius: 5px; float:right;"></div>
                </div>
                <div class="col-5 ep-table-spent-title">{{english_to_bangla($spending_initiative->activity_type)}}</div>
                <div class="col-5">{{english_to_bangla(bdtFormat($spending_initiative->UnUsed))}}/= ({{english_to_bangla(get_percentage_to_hundrade($spending_initiative->UnUsed, $unused_amount))}}%)</div>
            </div>
        @endforeach
    </div>
</div>
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
    var chartSpeed = Highcharts.chart('unused_percentage_chart', Highcharts.merge(gaugeOptions, {
        yAxis: {
            min: 0,
            max: 100
        },

        credits: {
            enabled: false
        },

        series: [{
            name: '',
            data: [{{$unused_percentage}}],
            dataLabels: {
                format:
                    '<div style="text-align:center;margin-top:10px;">' +
                    '<span style="font-size:13px; font-weight:bold;">অব্যবহৃত</span><br>' +
                    '<span style="font-size:13px; font-weight:bold; color:red;">{{english_to_bangla($unused_percentage)}} %</span>' +
                    '</div>'
            }
        }]
    }));
</script>
