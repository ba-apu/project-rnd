<!-- Map SVG Starts -->
<div class="float-right m-r-50" style="position: absolute; right: 0">
    {{--    <span><i class="btn btn-warning btn-sm"></i> ডাটা আছে  </span>--}}
    <div class="d-flex flex-column m-0 p-0">
        @php
            $whiteness = 0.5;
            $count = count($data['range']) - 1;
        @endphp
        @foreach($data['range'] as $key => $range)
            <span class="mt-2 bold"><i class="btn-sm" style="background-color: {{$division_color}}; filter:brightness({{$whiteness}});"></i>
                @if($key == $count)
                    &nbsp;≥&nbsp;{{english_to_bangla(bdtFormat($range['start']))}}
                @else
                    &nbsp;{{english_to_bangla(bdtFormat($range['start']))}} - {{english_to_bangla(bdtFormat($range['end']))}}
                @endif
                    </span>
            @php
                $whiteness += 0.5;
            @endphp
        @endforeach
        <span class="mt-2" style="font-weight: bold"><i class="btn-sm" style="background-color: #F61908;"></i>&nbsp;ডাটা নেই</span>
    </div>
</div>
<div class="main-map">
    @if($geo_name == 'upazila')
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             {{--             viewBox="0 0 469.5 450"--}}
             {{--             style="enable-background:new 0 0 800 1000; width:100%;"--}}
             viewBox="0 0 450 800"
             style="width:100%;"
             xml:space="preserve">
            @foreach($map_data as $map_path)
                <g id="dist_324">
                    <path class="hover-item"
                          style="@if(isset($data[$map_path->bbscode]['value']) && $data[$map_path->bbscode]['value'] != 0)
                                  fill: {{$data[$map_path->bbscode]['color']}};
                                  filter:brightness({{$data[$map_path->bbscode]['brightness']}});
                                  stroke: #FFFFFF;
                                  stroke-width: 0.5;
                                  stroke-miterlimit: 10;
                          @else
                                  fill: red;
                          @endif" d="{{$map_path->map_path}}"></path>
                    <title>{{$map_path->name}} : @if(isset($data[$map_path->bbscode])) {{ english_to_bangla(bdtFormat($data[$map_path->bbscode]['value']))}} @else 0 @endif {{$indicator->unit}}</title>
                </g>
            @endforeach
        </svg>
    @elseif($geo_name == 'district')
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 700 800" style="width:100%;"
             xml:space="preserve">
            @foreach($map_data as $map_path)
                <g id="dist_324">
                    <path class="hover-item"
                          style="@if(isset($data[$map_path->bbscode]['value']) && $data[$map_path->bbscode]['value'] != 0)
                                  fill: {{$data[$map_path->bbscode]['color']}};
                                  filter:brightness({{$data[$map_path->bbscode]['brightness']}});
                                  stroke: #FFFFFF;
                                  stroke-width: 0.5;
                                  stroke-miterlimit: 10;
                          @else
                                  fill: red;
                          @endif" d="{{$map_path->map_path}}"></path>
                    <title>{{$map_path->name}} : @if(isset($data[$map_path->bbscode])) {{ english_to_bangla(bdtFormat($data[$map_path->bbscode]['value']))}} @else 0 @endif {{$indicator->unit}}</title>
                </g>
            @endforeach
            </svg>
    @else
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 800 1000"
             style="enable-background:new 0 0 800 1000;"
             xml:space="preserve">
{{--            <path class="st0" d="M192.8,489.1c-0.7,0-1.4,0-2.1,0"></path>--}}.
            @foreach($map_data as $district)
                @if($has_upazila)<a href="#"
                                    @if(isset($data[$district->bbscode])) onclick="map_drill_down('{{$district->bbscode }}','{{ $district->name }}',{{$indicator->id}})" @endif >@endif
                    <g id="dist_324">
                        <path class="hover-item"
                              style="@if(isset($data[$district->bbscode]['value']) && $data[$district->bbscode]['value'] != 0)
                                      fill: {{$data[$district->bbscode]['color']}};
                                      filter:brightness({{$data[$district->bbscode]['brightness']}});
                                      stroke: #FFFFFF;
                                      stroke-width: 0.5;
                                      stroke-miterlimit: 10;
                              @else
                                      fill: red;
                              @endif" d="{{$district->map_path_new}}"></path>
                        <text transform="matrix({{$district->map_text_transform}})"
                              class="st1 st2">{{$district->name}}</text>
                        <title>{{$district->name}} : @if(isset($data[$district->bbscode])) {{ english_to_bangla(bdtFormat($data[$district->bbscode]['value']))}} @else 0 @endif {{$indicator->unit}}</title>
                    </g>
                </a>
                @endforeach
		</svg>
    @endif
</div>
<!-- Map SVG Ends -->
