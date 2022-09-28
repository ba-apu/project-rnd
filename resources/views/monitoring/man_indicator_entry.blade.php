<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="p-t-20 p-r-20 p-b-20 p-l-20 card bg-white">
			<form name="" id="man_entry_form">
			<div class="row">
				<span class="col-xs-12 col-sm-12 col-md-8 col-lg-8 p-t-5 moni-title">{{$project_details->bangla_name}} @lang('lavel.manual_indicator_data_entry') </span>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 btn-group dropdown dropdown-default" style="float:right;">
					<div class="form-group m-b-0">
						<div class="input-group date" id="datetimepicker112">
							<input type='text' name='manual_data_entry_date' id="manual_data_entry_date" class="form-control" value='{{date("Y/m/d", strtotime("last day of previous month"))}}' />
							<span class="input-group-addon">
								<i class="fa fa-calendar" aria-hidden="true"></i>
							</span>
						</div>
					</div>			
				</div>
			</div>
			
			<table class="m-t-15 moni-tbl table table-bordered">
			  <thead>
				<tr>
				  <th scope="col">@lang('lavel.no')</th>
				  <th scope="col">@lang('lavel.indicator')</th>
				  <th scope="col">@lang('lavel.value')</th>
				  <th scope="col">@lang('lavel.target_value')</th>
				  <th scope="col"></th>
				</tr>
			  </thead>
			  <tbody>
				@forelse($indicators as $key=>$indicator)
				<tr id="man_entry_tb_row_{{$indicator->id}}">
				  <th scope="row">{{english_to_bangla($key+1)}}</th>
				  <td>{{($indicator->short_form)?$indicator->short_form:$indicator->bangla_name}}</td>
				  <input type="hidden" id="manual_data_entry_indicator_id_{{$indicator->id}}" name="indicator_id_{{$indicator->id}}" value="{{$indicator->id}}">
				  <input type="hidden" id="manual_data_entry_project_id_{{$indicator->id}}" name="indicator_id_{{$indicator->id}}" value="{{$indicator->project_id}}">
				  <td><input type="number" name="value_{{$indicator->id}}" id="value_{{$indicator->id}}" placeholder="@lang('lavel.value')" ></td>
				  <td><input type="number" name="target_value_{{$indicator->id}}" id="target_value_{{$indicator->id}}" placeholder="@lang('lavel.target_value')" ></td>
				  <td>
				  <a href=""><i class="fa fa-paper-plane fa-2x" aria-hidden="true" onclick="man_entry_form_submit_btn({{$indicator->id}})"></i>
				  </a>
				</tr>
				@empty
				<tr>
					<td colspan="4">@lang('lavel.no_manual_indicator')</td>
				<tr>
				@endforelse
				
				
			  </tbody>
			</table>
			{{--
			<div class="btn_right">
				<a href="" class="btn btn-primary btn-cons m-t-10 m-r-0 btn_right" onclick="man_entry_form_submit_btn()"><i class="fa fa-plus"></i> নতুন তৈরি </a>
			</div>
			--}}
			</form>
		</div>
		</div>