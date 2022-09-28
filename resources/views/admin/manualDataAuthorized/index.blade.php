@extends('layout.frontend')
@section('content')
    <div class="col-md-12 form-group text-center m-t-15">
        {!! Form::select('project_id', $projects, $project_id,
        ['class' => 'custom-select','data-init-plugin'=>'select2', 'id' => 'project_id', 'required' => 'required'])
        !!}
    </div>
    <div id="mointoring_section" class="col-md-12"></div>
    <input type="hidden" id="service_id" value="3">
    @push('scripts')
        <script>
            $(document).ready(function() {
                project_id = $("#project_id option:selected").val();
                get_data(project_id);
            });
            $("#project_id").change(function() {
                id = $(this).val();
                get_data(id)
                //get_data(){
            });

            function get_data(project_id) {

                //date = "{{date('Y-m-d')}}";

                $.ajax({
                    type: "get",
                    url: "{{ url('ajax/get-manual-data') }}",
                    data: {
                        'project_id': project_id,
                        //'date': date
                    }
                }).done(function(resp) {
                    $("#mointoring_section").html(resp);
                }).fail(function(data) {
                    $('#mointoring_section').html(" No data found ");
                });

            }
        </script>

        <script>
            function make_authorize(indicator_id,manual_data_id){

                if (confirm("আপনি কি এই ডাটা অনুমোদন করবেন ?")) {
                    //var indicator_id = $('#indicator_id').val();
                    //var manual_data_id = $('#manual_data_id').val();

                    $.ajax({
                        type: "get",
                        url: "{{ url('ajax/manual-data-approve') }}",
                        data: {
                            'indicator_id': indicator_id,
                            'manual_data_id':manual_data_id
                        }
                    }).done(function(resp) {
                        alert(resp);
                        rlode();
                    });
                } else {

                }

            }
            function make_un_authorize(indicator_id,manual_data_id){

                if (confirm("আপনি কি এই ডাটা  অননুমোদিত করবেন ?")) {
                    //var indicator_id = $('#indicator_id').val();
                    //var manual_data_id = $('#manual_data_id').val();

                    $.ajax({
                        type: "get",
                        url: "{{ url('ajax/manual-data-un-approve') }}",
                        data: {
                            'indicator_id': indicator_id,
                            'manual_data_id':manual_data_id
                        }
                    }).done(function(resp) {
                        alert(resp);
                        rlode();
                    });
                } else {

                }

            }
        </script>
        <script>
            function click_all_man_func()
            {
                if($("#check_all_man").prop("checked") == true){
                    $('.man_check').each(function(){ //iterate all listed checkbox items
                        this.checked = true; //change ".checkbox" checked status
                    });
                }
                else if($("#check_all_man").prop("checked") == false){
                    $('.man_check').each(function(){ //iterate all listed checkbox items
                        this.checked = false; //change ".checkbox" checked status
                    });
                }
            }
            function submit_all_value_together()
            {
                event.preventDefault();
                var favorite = [];
                $.each($("input[name='check_list']:checked"), function(){
                    favorite.push($(this).val());
                });
                //alert("My favourite sports are: " + favorite.join(", "));

                if(favorite.length == 0)
                {
                    alert("আপনি এখনো কোনো ডাটা সিলেক্ট করেন নাই।");
                }
                else
                {
                    var isGood=confirm('আপনি সব ডাটা এক সাথে অনুমোদন করতে চান ?');
                    if (isGood) {
                        //call ajax
                        $.ajax({
                            type: "get",
                            url: "{{ url('ajax/approve-all-manual-data') }}",
                            data: {
                                'man_id': favorite
                            }
                        }).done(function(resp) {
                            alert(" সব গুলো ডাটা অনুমোদন হয়ে গিয়েছে।");
                            location.reload();
                        }).fail(function(data) {
                            alert(" দয়া করে আরেকবার চেষ্টা করুন ।");
                            //location.reload();
                        });
                        //end ajax
                    }
                }
            }
        </script>
        <script>
            function rlode()
            {
                project_id=$("#project_id").val();
                if(project_id != ""){
                    url="{{url('manual-data-authorize')}}"+"?project_id="+project_id;
                    $(location).attr('href', url);
                }
            }
        </script>
    @endpush

@endsection