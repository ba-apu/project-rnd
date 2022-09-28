<div class="card bg-white">
    <div class="card-block bg-white">
        <div class="d-flex">
             <h5 class="card-title m-t-0 plum-title w-75" id="indicator_name_details"></h5>
             <button onclick="get_progress_report()" class="btn btn-report" id="report_button" style="background: #ab05bf; color: #fff; margin-top: -5px; margin-left: 118px; padding: 0 5px; height: 35px;">
                <i class="fa fa-download"></i> 
                 ডাউনলোড
                <li class="fa fa-angel-down"></li>
            </button>
        </div>

        <div class="sec-box bg-warnin p-t-0">
            {{-- <div class="card-header">
                <h5 class="p-t-0 p-b-0" id="indicator_name_details"> </h5>
            </div> --}}
            <!--
            <ul id="details_data_portion" data-simplebar></ul>
            -->
            <div class="ca-po-da-tbl-scr">
                <table class="ca-po-da-tbl text-center table-bordered table-condensed" id="details_data_portion" width="100%">

                </table>
            </div>
        </div>
    </div>
</div>
