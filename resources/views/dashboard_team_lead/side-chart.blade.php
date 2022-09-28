<style>
    .b:before {
        content: "";
        position: absolute;
        top: 0rem;
        right: 0rem;
        transform: translate(50%, -50%);
        width: 0.8rem;
        height: 0.8rem;
        border-radius: 50%;
        background: #4da6ff;
        mix-blend-mode: darken;
    }

    .pink:before {
        background: #FD1F9B;
    }

    .blue:before {
        background: #017EFA;
    }
    .violet:before {
        background: #6342FF;
    }
    .yellow:before{
        background:#FFB800;
    }
    .green:before{
        background:#30D987;
    }

    .d:before {
        content: "";
        position: absolute;
        bottom: 0rem;
        right: 0rem;
        transform: translate(50%, -50%);
        width: 0.8rem;
        height: 0.8rem;
        border-radius: 50%;
        mix-blend-mode: darken;
    }

    .c:before {
        content: "";
        position: absolute;
        right: 0rem;
        top: 0rem;
        transform: translate(50%, -50%);
        width: 3rem;
        height: 3rem;
        border-radius: 50%;
        mix-blend-mode: darken;
        border: none !important;
        /*background: #FD1F9B;*/
    }

    .title {
        position: absolute;
        top: 2rem;
        right: -1.8rem;
        text-align: right;
    }

    .title-d {
        position: absolute;
        top: 2rem;
        right: -1.8rem;
        text-align: right;
    }

    .data-text{
        top: -0.6rem;
        position: absolute;
        left: 1rem;
        text-align: left;
        font-size: 0.8rem;
    }

    .data-text-d{
        top: -1.4rem;
        position: absolute;
        left: 1rem;
        text-align: left;
        font-size: 0.8rem;
    }

    .top-text {
        top: -0.6rem;
        position: absolute;
        right: 1rem;
        text-align: right;
        font-size: 0.8rem;
    }

    .top-text-b {
        top: -1.2rem;
        position: absolute;
        right: 1rem;
        text-align: right;
        font-size: 0.8rem;
    }

    .c {
        z-index: 99999;
    }

    .b {
        z-index: 99999;
    }

    /*.col-2 {*/
    /*    border:1px solid black;*/
    /*}*/
    .total_text {
        position: absolute;
        top: -8px;
        right: -8px;
    }
    .h-25{
        height: 25px !important;
    }

    .h-100{
        height: 100px !important;
    }

    .h-70{
        height: 70px !important;
    }
</style>
<div class="row h-25">
    <div class="col-2"></div>
    <div class="col-2 b-r ">
    </div>
    <div class="col-2"></div>
    <div class="col-2 b-r">
    </div>
    <div class="col-2"></div>
</div>
<div class="row h-70">
    <div class="col-2"></div>
    <div class="col-2 b blue b-r">
        <span class="top-text">@lang('lavel.between')</span>
    </div>
    <div class="col-2">
        <span class="data-text"><b>{{english_to_bangla($report_data['Approval']['within_time_line'])}}</b> টি</span>
    </div>
    <div class="col-2 b blue b-r">
        <span class="top-text">@lang('lavel.between')</span>
    </div>
    <div class="col-2">
        <span class="data-text"><b>{{english_to_bangla($report_data['RFP']['within_time_line'])}} </b> টি</span>
    </div>
</div>
<div class="row h-100">
    <div class="col-2">
        <span class="title text-center">TOR<br> পর্যায়ে  আছে </span>
    </div>
    <div class="col-2 b pink b-r b-b">
        <span class="top-text">@lang('lavel.prolonged')</span>
    </div>
    <div class="col-2 b-b">
        <span class="data-text"><b>{{english_to_bangla($report_data['Approval']['exceed_time_line'])}} </b> টি</span>
        <span class="title text-center">EOI<br> পর্যায়ে  আছে </span>
    </div>
    <div class="col-2 b pink b-r b-b">
        <span class="top-text">@lang('lavel.prolonged')</span>
    </div>
    <div class="col-2 b-b">
        <span class="data-text"><b>{{english_to_bangla($report_data['RFP']['exceed_time_line'])}} </b> টি</span>
        <span class="title text-center">Work Order<br> পর্যায়ে  আছে </span>
    </div>
</div>
<div class="row">
    <div class="col-2 c pink b-r "><span class="total_text text-white"> {{english_to_bangla($report_data['TOR']['total'])}} টি</span></div>
    <div class="col-2 c blue"><span class="total_text text-white"> {{english_to_bangla($report_data['Approval']['total'])}} টি</span></div>
    <div class="col-2 c violet b-r"><span class="total_text text-white"> {{english_to_bangla($report_data['EOI']['total'])}} টি</span></div>
    <div class="col-2 c yellow"><span class="total_text yellow text-white"> {{english_to_bangla($report_data['RFP']['total'])}} টি</span></div>
    <div class="col-2 c green b-r "><span class="total_text green text-white"> {{english_to_bangla($report_data['WorkOrder']['total'])}} টি</span></div>
</div>
<div class="row h-100">
    <div class="col-2 d blue b-r">
    </div>
    <div class="col-2">
        <span class="title-d text-center"><b>Approval</b> <br> পর্যায়ে  আছে </span>
    </div>
    <div class="col-2 d blue b-r">
    </div>
    <div class="col-2">
        <span class="title-d text-center"><b>RFP</b> <br> পর্যায়ে  আছে </span>
    </div>
    <div class="col-2 d blue b-r">
    </div>
</div>
<div class="row h-70">
    <div class="col-2 d pink b-r">
        <span class="top-text-b">@lang('lavel.between')</span>
    </div>
    <div class="col-2">
        <span class="data-text-d"><b>{{english_to_bangla($report_data['TOR']['within_time_line'])}} </b> টি</span>
    </div>
    <div class="col-2 d pink b-r">
        <span class="top-text-b">@lang('lavel.between')</span>
    </div>
    <div class="col-2">
        <span class="data-text-d"><b>{{english_to_bangla($report_data['EOI']['within_time_line'])}} </b> টি</span>
    </div>
    <div class="col-2 d pink b-r">
        <span class="top-text-b">@lang('lavel.between')</span>
    </div>
    <div class="col-2">
        <span class="data-text-d"><b>{{english_to_bangla($report_data['WorkOrder']['within_time_line'])}} </b> টি</span>
    </div>
</div>
<div class="row h-25">
    <div class="col-2 b-r">
        <span class="top-text-b">@lang('lavel.prolonged')</span>
    </div>
    <div class="col-2">
        <span class="data-text-d"><b>{{english_to_bangla($report_data['TOR']['exceed_time_line'])}} </b> টি</span>
    </div>
    <div class="col-2 b-r">
        <span class="top-text-b">@lang('lavel.prolonged')</span>
    </div>
    <div class="col-2">
        <span class="data-text-d"><b>{{english_to_bangla($report_data['EOI']['exceed_time_line'])}} </b> টি</span>
    </div>
    <div class="col-2 b-r">
        <span class="top-text-b">@lang('lavel.prolonged')</span>
    </div>
    <div class="col-2">
        <span class="data-text-d"><b>{{english_to_bangla($report_data['WorkOrder']['exceed_time_line'])}} </b> টি</span>
    </div>
</div>

<script>
    $('#left_days').html('{{english_to_bangla($left_days)}}');
    $('#total_incomplete_purchase').html('{{english_to_bangla($total_incomplete_purchase)}}')
</script>