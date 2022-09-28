<div class="container-fluid p-t-5 p-l-25 p-b-5 p-r-25">
	<div class="indicator-progress-card pt-0  bg-white p-3 p-b-50">
		<div class="row p-b-25">
			<div class="col-6">
				<div class="indicator-progress-title">আর্থিক অগ্রগতি</div>
				<div class="indicator-progress-sub-title p-t-5">{{english_to_bangla($fiscal_start_year_month)}}
					হতে {{english_to_bangla($fiscal_end_year_month)}}</div>
			</div>
			<div class="col-6">
				<div class="detail-btn text-center pull-right">
					<a href="{{url('/dashboard/get-total-financial-progress-detail-data')}}">বিস্তারিত
						&nbsp;&nbsp;<i class="fa fa-angle-right"></i></a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-6 col-xs-12">
				<div class="row">
					<div class="col-4 text-center p-2">
						<div class="ep-left-title">
							সমগ্র অর্থবছর, </br> {{english_to_bangla($fiscal_start_year_month)}}
							হতে {{english_to_bangla($fiscal_end_year_month)}}
						</div>
						<div id="container-expenditure" class="chart-container pl-4"
							 style="width: 175px; height: 175px;">
						</div>
						<div class="ep-total-taka">{{english_to_bangla(number_conversion($total_financial_year_approved))}}
							টাকা
						</div>
						<span>( {{english_to_bangla($total_financial_year_approved)}}/= )</span>
					</div>
					<div class="col-8 text-center pr-0">
						<div class="pl-4">
							<div class="d-flex flex-row buy-progress-border-b">
								<div class="w-75 p-1">
									<span class="table-title">ত্রৈমাসিক</span>
								</div>
								<div class="w-25 p-1">
									<span class="table-title">বরাদ্দ</span>
								</div>
								<div class="w-25 p-1">
									<span class="table-title">ব্যয়</span>
								</div>
							</div>
							@for($i = 1; $i <= 4; $i++)
								@if($running == $i)
									<div class="running-arrow">চলমান</div>
									<div class="arrow-right r-arrow"></div>
								@endif

								@php
									if($i == 1){
                                    $q = '১ম';
                                    }elseif ($i == 2){
                                    $q = '২য়';
                                    }elseif ($i == 3){
                                    $q = '৩য়';
                                    }elseif ($i == 4){
                                    $q = '৪র্থ';
                                    }
								@endphp

								<div class="buy-progress d-flex buy-progress-border-b px-1 py-3  ep-cd ep-seleceted text-black"
									 id="q{{$i}}-fp"
									 onclick="financial_progress_data('{{$q}} ত্রৈমাসিক',this.id,'{{$querter_month_range['start_date']['q'.$i]}}','{{$querter_month_range['end_date']['q'.$i]}}')">
									<div class="w-75 text-left @if($running == $i) running @endif">{{$q}} ত্রৈমাসিক
										({{english_to_bangla($start_date['q'.$i])}}
										- {{english_to_bangla($end_date['q'.$i])}})
									</div>
									<div
											class="w-25 @if($running == $i) running @endif">{{english_to_bangla($approved_amount['q'.$i])}}
										/=
									</div>
									<div
											class="w-25 @if($running == $i) running @endif">{{english_to_bangla($expenditure_percenatge['q'.$i])}}
										%
									</div>
								</div>
							@endfor

						</div>
					</div>
				</div>
			</div>

			<div class="col-1 p-l-0" style="border-left: 1px solid #FFC542; padding-top: 140px;">
				{{--                    <div class="arrow-right"></div>--}}
				<div class="fp-ep-circle"></div>
			</div>

			<div class="col-5">
				<div id="financial-side-chart"></div>
			</div>
		</div>
		<div class="row pt-4">
			<div class="offset-5 col-7 ">সর্বশেষ হালনাগাদঃ {{english_to_bangla($last_data_update_date)}}</div>
		</div>
	</div>
	<footer class="footer" style="background: #DAE8FC; bottom: 5px; height: 10px; margin-left: 25px;margin-right: 25px; border-radius: 0px 0px 10px 10px;"></footer>
