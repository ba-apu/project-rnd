<table class="table table-hover demo-table-dynamic table-responsive-block"
       id="tableWithDynamicRows">
    <thead>
    <th>@lang('lavel.name')</th>
    <th>@lang('lavel.email')</th>
    <th>@lang('lavel.mobile')</th>
    <th>@lang('lavel.role')</th>
    <!--th>Project Owner</th-->
    <th>@lang('lavel.status')</th>
    <th>সম্পাদন</th>
    {{--    <th>&nbsp;</th>--}}
    </thead>
    <tbody>
    @forelse($users as $user)
        <tr>
            <td><a href="{{url('dashboard/user/'.$user->id.'/edit/')}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->mobile_no}}</td>
            <td>{{$user->user_role->display_name ?? ''}}</td>
            <td>{{($user->status) ? "Active" : "Inactive"}}</td>
            <td><a href="{{url('dashboard/user/'.$user->id.'/edit/')}}">Edit</a></td>
            {{--            <td><a href="{{url('dashboard/user/'.$user->id)}}" class="confirm" data-msg="Are you sure want to delete {{$user->name}}?">Delete</a></td>--}}
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
        {{ $users->appends(['name' => $name, 'email' => $email, 'role' => $role, 'status' => $status])->links() }}
    </div>
</div>
