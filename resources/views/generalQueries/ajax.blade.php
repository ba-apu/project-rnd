<table class="table table-hover demo-table-dynamic table-responsive-block"
       id="tableWithDynamicRows">
    <thead>
    <th>@lang('lavel.name')</th>
    <th>@lang('lavel.email')</th>
    <th>@lang('lavel.mobile')</th>
    <th>&nbsp;</th>
    {{-- <th>&nbsp;</th> --}}
    </thead>
    <tbody>
    @forelse($general_queries  as $data)
        <tr>
            <td>{{$data->name}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->mobile_no}}</td>

            <td><a href="{{url('general-queries/'.$data->id)}}">@lang('lavel.details')</a></td>
           {{--  <td><a href="{{url('dashboard/general-queries/'.$data->id)}}" class="confirm" data-msg="Are you sure want to delete {{$data->name}}?">Delete</a></td> --}}
        </tr>
    @empty
        <tr>
            <td colspan="5"><em>No data found</em></td>
        </tr>
    </tbody>
    @endforelse
</table>
{{$general_queries->links()}}
<div class="col-sm-12 text-right text-center-xs">
    <div class="pagination-sm m-t-none m-b-none">
        {{-- {{ $users->appends(['name' => $name, 'email' => $email, 'mobile_no' => $monible_no, 'details' => $details])->links() }} --}}
    </div>
</div>
