@extends('layout.frontend')
@section('content')
	<div class="container-fluid m-t-20 m-b-20">
		<div class="card-block bg-white">

			@foreach($data as $indicator_id=>$r)
				<table id="at-glance" class="at-glance table table-striped table-bordered" style="border-collapse:collapse;">
					<thead class="bg-primary">
					<tr>
						<th colspan="3"  style="padding: 10px 8px !important; color: #fff;">{{ $indicator_lists[$indicator_id] }}</th>
					</tr>
					<tr  class="" style="">
						<th style="padding: 10px 8px !important; color: #fff;">তারিখ</th>
						<th style="padding: 10px 8px !important; color: #fff;">ডাটা</th>
						<th style="padding: 10px 8px !important; color: #fff;">টার্গেট ডাটা</th>
					</tr>
					</thead>
					<tbody>
					@foreach($r as $date=>$r2)
						<tr>
							<td>{{ $date }}</td>
							<td>{{ $r2['data'] }}</td>
							<td>{{ $r2['target_data'] }}</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			@endforeach
			<form method="post" class="text-right m-t-10">
				@csrf
				<input type="hidden" name="confirm_screen" value="1">
				<input type="hidden" name="project" value="{{ $project->id }}">
				<a href="{{ url("dashboard/import/import-manual-indicator-csv") }}" class="btn btn-primary btn-cons ">বাতিল</a>
				<input type="submit" value="সাবমিট" class="btn btn-primary btn-cons m-r-0">

			</form>
		</div>
	</div>
@endsection