<div >	
<div class="tbl-header"></div>
<table id="at-glance" class="table" border="1" style="border-collapse:collapse; font-family:'SolaimanLipi'!important;">
	<thead class="thead-dark">
		<th scope="col">id</th>
		<th scope="col">name</th>
		@foreach($months as $m)
		<th scope="col">{{$m}}</th>	
		@endforeach
	</thead>
	<tbody>
		@foreach($indicator_lists as $r)
		<tr>
			<td>{{$r->id}}</td>
			<td>{{($r->short_form)?$r->short_form:$r->bangla_name}}</td>
			@foreach($months as $m)
			<td></td>	
			@endforeach
		</tr>
		<tr>
			<td>{{$r->id}}</td>
			<td>target</td>
			@foreach($months as $m)
			<td></td>	
			@endforeach
		</tr>
			
		@endforeach
	</tbody>
</table>
{{--
<table id="at-glance" class="table" border="1" style="border-collapse:collapse; font-family:'SolaimanLipi'!important;">
  <thead class="thead-dark">
    <tr>
      <th scope="col" rowspan="2">তারিখ</th>
      @foreach($indicator_lists as $indicator_list)
	  <th scope="col" colspan="2">{{ ($indicator_list->short_form)?$indicator_list->short_form:$indicator_list->bangla_name }}</th>
	  @endforeach
    </tr>
	<tr>
		
		@foreach($indicator_lists as $indicator_list)
		  <th scope="col">ডাটা</th>
		  <th scope="col">@lang('lavel.target_data')</th>
		@endforeach
	</tr>
  </thead>
  <tbody>
	@php 
		$current_date=date('Y-m');  
	@endphp
    @while(strtotime($start_date)<= strtotime($current_date))
		<tr>
		  <td>{{ english_to_bangla(date('Y,F',strtotime($current_date))) }}</td>
		  @foreach($indicator_lists as $indicator_list)
		  <td>
			@if(isset($data[$indicator_list->id][$current_date]['data']))
				{{$data[$indicator_list->id][$current_date]['data']}}
			@endif
		  </td>
		  <td>
			@if(isset($data[$indicator_list->id][$current_date]['target_data']))
				{{$data[$indicator_list->id][$current_date]['target_data']}}
			@endif
		  </td>
		  @endforeach
		</tr>
		@php 
			$current_date= date('Y-m',strtotime('-1 months', strtotime($current_date)));
		@endphp
    @endwhile
  </tbody>
</table>
--}}
</div>
<div class="tbl-footer m-t-10" style="text-align:right;">
<a href="#" onclick="excelout()"><i class="fa fa-file-excel-o fa-2x" aria-hidden="true"></i></a>
<!--a href="#"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a-->
<!--a href="#" onclick="printContent('at-glance')"><i class="fa fa-print fa-2x" aria-hidden="true"></i></a-->
</div>