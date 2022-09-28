<div class="card bg-white m-t-20" id="indicator_progress">
    <div class="card-block bg-white">
        <div class="row">
            <div class="card-header border-bottom txt-18 m-b-20 text-primary">
                সূচক ভিত্তিক অগ্রগতি
            </div>
            @if($slug == '333')
                <div class="ml-auto">
                    <a href="https://uat-insightdb.oss.net.bd/login" class="btn btn-primary" type="button"
                       target="_blank">
                        রেটিং
                    </a>
                </div>
            @endif

        </div>

        <div class="row mx-1">
            <div class="col-6" id="chartjs-radar">
                <div class="dropdown" style="position: absolute;right:15px;">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-lg fa-download"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" width="100%">
                        <a href="#" id="exportProgressRadar" class="p-1">PNG</a>
                    </div>
                </div>
                <canvas id="radar-canvas"></canvas>
            </div>
            <div class="col-6 side-progress">
                <table width="100%" class="table">
                    <thead>
                    <tr>
                        <th colspan="2" class="borderless"></th>
                        <th colspan="2" class="text-center font-lg borderless" style="color:darkviolet !important;">
                            এখন
                            পর্যন্ত অগ্রগতি
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2" class="borderless"></th>
                        <th colspan="2"
                            class="text-center font-md borderless border-l border-r">
                            {{$current_month_year}}
                            পর্যন্ত
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2" class="text-right font-sm borderless">{{$current_month_year}}</th>
                        <th class="text-center font-md borderless border-l border-b">লক্ষ্যমাত্রা</th>
                        <th class="font-md borderless border-r border-b" style="padding-left: 60px !important;">অর্জন
                        </th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($indicator_data as $key=>$info)
                        <tr>
                            <td class="borderless" style="width:18%">
                                <div class="d-flex flex-row pt-1" style="width: 150px !important;">
                                    <a href="{{url('dashboard/indicator-wise-prediction/'.$info['project_id'].'/'.$info['id'])}}"
                                       class="hoverBtn wrap-word-landing" style="color:black;width: 135px !important;"
                                       data-toggle="tooltip" title="{{$info['bangla_name']}} ({{$info['unit']}})">
                                                <span class="onHover" style="color:#2f98ba"><i
                                                        class="fa fa-arrow-right"></i> </span>
                                        {{$info['bangla_name']}}
                                    </a>
                                    ({{$info['unit']}})
                                </div>
                            </td>
                            <td class="text-center borderless p-0" style="width:25%">
                                <div class="progress custom-progress">
                                    <div class="progress-bar custom-bar progress-bar-complete" role="progressbar"
                                         style="width: {{$info['percentage']}}%;"
                                         aria-valuenow="{{$info['percentage']}}" aria-valuemin="0"
                                         aria-valuemax="100">
                                    </div>
                                    <span>{{english_to_bangla($info['percentage'])}}%</span>
                                </div>

                            </td>
                            <td class="text-center borderless border-l p-0" style="width:15%">
                                <div style="background-color: #e3e3e3">
                                    {{english_to_bangla(bdtFormat($info['target_data']))}}
                                </div>
                            </td>
                            <td class="text-center borderless border-r p-0" style="width:40%">
                                <div class="form-inline">
                                <span class="col-9" style="background-color: #e3e3e3">
                                    {{english_to_bangla(bdtFormat($info['real_data']))}}
                                </span>
                                    @php
                                        $progress = english_to_bangla($info['percentage']);
                                    @endphp
                                    <span class="py-1">
                                        @if($info['percentage'] < 25 && $info['percentage'] >= 0)
                                            <div class="circle red-circle">
                                            <span class="text-black fs-11">{{$progress}}%</span>
                                        </div>
                                        @elseif($info['percentage'] < 50 && $info['percentage'] >= 25)
                                            <div class="circle orange-circle">
                                            <span class="text-black fs-11">{{$progress}}%</span>
                                        </div>
                                        @elseif($info['percentage'] < 75 && $info['percentage'] >= 50)
                                            <div class="circle blue-circle">
                                            <span class="text-black fs-11">{{$progress}}%</span>
                                        </div>
                                        @elseif($info['percentage'] >= 75)
                                            <div class="circle green-circle">
                                            <span class="text-black fs-11">{{$progress}}%</span>
                                        </div>
                                        @endif
                                </span>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                <hr>
            </div>
        </div>
        <div class="offset-md-4 col-8 my-2">
            <div class="d-flex flex-row ml-5 justify-content-end">
                <div class="legend-circle green-circle mt-1">
                </div>
                <span class="fs-11 lh-25 px-1">খুবই সন্তোষজনক (৮০% +)</span>

                <div class="legend-circle blue-circle mt-1">
                </div>
                <span class="fs-11 lh-25 px-1">তুলনামূলকভাবে সন্তোষজনক (৬০%-৭৯%)</span>

                <div class="legend-circle orange-circle mt-1">
                </div>
                <span class="fs-11 lh-25 px-1">সন্তোষজনক নয়(৫০% - ৫৯%)</span>

                <div class="legend-circle red-circle mt-1">
                </div>
                <span class="fs-11 lh-25 px-1">অতি দূর্বল, গ্রহণযোগ্য নয়(০%-৪৯%)</span>
            </div>
        </div>

    </div>
