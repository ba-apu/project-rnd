<div class="container-fluid p-t-5 p-l-25 p-b-5 p-r-25">
	<div class="indicator-progress-card pt-0  bg-white p-3 p-b-50">
		<div class="row p-b-25">
			<div class="col-6">
				<div class="indicator-progress-title">উদ্যোগভিত্তিক অগ্রগতি</div>
				<div class="indicator-progress-sub-title p-t-5">{{ $current_month_year }}</div>
			</div>
		</div>
		<div class="row">
			<div class="col-6" id="chartjs-radar">
				<div class="dropdown" style="position: absolute;right:15px;">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-lg fa-download"></i>
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" width="100%">
						<a href="#" id="exportProgressRadar" class="p-1">PNG</a>
					</div>
				</div>
				<canvas id="radar-canvas"></canvas>
			</div>
			<div class="col-6 side-progress">
				<table width="100%" class="table">
					<thead>
					<tr>
						<th colspan="2" class="borderless"></th>
						<th colspan="2" class="text-center font-lg borderless"
							style="color:darkviolet !important;">
							এখন
							পর্যন্ত অগ্রগতি
						</th>
					</tr>
					<tr>
						<th colspan="2" class="borderless"></th>
						<th colspan="2"
							class="text-center font-md borderless border-l border-r">
							{{$current_month_year}} পর্যন্ত
						</th>
					</tr>
					<tr>
						<th colspan="2" class="text-right font-sm borderless">{{$current_month_year}}</th>
						<th class="text-center font-md borderless border-l border-b">সূচক</th>
						<th class="font-md borderless border-r border-b" style="padding-left: 22px !important;">লক্ষ্যমাত্রা অর্জন</th>
					</tr>

					</thead>
					<tbody>
					@foreach($projects as $project)
						<tr>
							<td width="18%" class="borderless">
								<a href="{{url('dashboard/' . $project->slug)}}#indicator_progress"
								   class="hoverBtn wrap-word-landing" style="color:black;width: 135px !important;"
								   data-toggle="tooltip" title="{{$project->bangla_name}}">
                                             <span class="onHover" style="color:#2f98ba"><i
														 class="fa fa-arrow-right"></i> </span>
									{{$project->bangla_name}}
								</a>
							</td>
							<td width="20%" class="text-center borderless p-0">
								<div class="progress blue-progress">
									<div class="progress-bar progress-bar-complete"
										 role="progressbar"
										 style="width: {{$indicatorInfo[$project->id]['total_progress']}}%;"
										 aria-valuenow="{{$indicatorInfo[$project->id]['total_progress']}}"
										 aria-valuemin="0"
										 aria-valuemax="100">
									</div>
									<span>{{english_to_bangla($indicatorInfo[$project->id]['total_progress'])}}
                                            %</span>
								</div>

							</td>
							<td width="10%" class="text-center borderless border-l p-0">
								<div style="background-color: #e3e3e3">
									{{$indicatorInfo[$project->id]['total_indicators']}}
								</div>
							</td>
							<td width="20%" class="text-center borderless border-r p-0">
								<div class="form-inline">
                                            <span class="col-9" style="background-color: #e3e3e3">
                                        {{$indicatorInfo[$project->id]['target_met_indicator_count']}}
                                            </span>
									@php
										$progress = english_to_bangla($indicatorInfo[$project->id]['total_progress']);
									@endphp
									<span class="py-1">
                                                    @if($indicatorInfo[$project->id]['total_progress'] < 25 && $indicatorInfo[$project->id]['total_progress'] >= 0)
											<div class="circle red-circle">
                                                        <span class="text-black"
															  style="font-size: 8px;">{{$progress}}%</span>
                                                    </div>
										@elseif($indicatorInfo[$project->id]['total_progress'] < 50 && $indicatorInfo[$project->id]['total_progress'] >= 25)
											<div class="circle orange-circle">
                                                        <span class="text-black"
															  style="font-size: 8px;">{{$progress}}%</span>
                                                    </div>
										@elseif($indicatorInfo[$project->id]['total_progress'] < 75 && $indicatorInfo[$project->id]['total_progress'] >= 50)
											<div class="circle blue-circle">
                                                        <span class="text-black"
															  style="font-size: 8px;">{{$progress}}%</span>
                                                    </div>
										@elseif($indicatorInfo[$project->id]['total_progress'] >= 75)
											<div class="circle green-circle">
                                                        <span class="text-black"
															  style="font-size: 8px;">{{$progress}}%</span>
                                                    </div>
										@endif
                                            </span>
								</div>

							</td>
						</tr>
					@endforeach
					</tbody>

				</table>
				<hr>
			</div>
		</div>
	</div>
	<footer class="footer" style="background: #DAE8FC; bottom: 5px; height: 10px; margin-left: 25px;margin-right: 25px; border-radius: 0px 0px 10px 10px;"></footer>
</div>

@push('scripts')
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script>
		window.chartColors = {
			blue: 'rgb(54, 162, 235)',
			purple: 'rgb(153, 102, 255)'
		};

		const label = "অর্জন(%)";
		const color = Chart.helpers.color;
		const config = {
			type: 'radar',
			data: {
				labels: @json(array_keys($chart_data)) ,
				datasets: [{
					label: label,
					backgroundColor: color(window.chartColors.purple).alpha(0.2).rgbString(),
					borderColor: window.chartColors.purple,
					pointBackgroundColor: window.chartColors.purple,
					data: @json(array_values($chart_data))
				}]
			},
			options: {
				legend: {
					position: 'top',
				},
				title: {
					display: false,
					text: ''
				},
				scale: {
					ticks: {
						beginAtZero: true
					}
				},
				responsive: true,
				maintainAspectRatio: false
			}
		};

		const ctx = document.getElementById("radar-canvas").getContext('2d');
		let radar_chart = new Chart(ctx, config);

		$('#exportProgressRadar').click(function (event) {
			/* set new title */
			// radar_chart.options.title.text = 'Target Achievement Radar Chart';
			// radar_chart.update({
			//     duration: 0
			// });
			// or, use
			// chart_variable.update(0);

			/* save as image */
			let link = document.createElement('a');
			link.href = radar_chart.toBase64Image();
			link.download = 'radarChart.png';
			link.click();

			/* rollback to old title */
			// radar_chart.options.title.text = 'Target Achievement Radar Chart';
			// radar_chart.update({
			//     duration: 0
			// });
			// or, use
			// chart_variable.update(0);
		});
	</script>
@endpush