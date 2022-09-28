<?php
$datas[]['datefield']="new Date(2019, 07, 01)";
$datas[]['datefield']="new Date(2019, 08, 01)";
$datas[]['datefield']="new Date(2019, 09, 01)";
?>
<?php //echo "<pre>"; print_r($calendarDates); die; ?>
<?php //$services =$indicators =\App\Indicator::where('project_id',16)->get();  //\Session::get('serviceLists'); ?>
<script type="text/javascript">


    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['তারিখ',
                @foreach($graph_data["service"] as $service_name)
                    '{{ $service_name }}',
                @endforeach
            ],
                @foreach($graph_data["data"] as $date=>$date_data)
                    [   '{{date('M-Y', strtotime($date))}}',
                    @foreach($date_data as $val)
                        {{$val}},
                    @endforeach
                    ],
                @endforeach
        ]);

        //console.log(data);
        var options = {
            animation: {"startup": true,duration: 1500},
            chartArea: {'top': '20', 'width': '80%', 'height': '70%'},
            title: '',
            isStacked: true,
            legend: {position: 'top'}
           // backgroundColor: '#F0F3F4'
        };

        var chart = new google.visualization.AreaChart(document.getElementById('services_lists_timeline'));
        chart.draw(data, options);
    }

</script>
<div id="services_lists_timeline" style="width: 100%; height: 300px;"></div>
