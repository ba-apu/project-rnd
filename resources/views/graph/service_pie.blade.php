<?php $services =\App\Indicator::where('project_id',16)->get();  //\Session::get('serviceLists'); ?>
<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['', ''],
            @foreach($services as $service)
                ['{{$service->name}}',     {{ rand(150000, 3500000) }}],
            @endforeach
        ]);

        var options = {
            title: '',
            pieHole: 0.4,
            pieSliceText: "none",
            legend: {position: 'none'}
        };

        var chart = new google.visualization.PieChart(document.getElementById('service_pie'));
        chart.draw(data, options);
    }

</script>
<div id="service_pie" style="width: 100%; height: 300px;"></div>
