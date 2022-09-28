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
                            <div class="card-header ">
                                <!-- <div class="card-title">{{ $pageTitle }}</div> -->
                                <div class="card-title">@lang('lavel.general_queries')</div>

                                {{-- <div class="form-group">

                                    <form action="{{ url()->current() }}" method="get" name="filter_item" id="filter_item">
                                        <div class="col-md-4 form-group btn_left">
                                            {!! Form::text('email', old('email'), array('class' => 'input-sm form-control', 'placeholder' => 'User Email')) !!}
                                          </div>

                                        <button class="btn btn-primary btn-cons m-b-10 btn_left" type="submit"><i
                                                class="fa fa-search" aria-hidden="true"></i><span class="bold">&nbsp;&nbsp;@lang('lavel.search')</span>
                                        </button>

                                    </form>
                                    <div>

                                        <div class="btn_right">
                                            <a href="{{url('dashboard/user/create')}}"
                                               class="btn btn-primary btn-cons m-b-10 btn_right"><i class="fa fa-plus"></i>
                                               @lang('lavel.new_create')</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div> --}}
                            </div>

                        </div>

                        <div class="card-block">
                            <div class="ajax-content">
                                <table class="table table-hover demo-table-dynamic table-responsive-block"
                                    id="tableWithDynamicRows">
                                    <thead>
                                    <th>@lang('name')</th>
                                    <th>@lang('From Date')</th>
                                    <th>@lang('To Date')</th>
                                    <th>@lang('Error Message')</th>
                                    {{-- <th>&nbsp;</th> --}}
                                    </thead>
                                    <tbody>
                                    @forelse($projectApiDetails  as $data)
                                        <tr>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->from_date}}</td>
                                            <td>{{$data->to_date}}</td>
                                            <td>{{$data->message}}</td>
                                            
                                        {{--  <td><a href="{{url('dashboard/general-queries/'.$data->id)}}" class="confirm" data-msg="Are you sure want to delete {{$data->name}}?">Delete</a></td> --}}
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5"><em>No data found</em></td>
                                        </tr>
                                    </tbody>
                                    @endforelse
                                </table>
                                {{$projectApiDetails->links()}}
                                <div class="col-sm-12 text-right text-center-xs">
                                    <div class="pagination-sm m-t-none m-b-none">
                                        {{-- {{ $users->appends(['name' => $name, 'email' => $email, 'mobile_no' => $monible_no, 'details' => $details])->links() }} --}}
                                    </div>
                                </div>

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
