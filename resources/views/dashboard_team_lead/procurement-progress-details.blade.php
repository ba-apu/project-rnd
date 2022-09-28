@extends('layout.frontend')
@push('top_css')
    <link class="stylesheet" href="{{ custom_asset('assets/css/progress.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
    <div class="container-fluid p-t-5 p-l-25 p-b-5 p-r-25">
        <div class="row">
            <div class="col-8">
                <h1><i class="fa fa-arrow-left p-3" aria-hidden="true"></i> ক্রয় প্রক্রিয়ায় অগ্রগতি</h1>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-8 d-flex topbox-page6 p-4">
                <div class="w-50 text-center"> ক্রয় প্রস্তাবিত<br/>
                    <h3 class="mt-3">১২টি </h3>
                </div>
                <div class="w-50 text-center"> সম্পন্ন <br/>
                    <h3 class="mt-3">২টি </h3>
                </div>
                <div class="w-50 text-center"> চলমান <br/>
                    <h3 class="mt-3">৬টি</h3>
                </div>
            </div>
            <div class="col-4 d-flex mr-0 pr-0">
                <div class="col-6 topbox2-page6 p-4">
                    <div class="text-center">শুরু হয়নাই  <br/>
                        <h3 class="mt-3">৬টি</h3>
                    </div>
                </div>
                <div class="col-6 topbox3-page6 p-4 ">
                    <div class="text-center">প্রলম্বিত  <br/>
                        <h3 class="mt-3">৬টি</h3>
                    </div>

                </div>
            </div>
        </div>
        <div class="row p-3 mt-4 bodybox">

            <div class="col-2 pl-0">
                <select class="form-control">
                    <option> অবস্থা</option>
                </select>
            </div>
            <div class="col-2 pr-0">
                <select class="form-control">
                    <option>উৎস</option>
                </select>
            </div>
            <div class="offset-4 col-4 px-0">
                <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control" placeholder="Search by Name,Email etc">
                </div>
            </div>
            <table class="table">
                <thead class=" page5table thead-light">
                <tr>
                    <th>শিরোনাম </th>
                    <th>উদ্যোগ  <i class="fa fa-sort" aria-hidden="true"></i></th>
                    <th>অবস্থা <i class="fa fa-sort" aria-hidden="true"></i></th>
                    <th>উৎস <i class="fa fa-sort" aria-hidden="true"></i></th>
                    <th>বাজেট  <i class="fa fa-sort" aria-hidden="true"></i></th>
                    <th>সময়সীমা </th>
                    <th colspan="2">বিস্তারিত </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>২,৪০,০০০/=</td>
                    <td>কর্মশালা</td>
                    <td>চলমান</td>
                    <td>সরকার</td>
                    <td>মেহেদি হাসান সোম</td>
                    <td>৩০-১১-২০২১</td>
                    <td> ১মাস বাকী</td>
                    <td><i class="fa fa-arrow-right" aria-hidden="true"></i></td>

                </tr>
                <tr>
                    <td>২,৪০,০০০/=</td>
                    <td>কর্মশালা</td>
                    <td>চলমান</td>
                    <td>সরকার</td>
                    <td>মেহেদি হাসান সোম</td>
                    <td>৩০-১১-২০২১</td>
                    <td> ১মাস বাকী</td>
                    <td><i class="fa fa-arrow-right" aria-hidden="true"></i></td>

                </tr>
                <tr>
                    <td>২,৪০,০০০/=</td>
                    <td>কর্মশালা</td>
                    <td>চলমান</td>
                    <td>সরকার</td>
                    <td>মেহেদি হাসান সোম</td>
                    <td>৩০-১১-২০২১</td>
                    <td> ১মাস বাকী</td>
                    <td><i class="fa fa-arrow-right" aria-hidden="true"></i></td>

                </tr>
                <tr>
                    <td>২,৪০,০০০/=</td>
                    <td>কর্মশালা</td>
                    <td>চলমান</td>
                    <td>সরকার</td>
                    <td>মেহেদি হাসান সোম</td>
                    <td>৩০-১১-২০২১</td>
                    <td> ১মাস বাকী</td>
                    <td><i class="fa fa-arrow-right" aria-hidden="true"></i></td>

                </tr>
                <tr>
                    <td>২,৪০,০০০/=</td>
                    <td>কর্মশালা</td>
                    <td>চলমান</td>
                    <td>সরকার</td>
                    <td>মেহেদি হাসান সোম</td>
                    <td>৩০-১১-২০২১</td>
                    <td> ১মাস বাকী</td>
                    <td><i class="fa fa-arrow-right" aria-hidden="true"></i></td>

                </tr>
                <tr>
                    <td>২,৪০,০০০/=</td>
                    <td>কর্মশালা</td>
                    <td>চলমান</td>
                    <td>সরকার</td>
                    <td>মেহেদি হাসান সোম</td>
                    <td>৩০-১১-২০২১</td>
                    <td> ১মাস বাকী</td>
                    <td><i class="fa fa-arrow-right" aria-hidden="true"></i></td>

                </tr>
                <tr>
                    <td>২,৪০,০০০/=</td>
                    <td>কর্মশালা</td>
                    <td>চলমান</td>
                    <td>সরকার</td>
                    <td>মেহেদি হাসান সোম</td>
                    <td>৩০-১১-২০২১</td>
                    <td> ১মাস বাকী</td>
                    <td><i class="fa fa-arrow-right" aria-hidden="true"></i></td>

                </tr>
                <tr>
                    <td>২,৪০,০০০/=</td>
                    <td>কর্মশালা</td>
                    <td>চলমান</td>
                    <td>সরকার</td>
                    <td>মেহেদি হাসান সোম</td>
                    <td>৩০-১১-২০২১</td>
                    <td> ১মাস বাকী</td>
                    <td><i class="fa fa-arrow-right" aria-hidden="true"></i></td>

                </tr>
                <tr>
                    <td>২,৪০,০০০/=</td>
                    <td>কর্মশালা</td>
                    <td>চলমান</td>
                    <td>সরকার</td>
                    <td>মেহেদি হাসান সোম</td>
                    <td>৩০-১১-২০২১</td>
                    <td> ১মাস বাকী</td>
                    <td><i class="fa fa-arrow-right" aria-hidden="true"></i></td>

                </tr>
                <tr>
                    <td>২,৪০,০০০/=</td>
                    <td>কর্মশালা</td>
                    <td>চলমান</td>
                    <td>সরকার</td>
                    <td>মেহেদি হাসান সোম</td>
                    <td>৩০-১১-২০২১</td>
                    <td> ১মাস বাকী</td>
                    <td><i class="fa fa-arrow-right" aria-hidden="true"></i></td>

                </tr>
                </tbody>

            </table>
        </div>
    </div>

@endsection
