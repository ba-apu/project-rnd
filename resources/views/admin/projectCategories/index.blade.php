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
                            <div class="card-title btn_left p-l-20">
                                <h5 class="m-b-0">দল</h5>
                            </div>
                            <div class="card-header">
                                <div class="form-group">
                                    <form action="" method="get" role="search">
                                        @csrf
                                        <div class="col-md-2 form-group btn_left">
                                            <input type="search" name="categoryname" class="form-control" placeholder="দল এর নাম... ">
                                        </div>
                                        <button class="btn btn-primary btn-cons m-b-10 btn_left" type="submit"><i
                                                    class="fa fa-search" aria-hidden="true"></i><span class="bold">&nbsp;&nbsp;&nbsp;@lang('lavel.search')</span>
                                        </button>
                                    </form>
                                </div>

                                <div class="btn_right">
                                    <button id="btnToggleSlideUp" class="btn btn-primary btn-cons m-b-10 btn-secondary btn-cons" type="button" style="box-shadow:1px 1px #d2d2d2;" > ক্রমবিণ্যাস <i class="fa fa-bars" aria-hidden="true"></i></button>
                                    <pre id="serialize_output2"></pre>
                                    <a href="{{url('dashboard/project-categories/create')}}"
                                       class="btn btn-primary btn-cons m-b-10 btn_right"><i class="fa fa-plus"></i>
                                        @lang('lavel.new_create')</a>
                                </div>
                                <div class="clearfix"></div>

                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-block">
                            <table class="table table-hover demo-table-dynamic table-responsive-block"
                                   id="tableWithDynamicRows">
                                <thead>
                                <th>@lang('lavel.bangla_name')</th>
                                <th>@lang('lavel.name')</th>
                                <th>@lang('lavel.description')</th>
                                <th>@lang('lavel.status')</th>
                                <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                @forelse ($projectCategories as $data)
                                    <tr>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->name_en}}</td>
                                        <td>{{$data->description}}</td>
                                        <td>@if($data->status == 1) Active @else Inactive @endif</td>
                                        <td><a href="{{url('dashboard/project-categories/'.$data->id.'/edit/')}}"><i class="fa fa-pencil"></i></a></td>
                                        <td><a href="{{url('dashboard/team-lead-main/'.$data->id)}}">বিস্তারিত</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5"><em>No data found</em></td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 text-right text-center-xs">
                    <div class="pagination-sm m-t-none m-b-none">
                        {{-- {{$projectCategories->links()}} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal --}}
    <div class="modal fade slide-up disable-scroll modal-scroll" id="modalSlideUp" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog ">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-17"></i></button>
                        <h5 class="m-t-0 m-b-0"><span class="semi-bold tit-co">দলসমূহের ক্রমবিন্যাস</span></h5>

                    </div>
                    <div class="modal-body">
                        <form role="form">
                            <div class="form-group-attached">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ol class='serialization vertical p-l-0' id="indecator_div">
                                            @foreach($query as $project_cat)
                                                <li data-id="{{$project_cat->id}}">{{$project_cat->name}}</li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>

                            </div>
                        </form>
                        {{-- <div class="row">
                            <div class="col-md-12 m-t-10 sm-m-t-10">
                                <button type="button" class="btn btn-xs float-right btn-primary" onclick="relod_dashboard()">জমা দিন</button>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}

    @push('scripts')
        <script src="{{ custom_asset('assets/js/jquery-sortable.js') }}"></script>
        <script>
            var group = $("ol.serialization").sortable({
                group: 'serialization',
                delay: 500,
                nested: false,
                onDrop: function ($item, container, _super) {
                    var data = group.sortable("serialize").get();
                    //loop data
                    var string_sort="0,";
                    for(let i = 0; i < data[0].length; i++){
                        string_sort +=data[0][i]['id']+",";
                    }
                    //console.log(string_sort);
                    $.ajax({
                        url: "{{ url('ajax/set-team-sorting/') }}",
                        data: {"value":string_sort},
                        success: function (response) {
                            return true;
                        },
                        error: function (xhr) {
                            alert("Please relode the page.");
                            return false;
                        }
                    });


                    var jsonString = JSON.stringify(data, null, ' ');

                    $('#serialize_output2').text(jsonString);
                    _super($item, container);
                }
            });
            //$(function  () {
            //$("ol.sort").sortable();
            //});
        </script>
        <script>
            $('#btnToggleSlideUp').click(function() {
                var size = $('input[name=slideup_toggler]:checked').val()
                var modalElem = $('#modalSlideUp');
                if (size == "mini") {
                    $('#modalSlideUpSmall').modal('show')
                } else {
                    $('#modalSlideUp').modal('show')
                    if (size == "default") {
                        modalElem.children('.modal-dialog').removeClass('modal-lg');
                    } else if (size == "full") {
                        modalElem.children('.modal-dialog').addClass('modal-lg');
                    }
                }
            });
        </script>

    @endpush

@endsection
