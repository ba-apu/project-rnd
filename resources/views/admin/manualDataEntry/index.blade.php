@extends('layout.frontend')
@section('content')
    <div class="container-fluid padding-25">
        <div class="card  bg-white">
            <div class="card-block">
                <div class="table-responsive">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-title btn_left p-l-20">
                            <h5 class="m-b-0">@lang('lavel.manual_data')</h5>
                        </div>
                        <div class="card-header">

                            <div class="form-group">
                                <form action="" method="get" role="search">
                                    @csrf
                                    <div class="col-md-2 form-group btn_left">
                                        {!! Form::select('project_id', \App\Project::pluck('name', 'id'),
                                        old('project_id', $request->project_id),
                                            ['placeholder'=>'উদ্যোগ  নির্বাচন করুন','class' => 'form-control
                                            full-width','data-init-plugin'=>'select2', 'id' => 'project_id'])
                                            !!}
                                    </div>
                                    <button class="btn btn-primary btn-cons m-b-10 btn_left" type="submit"><i
                                                class="fa fa-search" aria-hidden="true"></i><span class="bold">&nbsp;&nbsp;&nbsp;@lang('lavel.search')</span>
                                    </button>
                                </form>
                            </div>

                            <div class="form-group">
                                <div class="btn_right">
                                    <a href="{{url('/manual-data-entry/create')}}"
                                       class="btn btn-primary btn-cons m-b-10 btn_right"><i class="fa fa-plus"></i>
                                        @lang('lavel.new_manual_data')</a>
                                </div>
                                <div class="clearfix"></div>
                                <div class="card-block">
                                    <table class="table table-hover demo-table-dynamic table-responsive-block"
                                           id="tableWithDynamicRows">
                                        <thead>
                                        <th>@lang('lavel.project_name')</th>
                                        <th>@lang('lavel.indicator_name')</th>
                                        <th>@lang('lavel.date')</th>
                                        <th>@lang('lavel.value')</th>
                                        <th>@lang('lavel.target_value')</th>
                                        <th>সম্পাদন</th>
                                        </thead>
                                        <tbody>
                                        @forelse($manualDatas as $manualData)
                                            <tr>
                                                <td>
                                                    <a href="{{url('/manual-data-entry/'.$manualData->id.'/edit/')}}">{{$manualData->projects['name']}}</a>
                                                </td>
                                                <td>{{ $manualData->indicators['name'] }}</td>
                                                <td>{{ $manualData->date }}</td>
                                                <td>{{ $manualData->data_value }}</td>
                                                <td>{{ $manualData->target_value }}</td>
                                                <td>
                                                    @if(Auth::user()->role == 1 || $manualData->is_authorized == 1)
                                                        <a href="{{url('manual-data-entry/'.$manualData->id.'/edit/')}}"><i
                                                                    class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="delete_data({{$manualData->id}})"
                                                           class="confirm"><i class="fa fa-trash-o"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6"><em>No data found</em></td>
                                            </tr>
                                        </tbody>
                                        @endforelse
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 text-right text-center-xs">
                            <div class="pagination-sm m-t-none m-b-none">

                            </div>
                        </div>
                    </div>
                </div>
                {{$manualDatas->links()}}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function delete_data(id) {
            var url_str = "{{url('/manual-data-entry/')}}" + "/" + id;
            $.ajax({
                url: url_str,
                type: 'DELETE',  // user.destroy
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function (result) {
                    alert('data deletede successfully');
                    location.reload(true);
                }
            });
        }
    </script>
@endpush
