<table class="report-tbl table table-striped m-b-20">
    <thead>
        <tr>
			<th style="width:10%" ><input type="checkbox" name="check_all" id="check_all_man" onclick="click_all_man_func()"> এক সাথে সব সিলক্ট করুন</th>
            <th scope="col">@lang('lavel.indicator_name')</th>
            <th scope="col">@lang('lavel.date')</th>
            <th scope="col">@lang('lavel.created_by')</th>
            <th scope="col">@lang('lavel.value')</th>
            <th scope="col">@lang('lavel.target_value')</th>
            <th scope="col"><input type="button" value="এক সাথে সব অনুমোদন" onclick="submit_all_value_together()"></th>

        </tr>
    </thead>
    <tbody>
        @foreach($manualDatas as $key=>$manualData)

        <tr>
            <td><input type="checkbox" name="check_list" value="{{ $manualData->id }}" class="man_check"></td>
			<td>{{$manualData->indicators['short_form']}}</td>
            <td>{{english_to_bangla(date('d-F-Y',strtotime($manualData->date)))}}</td>
            <td>{{ \App\User::where('id',$manualData->created_by)->pluck('name')->first() }}</td>
            <td>{{english_to_bangla(bdtFormat($manualData->data_value))}}</td>
            <td>{{english_to_bangla(bdtFormat($manualData->target_value))}}</td>
            <td>
                <button id="approve" onclick="make_authorize('{{$manualData->indicator_id}}','{{$manualData->id}}');">@lang('lavel.approve')</button>
                <button id="approve" onclick="make_un_authorize('{{$manualData->indicator_id}}','{{$manualData->id}}');">@lang('lavel.unauthorized')</button>
                <input type="hidden" id="indicator_id" value="{{$manualData->indicator_id}}">
                <input type="hidden" id="manual_data_id" value="{{$manualData->id}}">
            </td>

        </tr>

        @endforeach
    </tbody>
</table>

