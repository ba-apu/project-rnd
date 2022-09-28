<table class="table table-hover demo-table-dynamic table-responsive-block"
       id="tableWithDynamicRows">
    <thead>
    <th>@lang('lavel.name')</th>
    <th>@lang('lavel.display_name')</th>
    <th>@lang('lavel.description')</th>
    <th>@lang('lavel.action')</th>
    {{--<th>&nbsp;</th>--}}
    </thead>
    <tbody>
    @forelse($role  as $value)
        <tr>
            <td><a href="{{url('dashboard/role/'.$value->id.'/edit/')}}">{{$value->name}}</a></td>
            <td>{{ $value->display_name }}</td>
            <td>{{ $value->description }}</td>
            <td><a href="{{url('dashboard/role/'.$value->id.'/edit/')}}"><button type="button" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i>
                    </button></a>
			<a href="{{url('dashboard/permission-role?role_id='.$value->id)}}"><button type="button" class="btn btn-success btn-xs"><i class="fa fa-key"></i>
                    </button></a>
			</td>
            {{--<td><a href="{{url('dashboard/role/'.$value->id)}}" class="confirm" data-msg="Are you sure want to delete {{$value->name}}?">Delete</a></td>--}}
        </tr>
    @empty
        <tr>
            <td colspan="5"><em>No data found</em></td>
        </tr>
    </tbody>
    @endforelse
</table>
<div class="col-sm-12 text-right text-center-xs">
    <div class="pagination-sm m-t-none m-b-none">
        {{ $role->links() }}
    </div>
</div>
