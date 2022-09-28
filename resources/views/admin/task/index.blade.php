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

                    <div class="ajax-content">
                        @include('admin.task.ajax')
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
