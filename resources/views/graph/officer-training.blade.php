<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Month',       'প্রশিক্ষণ', 'লক্ষ্যমাত্রা'],
            ['Jan,18',      8.4,         7.9],
            ['Feb,18',      6.9,         6.5],
            ['Mar,18',      6.5,         6.4],
            ['Apr,18',      4.4,         6.2],
            ['May,18',      4.4,         6.2],
            ['jun,18',      4.4,         6.2],
            ['jul,18',      4.4,         6.2],
            ['Aug,18',      4.4,         6.2],
            ['Sep,18',      4.4,         6.2],
            ['Auc,18',      4.4,         6.2],
            ['Nov,18',      4.4,         6.2],
            ['Dec,18',      4.4,         6.2],
            ['Jan,19',      4.4,         6.2],
            ['Feb,19',      4.4,         6.2],
            ['Mar,19',      4.4,         6.2],
            ['Apr,19',      4.4,         6.2],
        ]);

        var options = {
            title: 'The decline of \'The 39 Steps\'',
            vAxis: {title: 'Accumulated Rating'},
            isStacked: true
        };

        var chart = new google.visualization.SteppedAreaChart(document.getElementById('officer-training'));
        chart.draw(data, options);
    }

</script>
<div id="officer-training" style="width: 100%; height: 300px;"></div>
