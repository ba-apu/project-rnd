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
                                <h5 class="m-b-0">@lang('lavel.project')</h5>
                            </div>
                            <div class="card-header ">
                                <div class="form-group">
                                    <form action="{{url('dashboard/project')}}" method="get" role="search">
                                        @csrf

                                        <div class="col-md-2 form-group btn_left">
                                            {!! Form::select('project_category_id', \App\ProjectCategory::pluck('name', 'id'),
                                             old('project_category_id', $request->project_category_id),
                                            ['placeholder'=>'টিম  নির্বাচন করুন','class' => 'form-control
                                            full-width','data-init-plugin'=>'select2', 'id' => 'project_category_id'])
                                            !!}
                                        </div>
                                        <div class="col-md-2 form-group btn_left">
                                            <input type="search" name="projectname" class="form-control"
                                                   placeholder="উদ্যোগ এর নাম... ">
                                        </div>

                                        <button class="btn btn-primary btn-cons m-b-10 btn_left" type="submit"><i
                                                    class="fa fa-search" aria-hidden="true"></i><span class="bold">&nbsp;&nbsp;&nbsp;@lang('lavel.search')</span>
                                        </button>
                                    </form>
                                    @if(Auth::user()->role == 1)
                                        <div class="btn_right">
                                            <a href="{{url('dashboard/project/create')}}"
                                               class="btn btn-primary btn-cons m-b-10 btn_right"><i class="fa fa-plus"></i>
                                                @lang('lavel.new_create')</a>
                                        </div>
                                    @endif
                                    <div class="clearfix"></div>

                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="card-block">
                                <table
                                        class="table table-hover table-bordered demo-table-dynamic table-responsive-block"
                                        id="tableWithDynamicRows">
                                    <thead class="bg-primary">
                                    <th class="text-white">@lang('lavel.project')</th>
                                    <th class="text-white">@lang('lavel.project_name_bangla')</th>
                                    <th class="text-white">@lang('lavel.url')</th>
                                    {{--                                    <th class="text-white">@lang('lavel.reference_table_name')</th>--}}
                                    {{--                                    <th class="text-white">@lang('lavel.model')</th>--}}
                                    <th class="text-white">@lang('lavel.project_category')</th>
                                    <th class="text-white">@lang('lavel.status')</th>
                                    <th class="text-white">@lang('lavel.action')</th>
                                    @if(Auth::user()->role == 1)
                                        <th class="text-white">&nbsp;</th>
                                        <th class="text-white">&nbsp;</th>
                                    @endif
                                    </thead>
                                    <tbody>
                                    @forelse($projects as $project)
                                        <tr>
                                            <td>
                                                <a href="{{url('dashboard/project/'.$project->id.'/edit/')}}">{{$project->name}}</a>
                                            </td>
                                            <td>{{$project->bangla_name}}</td>
                                            <td>
                                                <a target="_blank"
                                                   href="{{ url('dashboard/' . $project->slug) }}">{{ $project->slug }}
                                                    <i class="fa fa-external"></i></a>
                                            </td>
                                            {{--                                            <td>{{($project->reference_table_name)}}</td>--}}
                                            {{--                                            <td>{{($project->model_name)}}</td>--}}
                                            @if($project->projectcategories)
                                                <td>{{$project->projectcategories->name}}</td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td>@if($project->status == 1) Active @else Inactive @endif</td>
                                            {{--                                            <td>--}}
                                            {{--                                                <div class="indicator_div"  data="{{($project->id)}}">--}}
                                            {{--                                                    <button  class="btn btn-primary btn-cons m-b-5 btn-secondary btn-cons btn-sm" type="button" style="box-shadow:1px 1px #d2d2d2;" > সূচক সাজানো <i class="fa fa-bars" aria-hidden="true"></i></button>--}}
                                            {{--                                                    <pre id="serialize_output2"></pre>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </td>--}}
                                            @if(Auth::user()->role == 1)
                                                <td><a href="{{url('dashboard/project/'.$project->id.'/edit/')}}"><i
                                                                class="fa fa-pencil"></i></a></td>
                                                <td><a href="{{url('dashboard/project/'.$project->id)}}" class="confirm"
                                                       data-msg="Are you sure want to delete {{$project->name}}?"><i
                                                                class="fa fa-trash-o"></i></a></td>
                                            @endif

                                            <td>
                                                @if((Auth::user()->role == 1) || (isset($user_role_mapping[$project->id]['has_approve_permission']) && $user_role_mapping[$project->id]['has_approve_permission'] == 1))
                                                    <a href="{{ url('dashboard/indicator-target-set/'.$project->id) }}">লক্ষ্যমাত্রা </a>
                                                @endif
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5"><em>No data found</em></td>
                                        </tr>
                                    </tbody>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 text-right text-center-xs">
                    <div class="pagination-sm m-t-none m-b-none">
                        {{$projects->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- modal --}}
    <input type="hidden" id="seted_project_id">
    <div class="modal fade slide-up disable-scroll modal-scroll" id="modalSlideUp" tabindex="-1" role="dialog"
         aria-hidden="false">
        <div class="modal-dialog ">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                    class="pg-close fs-17"></i></button>
                        <h5 class="m-t-0 m-b-0"><span class="semi-bold tit-co"> সূচকসমুহের ক্রমবিন্যাস</span></h5>

                    </div>
                    <div class="modal-body">
                        <form role="form">
                            <div class="form-group-attached">
                                <div class="row">
                                    <div class="col-md-12" id="project_id">
                                        <ol class='serialization vertical p-l-0' id="indicator_sorting_div">

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
            $('.indicator_div').click(function () {
                project_id = $(this).attr("data");
                $("#seted_project_id").val(project_id);
                var str = "";
                //console.log(string_sort);
                $.ajax({
                    url: "{{ url('ajax/get-sorted-indicator-list') }}",
                    data: {"project_id": project_id},
                    type: "GET",
                    success: function (response) {
                        response = JSON.parse(response);
                        $.each(response, function (e, item) {

                            str += "<li data-id=" + item.id + ">" + item.short_form + "</li>";
                        })
                        $('#indicator_sorting_div').empty();
                        $('#indicator_sorting_div').html(str);

                        $('#modalSlideUp').modal('toggle');
                    },
                    error: function (xhr) {
                        alert("Please relode the page.");
                        return false;
                    }
                });


            });


        </script>
        <script>
            $('#btnToggleSlideUp').click(function () {
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
        <script>
            var group = $("ol.serialization").sortable({
                group: 'serialization',
                delay: 500,
                nested: false,
                onDrop: function ($item, container, _super) {
                    var data = group.sortable("serialize").get();

                    //loop data
                    var string_sort = "0,";
                    for (let i = 0; i < data[0].length; i++) {
                        string_sort += data[0][i]['id'] + ",";
                    }
                    project_id = $("#seted_project_id").val();
                    if (project_id == "") {
                        return false;
                    }
                    $.ajax({
                        url: "{{ url('ajax/set-indicator-sorting/') }}",
                        data: {"value": string_sort, "id": project_id},
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
        </script>

    @endpush

@endsection
