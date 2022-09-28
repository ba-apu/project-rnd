@if(!empty($indicators) && count($indicators) > 0)
	<ul class="p-l-0 all-month">
		@foreach($has_month as $key=>$month)
			<li id="month_series_api_{{$project_id}}_{{date('Y-m-d',strtotime($key))}}" class=" @if($month['no_data']) {{ 'r-co' }} @elseif($month['data_incomplete']) {{ 'y-co' }} @else{{ 'g-co' }} @endif ">
				<a href="#" onclick="click_on_month_api_name('{{$project_id}}','{{date('Y-m-d',strtotime($key))}}')">
					{{ english_to_bangla(date('F',strtotime($key))) }}
					<br>
					{{ english_to_bangla(date('Y',strtotime($key))) }}
				</a>
			</li>
		@endforeach
	</ul>
@endif

@if(!empty($indicators) && count($indicators) > 0)
	@if($last_date != "")
		<div class="last-tex float-left">
			<i class="fa fa-info-circle" aria-hidden="true"></i> সর্বশেষ {{ english_to_bangla(date('F,Y',strtotime($last_date))) }} পর্যন্ত ডাটা হালনাগাদ করা হয়েছে।
		</div>
	@else
		এখন পর্যন্ত কোনো @lang('lavel.manual_data') হালনাগাদ করা হয়  নাই।
	@endif
@else
	<div class="last-tex float-left"><i class="fa fa-info-circle" aria-hidden="true"></i> @lang('lavel.there_are_no_api_indicator') </div>
@endif


<div class="table-responsive">
	@if(!empty($indicators) && count($indicators) > 0)
		<table class="moni-tbl table table-bordered">
			<thead>
			<tr>
				<th scope="col">@lang('lavel.no')</th>
				<th scope="col">@lang('lavel.indicator')</th>
				<th scope="col">@lang('lavel.data')</th>
				<th scope="col">@lang('lavel.target_data')</th>
				<th scope="col">@lang('lavel.date')</th>
				{{-- <!--th scope="col">@lang('lavel.data') @lang('lavel.entry_date')</th--> --}}
			</tr>
			</thead>
			<tbody>
			@foreach($indicators as $key=>$indicator)
				<tr>
					<th scope="row">{{ english_to_bangla($key+1) }}</th>
					<td>{{ ($indicator->short_form)?$indicator->short_form:$indicator->bangla_name }}</td>
					@if(isset($data[$indicator->id]) && ($data[$indicator->id]['success'] == 1))
						<td>@if($data[$indicator->id]['value'] != "")
								{{ english_to_bangla(bdtFormat($data[$indicator->id]['value'])) }}
							@else
								<i class="fa fa-times text-danger"></i>
							@endif
						</td>
						<td>@if($data[$indicator->id]['value'] != "") {{ english_to_bangla(bdtFormat($data[$indicator->id]['target_value'])) }} @else <i class="fa fa-times text-danger"></i> @endif</td>
						<td>{{ english_to_bangla(date('d-F-Y',strtotime($data[$indicator->id]['date']))) }}</td>
						{{-- <td>{{ english_to_bangla(date('d-F-Y',strtotime($data[$indicator->id]['created_at']))) }}</td> --}}
					@else
						<td><i class="fa fa-times text-danger"></i></td>
						<td><i class="fa fa-times text-danger"></i></td>
						<td><i class="fa fa-times text-danger"></i></td>
					@endif
				</tr>
			@endforeach
			</tbody>
		</table>
	@endif
</div>