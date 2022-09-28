@extends('layout.frontend')
@section('content')

<div class="content sm-gutter">
    <div class="container-fluid padding-25">
        <div class="card  bg-white">
            <div class="card-block">
                <h5>Project API</h5>

                <form action="{{url('/dashboard/project-api')}}" {{-- class="form-horizontal" --}} role="form"
                    method="POST" data-toggle="validator">
                    @csrf

                   
                    <div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
                        <label for="project_id" class="col-lg-4 control-label">@lang('lavel.project')<span
                                class="mendatory">*</span></label>

                        <div class="col-md-6 form-group">
                            {!! Form::select('project_id', \App\Project::pluck('name', 'id'), old('project_id'),
                            ['placeholder'=>'Please Select A Project','class' => 'form-control
                            full-width','data-init-plugin'=>'select2', 'id' => 'project_id', 'required' => 'required'])
                            !!}
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('first_precess') ? ' has-error' : '' }}">
                        <label for="first_process" class="col-lg-4 control-label">Method Type<span
                                class="mendatory">*</span></label>
                
                        <div class="col-md-6 form-group">
                            <select name="method" id="method" class="form-control full-width">
                                <option value="Get">Get</option>
                                <option value="Post">Post</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('unit') ? ' has-error' : '' }}">
                        <label for="unit" class="col-lg-2 control-label">Url</label>

                        <div class="col-md-6">
                            <input id="url" type="text" class="form-control" name="url" value="{{ old('unit') }}"
                                autofocus>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('unit'))
                            <span class="help-block">
                                <strong>{{ $errors->first('unit') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    {{-- start Param --}}
                    <div class="form-group{{ $errors->has('first_precess') ? ' has-error' : '' }}">
                        <label for="first_process" class="col-lg-4 control-label">Param
                            <span class="mendatory">*</span> 
                            <input type="checkbox" id="param_check" name="param_check">
                        </label>
                    </div>
                    {{-- end Param --}}

                    {{-- start indicator rules --}}
                    <div id="equation_panel" style="display:none">
                        <div class="form-group{{ $errors->has('rules') ? ' has-error' : '' }}">

                            <div class="col-md-8 ">
                                <div class="query_block">
                                    <div>
                                        <input type="button" id="addMoreParam" class="btn pull-right btn-primary" value="Add Key-Value">                                        
                                    <br>
                                    </div>
                                    <br>
                                    <div id="rulesElement" class="inner_query_block"></div>
                                    <input type="button" id="generate_param" value="@lang('lavel.generate_rules')" class="btn btn-info">
                                    <input type="button" id="param_equetion_clear" value="@lang('lavel.clear_rules')" class="btn btn-danger">

                                    <input name="param"  type="text" id="param" value="{{ old('param') }}">
                                </div>

                            </div>

                        </div>
                    </div>
                    {{-- end indicator rules --}}
                    
                    {{-- start Header --}}
                    <div class="form-group{{ $errors->has('first_precess') ? ' has-error' : '' }}">
                        <label for="first_process" class="col-lg-4 control-label">Header
                            <span class="mendatory">*</span> 
                            <input type="checkbox" id="header_check" name="header_check">
                        </label>
                    </div>
                    {{-- end Header --}}

                    {{-- start header key value --}}
                    <div id="header_panel" style="display:none">
                        <div class="form-group{{ $errors->has('rules') ? ' has-error' : '' }}">

                            <div class="col-md-8 ">
                                <div class="query_block">
                                    <div>
                                        <input type="button" id="addMoreHeader" class="btn pull-right btn-primary" value="Add Key-Value">
                                        
                                    <br>
                                    </div>
                                    <br>
                                    <div id="headerElement" class="inner_query_block"></div>
                                    <input type="button" id="generate_header" value="@lang('lavel.generate_rules')" class="btn btn-info">
                                    <input type="button" id="header_equetion_clear" value="@lang('lavel.clear_rules')" class="btn btn-danger">
                                    <input name="header" type="text" id="header" value="{{ old('header') }}">
                                </div>

                            </div>

                        </div>
                    </div>
                    {{-- end header --}}

                    <div class="form-group{{ $errors->has('first_precess') ? ' has-error' : '' }}">
                        <label for="first_process" class="col-lg-4 control-label">Alter Object</label>
                    </div>
                    <div id="header_panel" style="display:visible">
                        <div class="form-group{{ $errors->has('rules') ? ' has-error' : '' }}">

                            <div class="col-md-8 ">
                                <div class="query_block">
                                    <div>
                                        <input type="button" id="addAltrObj" class="btn pull-right btn-primary" value="Add Altr-Obj">
                                        
                                    <br>
                                    </div>
                                    <br>
                                    <div id="altrObjElement" class="inner_query_block"></div>
                                    <input type="button" id="generate_alter_obj" value="@lang('lavel.generate_rules')" class="btn btn-info">
                                    <input type="button" id="alter_equetion_clear" value="@lang('lavel.clear_rules')" class="btn btn-danger">
                                    <input name="alter_obj" type="text" id="alter_obj" value="{{ old('alter_obj') }}">
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

    // <span id="removeAttr" class="query_block_btn">X</span>

    
    $("#addAltrObj").click(function() {
        var text = '';
        text +=
            '<div class="btn_left">';
            text += '<input id="apiValue" type"text" class="alterk gqb form-control" placeholder="Api Value" name="quer_apiValu[]"/>';
            text += '<input id="dbColumnName" type"text" class="alterv gqb form-control" placeholder="DB Column Name" name="quer_dbColumnName[]"/>';
            text += '<input type="button" id="removeCustomField" value="X" class="x_button btn-danger"/>';
            text += '</div>';
        $("#altrObjElement").append(text);

    })

    $("#addMoreParam").click(function() {
        var text ='<div class="btn_left">';
            text += '<select class="paramk gqb form-control" name="quer_paramKey[]" required>';
            text += '<option value="">Key</option>';
            text += '<option value="__date__">__date__</option>';
            text += '<option value="__start_date__">__start_date__</option>';
            text += '<option value="__end_date__">__end_date__</option>';
            text += '<option value="__year__">__year__</option>';
            text += '<option value="__month__">__month__</option>';
            text += '<option value="__month_initial__">__month_initial__</option>';
            text += '<option value="__token__">__token__</option>';          
            text += '</select>';

            text += '<select class="paramv gqb form-control" name="quer_paramValue[]" required>';
            text += '<option value="">Value</option>';
            text += '<option value="__date__">__date__</option>';
            text += '<option value="__start_date__">__start_date__</option>';
            text += '<option value="__end_date__">__end_date__</option>';
            text += '<option value="__year__">__year__</option>';
            text += '<option value="__month__">__month__</option>';
            text += '<option value="__month_initial__">__month_initial__</option>';
            text += '<option value="__token__">__token__</option>'; 
            text += '</select>';
            
            
            text += '<input type="button" id="removeParamKeyValue" value="X" class="x_button btn-danger"/></div>';
        $("#rulesElement").append(text);
    })

    $("#addMoreHeader").click(function() {
        var text =
            '<div class="btn_left">';
            text += '<select class="headerk gqb form-control" name="quer_headerKey[]" required>';
            text += '<option value="">Key</option>';
            text += '<option value="__date__">__date__</option>';
            text += '<option value="__start_date__">__start_date__</option>';
            text += '<option value="__end_date__">__end_date__</option>';
            text += '<option value="__year__">__year__</option>';
            text += '<option value="__month__">__month__</option>';
            text += '<option value="__month_initial__">__month_initial__</option>';
            text += '<option value="__token__">__token__</option>';            
            text += '</select>';

            text += '<select class="headerv gqb form-control" name="quer_headerValue[]" required>';
            text += '<option value="">Value</option>';
            text += '<option value="__date__">__date__</option>';
            text += '<option value="__start_date__">__start_date__</option>';
            text += '<option value="__end_date__">__end_date__</option>';
            text += '<option value="__year__">__year__</option>';
            text += '<option value="__month__">__month__</option>';
            text += '<option value="__month_initial__">__month_initial__</option>';
            text += '<option value="__token__">__token__</option>'; 
            text += '</select>'; 
            text += '<input type="button" id="removeParamKeyValue" value="X" class="x_button btn-danger"/></div>';
        $("#headerElement").append(text);
    })

    


    // ------------- REmove Button Query ------------------------
    $(document).on("click", "#removeParamKeyValue", function() {
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

    $(document).on("click", "#generate_param", function() {
        var query_k = [];
        var query_v = [];
        var query_c = [];
        $.each($(".paramk option:selected, input[id='freeNumber']"), function() {
            query_k.push($(this).val());
        });
        $.each($(".paramv option:selected, input[id='freeNumber']"), function() {
            query_v.push($(this).val());
        });

        var i;
        var obj = {};
        for (i = 0; i < query_k.length; i++) {
            
            obj[query_k[i]] = query_v[i];
        }

        var param = JSON.stringify(obj)
        $("#param").attr('value', param);
        
    });

    $(document).on("click", "#equation_clear", function() {
        var rl = $("#equation").val();
        if (rl) {
            $("#equation").attr('value', '');
            //alert("Equation Clear Successfully.");
        }
    });

    $(document).on("click", "#generate_header", function() {
        var query_k = [];
        var query_v = [];
        $.each($(".headerk option:selected, input[id='freeNumber']"), function() {
            query_k.push($(this).val());
        });
        $.each($(".headerv option:selected, input[id='freeNumber']"), function() {
            query_v.push($(this).val());
        });

        var i;
        var obj = {};
        for (i = 0; i < query_k.length; i++) {
            
            obj[query_k[i]] = query_v[i];
        }

        var header = JSON.stringify(obj)
        $("#header").attr('value', header);
        
    });


    $(document).on("click", "#generate_alter_obj", function() {
        var query_k = [];
        var query_v = [];
        var length_k = $('.alterk').length;

        for (i = 0; i < length_k; i++) { 
            //Push each element to the array
            query_k.push($('.alterk').eq(i).val());
        }

        for (i = 0; i < length_k; i++) { 
            //Push each element to the array
            query_v.push($('.alterv').eq(i).val());
        }

        var i;
        var obj = {};
        var arr = [];
        for (i = 0; i < query_k.length; i++) {
            
            obj[query_k[i]] = query_v[i];
            arr.push([query_k[i], query_v[i]])
        }

        var alter_obj = JSON.stringify(obj)
        var alter_arr = JSON.stringify(arr)
        $("#alter_obj").attr('value', alter_arr);
        
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

    $(document).on("change", "#param_check", function(e) {
        var param_check = $(this).is(':checked');
        if(param_check == true){
            document.getElementById("equation_panel").style.removeProperty( 'display' );
        }else{
            document.getElementById("equation_panel").style.display = "none";
        }
    });

    $(document).on("change", "#header_check", function(e) {
        var param_check = $(this).is(':checked');
        if(param_check == true){
            document.getElementById("header_panel").style.removeProperty( 'display' );
        }else{
            document.getElementById("header_panel").style.display = "none";
        }
    });

    
});



function getIndicator(sel)
{
    var indiacator =sel.value;
    var indiacator_name = $( "#indicator option:selected" ).text();
    //alert(indiacator);
    if(indiacator != 0){
        var rules =$('#indicator_rules').val();
        $('#indicator_rules').val(rules+indiacator_name);
        $("#indicator").val('0').change();
    }
}

function getOperator(sel)
{
    var operator =sel.value;
    if(operator != 0){
        var rules =$('#indicator_rules').val();
        $('#indicator_rules').val(rules+operator);
        $("#a_opetarot").val('0').change();
    }
}

function getFreeValue(sel)
{
    var freevalue =sel.value;
    //alert(freevalue);

    if(freevalue != 0){
        var rules =$('#indicator_rules').val();
        $('#indicator_rules').val(rules+freevalue);
        $("#free_number").val('').change();
    }
}
</script>
@endpush
@endsection
