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
                                <div class="card-title">@lang('lavel.role')</div>

                                <div class="form-group">
                                    <div>

                                        <div class="btn_right">
                                            <a href="{{url('dashboard/role/create')}}"
                                               class="btn btn-primary btn-cons m-b-10 btn_right"><i class="fa fa-plus"></i>
                                               @lang('lavel.new_create')</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-block">
                            <div class="ajax-content">
                                @include('admin.role.ajax')
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
            $('body').on('click', '.pagination a', function (e) {
                e.preventDefault();

//            $('#load a').css('color', '#dfecf6');
//            $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

                var url = $(this).attr('href');
                getContent(url);
                window.history.pushState("", "", url);

                $(".pagination").find(".active").removeClass("active");
                $(this).closest('li').toggleClass("active");
            });

            function getContent(url) {
                $.ajax({
                    url: url
                }).done(function (data) {
                    $('.ajax-content').html(data);
                }).fail(function () {
                    alert('Content could not be loaded.');
                });
            }
        });

    </script>
@endsection
