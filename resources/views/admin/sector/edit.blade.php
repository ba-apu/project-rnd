@extends('layout.frontend')
@section('content')

<div class="content sm-gutter">
    <div class="container-fluid padding-25">
        <div class="card  bg-white">
            <div class="card-block">
                <h5>@lang('lavel.update_sector')</h5>

                <form action="{{url('dashboard/sector/' . $sector->id)}}" {{-- class="form-horizontal" --}} role="form"
                    method="POST" data-toggle="validator">
                    @csrf
                    <input name="_method" type="hidden" value="PUT">
                    <input name="redirect_to" type="hidden" value="{{ url()->previous() }}">

                    <div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
                        <label for="project_id" class="col-lg-2 control-label">@lang('lavel.project_name')<span
                                class="mendatory">*</span></label>
                        <div class="col-md-6 form-group">
                            {!! Form::select('project_id', \App\Project::pluck('name', 'id'), old('project_id',
                            $sector->project_id),
                            ['placeholder'=>'Please Select A Project','class' => 'form-control
                            full-width','data-init-plugin'=>'select2', 'id' => 'project_id', 'required' => 'required'])
                            !!}
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-lg-4 control-label">@lang('lavel.name')<span class="mendatory">*</span></label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name"
                                value="{{ old('name',$sector->name) }}" required autofocus>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('bangla_name') ? ' has-error' : '' }}">
                        <label for="bangla_name" class="col-lg-4 control-label">@lang('lavel.bangla_name')<span class="mendatory">*</span></label>

                        <div class="col-md-6">
                            <input id="bangla_name" type="text" class="form-control" name="bangla_name"
                                value="{{ old('bangla_name',$sector->bangla_name) }}" required autofocus>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('bangla_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('bangla_name') }}</strong>
                            </span>
                            @endif
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

