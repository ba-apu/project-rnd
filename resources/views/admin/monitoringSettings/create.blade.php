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
                <h5>@lang('lavel.project_wise_monitoring_ystem')</h5>
                <form action="{{url('monitoring/get-project-wise-monitoring')}}" {{-- class="form-horizontal" --}}
                    role="form" method="POST" data-toggle="validator">
                    @csrf

                    <div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
                        <label for="name" class="col-lg-2 control-label">@lang('lavel.project') </label>

                        <div class="col-md-6 form-group">
                            {!! Form::select('project_id', \App\Project::pluck('name', 'id'), old('project_id'),
                            ['placeholder'=>'Please Select A Project','class' => 'form-control
                            full-width','data-init-plugin'=>'select2', 'id' => 'project_id', 'required' => 'required'])
                            !!}
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('product_owner') ? ' has-error' : '' }}">
                        <label for="name" class="col-lg-2 control-label">Product Owner </label>

                        <div class="col-md-6 form-group">
                            {!! Form::select('product_owner', \App\User::pluck('name', 'id'), old('product_owner'),
                            ['placeholder'=>'Please Select An User','class' => 'form-control
                            full-width','data-init-plugin'=>'select2', 'id' => 'product_owner', 'required' =>
                            'required'])
                            !!}
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('product_owner_email_days') ? ' has-error' : '' }}">
                        <label for="product_owner_email_days"
                            class="col-lg-4 control-label">@lang('lavel.product_owner_email_distance')
                            <span class="mendatory"></span>
                        </label>
                        <div class="col-md-6">
                            <input id="product_owner_email_days" type="number" class="form-control"
                                name="product_owner_email_days" value="{{ old('product_owner_email_days') }}" required
                                autofocus>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('product_owner_email_days'))
                            <span class="help-block">
                                <strong>{{ $errors->first('product_owner_email_days') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('team_lead') ? ' has-error' : '' }}">
                        <label for="name" class="col-lg-2 control-label">@lang('lavel.team_lead')</label>

                        <div class="col-md-6 form-group">
                            {!! Form::select('team_lead', \App\User::pluck('name', 'id'), old('team_lead'),
                            ['placeholder'=>'Please Select An User','class' => 'form-control
                            full-width','data-init-plugin'=>'select2', 'id' => 'team_lead', 'required' => 'required'])
                            !!}
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('team_lead_email_days') ? ' has-error' : '' }}">
                        <label for="team_lead_email_days"
                            class="col-lg-4 control-label">@lang('lavel.team_lead_email_distance')
                            <span class="mendatory"></span>
                        </label>
                        <div class="col-md-6">
                            <input id="team_lead_email_days" type="number" class="form-control"
                                name="team_lead_email_days" value="{{ old('team_lead_email_days') }}" required
                                autofocus>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('team_lead_email_days'))
                            <span class="help-block">
                                <strong>{{ $errors->first('team_lead_email_days') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('cluster_head') ? ' has-error' : '' }}">
                        <label for="name" class="col-lg-2 control-label">@lang('lavel.cluster_head')</label>

                        <div class="col-md-6 form-group">
                            {!! Form::select('cluster_head', \App\User::pluck('name', 'id'), old('cluster_head'),
                            ['placeholder'=>'Please Select An User','class' => 'form-control
                            full-width','data-init-plugin'=>'select2', 'id' => 'cluster_head', 'required' =>
                            'required'])
                            !!}
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('cluster_head_email_days') ? ' has-error' : '' }}">
                        <label for="cluster_head_email_days"
                            class="col-lg-4 control-label">@lang('lavel.cluster_head_qwner_email_distance')
                            <span class="mendatory"></span>
                        </label>
                        <div class="col-md-6">
                            <input id="cluster_head_email_days" type="number" class="form-control"
                                name="cluster_head_email_days" value="{{ old('cluster_head_email_days') }}" required
                                autofocus>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('cluster_head_email_days'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cluster_head_email_days') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('cluster_head') ? ' has-error' : '' }}">
                        <label for="name" class="col-lg-2 control-label">@lang('lavel.management') </label>

                        <div class="col-md-6 form-group">
                            {!! Form::select('cluster_head', \App\User::pluck('name', 'id'), old('cluster_head'),
                            ['placeholder'=>'Please Select An User','class' => 'form-control
                            full-width','data-init-plugin'=>'select2', 'id' => 'cluster_head', 'required' =>
                            'required'])
                            !!}
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('management_email_days') ? ' has-error' : '' }}">
                        <label for="management_email_days"
                            class="col-lg-4 control-label">@lang('lavel.management_email_distance')
                            <span class="mendatory"></span>
                        </label>
                        <div class="col-md-6">
                            <input id="management_email_days" type="number" class="form-control"
                                name="management_email_days" value="{{ old('management_email_days') }}" required
                                autofocus>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('management_email_days'))
                            <span class="help-block">
                                <strong>{{ $errors->first('management_email_days') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>










                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            {{--  <button type="submit" class="btn btn-primary">
                                     Add Admin
                                 </button> --}}
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