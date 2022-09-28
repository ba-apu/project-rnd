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
                            <table>
                                @foreach ($project_apis as $project_api )
                                <tr>
                                        <th>@lang('lavel.name') </th>
                                        <th>{{ $project_api->name }}</th>
                                    </tr>
                                    <tr>
                                        <th>Main Url </th>
                                        <th>{{ $project_api->url_obj }}</th>
                                    </tr>
                                    <tr>
                                        <th>Token Url </th>
                                        <th>{{ $project_api->token_url }}</th>
                                    </tr>
                                    <tr>
                                        <th>Replace Obj </th>
                                        <th>{{ $project_api->replace_obj }}</th>
                                    </tr>
                                    <tr>
                                        <th>Alter Obj </th>
                                        <th>{{ $project_api->alter_obj }}</th>
                                    </tr> 
                                @endforeach                                

                            </table>                  

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
