@extends('layout.frontend')
@section('content')
    <div class="content sm-gutter">
        <div class="container-fluid padding-25">
            <div class="card  bg-white">
                <div class="card-block">
                    <h5>@lang('lavel.update_indicator')</h5>
                    <form action="{{url('dashboard/indicator/' . $indicator->id)}}" role="form" method="POST"
                          data-toggle="validator">
                        @csrf
                        <input name="_method" type="hidden" value="PUT">

                        <div class="row m-3">
                            <div class="col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <input name="redirect_to" type="hidden" value="">
                                <label for="name" class="col-md-6 control-label">@lang('lavel.indicator')<span
                                            class="mendatory">*</span></label>
                                <input id="name" type="text" class="form-control" name="name"
                                       value="{{ old('name', $indicator->name) }}" required autofocus>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                                @endif
                            </div>

                            <div class="col-md-6 {{ $errors->has('bangla_name') ? ' has-error' : '' }}">
                                <label for="bangla_name" class="col-md-6 control-label">@lang('lavel.indicator_name_bangla') <span
                                            class="mendatory">*</span></label>
                                <input id="bangla_name" type="text" class="form-control" name="bangla_name"
                                       value="{{ old('bangla_name', $indicator->bangla_name) }}" required autofocus>
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
                                <label for="project_id" class="col-md-6 control-label">@lang('lavel.project')<span
                                            class="mendatory">*</span></label>
                                {!! Form::select('project_id', \App\Project::where('status',1)->pluck('name', 'id'),
                                old('project_id',$indicator->project_id), ['placeholder'=>'Please Select A Project','class'
                                => 'form-control full-width','data-init-plugin'=>'select2', 'id' => 'project_id', 'required'
                                => 'required']) !!}
                            </div>
                            <div class="col-md-6 {{ $errors->has('data_process') ? ' has-error' : '' }}">
                                <label for="project_id" class="col-md-6 control-label">@lang('lavel.data_process')<span
                                            class="mendatory">*</span></label>
                                <label class="col-sm-6 col-form-label">
                                    @if($indicator->data_process == 'MAN') Manual @else API @endif
                                </label>
                            </div>
                        </div>

                        <div class="row m-3">
                            <div class="col-md-6{{ $errors->has('unit') ? ' has-error' : '' }}">
                                <label for="unit" class="col-md-6 control-label">@lang('lavel.unit')</label>
                                <input id="unit" type="text" class="form-control" name="unit"
                                       value="{{ old('unit',$indicator->unit) }}" autofocus>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('unit'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('unit') }}</strong>
                            </span>
                                @endif
                            </div>
                            <div class="col-md-6{{ $errors->has('short_form') ? ' has-error' : '' }}">
                                <label for="short_form" class="col-md-6 control-label">@lang('lavel.short_form')</label>
                                <input id="short_form" type="text" class="form-control" name="short_form"
                                       value="{{ old('short_form',$indicator->short_form) }}" autofocus>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('short_form'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('short_form') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="row m-3">
                            <div class="col-md-6{{ $errors->has('short_form_en') ? ' has-error' : '' }}">
                                <label for="short_form_en" class="col-md-6 control-label">@lang('lavel.short_form_en')</label>
                                <input id="short_form_en" type="text" class="form-control" name="short_form_en"
                                       value="{{ old('short_form_en',$indicator->short_form_en) }}" autofocus>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('short_form_en'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('short_form_en') }}</strong>
                            </span>
                                @endif
                            </div>
                            <div class="col-md-6{{ $errors->has('default_chart') ? ' has-error' : '' }}">
                                <label for="chart" class="col-md-6 control-label"> @lang('lavel.main_chart') <span class="mendatory">*</span></label>
                                {!! Form::select('default_chart', \App\Chart::pluck('chart_name', 'id'), old('default_chart',$indicator->default_chart),
                                [ 'placeholder'=>'Please Select A Chart Type','class' => 'form-control
                                full-width','data-init-plugin'=>'select2', 'id' => 'default_chart']) !!}
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('default_chart'))
                                    <span class="help-block">
                <strong>{{ $errors->first('default_chart') }}</strong>
            </span>
                                @endif
                            </div>
                        </div>

                        <div class="row m-3">
                            <div class="col-md-6{{ $errors->has('chart') ? ' has-error' : '' }}">
                                <label for="chart" class="col-md-6 control-label">@lang('lavel.another_chart')</label>
                                @php
                                    $other_chart_json=$indicator->chart?json_decode($indicator->chart,1):"";
                                    $other_chart=array();
                                    if(is_array($other_chart_json)){
                                        foreach($other_chart_json as $r)
                                        {
                                                $other_chart[$r]=$r;
                                        }
                                    }
                                @endphp
                                <select name="chart[]" multiple="multiple" class="form-control full-width" data-init-plugin='select2' id = 'chart'>
                                    <option></option>
                                    @foreach($charts as $r)
                                        <option value="{{$r->id}}" @if(isset($other_chart[$r->id]))selected @endif>{{ $r->chart_name }}</option>
                                    @endforeach
                                </select>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('chart'))
                                    <span class="help-block">
                    <strong>{{ $errors->first('chart') }}</strong>
                </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="chart" class="col-md-6 control-label">
                                    বর্তমান অবস্থা
                                    <span class="mendatory">*</span>
                                </label>
                                <div class="col-md-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" @if($indicator->status == 1) checked="checked" @endif value="1"
                                                   name="status"> সক্রিয়
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" @if($indicator->status == 0) checked="checked" @endif value="0" name="status">
                                            নিষ্ক্রিয়
                                        </label>
                                    </div>
                                </div>
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
    @push('scripts')
        <script>
            $(document).ready(function() {

                $(document).on("change", "#entity", function(e) {

                    var entity = $(this).val();

                    $.ajax({
                        type: "get",
                        url: "{{ url('ajax/getcolumns') }}",
                        data: {
                            'entity': entity
                        },
                    }).done(function(resp) {
                        var txt = '';
                        var resp = JSON.parse(resp);
                        txt +=
                            "<div class='btn_left'><select class='gq gqb form-control' name='quer[]' required><option value=''>Select Column</option>";
                        $.each(resp, function(i, item) {

                            txt += '<option value="' + resp[i].column_name + '">' + resp[i]
                                .column_name + '</option>';
                        });
                        txt +=
                            '</select><input type="button" id="removeAttr" value="X" class="x_button btn-danger"/></div>';
                        $('#allElement').append(txt);
                    });
                });

                $("#addOperatr").click(function() {
                    var text =
                        '<div class="btn_left"><select class="gq gqb form-control" name="quer[]" required><option value="">Select Operator</option>';
                    text += '<option value="SELECT">SELECT</option>';
                    text += '<option value="INSERT">INSERT</option>';
                    text += '<option value="UPDATE">UPDATE</option>';
                    text += '<option value="DELETE">DELETE</option>';
                    text += '<option value="ALTER">ALTER</option>';
                    text += '<option value="DROP">DROP</option>';
                    text += '<option value="CREATE">CREATE</option>';
                    text += '<option value="USE">USE</option>';
                    text += '<option value="SHOW">SHOW</option>';
                    text += '<option value="SHOW">SHOW</option>';
                    text += '<option value="*">*</option>';
                    text += '<option value="FROM">FROM</option>';
                    text += '<option value="WHERE">WHERE</option>';
                    text += '<option value="=">=</option>';
                    text += '<option value=">">></option>';
                    text += '<option value="<"><</option>';
                    text += '<option value="!=">!=</option>';
                    text += '<option value="AND">AND</option>';
                    text += '<option value="OR">OR</option>';
                    text += '<option value="NOT">NOT</option>';
                    text += '<option value="BETWEEN">BETWEEN</option>';
                    text += '<option value="GROUP">GROUP</option>';
                    text += '<option value="BY">BY</option>';
                    text += '<option value="ON">ON</option>';
                    text += '<option value="DESC">DESC</option>';
                    text += '<option value="INTO">INTO</option>';
                    text += '<option value="LIKE">LIKE</option>';
                    text +=
                        '</select><input type="button" id="removeOperatr" value="X" class="x_button btn-danger"/></div>';
                    $("#allElement").append(text);
                });

                $("#addCustomField").click(function() {
                    var text = '';
                    text +=
                        '<div class="btn_left"><input id="customField" type"text" class="gq gqb form-control" name="quer[]"/><input type="button" id="removeCustomField" value="X" class="x_button btn-danger"/></div>';
                    $("#allElement").append(text);
                })

                $("#addArathmaticOperator").click(function() {
                    var text =
                        '<div class="btn_left"><select class="eq gqb form-control" name="quer[]" required><option value="">@lang('lavel.add_arathmatic_operator')</option>';
                    text += '<option value="(">(</option>';
                    text += '<option value=")">)</option>';
                    text += '<option value="+">+</option>';
                    text += '<option value="-">-</option>';
                    text += '<option value="*">*</option>';
                    text += '<option value="/">/</option>';
                    text +=
                        '</select><input type="button" id="removeOperatr" value="X" class="x_button btn-danger"/></div>';
                    $("#rulesElement").append(text);
                });

                $("#addIndicator").click(function() {

                    //var project_id = $( "#project_id option:selected" ).text();
                    var project_id = $( "#project_id option:selected" ).val();
                    $.ajax({
                        type: "get",
                        url: "{{ url('ajax/get-indicator-list') }}",
                        data: {
                            'project_id': project_id,
                        }
                    }).done(function(resp) {

                        var text = '<div class="btn_left"><select class="eq gqb form-control" name="quer[]" required><option value="">সূচক নির্বাচন করুন</option>';
                        var resp = JSON.parse(resp);
                        //console.log(resp);
                        $.each(resp, function(i, item) {
                            text += '<option value="I_' + resp[i].id + '_">' + resp[i].bangla_name +'</option>';
                            // text += '<option value="' + resp[i].id + '">' + resp[i].bangla_name +'</option>';
                        });
                        text +='</select><input type="button" id="removeOperatr" value="X" class="x_button btn-danger"/></div>';

                        //$('#indicator').html(txt);
                        $("#rulesElement").append(text);
                    });


                    $("#rulesElement").append(text);
                });

                $("#addNumber").click(function() {
                    var text = '';
                    text +=
                        '<div class="btn_left"><input id="freeNumber" type"text" class="eq gqb form-control" name="quer[]"/><input type="button" id="removeCustomField" value="X" class="x_button btn-danger"/></div>';
                    $("#rulesElement").append(text);
                })

                // ------------- REmove Button Query ------------------------
                $(document).on("click", "#removeOperatr", function() {
                    $(this).parent().remove();
                });

                $(document).on("click", "#removeAttr", function() {
                    $(this).parent().remove();
                });

                $(document).on("click", "#removeTable", function() {
                    $(this).parent().remove();
                });
                $(document).on("click", "#removeCustomField", function() {
                    $(this).parent().remove();
                });
                // ------------- END REmove Button Query ------------------------

                $(document).on("click", "#query_ok", function() {
                    var query = [];
                    $.each($(".gq option:selected, input[id='customField']"), function() {
                        query.push($(this).val());
                    });
                    // $.each($("input[id='customField']"), function(){
                    //     query.push($(this).val());
                    // });
                    query = query.join(" ");
                    query = $.trim(query);
                    $("#rules").attr('value', query);
                    query = $("#rules").val();
                    if (query) {
                        alert("Rules Generate Successfully." + query);
                    }
                });

                $(document).on("click", "#query_clear", function() {
                    var rl = $("#rules").val();
                    if (rl) {
                        $("#rules").val('');
                        alert("Rules Clear Successfully.");
                    }
                });

                $(document).on("click", "#generate_equation", function() {
                    var query = [];
                    $.each($(".eq option:selected, input[id='freeNumber']"), function() {
                        query.push($(this).val());
                    });
                    // $.each($("input[id='customField']"), function(){
                    //     query.push($(this).val());
                    // });
                    query = query.join(" ");
                    query = $.trim(query);
                    $("#equation").attr('value', query);
                    query = $("#equation").val();
                    if (query) {
                        //alert("Equation Generate Success.");
                    }
                });

                $(document).on("click", "#equation_clear", function() {
                    var rl = $("#equation").val();
                    if (rl) {
                        $("#equation").attr('value', '');
                        //alert("Equation Clear Successfully.");
                    }
                });

                //--------Used Table----------
                $(document).on("change", "#project_id", function(e) {

                    var project_id = $(this).val();
                    //console.log(project_id);
                    $('#used_table').empty();
                    $.ajax({
                        type: "get",
                        url: "{{ url('ajax-get-usedColumn') }}",
                        data: {
                            'project_id': project_id
                        },
                    }).done(function(resp) {
                        var txt = '';
                        var resp = JSON.parse(resp);
                        txt += '<option>Select Used Table</option>'
                        $.each(resp, function(i, item) {
                            txt += '<option value="' + resp[i].column_name + '">' + resp[i]
                                .column_name + '</option>';
                        });


                        $('#used_table').append(txt);
                    });

                });

                $(document).on("change", "#first_process", function(e) {
                    var first_process = $(this).val();
                    if(first_process == 0){
                        document.getElementById("equation_panel").style.removeProperty( 'display' );
                    }else{
                        document.getElementById("equation_panel").style.display = "none";
                    }
                });


            });
        </script>
    @endpush
@endsection
