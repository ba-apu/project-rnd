@extends('layout.frontend')
@section('content')
    <div class="content sm-gutter">
        <!-- START BREADCRUMBS -->
        <div class="bg-white">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="service-title"></div>
                    </div>
                    <div class="col-md-8">
                        <div class="pull-right padding-10">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default btn-xs ">
                                    <input type="radio" name="options" id="option2"> গত ৭ দিন
                                </label>
                                <label class="btn btn-default btn-xs active">
                                    <input type="radio" name="options" id="option1" checked> ৩০ দিন
                                </label>
                                <label class="btn btn-default btn-xs ">
                                    <input type="radio" name="options" id="option2"> ৩ মাস
                                </label>
                                <label class="btn btn-default btn-xs">
                                    <input type="radio" name="options" id="option3"> বছর
                                </label>
                                <label class="btn btn-default btn-xs">
                                    <input type="radio" name="options" id="option3">পছন্দ মত
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END BREADCRUMBS -->


        <!-- START CONTAINER FLUID -->
        <div class="container-fluid padding-25 sm-padding-10">

            <!-- Map -->
            <div class="card  bg-white">

                <div class="card-block bg-white">
                    <div class="card-header border-bottom txt-18 text-primary">
                        সারাদেশ
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            @include('components.map')
                        </div>
                        <div class="col-md-6">
                            <div class="m-b-20"></div>
                            <div class="card-header  txt-24 text-primary text-center">
                                {{ @$serviceName }}
                            </div>


                            <div class="no-padding widget-11-2-table">
                                <!-- START ROW -->
                                <div class="row">
                                    <div class="col-md-12 m-b-10">
                                        <div class="ar-2-3 widget-1-wrapper">
                                            <div class="widget-11 card no-border  no-margin widget-loader-bar">

                                                <div class="p-l-25 p-r-25 p-b-20">
                                                    <select class="form-control w-30" onchange="changeUrl(this.value)" >
                                                        <option id="initiatives" >উদ্যোগ সমূহ</option>
                                                        @foreach($services as $key => $serviceData)
                                                            <option value="{{$key}}">{{ $serviceData }}</option>
                                                        @endforeach
                                                    </select>

                                                    <select class="form-control w-30" >
                                                        <option value="sightseeing">সেবা সমূহ</option>
                                                        @foreach($serviceLists as $serviceList)
                                                            <option value="">{{ $serviceList }}</option>
                                                        @endforeach
                                                    </select>

                                                    <select class="form-control w-30" >
                                                        <option value="sightseeing">বিভাগ</option>
                                                        @foreach($divisions as $division)
                                                            <option value="">{{ $division }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="widget-11-table auto-overflow">
                                                    <table class="table table-condensed table-hover">
                                                        <tbody>
                                                        <tr>
                                                            <th></th>
                                                            @foreach($serviceIndicator as $indicator)
                                                                <th title="{{ $indicator }}"><div class="vertical">{{ \App\Common::trim_text($indicator,50)  }}</div></th>
                                                            @endforeach
                                                        </tr>
                                                        @foreach($districts as $key => $district)
                                                            <tr>
                                                                <th>{{ $district->name }}</th>
                                                                @foreach($serviceIndicator as $indicator)
                                                                    <td>{{ \App\Common::randSingleNum(10, 100) }}</td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="padding-25">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END ROW -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- END CONTAINER FLUID -->
    </div>

    <!-- Modal -->
    <!--
    <div class="modal fade slide-up disable-scroll" id="modalSlideUp" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog ">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                        </button>
                        <h5>পাবনা</h5>
                        <p class="p-b-10">আমার সোনার বাংলা, আমি তোমায় ভালোবাসি</p>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6"></div>    
                            <div class="col-md-6">
                                <img src="{{ url('assets/img/pabna-map.jpg') }}" class="img-responsive">
                            </div>    
                        </div>        
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-xs btn-primary">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            নতুন ইনডিকেটর
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
    <!-- /.modal-dialog -->

    <!-- Modal -->
    <div class="modal fade fill-in" id="modalSlideUp" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <i class="pg-close"></i>
        </button>
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header txt-24 text-primary text-center"> পাবনা </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-condensed table-hover">
                                <tbody>
                                <tr>
                                    <th></th>
                                    @foreach($serviceIndicator as $indicator)
                                        <th title="{{ $indicator }}"><div class="vertical">{{ \App\Common::trim_text($indicator,50)  }}</div></th>
                                    @endforeach
                                </tr>
                                @foreach($pabna as $key => $upzila)
                                    <tr>
                                        <th>{{ $upzila->name }}</th>
                                        @foreach($serviceIndicator as $indicator)
                                            <td>{{ \App\Common::randSingleNum(10, 100) }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ url('assets/img/pabna-map.jpg') }}" class="img-responsive">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Modal -->
<style>
    .widget-11 .widget-11-table {
        height: 702px !important;
    }
    /* these are represented with blue circles */
    .st0:nth-of-type({{ rand(1,2) }}) {
        fill: #FF5722;
        stroke: #FFFFFF;
        stroke-width: 0.5;
        stroke-miterlimit: 10;

    }
    .modal .modal-dialog{
        width: 1000px !important;
        max-width: 1000px !important;
    }
    .vertical{
        writing-mode: tb-rl;
        -webkit-transform: rotate(180deg);
        -moz-transform: rotate(180deg);
        -o-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg);
        white-space: nowrap;
        display: block;
        bottom: 0;
    }
</style>
    <script>
        $('#btnToggleSlideUpSize').click(function() {
            var size = $('input[name=slideup_toggler]:checked').val()
            var modalElem = $('#modalSlideUp');
            if (size == "mini") {
                $('#modalSlideUpSmall').modal('show')
            } else {
                $('#modalSlideUp').modal('show')
                if (size == "default") {
                    modalElem.children('.modal-dialog').removeClass('modal-lg');
                } else if (size == "full") {
                    modalElem.children('.modal-dialog').addClass('modal-lg');
                }
            }
        });
        function changeUrl(e){
            console.log(e);
            window.location.href = "{{ url('http://dashboard.localhost/dashboard/map') }}/"+e;
        }
    </script>
@endsection
