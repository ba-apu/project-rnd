@extends('layout.frontend')
@section('content')

    <div class="content sm-gutter">
        <div class="container-fluid padding-25">
            <div class="card  bg-white">
                <div class="card-block">
                    <h5>@lang('lavel.new_indicator')</h5>
                    <form action="{{url('dashboard/indicator')}}" {{-- class="form-horizontal" --}} role="form"
                          method="POST" data-toggle="validator">
                        @csrf

                        <div class="row m-3">
                            <div class="col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-6 control-label">@lang('lavel.indicator')
                                    <span class="mendatory">*</span>
                                </label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-6 {{ $errors->has('bangla_name') ? ' has-error' : '' }}">
                                <label for="bangla_name" class="col-md-6 control-label">@lang('lavel.indicator_name_bangla')
                                    <span class="mendatory">*</span>
                                </label>
                                <input id="bangla_name" type="text" class="form-control" name="bangla_name"
                                       value="{{ old('bangla_name') }}" required autofocus>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('bangla_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bangla_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row m-3">
                            <div class="col-md-6 {{ $errors->has('project_id') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-6 control-label">@lang('lavel.project')
                                    <span class="mendatory">*</span>
                                </label>
                                {!! Form::select('project_id', $projects, old('project_id'),['placeholder'=>'উদ্যোগ নির্বাচন করুন ','class' => 'form-control full-width','data-init-plugin'=>'select2', 'id' => 'project_id', 'required' => 'true'])!!}
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('project_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('project_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 {{ $errors->has('data_process') ? ' has-error' : '' }}">
                                <label for="data_process" class="col-md-6 control-label">@lang('lavel.data_process')
                                    <span class="mendatory">*</span>
                                </label>
                                <select name="data_process" id="data_process" class="form-control full-width" required autofocus>
                                    <option value="">নির্বাচন করুন</option>
                                    <option value="API">এপিআই এর মাধ্যমে</option>
                                    <option value="MAN">ম্যানুয়াল</option>
                                </select>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('data_process'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('data_process') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

{{--                        <div class="row m-3 dpClass">--}}
{{--                            <div class="col-md-6 {{ $errors->has('user_based') ? ' has-error' : '' }}">--}}
{{--                                <label for="user_based" class="col-md-6 control-label">ব্যবহারকারী সংক্রান্ত--}}
{{--                                    <span class="mendatory">*</span>--}}
{{--                                </label>--}}
{{--                                <select name="user_based" id="user_based" class="form-control full-width dpcClass" required autofocus>--}}
{{--                                    <option value="">নির্বাচন করুন</option>--}}
{{--                                    <option value="1">হ্যাঁ</option>--}}
{{--                                    <option value="0">না</option>--}}
{{--                                </select>--}}
{{--                                <div class="help-block with-errors"></div>--}}
{{--                                @if ($errors->has('user_based'))--}}
{{--                                    <span class="help-block">--}}
{{--                                        <strong>{{ $errors->first('user_based') }}</strong>--}}
{{--                                    </span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 {{ $errors->has('geo_type') ? ' has-error' : '' }}">--}}
{{--                                <label for="geo_type" class="col-md-6 control-label">জিও টাইপ--}}
{{--                                    <span class="mendatory">*</span>--}}
{{--                                </label>--}}
{{--                                <select name="geo_type" id="geo_type" class="form-control full-width" required autofocus>--}}
{{--                                    <option>নির্বাচন করুন</option>--}}
{{--                                    <option value="0">প্রযোজ্য নয়</option>--}}
{{--                                    <option value="1">বিভাগ</option>--}}
{{--                                    <option value="2">জেলা</option>--}}
{{--                                    <option value="3">উপজেলা</option>--}}
{{--                                    <option value="3">থানা</option>--}}
{{--                                </select>--}}
{{--                                <div class="help-block with-errors"></div>--}}
{{--                                @if ($errors->has('geo_type'))--}}
{{--                                    <span class="help-block">--}}
{{--                                        <strong>{{ $errors->first('geo_type') }}</strong>--}}
{{--                                    </span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="card p-3 dpClass" id="user_details">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="row mx-3 my-2">--}}
{{--                                    <div--}}
{{--                                        class="col-md-6 {{ $errors->has('indicator_user_category') ? ' has-error' : '' }}">--}}
{{--                                        <label for="indicator_user_category" class="col-md-6 control-label">--}}
{{--                                            ব্যবহারকারী শ্রেণী--}}
{{--                                            <span class="mendatory">*</span>--}}
{{--                                        </label>--}}
{{--                                        {!! Form::select('indicator_user_category', $indicator_user_category , old('indicator_user_category'),['placeholder'=>'নির্বাচন করুন ','class' => 'form-control full-width user_details_section','data-init-plugin'=>'select2', 'id' => 'indicator_user_category','required'=>'required'])!!}--}}
{{--                                        <div class="help-block with-errors"></div>--}}
{{--                                        @if ($errors->has('indicator_user_category'))--}}
{{--                                            <span class="help-block">--}}
{{--                                        <strong>{{ $errors->first('indicator_user_category') }}</strong>--}}
{{--                                    </span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6 {{ $errors->has('indicator_user_type') ? ' has-error' : '' }}">--}}
{{--                                        <label for="indicator_user_type" class="col-md-6 control-label">ধরণ--}}
{{--                                            <span class="mendatory">*</span>--}}
{{--                                        </label>--}}
{{--                                        <select name="indicator_user_type" id="indicator_user_type"--}}
{{--                                                class="form-control full-width user_details_section">--}}
{{--                                            <option value="">নির্বাচন করুন</option>--}}
{{--                                            <option value="main">মূল সূচক</option>--}}
{{--                                            <option value="male">পুরুষ</option>--}}
{{--                                            <option value="female">নারী</option>--}}
{{--                                            <option value="others">অন্যান্য</option>--}}
{{--                                        </select>--}}
{{--                                        <div class="help-block with-errors"></div>--}}
{{--                                        @if ($errors->has('indicator_user_type'))--}}
{{--                                            <span class="help-block">--}}
{{--                                        <strong>{{ $errors->first('indicator_user_type') }}</strong>--}}
{{--                                    </span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row mx-3 my-2" id="has_user_details_div">--}}
{{--                                    <div class="col-md-6 {{ $errors->has('has_user_details') ? ' has-error' : '' }}">--}}
{{--                                        <div class="form-check mt-2 ml-3">--}}
{{--                                            <input type="checkbox" name="has_user_details" class="form-check-input user_details_section" value=""--}}
{{--                                                   id="has_user_details">--}}
{{--                                            <label class="form-check-label" for="has_user_details">ব্যবহারকারীর--}}
{{--                                                বিস্তারিত তথ্য আছে </label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row m-3 dpClass">--}}
{{--                            <div class="col-md-6 {{ $errors->has('ref_table_name') ? ' has-error' : '' }}">--}}
{{--                                <label for="default_chart" class="col-md-6 control-label">--}}
{{--                                   টেবিল নাম<span class="mendatory">*</span>--}}
{{--                                </label>--}}
{{--                                <input type="text" readonly class="form-control" placeholder="নাই" style="background-color: white;color:black;" name="ref_table_name" id="ref_table_name" required autofocus>--}}
{{--                                @if ($errors->has('ref_table_name'))--}}
{{--                                    <span class="help-block">--}}
{{--                                        <strong>{{ $errors->first('ref_table_name') }}</strong>--}}
{{--                                    </span>--}}
{{--                                @endif--}}
{{--                            </div>--}}

{{--                            <div class="col-md-6 {{ $errors->has('table_columns') ? ' has-error' : '' }}">--}}
{{--                                <label for="default_chart" class="col-md-6 control-label">--}}
{{--                                    টেবিল কলাম <span class="mendatory">*</span>--}}
{{--                                </label>--}}
{{--                                <input type="hidden" value="" name="ref_tbl_type" id="ref_tbl_type">--}}
{{--                                <select name="table_columns" id="table_columns" class="form-control full-width" required autofocus>--}}
{{--                                    <option value=''>কলাম নির্বাচন করুন</option>--}}
{{--                                </select>--}}
{{--                                <div class="help-block with-errors"></div>--}}
{{--                                @if ($errors->has('table_columns'))--}}
{{--                                    <span class="help-block">--}}
{{--                                        <strong>{{ $errors->first('table_columns') }}</strong>--}}
{{--                                    </span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="row m-3">
                            <div class="col-md-6 {{ $errors->has('unit') ? ' has-error' : '' }}">
                                <label for="unit" class="col-md-6 control-label">@lang('lavel.unit')
                                    <span class="mendatory">*</span>
                                </label>
                                <input id="unit" type="text" class="form-control" name="unit" value="{{ old('unit') }} "
                                       required autofocus>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('unit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('unit') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 {{ $errors->has('short_form') ? ' has-error' : '' }}">
                                <label for="short_form" class="col-md-6 control-label">@lang('lavel.short_form')
                                </label>
                                <input id="short_form" type="text" class="form-control" name="short_form"
                                       value="{{ old('short_form') }}" autofocus>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('short_form'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('short_form') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" name="api" id="api">

                        <div class="row m-3">
                            <div class="col-md-6 {{ $errors->has('short_form_en') ? ' has-error' : '' }}">
                                <label for="short_form_en" class="col-md-6 control-label">
                                    @lang('lavel.short_form_en')
                                </label>
                                <input id="short_form_en" type="text" class="form-control" name="short_form_en"
                                       value="{{ old('short_form_en') }}" autofocus>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('short_form_en'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('short_form_en') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 {{ $errors->has('default_chart') ? ' has-error' : '' }}">
                                <label for="default_chart" class="col-md-6 control-label">
                                    @lang('lavel.main_chart')
                                    <span class="mendatory">*</span>
                                </label>
                                {!! Form::select('default_chart', $charts, old('default_chart'),[ 'placeholder'=>'চার্টের ধরণ নির্বাচন করুন','class' => 'form-control full-width','data-init-plugin'=>'select2', 'id' => 'default_chart','required'=>'required']) !!}
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('default_chart'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('default_chart') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row m-3">
                            <div class="col-md-6 {{ $errors->has('chart') ? ' has-error' : '' }}">
                                <label for="chart" class="col-md-6 control-label">
                                    @lang('lavel.another_chart')
                                    <span class="mendatory"></span></label>
                                </label>
                                {!! Form::select('chart[]',$charts, old('chart'),['multiple' => 'multiple', 'class' => 'form-control full-width','data-init-plugin'=>'select2', 'id' => 'chart','required'=>'required']) !!}
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('chart'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('chart') }}</strong>
                                    </span>
                                @endif
                            </div>
{{--                            <div class="col-md-6 {{ $errors->has('first_process') ? ' has-error' : '' }}">--}}
{{--                                <label for="first_process" class="col-md-6 control-label">--}}
{{--                                    @lang('lavel.first_precess')--}}
{{--                                    <span class="mendatory">*</span>--}}
{{--                                </label>--}}
{{--                                <select name="first_process" id="first_process" class="form-control full-width">--}}
{{--                                    <option value="1">হ্যাঁ</option>--}}
{{--                                    <option value="0">না</option>--}}
{{--                                </select>--}}
{{--                                <div class="help-block with-errors"></div>--}}
{{--                                @if ($errors->has('first_process'))--}}
{{--                                    <span class="help-block">--}}
{{--                                        <strong>{{ $errors->first('first_process') }}</strong>--}}
{{--                                    </span>--}}
{{--                                @endif--}}
{{--                            </div>--}}

                            <div class="col-md-6">
                                <label for="chart" class="col-md-6 control-label">
                                    বর্তমান অবস্থা
                                    <span class="mendatory">*</span>
                                </label>
                                <div class="col-md-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" checked="checked" value="1"
                                                   name="status"> সক্রিয়
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="0" name="status">
                                            নিষ্ক্রিয়
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary btn-cons m-b-10" type="submit"><i class="pg-form"></i>
                                    <span
                                        class="bold">@lang('lavel.submit')</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).ready(function () {
                $('#data_process').val('MAN');
                $('#user_details').hide();
                $('#user_based').change(function () {
                    if ($('#user_based').val() == 1) {
                        $('#user_details').show();
                        $('.user_details_section').removeAttr('disabled');

                    } else {
                        $('#user_details').hide();
                        $('.user_details_section').attr('disabled','disabled');

                    }
                });
                $('#has_user_details_div').hide();
                $('#geo_type').change(function () {
                    if ($('#geo_type').val() == 0) {
                        $('#has_user_details_div').hide();
                    } else {
                        $('#has_user_details_div').show();
                    }
                });

                $("#addIndicator").click(function () {

                    //var project_id = $( "#project_id option:selected" ).text();
                    var project_id = $("#project_id option:selected").val();
                    $.ajax({
                        type: "get",
                        url: "{{ url('ajax/get-indicator-list') }}",
                        data: {
                            'project_id': project_id,
                        }
                    }).done(function (resp) {
                        var text = '<div class="btn_left"><select class="eq gqb form-control" name="quer[]" ><option value="">সূচক নির্বাচন করুন</option>';
                        var resp = JSON.parse(resp);
                        //console.log(resp);
                        $.each(resp, function (i, item) {
                            text += '<option value="I_' + resp[i].id + '_">' + resp[i].bangla_name + '</option>';
                            // text += '<option value="' + resp[i].id + '">' + resp[i].bangla_name +'</option>';
                        });
                        text += '</select><input type="button" id="removeOperatr" value="X" class="x_button btn-danger"/></div>';

                        //$('#indicator').html(txt);
                        $("#rulesElement").append(text);
                    });


                    $("#rulesElement").append(text);
                });

                $(document).on("change", "#has_user_details", function () {
                    if ($('#has_user_details').is(":checked")) {
                        $(this).val(1);
                    }else{
                        $(this).val(0);
                    }
                });

                $(document).on("change", "#data_process", function (e) {
                    let data_process = $(this).val();
                    if(data_process == 'MAN'){
                        $('.dpClass').hide();
                        $('#user_based,#indicator_user_category,#table_columns').removeAttr("required");
                        $('#api').removeAttr('disabled');
                    }else{
                        $('.dpClass').show();
                        $('#user_based,#indicator_user_category,#table_columns').attr("required","");
                        $('#api').attr('disabled','disabled');
                    }
                });

                $('#data_process').trigger('change').css('pointer-events','none');
                $(document).on("change", "#indicator_user_category,#indicator_user_type", function (e) {
                    let indicator_user_category  = $('#indicator_user_category').val()
                    let indicator_user_type = $('#indicator_user_type').val()
                    let project_id = $('#project_id').val();

                    if (project_id && indicator_user_type && indicator_user_category) {
                        $.ajax({
                            type: "get",
                            url: "{{ url('ajax/check-indicator-user-category') }}",
                            data: {
                                'project_id': project_id,
                                'indicator_user_category': indicator_user_category,
                                'indicator_user_type': indicator_user_type
                            },
                        }).done(function (response) {
                            if(response.status == 422){
                                Swal.fire({
                                    icon: 'error',
                                    title: response.message
                                });
                                $('#indicator_user_type').val('')
                            }

                        });
                    }else{

                    }
                });

                $(document).on("change", "#user_based,#geo_type,#project_id,#has_user_details", function (e) {
                    let project_id = $('#project_id').val();
                    let user_based = $('#user_based').val();
                    let geo_type = $('#geo_type').val();
                    let has_user_details = $('#has_user_details').val();

                    if (project_id && user_based && geo_type) {
                        $.ajax({
                            type: "get",
                            url: "{{ url('ajax/get-columns') }}",
                            data: {
                                'project_id': project_id,
                                'user_based': user_based,
                                'geo_type': geo_type,
                                'has_user_details': has_user_details
                            },
                        }).done(function (response) {
                            $('#table_columns').empty()
                            options = "<option value=''>কলাম নির্বাচন করুন</option>";
                            $.each(response.columns, function (key,value) {
                                options += '<option value="' + value + '">' + value + '</option>';
                            });

                            $('#table_columns').append(options);
                            $('#table_columns').select2();
                            $('#ref_table_name').val(response.table);
                            $('#ref_tbl_type').val(response.ref_tbl_type);
                        });
                    }else{
                        $('#table_columns').empty().append("<option value=''>কলাম নির্বাচন করুন</option>");
                        $('#ref_table_name').val('')
                        $('#ref_table_name').attr("placeholder", "নাই");
                        $('#ref_tbl_type').val()
                    }
                });

            });

            function getIndicator(sel) {
                var indiacator = sel.value;
                var indiacator_name = $("#indicator option:selected").text();
                //alert(indiacator);
                if (indiacator != 0) {
                    var rules = $('#indicator_rules').val();
                    $('#indicator_rules').val(rules + indiacator_name);
                    $("#indicator").val('0').change();
                }
            }
        </script>
    @endpush
@endsection
