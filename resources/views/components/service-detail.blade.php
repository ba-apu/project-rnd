@extends('layout.frontend')
@section('content')
    <div class="content sm-gutter">
        <!-- START BREADCRUMBS -->
        <div class="bg-white">
            <div class="container-fluid">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">হোম </a></li>
                    <li class="breadcrumb-item active">ডিজিটাল সেন্টার</li>
                </ol>
            </div>
        </div>
        <!-- END BREADCRUMBS -->
        <!-- START CONTAINER FLUID -->
        <div class="container-fluid padding-25 sm-padding-10">

            <div class="row m-b-20">
                <div class="col-lg-12 col-sm-6 d-flex flex-column bg-white">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-3"><div class="card-title pull-left">সেবা প্রদান</div> </div>
                                <div class="col-4">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default btn-md ">
                                            <input type="radio" name="options" id="option2"> গত ৭ দিন
                                        </label>
                                        <label class="btn btn-default btn-md active">
                                            <input type="radio" name="options" id="option1" checked> ৩০ দিন
                                        </label>
                                        <label class="btn btn-default btn-md ">
                                            <input type="radio" name="options" id="option2"> ৩ মাস
                                        </label>
                                        <label class="btn btn-default btn-md">
                                            <input type="radio" name="options" id="option3"> বছর
                                        </label>
                                        <label class="btn btn-default btn-md">
                                            <input type="radio" name="options" id="option3">পছন্দ মত
                                        </label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="pull-right">
                                        <select class="cs-select cs-skin-slide" data-init-plugin="cs-select">
                                            <option value="sightseeing">বিভাগ</option>
                                        </select>
                                        <select class="cs-select cs-skin-slide" data-init-plugin="cs-select">
                                            <option value="sightseeing">জেলা</option>
                                        </select>
                                        <select class="cs-select cs-skin-slide" data-init-plugin="cs-select">
                                            <option value="sightseeing">উপজেলা</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <button class="btn btn-green btn-md pull-right m-r-20" data-target="#modalSlideLeft" data-toggle="modal">ফিল্টার</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-hover table-condensed" id="condensedTable">
                                    <thead>
                                    <tr>
                                        <th>নাম</th>
                                        <th>ঠিকানা</th>
                                        <th>জেলা</th>
                                        <th>উপজেলা</th>
                                        <th>ইউনিয়ন</th>
                                        <th>সেবা প্রদান</th>
                                        <th>পুরুষ</th>
                                        <th>মহিলা</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle semi-bold">আমার সোনার বাংলা</td>
                                        <td class="v-align-middle">আগারগাও ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা</td>
                                        <td class="v-align-middle">ঢাকা সদর</td>
                                        <td class="v-align-middle"></td>
                                        <td class="v-align-middle semi-bold">৪৬৩</td>
                                        <td class="v-align-middle semi-bold">৩০০</td>
                                        <td class="v-align-middle semi-bold">১৬৩</td>
                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END card -->
                </div>
            </div>
            <!-- Service Status End -->

        </div>
        <!-- END CONTAINER FLUID -->
    </div>
    <!-- MODAL STICK UP SMALL ALERT -->
    <div class="modal fade slide-right" id="modalSlideLeft" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <div class="container-xs-height full-height">
                        <div class="row-xs-height">
                            <div class="modal-body col-xs-height col-middle text-center   ">
                                <form class="" role="form">
                                    <div class="form-group form-group-default required">
                                        <label>ডাটা ফিল্ড ১</label>
                                        <input type="email" class="form-control" required="" placeholder="ডাটা ফিল্ড ২" autocomplete="off">
                                    </div>
                                    <div class="form-group  form-group-default required">
                                        <label>ডাটা ফিল্ড ২</label>
                                        <input type="email" class="form-control" placeholder="ডাটা ফিল্ড ২" required="">
                                    </div>
                                    <div class="form-group form-group-default ">
                                        <label>ডাটা ফিল্ড ৩</label>
                                        <input type="email" class="form-control" placeholder="ডাটা ফিল্ড ২">
                                    </div>
                                    <div class="form-group form-group-default">
                                        <label>ডাটা ফিল্ড ৪</label>
                                        <input type="email" class="form-control" placeholder="ডাটা ফিল্ড ২" >
                                    </div>
                                </form>
                                <br>
                                <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">অনুসন্ধান</button>
                                <button type="button" class="btn btn-default btn-block" data-dismiss="modal">বাতিল</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- END MODAL STICK UP SMALL ALERT -->