</div>

<div class="container-fluid p-t-5 p-l-25 p-b-5 p-r-25 mb-5">
	<div class="indicator-progress-card pt-0  bg-white p-3 p-b-50" style="border: 1px solid #ABCD9D !important;">
		<div class="row p-b-25">
			<div class="col-3">
				<div class="indicator-progress-title">ক্রয় অগ্রগতি</div>
				<div class="indicator-progress-sub-title p-t-5">{{english_to_bangla($fiscal_start_year_month)}}
					হতে {{english_to_bangla($fiscal_end_year_month)}}</div>
			</div>
			<div class="col-6" style="text-align: center">
				{{--                    <button type="button" class="btn-white"><i class="fa fa-sliders" aria-hidden="true"></i></button>--}}
				{{--                    <button type="button" class="btn-white">সকল</button>--}}
				{{--                    <button type="button" class="btn-white">সেবা</button>--}}
				{{--                    <button type="button" class="btn-white">পণ্য</button>--}}
				{{--                    <button type="button" class="btn-white">সরকারী পরামর্শক</button>--}}
			</div>
			<div class="col-3">
				<div class="detail-btn text-center pull-right">
					<a href="{{url('dashboard/get-total-buy-progress-detail-data')}}">বিস্তারিত
						&nbsp;&nbsp;<i
								class="fa fa-angle-right"></i></a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-6 col-xs-12">
				<div class="row">
					<div class="col-3 text-center p-0">
						<div id="chart-purchase-progress" class="chart-container"
							 style="width: 150px; height: 150px;">
						</div>
						{{--                            <div class="text-center" style="margin-left:-12px;">--}}
						{{--                                <h6 class="m-0">সম্পন্ন</h6>--}}
						{{--                                <h5 class="m-0"--}}
						{{--                                    style="font-weight: bold;color:red;">{{english_to_bangla($purchase_info['completed_purchase_percentage'])}}--}}
						{{--                                    %</h5>--}}
						{{--                            </div>--}}
						<div class="px-3">
							<p class="fs-16 text-black my-2">
								প্রস্তাবিত ক্রয় {{english_to_bangla($purchase_info['proposed_total_purchase'])}} টি
							</p>
							<div class="border-box mt-2" style="background: #DFFFF0;border: 1px solid #A3FFD2;">
								সম্পন্ন
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{english_to_bangla($purchase_info['completed_purchase'])}}
								টি
							</div>
							<div class="border-box mt-2" style="background: #FFEFF8; border: 1px solid #FDCFE8;">
								চলমান &nbsp;&nbsp;&nbsp;{{english_to_bangla($purchase_info['ongoing_purchase'])}} টি
							</div>
							<div class="border-box mt-2" style="background: #E9F4FF; border: 1px solid #BEDEFE;">
								শুরু হয়নি &nbsp;{{english_to_bangla($purchase_info['yet_to_start_purchase'])}} টি
							</div>
							<div class="fs-16 text-black mt-2">
								সম্পন্ন হয়নি
							</div>
							<div class="mt-2"
								 style="font-weight: 600; font-size: 28px; color: #D70544;letter-spacing: 0.1px;">{{english_to_bangla($purchase_info['not_completed_purchase_percentage'])}}
								%
							</div>
						</div>
					</div>

					<div class="col-9 text-center pr-0">
						<div class="pl-4">
							<div class="d-flex flex-row buy-progress-border-b">
								<div class="w-75 p-1">
									<span class="table-title">ত্রৈমাসিক</span>
								</div>
								<div class="w-25 p-1">
									<span class="table-title">TOR</span>
								</div>
								<div class="w-25 p-1">
									<span class="table-title">Approval</span>
								</div>
								<div class="w-25 p-1">
									<span class="table-title">EOI</span>
								</div>
								<div class="w-25 p-1">
									<span class="table-title">RFP</span>
								</div>
								<div class="w-25 p-1">
									<span class="table-title">Work Order</span>
								</div>
							</div>
							@for($i = 1; $i <= 4; $i++)
								@if($running == $i)
									<div class="running-arrow">চলমান</div>
									<div class="arrow-right r-arrow"></div>
								@endif

								@php
									if($i == 1){
                                    $q = '১ম';
                                    }elseif ($i == 2){
                                    $q = '২য়';
                                    }elseif ($i == 3){
                                    $q = '৩য়';
                                    }elseif ($i == 4){
                                    $q = '৪র্থ';
                                    }
								@endphp

								<div class="buy-progress d-flex buy-progress-border-b px-1 py-3  ep-cd ep-seleceted text-black"
									 id="q{{$i}}"
									 onclick="buy_progress_data('{{$q}} ত্রৈমাসিক',this.id,'{{$querter_month_range['start_date']['q'.$i]}}','{{$querter_month_range['end_date']['q'.$i]}}')">
									<div class="w-75 text-left @if($running == $i) running @endif">{{$q}} ত্রৈমাসিক
										({{english_to_bangla($start_date['q'.$i])}}
										- {{english_to_bangla($end_date['q'.$i])}})
									</div>
									<div
											class="w-25 @if($running == $i) running @endif">{{english_to_bangla($type_wise_purchase['q'.$i]['tor']) }}
										টি
									</div>
									<div
											class="w-25 @if($running == $i) running @endif">{{english_to_bangla($type_wise_purchase['q'.$i]['approval']) }}
										টি
									</div>
									<div
											class="w-25 @if($running == $i) running @endif">{{english_to_bangla($type_wise_purchase['q'.$i]['eoi']) }}
										টি
									</div>
									<div
											class="w-25 @if($running == $i) running @endif">{{english_to_bangla($type_wise_purchase['q'.$i]['rfp']) }}
										টি
									</div>
									<div
											class="w-25 @if($running == $i) running @endif">{{english_to_bangla($type_wise_purchase['q'.$i]['workOrder']) }}
										টি
									</div>
								</div>
							@endfor
						</div>

						<div class="row p-0 m-0 mt-5 ">
							<div class="arrow-right-lg col-1 p-0"></div>
							<p class="col-10 fs-16 text-black text-left p-0 m-0 lh-25">
								প্রস্তাবনা মতে <span id="total_incomplete_purchase"></span> টি ক্রয় প্রক্রিয়া আগামী <span id = "left_days"></span> দিনের মধ্যে অবশ্যই সম্পন্ন হতে হবে
							</p>
						</div>

					</div>
				</div>
			</div>

			<div class="col-1 p-l-0" style="border-left: 1px solid #FFC542; padding-top: 122px;">
				{{--                    <div class="arrow-right"></div>--}}
				<div class="ep-circle"></div>
			</div>

			<div class="col-5 p-0 m-0" id="side-chart">
			</div>
		</div>
	</div>
	<footer class="footer" style="background: #D5E8D4; bottom: 5px; height: 10px; margin-left: 25px; margin-right: 25px; border-radius: 0px 0px 10px 10px;"></footer>