</div>

@push('scripts')
    <script>
        //Radar chart intialize with data
        window.chartColors = {
            blue: 'rgb(54, 162, 235)',
            purple: 'rgb(153, 102, 255)'
        };

        window.randomScalingFactor = function () {
            return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
        };

        const randomScalingFactor = function () {
            return Math.round(Math.random() * 100);
        };

        const label = "অর্জন (%)";
        const color = Chart.helpers.color;
        const config = {
            type: 'radar',
            data: {
                labels: @json(array_keys($chart_data)),
                datasets: [{
                    label: label,
                    backgroundColor: color(window.chartColors.purple).alpha(0.2).rgbString(),
                    borderColor: window.chartColors.purple,
                    pointBackgroundColor: window.chartColors.purple,
                    data: @json(array_values($chart_data))
                }]
            },
            options: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: false,
                    text: ''
                },
                scale: {
                    ticks: {
                        beginAtZero: true
                    }
                },
                responsive: true,
                maintainAspectRatio: false,

                tooltips: {
                    enabled: false,
                    callbacks: {
                        label: function (tooltipItem, data) {
                            const datasetLabel = data.datasets[tooltipItem.datasetIndex].label || '';
                            //This will be the tooltip.body
                            return datasetLabel + ': ' + tooltipItem.yLabel;
                        }
                    },
                    custom: function (tooltip) {
                        // Tooltip Element
                        let tooltipEl = document.getElementById('chartjs-tooltip');
                        if (!tooltipEl) {
                            tooltipEl = document.createElement('div');
                            tooltipEl.id = 'chartjs-tooltip';
                            tooltipEl.innerHTML = "<table></table>"
                            document.body.appendChild(tooltipEl);
                        }
                        // Hide if no tooltip
                        if (tooltip.opacity === 0) {
                            tooltipEl.style.opacity = 0;
                            return;
                        }
                        // Set caret Position
                        tooltipEl.classList.remove('above', 'below', 'no-transform');
                        if (tooltip.yAlign) {
                            tooltipEl.classList.add(tooltip.yAlign);
                        } else {
                            tooltipEl.classList.add('no-transform');
                        }

                        function getBody(bodyItem) {
                            return bodyItem.lines;
                        }

                        // Set Text
                        if (tooltip.body) {
                            const titleLines = tooltip.title || [];
                            const bodyLines = tooltip.body.map(getBody);
                            let innerHtml = '<thead>';
                            titleLines.forEach(function (title) {
                                innerHtml += '<tr>' +
                                    '<th style="text-align: left;' +
                                    ' color: white;' +
                                    ' font-family: Arial;' +
                                    ' font-size: 15px;">' + title + '</th>' +
                                    '</tr>';
                            });
                            innerHtml += '</thead><tbody>';
                            bodyLines.forEach(function (body, i) {
                                const colors = tooltip.labelColors[i];
                                let style = 'background:' + colors.backgroundColor;
                                style += '; border: 1px solid white !important';
                                const span = '<span class="chartjs-tooltip-key" style="' + style + '"></span>';
                                innerHtml += '<tr>' +
                                    '<td style="text-align: left; ' +
                                    'color: white;' +
                                    'font-family: Arial;' +
                                    'font-size: 12px">' + span + body + '</td>' +
                                    '</tr>';
                            });
                            innerHtml += '</tbody>';
                            const tableRoot = tooltipEl.querySelector('table');
                            tableRoot.innerHTML = innerHtml;
                        }
                        const position = this._chart.canvas.getBoundingClientRect();
                        // Display, position, and set styles for font
                        tooltipEl.style.opacity = 1;
                        tooltipEl.style.left = position.left + tooltip.caretX + 'px';
                        tooltipEl.style.top = position.top + tooltip.caretY + 'px';
                        tooltipEl.style.fontFamily = tooltip._fontFamily;
                        tooltipEl.style.fontSize = tooltip.fontSize;
                        tooltipEl.style.fontStyle = tooltip._fontStyle;
                        tooltipEl.style.padding = tooltip.yPadding + 'px ' + tooltip.xPadding + 'px';
                    }
                }
            }
        };

        const ctx = document.getElementById("radar-canvas").getContext('2d');
        let radar_chart = new Chart(ctx, config);

        $('#exportProgressRadar').click(function (event) {
            /* set new title */
            // radar_chart.options.title.text = 'Target Achievement Radar Chart';
            // radar_chart.update({
            //     duration: 0
            // });
            // or, use
            // chart_variable.update(0);

            /* save as image */
            let link = document.createElement('a');
            link.href = radar_chart.toBase64Image();
            link.download = 'radarChart.png';
            link.click();
        });
    </script>
@endpush
