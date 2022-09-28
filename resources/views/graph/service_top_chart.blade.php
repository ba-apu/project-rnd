<script type="text/javascript">
var dataArr = '<?= json_encode($data) ?>';
    dataArr  = JSON.parse(dataArr);
	
	//console.log('dataArr : ' + dataArr);
	
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
		var data = google.visualization.arrayToDataTable(dataArr);	 
		var options = {
            animation: {"startup": true,duration: 1500},
            chartArea: {'top': '50','right': '5', 'width': '90%', 'height': '60%'},
            title: '',
            legend: {position: 'top'},
            colors: ['#53B1D8', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6'],
            series: {1: {type: 'line'}},
            fontName:'SolaimanLipi',
            hAxis: {textStyle:{fontName:'SolaimanLipi'},title: 'মাস', direction:1,slantedText:true,slantedTextAngle:90,titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0,textStyle:{fontName:'Nikosh'},title: '.'}
            //backgroundColor: '#F0F3F4'
        };

        var chart = new google.visualization.{{$type}}Chart(document.getElementById('service_timeline'));
        chart.draw(data, options);
    }

</script>
<div id="service_timeline" style="width: 100%; height: 450px;"></div>

