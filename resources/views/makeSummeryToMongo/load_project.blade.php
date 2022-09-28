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
            <div class="card bg-white">
                <div class="card-block">
                    <div class="inner text-center p-t-50 p-b-50 full-height">
                        <div class="up-load-box p-t-50 p-b-50">

                            <form method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12 form-group{{ $errors->has('project') ? ' has-error' : '' }}">
                                    <div class="col-md-12 text-center">
									<h4 for="project" class="control-label tit-co">@lang('lavel.project')</h4>
									</div>

                                    <div class="col-md-8 mx-auto">
                                        {!! Form::select('project', \App\Project::pluck('bangla_name', 'id'), old('project'), ['class' => 'browser-default w-100 custom-select custom-select-lg mb-2', 'required', 'placeholder' => 'প্রকল্প নির্বাচন করুন']) !!}
                                        <div class="help-block with-errors"></div>
                                        @if ($errors->has('project'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('project') }}</strong>
                                    </span>
                                        @endif
                                    </div>
									
                                </div>
								<div class="col-md-12 form-group{{ $errors->has('project') ? ' has-error' : '' }}">
                                    <div class="col-md-12 text-center">
									<h4 for="project" class="control-label tit-co">@lang('lavel.year')</h4>
									</div>
									<div class="col-md-8 mx-auto">
										<select name="year" class="browser-default w-100 custom-select custom-select-lg mb-2" id="year">
											<option value="">@lang('lavel.select_year')</option>
											@for($i=2009;$i<=2019;$i++)
											<option value="{{$i}}">{{$i}}</option>
											@endfor
										</select>
									</div>
                                </div>
								<div class="col-md-12 form-group{{ $errors->has('project') ? ' has-error' : '' }}">
                                    <div class="col-md-12 text-center">
									<h4 for="project" class="control-label tit-co">@lang('lavel.month')</h4>
									</div>
									<div class="col-md-8 mx-auto">
										<select name="month" class="browser-default w-100 custom-select custom-select-lg mb-2" id="year">
											<option value="">@lang('lavel.select_month')</option>
											@for($i=1;$i<=12;$i++)
											<option value="{{$i}}">{{$i}}</option>
											@endfor
										</select>
									</div>
                                </div>
								
                              

                                

                                <br />

								<button class="btn btn-primary btn-cons">
								 <span class="bold">@lang('lavel.submit')</span>
								</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            $('#chooseFile').bind('change', function () {
                var filename = $("#chooseFile").val();
                if (/^\s*$/.test(filename)) {
                    $(".file-upload").removeClass('active');
                    $("#noFile").text("No file chosen...");
                }
                else {
                    $(".file-upload").addClass('active');
                    $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
                }
            });
        </script>
    @endpush
@endsection
