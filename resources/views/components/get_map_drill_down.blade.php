<div class="row">
    <div class="col-md-8">
        <div class="float-right m-r-50 mt-2" style="position: absolute; right: 0">
            {{--    <span><i class="btn btn-warning btn-sm"></i> ডাটা আছে  </span>--}}
            <div class="d-flex flex-column m-0 p-0">
                {{--                <span class="mt-0" style="font-weight: bold"><i class="btn-sm" style="background-color: {{$division_color}}; filter:brightness(0.5);"></i>&nbsp;≥ ১০০০০০০০</span>--}}
                {{--                <span class="mt-2" style="font-weight: bold"><i class="btn-sm" style="background-color: {{$division_color}}; filter:brightness(1.0);"></i>&nbsp;১০০০০০০ - ৯৯৯৯৯৯৯</span>--}}
                {{--                <span class="mt-2" style="font-weight: bold"><i class="btn-sm" style="background-color: {{$division_color}}; filter:brightness(1.5);"></i>&nbsp;১০০০০০ - ৯৯৯৯৯৯</span>--}}
                {{--                <span class="mt-2" style="font-weight: bold"><i class="btn-sm" style="background-color: {{$division_color}}; filter:brightness(2.0);"></i>&nbsp;১০০০০ - ৯৯৯৯৯</span>--}}
                {{--                <span class="mt-2" style="font-weight: bold"><i class="btn-sm" style="background-color: {{$division_color}}; filter:brightness(2.5);"></i>&nbsp;১০০০ - ৯৯৯৯</span>--}}
                {{--                <span class="mt-2" style="font-weight: bold"><i class="btn-sm" style="background-color: {{$division_color}}; filter:brightness(3.0);"></i>&nbsp;১০০ - ৯৯৯</span>--}}
                {{--                <span class="mt-2" style="font-weight: bold"><i class="btn-sm" style="background-color: {{$division_color}}; filter:brightness(3.5);"></i>&nbsp;০ - ৯৯</span>--}}
                @php
                    $whiteness = 0.5;
                    $count = count($data['range']) - 1;
                @endphp
                @foreach($data['range'] as $key => $range)
                    <span class="mt-2 bold"><i class="btn-sm"
                                               style="background-color: {{$division_color}}; filter:brightness({{$whiteness}});"></i>
                @if($key == $count)
                            &nbsp;≥&nbsp;{{english_to_bangla(bdtFormat($range['start']))}}
                        @else
                            &nbsp;{{english_to_bangla(bdtFormat($range['start']))}}
                            - {{english_to_bangla(bdtFormat($range['end']))}}
                        @endif
                    </span>
                    @php
                        $whiteness += 0.5;
                    @endphp
                @endforeach
                <span class="mt-2" style="font-weight: bold"><i class="btn-sm" style="background-color: #F61908;"></i>&nbsp;ডাটা নেই</span>
            </div>
        </div>
        <div class="map-cen main-map mt-5">
            {{--            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 469.5 450" style="enable-background:new 0 0 800 1000; width:100%;" xml:space="preserve">--}}
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 700 800" style="width:100%;"
                 xml:space="preserve">
                @foreach($upazila as $map_path)
                    <g id="dist_324">
                        <path title="he" class="hover-item"
                              style=" @if(isset($data[$map_path->bbscode]['value']) && $data[$map_path->bbscode]['value'] != 0)
                                  fill: {{$data[$map_path->bbscode]['color']}};
                                  filter:brightness({{$data[$map_path->bbscode]['brightness']}});
                                  stroke: #FFFFFF;
                                  stroke-width: 0.5;
                                  stroke-miterlimit: 10;
                              @else
                                  fill:red
                              @endif" d="{{$map_path->map_path}}"></path>
                        <title>{{$map_path->name}} : @if(isset($data[$map_path->bbscode])) {{ english_to_bangla(bdtFormat($data[$map_path->bbscode]['value']))}} @else 0 @endif {{$indicator->unit}}</title>
                    </g>
                @endforeach
            </svg>
        </div>
    </div>
    <div class="col-md-4">
        <div class="no-padding" id="map_table_div_two">
            <div class="mb-3 padding-10 alert-success">
                <i class="fa fa-building-o" aria-hidden="true"></i>
                {{ ($indicator->short_form)?$indicator->short_form:$indicator->bangla_name }}
            </div>
            @foreach($upazila as $key => $upazila_data)
                <div class="row pb-2">
                    <div class="col-md-4" style="font-size: 18px">
                        {{ $upazila_data->name }}
                    </div>
                    @php
                        $upazila_indicator_value = 0;
                        if(isset($data[$upazila_data->bbscode])) {
                            if($data[$upazila_data->bbscode]['value'] != 0) {
                                $upazila_indicator_value = $data[$upazila_data->bbscode]['value'];
                            }
                        }
                    @endphp
                    {{--                    @php--}}
                    {{--                        $area_minvalue = 0;--}}
                    {{--                        $area_maxvalue = 100;--}}
                    {{--                        if ($upazila_indicator_value > 100 && $upazila_indicator_value < 1000) {--}}
                    {{--                            $area_minvalue = 100;--}}
                    {{--                            $area_maxvalue = 1000;--}}
                    {{--                        } elseif ($upazila_indicator_value > 1000 && $upazila_indicator_value < 10000) {--}}
                    {{--                            $area_minvalue = 1000;--}}
                    {{--                            $area_maxvalue = 10000;--}}
                    {{--                        } elseif ($upazila_indicator_value > 10000 && $upazila_indicator_value < 100000) {--}}
                    {{--                            $area_minvalue = 10000;--}}
                    {{--                            $area_maxvalue = 100000;--}}
                    {{--                        } elseif ($upazila_indicator_value > 100000 && $upazila_indicator_value < 1000000) {--}}
                    {{--                            $area_minvalue = 100000;--}}
                    {{--                            $area_maxvalue = 1000000;--}}
                    {{--                        }--}}
                    {{--                        $area_percentage = floor(($upazila_indicator_value * 100) / $area_maxvalue);--}}
                    {{--                    @endphp--}}

                    <div class="col-md-4">
                        {{--                        <div class="progress">--}}
                        {{--                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $upazila_indicator_value }}" aria-valuemin="{{ $area_minvalue }}" aria-valuemax="{{ $area_maxvalue }}" style="width: {{$area_percentage}}%;">--}}
                        {{--                                <span class="sr-only">{{$area_percentage}}% Complete</span>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>

                    <div class="col-md-4" style="font-size: 18px">
                        @if(empty($upazila_indicator_value))
                            ০ {{$indicator->unit}}
                        @else
                            {{ english_to_bangla(bdtFormat($upazila_indicator_value))}} {{$indicator->unit}}
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
