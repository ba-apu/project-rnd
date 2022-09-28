<div class="card bg-white m-t-5 m-b-10">
	<div class="card-block bg-white p-b-0">
		<div class="row m-t-0">
			<div class="col-lg-2">
				<div class="form-group{{ $errors->has('project_id_1') ? ' has-error' : '' }} m-b-0">
					<div class="form-group">
						{!! Form::select('project_id_1', $project_list, old('project_id_1'),
                        ['placeholder'=>'উদ্যোগ নির্বাচন','class' => 'form-control full-width','data-init-plugin'=>'select2', 'id' => 'project_id_1', 'required' => 'required'])
                        !!}
					</div>
				</div>
			</div>
			<div class="col-lg-2">
				<div class="form-group{{ $errors->has('sector_id') ? ' has-error' : '' }} m-b-0">
					<div class="form-group">
						<select name="indicator_id_1" id="indicator_id_1" class="form-control full-width" required>
							<option value="">@lang('lavel.select_indicator')</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-lg-2">
				<div class="form-group{{ $errors->has('project_id_2') ? ' has-error' : '' }} m-b-0">
					<div class="form-group">
						{!! Form::select('project_id_2', $project_list, old('project_id_2'),
                        ['placeholder'=>'উদ্যোগ নির্বাচন','class' => 'form-control full-width','data-init-plugin'=>'select2', 'id' => 'project_id_2', 'required' => 'required'])
                        !!}
					</div>
				</div>
			</div>
			<div class="col-lg-2">
				<div class="form-group{{ $errors->has('sector_id') ? ' has-error' : '' }} m-b-0">
					<div class="form-group">
						<select name="indicator_id_2" id="indicator_id_2" class="form-control full-width" required>
							<option value="">@lang('lavel.select_indicator')</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group pull-left">
					<input type="text" name="daterange" class="form-control" value="" />
				</div>
				<div class="pull-right d-flex pt-1">
					<input type="checkbox" name="specific-value" id="specific-value" data-toggle="toggle" data-size="xs">
					<label class="pl-2" style="padding-top: 2px;">Specific</label>
				</div>
			</div>

			<div class="col-lg-1">
				<button class="btn btn-primary m-b-0" type="submit" id="submit">
					<i class="pg-form"></i> @lang('lavel.compare')
				</button>
			</div>
		</div>

		<input type="hidden" id="first_indicator" value="">
		<input type="hidden" id="first_indicator_name" value="">
		<input type="hidden" id="second_indicator" value="">
		<input type="hidden" id="second_indicator_name" value="">
		<input type="hidden" id="from_date" value="">
		<input type="hidden" id="to_date" value="">
	</div>
</div>