</div>

@push('scripts')
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<script>
		function buy_progress_data(q, id, start_date, end_date) {
			let team_name = $('#team_name').val();
			$.ajax({
				url: "{{ url('ajax/get-total-buy-progress-report-data/') }}",
				data: {
					'q_name': q,
					'team_name': team_name,
					'start_date': start_date,
					'end_date': end_date
				},
				success: function (response) {
					$('.ep-cd').removeClass('fp-ep-selected');
					$('#' + id).addClass('fp-ep-selected');
					$(".ep-circle").html(q);
					$("#side-chart").html(response);
				},
				error: function (xhr) {
					$("#side-chart").html('No Data Found');
				}
			});
		}

		function financial_progress_data(q, id, start_date, end_date) {
			let team_name = $('#team_name').val();
			$.ajax({
				url: "{{ url('ajax/get-total-financial-progress-report-data/') }}",
				data: {
					'q_name': q,
					'team_name': team_name,
					'start_date': start_date,
					'end_date': end_date
				},
				success: function (response) {
					$('.ep-cd').removeClass('ep-selected');
					$('#' + id).addClass('ep-selected');
					$(".fp-ep-circle").html(q);
					$("#financial-side-chart").html(response);
				},
				error: function (xhr) {
					$("#financial-side-chart").html('No Data Found');
				}
			});
		}

		var gaugeOptions = {
			chart: {
				type: 'solidgauge'
			},

			title: {
				text: null,
				display: false
			},

			pane: {
				center: ['50%', '50%'],
				size: '100%',
				startAngle: 0,
				endAngle: 360,
				background: {
					backgroundColor:
							Highcharts.defaultOptions.legend.backgroundColor || '#B1EAFD',
					innerRadius: '65%',
					outerRadius: '95%',
					shape: 'arc'
				}
			},

			exporting: {
				menuItemDefinitions: {
					// Custom definition
				},
				buttons: {
					contextButton: {
						// menuItems: ['downloadXLS', 'downloadCSV', 'downloadPDF', 'downloadPNG', 'downloadSVG', 'separator', 'label']
						menuItems: ['downloadXLS', 'downloadCSV', 'downloadPDF', 'downloadPNG', 'downloadJPEG', 'downloadSVG', 'viewFullscreen']
					}
				},
				chartOptions: { // specific options for the exported image
					plotOptions: {
						series: {
							dataLabels: {
								enabled: true,
							}
						}
					}
				},
				filename: "progress_chart"
			},

			// exporting: {
			//     enabled: true
			// },

			tooltip: {
				enabled: false
			},

			// the value axis
			yAxis: {
				stops: [
					[0.1, '#247BF3'],
					[0.5, '#247BF3'],
					[0.9, '#247BF3']
				],
				lineWidth: 0,
				tickWidth: 0,
				minorTickInterval: null,
				tickAmount: 0,
				labels: {
					y: 0
				}
			},

			plotOptions: {
				solidgauge: {
					dataLabels: {
						x: 0,
						y: -30,
						borderWidth: 0,
						useHTML: true
					}
				}
			}
		};
		// The speed gauge
		var chartSpeed = Highcharts.chart('container-expenditure', Highcharts.merge(gaugeOptions, {
			yAxis: {
				min: 0,
				max: 100
			},

			credits: {
				enabled: false
			},

			series: [{
				name: '',
				data: [{{$expenditure_percentage}}],
				dataLabels: {
					format:
							'<div style="text-align:center;margin-top:20px;">' +
							'<span style="font-size:13px; font-weight:bold;">ব্যয়</span><br>' +
							'<span style="font-size:13px; font-weight:bold; color:red;">{{english_to_bangla($expenditure_percentage)}} %</span>' +
							'</div>'
				}
			}]
		}));

		var chartPurchase = Highcharts.chart('chart-purchase-progress', Highcharts.merge(gaugeOptions, {
			yAxis: {
				min: 0,
				max: 100
			},

			credits: {
				enabled: false
			},

			series: [{
				name: '',
				data: [{{$purchase_info['completed_purchase_percentage']}}],
				dataLabels: {
					format:
							'<div style="text-align:center;margin-top:10px;">' +
							'<span style="font-size:13px; font-weight:bold;">সম্পন্ন</span><br>' +
							'<span style="font-size:13px; font-weight:bold; color:red;">{{english_to_bangla($purchase_info['completed_purchase_percentage'])}} %</span>' +
							'</div>'
				}
			}]
		}));
	</script>
@endpush