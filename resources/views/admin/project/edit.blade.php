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
                    <h5> @lang('lavel.update_project')</h5>

                    <form action="{{url('dashboard/project/' . $project->id)}}" {{-- class="form-horizontal" --}}
                    role="form" method="POST" enctype="multipart/form-data" data-toggle="validator">
                        @csrf
                        <input name="_method" type="hidden" value="PUT">
                        <input name="redirect_to" type="hidden" value="{{ url()->previous() }}">

                        <div class="form-group{{ $errors->has('project_category_id') ? ' has-error' : '' }}">
                            <label for="project_category_id" class="col-lg-4 control-label">@lang('lavel.project_category')<span
                                    class="mendatory">*</span></label>

                            <div class="col-md-6 form-group">
                                {!! Form::select('project_category_id', \App\ProjectCategory::where('status', 1)->pluck('name', 'id'), old('id',$project->project_category_id),
                                ['placeholder'=>'Please Select A Project Category','class' => 'form-control
                                full-width','data-init-plugin'=>'select2', 'id' => 'id', 'required' => 'required'])
                                !!}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-2 control-label">@lang('lavel.project')</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"
                                       value="{{ old('name', $project->name) }}" required autofocus>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('bangla_name') ? ' has-error' : '' }}">
                            <label for="bangla_name" class="col-lg-4 control-label"> @lang('lavel.project_name_bangla')</label>

                            <div class="col-md-6">
                                <input id="bangla_name" type="text" class="form-control" name="bangla_name"
                                       value="{{ old('bangla_name', $project->bangla_name) }}" required autofocus>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('bangla_name'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('bangla_name') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                            <label for="slug" class="col-lg-2 control-label"> @lang('lavel.url')</label>

                            <div class="col-md-6">
                                <input id="slug" type="text" class="form-control" name="slug"
                                       value="{{ old('slug', $project->slug) }}" autofocus>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('slug'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('slug') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('reference_table_name') ? ' has-error' : '' }}">
                            <label for="reference_table_name" class="col-lg-4 control-label"> @lang('lavel.reference_table_name')</label>
                            <div class="col-md-6">
                                <input id="reference_table_name" type="text" class="form-control"
                                       name="reference_table_name"
                                       value="{{ old('reference_table_name', $project->reference_table_name) }}" autofocus>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('reference_table_name'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('reference_table_name') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('reference_child_table_name') ? ' has-error' : '' }}">
                            <label for="reference_child_table_name" class="col-lg-4 control-label">????????????????????? ??????????????? ???(??????????????? ??????????????? ???????????? ??????????????? ??????????????? ???????????? ???????????? ??????: xyz_abc)</label>
                            <div class="col-md-6">
                                <input id="reference_child_table_name" type="text" class="form-control"
                                       name="reference_child_table_name"
                                       value="{{ old('reference_child_table_name', $project->reference_child_table_name) }}" autofocus>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('reference_child_table_name'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('reference_child_table_name') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('reference_child_2_table_name') ? ' has-error' : '' }}">
                            <label for="reference_child_2_table_name" class="col-lg-4 control-label">????????????????????? ??????????????? ???(??????????????? ??????????????? ???????????? ??????????????? ??????????????? ???????????? ???????????? ??????: xyz_abc)</label>
                            <div class="col-md-6">
                                <input id="reference_child_2_table_name" type="text" class="form-control"
                                       name="reference_child_2_table_name"
                                       value="{{ old('reference_child_2_table_name', $project->reference_child_2_table_name) }}" autofocus>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('reference_child_2_table_name'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('reference_child_2_table_name') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        {{--                    <div class="form-group{{ $errors->has('model_name') ? ' has-error' : '' }}">--}}
                        {{--                        <label for="model_name" class="col-lg-2 control-label">@lang('lavel.model')</label>--}}
                        {{--                        <div class="col-md-6">--}}
                        {{--                            <input id="model_name" type="text" class="form-control" name="model_name"--}}
                        {{--                                value="{{ old('model_name', $project->model_name) }}" autofocus>--}}
                        {{--                            <div class="help-block with-errors"></div>--}}
                        {{--                            @if ($errors->has('model_name'))--}}
                        {{--                            <span class="help-block">--}}
                        {{--                                <strong>{{ $errors->first('model_name') }}</strong>--}}
                        {{--                            </span>--}}
                        {{--                            @endif--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}

                        <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                            <label for="logo" class="col-lg-2 control-label">@lang('lavel.logo')</label>
                            <div class="col-md-6">

                                <div class="row align-items-center">
                                    <div class="col-md-10">
                                        <input id="logo" type="file" class="form-control" name="logo"  autofocus oninvalid="this.setCustomValidity('@lang('lavel.please_fill_out_this_field')')" oninput="setCustomValidity('')">
                                        <span class="text-danger" style="font-size: 12px;">Image dimension should be 75x75</span>
                                        <div class="help-block with-errors"></div>
                                        @if ($errors->has('logo'))
                                            <span class="help-block">
                                       <strong>{{ $errors->first('logo') }}</strong>
                                   </span>
                                        @endif
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <img id="img_preview" src="{{ url('assets/img/projects/'.$project->logo) }}" alt="your image" style="max-width: 75px; max-height: 75px;"/>
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{--
                        <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
                            <label for="parent_id" class="col-lg-4 control-label">@lang('lavel.team')</label>
                            <div class="col-md-6 form-group">
                                {!! Form::select('teams[]', \App\Team::pluck('display_name', 'id'), old('teams',
                                json_decode($project->teams)),
                                ['multiple' => 'multiple', 'class' => 'form-control
                                full-width','data-init-plugin'=>'select2', 'id' => 'parent_id']) !!}

                                <div class="help-block with-errors"></div>
                                @if ($errors->has('teams'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('teams') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        --}}
                        {{--                    <h5>@lang('lavel.segment')</h5>--}}
                    <!-- <div class="form-group{{ $errors->has('main_indicator') ? ' has-error' : '' }}">
                        <label for="main_indicator" class="col-lg-4 control-label">??????????????????????????? ??????????????????????????? </label>

                        <div class="col-md-6">
                            <input id="main_indicator" type="text" class="form-control" name="main_indicator"
                                value="{{ old('main_indicator', $project->main_indicator) }}" autofocus>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('main_indicator'))
                        <span class="help-block">
                            <strong>{{ $errors->first('main_indicator') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div> -->
                        {{--                    <div class="form-group{{ $errors->has('main_indicator') ? ' has-error' : '' }}">--}}
                        {{--                        <label for="main_indicator" class="col-lg-4 control-label">@lang('lavel.primary_indicator')</label>--}}
                        {{--                        <div class="col-md-6 form-group">--}}
                        {{--                            {!! Form::select('main_indicator[]',--}}
                        {{--                            \App\Indicator::where('project_id',$project->id)->pluck('name', 'id'),--}}
                        {{--                            old('main_indicator', json_decode($project->main_indicator)),--}}
                        {{--                            ['multiple' => 'multiple', 'class' => 'form-control--}}
                        {{--                            full-width','data-init-plugin'=>'select2', 'id' => 'main_indicator']) !!}--}}
                        {{--                            <div class="help-block with-errors"></div>--}}
                        {{--                            @if ($errors->has('main_indicator'))--}}
                        {{--                            <span class="help-block">--}}
                        {{--                                <strong>{{ $errors->first('main_indicator') }}</strong>--}}
                        {{--                            </span>--}}
                        {{--                            @endif--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}

                        {{--                    <div class="form-group{{ $errors->has('first_segment_name') ? ' has-error' : '' }}">--}}
                        {{--                        <label for="first_segment_name" class="col-lg-4 control-label">@lang('lavel.first_segment_name')</label>--}}
                        {{--                        <div class="col-md-6">--}}
                        {{--                            <input id="first_segment_name" type="text" class="form-control" name="first_segment_name"--}}
                        {{--                                value="{{ old('first_segment_name', $project->first_segment_name) }}" autofocus>--}}
                        {{--                            <div class="help-block with-errors"></div>--}}
                        {{--                            @if ($errors->has('first_segment_name'))--}}
                        {{--                            <span class="help-block">--}}
                        {{--                                <strong>{{ $errors->first('first_segment_name') }}</strong>--}}
                        {{--                            </span>--}}
                        {{--                            @endif--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}

                        {{--                    <div class="form-group{{ $errors->has('first_segment_indicator') ? ' has-error' : '' }}">--}}
                        {{--                        <label for="first_segment_indicator" class="col-lg-4 control-label">@lang('lavel.first_segment_indicator')</label>--}}
                        {{--                        <div class="col-md-6 form-group">--}}
                        {{--                            {!! Form::select('first_segment_indicator[]',--}}
                        {{--                            \App\Indicator::where('project_id',$project->id)->pluck('name', 'id'),--}}
                        {{--                            old('first_segment_indicator', json_decode($project->first_segment_indicator)),--}}
                        {{--                            ['multiple' => 'multiple', 'class' => 'form-control--}}
                        {{--                            full-width','data-init-plugin'=>'select2', 'id' => 'first_segment_indicator']) !!}--}}
                        {{--                            <div class="help-block with-errors"></div>--}}
                        {{--                            @if ($errors->has('first_segment_indicator'))--}}
                        {{--                            <span class="help-block">--}}
                        {{--                                <strong>{{ $errors->first('first_segment_indicator') }}</strong>--}}
                        {{--                            </span>--}}
                        {{--                            @endif--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}

                        {{--                    <div class="form-group{{ $errors->has('second_segment_name') ? ' has-error' : '' }}">--}}
                        {{--                        <label for="second_segment_name" class="col-lg-4 control-label">@lang('lavel.second_segment_name')</label>--}}
                        {{--                        <div class="col-md-6">--}}
                        {{--                            <input id="second_segment_name" type="text" class="form-control" name="second_segment_name"--}}
                        {{--                                value="{{ old('second_segment_name', $project->second_segment_name) }}" autofocus>--}}
                        {{--                            <div class="help-block with-errors"></div>--}}
                        {{--                            @if ($errors->has('second_segment_name'))--}}
                        {{--                            <span class="help-block">--}}
                        {{--                                <strong>{{ $errors->first('second_segment_name') }}</strong>--}}
                        {{--                            </span>--}}
                        {{--                            @endif--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}

                        {{--                    <div class="form-group{{ $errors->has('second_segment_indicator') ? ' has-error' : '' }}">--}}
                        {{--                        <label for="second_segment_indicator" class="col-lg-4 control-label">@lang('lavel.second_segment_indicator')</label>--}}
                        {{--                        <div class="col-md-6 form-group">--}}
                        {{--                            {!! Form::select('second_segment_indicator[]',--}}
                        {{--                            \App\Indicator::where('project_id',$project->id)->pluck('name', 'id'),--}}
                        {{--                            old('second_segment_indicator', json_decode($project->second_segment_indicator)),--}}
                        {{--                            ['multiple' => 'multiple', 'class' => 'form-control--}}
                        {{--                            full-width','data-init-plugin'=>'select2', 'id' => 'second_segment_indicator']) !!}--}}
                        {{--                            <div class="help-block with-errors"></div>--}}
                        {{--                            @if ($errors->has('second_segment_indicator'))--}}
                        {{--                            <span class="help-block">--}}
                        {{--                                <strong>{{ $errors->first('second_segment_indicator') }}</strong>--}}
                        {{--                            </span>--}}
                        {{--                            @endif--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}

                        {{--                    <div class="form-group{{ $errors->has('third_segment_name') ? ' has-error' : '' }}">--}}
                        {{--                        <label for="third_segment_name" class="col-lg-4 control-label">@lang('lavel.third_segment_name')</label>--}}
                        {{--                        <div class="col-md-6">--}}
                        {{--                            <input id="third_segment_name" type="text" class="form-control" name="third_segment_name"--}}
                        {{--                                value="{{ old('third_segment_name', $project->third_segment_name) }}" autofocus>--}}
                        {{--                            <div class="help-block with-errors"></div>--}}
                        {{--                            @if ($errors->has('third_segment_name'))--}}
                        {{--                            <span class="help-block">--}}
                        {{--                                <strong>{{ $errors->first('third_segment_name') }}</strong>--}}
                        {{--                            </span>--}}
                        {{--                            @endif--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}

                        {{--                    <div class="form-group{{ $errors->has('third_segment_indicator') ? ' has-error' : '' }}">--}}
                        {{--                        <label for="third_segment_indicator" class="col-lg-4 control-label">@lang('lavel.third_segment_indicator')</label>--}}
                        {{--                        <div class="col-md-6 form-group">--}}
                        {{--                            {!! Form::select('third_segment_indicator[]',--}}
                        {{--                            \App\Indicator::where('project_id',$project->id)->pluck('name', 'id'),--}}
                        {{--                            old('third_segment_indicator', json_decode($project->third_segment_indicator)),--}}
                        {{--                            ['multiple' => 'multiple', 'class' => 'form-control--}}
                        {{--                            full-width','data-init-plugin'=>'select2', 'id' => 'third_segment_indicator']) !!}--}}
                        {{--                            <div class="help-block with-errors"></div>--}}
                        {{--                            @if ($errors->has('third_segment_indicator'))--}}
                        {{--                            <span class="help-block">--}}
                        {{--                                <strong>{{ $errors->first('third_segment_indicator') }}</strong>--}}
                        {{--                            </span>--}}
                        {{--                            @endif--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}

                        <div class="form-group{{ $errors->has('third_segment_indicator') ? ' has-error' : '' }}">
                            <label for="third_segment_indicator" class="col-lg-4 control-label">@lang('lavel.dashboard_indicator')</label>
                            <div class="col-md-6 form-group">
                                {!! Form::select('home_page_indicators[]',
                                \App\Indicator::where('project_id',$project->id)->pluck('name', 'id'),
                                old('third_segment_indicator', json_decode($project->home_page_indicators)),
                                ['multiple' => 'multiple', 'class' => 'form-control
                                full-width','data-init-plugin'=>'select2', 'id' => 'home_page_indicators']) !!}
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('home_page_indicators'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('home_page_indicators') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="first_process" class="col-lg-4 control-label">@lang('lavel.status')<span
                                    class="mendatory">*</span></label>
                            <div class="col-md-6 form-group">
                                <select name="status" id="status" class="form-control full-width">
                                    @if($project->status == 1)
                                        <option value="1" selected>Active</option>
                                        <option value="0" >Inactive</option>
                                    @else
                                        <option value="1" >Active</option>
                                        <option value="0" selected>Inactive</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary btn-cons m-b-10" type="submit"><i class="pg-form"></i> <span
                                        class="bold">@lang('lavel.submit')</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{ asset('/assets/plugins/jquery/jquery-1.11.1.min.js') }}"></script>
<script>
    $(document).ready(function (){
        $('#logo').on('change', function (e){
            var logo = e.target.files;
            if (logo) {
                $('#img_preview').attr('src', URL.createObjectURL(e.target.files[0]));
            }
        })
    })
</script>