@endsection
@section('script')

    {!! HTML::script('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') !!}
    {!! HTML::script('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js') !!}

    {!! HTML::script('assets/js/dashboard.js') !!}
    {!! HTML::script('assets/js/scripts.js') !!}
    <!-- High Chart JS Starts -->
    {!! HTML::script('js/lib/highcharts/code/highcharts.js') !!}
    {!! HTML::script('js/lib/highcharts/code/highcharts-more.js') !!}
    {!! HTML::script('js/lib/highcharts/code/modules/exporting.js') !!}
    <!-- High Chart JS Ends -->

    <script type="text/javascript">

        function showDis(e, target) {
            $('.district_' + target).toggle();
            $('#icon_' + target).toggleClass('fa-plus');
            $('#icon_' + target).toggleClass('fa-minus');
//            $(e).closest('i').next().find('.fa').css( "background-color", "red" );
        }

        $(function () {
            $('.district').hide();
        });

        // Service Provide graph
        Highcharts.chart('service-provide', {
            chart: {
                type: 'line'
            },
            credits: {
                enabled: false
            },
            defaultSeriesType: 'areaspline',
            xAxis: {
                categories: ['ফেব্রু ১ ', 'ফেব্রু ২', 'ফেব্রু ৩', 'ফেব্রু ৪', 'ফেব্রু ৫', 'ফেব্রু ৬', 'ফেব্রু ৭', 'ফেব্রু ৮', 'ফেব্রু ৯', 'ফেব্রু ১০', 'ফেব্রু ১১ ', 'ফেব্রু ১২', 'ফেব্রু ১৩', 'ফেব্রু ১৪', 'ফেব্রু ১৫', 'ফেব্রু ১৬', 'ফেব্রু ১৭', 'ফেব্রু ১৮', 'ফেব্রু ১৯', 'ফেব্রু ২০', 'ফেব্রু ২১ ', 'ফেব্রু ২২', 'ফেব্রু ২৩', 'ফেব্রু ২৪', 'ফেব্রু ২৫', 'ফেব্রু ২৬', 'ফেব্রু ২৭', 'ফেব্রু ২৮']
            },
            yAxis: {
                title: {
                    text: 'হাজার'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: false
                    },
                    enableMouseTracking: true
                }
            },
            series: [{
                name: 'প্রত্যাশিত সেবা প্রদান',
                data: [{{ App\Common:: randonIncreasingNumbers(28,30,20) }}]
            }, {
                name: 'প্রকৃত সেবা প্রদান',
                data: [{{ App\Common:: randonNumbers(28,17,7) }}]
            }]
        });

        // Office/Institute status
        Highcharts.chart('container', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Monthly Average Temperature'
            },
            credits: {
                enabled: false
            },
            xAxis: {
                categories: ['ফেব্রু ১ ', 'ফেব্রু ২', 'ফেব্রু ৩', 'ফেব্রু ৪', 'ফেব্রু ৫', 'ফেব্রু ৬', 'ফেব্রু ৭', 'ফেব্রু ৮', 'ফেব্রু ৯', 'ফেব্রু ১০', 'ফেব্রু ১১ ', 'ফেব্রু ১২', 'ফেব্রু ১৩', 'ফেব্রু ১৪', 'ফেব্রু ১৫', 'ফেব্রু ১৬', 'ফেব্রু ১৭', 'ফেব্রু ১৮', 'ফেব্রু ১৯', 'ফেব্রু ২০', 'ফেব্রু ২১ ', 'ফেব্রু ২২', 'ফেব্রু ২৩', 'ফেব্রু ২৪', 'ফেব্রু ২৫', 'ফেব্রু ২৬', 'ফেব্রু ২৭', 'ফেব্রু ২৮']
            },
            yAxis: {
                title: {
                    text: 'হাজার'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [
            @foreach($serviceLists as $serviceList)
                {
                    name: '{{ $serviceList }}',
                    data: [{{ App\Common:: randonNumbers(28,17,7) }}]
                },
            @endforeach
            ]
        });

        // Office/Institute status
        Highcharts.chart('institute-container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Browser market shares. January, 2018'
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Total percent market share'
                }

            },
            credits: {
                enabled: false
            },
            legend: {
                enabled: false
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f} হাজার সেবা প্রদান<br/>'
            },

            "series": [
                {
                    "name": "Browsers",
                    "colorByPoint": true,
                    "data": [
                            @foreach($sample_udc as $udc)
                                {
                                    name: '{{ $udc }}',
                                    "y": {{ rand(30, 98) }}
                                },
                            @endforeach
                    ]
                }
            ]
        });

        // Office/Institute status
        Highcharts.chart('user-container', {
            chart: {
                type: 'line'
            },
            credits: {
                enabled: false
            },
            title: {
                text: 'Monthly Average Temperature'
            },
            xAxis: {
                categories: ['ফেব্রু ১ ', 'ফেব্রু ২', 'ফেব্রু ৩', 'ফেব্রু ৪', 'ফেব্রু ৫', 'ফেব্রু ৬', 'ফেব্রু ৭', 'ফেব্রু ৮', 'ফেব্রু ৯', 'ফেব্রু ১০', 'ফেব্রু ১১ ', 'ফেব্রু ১২', 'ফেব্রু ১৩', 'ফেব্রু ১৪', 'ফেব্রু ১৫', 'ফেব্রু ১৬', 'ফেব্রু ১৭', 'ফেব্রু ১৮', 'ফেব্রু ১৯', 'ফেব্রু ২০', 'ফেব্রু ২১ ', 'ফেব্রু ২২', 'ফেব্রু ২৩', 'ফেব্রু ২৪', 'ফেব্রু ২৫', 'ফেব্রু ২৬', 'ফেব্রু ২৭', 'ফেব্রু ২৮']
            },
            yAxis: {
                title: {
                    text: 'ইউ ডি সি এর সংখ্যা'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                name: 'নিবন্ধিত',
                data: [{{ App\Common:: randonNumbers(28,150,155) }}]
            }, {
                name: 'সক্রিয়',
                data: [{{ App\Common:: randonNumbers(28,110,75) }}]
            }]
        });

        // UDC Income Range
        var ranges = [
                [1246406400000, 14.3, 27.7],
                [1246492800000, 14.5, 27.8],
                [1246579200000, 15.5, 29.6],
                [1246665600000, 16.7, 30.7],
                [1246752000000, 16.5, 25.0],
                [1246838400000, 17.8, 25.7],
                [1246924800000, 13.5, 24.8],
                [1247011200000, 10.5, 21.4],
                [1247097600000, 9.2, 23.8],
                [1247184000000, 11.6, 21.8],
                [1247270400000, 10.7, 23.7],
                [1247356800000, 11.0, 23.3],
                [1247443200000, 11.6, 23.7],
                [1247529600000, 11.8, 20.7],
                [1247616000000, 12.6, 22.4],
                [1247702400000, 13.6, 19.6],
                [1247788800000, 11.4, 22.6],
                [1247875200000, 13.2, 25.0],
                [1247961600000, 14.2, 21.6],
                [1248048000000, 13.1, 17.1],
                [1248134400000, 12.2, 15.5],
                [1248220800000, 12.0, 20.8],
                [1248307200000, 12.0, 17.1],
                [1248393600000, 12.7, 18.3],
                [1248480000000, 12.4, 19.4],
                [1248566400000, 12.6, 19.9],
                [1248652800000, 11.9, 20.2],
                [1248739200000, 11.0, 19.3],
                [1248825600000, 10.8, 17.8],
                [1248912000000, 11.8, 18.5],
                [1248998400000, 10.8, 16.1]
            ],
            averages = [
                [1246406400000, 21.5],
                [1246492800000, 22.1],
                [1246579200000, 23],
                [1246665600000, 23.8],
                [1246752000000, 21.4],
                [1246838400000, 21.3],
                [1246924800000, 18.3],
                [1247011200000, 15.4],
                [1247097600000, 16.4],
                [1247184000000, 17.7],
                [1247270400000, 17.5],
                [1247356800000, 17.6],
                [1247443200000, 17.7],
                [1247529600000, 16.8],
                [1247616000000, 17.7],
                [1247702400000, 16.3],
                [1247788800000, 17.8],
                [1247875200000, 18.1],
                [1247961600000, 17.2],
                [1248048000000, 14.4],
                [1248134400000, 13.7],
                [1248220800000, 15.7],
                [1248307200000, 14.6],
                [1248393600000, 15.3],
                [1248480000000, 15.3],
                [1248566400000, 15.8],
                [1248652800000, 15.2],
                [1248739200000, 14.8],
                [1248825600000, 14.4],
                [1248912000000, 15],
                [1248998400000, 13.6]
            ];
        Highcharts.chart('udc-income-container', {

            title: {
                text: 'July temperatures'
            },

            xAxis: {
                type: 'datetime'
            },
            credits: {
                enabled: false
            },

            yAxis: {
                title: {
                    text: null
                }
            },

            tooltip: {
                crosshairs: true,
                shared: true,
                valueSuffix: '°C'
            },

            legend: {},

            series: [{
                name: 'প্রতিদিনের গড় আয়',
                data: averages,
                zIndex: 1,
                marker: {
                    fillColor: 'white',
                    lineWidth: 2,
                    lineColor: Highcharts.getOptions().colors[0]
                }
            }, {
                name: 'প্রতিদিনের সরবচ্চ ও সর্বনিম্ন',
                data: ranges,
                type: 'arearange',
                lineWidth: 0,
                linkedTo: ':previous',
                color: Highcharts.getOptions().colors[0],
                fillOpacity: 0.3,
                zIndex: 0,
                marker: {
                    enabled: false
                }
            }]
        });


        // UDC Income Range
        var ranges2 = [
                    @foreach($sample_udc as $udc)
                        ['{{ $udc }}', {{ rand(150, 130) }}, {{ rand(50, 70) }}],
                    @endforeach

            ],
            averages2 = [
                    @foreach($sample_udc as $udc)
                    ['{{ $udc }}', {{ rand(90, 110) }}],
                    @endforeach
            ];
        Highcharts.chart('udc-personal-income-container', {

            title: {
                text: 'July temperatures'
            },

            xAxis: {
                type: 'datetime'
            },
            credits: {
                enabled: false
            },

            yAxis: {
                title: {
                    text: null
                }
            },

            tooltip: {
                crosshairs: true,
                shared: true,
                valueSuffix: ' হাজার'
            },

            legend: {},

            series: [{
                name: 'প্রতিদিনের গড় আয়',
                data: averages2,
                zIndex: 1,
                marker: {
                    fillColor: 'white',
                    lineWidth: 2,
                    lineColor: Highcharts.getOptions().colors[0]
                }
            }, {
                name: 'প্রতিদিনের সরবচ্চ ও সর্বনিম্ন',
                data: ranges2,
                type: 'arearange',
                lineWidth: 0,
                linkedTo: ':previous',
                color: Highcharts.getOptions().colors[0],
                fillOpacity: 0.3,
                zIndex: 0,
                marker: {
                    enabled: false
                }
            }]
        });



        Highcharts.chart('finance-container', {
            credits: {
                enabled: false
            },
            chart: {
                type: 'area'
            },
            title: {
                text: 'US and USSR nuclear stockpiles'
            },

            xAxis: {
                allowDecimals: false,
                labels: {
                    formatter: function () {
                        return this.value; // clean, unformatted number for year
                    }
                }
            },
            yAxis: {
                title: {
                    text: 'ব্যায় (লক্ষ)'
                },
                labels: {
                    formatter: function () {
                        return this.value / 1000 + 'k';
                    }
                }
            },
            tooltip: {
                pointFormat: '{series.name} had stockpiled <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
            },
            plotOptions: {
                area: {
                    pointStart: 1940,
                    marker: {
                        enabled: false,
                        symbol: 'circle',
                        radius: 2,
                        states: {
                            hover: {
                                enabled: true
                            }
                        }
                    }
                }
            },
            series: [{
                name: 'প্রাক্কলিত ব্যায়',
                data: [
                    null, null, null, null, null, 6, 11, 32, 110, 235,
                    369, 640, 1005, 1436, 2063, 3057, 4618, 6444, 9822, 15468,
                    20434, 24126, 27387, 29459, 31056, 31982, 32040, 31233, 29224, 27342,
                    26662, 26956, 27912, 28999, 28965, 27826, 25579, 25722, 24826, 24605,
                    24304, 23464, 23708, 24099, 24357, 24237, 24401, 24344, 23586, 22380,
                    21004, 17287, 14747, 13076, 12555, 12144, 11009, 10950, 10871, 10824,
                    10577, 10527, 10475, 10421, 10358, 10295, 10104, 9914, 9620, 9326,
                    5113, 5113, 4954, 4804, 4761, 4717, 4368, 4018
                ]
            }, {
                name: 'অনুমদিত ব্যায়',
                data: [null, null, null, null, null, null, null, null, null, null,
                    5, 25, 50, 120, 150, 200, 426, 660, 869, 1060,
                    1605, 2471, 3322, 4238, 5221, 6129, 7089, 8339, 9399, 10538,
                    11643, 13092, 14478, 15915, 17385, 19055, 21205, 23044, 25393, 27935,
                    30062, 32049, 33952, 35804, 37431, 39197, 45000, 43000, 41000, 39000,
                    37000, 35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000, 22000,
                    21000, 20000, 19000, 18000, 18000, 17000, 16000, 15537, 14162, 12787,
                    12600, 11400, 5500, 4512, 4502, 4502, 4500, 4500
                ]
            },{
                name: 'প্রকৃত ব্যায়',
                data: [null, null, null, null, null, null, null, null, null, null,
                    5, 25, 50, 120, 150, 200, 426, 660, 869, 1060,
                    1605, 2471, 3322, 4238, 5221, 6129, 7089, 8339, 9399, 10538,
                    11643, 13092, 14478, 5915, 7385, 9055, 11205, 13044, 15393, 17935,
                    20062, 22049, 23952, 25804, 27431, 29197, 35000, 33000, 31000, 29000,
                    27000, 25000, 23000, 21000, 29000, 27000, 25000, 24000, 23000, 22000,
                    21000, 20000, 19000, 18000, 18000, 17000, 16000, 15537, 14162, 12787,
                    12600, 11400, 5500, 4512, 4502, 4502, 4500, 4500
                ]
            }]
        });
        chart.reflow();

    </script>
@endsection
