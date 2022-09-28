@extends('layout.frontend')
@section('content')

<div class="content sm-gutter">
    <div class="container-fluid padding-25">
        <div class="card  bg-white">
            <div class="card-block">
                <h5>Edit Work Plan</h5>

                <form action="{{url('dashboard/workPlan/' . $workPlan->id)}}" {{-- class="form-horizontal" --}} role="form"
                    method="POST" data-toggle="validator">
                    @csrf
                    <input name="_method" type="hidden" value="PUT">
                    <input name="redirect_to" type="hidden" value="{{ url()->previous() }}">

                    <div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
                        <label for="project_id" class="col-lg-2 control-label">Project Name<span
                                class="mendatory">*</span></label>
                        <div class="col-md-6 form-group">
                            {!! Form::select('project_id', \App\Project::pluck('name', 'id'), old('project_id',
                            $workPlan->project_id),
                            ['placeholder'=>'Please Select A Project','class' => 'form-control
                            full-width','data-init-plugin'=>'select2', 'id' => 'project_id', 'required' => 'required'])
                            !!}
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title" class="col-lg-4 control-label">Title<span class="mendatory">*</span></label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title"
                                value="{{ old('title',$workPlan->title) }}" required autofocus>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                        <label for="date" class="col-lg-4 control-label">Date<span class="mendatory">*</span></label>
                        <div id="date" data-provide="datepicker" class="input-group date col-md-6">
                            <input type="text" id="date" name="date" class="form-control" value="{{ old('date',date('m/d/Y',strtotime($workPlan->date))) }}"
                                autocomplete="off"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                        <label for="details" class="col-lg-4 control-label">Details</label>
                        <div class="col-md-6">
                            <textarea class="ckeditor form-control" name="details"
                                placeholder="Write Details Here...">{{ old('details', $workPlan->details) }}</textarea>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('done_date') ? ' has-error' : '' }}">
                        <label for="done_date" class="col-lg-4 control-label">Done Date<span
                                class="mendatory">*</span></label>
                        <div id="done_date" data-provide="datepicker" class="input-group date col-md-6">
                            <input type="text" id="done_date" name="done_date" class="form-control" value="{{ old('done_date',date('m/d/Y',strtotime($workPlan->done_date))) }}"
                                autocomplete="off"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>

                    <!-- <div class="form-group{{ $errors->has('done_date') ? ' has-error' : '' }}">
                        <label for="done_date" class="col-lg-4 control-label">Done Date<span
                                class="mendatory">*</span></label>
                        <div class="col-md-6">
                            <input id="input" name="done_date" class="form-control"
                                value="{{ old('done_date',$workPlan->done_date) }}" />
                            <script>
                            $('#input').datetimepicker({
                                uiLibrary: 'bootstrap4',
                                modal: true,
                                footer: true
                            });
                            </script>
                        </div>

                    </div> -->

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-primary btn-cons m-b-10" type="submit"><i class="pg-form"></i> <span
                                    class="bold">Edit Work Plan</span>
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
<script type="text/javascript" src="{{ custom_asset('assets/ckeditor/ckeditor.js') }}"></script>
<script>
// $("#date").datepicker();
// $("#done_date").datepicker();
$('.datepicker').datepicker();
</script>

@endpush
