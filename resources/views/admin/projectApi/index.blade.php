@extends('layout.frontend')
@section('content')

<div class="container-fluid padding-25">
    <div class="card  bg-white">
        <div class="card-block">
            <div class="table-responsive">
                <!-- START card -->
                <div class="card card-transparent">
                    <div class="card-header ">
                        <div class="card-title">@lang('lavel.indicator')</div>

                        <div class="form-group">

                            
                            <div>

                                <div class="btn_right">
                                    <a href="{{url('/dashboard/project-api/create')}}"
                                        class="btn btn-primary btn-cons m-b-10 btn_right"><i class="fa fa-plus"></i>
                                        @lang('lavel.new_create')</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="card-block">
                                <table class="table table-hover demo-table-dynamic table-responsive-block"
                                    id="tableWithDynamicRows">
                                    <thead>
                                        <th>@lang('lavel.project')</th>
                                        <th>Main Url</th>
                                        {{-- <th>Token Url</th>                                        
                                        <th>Replace Obj</th>
                                        <th>Alter Obj</th> --}}
                                        <th>&nbsp;</th>
                                    </thead>
                                    <tbody>
                                        @forelse($project_apis as $data)
                                        <tr>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->url_obj}}</td>
                                            {{-- <td>{{ $data->token_url }}</td>
                                            <td>{{ $data->replace_obj }}</td>
                                            <td>{{ $data->alter_obj }}</td> --}}
                                            <td><a href="{{url('/dashboard/project-api/'.$data->id)}}">@lang('lavel.details')</a></td>
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
                            {{-- {{$project_apis->links()}} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection