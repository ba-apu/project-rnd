<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['উদ্যোগ', 'টার্গেট', 'বর্তমান'],
            ['নথি', 1000, 400],
            ['ই-মিঊটেশন', 1170, 460],
            ['আর এস খতিয়ান', 660, 1120],
            ['পর্চা', 1030, 540],
            ['বাতায়ন', 1030, 540]
        ]);

        var options = {
            chart: {
                title: 'Company Performance',
                subtitle: 'Sales, Expenses, and Profit: 2014-2017',
            }
        };

       // var chart = new google.charts.Bar(document.getElementById('office-reach'));
        var chart = new google.visualization.ColumnChart(document.getElementById('office-reach'));
        chart.draw(data, options);
    }

</script>
<div id="office-reach" style="width: 100%; height: 300px;"></div>
