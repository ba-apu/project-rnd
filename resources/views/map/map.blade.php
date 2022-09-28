<!-- Map SVG Starts -->
<div class="float-right m-r-50">
	@if($compare)
		@foreach($indecator_lists as $key=>$r)
			@if($key == 0)
				@php $indicator_1_color="violet"; $indicator_1_id=$r->id; @endphp
				<span><i class="btn btn-primary btn-sm"></i> {{($r->short_form)?$r->short_form:$r->bangla_name}} </span>
			@elseif($key == 1)
				@php $indicator_2_color="blue"; $indicator_2_id=$r->id; @endphp
				<span><i class="btn btn-info btn-sm"></i> {{($r->short_form)?$r->short_form:$r->bangla_name}} </span>
			@endif
		@endforeach
		<span><i class="btn btn-success btn-sm"></i> উভয়ের ডাটা আছে </span>
		<span><i class="btn btn-danger btn-sm"></i> কারো  ডাটা নেই </span>
	@else
		<span><i class="btn btn-warning btn-sm"></i> ডাটা আছে  </span>
		<span><i class="btn btn-danger btn-sm"></i> ডাটা নেই </span>
	@endif
</div>
<div class="main-map">

	<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
		 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		 viewBox="0 0 800 1000"
		 style="enable-background:new 0 0 1500 1000;"
		 xml:space="preserve">
    <path class="st0" d="M192.8,489.1c-0.7,0-1.4,0-2.1,0"></path>
		@foreach($districts as $district)
			@if($has_upazila)<a href="#" @if(isset($data[$district->bbscode])) onclick="map_drill_down('{{ $district->bbscode }}','{{ $district->name }}',{{$indicator_id}})" @endif >@endif
				<g id="dist_324">
					@if($compare)
						<path class="
						@if(isset($data[$district->bbscode][$indicator_1_id]) && isset($data[$district->bbscode][$indicator_2_id]))
								map-fill-both
@elseif(isset($data[$district->bbscode][$indicator_1_id]))
								map-fill-violet
@elseif(isset($data[$district->bbscode][$indicator_2_id]))
								map-fill-blue
@else
								map-fill-red
@endif "
							  d="{{$district->map_path_new}}"></path>
					@else
						<path class="@if(isset($data[$district->bbscode])) st0 @else map-fill-red @endif " d="{{$district->map_path_new}}"></path>
					@endif
					<text transform="matrix({{$district->map_text_transform}})"
						  class="st1 st2">{{$district->name}}
					</text>

				</g>
			</a>
			@endforeach
</svg>

</div>
<!-- Map SVG Ends -->
