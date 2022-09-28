@extends('layout.frontend')
@section('content')
    <style>
        a.am5exporting-icon,
        .am5exporting-list {
            background: #C2FFE2;
        }

        a.am5exporting-icon:hover,
        .am5exporting-menu-open a.am5exporting-icon{
            background: #85FFC4;
        }

        .am5exporting-list {
            background: #FEFEFE;
        }

        .am5exporting-item a:hover {
            background: #F0F0F0;
        }

        #chartdiv {
            width: 100%;
            height: 400px;
        }

        .all-border {
            border: 1px solid;
        }

        .right-border {
            border-right: 1px solid;
        }

        .border-round {
            border-radius: 5px;
        }
    </style>
    <div class="container-fluid  mb-5">
        <div class="form-inline m-1">
            <img src="{{ custom_asset('assets/img/projects/'.$project->logo) }}"
                 alt="logo" width="75" height="75">
            <h3 class="ml-3">{{$project->bangla_name}}</h3>
        </div>
        <div class="p-2 mt-3 bg-white all-border border-round" style="color:#50beff">
            <div class="text-left pl-3">
                <h4>{{$indicator_data['bn_name']}}</h4>
            </div>
            <hr>
            <div class="row">
                <div class="col-9 right-border" style="color:#50beff;">
                    <div id="chartdiv"></div>
                </div>
                <div class="col-3">
                    <div class="py-4 px-1 text-center all-border"
                         style="background-color: #d6e5ff">
                        <h2 class="m-0">{{english_to_bangla(number_conversion($indicator_data['target_data']))}}</h2>
                        <h6 class="text-muted"><i class="fa fa-square fa-fw" style="color:#f61c92;"></i>
                            প্রস্তাবিত সময়সীমার লক্ষ্যমাত্রা</h6>
                        <hr class="my-0" style="border-color:#8e8e91;width: 75%;">
                        <h2 class="m-0">{{english_to_bangla(number_conversion($indicator_data['real_data']))}}</h2>
                        <div class="d-inline-flex">
                            <h6 class="text-muted"><i class="fa fa-square fa-fw" style="color:#257ef7;"></i> এখন
                                পর্যন্ত অর্জন </h6>
                            {{--                            <span class="text-success pt-3 pl-3 fs-11"><i class="fa fa-arrow-up"></i>১২%</span>--}}
                        </div>
                        <hr class="my-0" style="border-color:#8e8e91;width: 75%;">
                        <h2 class="m-0">{{english_to_bangla($indicator_data['percentage'])}}% </h2>
                        <div class="d-inline-flex my-0">
                            <h6> বর্তমান পর্যন্ত অর্জন </h6>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row p-2" id="coefficient-data">
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/plugins/exporting.js"></script>

    <script>
        am5.ready(function () {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("chartdiv");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([
                am5themes_Animated.new(root)
            ]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root.container.children.push(
                am5xy.XYChart.new(root, {
                    panX: true,
                    panY: true,
                    wheelX: "panX",
                    wheelY: "zoomX",
                    layout: root.verticalLayout
                })
            );

// Add cursor
// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {
                behavior: "none"
            }));
            cursor.lineY.set("visible", false);

            // The data
            var data = '<?php echo json_encode($monthly_filtered_data); ?>';
            data = JSON.parse(data);
// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xRenderer = am5xy.AxisRendererX.new(root, {});
            xRenderer.grid.template.set("location", 0.5);
            xRenderer.labels.template.setAll({
                location: 0.5,
                multiLocation: 0.5
            });

            var xAxis = chart.xAxes.push(
                am5xy.CategoryAxis.new(root, {
                    categoryField: "month",
                    renderer: xRenderer,
                    tooltip: am5.Tooltip.new(root, {})
                })
            );

            xAxis.data.setAll(data);

            var yAxis = chart.yAxes.push(
                am5xy.ValueAxis.new(root, {
                    maxPrecision: 0,
                    renderer: am5xy.AxisRendererY.new(root, {
                        inversed: false
                    })
                })
            );

