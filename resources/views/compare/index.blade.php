@extends('layout.frontend')
@push('top_css')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <style>
        .btn-group-xs>.btn, .btn-xs {
            font-size: 12px;
        }
        .toggle-on {
            top: 2px;
        }
        .toggle-off.btn-xs {
            background-color: #ff0000;
            color: #FFFFFF;
        }
        .toggle-off {
            top: 2px;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid p-t-5 p-l-25 p-b-25 p-r-25">
        @include('compare.search_portion')
        <div class="" id="top_bar" style="display:none">
            <div class="row">
                <div class="col-md-2">
                    <div class="card m-b-10">
                        <div class="card-block card-date bg-white">
                            @lang('lavel.date') : <span id="top_bar_from_date"></span> হতে <span
                                    id="top_bar_to_date"></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card m-b-10">
                        <div class="card-block card-ind-boxx bg-white d-flex">

                            <div class="card-ind-boxx1">
                                <div class="boxx1" id="top_bar_first_project_name"></div>
                                <div class="boxx2" id="top_bar_first_indicator_name" class="border"></div>
                            </div>
                            <div class="card-ind-boxx2" id="top_bar_first_indicator_value"></div>

                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card m-b-10">
                        <div class="card-block card-ind-boxx bg-white d-flex" id="second_segemente">

                            <div class="card-ind-boxx1">
                                <div class="boxx1" id="top_bar_second_project_name"></div>
                                <div class="boxx2" id="top_bar_second_indicator_name" class="border"></div>
                            </div>

                            <div class="card-ind-boxx2" id="top_bar_second_indicator_value"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-white m-t-0" id="chart_container_parent" style="display:none;">
            <div class="card-block bg-white" id="chart_container">

            </div>
        </div>
        <div class="">
            <div class="row">
                <div class="col-md-6">
                    <div class="card bg-white" id="first_segement">

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card bg-white" id="second_segement">

                    </div>
                </div>
            </div>
        </div>
        <div class="" id="table_div" style="display:none;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-white" id="first_segement_data">
                        <div class="card-block bg-white">
                            <table class="top-table table"
                                   style="border-collapse:collapse; font-family:'SolaimanLipi'!important;"
                                   id="data_table">

                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    </div>

@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script>
        $(function() {
            $('#specific-value').change(function() {
                $(this).prop('checked');
            })
        });

        $("#submit").click(function () {
            var first_indicator = $('#indicator_id_1').val();
            var first_indicator_name = $("#indicator_id_1").children("option").filter(":selected").text();
            var second_indicator = $('#indicator_id_2').val();
            var second_indicator_name = $("#indicator_id_2").children("option").filter(":selected").text();
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            if ($('#specific-value').is(":checked")) {
                $('#specific-value').val('true');
            }else{
                $('#specific-value').val('false');
            }

            $("#first_indicator").val(first_indicator);
            $("#first_indicator_name").val(first_indicator_name);
            $("#second_indicator").val(second_indicator);
            $("#second_indicator_name").val(second_indicator_name);

            if (first_indicator != "" && second_indicator != "") {
                $("#chart_container_parent").show();
                compare();
                //chart_segment('first_segement',first_indicator,first_indicator_name);
            }
        });

        $(document).on("change", "#project_id_1", function (e) {
            var project_id = $(this).val();

            $.ajax({
                type: "get",
                url: "{{ url('ajax/get-indicator-list') }}",
                data: {
                    'project_id': project_id,
                }
            }).done(function (resp) {

                var txt = '<option value="">@lang('lavel.select_indicator')</option>';
                var resp = JSON.parse(resp);
                //console.log(resp);
                $.each(resp, function (i, item) {
                    //alert(i);
                    var option_name = (resp[i].short_form) ? resp[i].short_form : resp[i].bangla_name;
                    txt += '<option value="' + resp[i].id + '">' + option_name + '</option>';
                });
                //alert(txt);
                $('#indicator_id_1').html(txt);
            });
        });

        $(document).on("change", "#project_id_2", function (e) {
            var project_id = $(this).val();

            $.ajax({
                type: "get",
                url: "{{ url('ajax/get-indicator-list') }}",
                data: {
                    'project_id': project_id,
                }
            }).done(function (resp) {

                var txt = '<option value="">@lang('lavel.select_indicator')</option>';
                var resp = JSON.parse(resp);
                //console.log(resp);
                $.each(resp, function (i, item) {
                    //alert(i);
                    var option_name = (resp[i].short_form) ? resp[i].short_form : resp[i].bangla_name;
                    txt += '<option value="' + resp[i].id + '">' + option_name + '</option>';
                });
                //alert(txt);
                $('#indicator_id_2').html(txt);
            });
        });

        //compare_graph
        function compare() {
            var first_indicator = $("#first_indicator").val();
            var second_indicator = $("#second_indicator").val();
            var first_name = $("#first_indicator_name").val();
            var second_name = $("#second_indicator_name").val();
            var specFlag = $("#specific-value").val();

            var from_date = $("#from_date").val();
            var to_date = $("#to_date").val();

            var first_loop_data = [];
            var second_loop_details_data = [];
            var second_loop_data = [];

            var first_data = [];
            var second_data = [];
            var category_str = [];

            var first_details_data = [];
            var second_details_data = [];
            var category_details_str = [];

            var first_mongo_date = [];
            var first_details_mongo_date = [];

            var first_target_data = [];
            var first_details_target_data = [];
            var second_target_data = [];
            var second_details_target_data = [];

            var unit = "";
            var f_indicator_name = "";
            var s_indicator_name = "";

            indicator_id = first_indicator;
            $.ajax({
                async: false,
                url: "{{ url('ajax/get-graph-data-for-service-page/') }}",
                data: {
                    "indicator_id": indicator_id,
                    "from_date": from_date,
                    "to_date": to_date,
                    "type": "likeWise",
                    "specFlag": specFlag,
                },
                success: function (response) {
                    var parsed = JSON.parse(response);
                    f_indicator_name = parsed['indicator_short_name'];
                    unit = parsed['unit'];
                    var project_name = parsed['project_name'];
                    first_loop_data = parsed['point_data'];
                    var loop_details_data = parsed['details_data'];
                    first_loop_data.forEach(function (element) {
                        first_data.push(element.data);
                        first_target_data.push(element.target_data);

                        first_mongo_date.push(element.mongo_date);
                        category_str.push(element.date);
                        //target_str.push(element.target_data);
                    });

                    loop_details_data.forEach(function (element) {
                        first_details_data.push(element.data);
                        first_details_target_data.push(element.target_data);

                        first_details_mongo_date.push(element.mongo_date);
                        category_details_str.push(element.date);
                        //target_str.push(element.target_data);
                    });

                    //top bar intigration
                    //alert(from_date);
                    $("#top_bar_from_date").html(from_date);
                    $("#top_bar_to_date").html(to_date);

                    $("#top_bar_first_project_name").html(project_name);
                    $("#top_bar_first_indicator_name").html(f_indicator_name);
                    $("#top_bar_first_indicator_value").html(first_details_data[first_details_data.length - 1]) + " " + unit;
                }
            });
            //console.log(first_data);

            indicator_id = second_indicator;
            $.ajax({
                async: false,
                url: "{{ url('ajax/get-graph-data-for-service-page/') }}",
                data: {
                    "indicator_id": indicator_id,
                    "from_date": from_date,
                    "to_date": to_date,
                    "type": "likeWise",
                    "specFlag": specFlag,
                },
                success: function (response) {
                    var parsed = JSON.parse(response);
                    s_indicator_name = parsed['indicator_short_name'];
                    unit = parsed['unit'];
                    var project_name = parsed['project_name'];
                    second_loop_data = parsed['point_data'];
                    second_loop_details_data = parsed['details_data'];
                    second_loop_data.forEach(function (element) {
                        // if(jQuery.inArray(element.mongo_date, first_mongo_date) !== -1) {
                        second_data.push(element.data);
                        second_target_data.push(element.target_data);
                        //category_str.push(element.date);
                        //target_str.push(element.target_data);
                    });
                    second_loop_details_data.forEach(function (element) {
                        second_details_data.push(element.data);
                        second_details_target_data.push(element.target_data);
                        //second_details_target_data.push(element.date);
                        //category_str.push(element.date);
                        //target_str.push(element.target_data);
                    });

                    //top bar intigration
                    $("#top_bar_second_project_name").html(project_name);
                    $("#top_bar_second_indicator_name").html(s_indicator_name);
                    $("#top_bar_second_indicator_value").html(second_details_data[second_details_data.length - 1]) + " " + unit;
                }
            });

            indicator_name = f_indicator_name + " বনাম " + s_indicator_name;
            //unit="%";
            //push to table
            var table = "";
            first_data_length = first_data.length;
            second_data_length = second_data.length;

            table += '<tr>';
            table += '<td>@lang('lavel.date')</td>';
            table += '<td class="top-hd" colspan="2"><b class="b-text">' + first_name + '</td>';
            table += '<td class="top-hd" colspan="2"><b class="b-text">' + second_name + '</td>';
            table += '</tr>';
            table += '<tr>';
            table += '<td></td>';
            table += '<td>@lang("lavel.value")</td>';
            table += '<td>@lang("lavel.target_value")</td>';
            table += '<td>@lang("lavel.value")</td>';
            table += '<td>@lang("lavel.target_value")</td>';
            table += '</tr>';

            // if (first_data_length >= second_data_length) {

            second_details_data = [];
            second_details_target_data = [];

            first_details_mongo_date.forEach(function (value) {
                let data = '০';
                let target_data = '০';
                second_loop_details_data.filter(function (el) {
                    if (el.mongo_date == value) {
                        data = el.data;
                        target_data = el.target_data;
                    }
                })
                second_details_data.push(data)
                second_details_target_data.push(target_data)
            });

            for (let i = 0; i < first_details_data.length; i++) {
                table += '<tr>';
                table += '<td>' + category_details_str[i] + '</td>';
                table += '<td>' + first_details_data[i] + '</td>';
                table += '<td>' + first_details_target_data[i] + '</td>';

                let second_data = '০';
                let second_target_data = '০';
                if (typeof (second_details_data[i]) != "undefined" && second_details_data[i] != null) {
                    second_data = second_details_data[i];
                    second_target_data = second_details_target_data[i];
                }

                table += '<td>' + second_data + '</td>';
                table += '<td>' + second_target_data + '</td>';
                table += '</tr>';
            }
            // }

            second_data = [];
            second_target_data = [];

            first_mongo_date.forEach(function (value) {
                let data = 0;
                let target_data = 0;
                second_loop_data.filter(function (el) {
                    if (el.mongo_date == value) {
                        data = el.data;
                        target_data = el.target_data;
                    }
                })
                second_data.push(data)
                second_target_data.push(target_data)
            });

            chart_type = "line";
            make_chart_for_indicator('project_name', indicator_name, category_str, first_data, second_data, unit, chart_type, first_name, second_name);
            make_chart_for_indicator('project_name', f_indicator_name, category_str, first_data, first_target_data, unit, 'column', '@lang("lavel.data")', '@lang("lavel.target_data")', 'first_segement');
            make_chart_for_indicator('project_name', s_indicator_name, category_str, second_data, second_target_data, unit, 'column', '@lang("lavel.data")', '@lang("lavel.target_data")', 'second_segement');

            $("#top_bar").show();
            $("#data_table tr").remove();
            $('#data_table').append(table);
            $("#table_div").show();
            //}

        }

        function make_chart_for_indicator(project_name, indicator_name, category, data, target_data, unit = "", chart_type, first_name, second_name, chart_div = 'chart_container') {
            Highcharts.chart(chart_div, {
                chart: {
                    type: chart_type
                },
                title: {
                    text: ""
                },
                subtitle: {
                    text: indicator_name
                },
                exporting: {
                    menuItemDefinitions: {
                        // Custom definition

                    },
                    buttons: {
                        contextButton: {
                            // menuItems: ['downloadXLS','downloadCSV','downloadPDF','downloadPNG', 'downloadSVG', 'separator', 'label']
                            menuItems: ['downloadXLS', 'downloadCSV', 'downloadPDF', 'downloadPNG', 'downloadSVG', 'viewFullscreen']
                        }
                    }
                },
                credits: false,
                xAxis: {
                    categories: category,
                    crosshair: true,
                    text: "মাস"
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
                        '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: first_name,
                    data: data,
                    color: '#ffa800'

                }, {
                    name: second_name,
                    data: target_data,
                    color: '#006bc5'

                }]
            });
        }
    </script>
    <script>
        $(function () {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function (start, end, label) {
                $("#from_date").val(start.format('YYYY-MM-DD'));
                $("#to_date").val(end.format('YYYY-MM-DD'));
                //console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
    </script>
@endpush
