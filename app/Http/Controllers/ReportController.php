<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    public function index()
    {

    }
    public function project_wise_indicator_data_index()
    {
        return view('report.project_wise_indicator_data.index');
    }
    public function project_wise_indicator_data_report()
    {
        return view('report.project_wise_indicator_data.report');
    }

    public function generatePDF()
    {
        $pdf = PDF::loadView('report.project_wise_indicator_data.report');
        return $pdf->download('itsolutionstuff.pdf');
    }
    public function print_friendly(Request $request)
    {

    }
}
