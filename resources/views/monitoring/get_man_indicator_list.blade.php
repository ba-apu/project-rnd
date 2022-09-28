@if(!empty($indicators) && count($indicators) > 0)
<ul class="p-l-0 all-month">
	@foreach($has_month as $key=>$month)
		<li id="month_series_man_{{$project_id}}_{{date('Y-m',strtotime($key))}}" class=" @if($month['no_data']) {{ 'r-co' }} @elseif($month['data_incomplete']) {{ 'y-co' }} @else{{ 'g-co' }} @endif "><a href="#" onclick="click_on_month_man_name({{$project_id}},'{{date('Y-m',strtotime($key))}}')"> {{ english_to_bangla(date('F',strtotime($key))) }} <br> {{ english_to_bangla(date('Y',strtotime($key))) }} </a></li>
	@endforeach
</ul>
@endif	

<div class="last-tex float-left"><i class="fa fa-info-circle" aria-hidden="true"></i>
	@if(!empty($indicators) && count($indicators) > 0)
		@if($last_date != "")
		সর্বশেষ  {{ english_to_bangla(date('F,Y',strtotime($last_date))) }} পর্যন্ত ডাটা হালনাগাদ করা হয়েছে।
		@else
		এখন পর্যন্ত কোনো @lang('lavel.manual_data') হালনাগাদ করা হয়  নাই।
		@endif
	@else
		@lang('lavel.there_are_no_manual_indicator')	
	@endif		
</div>
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
	  <th scope="col">@lang('lavel.authorized')</th>
	  <th scope="col"></th>
	</tr>
  </thead>
  <tbody>
	@php $c=0; @endphp
	@foreach($indicators as $key=>$indicator)
			@php $c++; @endphp
	<tr>
	  <th scope="row">{{ english_to_bangla($c) }}</th>
	  <td>{{ ($indicator->short_form)?$indicator->short_form:$indicator->bangla_name }}</td>
	  @if(isset($mysql_data[$indicator->id]) && $mysql_data[$indicator->id]['success'] == 1)

		 <td id="man_data_{{ $mysql_data[$indicator->id]['manual_id'] }}">{{english_to_bangla(bdtFormat($mysql_data[$indicator->id]['value']))}}</td>
		 <td id="man_target_data_{{ $mysql_data[$indicator->id]['manual_id'] }}">{{english_to_bangla(bdtFormat($mysql_data[$indicator->id]['target_value']))}}</td>

		 <td id="man_date_{{ $mysql_data[$indicator->id]['manual_id'] }}">{{ english_to_bangla(date('d-m-Y',strtotime($mysql_data[$indicator->id]['date']))) }}</td>
		 <td>@if($mysql_data[$indicator->id]['is_authorized'] == 1) <i class="fa fa-check text-success"></i> @else <i class="fa fa-times text-danger"></i> @endif</td>
		 <td id="man_target_delete_{{ $mysql_data[$indicator->id]['manual_id'] }}">@if($mysql_data[$indicator->id]['is_authorized'] == 0) <a onclick="delete_manual_data({{ $mysql_data[$indicator->id]['manual_id'] }})" href=""><i class="fa fa-trash text-success" title="ডিলিট করুন"></i></a> @endif</td>
	 @else
		 <td><i class="fa fa-times text-danger"></i></td>
		 <td><i class="fa fa-times text-danger"></i></td>
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