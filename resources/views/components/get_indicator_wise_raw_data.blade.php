<table id="example" class="table table-striped table-bordered" style="width:100%; border-top:none;">
	<thead class="tbl-pop2">
		<tr aliing="center">
			<th colspan="3">@if($indicator_details->bangla_name != ""){{$indicator_details->bangla_name}}@else{{$indicator_details->name}}@endif</th>
		</tr>
	</thead>
	<thead class="tbl-pop">
		<tr>
			<th>তারিখ</th>
			<th>ডাটা</th>
			{{--<th>টার্গেট ডাটা</th>--}}
		</tr>
	</thead>
	<tbody class="tbl-pop">
		@forelse($data as $r)
		<tr>
			<td>{{english_to_bangla(date('F,Y',strtotime(mongo_date_to_regular_date($r['date']))))}}</td>
			<td>{{english_to_bangla(convert_bdt_format($r['data']))}}</td>
			{{--<td>{{english_to_bangla($r['target_data'])}}</td>--}}
		</tr>
		@empty
		<tr colspan="3">কোনো ডাটা নেই</tr>	
		@endforelse
	</tbody>	
	
</table>