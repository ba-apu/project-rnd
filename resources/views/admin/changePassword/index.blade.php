@extends('layout.frontend')
@section('content')

<div class="content sm-gutter">
    <div class="container-fluid padding-25">
        <div class="card  bg-white">
            <div class="card-block">
                <h5>পাসওয়ার্ড পরিবর্তন</h5>

                <form action="{{url('change-password')}}" {{-- class="form-horizontal" --}} role="form" method="POST"
                    data-toggle="validator">
                    @csrf
					
                    
					
					
                    <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                        <label for="old_password" class="col-lg-4 control-label">পুরাতন পাসওয়ার্ড
                            <span class="mendatory">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="old_password" type="password" class="form-control" name="old_password" value="{{ old('old_password') }}"
                                required autofocus>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('old_password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('old_password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
					<div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                        <label for="new_password" class="col-lg-4 control-label"> নতুন পাসওয়ার্ড
                            <span class="mendatory">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="new_password" type="password" class="form-control" name="new_password" value="{{ old('new_password') }}"
                                required autofocus>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('new_password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('new_password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
					<div class="form-group{{ $errors->has('new_password_confirmation') ? ' has-error' : '' }}">
                        <label for="new_password_confirmation" class="col-lg-4 control-label"> নতুন পাসওয়ার্ড পুনরায়
                            <span class="mendatory">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" value="{{ old('new_password_confirmation') }}"
                                required autofocus>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('new_password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('new_password_confirmation') }}</strong>
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

