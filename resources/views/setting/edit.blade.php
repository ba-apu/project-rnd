@extends('layout.frontend')
@section('content')

<div class="content sm-gutter">
    <div class="container-fluid padding-25">
        <div class="card  bg-white">
            <div class="card-block">
                <h5>@lang('lavel.setting')</h5>

                <form action="{{url('setting')}}" {{-- class="form-horizontal" --}} role="form" method="POST"
                    data-toggle="validator">
                    @csrf
                    {{-- <input name="_method" type="hidden" value="POST">
<input name="redirect_to" type="hidden" value="{{ url()->previous() }}"> --}}

                    @forelse($settings as $setting)

                    <label for="title" class="col-lg-2 control-label float-left">{{$setting->display_name.': '}}</label>

                    <div class="col-md-6 float-left">
                        <input id="title" type="text" class="form-control" name="{{$setting->name}}"
                            value="{{ old('value', $setting->value) }}" required autofocus>
                        <div class="help-block with-errors"></div>
                    </div>
                    <br><br>
                    @empty
                    <tr>
                        <td colspan="5"><em>No data found</em></td>
                    </tr>
                    </tbody>
                    @endforelse

                    <br><br>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-primary btn-cons m-b-10" type="submit"><i class="pg-form"></i> <span
                                    class="bold">@lang('lavel.submit')</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')


@endpush