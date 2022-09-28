@extends('layout.frontend')
@section('content')

<style>
    td, th {
      text-align: left;
      padding: 10px;
    }
</style>
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
                <h5>@lang('lavel.general_queries')</h5>

                <table>
                    <tr>
                        <th>@lang('lavel.name') </th>
                        <th>{{ $general_queries->name }}</th>
                    </tr>
                    <tr>
                        <th>@lang('lavel.email') </th>
                        <th>{{ $general_queries->email }}</th>
                    </tr>
                    <tr>
                        <th>@lang('lavel.mobile') </th>
                        <th>{{ $general_queries->mobile_no }}</th>
                    </tr>
                    <tr>
                        <th>@lang('lavel.details') </th>
                        <th>{{ $general_queries->details }}</th>
                    </tr>
                </table>


                    {{-- <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">@lang('lavel.name')</label>

                        <div class="col-md-6">
                            <label  id="details" type="text" class="form-control">{{ $general_queries->name }} </lavel>


                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-lg-2 control-label">@lang('lavel.email')</label>

                        <div class="col-md-6">
                            <label  id="details" type="text" class="form-control">{{ $general_queries->email }} </lavel>


                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mobile_no" class="col-lg-2 control-label">@lang('lavel.mobile')</label>

                        <div class="col-md-6">
                            <label  id="details" type="text" class="form-control">{{ $general_queries->mobile_no }} </lavel>


                        </div>
                    </div>
                    <div class="form-group">
                        <label for="details" class="col-lg-2 control-label">@lang('lavel.details')</label>

                        <div class="col-md-6">
                            <label  id="details" type="text" class="form-control">{{ $general_queries->details }} </lavel>

                        </div>
                    </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
