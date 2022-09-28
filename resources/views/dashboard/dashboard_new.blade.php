@extends('layout.frontend')
@push('top_css')
    <link class="stylesheet" href="{{ custom_asset('assets/css/indicator.css') }}" rel="stylesheet" type="text/css"/>
    <style>
        .bt {
            line-height: 12px;
            width: 18px;
            font-size: 8pt;
            font-family: tahoma;
            margin-top: 1px;
            margin-right: 2px;
            position: absolute;
            top: 0;
            right: 0;
        }

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
        <div class="breadcrumb p-t-0 p-b-5 p-l-0 p-r-0">
            <i class="p-t-5 fa fa-tachometer ds-title" aria-hidden="true"></i><span class="title-ds">ড্যাশবোর্ড</span>
            <div class="cromodhara btn-group dropdown dropdown-default" style="float:right;">
                <button id="btnToggleSlideUp" class="btn btn-secondary" type="button"
                        style="box-shadow:1px 1px #d2d2d2;"> ক্রমবিণ্যাস <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
                <pre id="serialize_output2"></pre>
                <div class="modal fade slide-up disable-scroll" id="modalSlideUp" tabindex="-1" role="dialog"
                     aria-hidden="false">
                    <div class="modal-dialog ">
                        <div class="modal-content-wrapper">
                            <div class="modal-content">
                                <div class="modal-header clearfix text-left">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                            class="pg-close fs-17"></i></button>
                                    <h5 class="m-t-0 m-b-0"><span
                                            class="semi-bold tit-co">{{__('lavel.project_sequence')}}</span></h5>

                                </div>
                                <div class="modal-body">
                                    <form role="form">
                                        <div class="form-group-attached">
                                            <div class="row">
                                                <div class="col-md-12 side-progress">
                                                    <ol class='serialization vertical p-l-0' id="indecator_div">
                                                        @foreach($indicator_project_lists as $key=>$project)
                                                            @if(is_array($project))
                                                                <li data-id="{{$project['id']}}">{{$project['name']}}</li>
                                                            @endif
                                                        @endforeach
                                                    </ol>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-md-12 m-t-10 sm-m-t-10">
                                            <button type="button" class="btn btn-xs float-right btn-primary"
                                                    onclick="relod_dashboard()">জমা দিন
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <ul class="dash-tab nav nav-tabs nav-tabs-simple" role="tablist" data-init-reponsive-tabs="dropdownfx">
                <li class="nav-item">
                    <a href="#" class="active" data-toggle="tab" role="tab" data-target="#tab1"><i
                            class="fa fa-database" aria-hidden="true"></i>
                        ডাটা</a></li>
                <li class="nav-item">
                    <a data-toggle="tab" role="tab" data-target="#tab2" href="#"> <i class="fa fa-bar-chart"
                                                                                     aria-hidden="true"></i>
                        গ্রাফ</a></li>
            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <div class="row">
                    @foreach($indicator_project_lists as $key=>$project)
                        @if(is_array($project))
                            @if(isset($project['indicator_last_value']['data']))
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                    <div class="card dashboard-card tab-sm-box">
                                        <a href="{{url('dashboard/'.$project['slug'])}}">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
                                                    <div class="card-logo">
                                                        <img
                                                            src="{{($project['logo']) ? custom_asset('assets/img/projects/' .$project['logo']) : custom_asset('assets/img/projects/default-logo.png')}}"
                                                            class="img-fluid" alt="{{$project['name']}}">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-7 col-lg-8">
                                                    <p class="title wrap-word-landing" data-toggle="tooltip"
                                                       data-animation="false"
                                                       data-original-title="{{$project['name']}}">
                                                        {{$project['name']}}
                                                    </p>
                                                    <p class="ind-title tip tip2 tip mb-1 wrap-word-landing"
                                                       data-toggle="tooltip" data-animation="false"
                                                       data-original-title="{{$project['indicators'][0]['bangla_name']}}">
                                                        @if($project['indicators'][0]['bangla_name'] != "")
                                                            {{ $project['indicators'][0]['short_form'] }}
                                                        @else
                                                            {{ $project['indicators'][0]['short_form'] }}
                                                        @endif</p>
                                                    <p class="ind-amount mt-2 mb-0" data-toggle="tooltip"
                                                       data-animation="false"
                                                       data-original-title="{{$project['indicator_last_value']['date']}}">
                                                        {{$project['indicator_last_value']['data']}}
                                                        <span>{{$project['indicators'][0]['unit']}}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
                <span class="loder"><img src="{{custom_asset('pages/img/loder-a2i.gif')}}" class="img-fluid"
                                         alt=""></span>
                @if(count($indicator_project_lists) > 8)
                    <a href="#" class="loadMore" id="loadMore2">আরও দেখুন</a>
                @endif
            </div>

            <div class="tab-pane" id="tab2">
                <div class="row">
                    @foreach($indicator_project_lists as $key=>$project)
                        @if(is_array($project))
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="card indi-box">
                                    <div class="head"><span>{{$project['name']}}</span></div>
                                    <div
                                        class="ser-tit">@if($project['indicators'][0]['bangla_name'] != ""){{ $project['indicators'][0]['bangla_name'] }} @else {{ $project['indicators'][0]['name'] }} @endif</div>

                                    <div id="container_{{$project['id']}}" class="r-grap2"><img
                                            src="{{custom_asset('pages/img/graph.jpg')}}"/></div>

                                    <div class="line-border m-t-10">
                                        <div class="float-left m-t-10">
                                            @if(isset($project['indicator_last_value']['data']))
                                                <span
                                                    class="mon-nam">{{$project['indicators'][0]['short_form']}} </span>
                                                <span class="per_sen tip" data-toggle="tooltip"
                                                      data-original-title="{{$project['indicator_last_value']['date']}}"
                                                      id="last_value_{{$project['id']}}"> {{$project['indicator_last_value']['data']}} </span>
                                                {{$project['indicators'][0]['unit']}}
                                            @endif
                                        </div>
                                        <a class="de-btn float-right m-t-10"
                                           href="{{url('dashboard/'.$project['slug'])}}"
                                           style=" align-content:flex-end;">বিস্তারিত দেখুন</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <span class="loder"><img src="{{custom_asset('pages/img/loder-a2i.gif')}}" class="img-fluid"
                                         alt=""></span>
                <a href="#" class="loadMore" id="loadMore">আরও দেখুন</a>
            </div>
        </div>
    </div>

    @include('dashboard.indicator_progress')
    @if($operation_view)
        @include('dashboard.financial_progress')
    @endif
