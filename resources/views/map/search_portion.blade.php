<div class="card bg-white m-t-5 m-b-10">
	<div class="card-block bg-white p-b-0" id="first_slot">
		<div class="row m-t-0">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-1">
				@lang('lavel.compare')
				<input type="checkbox" data-init-plugin="switchery" data-size="small" id="has_compare" data-color="primary"  />
			</div>

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
				<div class="form-group{{ $errors->has('project_id_1') ? ' has-error' : '' }} m-b-0">
					<div class="form-group">
						{!! Form::select('project_id_1', $project_list, old('project_id_1'),
                        ['placeholder'=>'উদ্যোগ নির্বাচন','class' => 'form-control full-width','data-init-plugin'=>'select2', 'id' => 'project_id_1', 'required' => 'required'])
                        !!}
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
				<div class="form-group{{ $errors->has('sector_id') ? ' has-error' : '' }} m-b-0">
					<div class="form-group">
						<select name="indicator_id_1" id="indicator_id_1" class="form-control full-width" required>
							<option value="">@lang('lavel.select_indicator')</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-2" id="sorting_div">
				<div class="form-group{{ $errors->has('sector_id') ? ' has-error' : '' }} m-b-0">
					<div class="form-group">
						<select name="sorting" id="sorting" class="form-control full-width" data-init-plugin="select2" required>
							<option value="">@lang('lavel.sorting')</option>
							<option value="up">@lang('lavel.ascending')</option>
							<option value="down">@lang('lavel.descending')</option>
						</select>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-2" id="second_project_selector" style="display:none;">
				<div class="form-group{{ $errors->has('project_id_2') ? ' has-error' : '' }} m-b-0">
					<div class="form-group">
						{!! Form::select('project_id_2', $project_list, old('project_id_2'),
                        ['placeholder'=>'উদ্যোগ নির্বাচন','class' => 'form-control full-width','data-init-plugin'=>'select2', 'id' => 'project_id_2', 'required' => 'required'])
                        !!}
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-2" id="second_indicator_selector" style="display:none;">
				<div class="form-group{{ $errors->has('sector_id') ? ' has-error' : '' }} m-b-0">
					<div class="form-group">
						<select name="indicator_id_2" id="indicator_id_2" class="form-control full-width" required>
							<option value="">@lang('lavel.select_indicator')</option>
						</select>
					</div>
				</div>
			</div>
			<!--div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                <div class="form-group">
                    <input type="text" name="daterange" class="form-control" value="" />
                </div>
            </div-->

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
				<div class="form-group{{ $errors->has('project_id_2') ? ' has-error' : '' }} m-b-0">

					<div class="input-group date" id="top_portion_date">
						<input type='text' class="form-control" id="top_portion_date_val" value="{{date('Y-m-d')}}" />
						<span style="padding:8px 12px;" class="cal-icon input-group-addon">
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</span>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-1">
				<button class="btn btn-primary w-70 m-b-0" type="submit" id="submit">
					<i class="pg-form"></i> @lang('lavel.show')
				</button>
			</div>

		</div>

		<input type="hidden" id="first_indicator" value="">
		<input type="hidden" id="first_project_name" value="">
		<input type="hidden" id="first_indicator_name" value="">
		<input type="hidden" id="second_indicator" value="">
		<input type="hidden" id="second_indicator_name" value="">
		<input type="hidden" id="from_date" value="">
		<input type="hidden" id="to_date" value="">
	</div>
</div>
