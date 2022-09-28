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
                            <div class="card-title">@lang('lavel.sectors')</div>

                            <div class="form-group">

                                <form action="{{url('dashboard/sector')}}" method="GET" role="search">
                                    @csrf
                                    <div class="col-md-4 form-group btn_left">
                                        {!! Form::select('project_id', \App\Project::pluck('name', 'id'),
                                        old('project_id', $request->project_id),
                                        ['placeholder'=>'All','class' => 'form-control
                                        full-width','data-init-plugin'=>'select2', 'id' => 'project_id'])
                                        !!}
                                    </div>

                                    <button class="btn btn-primary btn-cons m-b-10 btn_left" type="submit"><i
                                            class="fa fa-search" aria-hidden="true"></i><span class="bold">&nbsp;&nbsp;&nbsp;@lang('lavel.search')</span>
                                    </button>

                                </form>
                                <div>

                                    <div class="btn_right">
                                        <a href="{{url('dashboard/sector/create')}}"
                                            class="btn btn-primary btn-cons m-b-10 btn_right"><i class="fa fa-plus"></i>
                                            @lang('lavel.new_create')</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="card-block">
                                    <table class="table table-hover demo-table-dynamic table-responsive-block"
                                        id="tableWithDynamicRows">
                                        <thead>
                                            <th>@lang('lavel.project_name')</th>
                                            <th>@lang('lavel.name')</th>
                                            <th>@lang('lavel.bangla_name')</th>

                                            <th>@lang('lavel.action')</th>
                                            <th>&nbsp;</th>
                                        </thead>
                                        <tbody>

                                            @forelse($sectors as $sector)
                                            <tr>
                                                <td><a
                                                        href="{{url('dashboard/sector/'.$sector->id.'/edit/')}}">{{ $sector->projects['name'] }}</a>
                                                </td>
                                                <td>{{$sector->name}}</td>
                                                <td>{{$sector->bangla_name}}</td>

                                                <td><a href="{{url('dashboard/sector/'.$sector->id.'/edit/')}}"><i
                                                            class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                                    <a href="{{url('dashboard/sector/'.$sector->id)}}" class="confirm"
                                                        data-msg="Are you sure want to delete {{$sector->name}}?"><i
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
                                {{$sectors->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
