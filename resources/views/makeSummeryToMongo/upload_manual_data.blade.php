@extends('layout.frontend')
@section('content')

<div class="content sm-gutter">
    <div class="container-fluid padding-25">
        <div class="card  bg-white">
            <div class="card-block">
                <h5>ম্যেনুয়াল ডাটা আপলোড</h5>

                <form action="{{url('dashboard/indicator')}}" {{-- class="form-horizontal" --}} role="form" method="POST"
                    data-toggle="validator">
                    @csrf

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-lg-2 control-label">ইন্ডিকেটর এর নাম<span
                                class="mendatory">*</span></label>


                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                required autofocus>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('bangla_name') ? ' has-error' : '' }}">
                        <label for="bangla_name" class="col-lg-4 control-label">ইন্ডিকেটর এর নাম বাংলায়<span
                                class="mendatory">*</span></label>


                        <div class="col-md-6">
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
                    <div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
                        <label for="project_id" class="col-lg-4 control-label">প্রকল্প<span
                                class="mendatory">*</span></label>

                        <div class="col-md-6 form-group">
                            {!! Form::select('project_id', \App\Project::pluck('name', 'id'), old('project_id'),
                            ['placeholder'=>'Please Select A Project','class' => 'form-control
                            full-width','data-init-plugin'=>'select2', 'id' => 'project_id', 'required' => 'required'])
                            !!}
                        </div>
                    </div>
					<div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
                        <label for="project_id" class="col-lg-4 control-label">ডাটা প্রসেস<span
                                class="mendatory">*</span></label>

                        <div class="col-md-6 form-group">
                            <select name="data_process" id="data_process" class="form-control full-width">
								<option value="">Please Select</option>
								<option value="API">Through API</option>
								<option value="MAN">Manual</option>
							</select>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('unit') ? ' has-error' : '' }}">
                        <label for="unit" class="col-lg-2 control-label">ইউনিট</label>

                        <div class="col-md-6">
                            <input id="unit" type="text" class="form-control" name="unit"
                                value="{{ old('unit') }}" autofocus>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('unit'))
                            <span class="help-block">
                                <strong>{{ $errors->first('unit') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('short_form') ? ' has-error' : '' }}">
                        <label for="short_form" class="col-lg-2 control-label">শর্ট ফর্ম</label>

                        <div class="col-md-6">
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



                    {{--
                    <div class="form-group{{ $errors->has('used_table') ? ' has-error' : '' }}">
                        <label for="used_table" class="col-lg-4 control-label">Used Table<span
                                class="mendatory">*</span></label>
                        <div class="col-md-6 form-group">
                            <select id="used_table" name="used_table" class="form-control full-width"
                                data-init-plugin="select2">
                                <option value=''>Select Used Table</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
                        <label for="parent_id" class="col-lg-4 control-label">Parent Indecator</label>

                        <div class="col-md-6 form-group">
                            {!! Form::select('parent_id', \App\Indicator::pluck('name', 'id'), old('parent_id'),
                            ['placeholder'=>'Please Select A Parent Indecator','class' => 'form-control
                            full-width','data-init-plugin'=>'select2', 'id' => 'parent_id']) !!}
                        </div>
                    </div>
                    --}}
                    <!-- <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                        <label for="priority" class="col-lg-2 control-label">প্রাধান্য<span
                                class="mendatory">*</span></label>

                        <div class="col-md-6">
                            <input id="priority" type="number" class="form-control" name="priority"
                                value="{{ old('priority') }}" required autofocus>
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
                        <label for="geo_type" class="col-lg-2 control-label">GEO Type<span
                                class="mendatory">*</span></label>

                        <div class="col-md-6">
                            <select name="geo_type" id="geo_type" class="form-control full-width"
                                data-init-plugin="select2">
                                @foreach($geo_types as $key=>$geo_type)
                                <option value="{{ $key }}">{{ $geo_type }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    --}}
                    <!--div class="form-group{{ $errors->has('rules') ? ' has-error' : '' }}">
        <label for="rules" class="col-lg-2 control-label">Rules{{-- <span class="mendatory">*</span> --}}</label>
        
        <div class="col-md-6 ">
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
               {{--  <input type="button" value="Add Rules" id="add_rule_button" class="btn pull-right btn-primary"> --}}<br>
            </div>
            {{--  <span id="addOperatr" class="query_block_btn">Add Operator</span> --}}
           {{--  <div class="hide_block">
            <input type="button" id="addOperatr" class="query_block_btn" value="Add Operator">
                <select id="entity" class="gqb form-control col-md-6">
                     <option value="">Select Table Column</option>
                    @foreach($tables as $key => $table)
                        <option value="{{$table->table_name}}">{{$table->table_name}}</option>
                    @endforeach
                </select>
                   
                    <input type="button" id="addTable" class="query_block_btn" value="Add Table">
                    <input type="button" id="remove_rule_button" class="btn pull-right btn-danger" value="Remove">
            </div> --}}
            <br>
            <div id="allElement" class="inner_query_block"></div>
            {{-- <span id="query_ok" class="query_block_btn">Generate Rules</span>
            <span id="query_clear" class="query_block_btn">Remove Rules</span> --}}
            <input type="button" id="query_ok" value="Generate Rule" class="btn btn-info">
            <input type="button" id="query_clear" value="Clear Rule" class="btn btn-danger">
            
            <input name="rules" type="text" id="rules" value="{{ old('rules') }}">
        </div>

        </div>    
    
    </div-->

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-lg-2 control-label">রুলস<span class="mendatory">*</span></label>


                        <div class="col-md-6">
                            <textarea class="form-control" id="rules" name="rules">{{ old('rules') }}</textarea>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('rules'))
                            <span class="help-block">
                                <strong>{{ $errors->first('rules') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

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
            alert("Rules Generate Success.");
        }
    });

    $(document).on("click", "#query_clear", function() {
        var rl = $("#rules").val();
        if (rl) {
            $("#rules").val('');
            alert("Rules Clear Successfully.");
        }
    });

    //--------Used Table----------
    $(document).on("change", "#project_id", function(e) {

        var project_id = $(this).val();
        console.log(project_id);

        $.ajax({
            type: "get",
            url: "{{ url('ajax/get-usedColumn') }}",
            data: {
                'project_id': project_id
            },
        }).done(function(resp) {
            var txt = '';
            var resp = JSON.parse(resp);
            $.each(resp, function(i, item) {
                txt += '<option value="' + resp[i].column_name + '">' + resp[i]
                    .column_name + '</option>';
            });

            $('#used_table').append(txt);
        });

    });


});
</script>
@endpush
@endsection
