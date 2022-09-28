@extends('layout.frontend')
@section('content')

    <div class="content sm-gutter">
        <div class="container-fluid padding-25">
            <div class="card bg-white">
                <div class="card-block">
                    <h5>{{$project->bangla_name}} @lang('lavel.target_data_add')</h5>
                    <form action="{{url('dashboard/indicator-target-set/store')}}" role="form" method="POST" data-toggle="validator">
                        @csrf
                        <div class="px-4">
                            <div class="form-group row {{ $errors->has('indicator') ? ' has-error' : '' }}">
                                <label for="indicator_id" class="col-sm-2 col-form-label">
                                    দল
                                </label>
                                <label class="col-sm-6 col-form-label">
                                    {{$project->name}}
                                </label>
                            </div>
                            <div class="form-group row {{ $errors->has('indicator') ? ' has-error' : '' }}">
                                <label for="indicator_id" class="col-sm-2 col-form-label">
                                    উদ্যোগ
                                </label>
                                <label class="col-sm-6 col-form-label">
                                    {{$project->bangla_name}}
                                </label>
                                {!! Form::hidden('project_id', $project->id) !!}
                            </div>
                            <div class="form-group row {{ $errors->has('indicator') ? ' has-error' : '' }}">
                                <label for="indicator_id" class="col-sm-2 col-form-label">@lang('lavel.indicator')
                                    <span class="mendatory">*</span>
                                </label>
                                <div class="col-sm-6">
                                    {!! Form::select('indicator', $indicators_data, old('indicator'),['placeholder'=>'সূচক নির্বাচন করুন ','class'=>'form-control', 'data-init-plugin'=>'select2', 'id' => 'indicator', 'required' => 'true'])!!}
                                </div>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('indicator'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('indicator') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row {{ $errors->has('target_year') ? ' has-error' : '' }}">
                                <label for="target_year" class="col-sm-2 col-form-label">@lang('lavel.target_year')
                                    <span class="mendatory">*</span>
                                </label>
                                <div class="col-sm-6">
                                    <div class="input-prepend input-group">
                                        <input type="text" style="width: 100%" name="target_year" id="target_year"
                                               class="form-control"
                                               value="" required autocomplete="off"/>
                                        <label for="target_year" class="add-on input-group-addon">
                                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('last_data') ? ' has-error' : '' }}">
                                <label for="last_data" class="col-sm-2 col-form-label">সর্বশেষ বছরের সর্বশেষ অর্জন
                                    <span class="mendatory">*</span>
                                </label>
                                <div class="col-sm-6">
                                    {!! Form::text('last_data', old('last_data'),['class'=>'form-control', 'placeholder'=>'সর্বশেষ বছরের সর্বশেষ অর্জন', 'id' => 'last_data', 'required' => 'true'])!!}
                                </div>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('last_data'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_data') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row {{ $errors->has('target_data') ? ' has-error' : '' }}">
                                <label for="indicator_id" class="col-sm-2 col-form-label">@lang('lavel.target_data')
                                    <span class="mendatory">*</span>
                                </label>
                                <div class="col-sm-6">
                                    {!! Form::number('target_data', old('target_data'),
                                    ['class'=>'form-control', 'placeholder'=>'লক্ষমাত্রা (শুধুমাত্র নির্বাচিত বছরের জন্য)',
                                    'id' => 'target_data', 'step'=>".01", 'required' => 'true'])!!}
                                </div>
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('indicator'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('indicator') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button class="btn btn-primary btn-cons m-b-10" type="submit">
                                    <i class="pg-form"></i>
                                    <span class="bold">@lang('lavel.submit')</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $("#target_year").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });

            $("#target_year").on('changeDate',function(){
                get_target_data()
            });

            $("#indicator").on('change',function(){
                get_target_data()
            });

            function get_target_data(){
                let year = $("#target_year").val()
                let indicator = $('#indicator').val()
                if(year && indicator){
                    $.ajax({
                        type: "get",
                        url: "{{ url('ajax/get-last-month-target-data') }}",
                        data: {
                            'indicator_id': indicator,
                            'year': year,
                        }
                    }).done(function (response) {
                        $('#target_data').val(response.target_data);
                    })
                }
            }
        </script>
    @endpush
@endsection
