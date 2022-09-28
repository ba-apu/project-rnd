@extends('layout.frontend')
@section('content')

    <!-- custom accessibility start -->
    <link rel="stylesheet" href="https://bangladesh.gov.bd/accessibility/css/asb.css">
    <script src="https://bangladesh.gov.bd/accessibility/js/asb.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/js/all.min.js"></script>
    <!-- custom accessibility end -->


    <div class="content sm-gutter">
        <!-- START BREADCRUMBS -->
        <!--div class="bg-white">
            <div class="container-fluid padding-25 sm-padding-10">
            </div>
        </div-->
        <!-- END BREADCRUMBS -->

        <!-- START CONTAINER FLUID -->
        <div class="container-fluid padding-25">
            <div class="card  bg-white">
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-8">

                            <div class="card-header border-bottom ">
                                <div class="txt-16 text-primary">নথিঃ ৩৪৫ কোটি ব্যবহার</div>
                                <div class="txt-12 text-muted">১২হাজার অফিসের ম্যধমে</div>
                            </div>
                            <div id="main-indicator-div" class="border-bottom-light"></div>
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-3 border">
                                        <div class="pull-left ">
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
                                    <div class="col-4 border">
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
                                    <div class="col-2 border">

                                    </div>
                                    <div class="col-3 border">
                                        <div class="pull-right ">
                                            <a class="btn btn-link text-primary" href="{{ url('dashboard/service/digital_centre') }}">
                                                বিস্তারিত জানতে
                                                <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="padding-15">
                                <div id="right-menu" class="right-menu-box">
                                    <div class="row">
                                        @foreach($serviceProviderInfo as $key=>$service)
                                            <div class="col-md-4 min-100 pointer">
                                                <div class="box-menu card  padding-15" onclick="changeData()">
                                                    <div class="txt-stl-3">{{ @$service[6] }}</div>
                                                    <span class="sparkline_{{ $key }}" data-sparkline="71, 78, 39, 66 "></span>
                                                    <div class="txt-stl-1 m-t-10">{{ \App\Common::randSingleNum(70, 90) }} {{ @$service[8] }}</div>
                                                    <div class="txt-stl-3">{{ @$service[7] }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 border">
                                        <i class="fa up fa-angle-up" aria-hidden="true"></i>
                                        <i class="fa down fa-angle-down" aria-hidden="true"></i>

                                    </div>
                                    <div class="col-sm-4 border"></div>
                                    <div class="col-sm-4 border">
                                        <button class="btn btn-info btn-xs" id="btnToggleSlideUpSize">
                                            <i class="fa fa-bars" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Office Reach -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card  card-transparent">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-3 border">
                                    ২৩ হাহার অফিস
                                </div>
                                <div class="col-md-9 border">
                                    <div id="office-reach-div"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card  card-transparent">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-3 border">
                                    ২৩ হাহার কর্ম কর্তা প্রশিক্ষিত
                                </div>
                                <div class="col-md-9 border">
                                    <div id="officer-training-div"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card  card-transparent bg-white">
                <div class="title card-header border-bottom txt-18 text-primary">লেনদেন এবং মুনাফা</div>
                <div class="card-block bg-white">
                    <div class="m-b-20"></div>
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

            <div class="card  card-transparent bg-white">
                <div class="title card-header border-bottom txt-18 text-primary">{{ @$service_name }} আর্থিক অগ্রগতি</div>
                <div class="card-block bg-white">
                    <div class="m-b-20"></div>
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

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade slide-up disable-scroll" id="modalSlideUp" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog ">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                        </button>
                        <h5>ইনডিকেটর সমূহ</h5>
                        <p class="p-b-10">আমার সোনার বাংলা, আমি তোমায় ভালোবাসি</p>
                    </div>
                    <div class="modal-body">

                        <ol class='sort'>
                            @php $i=1; @endphp
                            @foreach($serviceProviderInfo as $key => $service)
                                <li>{{  \App\Common::convertToUnicode($i++).'। ' .@$service[6] .','. @$service[7] }} <a class="del" href="#"></a></li>
                            @endforeach

                        </ol>


                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-xs btn-primary">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            নতুন ইনডিকেটর
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
    <!-- /.modal-dialog -->

@endsection
@section('script')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="{{ custom_asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ custom_asset('assets/js/scripts.js') }}"></script>

    <!-- High Chart JS Starts -->
    <script src="{{ custom_asset('js/lib/highcharts/code/highcharts.js') }}"></script>
    <script src="{{ custom_asset('js/lib/highcharts/code/highcharts-more.js') }}"></script>
    <script src="{{ custom_asset('js/lib/highcharts/code/modules/data.js') }}"></script>
    <!-- High Chart JS Ends -->

    <script src="{{ custom_asset('js/jquery-sortable.js') }}"></script>
    <script>

        // DEMO MODALS SIZE TOGGLER

        $('#btnToggleSlideUpSize').click(function() {
            var size = $('input[name=slideup_toggler]:checked').val()
            var modalElem = $('#modalSlideUp');
            if (size == "mini") {
                $('#modalSlideUpSmall').modal('show')
            } else {
                $('#modalSlideUp').modal('show')
                if (size == "default") {
                    modalElem.children('.modal-dialog').removeClass('modal-lg');
                } else if (size == "full") {
                    modalElem.children('.modal-dialog').addClass('modal-lg');
                }
            }
        });
    </script>
    <script>
        $(function  () {
            $("ol.sort").sortable();
        });
    </script>
    <script>
        function drawTimeLineChart(){
            $.ajax({
                url: "{{ url('dashboard/graph/service_timeline') }}",
                data: {"numbers": "12", "unit": "MONTH"},
                success: function (response) {
                    //Do Something
                    $("#main-indicator-div").html(response);
                },
                error: function (xhr) {
                    alert("Something Wnt Wrong");
                    //Do Something to handle error
                }
            });
        }
        function changeData(){
            drawTimeLineChart();
        }
        $(document).ready(function () {
            console.log("ready!");
            // Service Time Line

            drawTimeLineChart();
            $.ajax({
                url: "{{ url('dashboard/graph/office-reach') }}",
                data: {"numbers": "12", "unit": "MONTH"},
                success: function (response) {
                    //Do Something
                    $("#office-reach-div").html(response);
                },
                error: function (xhr) {
                    alert("Something Wnt Wrong");
                    //Do Something to handle error
                }
            });


            $.ajax({
                url: "{{ url('dashboard/graph/officer-training') }}",
                data: {"numbers": "12", "unit": "MONTH"},
                success: function (response) {
                    //Do Something
                    $("#officer-training-div").html(response);
                },
                error: function (xhr) {
                    alert("Something Wnt Wrong");
                    //Do Something to handle error
                }
            });


            //
        });
    </script>

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
    <style>
        .chart {
            height: 160px;
            margin: 0 auto;
            border-bottom: 1px dashed #666;
        }
    </style>
    <script>
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
@endsection
