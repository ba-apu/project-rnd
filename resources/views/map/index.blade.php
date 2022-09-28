@extends('layout.frontend')
@section('content')
	<div class="container-fluid p-t-5 p-l-25 p-b-25 p-r-25">
		@include('map.search_portion')
		<div class="" id="top_bar" style="display:none">
			<div class="row">
				<div class="col-md-2">
					<div class="card m-b-10">
						<div class="card-block card-date bg-white">
							@lang('lavel.date') : <span id="top_bar_from_date"></span> হতে  <span id="top_bar_to_date"></span>
						</div>
					</div>
				</div>

				<div class="col-md-5">
					<div class="card m-b-10">
						<div class="card-block card-ind-boxx bg-white d-flex">

							<div class="card-ind-boxx1">
								<div class="boxx1" id="top_bar_first_project_name"></div>
								<div class="boxx2" id="top_bar_first_indicator_name" class="border"></div>
							</div>
							<div class="card-ind-boxx2" id="top_bar_first_indicator_value"></div>

						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="card m-b-10">
						<div class="card-block card-ind-boxx bg-white d-flex" id="second_segemente">

							<div class="card-ind-boxx1">
								<div class="boxx1" id="top_bar_second_project_name"></div>
								<div class="boxx2" id="top_bar_second_indicator_name" class="border"></div>
							</div>

							<div class="card-ind-boxx2" id="top_bar_second_indicator_value"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card bg-white m-t-0" id="chart_container_parent" style="display:none;">
			<div class="card-block bg-white" id="map_table_div">

			</div>
		</div>

	</div>

	<!-- Modal Map-->
	<div class="map-dril modal fill-in" id="mapModal" tabindex="-1" role="dialog" aria-hidden="true">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			<i class="pg-close" style="font-size:25px;"></i>
		</button>
		<div class="col-md-10 offset-1">
			<div class="map-dril-hed modal-header txt-24 text-primary mt-4" id="drill_down_map_data_name"></div>
			<div class="dril-map-body modal-body" id="drill_down_map_data"></div>
			<div class="modal-footer"></div>
		</div>
		<!-- /.modal-content -->
		<!-- /.modal-dialog -->
	</div>
	<!-- Modal -->

