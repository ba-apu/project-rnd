@extends('layout.master')
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
                            <div class="card-title">Financial Progress</div>


                            <div class="form-group">

                                <form action="{{url('dashboard/financialprogress')}}" method="GET" role="search">
                                    @csrf
                                    <div class="col-md-4 form-group btn_left">
                                        {!! Form::select('project_id', \App\Project::pluck('name', 'id'),
                                        old('project_id',$request->project_id),
                                        ['placeholder'=>'All','class' => 'form-control
                                        full-width','data-init-plugin'=>'select2', 'id' => 'project_id'])
                                        !!}
                                    </div>

                                    <button class="btn btn-primary btn-cons m-b-10 btn_left" type="submit"><i
                                            class="fa fa-search" aria-hidden="true"></i><span class="bold">Search</span>
                                    </button>

                                </form>
                                <div>
                                    <div class="btn_right">
                                        <a href="{{url('dashboard/financialprogress/create')}}"
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
                                            <th>Estimated Expenditure</th>
                                            <th>Approve Expenditure</th>
                                            <!-- <th>Details</th> -->
                                            <th>Actual Expenditure</th>
                                            <th>Status</th>
                                            <th>&nbsp;</th>
                                        </thead>
                                        <tbody>

                                            @forelse($financialProgresses as $financialProgress)
                                            <tr>
                                                <td>{{$financialProgress->projects['name']}}</td>
                                                <td>{{$financialProgress->estimated_expenditure}}</td>
                                                <td>{{$financialProgress->approve_expenditure}}</td>
                                                <td>{{$financialProgress->actual_expenditure}}</td>


                                                <td><a
                                                        href="{{url('dashboard/financialprogress/'.$financialProgress->id.'/edit/')}}"><i
                                                            class="fa fa-pencil"></i></a></td>
                                                <td><a
                                                        href="{{url('dashboard/financialprogress/'.$financialProgress->id)}}"><i
                                                            class="fa fa-eye"></i></a></td>
                                                <td><a href="" class="confirm"
                                                        data-msg="Are you sure want to delete {{$financialProgress->projects['name']}}?"><i
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
                                {{$financialProgresses->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @push('script')
        @endpush
