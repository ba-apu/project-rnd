@extends('layout.frontend')
@section('content')
    <div class="container-fluid p-t-10 p-l-25 p-b-10 p-r-25">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="p-t-10 p-r-20 p-b-10 p-l-20 card bg-white m-b-0">
                    <div class="row">
                        <div class="col-md-4">
                            {!! Form::select('project_id_for_search', $projects, old('project_id_for_search'),
                            ['placeholder'=>'সহজ অনুসন্ধানের জন্য এখানে উদ্যোগ নির্বাচন করুন','class' => 'form-control
                            full-width','data-init-plugin'=>'select2', 'id' => 'project_id_for_search'])
                            !!}
                        </div>
                        <ul class="p-t-5 col-md-8 color-tex m-b-0 d-inline p-l-0 text-right">
                            <li><i class="color1"></i> ডাটা আছে</li>
                            <li><i class="color2"></i> ডাটা অসম্পূর্ণ</li>
                            <li><i class="color3"></i> ডাটা নেই</li>
                            <li><i class="color4"></i> ডাটা আসবে</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-t-0 p-l-25 p-b-10 p-r-25">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="p-t-20 p-r-20 p-b-10 p-l-20 card bg-white"><span class="moni-title">@lang('lavel.api_indicator')<b
                                class="moni-amo float-right"> {{english_to_bangla($api)}}  @lang('lavel.count')</b></span>

                    <div class="m-t-20 accordion" id="accordionExample">
                        @php $p_c=0; @endphp
                        @forelse($project_lists as $project)
                            @if($p_c == 0)
                                <input type="hidden" id="first_api_indicator" value="{{$project->id}}">
                            @endif
                            <div class="moni-box card m-b-10">
                                <div id="heading_api_{{$project->id}}">
                                    <a class="moni-title2 btn api-project-name"
                                       data-val={{$project->id}} data-toggle="collapse"
                                       data-target="#collapse_api_{{$project->id}}" @if($p_c == 0) aria-expanded=true
                                       @else aria-expanded=false @endif aria-controls="collapseOne">
                                        {{$project->bangla_name}}
                                    </a>
                                </div>

                                <div id="collapse_api_{{$project->id}}" class="collapse @if($p_c == 0) show @endif"
                                     aria-labelledby="heading_api_{{$project->id}}" data-parent="#accordionExample">
                                    <div class="padding-10 body">
                                        <div class="btn-group dropdown dropdown-default" style="float:right;">
                                            <div class="m-b-5 form-group">
                                                <div class="input-group date" id="date_api_{{$project->id}}">
                                                    <input type='text' class="d-none form-control api_box_date"
                                                           data-val={{$project->id}} id="date_api_value_{{$project->id}}"
                                                           value="{{$running_date}}"/>
                                                    <span class="cal-icon input-group-addon"><i class="fa fa-calendar"
                                                                                                aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="api_data_details_{{$project->id}}">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php $p_c++; @endphp
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="p-t-20 p-r-20 p-b-10 p-l-20 card bg-white">
                    <span class="moni-title">@lang('lavel.manual_indicator')<b
                                class="moni-amo float-right">{{english_to_bangla($man)}}  @lang('lavel.count')  </b></span>

                    <div class="m-t-20 accordion" id="accordionExample2">
                        @php $p_c=0; @endphp
                        @forelse($project_lists as $project)
                            @if($p_c == 0)
                                <input type="hidden" id="first_man_indicator" value="{{$project->id}}">
                            @endif
                            <div class="moni-box card m-b-10">
                                <div id="headingOne2">
                                    <a class="moni-title2 btn man-project-name"
                                       data-val={{$project->id}} data-toggle="collapse"
                                       data-target="#collapse_man_{{$project->id}}" @if($p_c == 0) aria-expanded=true
                                       @else aria-expanded=false @endif aria-controls="collapseOne2">
                                        {{$project->bangla_name}}
                                    </a>
                                </div>
                                <div id="collapse_man_{{$project->id}}" class="collapse @if($p_c == 0) show @endif"
                                     aria-labelledby="heading_man_{{$project->id}}" data-parent="#accordionExample2">
                                    <div class="padding-10 body">
                                        <div class="btn-group dropdown dropdown-default" style="float:right;">
                                            <div class="m-b-5 form-group">
                                                <div class="input-group date" id="date_man_{{$project->id}}">
                                                    <input type='text' class="d-none form-control man_box_date"
                                                           data-val={{$project->id}} id="date_man_value_{{$project->id}}"
                                                           value="{{$running_date}}"/>
                                                    <span class="cal-icon input-group-addon"><i class="fa fa-calendar"
                                                                                                aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="man_data_details_{{$project->id}}">

                                        </div>
                                        @if((Auth::user()->role != 1 && isset($user_role_mapping[$project->id]['has_entry_permission']) && $user_role_mapping[$project->id]['has_entry_permission'] == 1) || Auth::user()->role == 1)
                                            <div class="btn_right" style="clear:both;">
                                                <a href="{{ url('dashboard/import/import-manual-indicator-csv') }}"
                                                   class="btn btn-primary btn-cons m-t-10 m-b-10 m-r-0"><i
                                                            class="fa fa-plus"></i> বাল্ক আপলোড </a>
                                                <a href="" class="btn btn-primary btn-cons m-t-10 m-b-10 m-r-0"
                                                   onclick="new_inidicator_create('{{$project->id}}' , document.getElementById('manual_data_entry_div'))"><i
                                                            class="fa fa-plus"></i> নতুন তৈরি </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @php $p_c++; @endphp
                        @empty
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid p-t-5 p-l-25 p-b-25 p-r-25">
        <div class="row" id="manual_data_entry_div">

        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function () {
                //first api project call
                var first_api_indicator = $("#first_api_indicator").val();
                get_api_data(first_api_indicator);

                //second api project call
                var first_man_indicator = $("#first_man_indicator").val();
                get_man_data(first_man_indicator);


            });
        </script>
        <script>
            $(".api-project-name").click(function () {
                var project_id = $(this).attr('data-val');
                if (project_id != "") {
                    get_api_data(project_id);
                }
            });
            $(".man-project-name").click(function () {
                var project_id = $(this).attr('data-val');
                if (project_id != "") {
                    get_man_data(project_id);
                }
            });

        </script>
        <script>
            function get_api_data(project_id, date = "") {
                if (date == "") {
                    var dat_div_id = "#date_api_value_" + project_id;
                    date = $(dat_div_id).val();
                }

                $.ajax({
                    type: "get",
                    url: "{{ url('ajax/get-api-indicator-list') }}",
                    data: {
                        'project_id': project_id, 'date': date
                    }
                }).done(function (resp) {
                    var divst = "#api_data_details_" + project_id;
                    $(divst).html(resp);
                });
            }

            function get_man_data(project_id) {
                var dat_div_id = "#date_man_value_" + project_id;
                date = $(dat_div_id).val();
                $.ajax({
                    type: "get",
                    url: "{{ url('ajax/get-man-indicator-list') }}",
                    data: {
                        'project_id': project_id, 'date': date
                    }
                }).done(function (resp) {
                    var divst = "#man_data_details_" + project_id;
                    $(divst).html(resp);
                });
            }
        </script>
        <script type="text/javascript">
            $(function () {
                @forelse($project_lists as $project)

                    $.fn.datepicker.defaults.format = "yyyy-mm";
                $('#date_api_{{$project->id}}').datepicker({
                    minViewMode: "months"
                });

                $.fn.datepicker.defaults.format = "yyyy-mm";
                $('#date_man_{{$project->id}}').datepicker({
                    minViewMode: "months"
                });
                @empty
                        @endforelse

                    $.fn.datepicker.defaults.format = "mm/yyyy";
                $('#datetimepicker111').datepicker({
                    minViewMode: "months"
                });
            });
        </script>
        <script>
            $(".api_box_date").change(function () {
                var project_id = $(this).attr('data-val');
                if (project_id != "") {
                    get_api_data(project_id);
                }
            })
            $(".man_box_date").change(function () {
                var project_id = $(this).attr('data-val');
                if (project_id != "") {
                    get_man_data(project_id);
                }
            });

            function click_on_month_api_name(project_id, date) {
                //var str = date.slice(1, -1);
                str = "#month_series_api_" + project_id + "_" + date;
                $(str).addClass('act');
                $("#date_api_value_" + project_id).val(date);
                get_api_data(project_id, date);
            }

            function click_on_month_man_name(project_id, date) {
                //var str = date.slice(1, -1);
                str = "#month_series_man_" + project_id + "_" + date;
                $(str).addClass('act');
                $("#date_man_value_" + project_id).val(date);
                get_man_data(project_id);
            }
        </script>
        <script>
            function new_inidicator_create(service_id, target) {
                //alert(divId);
                var dtstr = "#date_man_value_" + service_id;
                date = $(dtstr).val();
                event.preventDefault();
                $.ajax({
                    type: "get",
                    url: "{{ url('ajax/man-indicator-entry') }}",
                    data: {
                        'project_id': service_id, 'date': date
                    }
                }).done(function (resp) {
                    $("#manual_data_entry_div").html(resp);

                    $.fn.datepicker.defaults.format = "yyyy/mm/dd";
                    $('#datetimepicker112').datepicker({
                        minViewMode: "days"
                    });
                });
                // scroll to bottom when user click this button
                var scrollContainer = target;
                do { //find scroll container
                    scrollContainer = scrollContainer.parentNode;
                    if (!scrollContainer) return;
                    scrollContainer.scrollTop += 1;
                } while (scrollContainer.scrollTop == 0);

                var targetY = 0;
                do { //find the top of target relatively to the container
                    if (target == scrollContainer) break;
                    targetY += target.offsetTop;
                } while (target = target.offsetParent);

                scroll = function (c, a, b, i) {
                    i++;
                    if (i > 30) return;
                    c.scrollTop = a + (b - a) / 30 * i;
                    setTimeout(function () {
                        scroll(c, a, b, i);
                    }, 20);
                }
                // start scrolling
                targetY -= 100;
                scroll(scrollContainer, scrollContainer.scrollTop, targetY, 0);

            }
        </script>
        <script>
            function man_entry_form_submit_btn(service_id) {
                event.preventDefault();
                var value = $("#value_" + service_id).val();
                var target_value = $("#target_value_" + service_id).val();
                var date = $("#manual_data_entry_date").val();
                var project_id = $("#manual_data_entry_project_id_" + service_id).val();
                var indicator_id = $("#manual_data_entry_indicator_id_" + service_id).val();
                //var target_value=
                if (value == "") {
                    return false;
                }
                $.ajax({
                    type: "post",
                    url: "{{ url('ajax/post-manual-data') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'project_id': project_id,
                        'date': date,
                        'indicator_id': indicator_id,
                        'value': value,
                        'target_value': target_value
                    }
                }).done(function (resp) {
                    alert('ডাটা সফলভাবে জমা হয়েছে');
                    $("#man_entry_tb_row_" + service_id).hide();
                    get_man_data(service_id);
                });
            }
        </script>
        <script>
            //for search option in top bar
            $("#project_id_for_search").change(function () {
                id = $(this).val();
                var url = "{{ url('monitoring') }}?project_id=" + id;
                window.location = url;
            });
        </script>
        <script>
            //
            function delete_manual_data(man_data_id) {
                event.preventDefault();
                var result = confirm("আপনি কি এই তথ্যটি মুছে ফেলতে চাচ্ছেন ?");
                if (result) {
                    $.ajax({
                        type: "get",
                        url: "{{ url('ajax/delete-manual-data') }}",
                        data: {
                            'id': man_data_id
                        }
                    }).done(function (resp) {
                        if (resp.type) {
                            alert(resp.msg);
                            icon = '<i class="fa fa-times text-danger"></i>';
                            $("#man_data_" + man_data_id).empty();
                            $("#man_target_data_" + man_data_id).empty();
                            $("#man_target_date_" + man_data_id).empty();
                            $("#man_target_delete_" + man_data_id).empty();

                            $("#man_data_" + man_data_id).html(icon);
                            $("#man_target_data_" + man_data_id).html(icon);
                            $("#man_date_" + man_data_id).html(icon);
                            $("#man_target_delete_" + man_data_id).html(icon);
                        } else {
                            alert(resp.msg);
                        }

                    });
                }
            }
        </script>
    @endpush
@endsection

