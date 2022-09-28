<div class="card section-2 p-t-20 p-b-0 p-l-20 p-r-20 at-time">
    <div class="row">
        <input name="running_indicator" id="running_indicator" type="hidden" value="">
        <input type="hidden" id="running_graph" value="column">
        <input type="hidden" id="running_from_date" value="">
        <input type="hidden" id="running_to_date" value="">

        <div class="col-lg-12 col-xs-12">
            <div class="border-left-0 sec-box">
                <div class="section-header d-flex">
                    <h5 class="card-title plum-title m-t-0" id="progress_header_title"></h5>
                    <div class="edging d-flex ml-auto">
                        <div class="box p-r-10 text-right">
                            <p id="progress_title" class="progress_title"></p>
                            <p id="progress_value" class="progress_value"></p>
                        </div>
                    </div>
                </div>

                <div class="box-graph text-center" id="chart_container"></div>
                <div class="p-l-0 p-r-0 col-sm-12 text-center">
                    <div class="pull-left d-flex">
                        <button id="expand-button" value="true" onclick="expandSidebar();"
                                style="border:0;
                                background: #fff;
                                font-size: 22px;
                                color: #8CC63E;
                                cursor: pointer">
                            <i class="fa fa-toggle-off"></i>
                        </button>
                        <label class="mb-1" style="margin-top: 3px;">Collapse/Expand</label>
                    </div>
                    <div class="pull-left d-flex">

                    </div>
                    <div class="pull-right">
                        <div class="btn-group" data-toggle="buttons" id="different_chart_option">
                            {{--
                            @if($geo_enable['has_district'])
                            <label class="btn btn-xs btn-danger" id="geo_down">
                                    <i class="fa fa-map-marker " aria-/="true" id='other_chart' data_id=0 data_type='Column' onclick="goto_map();"></i>
                            </label>
                            @endif
                            --}}
                        </div>
                    </div>
                </div>
                <input type="hidden" value="" id="chart_date_val_on_click_calender">
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function make_chart_for_indicator(project_name, indicator_name, category, data, target_data, unit = "", chart_type) {
            Highcharts.chart('chart_container', {
                chart: {
                    type: chart_type,
                    zoomType: 'x',
                    // panning: true,
                    // panKey: 'shift'
                },
                title: {
                    text: ""
                },
                subtitle: {
                    // text: indicator_name
                    text: indicator_name
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
                    filename: indicator_name
                },
                credits: false,
                xAxis: {
                    categories: category,
                    crosshair: true,
                    text: "বছর"
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
                        cropThreshold: 60,
                        pointPadding: 0.2,
                        borderWidth: 0
                    },
                },
                series: [{
                    name: 'Data',
                    data: data,
                    color: '#ffa800'
                }, {
                    type: 'spline',
                    name: 'Target Data',
                    data: target_data,
                    color: '#006bc5'

                }]
            });

            // axis zooming for many data
            // if (typeof data !== 'undefined') {
            //     let obj_count = parseInt(_.size(data) + 400);
            //     $('#chart_container').highcharts().xAxis[0].setExtremes(obj_count, 0);
            // }
        }

        function different_chart_change(chart_type) {
            let running_indicator = $("#running_indicator").val();
            let running_graph = chart_type;
            let from_date = $("#running_from_date").val();
            let to_date = $("#running_to_date").val();
            let type = $('.active input[name=options]').attr('data-val');

            chart_change(running_indicator, running_graph, from_date, to_date, type);
        }

        function chart_change(indicator_id, chart_type = 'column', from_date='', to_date='', type='') {
            if (from_date == '' && to_date == '') {
                let dates = $('.active input[name=options]').val();
                dates = dates.toString();
                const date = dates.split(",", 2);
                from_date = date[0];
                to_date = date[1];
            }
            $("#running_indicator").val(indicator_id);
            $('#indicator_list_drop').val(indicator_id);
            $("#running_graph").val(chart_type);
            $("#running_from_date").val(from_date);
            $("#running_to_date").val(to_date);

            let specFlag = document.getElementById('specific-value').value;

            const [division_bbs_code, district_bbs_code, upazila_bbs_code, geo_name] = getSelectedGeoAndBbsCode();

            //ajax
            let point_str = [];
            let target_str = [];
            let category_str = [];
            //let details="<li class='tt-dat1'> তারিখ    <a><span class='tt-dat2' > উন্নতি</span> <span class='tt-dat3' > মান</span></a> </li>";

            let details = "<thead><tr>" + "<th class='text-center'> তারিখ </th>" + "<th class='text-center'> অর্জন </th>" + "<th class='text-center'> পরিবর্তনের হার</th>" + "</tr></thead>";
            $.ajax({
                url: "{{ url('ajax/get-graph-data-for-service-page/') }}",
                data: {
                    "indicator_id": indicator_id,
                    "from_date": from_date,
                    "to_date": to_date,
                    "geo_name": geo_name,
                    "division_bbs_code": division_bbs_code,
                    "district_bbs_code": district_bbs_code,
                    "upazila_bbs_code": upazila_bbs_code,
                    "type":type,
                    "specFlag":specFlag
                },
                success: function (response) {
                    const parsed = JSON.parse(response);
                    const indicator_name = parsed['indicator_name'];
                    const unit = parsed['unit'];
                    const project_name = parsed['project_name'];
                    let loop_data = parsed['point_data'];
                    loop_data.forEach(function (element) {
                        point_str.push(element.data);
                        category_str.push(element.date);
                        target_str.push(element.target_data);
                    });

                    make_chart_for_indicator(project_name, indicator_name, category_str, point_str, target_str, unit, chart_type);

                    //change the right portion
                    $("#indicator_name_details").html(indicator_name);
                    loop_data = parsed['details_data'];
                    let data_length = loop_data.length;
                    if (data_length > 0) {
                        data_length--;

                        let pre_val;
                        let post_val;

                        for (i = data_length; i >= 0; i--) {
                            let progrss = "";
                            if (i !== 0) {
                                pre_val = loop_data[i - 1]['data'];
                                post_val = loop_data[i]['data'];
                                pre_val = parseFloat(bangla_to_english(pre_val));
                                post_val = parseFloat(bangla_to_english(post_val));

                                p = ((post_val / pre_val) * 100) - 100;
                                percent = english_to_bangla(p.toFixed(2));
                                if (pre_val > post_val) {
                                    progrss = percent + '%' + '<i class="fa fa-arrow-down fa-lg d-arr" aria-hidden="true"></i> ';
                                } else if (pre_val == post_val) {
                                    progrss = percent + '%' + '<i class="fa fa-arrows-h fa-lg eq-arr" aria-hidden="true"></i> ';
                                } else {
                                    progrss = percent + '%' + '<i class="fa fa-arrow-up fa-lg u-arr" aria-hidden="true"></i> ';
                                }
                            } else {
                                progrss = '<i class="fa fa-ars-h fa-lg eq-arr" aria-hidden="true"></i>';
                            }
                            //details +="<li> <a>"+ loop_data[i]['date'] +"<span class='tt-dat2' >"+ progrss +"</span> "+"<span class='tt-dat3' >"+ loop_data[i]['data'] +"</span>  </a> </li>";
                            details += "<tbody style='text-align: center;'> <tr>" + "<td>" + loop_data[i]['date'] + "</td>" + "<td>" + loop_data[i]['data'] + " " + unit + "</td>" + "<td>" + progrss + "</td>" + "</tr> </tbody>";
                        }
                    } else {
                        details += "";
                    }
                    $("#progress_report").val(details);
                    $("#progress_report").attr('data-val',indicator_name);
                    

                    $("#details_data_portion").html();
                    $("#details_data_portion").html(details);

                    //progress
                    $("#progress_header_title").html();
                    $("#progress_header_title").html(indicator_name);

                    $("#progress_title").html();
                    $("#progress_title").html(parsed['progress']['title']);

                    if (parseInt(parsed['progress']['pve']) == 1) {
                        $("#progress_value").removeClass("text-danger");
                        $("#progress_value").addClass("text-success");
                    } else {
                        $("#progress_value").removeClass("text-success");
                        $("#progress_value").addClass("text-danger");
                    }

                    $("#progress_value").html();
                    //$("#progress_value").html(parsed['progress']['parcent']+parsed['progress']['suffix']);

                    //different graph option
                    $('#different_chart_option').html("");

                    var different_chart_option = "";
                    var default_chart = parsed['default_chart'];
                    loop_data = parsed['chart'];
                    loop_data.push(default_chart);
                    var chart_list = parsed['chart_list'];
                    data_length = loop_data.length;
                    if (data_length > 1) {
                        data_length--;
                    }
                    for (i = data_length; i >= 0; i--) {
                        different_chart_option += '<label class="btn btn-xs btn-primary" onclick="different_chart_change(\'' + chart_list[loop_data[i]] + '\');">';
                        different_chart_option += '<input type="radio" name="options" id="option2">';
                        if (loop_data[i] == '3') {
                            different_chart_option += '<i class="fa fa-bar-chart other_chart" aria-hidden="true" id="other_chart" onclick="different_chart_change(\'' + chart_list[loop_data[i]] + '\');"></i>';
                        } else {
                            different_chart_option += '<i class="fa fa-' + chart_list[loop_data[i]] + '-chart other_chart" aria-hidden="true" id="other_chart" onclick="different_chart_change(\'' + chart_list[loop_data[i]] + '\');"></i>';
                        }
                        different_chart_option += '</label>';
                    }
                    $('#different_chart_option').html(different_chart_option);

                },
                error: function (xhr) {
                    $("#indicator_wise_raw_data").html('কোনো ডাটা নেই');
                }
                //
            });
            //end ajax
            //change the drop down
            //$("#indicator_list_drop").val(indicator_id).change();

            event.preventDefault();
            make_chart_for_indicator();
        }

        $(document).ready(function () {
            $("#indicator_list_drop").change(function () {
                let options = $('.active input[name=options]');
                let indicator_id = this.value;
                let dates = options.val();
                dates = dates.toString();
                const date = dates.split(",", 2);
                let running_graph = $("#running_graph").val();
                let indicator_user_category = $('.active input[name=user_section]').val();
                let type = options.attr('data-val');

                different_charts(indicator_id, running_graph, date[0], date[1], indicator_user_category, type)
            });
        });

        function onclick_date(from_date, to_date, type='') {
            var running_indicator = $("#running_indicator").val();
            var running_graph = $("#running_graph").val();
            let indicator_user_category = $('.active input[name=user_section]').val();
            different_charts(running_indicator, running_graph, from_date, to_date, indicator_user_category, type)
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function () {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                let dt = start.format('YYYY-MM-DD') + ',' + end.format('YYYY-MM-DD');
                $("#chart_date_val_on_click_calender").val(dt);
                //$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                onclick_date(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'), 'likeWise');
            }

            var $picker = $('#reportrange').daterangepicker({
                opens: 'center',
                drops: 'up',
                linkedCalendars: false,
                autoUpdateInput: false,
                showCustomRangeLabel: false,
                //parentEl:'',
                startDate: start,
                endDate: end
            }, cb);

            // cb(start, end);

            // var $picker = $('#reportrange').daterangepicker({
            // "startDate": "08/15/2019",
            // "endDate": "08/21/2019",
            // "drops": "up"
            // }, function(start, end, label) {
            // console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
            // });

            $picker.on('show.daterangepicker', function (ev, picker) {
                if (picker.element.offset().top - $(window).scrollTop() + picker.container.outerHeight() > $(window).height()) {
                    picker.drops = 'up';
                } else {
                    picker.drops = 'down';
                }
                picker.move();
            });
        });
    </script>
@endpush
