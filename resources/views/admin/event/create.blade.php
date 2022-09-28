@extends('layout.frontend')
@section('content')

<div class="content sm-gutter">
    <div class="container-fluid padding-25">
        <div class="card  bg-white">
            <div class="card-block">
                <h5>@lang('lavel.new_create')</h5>

                <form action="{{url('dashboard/event')}}" {{-- class="form-horizontal" --}} role="form" method="POST"
                    data-toggle="validator">
                    @csrf

                    <div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
                        <label for="project_id" class="col-lg-2 control-label">@lang('lavel.project_name')
                            <span class="mendatory">*</span>
                        </label>
                        <div class="col-md-6 form-group">
                            {!! Form::select('project_id', \App\Project::pluck('name', 'id'), old('project_id'),
                            ['placeholder'=>'উদ্যোগ নির্বাচন করুন','class' => 'form-control
                            full-width','data-init-plugin'=>'select2', 'id' => 'project_id', 'required' => 'required'])
                            !!}
                        </div>
                    </div>
					<div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
                        <label for="project_id" class="col-lg-2 control-label">@lang('lavel.task_name')
                            <span class="mendatory">*</span>
                        </label>
                        <div class="col-md-6 form-group">
                            <select name="task_id" id="task_id" class="form-control full-width" required>
                                <option value="">কর্ম-পরিকল্পনা নির্বাচন করুন</option>
                            </select>
                        </div>
                        {{-- <div class="col-md-6 form-group">
                            {!! Form::select('task_id', \App\Task::pluck('task_name', 'id'), old('task_id'),
                            ['placeholder'=>'Please Select A Task','class' => 'form-control
                            full-width','data-init-plugin'=>'select2', 'id' => 'project_id', 'required' => 'required'])
                            !!}
                        </div> --}}
                    </div>
					{{-- <div class="form-group{{ $errors->has('sector_id') ? ' has-error' : '' }}">
                        <label for="sector_id" class="col-lg-2 control-label">@lang('lavel.sectors')
                            <span class="mendatory">*</span>
                        </label>
                        <div class="col-md-6 form-group">
                            {!! Form::select('sector_id', \App\Sector::pluck('name', 'id'), old('sector_id'),
                            ['placeholder'=>'সেক্টর নির্বাচন করুন','class' => 'form-control
                            full-width','data-init-plugin'=>'select2', 'id' => 'sector_id', 'required' => 'required'])
                            !!}
                        </div>
                    </div> --}}
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title" class="col-lg-4 control-label">@lang('lavel.event_name')
                            <span class="mendatory">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}"
                                required autofocus>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
					{{-- <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                        <label for="title" class="col-lg-4 control-label">@lang('lavel.amount')
                            <span class="mendatory">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="amount" value="{{ old('amount') }}"
                                required autofocus>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('amount'))
                            <span class="help-block">
                                <strong>{{ $errors->first('amount') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div> --}}


                    <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                        <label for="details" class="col-lg-4 control-label">@lang('lavel.details')</label>
                        <div class="col-md-6">
                            <textarea class="ckeditor form-control" name="details" value="{{ old('details') }}"
                                placeholder="Write Details Here..."></textarea>
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('date_time') ? ' has-error' : '' }}">
                        <label for="date_time" class="col-lg-4 control-label">@lang('lavel.date')<span
                                class="mendatory">*</span></label>
                        <div id="date_time" data-provide="datepicker" class="input-group date col-md-6">
                            <input type="text"  name="date" class="form-control" value="{{ old('date_time') }}"
                                autocomplete="off"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>





            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-primary btn-cons m-b-10" type="submit"><i class="pg-form"></i> <span
                            class="bold">@lang('lavel.submit')</span>
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
            url: "{{ url('ajax/get_work_plan_list') }}",
            data: {
                'project_id': project_id,
            }
        }).done(function(resp) {

            var txt = '<option value="">কর্ম-পরিকল্পনা নির্বাচন করুন</option>';
            var resp = JSON.parse(resp);
            //console.log(resp);
			$.each(resp, function(i, item) {
				//alert(i);
                txt += '<option value="' + resp[i].id + '">' + resp[i].task_name +'</option>';
            });
			//alert(txt);
            $('#task_id').html(txt);
        });
    });

</script>

<script type="text/javascript" src="{{ custom_asset('assets/ckeditor/ckeditor.js') }}"></script>
<script>
$('.datepicker').datetimepicker();
</script>
@endpush
