@extends('layout.frontend')
@push('top_css')
    <link class="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
    <link class="stylesheet" href="{{ custom_asset('assets/css/progress.css') }}" rel="stylesheet" type="text/css"/>
    <style>
        table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after {
            opacity: 0;
        }

        select.form-control {
            display: inline;
            width: 140px;
            margin-left: 20px;
            float: left;
        }

        #example_filter {
            float: left;
            width: 100%;
        }

        select {
            -webkit-appearance: listbox !important
        }

        table.dataTable thead th,
        table.dataTable thead td {
            border-bottom: none;
            color: #7e8790;
        }

    </style>
@endpush
@section('content')
    <div class="container-fluid p-t-5 p-l-25 p-b-5 p-r-25">
        <div class="row">
            <div class="col-8">
                <h1>আর্থিক অগ্রগতি</h1>
            </div>
            <div class="col-4">
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
        <div class="row">
            <div class="col-9">
                <div class="row mb-3">
                    <div class="col-12 d-flex topbox p-3">
                        <div class="w-25 text-center">
                            <h5 class="m-0">বরাদ্দ</h5>
                            <span class="text-primary">{{english_to_bangla(bdtFormat($approved_amount))}}/=</span>
                        </div>
                        <div class="w-25 text-center">
                            <h5 class="m-0">অর্থছাড়</h5>
                            <span class="text-info">{{english_to_bangla(bdtFormat($disburse_amount))}}/=</span>
                        </div>
                        <div class="w-25 text-center">
                            <h5 class="m-0">ব্যয়</h5>
                            <span class="text-danger">{{english_to_bangla(bdtFormat( $expenditure_amount))}}/=</span>
                        </div>
                        <div class="w-25 text-center">
                            <h5 class="m-0">অব্যবহৃত</h5>
                            <span class="text-success">{{english_to_bangla(bdtFormat($unused_amount))}}/=</span>
                        </div>

                    </div>
                </div>
                <div class="row p-3 mt-4 bodybox">
                    <div class="col-12">
                        <div class="row">
                            <select class="form-control" id="dropdown1" style="margin-right: 50px">
                                <option value="">অবস্থা</option>
                                @foreach($status_options as $sta_option)
                                    <option value="{{$sta_option['status']}}">{{$sta_option['status']}}</option>
                                @endforeach

                            </select>
                            <select class="form-control" id="dropdown2">
                                <option value="">উৎস</option>
                                @foreach($fund_source_options as $fund_option)
                                    <option
                                        value="{{$fund_option['fund_source']}}">{{$fund_option['fund_source']}}</option>
                                @endforeach
                            </select>

                            <select class="form-control mb-3" id="dropdown3">
                                <option value="">কার্যক্রম</option>
                                @foreach($initiative_options as $ini_option)
                                    <option value="{{$ini_option['initiative']}}">{{$ini_option['initiative']}}</option>
                                @endforeach
                            </select>
                            <div class="table-responsive ">
                                <table id="example" class="table col-md-12 table-borderless " cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th style="font-size: 14px">বরাদ্দ</th>
                                        <th style="font-size: 14px">কার্যক্রম</th>
                                        <th style="font-size: 14px">অবস্থা</th>
                                        <th style="font-size: 14px">উৎস</th>
                                        <th style="font-size: 14px">দায়িত্ব</th>
                                        <th style="font-size: 14px">সময়সীমা</th>
                                        <th style="font-size: 14px">বিস্তারিত</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    @foreach($data as $dataA)
                                        <tr>
                                            <td>{{english_to_bangla(bdtFormat($dataA->approved_amount))}}/=</td>
                                            <td>{{$dataA->initiative}}</td>
                                            <td>{{$dataA->status}}</td>
                                            <td>{{$dataA->fund_source}}</td>
                                            <td>{{$dataA->team_leader}}</td>
                                            <td>{{english_to_bangla( $dataA->disbursement_date)}}</td>
                                            <td class="details">
                                                @php
                                                    $financial_end_date_parsed = Carbon\Carbon::createFromFormat('Y-m-d', $financial_end_date);
                                                @endphp
                                                <button
                                                    class="btn-warning">{{english_to_bangla($financial_end_date_parsed->diffInMonths($dataA->end_date))}}
                                                    মাস বাকী
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="d-flex flex-column">
                    <div class="sidebox mb-2" style="display: block; overflow: scroll; height: 400px;">
                        <div class="offset-2 col-8 p-0">
                            <canvas id="doughnutChartExpense" style="height:175px;width:175px;"></canvas>
                            {{--                                <div class="text-center mb-2" style="margin-top:-111px;">--}}
                            {{--                                    <h6 class="m-0">অব্যবহৃত </h6>--}}
                            {{--                                    <h5 class="m-0" style="font-weight:bold;color:red;">{{english_to_bangla($unused_amount_percentage)}}%</h5>--}}
                            {{--                                </div>--}}
                        </div>
                        <div class="d-flex flex-column text-center mt-2">
                            {{--                                <span class="fs-20 font-weight-500" style="color:darkviolet;">{{english_to_bangla(bdtFormat($unused_amount))}}/=</span>--}}
                            {{--                                <span class="fs-18">টাকা</span>--}}
                            <span class="fs-16 mt-3">সময় বাকীঃ {{english_to_bangla($diffInMonths)}} মাস</span>
                            <span class="fs-16" style="color:darkviolet;">অব্যবহৃত টাকাঃ {{english_to_bangla(bdtFormat($unused_amount))}}/=</span>
                            <span class="fs-16 mt-3" style="font-weight:bold;">যে সকল খাতে খরচ করতে হবে</span>
                            <span class="fs-16 px-3"><hr class="m-0 text-drak"></span>
                        </div>
                        @foreach($spending_initiatives as $key=>$spending_initiative)
                            <div class="d-flex flex-row p-2">
                                <span class="m-1 ml-1">{{english_to_bangla($key+1)}}</span>
                                <span class="w-50 m-1">{{english_to_bangla($spending_initiative->activity_type)}}</span>
                                <span class="w-50 m-2">{{english_to_bangla(bdtFormat($spending_initiative->UnUsed))}}/= ({{english_to_bangla(get_percentage_to_hundrade($spending_initiative->UnUsed, $unused_amount))}}%)</span>
                            </div>
                        @endforeach
                    </div>
                    <div class="p-2 bg-white topbox ">
                        <div class="d-flex flex-column ">
                            <div class="blue-border-top">
                                <div class="row">
                                    <div class="p-3">
                                        <canvas id="doughnutChartInvest" style="height:200px;width:300px;"></canvas>
                                    </div>
                                </div>
                                <div class="row text-center text-black">
                                    <div class="offset-6 col-3">
                                        <h6>বরাদ্দ</h6>
                                    </div>
                                    <div class="col-3">
                                        <h6>ব্যয়</h6>
                                    </div>
                                </div>
                            </div>
                            <span class="border border-primary"></span>
                            @foreach($fund_sources as $key=>$fund_source)
                                <div class="form-inline blue-border-top text-center">
                                    <div class="col-1">
                                        <span>{{english_to_bangla($key+1)}}</span>
                                    </div>
                                    <div class="col-4">
                                        <h6>{{$fund_source->fund_source}}</h6>
                                    </div>
                                    <div class="col-4">
                                        <h6>{{english_to_bangla(bdtFormat($fund_source->Allocated))}}/=</h6>
                                    </div>
                                    <div class="col-2">
                                        <h6>{{english_to_bangla(bdtFormat($fund_source->Percentage))}}%</h6>
                                    </div>
                                </div>
                            @endforeach
                            {{--                            <div class="pt-4 pl-4">--}}
                            {{--                                        অব্যবহৃত ৭০০০,৪৫,৫০০০০/= টাকা আগামী দুই মাসের  মধ্যে অবশ্যই খরচ করতে হবে।--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

    <script>
        let expense_labels = @json(array_keys($spending_data));
        const expense_colors = [];
        for (let i = 0; i <= expense_labels.length; i++) {
            expense_colors.push('#' + (0x1000000 + Math.random() * 0xffffff).toString(16).substr(1, 6));
        }

        const expense_config = {
            type: 'doughnut',
            data: {
                labels: expense_labels,
                datasets: [{
                    label: "",
                    data: @json(array_values($spending_data)),
                    backgroundColor: expense_colors,
                    borderColor: expense_colors,
                    borderWidth: 1
                }]
            },
            options: {
                title: {
                    display: false,
                    text: ""
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
                responsive: true,
                maintainAspectRatio: false,
                cutoutPercentage: 50,
                legend: {
                    display: false
                }
            }
        };

        const expense_ctx = document.getElementById("doughnutChartExpense").getContext("2d");
        new Chart(expense_ctx, expense_config);
    </script>

    <script>
        let invest_labels = @json(array_keys($doughnut_data));
        const invest_colors = [];
        for (let i = 0; i <= invest_labels.length; i++) {
            invest_colors.push('#' + (0x1000000 + Math.random() * 0xffffff).toString(16).substr(1, 6));
        }

        const invest_config = {
            type: 'doughnut',
            data: {
                labels: invest_labels,
                datasets: [{
                    label: "",
                    data: @json(array_values($doughnut_data)),
                    backgroundColor: invest_colors,
                    borderColor: invest_colors,
                    borderWidth: 1
                }]
            },
            options: {
                title: {
                    display: false,
                    text: ""
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
                responsive: true,
                maintainAspectRatio: false,
                cutoutPercentage: 50,
                legend: {
                    display: false
                }
            }
        };

        // if (doughnutChart) doughnutChart.destroy(); //destroy prev chart instance
        const invest_ctx = document.getElementById("doughnutChartInvest").getContext("2d");
        new Chart(invest_ctx, invest_config);
    </script>

    <script>
        $(document).ready(function () {
            var table = $('#example').DataTable({
                "bAutoWidth": false,
                "searching": true,
                "paging": false,
                "info": false
            });
            $("#example_filter.dataTables_filter").append($("#dropdown3"));
            $("#example_filter.dataTables_filter").append($("#dropdown2"));
            $("#example_filter.dataTables_filter").append($("#dropdown1"));

            $('#dropdown3').on('change', function () {
                console.log(this.value);
                table.columns(1).search(this.value).draw();
            });
            $('#dropdown1').on('change', function () {
                table.columns(2).search(this.value).draw();
            });
            $('#dropdown2').on('change', function () {
                table.columns(3).search(this.value).draw();
            });

        });

        $('.report-btn').click(function () {
            let project_category_id = '{{$project_category_id}}';
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
                url: "{{ url('ajax/get-financial-progress-detail-data') }}"+'/'+project_category_id,
            }).done(function (resp) {
                $("#report-glance").html(resp);
            });
        });

        function printContent(el) {
            // var restorepage = $('body').html();
            // var printcontent = $('#' + el).clone();
            // $('body').empty().html(printcontent);
            // window.print();
            // $('body').html(restorepage);
            var divContents = document.getElementById('reportTable').innerHTML;
            var a = window.open('', '', 'height=1200, width=1200');
            a.document.write('<html>');
            a.document.write('<body >' + divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }

        function excelout() {
            //$("#exportToExcel").click(function(e){
            event.preventDefault();
            $("#finance-report").table2excel({
                exclude: ".noExl",
                name: "Excel Document Name"
            });
        }
    </script>
@endpush