// Add series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/

            function createSeries(name, field, dashed) {
                var series = chart.series.push(
                    am5xy.LineSeries.new(root, {
                        name: name,
                        xAxis: xAxis,
                        yAxis: yAxis,
                        valueYField: field,
                        categoryXField: "month",
                        stroke: am5.color(0x257EF7),
                        tooltip: am5.Tooltip.new(root, {
                            pointerOrientation: "horizontal",
                            labelText: "{name}[/]\n{categoryX}: [bold]{valueY}"
                        })
                    })
                );

                series.strokes.template.setAll({
                    strokeWidth: 3
                });

                if (dashed) {
                    series.strokes.template.set("strokeDasharray", [5, 3]);
                    series.fills.template.setAll({
                        visible: false
                    });
                } else {
                    series.fills.template.setAll({
                        visible: true,
                        fillOpacity: 0.2
                    });
                }

                // Create animating bullet by adding two circles in a bullet container and
                // animating radius and opacity of one of them.
                series.bullets.push(function (root, series, dataItem) {
                    if (dataItem.dataContext.bullet) {
                        var graphics = am5.Circle.new(root, {
                            strokeWidth: 2,
                            radius: 6,
                            stroke: series.get("stroke"),
                            fill: root.interfaceColors.get("background")
                        });
                        return am5.Bullet.new(root, {
                            sprite: graphics
                        });
                    }
                });

                // create hover state for series and for mainContainer, so that when series is hovered,
                // the state would be passed down to the strokes which are in mainContainer.
                series.set("setStateOnChildren", true);
                series.states.create("hover", {});
                series.mainContainer.set("setStateOnChildren", true);
                series.mainContainer.states.create("hover", {});
                series.strokes.template.states.create("hover", {
                    strokeWidth: 4
                });

                series.data.setAll(data);
                series.appear(1000);
            }

            function createSeries2(name, field) {
                var series = chart.series.push(
                    am5xy.LineSeries.new(root, {
                        name: name,
                        xAxis: xAxis,
                        yAxis: yAxis,
                        valueYField: field,
                        categoryXField: "month",
                        stroke: am5.color(0xF61C92),
                        tooltip: am5.Tooltip.new(root, {
                            pointerOrientation: "horizontal",
                            labelText: "{name}[/]\n{categoryX}: [bold]{valueY}"
                        })
                    })
                );

                series.strokes.template.setAll({
                    strokeWidth: 3
                });

                // create hover state for series and for mainContainer, so that when series is hovered,
                // the state would be passed down to the strokes which are in mainContainer.
                series.set("setStateOnChildren", true);
                series.states.create("hover", {});
                series.mainContainer.set("setStateOnChildren", true);
                series.mainContainer.states.create("hover", {});
                series.strokes.template.states.create("hover", {
                    strokeWidth: 4
                });

                series.data.setAll(data);
                series.appear(1000);
            }

            // create range (the additional label at the bottom)
            var range = xAxis.makeDataItem({});
            xAxis.createAxisRange(range);

            range.set("category", '{{$dissection_month}}');

            var grid = range.get("grid");
            grid.setAll({strokeOpacity: 1});

            createSeries("Observed", "observed");
            createSeries("Projection", "projection", true);
            createSeries2("Target", "target");

// Add legend
// https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
            var legend = chart.children.push(
                am5.Legend.new(root, {
                    centerX: am5.p50,
                    x: am5.p50
                })
            );

            legend.data.setAll(chart.series.values);

// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
            chart.appear(1000, 100);

            var exporting = am5plugins_exporting.Exporting.new(root, {
                menu: am5plugins_exporting.ExportingMenu.new(root, {}),
                dataSource: data
            });

            exporting.events.on("dataprocessed", function(ev) {
                for(var i = 0; i < ev.data.length; i++) {
                    ev.data[i].sum = ev.data[i].value + ev.data[i].value2;
                }
            });

        }); // end am5.ready()
    </script>

    <script>
        $(document).ready(function () {
            $.ajax({
                url: "{{ url('ajax/get-coefficient-api-data') }}",
                data: {
                    'collection_name': "{{$collection_name}}",
                    'indicator_id': "{{$indicator_data['id']}}",
                    'indicator_name': "{{$indicator_data['bn_name']}}",
                    type: "get",
                    dataType: "json"
                },
                success: function (response) {
                    //Do Something
                    $('#coefficient-data').html(response.viewData)
                    // console.log(response);
                },
                error: function (xhr) {

                }
            });
        });
    </script>
@endpush
