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

                    <div class="table-responsive">
                        <!-- START card -->
                        <div class="card card-transparent">
                            <div class="card-header cust-card-header">
                                <!-- <div class="card-title">{{ $pageTitle }}</div> -->
                                {{-- <div class="card-title">@lang('lavel.general_queries')</div> --}}

                                {{-- <div class="form-group"> --}}

                                    <form action="{{ url()->current() }}" method="get" name="filter_item" id="filter_item">
                                        <div class="row">

                                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }} col-4">
                                            <label for="date" class="control-label">@lang('lavel.date')
                                               
                                            </label>
                                            <div id="date" data-provide="datepicker" class="input-group date">
                                            <input type="text"  name="date" class="form-control"  value="{{$selectedDate}}"
                                                    autocomplete="off"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                       
                                          
                                            <div class=" form-group col-4">
                                                    <label for="project_id" class=" control-label">@lang('lavel.project_name')
                                                
                                                        </label>
                                                {!! Form::select('project_id', \App\Project::pluck('bangla_name', 'id'), old('project_id'),
                                                ['placeholder'=>'প্রকল্প নির্বাচন করুন','class' => 'form-control
                                                full-width','data-init-plugin'=>'select2', 'id' => 'project_id'])
                                                !!}
                                            </div>
                                     

                                      <div class="form-group col-4">
                                            <button class="btn btn-primary btn-cons m-b-10 btn_left" type="submit"><i
                                                class="fa fa-search" aria-hidden="true"></i><span class="bold">&nbsp;&nbsp;@lang('lavel.search')</span>
                                                </button>
                                        </div>
                                        </div>
                                    </form>
                                {{-- </div> --}}
                            </div>

                        </div>

                        <div class="card-block">
                            <div class="ajax-content">
                                @include('admin.projectDataSync.ajax')
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_bottom')
    <script type="text/javascript">

        $(function () {
            $("#filter_item").find('select').on('change', function () {
                getFilterData();
            });

            $("#filter_item").on('submit', function (e) {
                e.preventDefault();
                getFilterData();
            })

            $('body').on('click', '.pagination a', function (e) {
                e.preventDefault();

//            $('#load a').css('color', '#dfecf6');
//            $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

                var url = $(this).attr('href');
                getContent(url);

                window.history.pushState("", "", url);
                //window.history.pushState('object', 'New Title', url);

                $(".pagination").find(".active").removeClass("active");
                $(this).closest('li').toggleClass("active");
            });

        });

        function resetForm() {
            $('#filter_item').trigger("reset");
            getFilterData();
            return false;
        }

        function getFilterData(){
            var url = $('#filter_item').attr('action');
            $.ajax({
                url: url,
                data: $("#filter_item").serialize(),
                method: 'GET'
            }).done(function (data) {
                $('.ajax-content').html(data);
            }).fail(function () {
                alert('Content could not be loaded.');
            });
        }

        function getContent(url) {
            $.ajax({
                url: url
            }).done(function (data) {
                $('.ajax-content').html(data);
            }).fail(function () {
                alert('Content could not be loaded.');
            });
        }

    </script>
@endsection