@endsection

@push('scripts')
    <script src="{{ custom_asset('assets/js/jquery-sortable.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(".tab-sm-box").slice(0, 12).show();
            $("#loadMore2").on("click", function (e) {
                e.preventDefault();
                $(".tab-sm-box:hidden").slice(0, 4).slideDown();
                if ($(".tab-sm-box:hidden").length == 0) {
                    $("#loadMore2").text("কোন তথ্য নেই").addClass("noContent");
                }
            });

            $(".indi-box").slice(0, 3).show();
            $("#loadMore").on("click", function (e) {
                e.preventDefault();
                $(".indi-box:hidden").slice(0, 3).slideDown();
                if ($(".indi-box:hidden").length == 0) {
                    $("#loadMore").text("কোন তথ্য নেই").addClass("noContent");
                }
            });
        })
    </script>

    <script>
        $(document).ready(function () {
            $(".expand").click(function (e) {
                e.preventDefault();
                $(this).closest('.indi-box').toggleClass('fullscreen');
            });

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                var dt = start.format('YYYY-m-d, ') + ' - ' + end.format('YYYY-m-d');
                $("#financial_cutom_date").val(dt);
                //$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                // onclick_date(start.format('YYYY-MM-DD'),end.format('YYYY-MM-DD'));
            }

            var $picker = $('#financial_custom_date_picker').daterangepicker({
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

            $('#q' + '{{$running}}' + '-fp').trigger('click');
            $('#q' + '{{$running}}').trigger('click');
        })
    </script>
    <!-- chart graph-->
    <script>
        @foreach($indicator_project_lists as $key=>$project)
        @if(is_array($project))
        @if($project['id'] == "")
        @php continue; @endphp
        @endif
        var project_id = '{{$project['id']}}';
        {{--var indicator_id='{{$project['indicators'][0]['id']}}';--}}
        var last_value = 0;
        var indicator_bangla_name = '';
        var unit = "";
        $.ajax({
            async: false,
            type: "get",
            url: "{{ url('ajax/get-indicator-wise-dashboard-data') }}",
            data: {
                'project_id': project_id,
                // 'indicator_id':indicator_id
            }
        }).done(function (resp) {
            var date_str = [];
            var data_str = [];
            var resp = JSON.parse(resp);
            $.each(resp, function (i, item) {
                //console.log(item['date']);
                date_str.push(item['date']);
                //data
                data_str.push(item['data']);
                last_value = item['data'];
                //name
                indicator_bangla_name = item['bangla_name'];
                //unit
                unit = item['unit'];
            });
            //$("#last_value_"+project_id).html(last_value);
            var rnd = Math.floor(Math.random() * 3) + 0;
            {{--            high_chart_make(project_id,'line',date_str,data_str,'{{($project['indicators'][0]['short_form'])?$project['indicators'][0]['short_form']:$project['indicators'][0]['bangla_name']}}',unit);--}}
            high_chart_make(project_id, 'line', date_str, data_str, indicator_bangla_name, unit);
            //alert(project_id);
        });
        @endif
        @endforeach
        $('.loder').hide();

        //high chart
        function high_chart_make(project_id, chart_type, date_js, data_js, title, unit = "") {
            Highcharts.chart('container_' + project_id, {
                chart: {
                    type: chart_type
                },
                xAxis: {
                    categories: date_js,
                    crosshair: true,
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: unit
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                exporting: {enabled: false},
                credits: {enabled: false},
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: title,
                    data: data_js

                }]
            });
        }
    </script>

    <script>
        var group = $("ol.serialization").sortable({
            group: 'serialization',
            delay: 500,
            nested: false,
            onDrop: function ($item, container, _super) {
                var data = group.sortable("serialize").get();

                //loop data
                var string_sort = "0,";
                for (let i = 0; i < data[0].length; i++) {
                    string_sort += data[0][i]['id'] + ",";
                }
                //console.log(string_sort);
                setCookie(string_sort);
                var jsonString = JSON.stringify(data, null, ' ');

                $('#serialize_output2').text(jsonString);
                _super($item, container);
            }
        });
    </script>

    <script>
        $('#btnToggleSlideUp').click(function () {
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
        function setCookie(cvalue) {
            $.ajax({
                url: "{{ url('ajax/set-user-session/') }}",
                data: {
                    "user_id": '{{ Auth::user()->id }}',
                    "page": "dashboard",
                    "value": cvalue
                },
                success: function (response) {
                    return true;
                },
                error: function (xhr) {
                    return false;
                }
            });
        }

        function relod_dashboard() {
            location.reload();
        }
    </script>
@endpush

