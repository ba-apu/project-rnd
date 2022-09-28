@extends('layout.frontend')
@section('content')
    <div class="col-md-12 form-group text-center m-t-15">

		<select class="custom-select" name="project_id" id="project_id">
			@foreach($projects as $r)
				<option value="{{ $r->id}} " @if($r->id == $project_id)  selected @endif>{{ $r->name }}</option>
			@endforeach
		</select>
	</div>
	<div id="mointoring_section" class="col-md-12"></div>
	<input type="hidden" id="service_id" value="{{ ($project_id != 0)?$project_id:3 }}">
	@push('scripts')
	<script>
	$( document ).ready(function() {
		project_id=$("#service_id").val();
		get_data(project_id);
	});
	$("#project_id").change(function(){ 
		id=$(this).val();
		get_data(id)
		//get_data(){
	});
	function get_data(project_id){
		
		date="{{date('Y-m-d')}}";
		
			$.ajax({
                type: "get",
                url: "{{ url('ajax/get-project-wise-monitoring') }}",
                data: {
                    'project_id': project_id,'date':date
                }
            }).done(function(resp) {
				$("#mointoring_section").html(resp);
            }).fail(function(data){
			  $('#mointoring_section').html(" No data found ");
			});
	
	}
	
	</script>
	@endpush

@endsection