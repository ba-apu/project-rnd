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
            <div class="row m-b-20">
                <div class="col-lg-9 col-sm-6 d-flex flex-column bg-white">
                    <ul class="nav nav-tabs nav-tabs-simple nav-tabs bg-white" id="tab-3">
                        <li class="nav-item">
                            <a href="#" class="active" data-toggle="tab" data-target="#tab3hellowWorld">সার্বিক সেবা প্রদান </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" data-toggle="tab" data-target="#tab3FollowUs">সেবা ভিত্তিক</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" data-toggle="tab" data-target="#udc_based"> ভিত্তিক</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" data-toggle="tab" data-target="#udc_active">সর্বমোট এবং সক্রিয় {{@$serviceProviderInfo[0]}} </a>
                        </li>
                    </ul>
                    <div class="card card-transparent flex-row" id="servie-provide">
                        <div class="tab-content bg-white">
                            <div class="tab-pane active" id="tab3hellowWorld">
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

        // Service Provide graph
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



        var height2= 250;
        var width2= $("#business-box").width();


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
