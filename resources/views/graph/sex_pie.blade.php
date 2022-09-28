<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['', ''],
            ['পুরুষ',     {{ rand(150000, 3500000) }}],
            ['মহিলা',      {{ rand(150000, 3500000) }}],
        ]);

        var options = {
            title: '',
            pieHole: 0.4,
//            pieSliceText: "none",
            legend: { position: 'top', maxLines: '6'},
        };

        var chart = new google.visualization.PieChart(document.getElementById('sex-pie'));
        chart.draw(data, options);
    }

</script>
<div id="sex-pie" style="width: 100%; height: 300px;"></div>
