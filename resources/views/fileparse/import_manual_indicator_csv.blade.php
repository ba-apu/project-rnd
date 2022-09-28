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
        <input type="hidden" id="selected_project_id">
        <div class="container-fluid padding-25">
            <div class="card bg-white">
                <div class="card-block">
                    <div class="inner text-center p-t-50 p-b-50 full-height">
                        <div class="up-load-box p-t-10 p-b-10 p-r-10 p-l-10" style="width:80%">
                            <div class="col-md-12 text-center">
                                <h5 for="project" class="control-label tit-co"> বাল্ক আপলোড (ম্যানুয়াল ডাটা)  <hr> <!-- @lang('lavel.project') --></h5>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <form method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group{{ $errors->has('project') ? ' has-error' : '' }} p-l-10 p-r-10">

                                            <div class="m-b-5">
                                                {!! Form::select('project', \App\Project::pluck('bangla_name', 'id'), old('project'),
                                                ['class' => 'browser-default w-100 custom-select custom-select-lg mb-2',
                                                'id'=>'project', 'required', 'placeholder' => 'উদ্যোগ নির্বাচন করুন', 'data-init-plugin'=>'select2']) !!}
                                                <div class="help-block with-errors"></div>
                                                @if ($errors->has('project'))
                                                    <span class="help-block">
												<strong>{{ $errors->first('project') }}</strong>
											</span>
                                                @endif
                                            </div>
                                            <div class="file-upload ">
                                                <div class="file-select">
                                                    <div class="file-select-button" id="fileName">@lang('lavel.choose_file')</div>
                                                    <div class="file-select-name" id="noFile">@lang('lavel.no_file_chosen')</div>
                                                    <input type="file" name="import_file" id="chooseFile" accept=".csv">
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary btn-cons my-3">
                                            <i class="fa fa-cloud-upload"></i> <span class="bold">@lang('lavel.upload')</span>
                                        </button>
                                    </form>

                                </div>

                                <div class="col-md-6">
                                    <!--for excel report -->
                                    <button id="btnToggUp" class="btn btn-secondary at-aglance-button m-b-10 m-t-10" type="button">View and download sample sheet <i class="fa fa-bars" aria-hidden="true"></i></button>
                                    <div>
                                        <a target="_blank" href="{{ custom_asset('pdf/manual_data_bulk_upload_user_manual.pdf') }}" class="text-danger"><i class="fa fa-info-circle"></i> <span class="bold">ফাইল আপলোড করার নির্দেশিকা দেখতে এই  ব্যবহার নির্দেশিকা অনুসরণ করুন</span></a>
                                    </div>
                                    <div class="modal fade slide-up glance-tbl" id="ataGlanceSlideUp" tabindex="-1" role="dialog" aria-hidden="false" style="overflow-x:scroll;">
                                        <div class="modal-dialog" style="width:90%; max-width:90%;">
                                            <div class="modal-content-wrapper">
                                                <div class="modal-content">
                                                    <div class="modal-header clearfix text-left">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-20"></i></button>
                                                        <h5 class="m-t-0 m-b-0"><span class="semi-bold tit-co"></span></h5>
                                                    </div>
                                                    <div class="modal-body" id="at-a-glance">
                                                        <span class="loder"><img src="{{custom_asset('pages/img/loder-a2i.gif')}}" class="img-fluid" alt=""></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
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
        <script>
            $('#btnToggUp').click(function() {
                project_id=$("#selected_project_id").val();
                if(project_id == ""){ return false; }

                var size = $('input[name=slideup_toggler]:checked').val()
                var modalElem = $('#ataGlanceSlideUp');
                if (size == "mini") {
                    $('#ataGlanceSlideUpUpLarge').modal('show')
                } else {
                    $('#ataGlanceSlideUp').modal('show')
                    if (size == "default") {
                        modalElem.children('.modal-dialog').removeClass('modal-lg');
                    } else if (size == "full") {
                        modalElem.children('.modal-dialog').addClass('modal-lg');
                    }
                }
            });
        </script>
        <script>
            $('.at-aglance-button').click(function(){
                project_id=$("#selected_project_id").val();
                if(project_id == ""){ alert("প্রথমে একটি উদ্যোগ নির্বাচন করুন"); return false; }
                else{
                    $.ajax({
                        type: "get",
                        url: "{{ url('ajax/get-formate-manual-indicator-report-for-excel-upload') }}",
                        data: {
                            'project_id': project_id
                        }
                    }).done(function(resp) {
                        $("#at-a-glance").html(resp);
                    });
                }
            });
        </script>
        <script>
            function excelout(){
                //alert($('#at-glance').html());
                //$("#exportToExcel").click(function(e){
                //alert('as');
                file_name=$( "#selected_project_id:selected" ).text();
                if(file_name == "")
                {
                    file_name="manual_sheet";
                }
                //alert(file_name);
                event.preventDefault();
                $("#at-glance").table2excel({
                    exclude: ".noExl",
                    name: file_name
                });
                //});
            }
        </script>
        <script>
            $( "#project" ).change(function() {
                project_id=$(this).val();
                $("#selected_project_id").val(project_id);
            });
        </script>
    @endpush
@endsection
