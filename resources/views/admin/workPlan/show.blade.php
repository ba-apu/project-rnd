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
                    <td class="col-sm-8">{{ $workPlan->projects->name }}</td>
                  </tr>
                  <tr class="row">
                    <td class="col-sm-4"><b>Title:</b></td>
                    <td class="col-sm-8">{{ $workPlan->title }}</td>
                  </tr>

                   <tr class="row">
                    <td class="col-sm-4"><b>Date:</b></td>
                    <td class="col-sm-8">{{date('d-F-Y',strtotime($workPlan->date))}}</td>
                  </tr>
                  <tr class="row">
                    <td class="col-sm-4"><b>Done Date:</b></td>
                    <td class="col-sm-8">{{date('d-F-Y',strtotime($workPlan->done_date))}}</td>
                  </tr>
                  <tr class="row">
                    <td class="col-sm-4"><b>Details:</b></td>
                    <td class="col-sm-8">{!! $workPlan->details !!}</td>
                  </tr>
               </tbody>
              </table>  

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="{{ url('dashboard/workPlan') }}"><button class="btn btn-primary btn-cons m-b-10" type="submit"><span
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
