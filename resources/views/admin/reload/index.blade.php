@extends('layout.frontend')
@section('content')
    <div class="content sm-gutter">
        <!-- START CONTAINER FLUID -->
        <div class="container-fluid padding-25">
            <div class="card  bg-white">
                <div class="row">
                    <div class="col-lg-12">
                        {!! Session::has('success') ? '<div class="alert alert-success">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>'. Session::get("success") .'</div>' : '' !!}
                        {!! Session::has('error') ? '<div class="alert alert-danger">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>'. Session::get("error") .'</div>' : '' !!}
                    </div>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <!-- START card -->
                        <div class="card card-transparent">
                            <div class="card-title btn_left p-l-20">
                                <h5 class="m-b-0">@lang('lavel.reload_data')</h5>
                            </div>
                            <div class="card-header ">
                                <div class="form-group">
                                    <form id="reloadDataForm" action="{{url('reload-data')}}" role="form" method="POST"
                                          data-toggle="validator">
                                        @csrf
                                        <div class="col-md-2 form-group btn_left">
                                            {!! Form::select('project_id', \App\Project::where('status', 1)->pluck('bangla_name', 'id'), old('project_id'),
                                                ['placeholder'=>'উদ্যোগ নির্বাচন','class' => 'form-control full-width','data-init-plugin'=>'select2', 'id' => 'project_id', 'required' => 'required'])
                                             !!}
                                        </div>
                                        <div class="col-md-2 form-group btn_left">
                                            <input type="text" id="daterange" name="daterange" class="form-control" value="" autocomplete="off" placeholder="Date"/>
                                        </div>
                                        <button class="btn btn-primary btn-cons m-b-10 btn_left" type="submit">
                                            <i class="fa fa-arrow-right" aria-hidden="true"></i><span class="bold">&nbsp;&nbsp;&nbsp;@lang('lavel.reload_data')</span>
                                        </button>
                                    </form>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(function () {
                $("#daterange").datepicker({
                    format: "yyyy-mm-dd",
                }).on('changeDate', function () {
                    $('.datepicker-dropdown').css('display', 'none');
                });

                $("form").submit(function(e){
                    e.preventDefault();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, reload it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById("reloadDataForm").submit();
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
