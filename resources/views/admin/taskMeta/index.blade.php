@extends('layout.frontend')
@section('content')

<div class="container-fluid padding-25">
    <div class="card  bg-white">
        <div class="card-block">
            <div class="table-responsive">
                <!-- START card -->
                <div class="card card-transparent">
                    <div class="card-header ">
                        <div class="card-title">আর্থিক অগ্রগতি</div>

                        <div class="form-group">
                            
                            <div>

                                <div class="btn_right">
                                    <a href="{{url('dashboard/task-meta/create')}}"
                                        class="btn btn-primary btn-cons m-b-10 btn_right"><i class="fa fa-plus"></i>
                                        নতুন আর্থিক অগ্রগতি</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="card-block">
                                <table class="table table-hover demo-table-dynamic table-responsive-block"
                                    id="tableWithDynamicRows">
                                    <thead>
                                        <!-- <th>প্রকল্পের নাম</th> -->
                                        <th>টাস্ক</th>
                                        <th>ইভেন্ট</th>
                                        <th>Key</th>
                                        <th colspan="2">আবেদনকৃত টাকা</th>
                                        <th>&nbsp;</th>
                                    </thead>
                                    <tbody>
                                        @forelse($taskMetas as $taskMeta)
                                        <tr>
                                            <!-- <td>{{ $taskMeta->projects['name'] }}</td> -->
                                            <td>{{ $taskMeta->tasks['task_name'] }}</td>
                                            <td>{{ $taskMeta->events['title'] }}</td>
                                            <td>{{ $taskMeta->key }}</td>
                                            <td>{{ $taskMeta->value }}</td>
                                            
                                            <td>
                                                <a href="{{url('dashboard/task-meta/'.$taskMeta->id.'/edit/')}}"><i class="fa fa-pencil"></i></a></td><td>
                                                <a href="{{url('dashboard/task-meta/'.$taskMeta->id)}}" ><i class="fa fa-trash-o"></i></a>

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
                        <div class="pagination-sm m-t-none m-b-none">
                            {{$taskMetas->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
