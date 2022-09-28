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
                            <div class="card-title btn_left">Work Plan</div>
                            <div class="btn_right">
                                <a href="{{url('dashboard/workPlan/create')}}"
                                    class="btn btn-primary btn-cons m-b-10 btn_right"><i class="fa fa-plus"></i>
                                    Create</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-block">
                            <table class="table table-hover demo-table-dynamic table-responsive-block"
                                id="tableWithDynamicRows">
                                <thead>
                                    <th>PROJECT NAME</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <!-- <th>Details</th> -->
                                    <th>Done Date</th>
                                    <th>Status</th>
                                    <th>&nbsp;</th>
                                </thead>
                                <tbody>

                                    @forelse($workPlans as $workPlan)
                                    <tr>
                                        <td><a
                                                href="{{url('dashboard/workPlan/'.$workPlan->id.'/edit/')}}">{{ $workPlan->projects['name'] }}</a>
                                        </td>
                                        <td>{{$workPlan->title}}</td>
                                        <td>{{date('d-F-Y',strtotime($workPlan->date))}}</td>
                                        <!-- <td>{{($workPlan->details)}}</td> -->
                                        <td>{{date('d-F-Y',strtotime($workPlan->done_date))}}</td>
                                        <td><a href="{{url('dashboard/workPlan/'.$workPlan->id.'/edit/')}}"><i
                                                    class="fa fa-pencil"></i></a></td>
                                        <td><a href="{{url('dashboard/workPlan/'.$workPlan->id)}}"><i
                                                    class="fa fa-eye"></i></a></td>
                                        <td><a href="{{url('dashboard/workPlan/'.$workPlan->id)}}" class="confirm"
                                                data-msg="Are you sure want to delete {{$workPlan->title}}?"><i
                                                    class="fa fa-trash-o"></i></a></td>

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
