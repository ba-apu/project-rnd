<script type="text/javascript">
    var dataArr = '<?= json_encode($graph_data) ?>';
    dataArr  = JSON.parse(dataArr);

    //console.log('dataArr : ' + dataArr);
    <?php
    $indicators =\App\Indicator::where('project_id',16)->get();  //\Session::get('serviceIndicator');
    //$indicators = array_reverse($indicators);
    ?>
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable(dataArr);
        var options = {
            animation: {"startup": true,duration: 1500},
            chartArea: {'top': '50', 'width': '80%', 'height': '60%'},
            title: '',
            legend: {position: 'none'}
//            backgroundColor: '#F0F3F4'
        };

        var chart = new google.visualization.LineChart(document.getElementById('service_cluster_timeline'));
        chart.draw(data, options);
    }

</script>
<div id="service_cluster_timeline" style="width: 100%; height:{{ $height }}px;"></div>