@extends('layout.master')
@section('content')

<div class="content sm-gutter">
    <div class="container-fluid padding-25">
        <div class="card  bg-white">
            <div class="card-block">
                <h5>Financial Progress</h5>

                <table class="table table-user-information">
                <tbody>
                  <tr class="row">
                    <td class="col-sm-4"><b>Project Name:</b></td>
                    <td class="col-sm-8">{{ $financialProgress->projects->name }}</td>
                  </tr>
                  <tr class="row">
                    <td class="col-sm-4"><b>Estimated Expenditure:</b></td>
                    <td class="col-sm-8">{{ $financialProgress->estimated_expenditure }}</td>
                  </tr>

                   <tr class="row">
                    <td class="col-sm-4"><b>Approve Expenditure:</b></td>
                    <td class="col-sm-8">{{ $financialProgress->approve_expenditure }}</td>
                  </tr>
                  <tr class="row">
                    <td class="col-sm-4"><b>Actual Expenditure:</b></td>
                    <td class="col-sm-8">{{ $financialProgress->actual_expenditure }}</td>
                  </tr>
                  
               </tbody>
              </table>  

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="{{ url('dashboard/financialprogress') }}"><button class="btn btn-primary btn-cons m-b-10" type="submit"><span
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
