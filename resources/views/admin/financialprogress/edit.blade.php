@extends('layout.master')
@section('content')

<div class="content sm-gutter">
    <div class="container-fluid padding-25">
        <div class="card  bg-white">
            <div class="card-block">
                <h5>Edit Financial Progress</h5>

                <form action="{{url('dashboard/financialprogress/'. $financialProgress->id)}}" {{-- class="form-horizontal" --}} role="form"
                    method="POST" data-toggle="validator">
                    @csrf
                    <input name="_method" type="hidden" value="PUT">
                    <input name="redirect_to" type="hidden" value="{{ url()->previous() }}">

                    <div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
                        <label for="project_id" class="col-lg-2 control-label">Project Name<span
                                class="mendatory">*</span></label>
                        <div class="col-md-6 form-group">
                            {!! Form::select('project_id', \App\Project::pluck('name', 'id'), old('project_id', $financialProgress->project_id),
                            ['placeholder'=>'Please Select A Project','class' => 'form-control
                            full-width','data-init-plugin'=>'select2', 'id' => 'project_id', 'required' => 'required'])
                            !!}
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('estimated_expenditure') ? ' has-error' : '' }}">
                        <label for="estimated_expenditure" class="col-lg-4 control-label">Estimated Expenditure
                            <!-- <span class="mendatory">*</span> -->
                        </label>
                        <div class="col-md-6">
                            <input id="estimated_expenditure" type="number" class=" form-control"
                                name="estimated_expenditure" value="{{ old('estimated_expenditure', $financialProgress->estimated_expenditure) }}" step="any">
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('estimated_expenditure'))
                            <span class="help-block">
                                <strong>{{ $errors->first('estimated_expenditure') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('approve_expenditure') ? ' has-error' : '' }}">
                        <label for="approve_expenditure" class="col-lg-4 control-label">Approve Expenditure
                            <!-- <span class="mendatory">*</span> -->
                        </label>
                        <div class="col-md-6">
                            <input type="number" name="approve_expenditure" class="form-control"
                                value="{{ old('approve_expenditure', $financialProgress->approve_expenditure) }}" step="any">
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('actual_expenditure') ? ' has-error' : '' }}">
                        <label for="actual_expenditure" class="col-lg-4 control-label">Actual Expenditure
                            <!-- <span class="mendatory">*</span> -->
                        </label>
                        <div class="col-md-6">
                            <input type="number" name="actual_expenditure" class=" form-control"
                                value="{{ old('actual_expenditure', $financialProgress->actual_expenditure) }}" step="any">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-primary btn-cons m-b-10" type="submit"><i class="pg-form"></i> <span
                                    class="bold">Update</span>
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

@endpush
