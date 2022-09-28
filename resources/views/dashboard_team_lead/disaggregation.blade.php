<div class="p-2 bg-white panel-with-border mb-3">
    <div class="d-flex">
        <div class="mr-auto pl-3">
            <h4>ব্যবহারকারী</h4>
            <h6 class="text-muted">সর্বশেষ আপডেট : {{$last_operation_date}}</h6>
        </div>
        <div style="margin-top:36px;">
            {{--            <div class="filter-input card">--}}
            {{--                <div class="form-group mb-0">--}}
            {{--                    {!! Form::select('division_filter', $divisions, '', ['placeholder'=>'বিভাগ','class' => 'form-control full-width geo_class','data-init-plugin'=>'select2', 'id' => 'divisions_data'])!!}--}}
            {{--                </div>--}}

            {{--                <div class="form-group mb-0">--}}
            {{--                    {!! Form::select('district_filter', [], '', ['placeholder'=>'জেলা','class' => 'form-control full-width geo_class','data-init-plugin'=>'select2', 'id' => 'districts_data'])!!}--}}
            {{--                </div>--}}

            {{--                <div class="form-group mb-0">--}}
            {{--                    {!! Form::select('upazila_filter', [], '', ['placeholder'=>'উপজেলা','class' => 'form-control full-width geo_class','data-init-plugin'=>'select2', 'id' => 'upazilas_data'])!!}--}}
            {{--                </div>--}}
            {{--            </div>--}}

            <div class="filter-input filter-buttons mb-0 ml-3">
                <div class="btn-group btn-group-md flex-wrap" data-toggle="buttons">
                    @foreach($disag_indicator_lists as $key=>$disag_data)
                        <label class="btn btn-default user_section @if($key==0) active @endif"
                               onclick="user_tab_trigger('{{$disag_data->indicator_user_category}}')">
                            <input type="radio" name="user_section" id="{{$disag_data->indicator_user_category}}"
                                   value="{{$disag_data->indicator_user_category}}">{{$disag_data->bangla_name}}
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="filter-input card m-0 ml-4">
                <form class="form-inline">
                    <div class="form-group">
                        <label class="text-black" for="indicator_list_drop">তারিখ</label>
                        <div id="user_section_date_div" data-provide="datepicker" class="input-group date">
                            <input type="text" id="user_section_date" style="height: 30px !important;"
                                   name="user_section_date"
                                   class="form-control" value="{{$date}}"
                                   autocomplete="off" required><span class="input-group-addon"><i
                                        class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card-block bg-white p-0">
        <div class="row m-t-3">
            <div class="col-6 row text-center">
                <div class="col-12 mt-3">
                    <span class="fs-15 m-b-5 fs-20" id="dis_main_name" style="color:green;"></span>
                    <p class="m-0 mt-2 fs-18" style="color:green;" id="dis_main_val"></p>
                </div>
                <div class="col-12 d-flex flex-row mt-3">
                    <div class="p-0 w-50" style="color:#0d2a9f!important;">
                        <svg id="Group_554" data-name="Group 554" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 174.553 299.999" style="height:150px;">
                            <defs>
                                <filter id="fillpartial_male" primitiveUnits="objectBoundingBox" x="0%" y="0%"
                                        width="100%" height="100%">
                                    <feFlood x="0%" y="0%" width="100%" height="100%" flood-color="#092A9F"></feFlood>
                                    <feOffset id="male_offset" dy="0.41">
                                        <animate id="male_percentage" attributeName="dy" from="1" to="0.41"
                                                 dur="3s"></animate>
                                    </feOffset>
                                    <feComposite operator="in" in2="SourceGraphic"></feComposite>
                                    <feComposite operator="over" in2="SourceGraphic"></feComposite>
                                </filter>
                            </defs>
                            <path id="male" filter="url(#fillpartial_male)"
                                  d="M174.551,114.538v70.906a16.366,16.366,0,1,1-32.732,0v-59.99H130.91V280.908a19.044,19.044,0,0,1-32.557,13.466,18.373,18.373,0,0,1-5.625-13.466V201.819H81.82v79.089A19.205,19.205,0,0,1,62.729,300a19.205,19.205,0,0,1-19.091-19.091V125.454H32.73v60a15.782,15.782,0,0,1-4.775,11.591,15.782,15.782,0,0,1-11.591,4.775,15.782,15.782,0,0,1-11.591-4.775A15.782,15.782,0,0,1,0,185.453V114.538A31.578,31.578,0,0,1,9.539,91.355a31.517,31.517,0,0,1,23.183-9.541H141.81a32.577,32.577,0,0,1,32.724,32.724ZM125.469,38.182A36.8,36.8,0,0,1,114.3,65.2,36.8,36.8,0,0,1,87.287,76.364,36.8,36.8,0,0,1,60.271,65.2,36.8,36.8,0,0,1,49.1,38.182,36.8,36.8,0,0,1,60.271,11.166,36.8,36.8,0,0,1,87.287,0,36.8,36.8,0,0,1,114.3,11.166,36.8,36.8,0,0,1,125.469,38.182Z"
                                  transform="translate(0.002 0)" fill="#cfdafb"></path>
                            <path id="Path_459" data-name="Path 459"
                                  d="M328.946,216.07l3.448-.015-.049-11.528-11.481-.1-.029,3.448,5.67.048-4.783,4.783a12.413,12.413,0,1,0,2.558,2.318l4.644-4.644ZM314.77,231.9a8.94,8.94,0,1,1,8.94-8.94A8.95,8.95,0,0,1,314.77,231.9Z"
                                  transform="translate(-302.382 -194.345)" fill="#092A9F"></path>
                        </svg>
                        <p class="fs-16 mt-3">পুরুষ</p>
                        <p id="dis_male_val" class="fs-17"></p>
                        <p id="m_percentage" class="fs-18"></p>
                    </div>
                    <div class="p-0 w-50" style="color:#f647a6!important;">
                        <svg id="Group_554" data-name="Group 554" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 174.553 299.999"
                             style="height:150px;">
                            <defs>
                                <filter id="fillpartial_female" primitiveUnits="objectBoundingBox" x="0%" y="0%"
                                        width="100%"
                                        height="100%">
                                    <feFlood x="0%" y="0%" width="100%" height="100%" flood-color="#F646A6"/>
                                    <feOffset id="female_offset" dy="">
                                        <animate id="female_percentage" attributeName="dy" from="1" to="" dur="3s"/>
                                    </feOffset>
                                    <feComposite operator="in" in2="SourceGraphic"/>
                                    <feComposite operator="over" in2="SourceGraphic"/>
                                </filter>
                            </defs>
                            <path class="" id="female" filter="url(#fillpartial_female)" d="M100.5,0.2c1.5-0.2,3-0.3,4.5-0.3h2.2c0.5,0,1.1,0,1.7,0.1h0.2c8.6,0.7,16.7,4.5,22.7,10.8
	c7.1,6.9,11,16.3,10.8,26.1c0.1,9.8-3.8,19.3-10.8,26.1c-6.9,7.1-16.3,11-26.1,10.8c-9.8,0.2-19.3-3.8-26.2-10.8
	c-7-6.8-11-16.3-10.8-26.1c-0.2-9.8,3.7-19.3,10.8-26.2C84.9,5.2,92,1.5,99.6,0.4L100.5,0.2z M192.9,136.7l-26.6-39.9
	c-4.9-7.2-10.5-12.2-16.6-15c-3.9-1.8-8.1-2.7-12.4-2.6H73.9c-4.3,0-8.5,0.9-12.4,2.6c-6.2,2.8-11.7,7.8-16.6,15l-26.5,39.8
	L2.6,160.1c-1.7,2.6-2.7,5.6-2.6,8.8c-0.1,4.2,1.6,8.3,4.6,11.2c2.9,3,7,4.7,11.2,4.6c0.8,0,1.7,0,2.5-0.1c4.4-0.6,8.3-3.2,10.7-7
	l22-33.1l11-16.3l4.5-6.8h7.4v21.8L62,163l-10.9,18.2L39,201.3l-5.8,9.7c-1,1.6-1.5,3.5-1.5,5.5c0.1,5.8,4.8,10.5,10.6,10.5H62v53.9
	c0,10.5,8.5,19.1,19.1,19.1c10.5,0,19.1-8.6,19.1-19.1V227h10.9v53.9c-0.1,5.1,2,10,5.6,13.5c7.3,7.5,19.4,7.6,26.9,0.3
	c3.7-3.6,5.7-8.6,5.7-13.7V227H169c5.8-0.1,10.5-4.8,10.5-10.5c0-1.9-0.5-3.8-1.5-5.5l-5.9-9.8l-12-19.9l-10.9-18.1l-12-19.9v-21.8
	h7.4l4.6,6.9l10.9,16.4l22,33c2.8,4.5,7.8,7.3,13.2,7.1h0.1c8.7,0,15.7-7.1,15.7-15.8c0-3.1-0.9-6.1-2.6-8.7L192.9,136.7z"
                                  fill="#fbd6ea"></path>
                            <path d="M45.5,32.3c0-4.9-4-8.9-8.9-8.9c-0.4,0-0.8,0-1.2,0.1c-4.4,0.6-7.7,4.3-7.7,8.8c0,4.3,3,7.8,7.1,8.7v5.7h-4
		v3.5h4v3.5h3.5v-3.5h4v-3.5h-4V41C42.5,40.2,45.5,36.6,45.5,32.3z M36.7,37.6c-2.9,0-5.3-2.4-5.3-5.3c0-2.9,2.4-5.3,5.3-5.3
		c2.9,0,5.3,2.4,5.3,5.3C42,35.2,39.6,37.6,36.7,37.6z" fill="#F646A6"></path>
                        </svg>
                        <p class="fs-16 mt-3">নারী</p>
                        <p id="dis_female_val" class="fs-17"></p>
                        <p id="f_percentage" class="fs-18"></p>
                    </div>
                    <div class="p-0 w-50" style="color:#eda20d!important;">
                        <svg id="Group_554" data-name="Group 554" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 174.553 299.999"
                             style="height:150px;">
                            <defs>
                                <filter id="fillpartial_others" primitiveUnits="objectBoundingBox" x="0%" y="0%"
                                        width="100%"
                                        height="100%">
                                    <feFlood x="0%" y="0%" width="100%" height="100%" flood-color="#eda209"/>
                                    <feOffset id="others_offset" dy="">
                                        <animate id="others_percentage" attributeName="dy" from="1" to="" dur="3s"/>
                                    </feOffset>
                                    <feComposite operator="in" in2="SourceGraphic"/>
                                    <feComposite operator="over" in2="SourceGraphic"/>
                                </filter>
                            </defs>
                            <path class="" id="others" filter="url(#fillpartial_others)" d="M190.2,164.4L174.6,141l0,0L148,101.1c-4.9-7.2-10.5-12.2-16.6-15c-3.9-1.8-8.1-2.7-12.4-2.7
	H32.7c-8.7-0.2-17.1,3.3-23.2,9.7c-6.3,6.2-9.7,14.7-9.5,23.5v71.8c0,0.2,0,0.4,0,0.6c0.1,4.2,1.8,8.2,4.8,11.2
	c3,3.2,7.2,4.9,11.6,4.8c1.8,0,3.5-0.2,5.2-0.8c2.4-0.8,4.6-2.2,6.4-4c3.1-3.1,4.9-7.3,4.8-11.7v-60.8h10.9V285c0,0.7,0,1.5,0.1,2.2
	c0,0.3,0.1,0.6,0.1,0.8v0.2c0,0.3,0.1,0.6,0.2,0.9l0.1,0.5c0.1,0.3,0.2,0.6,0.2,0.9c0.9,3.2,2.7,6.1,5.1,8.4c0.3,0.3,0.6,0.6,1,0.9
	c0.3,0.3,0.7,0.6,1.1,0.8s0.5,0.4,0.7,0.5c0.6,0.4,1.2,0.7,1.8,1l0.7,0.3c0.3,0.1,0.6,0.3,1,0.4h0.1c0.3,0.1,0.6,0.2,1,0.4l0.7,0.2
	c0.5,0.1,1,0.3,1.4,0.4l0.9,0.2l0.7,0.1c0.7,0.1,1.5,0.2,2.2,0.1c10.5-0.1,19-8.6,19.1-19.1v-53.9h10.8V285c0,0.8,0,1.6,0.1,2.3
	c0,0.3,0.1,0.5,0.1,0.8s0.1,0.5,0.1,0.8l0.2,0.7c0,0.2,0.1,0.4,0.2,0.6c0.9,3.2,2.6,6.1,5,8.4c1,1,2,1.8,3.2,2.5
	c0.5,0.3,0.9,0.6,1.4,0.8l0.7,0.4l0.8,0.4l0.8,0.3c0.3,0.1,0.7,0.2,1,0.3s0.7,0.2,1,0.3l0.6,0.1h0.1l0.3,0.1l0.5,0.1l0.5,0.1
	l0.7,0.1c0.2,0,0.4,0,0.7,0h0.4h0.8c0.7,0,1.3,0,2-0.1s1.2-0.2,1.8-0.3l0.9-0.2l0.8-0.2c8.1-2.4,13.7-9.8,13.7-18.3v-53.9h19.7
	c5.8-0.1,10.5-4.8,10.6-10.6c0-1.9-0.5-3.8-1.5-5.4l-5.9-9.8L153,204l-11.1-18.5v-0.1L131,167.4v-0.1l-12-19.9v-21.8h7.4l4.5,6.8
	v0.1l10.9,16.3l0,0l22,33c2.4,3.8,6.3,6.4,10.7,7l0,0c0.8,0.1,1.6,0.2,2.4,0.1h0.1c8.7,0,15.7-7.1,15.7-15.8
	C192.8,170.1,191.9,167,190.2,164.4z M87.3,76.4c10.2,0.2,19.9-3.9,27-11.2c7.3-7.1,11.3-16.8,11.2-27c0.2-10.2-3.9-19.9-11.2-27
	C108.1,4.8,99.8,0.9,91,0.1c-0.2,0-0.5,0-0.7,0c-0.4,0-0.8,0-1.1-0.1c-0.6,0-1.2,0-1.9,0h-0.6l-1.1,0c-0.3,0-0.6,0-0.8,0
	c-0.2,0-0.4,0-0.7,0c-0.3,0-0.5,0-0.8,0.1l-1,0.1l-0.9,0.2c-8,1.2-15.4,5-21.1,10.8C53,18.2,48.9,28,49.1,38.2
	c-0.2,10.2,3.9,19.9,11.2,27C67.3,72.5,77.1,76.5,87.3,76.4z" fill="#ffecc5"></path>
                            <path d="M35.8,26.2l3,0l0-10l-10-0.1l0,3l4.9,0l-4.1,4.1c-1.7-1.2-3.8-1.9-6-1.9c-5.9,0-10.7,4.8-10.7,10.7
	c0,5.4,4,9.9,9.2,10.6V48h-3.4v3H22v2.9h3V51h3.4v-3H25v-5.2c5.2-0.7,9.2-5.2,9.2-10.6c0-2.6-0.9-5-2.5-6.9l4-4L35.8,26.2z
	 M23.5,39.9c-4.3,0-7.7-3.5-7.7-7.7c0-4.3,3.5-7.7,7.7-7.7s7.7,3.5,7.7,7.7C31.3,36.5,27.8,39.9,23.5,39.9z"
                                  fill="#eda209"></path>
                        </svg>
                        <p class="fs-16 mt-3">অন্যান্য </p>
                        <p class="fs-17" id="dis_others_val"></p>
                        <p class="fs-18" id="o_percentage"></p>
                    </div>
                </div>
            </div>

            <div class="col-6 occupation_div" style="display:none;">
                <div class="bg-white" id="container"></div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $("#user_section_date_div").datepicker({
                format: "yyyy-mm-dd",
            }).on('changeDate', function () {
                let indicator_user_category = $('.active input[name=user_section]').val();
                $('.datepicker-dropdown').css('display', 'none');

                make_disaggrigation(indicator_user_category);
            });
        });


        function user_tab_trigger(indicator_user_category) {
            make_disaggrigation(indicator_user_category);
        }

        function make_disaggrigation(indicator_user_category) {

            const [division_bbs_code, district_bbs_code, upazila_bbs_code, geo_name] = getSelectedGeoAndBbsCode();
            let date = $("#user_section_date").val();

            $.ajax({
                url: "{{ url('ajax/get-disaggrigation-data/') }}",
                type: "get",
                dataType: "json",
                data: {
                    "project_id": '{{ $project->id }}',
                    'indicator_user_category': indicator_user_category,
                    'date': date,
                    'geo_name': geo_name,
                    'division_bbs_code': division_bbs_code,
                    'district_bbs_code': district_bbs_code,
                    'upazila_bbs_code': upazila_bbs_code
                },
                success: function (response) {
                    var main_name = "মোট ব্যবহারকারী";
                    var main_val = 0;
                    var main_unit = "জন";

                    var male_name = "পুরুষ";
                    var male_val = 0;
                    var male_pval = 0;
                    var male_percentage = 0;
                    var male_unit = "জন";

                    var female_name = "নারী";
                    var female_val = 0;
                    var female_pval = 0;
                    var female_percentage = 0;
                    var female_unit = "জন";

                    var others_name = "অন্যান্য";
                    var others_val = 0;
                    var others_pval = 0;
                    var others_percentage = 0;
                    var others_unit = "জন";

                    $.each(response, function (i, item) {
                        if (i == 'main') {
                            if (item.value) {
                                main_name = item.name;
                                main_val = item.value;
                            }
                            main_unit = item.unit;
                        }
                        if (i == 'male') {
                            if (item.value) {
                                male_name = item.name;
                                male_val = item.value;
                                male_pval = item.pvalue;
                                male_percentage = item.percentage;
                            }
                            male_unit = item.unit;
                        }
                        if (i == 'female') {
                            if (item.value) {
                                female_name = item.name;
                                female_val = item.value;
                                female_pval = item.pvalue;
                                female_percentage = item.percentage;
                            }
                            female_unit = item.unit;
                        }
                        if (i == 'others') {
                            if (item.value) {
                                others_name = item.name;
                                others_val = item.value;
                                others_pval = item.pvalue;
                                others_percentage = item.percentage;
                            }
                            others_unit = item.unit;
                        }
                    });

                    $("#dis_main_name").html(main_name);
                    $("#dis_main_val").html(main_val + " " + main_unit);

                    $("#dis_male_name").html(male_name);
                    $("#dis_male_val").html(male_val + " " + male_unit);

                    $("#dis_female_name").html(female_name);
                    $("#dis_female_val").html(female_val + " " + female_unit);

                    $("#dis_others_name").html(others_name);
                    $("#dis_others_val").html(others_val + " " + others_unit);

                    $("#m_percentage").html(male_percentage + "%");
                    $("#f_percentage").html(female_percentage + "%");
                    $("#o_percentage").html(others_percentage + "%");

                    $("#male_percentage").attr("to", (1 - (male_pval / 100)).toFixed(2));
                    $("#male_offset").attr("dy", (1 - (male_pval / 100)).toFixed(2));

                    $("#female_percentage").attr("to", (1 - (female_pval / 100)).toFixed(2));
                    $("#female_offset").attr("dy", (1 - (female_pval / 100)).toFixed(2));

                    $("#others_percentage").attr("to", (1 - (others_pval / 100)).toFixed(2));
                    $("#others_offset").attr("dy", (1 - (others_pval / 100)).toFixed(2));

                    // $('#user_section_date').val("").datepicker("update");
                    $("#user_section_date").val(date);

                    occupational_chart(indicator_user_category, date, geo_name, division_bbs_code, district_bbs_code, upazila_bbs_code);
                },
                error: function (xhr) {

                }
            });
        }

        function occupational_chart(indicator_user_category, date = '', geo_name = '', division_bbs_code = '', district_bbs_code = '', upazila_bbs_code = '') {
            $.ajax({
                url: "{{ url('ajax/get-occupational-data/') }}",
                data: {
                    "project_id": '{{$project->id}}',
                    "date": date,
                    "indicator_user_category": indicator_user_category,
                    "geo_type": '{{$geo_type}}',
                    "geo_name": geo_name,
                    "division_bbs_code": division_bbs_code,
                    "district_bbs_code": district_bbs_code,
                    "upazila_bbs_code": upazila_bbs_code
                },
                success: function (response) {

                    if(response.data.length !== 0){
                        $(".occupation_div").show();

                        let occupation = [];
                        let total_value = [];
                        let male = [];
                        let female = [];
                        let others = [];
                        let j = 0;

                        $.each(response.occupation_percentage, function (index, item) {
                            occupation[j] = index;
                            total_value[j] = item;
                            j++;
                        });
                        // occupational_doughnut(occupation, total_value);

                        let i = 0;
                        $.each(response.data, function (index, item) {
                            occupation[i] = index;
                            male[i] = item.male;
                            female[i] = item.female;
                            others[i] = item.others;
                            i++;
                        });
                        occupational_bar(occupation, male, female, others);
                    } else {
                        $(".occupation_div").hide();
                    }
                },
                error: function (xhr) {
                    //Do Something to handle error
                }
            });
        }

        let doughnutChart = '';

        function occupational_doughnut(occupation, total_value) {
            const colors = [];
            for (let i = 0; i <= occupation.length; i++) {
                colors.push('#' + (0x1000000 + Math.random() * 0xffffff).toString(16).substr(1, 6));
            }

            const config = {
                type: 'doughnut',
                data: {
                    labels: occupation,
                    datasets: [{
                        label: "",
                        data: total_value,
                        backgroundColor: colors,
                        borderColor: colors,
                        borderWidth: 1
                    }]
                },
                options: {
                    title: {
                        display: false,
                        text: ""
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    cutoutPercentage: 50,
                    legend: {
                        display: false
                    }
                    // legend: {
                    //     position: 'right',
                    //     labels: {
                    //         boxWidth: 10,
                    //         padding: 12
                    //     }
                    // }
                }
            };

            if (doughnutChart) doughnutChart.destroy(); //destroy prev chart instance
            const ctx = document.getElementById("doughnut-chart").getContext("2d");
            doughnutChart = new Chart(ctx, config);
        }

        function occupational_bar(occupation, male, female, others) {
            Highcharts.chart('container', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: null,
                    display: false
                },
                xAxis: {
                    categories: occupation
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: null,
                        display: false
                    }
                },
                legend: {
                    reversed: true
                },
                plotOptions: {
                    series: {
                        stacking: 'normal'
                    }
                },
                exporting: {
                    menuItemDefinitions: {
                        // Custom definition
                    },
                    buttons: {
                        contextButton: {
                            // menuItems: ['downloadXLS', 'downloadCSV', 'downloadPDF', 'downloadPNG', 'downloadSVG', 'separator', 'label']
                            menuItems: ['downloadXLS', 'downloadCSV', 'downloadPDF', 'downloadPNG', 'downloadJPEG', 'downloadSVG', 'viewFullscreen']
                        }
                    },
                    chartOptions: { // specific options for the exported image
                        plotOptions: {
                            series: {
                                dataLabels: {
                                    enabled: true,
                                }
                            }
                        }
                    },
                    filename: "occupational_chart"
                },
                series: [{
                    name: 'Male',
                    color: '#0d2a9f',
                    data: male
                }, {
                    name: 'Female',
                    color: '#f647a6',
                    data: female
                }, {
                    name: 'Others',
                    color: '#efc56f',
                    data: others
                }]
            });
        }
    </script>
@endpush
