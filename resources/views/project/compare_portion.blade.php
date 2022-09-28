<div class="card bg-white m-t-20">
	<div class="card-block bg-white">
		<div class="card-header border-bottom txt-18 m-b-20 text-primary">
			সূচক ভিত্তিক তুলনা
		</div>

		<div class="row mx-1">
			<div class="col-3 p-0 mt-2" style="height: 493px;overflow: scroll;">
                <div class="d-flex justify-content-end">
                    <button class="btn mb-2 text-white" style="background: #912C8A;" onclick="deselectAllLineData({{$indicator_lists}})">Reset</button>
                </div>
				@foreach($indicator_lists as $indicator)
					<div onclick="indicator_wise_line_data('{{$indicator->id}}')" data-value="{{$indicator->bangla_name}}"
						 id="indicator-id-{{$indicator->id}}"
						 class="ml-1 indicator-name pl-4">
						<div class="d-flex">
							<h6 class="mr-auto">{{$indicator->bangla_name}}</h6>
							<span class="onHover"><i class="fa fa-caret-right fa-lg"></i> </span>
						</div>
					</div>
				@endforeach
			</div>

			<div class="col-9 pl-0 mt-2">
				<div class="filter-input filter-buttons card pull-right">
				</div>

				<div class="dropdown" style="position: absolute;">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-lg fa-download"></i>
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" width="100%">
						<a href="#" id="exportCompareLineChart" class="p-1">PNG</a><br>
					</div>
				</div>
				<canvas id="line-canvas"></canvas>
			</div>
		</div>
	</div>
</div>

@push('scripts')
	<script>
		//Line chart data get multiple and single
		function indicator_wise_line_data(running_indicator) {
			const selected = $("#indicator-id-" + running_indicator).hasClass('clicked');
			if (!selected) {
				const running_from_date = $("#running_from_date").val();
				const running_to_date = $("#running_to_date").val();

				const type = $('.active input[name=options]').attr('data-val');

				get_line_chart_data(running_indicator, running_from_date, running_to_date, type)
			} else {
				$("#indicator-id-" + running_indicator).removeClass('indi-hover clicked');
				let ind_name = $("#indicator-id-" + running_indicator).attr('data-value');
				remove_line_from_chart(ind_name);
			}
		}

		function get_line_chart_data(indicator_id, from_date, to_date, type = '') {
			$("#running_indicator").val(indicator_id);
			$("#running_from_date").val(from_date);
			$("#running_to_date").val(to_date);

			let specFlag = document.getElementById('specific-value').value;

			const [division_bbs_code, district_bbs_code, upazila_bbs_code, geo_name] = getSelectedGeoAndBbsCode();

			const point_str = [];
			const date_str = [];
			$.ajax({
				url: "{{url('ajax/get-graph-data-for-service-page/')}}",
				data: {
					"indicator_id": indicator_id,
					"from_date": from_date,
					"to_date": to_date,
					"geo_name": geo_name,
					"division_bbs_code": division_bbs_code,
					"district_bbs_code": district_bbs_code,
					"upazila_bbs_code": upazila_bbs_code,
					"type": type,
					"specFlag": specFlag
				},
				success: function (response) {
					const parsed = JSON.parse(response);

					let loop_data = parsed['point_data'];
					loop_data.forEach(function (element) {
						point_str.push(element.data);
						date_str.push(element.date);
					});

					if ($(".indicator-name").hasClass('indi-hover clicked')) {
						make_multiple_line_chart(point_str, parsed['indicator_name'])
					} else {
						make_line_chart(point_str, date_str, parsed['indicator_name'])
					}

					$("#indicator-id-" + indicator_id).addClass('indi-hover clicked');
				},
				error: function (xhr) {
				}
			});
		}

		let lineChart = '';

		function make_line_chart(point_str, date_str, ind_name) {
			const config = {
				type: 'line',
				data: {
					labels: date_str,
					datasets: [{
						label: ind_name,
						backgroundColor: 'rgba(34, 167, 240, 1)',
						borderColor: 'rgba(34, 167, 240, 1)',
						fill: false,
						data: point_str

					}]
				},
				options: {
					responsive: true,
					scales: {
						y: {
							grid: {
								color: 'rgba(128,151,177, 0.3)',
								borderDash: [3, 3],
								drawTicks: false,
								borderColor: '#424b5f',
							},
							// ticks: {
							//     align: "center",
							//     padding: 10,
							// },
						},
						x: {
							grid: {
								color: 'rgba(128,151,177, 0.3)',
								borderDash: [3, 5],
								drawTicks: false,
								borderColor: '#424b5f'
							},
							// ticks: {
							//     align: "center",
							//     padding: 10,
							// }
						}
					},
					plugins: {
						legend: {
							display: true
						},
						tooltip: {
							usePointStyle: true,
						},
						zoom: {
							zoom: {
								wheel: {
									enabled: true,
								},
								pinch: {
									enabled: true
								},
								mode: 'x',
							},
							pan: {
								enabled: true,
								mode: 'x',
							},
							limits: {
								x: {
									minRange: 3
								},
							},
						}
					}
				}
			};

			if (lineChart) lineChart.destroy(); //destroy prev chart instance
			const ctx2 = document.getElementById('line-canvas').getContext('2d');

			lineChart = new Chart(ctx2, config);
			// setTimeout(() => {
			//     lineChart.zoom(3);
			// lineChart.pan({
			//     x: Number.MAX_SAFE_INTEGER
			// }, undefined, 'default');
			// }, 10)
		}

		function make_multiple_line_chart(point_str, ind_name) {
			const color = '#' + (0x1000000 + Math.random() * 0xffffff).toString(16).substr(1, 6);
			const newDataset = {
				label: ind_name,
				backgroundColor: color,
				borderColor: color,
				data: point_str,
				fill: false,
			};
			lineChart.data.datasets.push(newDataset);
			lineChart.update();
		}

		function remove_line_from_chart(label) {
			let dataset = lineChart.data.datasets;
			$.each(dataset, function (key, value) {
				if (value) {
					if (value.label.toString() == label.toString()) {
						dataset.splice(key, 1);
					}
				}
			});
			lineChart.update();
		}

        function deselectAllLineData(indicator_lists){
            indicator_lists.map((item)=>{
                $("#indicator-id-" + item.id).removeClass('indi-hover clicked');
                let ind_name = $("#indicator-id-" + item.id).attr('data-value');
                remove_line_from_chart(ind_name);
            });
        }

		$('#exportCompareLineChart').click(function (event) {
			/* save as image */
			let link = document.createElement('a');
			link.href = lineChart.toBase64Image();
			link.download = 'lineChart.png';
			link.click();
		});
	</script>
@endpush
