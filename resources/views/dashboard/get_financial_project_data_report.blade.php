<div class="col-8">
    <h2>অর্থনৈতিক অগ্রগতি</h2>
</div>
<div class="table-responsive ">
    <table id="finance-report" class="table col-md-12 table-borderless " cellspacing="0"
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
                    {{english_to_bangla($financial_end_date_parsed->diffInMonths($dataA->end_date))}}
                        মাস বাকী
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="tbl-footer m-t-10" style="text-align:right;">
    <a href="#" onclick="excelout()"><i class="fa fa-file-excel-o fa-2x" aria-hidden="true"></i></a>
    <!--a href="#"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a-->
    <a href="#" onclick="printContent('finance-report')"><i class="fa fa-print fa-2x" aria-hidden="true"></i></a>
</div>
