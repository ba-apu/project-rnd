@extends('layout.frontend')
@section('content')

    <div class="content sm-gutter">
        <!-- START CONTAINER FLUID -->
        <div class="container-fluid padding-25">
            <div class="card  bg-white">
                <div class="card-block">
                    <div class="table-responsive">
                        <!-- START card -->
                        <div class="card card-transparent">
                            <div class="card-title btn_left p-l-20">
                                <h5 class="m-b-0">{{isset($indicator_target_data[0]->pr_name) ? $indicator_target_data[0]->pr_name : ''}} লক্ষ্যমাত্রা</h5>
                            </div>
                            <div class="card-header ">

                                <div class="form-group">
                                    <form action="{{url('dashboard/indicator-target-set/search/all')}}" method="get" role="search">
                                        {{--                                        @csrf--}}
                                        <input type="hidden" name="project_id" value="{{$project_id}}">
                                        <div id="date" class="input-group date col-md-2 btn_left">
                                            <input type="text" value="{{isset($date) ? $date : ''}}"  name="date" class="form-control" autocomplete="off">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        <button class="btn btn-primary btn-cons m-b-10 btn_left" type="submit">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                            <span class="bold"> @lang('lavel.search')</span>
                                        </button>
                                    </form>
                                    <div class="btn_right">
                                        <a href="{{url('dashboard/indicator-target-set/create/'.$project_id)}}"
                                           class="btn btn-primary btn-cons m-b-10 btn_right"><i class="fa fa-plus"></i>
                                            @lang('lavel.new_create') </a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                            <div class="card-block">
                                <table class="table table-hover table-bordered demo-table-dynamic table-responsive-block"
                                       id="tableWithDynamicRows">
                                    <thead class="bg-primary">
{{--                                    <th width="5%" class="text-white col-1">#</th>--}}
                                    <th class="text-white">সূচক</th>
                                    <th class="text-white">মাস</th>
                                    <th class="text-white">বছর</th>
                                    <th class="text-white">লক্ষ্যমাত্রা</th>
                                    <th class="text-white">সম্পাদন</th>
                                    </thead>
                                    <tbody>
                                    @forelse($indicator_target_data as $key=>$indicator_target)
                                        <tr>
{{--                                            <td>{{ english_to_bangla($key+1) }}</td>--}}
                                            <td>{{ $indicator_target->ind_name }}</td>
                                            <td>{{ english_to_bangla(\Carbon\Carbon::create()->month($indicator_target->month)->format('F')) }}</td>
                                            <td>{{ english_to_bangla($indicator_target->year) }}</td>
                                            <td>{{ english_to_bangla($indicator_target->target_data) }}</td>
                                            <td>
                                                <a href="{{url('dashboard/indicator-target-set/edit/' . $indicator_target->target_id)}}">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
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
                </div>
                <div class="col-sm-12 text-right text-center-xs">
                    <div class="pagination-sm m-t-none m-b-none">
                        {!! $indicator_target_data->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $("#date").datepicker({
                format: "mm-yyyy",
                viewMode: "months",
                minViewMode: "months"
            });
        </script>
    @endpush

@endsection
