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
                    <h5>@lang('lavel.project_category')</h5>
                    <form action="{{url('dashboard/project-categories')}}" {{-- class="form-horizontal" --}} role="form" method="POST" data-toggle="validator">
                        @csrf

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-2 control-label"> @lang('lavel.bangla_name')</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus oninvalid="this.setCustomValidity('@lang('lavel.please_fill_out_this_field')')" oninput="setCustomValidity('')">
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name_en') ? ' has-error' : '' }}">
                            <label for="name_en" class="col-lg-2 control-label"> @lang('lavel.name')</label>

                            <div class="col-md-6">
                                <input id="name_en" type="text" class="form-control" name="name_en" value="{{ old('name_en') }}" required autofocus oninvalid="this.setCustomValidity('@lang('lavel.please_fill_out_this_field')')" oninput="setCustomValidity('')">
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('name_en'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name_en') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-lg-4 control-label"> @lang('lavel.description')</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus oninvalid="this.setCustomValidity('@lang('lavel.please_fill_out_this_field')')" oninput="setCustomValidity('')">
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="first_process" class="col-lg-4 control-label">@lang('lavel.status')<span
                                    class="mendatory">*</span></label>
                            <div class="col-md-6 form-group">
                                <select name="status" id="status" class="form-control full-width">
                                   
                                    <option value="1" selected>Active</option>
                                    <option value="0" >Inactive</option>
                                    
                                </select>
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
