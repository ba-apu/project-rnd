<table class="table table-hover demo-table-dynamic table-responsive-block"
       id="tableWithDynamicRows">
    <thead>
    <th>@lang('name')</th>
    <th>@lang('read is complete')</th>
    <th>@lang('summary is complete')</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    {{-- <th>&nbsp;</th> --}}
    </thead>
    <tbody>
    @forelse($projectApiStatus  as $data)
        <tr>
            <td>{{$data->name}}</td>
            
            @if($data->to_mysql == 1)
                <td>Complete</td>
            @else
                <td>No</td>
            @endif
            
            @if($data->to_mongo == 1)
                <td>Complete</td>
            @else
                <td>No</td>
            @endif

            <td><a href="{{url('project-data-sync/'.$data->id)}}">@lang('lavel.details')</a></td>
            @if($data->to_mysql==0 or $data->to_mongo==0)
                <td><a href="{{url('project-data-sync/error/'.$data->id)}}">Error</a></td>
            @endif()
            
           {{--  <td><a href="{{url('dashboard/general-queries/'.$data->id)}}" class="confirm" data-msg="Are you sure want to delete {{$data->name}}?">Delete</a></td> --}}
        </tr>
    @empty
        <tr>
            <td colspan="5"><em>No data found</em></td>
        </tr>
    </tbody>
    @endforelse
</table>
{{$projectApiStatus->links()}}
<div class="col-sm-12 text-right text-center-xs">
    <div class="pagination-sm m-t-none m-b-none">
        {{-- {{ $users->appends(['name' => $name, 'email' => $email, 'mobile_no' => $monible_no, 'details' => $details])->links() }} --}}
    </div>
</div>
