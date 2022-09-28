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
                                        {!! Form::select('project', \App\Project::pluck('bangla_name', 'id'), old('project'), ['class' => 'browser-default w-100 custom-select custom-select-lg mb-2', 'required', 'placeholder' => 'উদ্যোগ নির্বাচন করুন']) !!}
                                        <div class="help-block with-errors"></div>
                                        @if ($errors->has('project'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('project') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="file-upload col-md-8">
                                        <div class="file-select">
                                            <div class="file-select-button" id="fileName">@lang('lavel.choose_file')</div>
                                            <div class="file-select-name" id="noFile">@lang('lavel.no_file_chosen')</div>
                                            <input type="file" name="import_file" id="chooseFile">
                                        </div>
                                    </div>
                                </div>

                                <br />

                                <button class="btn btn-primary btn-cons">
                                    <i class="fa fa-cloud-upload"></i> <span class="bold">@lang('lavel.upload')</span>
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
