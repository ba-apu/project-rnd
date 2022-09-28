<?php

namespace App\Http\Controllers;

use App\Drr;
use App\Project;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use App\MySqlModel;
use Auth;
use App\ManualData;
use App\Indicator;
use App\User;
use DateTime;

class FileParseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Read DRR Data from DRR API Call
     *
     * @return Response
     */
    public function importData(Request $request) {
        if($request->isMethod('post')){
            $rules = [
                'import_file' => 'required',
                'project' => 'required'
            ];

            $this->validate($request, $rules);

            $project = Project::find($request->project);

            $projectModel = $project->model_name;

            $file = $request->file('import_file');
            if ($request->hasFile('import_file')) {
                // File Details
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $tempPath = $file->getRealPath();
                $fileSize = $file->getSize();
                $mimeType = $file->getMimeType();

                // Valid File Extensions
                $valid_extension = array("csv");

                // Check file extension
                if(in_array(strtolower($extension), $valid_extension)){
                    $loc = 'uploads';
                    $location = public_path('uploads');
                    $filename = $filename . '_' . time() . '.' . $extension;
                    // Upload file
                    $file->move($location, $filename);

                    // Import CSV to Database
                    $filepath = public_path($loc . "/" . $filename);

                    $collection = (new FastExcel())->import($filepath);

                    foreach ($collection as $data){
                        $data['project_id'] = $request->project;
                        $data['provided_date'] = date('Y-m-d', strtotime($data['provided_date']));
                        $model_name= '\\App\\'.$projectModel;
                        //$model = new $model_name;
                        $result = $model_name::create($data);
                        //echo "<pre>"; print_r($data); die;
                        //$result=MySqlModel::setCollection('lands')->create($data);
                    }

                    $request->session()->flash('status', 'success');
                    $request->session()->flash('message', 'File imported successfully.');
                }
            }
        }
        return view('fileparse.import');
    }

    public function import_manual_indicator_csv(Request $request)
    {
        $project_id = $request->project;
        $project = Project::find($request->project);
        if($request->isMethod('post')){

            if($request->confirm_screen)
            {
                $value = $request->session()->get('data_upload', 'default');
                foreach ($value as  $indicator_id=>$d)
                {
                    foreach($d as $date=>$r)
                    {
                        $this->store_data($project_id, $indicator_id, $date, $r['data'], $r['target_data']);
                    }
                }
                //success tranfer
                $request->session()->flash('status', 'success');
                $request->session()->flash('message', 'বাল্ক  ম্যানুয়াল ডাটা আপলোড সফল ভাবে সম্পন্ন হয়েছে');
                //return view('fileparse.import_manual_indicator_preview', compact('data','project'));
            }else {
                $rules = [
                    'import_file' => 'required',
                    'project' => 'required'
                ];

                $this->validate($request, $rules);
                $file = $request->file('import_file');

                if ($request->hasFile('import_file')) {
                    // File Details
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();

                    if($extension != "csv"){
                        $request->session()->flash('status', 'error');
                        $request->session()->flash('message', 'Invalid file type');
                        return redirect()->back();
                    }
//                    $tempPath = $file->getRealPath();
//                    $fileSize = $file->getSize();
//                    $mimeType = $file->getMimeType();

                    // Valid File Extensions
                    $valid_extension = array("csv");

                    //echo strtolower($extension); die;

                    // Check file extension
                    if (in_array(strtolower($extension), $valid_extension)) {
                        $loc = 'uploads';
                        $location = public_path('uploads');
                        $filename = $filename . '_' . time() . '.' . $extension;
                        // Upload file
                        $file->move($location, $filename);

                        // Import CSV to Database
                        $filepath = public_path($loc . "/" . $filename);

                        $collection = (new FastExcel())->import($filepath);

                        $indicator_project_id = Indicator::where('id', $collection[0]['id'])->value('project_id');

                        if($project_id != $indicator_project_id){
                            $request->session()->flash('status', 'error');
                            $request->session()->flash('message', 'Please select valid initiative');
                            return redirect()->back();
                        }

                        $data = [];
                        foreach ($collection as $k => $r) {
                            $is_data = 1;
                            $id = 0;
                            foreach ($r as $k2 => $r2) {
                                if ($k2 == 'id') {
                                    $id = $r2;
                                } elseif ($k2 == 'name') {
                                    if ($r2 == 'target') {
                                        $is_data = false;
                                    }
                                } else {
                                    $dt=date('d',strtotime($k2));
                                    $mo=date('m',strtotime($k2));
                                    $ye=date('y',strtotime($k2));
                                    $ndt=$dt."-".$mo."-".$ye;
                                    $formatted_date=date('Y-m-d',strtotime($ndt));
                                    if ($is_data) {
                                        $data[$id][$formatted_date]['data'] = $r2;
                                    } else {
                                        $data[$id][$formatted_date]['target_data'] = $r2;
                                    }
                                }
                            }
                        }
                        if (!empty($data)) {
                            $q=Indicator::where('project_id',$project->id)->get();
                            $indicator_lists=[];
                            foreach($q as $r)
                            {
                                $indicator_lists[$r->id]=$r->short_form;
                            }
                            $request->session()->put('data_upload', $data);
                            return view('fileparse.import_manual_indicator_preview', compact('data','project','indicator_lists'));
                        }

                        $request->session()->flash('status', 'success');
                        $request->session()->flash('message', 'File imported successfully.');
                    }
                }
            }
        }
        return view('fileparse.import_manual_indicator_csv');
    }

    public function store_data($project_id,$indicator_id,$date,$data,$target_data)
    {
        $data_value=$data;
        $target_value=$target_data;

        $project_id=$project_id; //echo $project_id."<br>";
        $indicator_id=$indicator_id;

        $date=$date;

        $user = Auth::user();

        //$data=array();
        $data=new ManualData;

        $data->project_id=$project_id;
        $data->indicator_id= $indicator_id;
        $data->date= date('Y-m-d',strtotime($date));
        $data->data_value=$data_value;
        $data->target_value=$target_value;
        $data->created_by=$user->id;


        $data->save();

        $projct=Project::where('id',$project_id)->first();

        $indicator=Indicator::where('id',$indicator_id)->first();
        $notification_messege=$projct->bangla_name." প্রকল্পে  একটি ম্যানুয়াল এন্ত্রিকৃত ডাটা এসেছে । ";
        //find the team lead  user_id
        $user_lists=User::where('role',get_settings('team_lead_user_role'))->whereJsonContains('project_owner',[$project_id])->get();
        if(!empty($user_lists))
        {
            foreach ($user_lists as $user_list) {
                $to_user_id = $user_list->id;
            }
        }else{
            $to_user_id=1;
        }

        $button_link="manual-data-authorize?project_id=".$projct->id;
        //save_notification_data($notification_messege,null,$user->id,$to_user_id,0,null,null,"AUTH",1,'অথরাইজ করুন',$button_link);


        return true;
    }
}
