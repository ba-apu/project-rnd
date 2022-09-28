

<div class="progress m-b-10" style="background-color:#f00">
  <div class="progress-color progress-bar" role="progressbar" style="width:{{$data['success_percent'] }}%" aria-valuenow="{{$data['success_percent'] }}"  aria-valuemin="0" aria-valuemax="100">{{$data['success_percent'] }}%</div>
</div>



<table class="report-tbl table table-striped m-b-20">
  <thead>
    <tr>
      <th scope="col">API Data</th>
      <th scope="col">Real Data Status</th>
      <th scope="col">Target Data Status</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach($data['details'] as $key=>$r)
		@if($r['data_process'] == 0)
	<tr>
      <th scope="row">{{$r['name']}}</th>
      <td> @if($r['data']) <i class="fa fa-check" style="color:#8cc63f;" aria-hidden="true"></i> @else <i class="fa fa-times" style="color:#f00;" aria-hidden="true"></i> @endif</td>
      <td> @if($r['target_data']) <i class="fa fa-check" style="color:#8cc63f;" aria-hidden="true"></i> @else <i class="fa fa-times" style="color:#f00;" aria-hidden="true"></i> @endif</td>
    </tr>
		@endif
	@endforeach
  </tbody>
</table>

<table class="report-tbl table table-striped m-b-20">
  <thead>
    <tr>
      <th scope="col">Manual Data</th>
      <th scope="col">Real Data Status</th>
      <th scope="col">Target Data Status</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach($data['details'] as $key=>$r)
		@if($r['data_process'] == 1)
	<tr>
      <th scope="row">{{$r['name']}}</th>
      <td> @if($r['data']) <i class="fa fa-check" style="color:#8cc63f;" aria-hidden="true"></i> @else <i class="fa fa-times" style="color:#f00;" aria-hidden="true"></i> @endif</td>
      <td> @if($r['target_data']) <i class="fa fa-check" style="color:#8cc63f;" aria-hidden="true"></i> @else <i class="fa fa-times" style="color:#f00;" aria-hidden="true"></i> @endif</td>

    </tr>
		@endif
	@endforeach
  </tbody>
</table>

