@extends('layout.frontend')
@push('top_css')
    <link class="stylesheet" href="{{ custom_asset('assets/css/progress.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
    <div class="container-fluid p-t-5 p-l-25 p-b-5 p-r-25">
        <div class="row">
            <div class="col-8">
                <h3> ক্রয় প্রক্রিয়া </h3>
            </div>
            <div class="col-md-4">
                <button class="btn report-btn ml-5"><i class="fa fa-download" aria-hidden="true"></i> রিপোর্ট ডাউনলোড
                    <li class="fa fa-angle-down"></li>
                </button>
                <div class="modal fade slide-up reportTable" id="reportTable" tabindex="-1" role="dialog"
                     aria-hidden="false" style="overflow-x:scroll;">
                    <div class="modal-dialog" style="width:90%; max-width:90%;">
                        <div class="modal-content-wrapper">
                            <div class="modal-content">
                                <div class="modal-header clearfix text-left">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        <i class="pg-close fs-20"></i></button>
                                    <h5 class="m-t-0 m-b-0"><span class="semi-bold tit-co"></span></h5>
                                </div>
                                <div class="modal-body" id="report-glance">
                                            <span class="loder">
                                                <img src="{{custom_asset('pages/img/loder-a2i.gif')}}" class="img-fluid"
                                                     alt="">
                                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-3 mt-4 bodybox">

            <div class="col-2 pl-0">
                <p class="topdate">{{english_to_bangla($financial_start_year_month)}} হতে {{english_to_bangla($financial_end_year_month)}}</p>
            </div>
{{--            <div class="offset-4 d-flex col-6 px-0 ">--}}
{{--                <span class="p-1"> <i class="fa fa-sliders" aria-hidden="true"></i></span>--}}
{{--                <div class="w-25">--}}
{{--                    <select class="form-control page8-select">--}}
{{--                        <option>স্ট্যাটাস</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="w-25">--}}
{{--                    <select class="form-control page8-select">--}}
{{--                        <option>টীম</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="w-25">--}}
{{--                    <select class="form-control page8-select">--}}
{{--                        <option>চলমান</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="w-25">--}}
{{--                    <select class="form-control page8-select">--}}
{{--                        <option>সম্পন্ন</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="w-25">--}}
{{--                    <select class="form-control page8-select">--}}
{{--                        <option>অসম্পন্ন</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--            </div>--}}
            <table class="mt-5 pagetable8 text-center borderless">
                <thead>
                <tr>
                    <th width="17%">টীম</th>
                    <th width="17%">অগ্রগতি</th>
                    <th width="16%">প্রকৃত সময়</th>
                    <th width="17%">প্রস্তাবিত সময়</th>
                    <th width="40%">প্রলম্বিত সময়</th>
                    <th width="40%">অবস্থা </th>
                </tr>
                </thead>
                <tbody>
                @foreach($purchase_report_data as $key=>$data)
                    <tr>
                        <td rowspan="{{count($data) + 1}}" class="team-row p-2">{{$key}}</td>
                        @foreach($data as $val)
                        <tr>
                            <td class="b-x  p-2">{{$val['type']}}</td>
                            <td class="b-x  p-2">{{english_to_bangla($val['exact_date'])}} দিন</td>
                            <td class="b-x  p-2">{{english_to_bangla($val['proposed_date'])}} দিন</td>
                            <td class="b-x b-r p-2 text-{{$val['color']}}">{{english_to_bangla($val['prolonged_time'])}} দিন ( {{english_to_bangla($val['end_date'])}} - {{english_to_bangla($val['expend_date'])}})</td>
                            <td class="b-x  p-2">{{$val['status']}}</td>
                        </tr>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.report-btn').click(function () {
                let size = $('input[name=slideup_toggler]:checked').val()
                let modalElem = $('#ataGlanceSlideUp');

                $('#reportTable').modal('show');
                if (size == "default") {
                    modalElem.children('.modal-dialog').removeClass('modal-lg');
                } else if (size == "full") {
                    modalElem.children('.modal-dialog').addClass('modal-lg');
                }
                $.ajax({
                    type: "get",
                    url: "{{ url('ajax/get-total-buy-progress-detail-data') }}",
                }).done(function (resp) {
                    $("#report-glance").html(resp);
                });
                // alert('Working')
            });
        });

        function printContent(el) {
            var divContents = document.getElementById('reportTable').innerHTML;
            var a = window.open('', '', 'height=1200, width=1200');
            a.document.write('<html>');
            a.document.write('<body >' + divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }

        function excelout() {
            event.preventDefault();
            $("#finance-report").table2excel({
                exclude: ".noExl",
                name: "Excel Document Name"
            });
        }

    </script>
@endpush
