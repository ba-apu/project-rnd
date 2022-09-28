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
                    <h5>@lang('lavel.update_user')</h5>
                    <form action="{{url('dashboard/user/' . $user->id)}}" {{-- class="form-horizontal" --}} role="form"
                          method="POST"
                          data-toggle="validator">
                        @csrf
                        <input name="_method" type="hidden" value="PUT">
                        <input name="redirect_to" type="hidden" value="{{ url()->previous() }}">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-2 control-label">@lang('lavel.name')</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"
                                       value="{{ old('name', $user->name) }}"
                                       required autofocus>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-lg-2 control-label">@lang('lavel.email')</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email', $user->email) }}"
                                       required autofocus>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-2 control-label"> @lang('lavel.mobile')</label>

                            <div class="col-md-6">
                                <input id="mobile_no" type="number" class="form-control" name="mobile_no"
                                       value="{{ old('mobile',$user->mobile_no) }}" required autofocus>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('mobile_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-2 control-label"> @lang('lavel.designation')</label>

                            <div class="col-md-6">
                                <input id="designation" type="text" class="form-control" name="designation"
                                       value="{{ old('designation', $user->designation) }}">
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('designation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
                            <label for="roles" class="col-lg-2 control-label">@lang('lavel.role')</label>

                            <div class="col-md-6">
                                {!! Form::select('roles', $roles, old('roles', $user->role), ['class' =>
                                'form-control full-width', 'data-init-plugin'=>'select2', 'id' => 'roles', 'required' => 'required']) !!}
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('roles'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('roles') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('team') ? ' has-error' : '' }}" id="team_div"
                             style="display:none;">
                            <label for="team" class="col-lg-2 control-label">টিম </label>

                            <div class="col-md-6">
                                {!! Form::select('team', $projectCategory , old('team', $user->team), ['class' =>
                                'form-control full-width', 'data-init-plugin'=>'select2', 'id' => 'team', 'required' => 'required']) !!}
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('team'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('team') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-lg-2 control-label">@lang('lavel.password')</label>
                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="password"
                                       value="{{ old('password') }}"
                                       autofocus>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password_confirmation"
                                   class="col-lg-4 control-label">@lang('lavel.confirm_password')</label>
                            <div class="col-md-6">
                                <input id="password_confirmation" data-match="#password"
                                       data-match-error="Whoops, these don't match"
                                       type="text" class="form-control" name="password_confirmation"
                                       value="{{ old('password_confirmation') }}"
                                       autofocus>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-lg-2 control-label">@lang('lavel.status')</label>

                            <div class="col-md-6">
                                {!! Form::select('status' , ['0' => 'Inactive', '1' => 'Active'], old('status', $user->status), ['class' =>
                                'form-control full-width', 'data-init-plugin'=>'select2', 'id' => 'status', 'required' => 'required']) !!}
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('status'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" id="user_permission_role" style="clear:both;">
                            <div class="col-md-8">
                                <div class="table-responsive">
                                    <table id="role_project"
                                           class="table table-striped table-bordered dt-responsive">
                                        <thead>
                                        <tr>
                                            <th class="text-center">@lang('lavel.project_owner')</th>
                                            <th class="text-center">Data Approve</th>
                                            <th class="text-center">Data Entry</th>
                                            <th class="text-center">Operation</th>
                                            <th class="text-center">#</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @if(count($userRoleMapping) > 0)
                                            <?php $inc = 0; ?>
                                            @foreach($userRoleMapping as $value)
                                                <tr id="newRow{{$inc}}" data-number="{{$inc}}">
                                                    <td>
                                                        {!! Form::select('project_owner['.$inc.']', $project, $value['project_id'] , [ 'class' => 'form-control full-width project_owner',
                                                        'placeholder'=>'Select One', 'id' => 'project_owner_'.$inc]) !!}
                                                    </td>
                                                    <td class="text-center"><input type="checkbox"
                                                                                   name="data_approve[{{$inc}}]" @if(isset($value['has_approve_permission']) && $value['has_approve_permission'] == 1) checked @endif id="data_approve_{{$inc}}"
                                                                                   value="1"></td>
                                                    <td class="text-center"><input type="checkbox" name="data_entry[{{$inc}}]" @if(isset($value['has_entry_permission']) && $value['has_entry_permission'] == 1) checked @endif id="data_entry_{{$inc}}"
                                                                                   value="1"></td>
                                                    <td class="text-center"><input type="checkbox" name="operation[{{$inc}}]" @if(isset($value['has_operation_permission']) && $value['has_operation_permission'] == 1) checked @endif id="operation_{{$inc}}"
                                                                                   value="1"></td>
                                                    <td class="text-center">
                                                        <?php if ($inc == 0) { ?>
                                                        <span class="add_new_span">
                                                        <a class="btn btn-xs btn-success addTableRows"
                                                           onclick="addTableRow('role_project', 'newRow{{$inc}}');"><i
                                                                class="fa fa-plus"></i></a>
                                                        </span>
                                                        <?php } else { ?>
                                                            <span class="add_new_span">
                                                            <a
                                                               class="btn btn-xs addTableRows btn-danger"
                                                               onclick="removeTableRow('role_project','newRow{{$inc}}');">
                                                                <i class="fa fa-times" aria-hidden="true"></i></a>
                                                            </span>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php $inc++; ?>
                                            @endforeach
                                        @else
                                            <tr id="newRow" data-number="0">
                                                <td>
                                                    {!! Form::select('project_owner[0]', $project, old('project_owner'), [ 'class' => 'form-control full-width',
                                                     'placeholder'=>'Select One', 'id' => 'project_owner_0']) !!}
                                                </td>
                                                <td class="text-center"><input type="checkbox"
                                                                               name="data_approve[0]" id="data_approve_0"
                                                                               value="1"></td>
                                                <td class="text-center"><input type="checkbox" name="data_entry[0]" id="data_entry_0"
                                                                               value="1"></td>
                                                <td class="text-center"><input type="checkbox" name="operation[0]" id="operation_0"
                                                                               value="1"></td>
                                                <td class="text-center">
                                                    <span class="add_new_span">
                                                        <a class="btn btn-xs btn-success addTableRows"
                                                           onclick="addTableRow('role_project', 'newRow');"><i
                                                                class="fa fa-plus"></i></a>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-12">
                                <button type="submit" class="btn btn-primary">
                                    @lang('lavel.submit')
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('css_top')
    <link href="{!! asset_url('plugins/dropzone/dist/min/dropzone.min.css') !!}" media="all" rel="stylesheet"
          type="text/css"/>
@endsection

@section('js_top')
    <script type="text/javascript"
            src="{!! asset_url('plugins/dropzone/dist/min/dropzone.min.js') !!}"></script>
    <script type="text/javascript">
        $(function () {
            $(".dropzone").not(".dz-clickable").each(function () {
                var acceptedFiles = $(this).data('accept') || 'image/*';
                var maxFilesize = $(this).data('size') || .5;
                var thumbnailWidth = $(this).data('thumbnail');

                var data = {
                    url: "{{ url('upload-image') }}",
                    uploadMultiple: false,
                    acceptedFiles: acceptedFiles,
                    maxFilesize: maxFilesize,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                };
                if (thumbnailWidth)
                    data.thumbnailWidth = thumbnailWidth;

                $(this).dropzone(data);
                Dropzone.autoDiscover = false;
                Dropzone.forElement(this).on("error", function (file, e, xhr) {
                    var $dropzone = this;
                    $(this.element).find('.dz-error').click(function () {
                        $dropzone.removeFile(file);
                    });
                    setTimeout(function () {
                        $dropzone.removeFile(file);
                    }, 5000);
                });
                Dropzone.forElement(this).on("success", function (file, filename, xhr) {
                    $(this.element).parent().find('.thumbnail').attr('src', "{{ env('APP_URL') . '/' . env('ASSET_PATH') }}" + 'uploads/' + filename);
                    $(this.element).parent().find('.form-control').val(filename);
                    $(file.previewElement).remove();
                });
                Dropzone.forElement(this).on("error", function (file, message) {
                    alert(message);
                    this.removeFile(file);
                });
            });
        });
    </script>
@endsection

@push('scripts')
    <script>
        $(function () {
            $('#roles').trigger('change');
            $('.project_owner').select2();
        });

        $('#roles').on('change', function () {
            let role = $('#roles').val();
            $('#team_div').hide();
            $('#user_permission_role').show();
            if (role == 3) {
                $('#team_div').show()
            }
            if (role == 1 || role == 5) {
                $('#user_permission_role').hide()
            }
        });


        function addTableRow(tableID, templateRow) {
            //rowCount++;
            //Direct Copy a row to many times
            var x = document.getElementById(templateRow).cloneNode(true);
            x.id = "";
            x.style.display = "";
            var rowCount = $('#' + tableID).find('tr').length;
            var lastTr = $('#' + tableID).find('tr').last().attr('data-number');
            if (lastTr != '' && typeof lastTr !== "undefined") {
                rowCount = parseInt(lastTr) + 1;
            }
            //var rowCount = table.rows.length;
            //Increment id
            var rowCo = rowCount;
            var idText = 'rowCount' + rowCount;
            x.id = idText;
            $("#" + tableID).append(x);
            //get select box elements
            var attrSel = $("#" + tableID).find('#' + idText).find('select');
            for (var i = 0; i < attrSel.length; i++) {
                var nameAtt = attrSel[i].name;
                var idAtt = attrSel[i].id;

                //increment all array element name
                var repText = nameAtt.replace('[0]', '[' + rowCo + ']');
                var repTextId = idAtt.replace('_0', '_' + rowCo);
                attrSel[i].name = repText;
                attrSel[i].id = repTextId;
                $('#' + idText).find('.select2-container').remove();
                $('#' + repTextId).select2();
                $('#' + repTextId).val($('#' + repTextId +' option:eq(0)').val()).trigger("change");
            }

            //get input elements
            var attrImput = $("#" + tableID).find('#' + idText).find('input');
            for (var i = 0; i < attrImput.length; i++) {
                var nameAtt = attrImput[i].name;
                var idAtt = attrImput[i].id;
                //increment all array element name
                var repText = nameAtt.replace('[0]', '[' + rowCo + ']');
                var repTextId = idAtt.replace('_0', '_' + rowCo);
                attrImput[i].name = repText;
                attrImput[i].id = repTextId;
                $("#"+repTextId).removeAttr('checked');
            }

            //Class change by btn-danger to btn-primary

            $("#" + tableID).find('#' + idText).find('.addTableRows').removeClass('btn-success').addClass('btn-danger').attr('onclick', 'removeTableRow("' + tableID + '","' + idText + '")');
            $("#" + tableID).find('#' + idText).find('.addTableRows > .fa').removeClass('fa-plus').addClass('fa-times');
            $('#' + idText).last().attr('data-number', rowCount);


        } //********************************* end of addTableRow() **************************************/

        function removeTableRow(tableID, removeNum) {
            $('#' + tableID).find('#' + removeNum).remove();
            // On change currency
            $(".usdConversion").on('change', function () {
                var usdTotal = $('.USDtotal');
                var currencyId = $(this).val();
                var inputedVal = $(this).parent().find('.usdConvertingValue').val();
                var convertedUSD = $(this).parent().find('.convertedUSD');
                var hiddenUSD = $(this).parent().find('.USDhidden');
                if (!currencyId) {
                    convertedUSD.hide();
                } else {
                    var self = $(this);
                    $.ajax({
                        dataType: 'json',
                        type: "GET",
                        url: "<?php echo URL::to('/import-permit/convert-usd/'); ?>",
                        data: {
                            currency_id: currencyId
                        },
                        success: function (response) {
                            var usdVal = response.usd_value;
                            var totalVal = usdVal * inputedVal;
                            var convertedVal = totalVal.toFixed(2);
                            hiddenUSD.val(convertedVal);
                            convertedUSD.html(convertedVal);
                            convertedUSD.show();

                            var total = 0;
                            $('.USDhidden').each(function (i, usd) {
                                if (usd.value == null || usd.value == '') {
                                    usd.value = 0;
                                }
                                var individualUsd = parseFloat(usd.value);
                                total += individualUsd;
                            });

                            usdTotal.val(total);
                        }
                    });
                }
            });
            $('.usdConversion').trigger('change');


            // On blur after typing value
            $(".usdConvertingValue").on('blur', function () {
                var usdTotal = $('.USDtotal');
                var inputedVal = $(this).val();
                var currencyId = $(this).parent().find('.usdConversion').val();
                var convertedUSD = $(this).parent().find('.convertedUSD');
                var hiddenUSD = $(this).parent().find('.USDhidden');
                if (!currencyId) {
                    convertedUSD.hide();
                } else {
                    var self = $(this);
                    $.ajax({
                        dataType: 'json',
                        type: "GET",
                        url: "<?php echo URL::to('/import-permit/convert-usd/'); ?>",
                        data: {
                            currency_id: currencyId
                        },
                        success: function (response) {
                            var usdVal = response.usd_value;
                            var totalVal = usdVal * inputedVal;
                            var convertedVal = totalVal.toFixed(2);
                            hiddenUSD.val(convertedVal);
                            convertedUSD.html(convertedVal);
                            convertedUSD.show();

                            var total = 0;
                            $('.USDhidden').each(function (i, usd) {
                                if (usd.value == null || usd.value == '') {
                                    usd.value = 0;
                                }
                                var individualUsd = parseFloat(usd.value);
                                total += individualUsd;
                            });

                            usdTotal.val(total);
                        }
                    });
                }

            });
            $('.usdConversion').trigger('blur');
        }
    </script>
@endpush
