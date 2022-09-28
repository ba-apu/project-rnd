<script type="text/javascript">
    var dataArr = '<?= json_encode($data) ?>';
    dataArr  = JSON.parse(dataArr);
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable(dataArr);

        var options = {
            animation: {"startup": true,duration: 1500},
            chartArea: {'top': '50', 'width': '90%', 'height': '70%'},
            title: '',
            legend: { position: 'top', maxLines: '6'},
           // backgroundColor: '#F0F3F4'
        };

        var chart = new google.visualization.AreaChart(document.getElementById('provider-timeline'));
        chart.draw(data, options);
    }

</script>
<div id="provider-timeline" style="width: 100%; height: 300px;"></div>