@endsection
@push('scripts')
	<script>
		$(document).ready(function(){
			$('#has_compare').change(function(){

				if($(this).prop("checked") == true){
					$("#second_project_selector").show();
					$("#second_indicator_selector").show();
					$("#sorting_div").hide();
				}
				else if($(this).prop("checked") == false){
					$("#second_project_selector").hide();
					$("#second_indicator_selector").hide();
					$("#sorting_div").show();

					$("#indicator_id_2").val("");
					//$("#second_indicator_name").val("");
				}
			});
		});
	</script>
	<script>
		$("#submit").click(function(){
			var first_project=$('#project_id_1');
			var first_indicator=$('#indicator_id_1').val();
			var first_indicator_name=$("#indicator_id_1").children("option").filter(":selected").text();

			var second_project=$('#project_id_2');
			var second_indicator=$('#indicator_id_2').val();
			var second_indicator_name=$("#indicator_id_2").children("option").filter(":selected").text();

			//var from_date=$('#from_date').val();
			//var to_date=$('#top_portion_date').val();

			$("#first_indicator").val(first_indicator);
			$("#first_indicator_name").val(first_indicator_name);

			$("#second_indicator").val(second_indicator);
			$("#second_indicator_name").val(second_indicator_name);


			//if(first_indicator != "" && second_indicator!="")
			if(first_indicator != "" && second_indicator == "")
			{
				map();
			}
			else if(first_indicator != "" && second_indicator != "")
			{
				map_compare();
			}

		});

		$(document).on("change", "#project_id_1", function(e) {
			var project_id = $(this).val();

			$.ajax({
				type: "get",
				url: "{{ url('ajax/get-indicator-list') }}",
				data: {
					'project_id': project_id,
				}
			}).done(function(resp) {

				var txt = '<option value="">@lang('lavel.select_indicator')</option>';
				var resp = JSON.parse(resp);
				//console.log(resp);
				$.each(resp, function(i, item) {
					//alert(i);
					var option_name=(resp[i].short_form)?resp[i].short_form:resp[i].bangla_name;
					txt += '<option value="' + resp[i].id + '">' + option_name +'</option>';
				});
				//alert(txt);
				$('#indicator_id_1').html(txt);
			});
		});

		$(document).on("change", "#project_id_2", function(e) {
			var project_id = $(this).val();

			$.ajax({
				type: "get",
				url: "{{ url('ajax/get-indicator-list') }}",
				data: {
					'project_id': project_id,
				}
			}).done(function(resp) {

				var txt = '<option value="">@lang('lavel.select_indicator')</option>';
				var resp = JSON.parse(resp);
				//console.log(resp);
				$.each(resp, function(i, item) {
					//alert(i);
					var option_name=(resp[i].short_form)?resp[i].short_form:resp[i].bangla_name;
					txt += '<option value="' + resp[i].id + '">' + option_name +'</option>';
				});
				//alert(txt);
				$('#indicator_id_2').html(txt);
			});
		});

		//map show
		function map()
		{
			has_upazila=1;
			project_id=$('#project_id_1').val();
			indicator_id=$('#indicator_id_1').val();
			date=$('#top_portion_date_val').val();
			sorting=$("#sorting").val();
			$.ajax({
				//async : false,
				url: "{{ url('ajax/get-map-district-wise-indicator-data/') }}",
				data: {"project_id":project_id,"date":date,"indicator_id":indicator_id,'has_upazila':has_upazila,'for_map_page':1,'sorting':sorting},
				success: function (response) {
					$("#chart_container_parent").show();
					$("#map_table_div").html(response);
				}
			});
		}
		function map_compare()
		{
			has_upazila=1;
			project_id=$('#project_id_1').val();
			indicator_id=$('#indicator_id_1').val();

			project_id_2=$('#project_id_2').val();
			indicator_id_2=$('#indicator_id_2').val();


			date=$('#top_portion_date_val').val();
			sorting='up';
			$.ajax({
				//async : false,
				url: "{{ url('ajax/get-map-district-wise-indicator-data/') }}",
				data: {
					"project_id":project_id,"date":date,"indicator_id":indicator_id,'has_upazila':has_upazila,'for_map_page':1,'sorting':sorting,
					"indicator_id_2":indicator_id_2,'project_id_2':project_id_2
				},
				success: function (response) {
					$("#chart_container_parent").show();
					$("#map_table_div").html(response);

				}
			});
		}
		//compare_graph

	</script>
	<script>
		$(function() {
			$('input[name="daterange"]').daterangepicker({
				opens: 'left'
			}, function(start, end, label) {
				$("#from_date").val(start.format('YYYY-MM-DD'));
				$("#to_date").val(end.format('YYYY-MM-DD'));
			});
		});
	</script>
	<!--map drill down-->
	<script>
		function map_drill_down(geo_id,geo_name,indicator_id)
		{
			var project_id=$("#project_id_1").val();
			var type=3;
			var temp_geo_name='<i class="fa fa-map-o" aria-hidden="true"></i> '+geo_name;
			var date=$('#top_portion_date_val').val();
			$("#drill_down_map_data_name").html(temp_geo_name);

			//call ajax for load data
			$.ajax({
				url: "{{ url('ajax/get-map-drill-down/') }}",
				data: {
					"project_id":project_id,
					"type":type,
					"geo_id":geo_id,
					"indicator_id":indicator_id,
					'map_date':date
				},
				success: function (response) {
					$("#drill_down_map_data").html(response);
				},
				error: function (xhr) {
					$("#drill_down_map_data").html('কোনো ডাটা নেই');
				}
			});

			var size = 'Extera';
			var modalElem = $('#mapModal');
			if (size == "mini") {
				$('#mapModal').modal('show')
			} else {
				$('#mapModal').modal('show')
				if (size == "default") {
					modalElem.children('.modal-dialog').removeClass('modal-lg');
				} else if (size == "full") {
					modalElem.children('.modal-dialog').addClass('modal-lg');
				}
			}
		}
	</script>
	<script type="text/javascript">
		$(function () {
			$.fn.datepicker.defaults.format = "yyyy-mm-dd";
			$('#top_portion_date_val').datepicker({
				minViewMode: "days"
			});
		});
	</script>

@endpush
