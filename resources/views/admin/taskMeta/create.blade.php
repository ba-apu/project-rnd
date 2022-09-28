@extends('layout.frontend')
@section('content')

<div class="content sm-gutter">
    <div class="container-fluid padding-25">
        <div class="card  bg-white">
            <div class="card-block">
                <h5>আর্থিক অগ্রগতি</h5>

                <form action="{{url('dashboard/task-meta')}}" {{-- class="form-horizontal" --}} role="form" method="POST"
                    data-toggle="validator">
                    @csrf
                    <div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
                        <label for="project_id" class="col-lg-2 control-label">প্রকল্পের নাম
                            <span class="mendatory">*</span>
                        </label>
                        <div class="col-md-6 form-group">
                            {!! Form::select('project_id', \App\Project::pluck('name', 'id'), old('project_id'),
                            ['placeholder'=>'Please Select A Project','class' => 'form-control
                            full-width','data-init-plugin'=>'select2', 'id' => 'project_id', 'required' => 'required'])
                            !!}
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('task_id') ? ' has-error' : '' }}">
                        <label for="task_id" class="col-lg-2 control-label">টাস্ক
                            <span class="mendatory">*</span>
                        </label>
                        <div class="col-md-6 form-group">
                            <select class="form-control full-width" data-init-plugin="select2" id="task_id"
                                name="task_id">
                            </select>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('event_id') ? ' has-error' : '' }}">
                        <label for="event_id" class="col-lg-2 control-label">ইভেন্ট
                            <span class="mendatory">*</span>
                        </label>
                        <div class="col-md-6 form-group">
                            <select class="form-control full-width" data-init-plugin="select2" id="event_id"
                                name="event_id">
                            </select>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('key') ? ' has-error' : '' }}">
                        <label for="key" class="col-lg-2 control-label">Key
                            <span class="mendatory">*</span>
                        </label>
                        <div class="col-md-6 form-group">
                            <select class="form-control full-width" data-init-plugin="select2" id="key"
                                name="key">
                                <option value="">Select Key</option>
                                <option value="apply">Apply</option>
                                <option value="approve">Approve</option>
                                <option value="real">Real</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                        <label for="title" class="col-lg-4 control-label">আবেদনকৃত টাকা
                            <span class="mendatory">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="title" type="number" class="form-control" name="amount"
                                value="{{ old('amount') }}" required autofocus>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('amount'))
                            <span class="help-block">
                                <strong>{{ $errors->first('amount') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-primary btn-cons m-b-10" type="submit"><i class="pg-form"></i> <span
                                    class="bold">সাবমিট</span>
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
$(document).ready(function() {

    $(document).on("wheel", "input[type=number]", function(e) {
        $(this).blur();
    });

    $(document).on("change", "#project_id", function(e) {
        var project_id = $(this).val();

        $.ajax({
            type: "get",
            url: "{{ url('ajax/get-task') }}",
            data: {
                'project_id': project_id,
            }
        }).done(function(resp) {

            var txt = '<option value="">Select Task</option>';
            //var resp = JSON.parse(resp);
            $.each(resp, function(i, item) {
                txt += '<option value="' + resp[i].id + '">' + resp[i].task_name +
                    '</option>';
            });
            $('#task_id').html(txt);
        });
    });

    $(document).on("change", "#task_id", function(e) {
        var task_id = $(this).val();

        $.ajax({
            type: "get",
            url: "{{ url('ajax/get-event') }}",
            data: {
                'task_id': task_id,
            }
        }).done(function(resp) {
            console.log(resp);
            var txt = '<option value="">Select Event</option>';
            //var resp = JSON.parse(resp);
            $.each(resp, function(i, item) {
                txt += '<option value="' + resp[i].id + '">' + resp[i].title +
                    '</option>';
            });
            $('#event_id').html(txt);
        });
    });
});
</script>
@endpush