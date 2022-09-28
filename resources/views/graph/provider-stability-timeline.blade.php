<?php $indicatorLists =  \Session::get('indicatorLists'); ?>
<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['তারিখ',
            @foreach($indicatorLists as $key => $indicator)
                '{{ $indicator }}',
            @endforeach
            ]
            ,
            @foreach($calendarDates as $key => $calendarDate)
                [{{ @$calendarDate->datefield }},
                @foreach($indicatorLists as $key2 => $indicator)
                    {{ $key2*30+$key+rand(10,20)  }},
                @endforeach
                ],
            @endforeach
        ]);


        var options = {
            animation: {"startup": true,duration: 1500},
            chartArea: {'top': '50', 'width': '90%', 'height': '70%'},
            title: '',
            legend: {position: 'none'}
            // backgroundColor: '#F0F3F4'
        };

        var chart = new google.visualization.AreaChart(document.getElementById('provider-stability-timeline'));
        chart.draw(data, options);
    }

</script>
<div id="provider-stability-timeline" style="width: 100%; height: 180px;"></div>
