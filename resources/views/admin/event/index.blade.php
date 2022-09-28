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
                                <div class="card-title btn_left">@lang('lavel.event_list')</div>
                                <div class="btn_right">
                                    <a href="{{url('dashboard/event/create')}}" class="btn btn-primary btn-cons m-b-10 btn_right"><i class="fa fa-plus"></i>&nbsp;&nbsp;@lang('lavel.new_create')</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="card-block">
                                <table class="table table-hover demo-table-dynamic table-responsive-block" id="tableWithDynamicRows">
                                    <thead>
                                    <th>@lang('lavel.project_name')</th>
                                    <th>@lang('lavel.task_name')</th>
                                    {{-- <th>@lang('lavel.sectors')</th> --}}
                                    <th>@lang('lavel.event_name')</th>
                                    {{-- <th>@lang('lavel.amount')</th> --}}
                                    <th>@lang('lavel.details')</th>
                                    <th>@lang('lavel.date')</th>
                                    <th>&nbsp;</th>
                                    </thead>
                                    <tbody>

                                    @forelse($events  as $event)
                                        <tr>
                                            <td>{{ \App\Project::where('id',$event->project_id)->pluck('name')->first()  }}</td>
                                            <td>{{ \App\Task::where('id',$event->task_id)->pluck('task_name')->first()  }}</td>
                                            {{-- <td>{{ \App\Sector::where('id',$event->sector_id)->pluck('name')->first()  }}</td> --}}
                                            <td>{{($event->title)}}</td>
                                            {{-- <td>{{$event->amount}}</td> --}}
                                            <td> {!! $event->details !!}</td>
											<td>{{date('d-F-Y H:i:s',strtotime($event->date))}}</td>
                                            <td><a href="{{url('dashboard/event/'.$event->id.'/edit/')}}"><i class="fa fa-pencil"></i></a>
                                            <!--td><a href="{{url('dashboard/event/'.$event->id)}}"><i class="fa fa-eye"></i></a></td-->
                                            <a href="{{url('dashboard/event/'.$event->id)}}" class="confirm" data-msg="Are you sure want to delete {{$event->title}}?"><i class="fa fa-trash-o"></i></a></td>
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
                    <div class="col-sm-12 text-right text-center-xs">
                        <div class="pagination-sm m-t-none m-b-none">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
