@extends('layout.frontend')
@section('content')

<div class="content sm-gutter">
    <div class="container-fluid padding-25">
        <div class="card  bg-white">
            <div class="card-block">
                <h5>Role Permissions</h5>

                <form action="{{url('dashboard/permission-role')}}" {{-- class="form-horizontal" --}} role="form"
                    method="POST" data-toggle="validator">
                    @csrf
                    <input type="hidden" value="{{$role_id}}" name="role_id">
                    <table class="table table-hover demo-table-dynamic table-responsive-block"
                        id="tableWithDynamicRows">
                        <!--thead>
							<td>&nbsp;</td>
							<td>
							Check or Uncheck ALL 
							 <input type="button" class="check" value="check all" />
							</td>
						</thead-->
                        <thead>
                            <th>Name</th>
                            <th>Index</th>
                            <th>Create</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>Others</th>

                        </thead>
                        <tbody>
                            @forelse($methodArrays as $key => $methodArray)
                                {{--print_r($methodArray['others'])--}}
                                @php $methodArr = $methodArray @endphp 

                            <tr>
                                <td>
                                    <label for="name"
                                        class="col-lg-6 control-label">{{$methodArray['display_name']}}</label>
                                </td>

                                <td>
                                    @if(!empty($methodArr['index']))
                                    <input id="permission_id" type="checkbox" class="permission_check"
                                        name="permission_id[{{$methodArray['index']}}]"
                                        values="{{$methodArray['index']}}"
                                        @if(isset($permissionarray[$methodArray['index']])) checked @endif>

                                        @php unset($methodArr['index']); @endphp
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($methodArr['create']))
                                    <input id="permission_id" type="checkbox" class="permission_check"
                                        name="permission_id[{{$methodArray['create']}}]"
                                        values="{{$methodArray['create']}}"
                                        @if(isset($permissionarray[$methodArray['create']])) checked @endif>

                                        @php unset($methodArr['create']); @endphp
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($methodArr['edit']))
                                    <input id="permission_id" type="checkbox" class="permission_check"
                                        name="permission_id[{{$methodArray['edit']}}]" values="{{$methodArray['edit']}}"
                                        @if(isset($permissionarray[$methodArray['edit']])) checked @endif>

                                        @php unset($methodArr['edit']); @endphp
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($methodArr['delete']))
                                    <input id="permission_id" type="checkbox" class="permission_check"
                                        name="permission_id[{{$methodArray['delete']}}]"
                                        values="{{$methodArray['delete']}}"
                                        @if(isset($permissionarray[$methodArray['delete']])) checked @endif>

                                        @php unset($methodArr['delete']); @endphp
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($methodArr))
                                    @php unset($methodArr['id']); unset($methodArr['display_name']); @endphp 
                                    @foreach($methodArr as $otherKey => $other)
                                    <input id="permission_id" type="checkbox" class="permission_check"
                                        name="permission_id[{{$other}}]" values="{{$other}}" @if(isset($permissionarray[$other])) checked @endif>{{ucfirst(str_replace('_',' ',$otherKey))}}<br>
                                    @endforeach
                                    @endif
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="6"><em>No data found</em></td>
                            </tr>

                            @endforelse
                        </tbody>
                    </table>

                    <br>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-primary btn-cons m-b-10" type="submit"><i class="pg-form"></i> <span
                                    class="bold">সাবমিট</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection