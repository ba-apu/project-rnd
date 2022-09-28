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
                            <div class="card-title btn_left">@lang('lavel.project_wise_monitoring_ystem')</div>
                            <div class="btn_right">
                                <a href="{{url('monitoring/get-project-wise-monitoring/create')}}"
                                    class="btn btn-primary btn-cons m-b-10 btn_right"><i class="fa fa-plus"></i>
                                    @lang('lavel.new_create')</a>
                            </div>
                            <div class="clearfix"></div>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-block">
                        <table class="table table-hover demo-table-dynamic table-responsive-block"
                            id="tableWithDynamicRows">
                            <thead>
                                <th>@lang('lavel.project')</th>
                                <th>@lang('lavel.team_lead')</th>
                                <th>@lang('lavel.product_owner_email_distance')</th>
                                <th>@lang('lavel.team_lead')</th>
                                <th>@lang('lavel.team_lead_email_distance')</th>
                                <th>@lang('lavel.cluster_head')</th>
                                <th>@lang('lavel.cluster_head_qwner_email_distance')</th>
                                <th>@lang('lavel.namagement') </th>
                                <th>@lang('lavel.management_email_distance')</th>
                                <th>@lang('lavel.action')</th>
                            </thead>
                            <tbody>
                                @forelse($monitoring as $r)
								<tr>
									<td>{{ $r->projects ? $r->projects->name : "" }}</td>
									<td>{{ $r->product_owners->name }}</td>
									<td>{{ $r->product_owner_email_days }}</td>
									<td>{{ $r->team_leads ? $r->team_leads->name : ""}}</td>
									<td>{{ $r->team_lead_email_days }}</td>
									<td>{{$r->cluster_heads ? $r->cluster_heads->name : ""}}</td>
									<td>{{ $r->cluster_head_email_days }}</td>
									<td>{{$r->managements_id ? $r->managements_id->name : ""}}</td>
									<td> {{ $r->management_email_days}} </td>
									<td><a href="{{url('monitoring/get-project-wise-monitoring/'.$r->id.'/edit/')}}"><i class="fa fa-pencil"></i></a></td>
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
				{{ $monitoring->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
