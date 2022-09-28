@extends('layout.frontend')
@section('content')
    <div class="container-fluid padding-25">
        <div class="card  bg-white">
            <div class="card-block">
                <div class="table-responsive">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-header p-r-0 ">
                            <div class="card-title">@lang('lavel.indicator')</div>
                            <div class="form-group">
                                <form action="{{url('dashboard/indicator')}}" method="get" role="search" name="indicator_form" id="indicator_form">
                                    @csrf
                                    <input type="hidden" name="page" value="" id="page_no">
                                    <div class="col-md-4 form-group btn_left">
                                        {!! Form::select('project_id', \App\Project::where('status',1)->pluck('name', 'id'),
                                        old('project_id', $request->project_id),
                                        ['placeholder'=>'All','class' => 'form-control
                                        full-width','data-init-plugin'=>'select2', 'id' => 'project_id'])
                                        !!}
                                    </div>
                                    <button class="btn btn-primary btn-cons m-b-10 btn_left" type="submit"><i
                                                class="fa fa-search" aria-hidden="true"></i><span class="bold">&nbsp;&nbsp;&nbsp;@lang('lavel.search')</span>
                                    </button>
                                </form>
                                <div class="card-block p-b-0">
                                    <div class="btn_right">
                                        <a href="{{url('dashboard/indicator/create')}}"
                                           class="btn btn-primary btn-cons m-b-10 btn_right"><i class="fa fa-plus"></i>
                                            @lang('lavel.new_create')</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="card-block">
                                    <table class="tp-tbl table table-hover demo-table-dynamic table-striped table-responsive-block"
                                           id="tableWithDynamicRows">
                                        <thead class="bg-info tp-tbl-hed">
                                        <th>@lang('lavel.indicator_name')</th>
                                        <th>@lang('lavel.indicator_name_bangla')</th>
                                        <th>@lang('lavel.project')</th>
                                        <th>@lang('lavel.unit')</th>
                                        <th>@lang('lavel.short_form')</th>
                                        <th>@lang('lavel.short_form_en')</th>
                                        <th>@lang('lavel.data_process')</th>
                                        <th>@lang('lavel.priority')</th>
                                        <!--th>রুলস</th-->
                                        {{--										<th>@lang('lavel.main_chart')</th>--}}
                                        {{--                                        <th>@lang('lavel.another_chart')</th>--}}
                                        <th class="text-center">@lang('lavel.status')</th>
                                        <th class="text-center">@lang('lavel.action')</th>
                                        </thead>
                                        <tbody>
                                        @forelse($indicators as $indicator)
                                            <tr>
                                                <td>
                                                    <a href="{{url('dashboard/indicator/'.$indicator->id.'/edit/')}}">
                                                        {{$indicator->name}}
                                                    </a>
                                                </td>
                                                <td>{{ $indicator->bangla_name }}</td>
                                                <td>{{ $indicator->projects['name']??'' }}</td>
                                                <td>{{ $indicator->unit }}</td>
                                                <td>{{ $indicator->short_form }}</td>
                                                <td>{{ $indicator->short_form_en }}</td>
                                                <td>{{ $indicator->data_process }}</td>
                                                <td class="text-center"> <input  style="width: 30px;" type="number" id="{{$indicator->id}}" value="{{ $indicator->priority }}" onchange="setIndicatorPriority({{$indicator->project_id}},{{$indicator->id}})"></td> 
                                            <!-- <td>{{ @$geo_types[$indicator->geo_type] }}</td> -->
                                                {{-- <td>
                                                @if($indicator->rules != "")
                                                {{ $indicator->rules  }}
                                                <br>
                                                <a href="{{url("dashboard/indicator-rules/create")}}">Change Rules</a>
                                                @else
                                                <a href="{{url("dashboard/indicator-rules/create")}}">Add Rules</a>
                                                @endif
                                                </td> --}}
                                                {{--                                            <td>--}}
                                                {{--												{{ \App\Chart::where('id',$indicator->default_chart)->pluck('chart_name')->first() }}--}}
                                                {{--											</td>--}}
                                                {{--											<td>--}}
                                                {{--                                                @if($indicator->chart != "")--}}
                                                {{--                                                    @php--}}
                                                {{--                                                        $arr=json_decode($indicator->chart,1);--}}
                                                {{--                                                    @endphp--}}
                                                {{--													@if(is_array($arr))--}}
                                                {{--														@forelse($arr as $r)--}}
                                                {{--															{{\App\Chart::where('id',$r)->pluck('chart_name')->first()}}--}}
                                                {{--														@empty--}}
                                                {{--															{{"Not Submit Yet"}}--}}
                                                {{--														@endforelse--}}
                                                {{--													@endif--}}
                                                {{--                                                @endif--}}
                                                {{--                                            </td>--}}
                                                <td>
                                                    @if($indicator->status == 1)
                                                        <a type="button" href="{{url('dashboard/indicator-status-change/'.$indicator->id.'/0')}}">Active</a>
                                                    @else
                                                        <a type="button" href="{{url('dashboard/indicator-status-change/'.$indicator->id.'/1')}}">Inactive</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{url('dashboard/indicator/'.$indicator->id.'/edit/')}}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    {{--                                                    <a href="{{url('dashboard/indicator/'.$indicator->id)}}" class="confirm"--}}
                                                    {{--                                                       data-msg="Are you sure want to delete {{$indicator->name}}?">--}}
                                                    {{--                                                        <i class="fa fa-trash-o"></i></a>--}}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6"><em>No data found</em></td>
                                            </tr>
                                        </tbody>
                                        @endforelse
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 text-right text-center-xs">
                            {{-- <div class="pagination-sm m-t-none m-b-none">
                                {{$indicators->links()}}
                            </div> --}}
                            <div class="class_pagination">
                                <form action="{{url('dashboard/indicator')}}" method="get">
                                    @csrf
                                    {{$indicators->links()}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).on('click', '.pagination li a',function(e){
            e.preventDefault();
            var link = $(this).attr('href');
            var page = link.split('=')[1];
            $('#page_no').val(page);
            document.getElementById("indicator_form").submit();
        });

        $(document).ready(function(){
            myfunc();
        });

        function myfunc(){
            // alert('ok');
            // var pathname = window.location.pathname; // Returns path only (/path/example.html)
            // var url      = window.location.href;     // Returns full URL (https://example.com/path/example.html)
            // var origin   = window.location.origin;
            // alert(pathname);
            // alert(url);
            // alert(origin);
        }

        function setIndicatorPriority(projectId=0, indicatorId=0){
            var priority = document.getElementById(indicatorId).value;
            $.ajax({
                url: "{{ url('ajax/set-project-indicator-priority/') }}",
                data: {
                    "projectId": projectId,
                    "priority": priority,
                    "indicatorId": indicatorId
                },
                success: function (response) {
                    if(response.warning){
                        toastr.warning(response.warning)
                    }
                    if(response.success){
                        toastr.success(response.success)
                        location.reload();
                    }
                    return true;
                },
                error: function (xhr) {
                    return false;
                }
            });
        }
    </script>
@endpush
