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
                    
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input name="redirect_to" type="hidden" value="">

                        <label for="name" class="col-lg-2 control-label">@lang('lavel.indicator_name')<span
                                class="mendatory">*</span></label>


                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name"
                                value="{{ old('name', $indicator->name) }}" required autofocus>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('bangla_name') ? ' has-error' : '' }}">
                        <label for="bangla_name" class="col-lg-4 control-label">@lang('lavel.indicator_name_bangla') <span
                                class="mendatory">*</span></label>

                        <div class="col-md-6">
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

                    <div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
                        <label for="project_id" class="col-lg-4 control-label">@lang('lavel.project')<span
                                class="mendatory">*</span></label>
                        <div class="col-md-6 form-group">
                            {!! Form::select('project_id', \App\Project::where('status',1)->pluck('name', 'id'),
                            old('project_id',$indicator->project_id), ['placeholder'=>'Please Select A Project','class'
                            => 'form-control full-width','data-init-plugin'=>'select2', 'id' => 'project_id', 'required'
                            => 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
                        <label for="project_id" class="col-lg-4 control-label">@lang('lavel.data_process')<span
                                class="mendatory">*</span></label>

                        <div class="col-md-6 form-group">
                            <select name="data_process" id="data_process" class="form-control full-width">
                                <option value="">Please Select</option>
                                <option value="API" @if($indicator->data_process == 'API') selected @endif>Through API
                                </option>
                                <option value="MAN" @if($indicator->data_process == 'MAN') selected @endif>Manual
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('unit') ? ' has-error' : '' }}">
                        <label for="unit" class="col-lg-2 control-label">@lang('lavel.unit')</label>

                        <div class="col-md-6">
                            <input id="unit" type="text" class="form-control" name="unit"
                                value="{{ old('unit',$indicator->unit) }}" autofocus>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('unit'))
                            <span class="help-block">
                                <strong>{{ $errors->first('unit') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('short_form') ? ' has-error' : '' }}">
                        <label for="short_form" class="col-lg-2 control-label">@lang('lavel.short_form')</label>

                        <div class="col-md-6">
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

                    <div class="form-group{{ $errors->has('short_form_en') ? ' has-error' : '' }}">
                        <label for="short_form_en" class="col-lg-2 control-label">@lang('lavel.short_form_en')</label>

                        <div class="col-md-6">
                            <input id="short_form_en" type="text" class="form-control" name="short_form_en"
                                value="{{ old('short_form_en',$indicator->short_form_en) }}" autofocus>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('short_form_en'))
                            <span class="help-block">
                                <strong>{{ $errors->first('short_form_en') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>



                    {{--
    <div class="form-group{{ $errors->has('used_table') ? ' has-error' : '' }}">
                    <label for="used_table" class="col-lg-4 control-label">Used Table<span
                            class="mendatory">*</span></label>
                    <div class="col-md-6 form-group">
                        <select id="used_table" name="used_table" class="form-control full-width"
                            data-init-plugin="select2">
                            <option value='' {{ old("used_table", $indicator->used_table) }}>Select Used Table</option>
                        </select>
                    </div>
            </div>

            <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
                <label for="parent_id" class="col-lg-4 control-label">Parent Indecator</label>
                <div class="col-md-6 form-group">
                    {!! Form::select('parent_id', \App\Indicator::pluck('name', 'id'),
                    old('parent_id',$indicator->parent_id), ['placeholder'=>'Please Select A Parent Indecator','class'
                    => 'form-control full-width','data-init-plugin'=>'select2', 'id' => 'parent_id']) !!}
                </div>
            </div>
            --}}
            <!-- <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
        <label for="priority" class="col-lg-2 control-label">প্রাধান্য<span class="mendatory">*</span></label>

        <div class="col-md-6">
            <input id="priority" type="number" class="form-control" name="priority" value="{{ old('priority', $indicator->priority) }}" required autofocus>
            <div class="help-block with-errors"></div>
            @if ($errors->has('priority'))
            <span class="help-block">
                <strong>{{ $errors->first('priority') }}</strong>
            </span>
            @endif
        </div>
    </div> -->
            {{--
    <div class="form-group{{ $errors->has('geo_type') ? ' has-error' : '' }}">
            <label for="geo_type" class="col-lg-2 control-label">GEO Type<span class="mendatory">*</span></label>

            <div class="col-md-6">
                <select name="geo_type" id="geo_type" class="form-control full-width" data-init-plugin="select2">
                    @foreach($geo_types as $key=>$geo_type)
                    <option value="{{ $key }}" {{ (old("geo_type", $indicator->geo_type) == $key ? "selected":"") }}>
                        {{ $geo_type }}</option>
                    @endforeach

                </select>
            </div>
        </div>
        --}}
        {{--
    <div class="form-group{{ $errors->has('rules') ? ' has-error' : '' }}">

		<label for="rules" class="col-lg-2 control-label">রুলস</label>

        <div class="col-md-6 ">
            <div class="query_block">
                <span id="addOperatr" class="query_block_btn">Add Operator</span>
                <select id="entity" class="gqb gqb_parent" disabled="true">
                    <option value="">Select Table for Column</option>
                    @foreach($tables as $key => $table)
                    <option value="{{$table->table_name}}">{{$table->table_name}}</option>
                    @endforeach
                </select>
                <span id="addTable" class="query_block_btn">Add Table</span>
                <hr>
                <div id="allElement"></div>
                <br>
                <br>
                <span id="query_ok" class="query_block_btn">Generate Rules</span>
                <span id="query_clear" class="query_block_btn">Remove Rules</span>
                <input name="rules" type="hidden" id="rules" value="{{ old('rules', $indicator->rules) }}">
            </div>

        </div> --}}
        <!--div class="col-md-6 ">
        <div class="query_block">
            <div>
                <input type="button" id="addCustomField" class="btn pull-right btn-primary" value="Custom Field">
                <input type="button" id="addTable" class="btn pull-right btn-primary" value="Add Table">
                <select id="entity" class="gqb form-control col-md-3 pull-right">
                     <option value="">Table Column</option>
                    @foreach($tables as $key => $table)
                        <option value="{{$table->table_name}}">{{$table->table_name}}</option>
                    @endforeach
                </select>
                <input type="button" id="addOperatr" class="btn pull-right btn-primary" value="Add Operator">
                <br>
            </div>

            <br>
            {{-- @php
                $query = $indicator->rules;
                echo $query;
                $query = explode(' ', $query);
                foreach($query as $query){
                    foreach ($tables as $table) {
                        if($query == $table->table_name){

                            echo '<select><option>'.$table->table_name.'</option></select><br>';
                        }
                    }
                    foreach ($rules as $rule) {
                        if($query == $rule){
                            echo '<select><option>'.$query.'</option></select><br>';
                        }
                    }

                    // if($query != $table->table_name && $query != $rule){
                    //     echo '<select><option>'.$query.'</option></select><br>';
                    // }

                }


                dd($tables);
                print_r($rules);

            @endphp
 --}}
            <div id="allElement" class="inner_query_block"></div>
            <input type="button" id="query_ok" value="Generate Rule" class="btn btn-info">
            <input type="button" id="query_clear" value="Clear Rule" class="btn btn-danger">

            <input name="rules" type="hidden" id="rules" value="{{ old('rules', $indicator->rules) }}">
        </div>

        </div>

    </div-->
        <!--div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-lg-2 control-label">রুলস<span class="mendatory">*</span></label>


            <div class="col-md-6">
                <textarea class="form-control" id="rules" name="rules">{{ old('rules',$indicator->rules) }}</textarea>
                <div class="help-block with-errors"></div>
                @if ($errors->has('rules'))
                <span class="help-block">
                    <strong>{{ $errors->first('rules') }}</strong>
                </span>
                @endif
            </div>
        </div-->
		<div class="form-group{{ $errors->has('default_chart') ? ' has-error' : '' }}">
        <label for="chart" class="col-lg-2 control-label"> @lang('lavel.main_chart') <span class="mendatory">*</span></label>

        <div class="col-md-6">

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
        <div class="form-group{{ $errors->has('chart') ? ' has-error' : '' }}">
            <label for="chart" class="col-lg-2 control-label">@lang('lavel.another_chart')</label>

            <div class="col-md-6">
                <!-- <select class="form-control full-width" id="chart" name="chart[]" multiple="multiple"
                    data-init-plugin="select2">
                    @foreach($charts as $key=>$chart)
                    <option value="{{$chart->chart_name}}" old('chart', $indicator->chart)
                        >{{$chart->chart_name}}</option>
                    @endforeach
                </select> -->
				@php
				$chart=\App\Chart::get();
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
					@foreach($chart as $r)
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
        </div>
        {{-- start independent indicator --}}
        {{-- {{dd($indicator)}} --}}
        <div class="form-group{{ $errors->has('first_precess') ? ' has-error' : '' }}">
            <label for="first_process" class="col-lg-4 control-label">@lang('lavel.first_precess')<span
                    class="mendatory">*</span></label>
            <div class="col-md-6 form-group">
                <select name="first_process" id="first_process" class="form-control full-width">
                    @if($indicator->first_process == 1)
                        <option value="1" selected>Yes</option>
                        <option value="0" >No</option>
                    @else
                        <option value="1" >Yes</option>
                        <option value="0" selected>No</option>
                    @endif
                </select>
            </div>
        </div>

        
        {{-- end independent indicator --}}
        {{-- start indicator rules --}}
        @if($indicator->first_process == 1)
            <div id="equation_panel" style="display:none">
        @else
            <div id="equation_panel">
        @endif
            <div class="form-group{{ $errors->has('rules') ? ' has-error' : '' }}">
                <label for="rules" class="col-lg-12 control-label">@lang('lavel.rules')</label>
                <label for="rules" id="edit_equation" class="col-lg-12 control-label">{{$indicator->equation}}</label>
                <div class="col-md-6 ">
                <div class="query_block">
                    <div>
                        <input type="button" id="addNumber" class="btn pull-right btn-primary" value="@lang('lavel.add_numberic')">

                        <input type="button" id="addArathmaticOperator" class="btn pull-right btn-primary" value="@lang('lavel.add_arathmatic_operator')">

                        <input type="button" id="addIndicator" class="btn pull-right btn-primary" value="@lang('lavel.select_indicator')">
                    <br>
                    </div>
                    <br>
                    <div id="rulesElement" class="inner_query_block"></div>
                    <input type="button" id="generate_equation" value="@lang('lavel.generate_rules')" class="btn btn-info">
                    <input type="button" id="equation_clear" value="@lang('lavel.clear_rules')" class="btn btn-danger">

                    <input name="equation" type="text" id="equation"  value="{{$indicator->rules}}">
                </div>

                </div>

            </div>
        </div>

        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
            <label for="first_process" class="col-lg-4 control-label">@lang('lavel.status')<span
                    class="mendatory">*</span></label>
            <div class="col-md-6 form-group">
                <select name="status" id="status" class="form-control full-width">
                    @if($indicator->status == 1)
                        <option value="1" selected>Active</option>
                        <option value="0" >Inactive</option>
                    @else
                        <option value="1" >Active</option>
                        <option value="0" selected>Inactive</option>
                    @endif
                </select>
            </div>
        </div>
        {{-- {{dd($indicator)}} --}}
        {{-- end indicator rules --}}
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

    // <span id="removeAttr" class="query_block_btn">X</span>

    $("#addTable").click(function() {
        var text =
            '<div class="btn_left"><select class="gq gqb form-control" name="quer[]" required><option value="">Select Table</option>';
        @foreach($tables as $key => $table)
        text += '<option value="{{$table->table_name}}">{{$table->table_name}}</option>';
        @endforeach
        text +=
            '</select><input type="button" id="removeTable" value="X" class="x_button btn-danger"/></div>';
        $("#allElement").append(text);
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
