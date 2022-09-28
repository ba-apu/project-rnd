<style>
.table thead tr th {
    background-color: #6D5BB0;
    color: white;
}
</style>
{{-- <div class="table-responsive">
    <table class="table table-striped table-responsive"> --}}
<div class="table-responsive">
    <!-- START card -->
    <div class="card card-transparent">
        <div class="card-header ">
            <div class="card-title">@lang('lavel.task_name')</div>
            <div class="form-group">
                <div>
                    <div class="btn_right">
                        <a href="{{url('dashboard/task/create')}}" class="btn btn-primary btn-cons m-b-10 btn_right"><i
                                class="fa fa-plus"></i> @lang('lavel.new_create')</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-block">
                    <table class="table table-hover demo-table-dynamic table-responsive-block"
                        id="tableWithDynamicRows">
                        <thead>
                            <th>@lang('lavel.project')</th>
                            <th>@lang('lavel.task_name')</th>
                            <th>@lang('lavel.date')</th>
                            <th>@lang('lavel.action')</th>
                            <th>@lang('lavel.status')</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @forelse($tasks as $task)
                            <tr>
                                <td><a href="{{url('dashboard/task/'.$task->id.'/edit/')}}">{{$task->projects['name']}}</a></td>
                                <td>{{$task->task_name}}</td>
                                <td>{{date('d-F-Y',strtotime($task->date))}}</td>
								<td>{{$task->description}}</td>
								

                                <td><a href="{{url('dashboard/task/'.$task->id.'/edit/')}}"><i
                                            class="fa fa-pencil"></i></a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="{{url('dashboard/task/'.$task->id)}}"
                                        class="confirm" data-msg="Are you sure want to delete {{$task->task_name}}?"><i
                                            class="fa fa-trash-o"></i></a>
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
        {{-- <footer class="footer bg-white b-t">
    <div class="row m-t-sm text-center-xs"> --}}
        <div class="col-sm-12 text-right text-center-xs">
            <div class="pagination-sm m-t-none m-b-none">
                {{ $tasks->links() }}
            </div>
        </div>
        {{--  </div>
</footer> --}}