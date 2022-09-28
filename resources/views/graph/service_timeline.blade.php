<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['তারিখ', 'সেবা','টার্গেট'],
            @foreach($calendarDates as $key => $calendarDate)
            ['{{ @\App\Common::getMonth($calendarDate->date_month)."\,". @\App\Common::convertToUnicode($calendarDate->date_year)  }}', {{ 55+$key+rand(50,100)  }},{{ 100+$key+rand(100,200)  }} ],
            @endforeach
        ]);

        var options = {
//            animation: {"startup": true,duration: 1500},
            chartArea: {'top': '50','right': '5', 'width': '90%', 'height': '60%'},
            title: '',
            legend: {position: 'top'},
            colors: ['#53B1D8', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6'],
            series: {1: {type: 'line'}},
            fontName:'SolaimanLipi',
            hAxis: {textStyle:{fontName:'SolaimanLipi'},title: 'মাস', direction:-1,slantedText:true,slantedTextAngle:90,titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0,textStyle:{fontName:'Nikosh'},title: 'কোটি'}
            //backgroundColor: '#F0F3F4'
        };

        var chart = new google.visualization.AreaChart(document.getElementById('service_timeline'));
        chart.draw(data, options);
    }

</script>
<div id="service_timeline" style="width: 100%; height: 450px;"></div>
