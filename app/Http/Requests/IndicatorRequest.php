<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class IndicatorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $req_param = '';
        if ($request->input('data_process') == 'API') {
            $req_param = 'required';
        }
        return [
            'name' => 'required',
            'bangla_name' => 'required',
            'project_id' => 'required',
            'default_chart' => 'required',
            'data_process' => 'required',
            'user_based' => $req_param,
            'geo_type' => $req_param,
            'ref_table_name' => $req_param,
            'table_columns' => $req_param,
            'unit' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'সূচক field is required',
            'bangla_name.required' => 'বাংলা নাম field is required',
            'project_id.required' => 'উদ্যোগ field is required',
            'data_process.required' => 'ডাটা প্রসেস field is required',
            'default_chart.required' => 'প্রধান চার্ট field is required',
            'user_based.required' => 'ব্যবহারকারী সংক্রান্ত field is required',
            'geo_type.required' => 'জিও টাইপ field is required',
            'ref_table_name.required' => 'টেবিল নাম field is required',
            'table_columns.required' => 'টেবিল কলাম field is required',
            'unit.required' => 'ইউনিট field is required',
        ];
    }
}
