<div class="card-block bg-white p-0">
	{{--	@if(!$for_map_page)--}}
	{{--		<div class="p-r-0 card-header border-bottom txt-18 m-b-20 text-primary">সারাদেশ--}}
	{{--			<div class="float-right p-r-0 col-lg-6 d-inline-block btn-group text-right" data-toggle="buttons">--}}
	{{--				<select id="map_indicator" class="custom-select cs-select" onchange="map_indicator_change()">--}}
	{{--					<option> বাছাই করুন</option>--}}
	{{--					@forelse($indicator_drop_down as $indecator_list)--}}
	{{--						@if(is_numeric($indecator_list->geo_type))--}}
	{{--							<option value="{{$indecator_list->id}}"> {{($indecator_list->short_form)?$indecator_list->short_form:$indecator_list->bangla_name}} </option>--}}
	{{--						@endif--}}
	{{--					@empty--}}
	{{--						<option> </option>--}}
	{{--					@endforelse--}}
	{{--				</select>--}}
	{{--			</div>--}}
	{{--		</div>--}}
	{{--	@else--}}
	{{--		<div class="p-r-0  border-bottom txt-16 m-b-20 p-b-10 text-primary">{{ english_to_bangla(date('F, Y',strtotime($date))) }}--}}

	{{--		</div>--}}
	{{--	@endif--}}

	<div class="row">
		<div class="col-md-6">
			@include('map.map')
		</div>
		<div class="col-md-6">
			<div class="m-b-20"></div>
			<div class="no-padding auto-overflow widget-11-2-table" id="map_table_div_two" style="height: 700px;">
				<table id="table-sparkline" class="table-bordered table-striped" width="100%" >
					<thead class="">
					<tr>
						<th class="text-center" style="background:#912C8A; color:#fff;"> # </th>
						<th class="text-center" style="background:#912C8A; color:#fff;"> জেলা </th>
						@foreach($indecator_lists as $indecator_list)
							<th class="padding-10" style="background:#912C8A; color:#fff;" title="{{ $indecator_list->bangla_name }}" colspan="2"><i class="fa fa-building-o" aria-hidden="true"></i>
								{{ ($indecator_list->short_form)?$indecator_list->short_form:$indecator_list->bangla_name }}</th>
						@endforeach
					</tr>
					</thead>
					<tbody>
					@foreach($districts as $key => $district)
						<tr>
							<td class="text-center">{{ english_to_bangla($key+1) }}</td>
							<td class="p-l-10" colspan="2">
								@if($has_upazila)
									<a href="#" @if(isset($data[$district->bbscode])) onclick="map_drill_down('{{ $district->bbscode }}','{{ $district->name }}',{{$indicator_id}})" @endif >{{ $district->name }}</a>
								@else
									{{ $district->name }}
								@endif
							</td>
							@foreach($indecator_lists as $key=>$indecator_list)
								<td class="p-l-10">
									@if(isset($data[$district->bbscode][$indecator_list->id]))
										{{ english_to_bangla(bdtFormat($data[$district->bbscode][$indecator_list->id]['value']))}} {{$indecator_list->unit}}
									@else
										০ {{$indecator_list->unit}}
									@endif
								</td>
								{{--<td data-sparkline="@if(isset($data[$district->id][$indecator_list->id])) {{ $data[$district->id][$indecator_list->id]['graph_points'] }} @endif"/></td>--}}
							@endforeach
						</tr>
					@endforeach
					</tbody>
				</table>
				<!-- -->
			</div>
		</div>
	</div>

</div>

