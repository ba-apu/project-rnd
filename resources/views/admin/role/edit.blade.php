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
                    <h5>@lang('lavel.update_role')</h5>
                    <form action="{{url('dashboard/role/' . $role->id)}}" {{-- class="form-horizontal" --}} role="form" method="POST" data-toggle="validator">
                        @csrf
                        <input name="_method" type="hidden" value="PUT">
                        <input name="redirect_to" type="hidden" value="{{ url()->previous() }}">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-2 control-label">@lang('lavel.identifier')</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $role->name) }}" required autofocus>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                            <label for="display_name" class="col-lg-2 control-label">@lang('lavel.display_name')</label>

                            <div class="col-md-6">
                                <input id="display_name" type="text" class="form-control" name="display_name" value="{{ old('display_name', $role->display_name) }}" required autofocus>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('display_name'))
                                    <span class="help-block">
                <strong>{{ $errors->first('display_name') }}</strong>
            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-lg-2 control-label">@lang('lavel.description')</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description', $role->description) }}" required autofocus>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                {{-- <button type="submit" class="btn btn-primary">
                                    Update Role
                                </button> --}}
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
