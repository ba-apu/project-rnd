@if(count($service_data) > 0)
    <div class="card bg-white padding-15 m-t-20">
        <div class="card-header border-bottom txt-18 text-primary ">সেবার ধরণ </div>
        <div class="card-block bg-white">
            <div class="row m-t-15">
                <div class="scrollable scr_popo col-md-4">
                    <div class="demo-card-scrollable">
                        <div class="col-md-12" id="service_cluster_timeline-maser">
                            @php $c=0; @endphp
                            @foreach($service_data as $key => $service_list)
                                @if($service_list['name'] == 'None' || $service_list['data'] == "")
                                    @php  continue; @endphp
                                @endif
                                @if($c == 0)
                                    <input type="hidden" id="service_input_list" value="{{ $service_list['indicator_id'] }}">
                                @endif
                                <div class="list-box checkbox checkbox-circle">
                                    <div class="row m-t-1">
                                        <div class="col-md-9 ">
                                            {{--<div class="txt-14"  onclick="service_cluster_time_line({{$key}});">
                                                    <i class="fa fa-circle fs-11" style="color: {{ isset($colors[$key])?$colors[$key]:$colors[rand(1,10)] }}"></i>
                                                {{ $service_list['name'] }}
                                            </div> --}}
                                            <input type="checkbox"  @if($c == 0) checked="checked" @endif value="{{$key}}" id="checkbox{{$service_list['indicator_id']}}" class="service_checkbox" onclick="click_on_service_chaeckbox({{$service_list['indicator_id']}})">
                                            <label for="checkbox{{$service_list['indicator_id']}}">{{ $service_list['name'] }}</label>
                                        </div>
                                        <div class="col-md-3">
                                            <span class="pull-right txt-16">{{ english_to_bangla(bdtFormat($service_list['data'])) }}</span>
                                        </div>
                                    </div>
                                </div>
                                @php $c++; @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-7" >
                    <div id="service_cluster_timeline-div"></div>
                </div>
            </div>
        </div>
    </div>
@endif

@push('scripts')
    <script>
        function service_cluster_time_line() {
            // Service Cluster Time Line
            var service_cluster_timeline_maser = $('#service_cluster_timeline-maser').height();
            var indicator_list=$("#service_input_list").val();
            $.ajax({
                url: "{{ url('dashboard/graph/services_lists_timeline') }}",
                data: {"indicator_id":indicator_list,"height":service_cluster_timeline_maser},
                success: function (response) {
                    //Do Something
                    $("#service_cluster_timeline-div").html(response);
                },
                error: function (xhr) {
                    //alert("Please click on a service for show the graph");
                    //Do Something to handle error
                }
            });
        }

        function click_on_service_chaeckbox(indicator_id)
        {
            //get the esisting list
            existing_list=$("#service_input_list").val();

            //list_array="";
            if($("#checkbox"+indicator_id).prop("checked") == true){
                //alert('che');
                existing_list +=","+indicator_id;
                var list_array=existing_list.split(',');
            }else{
                //alert('unch');
                var list_array=existing_list.split(',');
                for( var i = 0; i < list_array.length; i++){
                    if ( list_array[i] == indicator_id) {
                        //alert('remove');
                        list_array.splice(i, 1);
                        i--;
                    }
                }
            }
            var list_array = list_array.filter(function(value, index, arr){
                return value != "";
            });
            //console.log(list_array);
            var new_input_value=list_array.join();
            //console.log(new_input_value);
            $("#service_input_list").val(new_input_value);

            service_cluster_time_line();
        }
    </script>
@endpush
