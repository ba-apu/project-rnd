@extends('layout.frontend')

@push('top_css')
	{{-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}
@endpush

@section('content')
	<div class="content sm-gutter">
		<!-- START BREADCRUMBS -->
		<!--div class="bg-white">
            <div class="container-fluid padding-25 sm-padding-10">
            </div>
        </div-->
		<!-- END BREADCRUMBS -->

		<!-- START CONTAINER FLUID -->
		<div class="container-fluid padding-25">
			<div class="card  bg-white">
				<div class="card-block">

					<div class="qpr-report-dropdown m-b-20">
						<form action="{{url('qpr-report')}}" role="form" method="get" data-toggle="validator">
							@csrf
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
									{!! Form::select('category_id', \App\ProjectCategory::with('projects')->where('status',1)->pluck('name_en', 'id'), old('category_id',$category_id),
									['placeholder'=>'Please Select a team','class' => 'form-control full-width select2-hidden-accessible','data-init-plugin'=>'select2', 'id' => 'category_id', 'required' => 'required'])
									!!}


								</div>
								<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
									<select class="form-control full-width select2-hidden-accessible" data-init-plugin="select2" id="" required="" name="year" tabindex="-1" aria-hidden="true">
										<option value="2019">2019</option>
										<option value="2020">2020</option>
										<option value="2021">2021</option>
										<option value="2022">2022</option>
									</select>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3s">
									<select class="form-control full-width select2-hidden-accessible" data-init-plugin="select2" id="" required="" name="quarter" tabindex="-1" aria-hidden="true">
										<option value="1">1st quarter</option>
										<option value="2">2nd quarter</option>
										<option value="3">3rd quarter</option>
										<option value="4">4th quarter</option>
									</select>
								</div>
								<div class="col-xs-2 col-sm-6 col-md-2 col-lg-2">
									<button class="btn btn-primary btn-cons w-100 m-b-0" type="submit" id="submit">
										<i class="pg-form"></i> Show
									</button>
								</div>
							</div>
						</form>
					</div>

					<div class="edit_show_btn">
						<a href="{{ url('qpr/create') }}"><i class="fa fa-plus"></i> Create</a>
						@if(isset($qpr->id))
							<a href="{{ url('qpr/'.$qpr->id.'/edit') }}"><i class="fa fa-edit"></i> Edit</a>
						@endif
						<a href="#" id="full_screen"><i class="fa fa-expand"></i> </a>
					</div>

					<div class="ajax-content qpr-report" id="main_div">
						<div id="tabs">
							<ul class="tab-list">
								<li class="active"><a href="#tabs-1">Challenges </a></li>
								<li><a href="#tabs-2">Major learnings from last quarter </a></li>
								<li><a href="#tabs-3">Collaboration made in the last quarter </a></li>
								<li><a href="#tabs-4">Resource mobilization </a></li>
								<li><a href="#tabs-5">Resource leveraging </a></li>
								<li><a href="#tabs-6">Major risks of next quarter </a></li>
								<li><a href="#tabs-7">Potential collaboration to reach the target </a></li>
							</ul>

							<div class="tab-box">
								<div id="tabs-1">
									<p><?php  if(isset($qpr->challenge)){ echo $qpr->challenge; } ?></p>
								</div>

								<div id="tabs-2">
									<p><?php if(isset($qpr->major_learnings)){ echo $qpr->major_learnings; } ?></p>
								</div>

								<div id="tabs-3">
									<p><?php if(isset($qpr->collaboration_made)){ echo $qpr->collaboration_made; } ?></p>
								</div>

								<div id="tabs-4">
									<p><?php if(isset($qpr->resource_mobilization)){ echo $qpr->resource_mobilization; } ?> </p>
								</div>

								<div id="tabs-5">
									<p><?php if(isset($qpr->resource_leveraging)){ echo $qpr->resource_leveraging; } ?></p>
								</div>

								<div id="tabs-6">
									<p><?php if(isset($qpr->major_risks)){ echo $qpr->major_risks; } ?></p>
								</div>

								<div id="tabs-7">
									<p><?php if(isset($qpr->Potential_collaboration)){ echo $qpr->Potential_collaboration; } ?> </p>
								</div>
							</div>

							<div class="close-btn d-none w-100 text-right m-t-10">
								<button class="btn btn-sm m-b-0 m-r-0" id="close_full_screen">
									<i class="fa fa-times"></i>
								</button>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('scripts')
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>

		$(document).ready(function(){
			$( function() {
				$( "#tabs" ).tabs();
			} );
		})

	</script>
	<script>
		$(document).ready(function(){
			// table width
			$('.qpr-report table').css('width', '100%');

			// active
			$('.qpr-report .tab-list li').click(function(e){
				e.preventDefault();
				$(this).parent().find('li.active').removeClass('active');
				$(this).addClass('active');
			});
		});



		//full screen
		$('#full_screen').click(function() {
			$('#main_div').css({
				position: 'fixed',
				top: 0,
				right: 0,
				bottom: 0,
				left: 0,
				zIndex: 999
			});
			$('.close-btn').removeClass('d-none');
			$('.tab-box').addClass('min-height-box');
		});

		$('.close-btn #close_full_screen').click(function() {
			$('#main_div').css({
				position: 'relative'
			});
			$('.close-btn').addClass('d-none');
			$('.tab-box').removeClass('min-height-box');
		});
	</script>
@endpush
