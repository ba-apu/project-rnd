{{ $project_details->bangla_name }}
{{--
From Date : {{ $from_date }}
To Date : {{ $from_date }}
--}}
<div>
    <div class="tbl-header"></div>
    <table id="at-glance" class="table" border="1"
           style="border-collapse:collapse; font-family:'SolaimanLipi'!important;">
        <thead class="thead-dark">
        <tr>
            <th scope="col" rowspan="2">তারিখ</th>
            @foreach($indicator_lists as $indicator_list)
                <th scope="col"
                    colspan="2">{{ ($indicator_list->short_form)?$indicator_list->short_form:$indicator_list->bangla_name }}</th>
            @endforeach
        </tr>
        <tr>

            @foreach($indicator_lists as $indicator_list)
                <th scope="col">ডাটা</th>
                <th scope="col">@lang('lavel.target_data')</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach( $data['monthly_date_range'] as  $dates=>$values)
            <tr>
                <td>{{ english_to_bangla(date('F-Y',strtotime($dates))) }}</td>
                @foreach($indicator_lists as $indicator_list)
                    <td>
                        @if(isset($data[$indicator_list->id][$dates]['data']))
                            {{$data[$indicator_list->id][$dates]['data']}}
                        @else
                            ০
                        @endif
                    </td>
                    <td>
                        @if(isset($data[$indicator_list->id][$dates]['target_data']))
                            {{$data[$indicator_list->id][$dates]['target_data']}}
                        @else
                            ০
                        @endif
                    </td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="tbl-footer m-t-10" style="text-align:right;">
    <a href="#" onclick="excelout()"><i class="fa fa-file-excel-o fa-2x" aria-hidden="true"></i></a>
    <!--a href="#"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a-->
    <a href="#" onclick="printContent('at-glance')"><i class="fa fa-print fa-2x" aria-hidden="true"></i></a>
</div>
