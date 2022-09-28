<?php

namespace App\Http\Controllers\Admin;

use App\Indicator;
use App\Project;
use App\User;
use App\UserRoleMapping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ManualData;
use Auth;
use App\Notification;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ManualDataEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $owner = UserRoleMapping::where('user_id', Auth::user()->id)->where('has_entry_permission',1)->pluck('project_id')->toArray();

        $query = ManualData::orderBy('id', 'desc')->orderBy('date', 'desc');
        if(Auth::user()->role != 1 && Auth::user()->role != 5 ){
            $query->whereIn('project_id', $owner);
        }
        if($request->project_id != ""){
            $query->where('project_id', $request->project_id);
        }

        $manualDatas = $query->paginate(20);

        return view('admin.manualDataEntry.index', compact('manualDatas', 'request'));
    }
    /*
    public function save_notification_to_firebase()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/a2i-dashboard-firebase-adminsdk-0vpnm-115846ba1b.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://a2i-dashboard.firebaseio.com')
            ->create();

        $database = $firebase->getDatabase();

        $newPost = $database
            ->getReference('blog/posts')
            ->push([
                'title' => 'Laravel FireBase Tutorial' ,
                'category' => 'Laravel'
            ]);
        echo '<pre>';
        print_r($newPost->getvalue());
    }
    */
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $owner = UserRoleMapping::where('user_id', Auth::user()->id)->where('has_entry_permission',1)->pluck('project_id')->toArray();
        $query = Project::where('status', 1);
        $indicators = Indicator::where('status', 1)->pluck('name','id');
        if(Auth::user()->role != 1 && Auth::user()->role != 5 ){
            $query->whereIn('id', $owner);
        }
        $projects = $query->pluck('name', 'id');
        return view('admin.manualDataEntry.create', compact('projects','indicators'));
    }


    public function show($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $rules = [
            'project_id' => 'required',
            'indicator_id' => 'required',
            'date' => 'required',
            'data' => 'required',
            'target_data' => 'required'
        ];
        $this->validate($request, $rules);

        $user = Auth::user();
        $date = date('Y-m-t', strtotime($request->date));

        $data = ManualData::firstOrNew([
            'project_id' => $request->project_id,
            'indicator_id' => $request->indicator_id,
            'date' =>$date,
        ]);

        $data->project_id = $request->project_id;
        $data->indicator_id = $request->indicator_id;
        $data->date = $date;
        $data->data_value = $request->data;
        $data->target_value = $request->target_data;
        $data->created_by = $user->id;
        $data->is_authorized = 0;
        $data->is_view = 0;

        //notification
        $projct = Project::where('id', $request->project_id)->first();
        //$indicator=Indicator::where('id',$request->indicator_id)->first();
        $notification_messege = $projct->bangla_name . " প্রকল্পে  একটি ম্যানুয়াল এন্ত্রিকৃত ডাটা এসেছে । ";
        //find the team lead  user_id
        $user_list = User::where('role', get_settings('team_lead_user_role'))->whereJsonContains('project_owner', [$request->project_id])->first();
        if (!empty($user_list)) {
            $to_user_id = $user_list->id;
        } else {
            $to_user_id = 1;
        }

        $button_link = "manual-data-authorize?project_id=" . $projct->id;
        save_notification_data($notification_messege, null, $user->id, $to_user_id, 0, null, null, "AUTH", 1, 'অথরাইজ করুন', $button_link);

        //end notification
        if ($data->save()) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Data successfully added!');
        } else {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Error Occurred!');
        }
        //dd($newPost);
        return redirect('manual-data-entry');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $manualData = ManualData::find($id);
        if (Auth::user()->role != 1 && $manualData->is_authorized) {
            return redirect('manual-data-entry');
        }
        return view('admin.manualDataEntry.edit', compact('manualData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'date' => 'required',
            'data' => 'required',
            'target_data' => 'required'
        ];
        $this->validate($request, $rules);

        $user = Auth::user();

        $data = ManualData::find($id);

        $data->date = date('Y-m-d', strtotime($request->input('date')));
        $data->data_value = $request->input('data');
        $data->target_value = $request->input('target_data');
        $data->updated_by = $user->id;

        if ($data->save()) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Data successfully added!');
        } else {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Error Occurred!');
        }
        return redirect('manual-data-entry');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        ManualData::destroy($id);
//        return true;
    }

    public function save_man_indicator_entry(Request $request)
    {
        $data_value = $request->value;
        $target_value = $request->target_value;
        $project_id = $request->project_id;
        $indicator_id = $request->indicator_id;
        $date = $request->date;

        $user = Auth::user();

        $data = new ManualData;

        $data->project_id = $project_id;
        $data->indicator_id = $indicator_id;
        $data->date = date('Y-m-t', strtotime($date));
        $data->data_value = $data_value;
        $data->target_value = $target_value;
        $data->created_by = $user->id;

        $data->save();
        $projct = Project::where('id', $project_id)->first();

        $notification_messege = $projct->bangla_name . " প্রকল্পে  একটি ম্যানুয়াল এন্ত্রিকৃত ডাটা এসেছে । ";
        //find the team lead  user_id
        $user_lists = User::where('role', 3)->whereJsonContains('project_owner', [$request->project_id])->get();
        if (!empty($user_lists)) {
            foreach ($user_lists as $user_list) {
                $to_user_id = $user_list->id;
            }
        } else {
            $to_user_id = 1;
        }

        $button_link = "manual-data-authorize?project_id=" . $projct->id;
        save_notification_data($notification_messege, null, $user->id, $to_user_id, 0, null, null, "AUTH", 1, 'অথরাইজ করুন', $button_link);

    }

    public function delete_manual_data(Request $request)
    {
        $id = $request->id;
        $msg = [];
        $manual_data = ManualData::find($id);
        if (!empty($manual_data)) {
            if ($manual_data->is_authorized == 0) {
                $manual_data->delete();

                $msg['type'] = 1;
                $msg['msg'] = ['তথ্যটি মুছে ফেলা হয়েছে'];

            } else {
                $msg['type'] = 0;
                $msg['msg'] = "এই তথ্যটি ইতিমধ্যে অনুমোদ করা হয়েছে ";
            }
        }
        return $msg;

    }
}