<script>
	/**
	 * Create a constructor for sparklines that takes some sensible defaults and merges in the individual
	 * chart options. This function is also available from the jQuery plugin as $(element).highcharts('SparkLine').
	 */
	// Highcharts.SparkLine = function (a, b, c) {
	// 	var hasRenderToArg = typeof a === 'string' || a.nodeName,
	// 			options = arguments[hasRenderToArg ? 1 : 0],
	// 			defaultOptions = {
	// 				chart: {
	// 					renderTo: (options.chart && options.chart.renderTo) || this,
	// 					backgroundColor: null,
	// 					borderWidth: 0,
	// 					type: 'area',
	// 					margin: [2, 0, 2, 0],
	// 					width: 120,
	// 					height: 20,
	// 					style: {
	// 						overflow: 'visible'
	// 					},
	//
	// 					// small optimalization, saves 1-2 ms each sparkline
	// 					skipClone: true
	// 				},
	// 				title: {
	// 					text: ''
	// 				},
	// 				credits: {
	// 					enabled: false
	// 				},
	// 				xAxis: {
	// 					labels: {
	// 						enabled: false
	// 					},
	// 					title: {
	// 						text: null
	// 					},
	// 					startOnTick: false,
	// 					endOnTick: false,
	// 					tickPositions: []
	// 				},
	// 				yAxis: {
	// 					endOnTick: false,
	// 					startOnTick: false,
	// 					labels: {
	// 						enabled: false
	// 					},
	// 					title: {
	// 						text: null
	// 					},
	// 					tickPositions: [0]
	// 				},
	// 				legend: {
	// 					enabled: false
	// 				},
	// 				tooltip: {
	// 					hideDelay: 0,
	// 					outside: true,
	// 					shared: true
	// 				},
	// 				plotOptions: {
	// 					series: {
	// 						animation: false,
	// 						lineWidth: 1,
	// 						shadow: false,
	// 						states: {
	// 							hover: {
	// 								lineWidth: 1
	// 							}
	// 						},
	// 						marker: {
	// 							radius: 1,
	// 							states: {
	// 								hover: {
	// 									radius: 2
	// 								}
	// 							}
	// 						},
	// 						fillOpacity: 0.25
	// 					},
	// 					column: {
	// 						negativeColor: '#910000',
	// 						borderColor: 'silver'
	// 					}
	// 				}
	// 			};
	//
	// 	options = Highcharts.merge(defaultOptions, options);
	//
	// 	return hasRenderToArg ?
	// 			new Highcharts.Chart(a, options, c) :
	// 			new Highcharts.Chart(options, b);
	// };
	//
	// var start = +new Date(),
	// 		$tds = $('td[data-sparkline]'),
	// 		fullLen = $tds.length,
	// 		n = 0;

	// Creating 153 sparkline charts is quite fast in modern browsers, but IE8 and mobile
	// can take some seconds, so we split the input into chunks and apply them in timeouts
	// in order avoid locking up the browser process and allow interaction.
	// function doChunk() {
	// 	var time = +new Date(),
	// 			i,
	// 			len = $tds.length,
	// 			$td,
	// 			stringdata,
	// 			arr,
	// 			data,
	// 			chart;
	//
	// 	for (i = 0; i < len; i += 1) {
	// 		$td = $($tds[i]);
	// 		stringdata = $td.data('sparkline');
	// 		arr = stringdata.split('; ');
	// 		data = $.map(arr[0].split(', '), parseFloat);
	// 		chart = {};
	//
	// 		if (arr[1]) {
	// 			chart.type = arr[1];
	// 		}
	// 		$td.highcharts('SparkLine', {
	// 			series: [{
	// 				data: data,
	// 				pointStart: 1
	// 			}],
	// 			tooltip: {
	// 				headerFormat: '<span style="font-size: 10px">' + $td.parent().find('th').html() + ', Q{point.x}:</span><br/>',
	// 				pointFormat: '<b>{point.y}.000</b> USD'
	// 			},
	// 			chart: chart
	// 		});
	//
	// 		n += 1;
	//
	// 		// If the process takes too much time, run a timeout to allow interaction with the browser
	// 		if (new Date() - time > 500) {
	// 			$tds.splice(0, i + 1);
	// 			setTimeout(doChunk, 0);
	// 			break;
	// 		}
	//
	// 		// Print a feedback on the performance
	// 		if (n === fullLen) {
	// 			$('#result').html('Generated ' + fullLen + ' sparklines in ' + (new Date() - start) + ' ms');
	// 		}
	// 	}
	// }
	// doChunk();
</script>
