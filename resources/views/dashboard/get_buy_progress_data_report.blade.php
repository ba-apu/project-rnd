<div class="col-8">
    <h2>ক্রয় প্রক্রিয়া</h2>
</div>
<div class="table-responsive ">
    <table id="finance-report" class="table col-md-12 table-borderless " cellspacing="0"
           width="100%">
        <thead>
        <tr>
            <th style="font-size: 14px">টীম</th>
            <th style="font-size: 14px">অগ্রগতি</th>
            <th style="font-size: 14px">প্রকৃত সময়</th>
            <th style="font-size: 14px">প্রস্তাবিত সময়</th>
            <th style="font-size: 14px">প্রলম্বিত সময়</th>
            <th style="font-size: 14px">অবস্থা</th>
        </tr>
        </thead>
        <tbody class="text-center">
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
<div class="tbl-footer m-t-10" style="text-align:right;">
    <a href="#" onclick="excelout()"><i class="fa fa-file-excel-o fa-2x" aria-hidden="true"></i></a>
    <!--a href="#"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a-->
    <a href="#" onclick="printContent('finance-report')"><i class="fa fa-print fa-2x" aria-hidden="true"></i></a>
</div>

