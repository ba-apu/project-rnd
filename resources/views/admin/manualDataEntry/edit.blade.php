@extends('layout.frontend')
@section('content')
    <div class="content sm-gutter">
        <!-- START BREADCRUMBS -->
        <!--div class="bg-white">
            <div class="container-fluid padding-25 sm-padding-10">
            </div>
        </div-->
        <!-- END BREADCRUMBS -->

        <!-- START CONTAINER FLUID -->
        <div class="container-fluid padding-25">
            <div class="card  bg-white">
                <div class="card-block">
                    <h5>@lang('lavel.manual_data_edit')</h5>
                    <form action="{{url('manual-data-entry/' . $manualData->id)}}" {{-- class="form-horizontal" --}} role="form" method="POST" data-toggle="validator">
                        @csrf
                    <input name="_method" type="hidden" value="PUT">
                    <input name="redirect_to" type="hidden" value="{{ url()->previous() }}">

                        <div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
							<label for="project_id" class="col-lg-2 control-label">@lang('lavel.project_name')
								<span class="mendatory">*</span>
							</label>
							<div class="col-md-6 form-group">
								{{\App\Project::where('id',$manualData->project_id)->pluck('bangla_name')->first()}}
                            </div>
						</div>
						<div class="form-group{{ $errors->has('sector_id') ? ' has-error' : '' }}">
							<label for="sector_id" class="col-lg-2 control-label">@lang('lavel.indicator_name')
								<span class="mendatory"> *</span>
							</label>
							<div class="col-md-6 form-group">
								
                            {{\App\Indicator::where('id',$manualData->indicator_id)->pluck('bangla_name')->first()}}
								
							</div>
						</div>
                        
                        <div class="form-group{{ $errors->has('done_date') ? ' has-error' : '' }}">
							<label for="done_date" class="col-lg-4 control-label">@lang('lavel.date')<span
									class="mendatory">*</span></label>
							<div id="done_date" data-provide="datepicker" class="input-group date col-md-6">
								<input type="text" id="date"  name="date" class="form-control" value="{{ old('date',$manualData->date) }}"
									autocomplete="off" required><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							</div>
						</div>

                        <div class="form-group{{ $errors->has('data') ? ' has-error' : '' }}">
                            <label for="data" class="col-lg-2 control-label">@lang('lavel.value')<span
									class="mendatory">*</span></label>

                            <div class="col-md-6">
                                <input id="data" type="text" class="form-control" name="data" value="{{ old('data',$manualData->data_value) }}" autofocus required>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('data'))
                                    <span class="help-block">
										<strong>{{ $errors->first('data') }}</strong>
									</span>
                                @endif
                            </div>
                        </div>
						<div class="form-group{{ $errors->has('model_name') ? ' has-error' : '' }}">
                            <label for="trget_value" class="col-lg-2 control-label">@lang('lavel.target_value')</label>

                            <div class="col-md-6">
                                <input id="target_data" type="text" class="form-control" name="target_data" value="{{ old('target_data',$manualData->target_value) }}">
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('target_data'))
                                    <span class="help-block">
										<strong>{{ $errors->first('target_data') }}</strong>
									</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                
                                <button class="btn btn-primary btn-cons m-b-10" type="submit"><i class="pg-form"></i> <span class="bold">@lang('lavel.submit')</span>
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
	$(document).on("change", "#project_id", function(e) {
        var project_id = $(this).val();

        $.ajax({
            type: "get",
            url: "{{ url('ajax/get-indicator-list') }}",
            data: {
                'project_id': project_id,
            }
        }).done(function(resp) {

            var txt = '<option value="">ইনডিকেটর নির্বাচন করুন</option>';
            var resp = JSON.parse(resp);
            //console.log(resp);
			$.each(resp, function(i, item) {
				//alert(i);
                txt += '<option value="' + resp[i].id + '">' + resp[i].bangla_name +'('+resp[i].name+')'+'</option>';
            });
			//alert(txt);
            $('#indicator_id').html(txt);
        });
    });
	
	//get indicator value
	$(document).on("change", "#date", function(e) {
        var indicator_id = $("#indicator_id").val();
        var date = $("#date").val();
			//alert(indicator_id); alert(date);
        $.ajax({
            type: "get",
            url: "{{ url('ajax/get-indicator-value-from-mongo') }}",
            data: {
                'indicator_id': indicator_id,'date':date
            }
        }).done(function(resp) {
            var resp = JSON.parse(resp);
            //console.log(resp);
			$("#data").val(resp.data);
			$("#target_data").val(resp.target_data);
			/*
			$.each(resp, function(i, item) {
				//alert(i);
                txt += '<option value="' + resp[i].id + '">' + resp[i].bangla_name +'('+resp[i].name+')'+'</option>';
            });
			*/
			//alert(txt);
            //$('#indicator_id').html(txt);
        });
    });
	
	</script>
	<script type="text/javascript" src="{{ custom_asset('assets/ckeditor/ckeditor.js') }}"></script>   
	<script>
	$('.datepicker').datetimepicker();
	</script>
@endpush