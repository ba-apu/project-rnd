@extends('layout.frontend')
@section('content')

<div class="content sm-gutter">
    <div class="container-fluid padding-25">
        <div class="card  bg-white">
            <div class="card-block">
                <h5>Work Plan</h5>

                <table class=   "table table-user-information">
                <tbody>
                  <tr class="row">
                    <td class="col-sm-4"><b>Project Name:</b></td>
                    <td class="col-sm-8">{{ $event->projects->name }}</td>
                  </tr>
                  <tr class="row">
                    <td class="col-sm-4"><b>Title:</b></td>
                    <td class="col-sm-8">{{ $event->title }}</td>
                  </tr>

                   <tr class="row">
                    <td class="col-sm-4"><b>Place:</b></td>
                    <td class="col-sm-8">{{ $event->place }}</td>
                  </tr>
                  <tr class="row">
                    <td class="col-sm-4"><b>Date Time:</b></td>
                    <td class="col-sm-8">{{ $event->date }}</td>
                  </tr>
                  <tr class="row">
                    <td class="col-sm-4"><b>Details:</b></td>
                    <td class="col-sm-8">{!! $event->details !!}    </td>
                  </tr>
               </tbody>
              </table>  

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="{{ url('dashboard/event') }}"><button class="btn btn-primary btn-cons m-b-10" type="submit"><span
                                    class="bold">Back</span>
                            </button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
