@extends('layout.frontend')
@section('content')

<div class="content sm-gutter">
    <div class="container-fluid padding-25">
        <div class="card  bg-white">
            <div class="card-block">
                <h5>@lang('lavel.new_task_name')</h5>

                <form action="{{url('dashboard/task')}}" {{-- class="form-horizontal" --}} role="form" method="POST"
                    data-toggle="validator">
                    @csrf

                    <div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
                        <label for="project_id" class="col-lg-2 control-label">@lang('lavel.project')
                            <span class="mendatory">*</span>
                        </label>
                        <div class="col-md-6 form-group">
                            {!! Form::select('project_id', \App\Project::pluck('name', 'id'), old('project_id'),
                            ['placeholder'=>'Please Select A Project','class' => 'form-control
                            full-width','data-init-plugin'=>'select2', 'id' => 'project_id', 'required' => 'required'])
                            !!}
                        </div>
                    </div>
                    {{--
                    <div class="form-group{{ $errors->has('sector_id') ? ' has-error' : '' }}">
                        <label for="sector_id" class="col-lg-2 control-label">@lang('lavel.sector')
                            <span class="mendatory">*</span>
                        </label>
                        <div class="col-md-6 form-group">
                            {!! Form::select('sector_id', \App\Sector::pluck('name', 'id'), old('sector_id'),
                            ['placeholder'=>'Please Select A Project','class' => 'form-control
                            full-width','data-init-plugin'=>'select2', 'id' => 'sector_id', 'required' => 'required'])
                            !!}
                        </div>
                    </div>
                    --}}
                    <div class="form-group{{ $errors->has('task_name') ? ' has-error' : '' }}">
                        <label for="task_name" class="col-lg-4 control-label">@lang('lavel.task_name')
                            <span class="mendatory">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="task_name" type="text" class="form-control" name="task_name" value="{{ old('task_name') }}"
                                required autofocus>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('task_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('task_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                     {{--
                    <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                        <label for="amount" class="col-lg-4 control-label">টাকা<span class="mendatory"></span></label>
                        <div class="col-md-6">
                            <input type="number" name="amount" class="form-control" value="{{ old('amount') }}" step="any">
                        </div>
                    </div>
                    --}}

                    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                        <label for="date" class="col-lg-4 control-label">@lang('lavel.date')<span
                                class="mendatory">*</span></label>
                        <div id="date" data-provide="datepicker" class="input-group date col-md-6">
                            <input type="text"  name="date" class="form-control" value="{{ old('date') }}"
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

@push('script')

<script>
$('.datepicker').datetimepicker();
</script>
</script>
@endpush
