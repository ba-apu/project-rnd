@extends('layout.frontend')

@push('top_css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="content sm-gutter">
        <!-- START CONTAINER FLUID -->
        <div class="container-fluid padding-25">
            <div class="card  bg-white">
                <div class="card-block">
                    <h5>New QPR</h5>
                    <form action="{{url('qpr/' . $qpr->id)}}" method="POST" role="form" data-toggle="validator">
                        @csrf
                        <input name="_method" type="hidden" value="PUT">
                        <div class="form-group{{ $errors->has('project_category_id') ? ' has-error' : '' }}">
                            <label for="project_category_id" class="col-lg-4 control-label">Team<span
                                    class="mendatory">*</span></label>

                            <div class="col-md-6 form-group">
                                {!! Form::select('project_category_id', \App\ProjectCategory::pluck('name_en', 'id'), old('id',$qpr->category_id),
                                ['placeholder'=>'Please Select A Project Category','class' => 'form-control
                                full-width','data-init-plugin'=>'select2', 'id' => 'id', 'required' => 'required'])
                                !!}
                            </div>
                        </div>
						<div class="form-group{{ $errors->has('project_category_id') ? ' has-error' : '' }}">
                            <label for="project_category_id" class="col-lg-4 control-label">Year<span
                                    class="mendatory">*</span></label>

                            <div class="col-md-6 form-group">
                                <select name="year" class="form-control full-width">
									<option value="{{$qpr->year}}">{{$qpr->year}}</option>
                                    <option value="2022">2022</option>
									<option value="2021">2021</option>
									<option value="2020">2020</option>
									<option value="2019">2019</option>
									<option value="2018">2018</option>
								</select>

                            </div>
                        </div>

						<div class="form-group{{ $errors->has('project_category_id') ? ' has-error' : '' }}">
                            <label for="project_category_id" class="col-lg-4 control-label">Quarter<span
                                    class="mendatory">*</span></label>

                            <div class="col-md-6 form-group">
                                <select name="quarter" class="form-control full-width">
									<option value="{{$qpr->quarter}}">{{$qpr->quarter}}</option>
									<option value="1">1st quarter</option>
									<option value="2">2nd quarter</option>
									<option value="3">3rd quarter</option>
									<option value="4">4th quarter</option>
								</select>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-2 control-label"> Challenges  <span
                                    class="mendatory">*</span></label>

                            <div class="col-md-6">
                                <textarea class="ckeditor form-control textarea" id="challenge" name="challenge"
                                placeholder="Write Details Here...">{{ old('challenge',$qpr->challenge) }}</textarea>
								@if ($errors->has('challenge'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('challenge') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-2 control-label"> Major learnings  <span
                                    class="mendatory">*</span></label>

                            <div class="col-md-6">
                                <textarea class="ckeditor form-control textarea" id="major_learnings" name="major_learnings" value="{{ old('major_learnings') }}"
                                placeholder="Write Details Here...">{{ old('major_learnings',$qpr->major_learnings) }}</textarea>
								@if ($errors->has('major_learnings'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('major_learnings') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-2 control-label"> Collaboration made in the last quarter  <span
                                    class="mendatory">*</span></label>

                            <div class="col-md-6">
                                <textarea class="ckeditor form-control textarea" id="collaboration_made" name="collaboration_made" value="{{ old('collaboration_made') }}"
                                placeholder="Write Details Here...">{{ old('collaboration_made',$qpr->collaboration_made) }}</textarea>
								@if ($errors->has('collaboration_made'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('collaboration_made') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-2 control-label"> Resource mobilization  <span
                                    class="mendatory">*</span></label>

                            <div class="col-md-6">
                                <textarea class="ckeditor form-control textarea" id="resource_mobilization" name="resource_mobilization" value=""
                                placeholder="Write Details Here...">{{ old('resource_mobilization',$qpr->resource_mobilization) }}</textarea>
								@if ($errors->has('resource_mobilization'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('resource_mobilization') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-2 control-label"> Resource leveraging  <span
                                    class="mendatory">*</span></label>

                            <div class="col-md-6">
                                <textarea class="ckeditor form-control textarea" id="resource_leveraging" name="resource_leveraging" value=""
                                placeholder="Write Details Here...">{{ old('resource_leveraging',$qpr->resource_leveraging) }}</textarea>
								@if ($errors->has('resource_leveraging'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('resource_leveraging') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-2 control-label"> Major risks of next quarter  <span
                                    class="mendatory">*</span></label>

                            <div class="col-md-6">
                                <textarea class="ckeditor form-control textarea" id="major_risks" name="major_risks" value=""
                                placeholder="Write Details Here...">{{ old('major_risks',$qpr->major_risks) }}</textarea>
								@if ($errors->has('major_risks'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('major_risks') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-2 control-label"> Potential collaboration to reach the target  <span
                                    class="mendatory">*</span></label>

                            <div class="col-md-6">
                                <textarea class="ckeditor form-control textarea" id="Potential_collaboration" name="Potential_collaboration" value=""
                                placeholder="Write Details Here...">{{ old('Potential_collaboration',$qpr->Potential_collaboration) }}</textarea>
								@if ($errors->has('Potential_collaboration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Potential_collaboration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                               <button class="btn btn-primary btn-cons m-b-10" type="submit"><i class="pg-form"></i> <span class="bold">Update</span>
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.textarea').summernote({
                height: 150,
            });
        });
    </script>

@endpush