@if($coefficient_data)
    <div class="col-6 p-2">
        <div style="color:#50beff;" class="p-2 bg-white all-border border-round">
            <div class="text-center ">
                <h5 class="pl-3">যে সকল সূচক "{{$indicator_bn_name}}" বাড়াবার ক্ষেত্রে ভূমিকা রেখেছে </h5>
                <div class="d-flex flex-column offset-10 col-2 p-0 text-center mb-1" style="color: #00a300;">
                    <span class="fs-11">গুরুত্ব </span>
                    <span class="fs-10">(১ এর মধ্যে)</span>
                    <span class="fs-10"><i class="fa fa-arrow-down"></i></span>
                </div>
                @php
                    $i = 1;
                @endphp

                @foreach($coefficient_data as $key=>$data)
                    @if($data <= 0)
                        <div class="row m-0 py-3 px-2 all-border border-round" style="color: #00a300;">
                            <div class="col-1">
                                <div class="circle green-circle">
                                    <span class="text-black">{{english_to_bangla($i)}}</span>
                                </div>
                            </div>
                            <div class="col-9 text-left">
                                <h6 class="m-0">{{$key}} </h6>
                            </div>
                            <div class="col-2 text-right">
                                <span class="fs-11" style="color: #00a300;">{{english_to_bangla($data)}}</span>
                            </div>
                        </div>
                        @php
                            $i++;
                        @endphp

                    @else
                        <div class="row m-0 py-3 px-2 all-border border-round justify-content-center" style="color: #d9534f;">
                            <span class="fs-16 text-danger text-center">কোনো ডাটা নেই</span>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-6 p-2">
        <div style="color:#50beff;" class="p-2 bg-white all-border border-round">
            <div class="text-center ">
                <h5 class="pl-3">যে সকল সূচক "{{$indicator_bn_name}}" কমাবার ক্ষেত্রে ভূমিকা রেখেছে </h5>
                <div class="d-flex flex-column offset-10 col-2 p-0 text-center mb-1" style="color: #d39c00;">
                    <span class="fs-11">গুরুত্ব </span>
                    <span class="fs-10">(১ এর মধ্যে)</span>
                    <span class="fs-10"><i class="fa fa-arrow-down"></i></span>
                </div>
                @php
                    $i = 1;
                @endphp

                @foreach($coefficient_data as $key=>$data)
                    @if($data < 0)
                        <div class="row m-0 py-3 px-2 all-border border-round" style="color: #d39c00;">
                            <div class="col-1">
                                <div class="circle green-circle">
                                    <span class="text-black">{{english_to_bangla($i)}}</span>
                                </div>
                            </div>
                            <div class="col-9 text-left">
                                <h6 class="m-0">{{$key}} </h6>
                            </div>
                            <div class="col-2 text-right">
                                <span class="fs-11" style="color: #00a300;">{{english_to_bangla($data)}}</span>
                            </div>
                        </div>
                        @php
                            $i++;
                        @endphp

                    @else
                        <div class="row m-0 py-3 px-2 all-border border-round justify-content-center" style="color: #d9534f;">
                            <span class="fs-16 text-danger text-center">কোনো ডাটা নেই</span>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

@else
    <div class="col-12 p-2">
        <div class="row m-0 py-3 px-2 all-border border-round justify-content-center" style="color: #d9534f;">
            <span class="fs-16 text-danger text-center">কোনো ডাটা নেই</span>
        </div>
    </div>
@endif
