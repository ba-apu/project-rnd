@extends('layout.frontend')
@section('content')

    <div class="container-fluid padding-25">
        <div class="card  bg-white">
            <div class="card-block">
                <div class="table-responsive">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-header ">
                            <div class="card-title">ইন্ডিকেটর</div>
                            <div class="form-group">
                                <form action="{{url('dashboard/indicator')}}" method="GET" role="search">
                                    @csrf
                                    <div class="col-md-3 form-group btn_left">
                                        <label for="name" class="col-lg-3 control-label">তারিখ হইতে<span class="mendatory">*</span></label>
                                        <input type="text" class="form-control" name="from_date" id="from_date" placeholder="From Date">
                                    </div>
                                    <div class="col-md-3 form-group btn_left">
                                        <label for="name" class="col-lg-3 control-label">তারিখ প্ররযন্ত<span class="mendatory">*</span></label>
                                        <input type="text" class="form-control" name="to_date" id="to_date" placeholder="To Date">
                                    </div>

                                    <button class="btn btn-primary btn-cons m-b-10 btn_left" type="submit" id="report_submit"><i class="fa fa-search" aria-hidden="true"></i>
                                        <span class="bold">সার্চ</span>
                                    </button>
                                    <button class="btn btn-primary btn-cons m-b-10 btn_left" type="button" id="pdf"><i class="fa fa-search" aria-hidden="true"></i>
                                        <span class="bold">PDF</span>
                                    </button>
                                    <button class="btn btn-primary btn-cons m-b-10 btn_left" type="button" id="print"><i class="fa fa-search" aria-hidden="true"></i>
                                        <span class="bold">Print</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="card card-transparent">
                            <div class="card-block" id="loader" style="display: none;">
                                <br> <img src="{{ custom_asset('assets/img/loader.gif') }}">
                            </div>
                            <div class="card-block" id="report_div">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@push('scripts')
    <script>
        $( "#report_submit" ).click(function() {
            event.preventDefault();
            var from_date = $("from_date").val();
            var to_date = $("to_date").val();

            $.ajax({
                type: "get",
                url: "{{ url('report/project-wise-indicator-data') }}",
                data: {
                    'from_date': from_date,
                    'to_date': to_date
                },
                beforeSend: function() {
                    $("#loader").show();
                },
            }).done(function(resp) {
                $("#loader").hide();
                $("#report_div").html(resp);
            });

        });
    </script>
    <script>
        /*$("#pdf" ).click(function() {
            event.preventDefault();
            $.ajax({
                type: "get",
                url: "{{ url('report/generate_pdf') }}",
                data: {
                    'from_date': "s"
                },
                beforeSend: function() {
                    $("#loader").show();
                },
            }).done(function(resp) {
                $("#loader").hide();
                alert('success');
            });

        });*/
        $("#pdf").on('click', function () {
            alert('as');
            $.ajax({
                url: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/172905/test.pdf',
                method: 'GET',
                xhrFields: {
                    responseType: 'blob'
                },
                success: function (data) { alert('ats');
                    var a = document.createElement('a');
                    var url = window.URL.createObjectURL(data);
                    a.href = url;
                    a.download = 'myfile.pdf';
                    document.body.append(a);
                    a.click();
                    a.remove();
                    window.URL.revokeObjectURL(url);
                }
            });
        });
        $("#print").on('click', function () {
            var report_data= $("#report_div").html();
            $.ajax({
                type: "get",
                url: "{{ url('report/print-friendly') }}",
                data: {
                    'report_data': report_data
                },
                beforeSend: function() {
                    $("#loader").show();
                },
            }).done(function(resp) {
                $("#report_print_div").html(resp);
            });
        });
    </script>

@endpush
@endsection
