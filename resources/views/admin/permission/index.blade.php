@extends('layout.frontend')
@section('content')

<div class="container-fluid padding-25">
    <div class="card  bg-white">
        <div class="card-block">
            <div class="table-responsive">
                <!-- START card -->
                <div class="card card-transparent">
                    <div class="card-header ">
                        <div class="card-title">Permissions</div>

                        <div class="form-group">


                            <div>

                                <div class="btn_right">
                                    <a href="{{url('dashboard/permission/create')}}"
                                        class="btn btn-primary btn-cons m-b-10 btn_right"><i class="fa fa-plus"></i>
                                        New </a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="card-block">
                                <table class="table table-hover demo-table-dynamic table-responsive-block"
                                    id="tableWithDynamicRows">
                                    <thead>
                                        <th>Name</th>
                                        <th>Display Name</th>
                                        <th>Description</th>
                                        <th>Status</th>

                                    </thead>
                                    <tbody>
                                        @forelse($permissions as $permission)
                                        <tr>
                                            <td><a href="">{{$permission->name}}</a>
                                            </td>
                                            <td>{{ $permission->display_name }}</td>
                                            <td>{{ $permission->description }}</td>


                                            <td>
                                                <a href="{{url('dashboard/permission/'.$permission->id.'/edit/')}}"><i
                                                        class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;
                                                <a href="{{url('dashboard/permission/'.$permission->id)}}" class="confirm"
                                                    data-msg="Are you sure want to delete {{$permission->name}}?"><i
                                                        class="fa fa-trash-o"></i></a>

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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection