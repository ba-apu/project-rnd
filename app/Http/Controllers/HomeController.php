<?php

namespace App\Http\Controllers;

use App\OTPLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\VerigyForgetPassword;
use Illuminate\Support\Facades\Hash;
use App\Project;
use App\ProjectCategory;
use App\Task;
use App\TaskMeta;
use App\Event;
use Validator;
use Session;
use Response;
use DB;
use App\Indicator;

use App\QprTarget;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


	public function popo()
	{
		 return view('popo');
	}
	public function access_denied()
    {
        return view('layout.access_denied');
    }
    public function forget_password(Request $request)
    {
        $data='';
        if($_POST)
        {

            //$output = getCurlPostForSMS("","");
            //dd($output);
            $randomNum =generateRadmonText();
            // $body='আপনাকে এই অস্থায়ী সংক্ষিপ্ত পাসওয়ার্ড টি পাঠানো হয়েছে :'.$randomNum;
            // $subject ='Forget Password !! (Dashboard)';
            // $toMail=$request->email;
            //sendMail($toMail,$body,$subject);

            $user =$user = User::where('mobile_no', $request->mobile_no)->first();
            if($user != null){
                if(getCurlPostForSMS($request->mobile_no,"Your pin number is:".$randomNum)){
                    $data=__('lavel.otp_send_pin_message');

                    $otp_log = new OTPLog();
                    $otp_log->mobile_no=$request->mobile_no;
                    $otp_log->otp_code =$randomNum;
                    $otp_log->save();

                    $mobile_no=$request->mobile_no;
                    $request->session()->flash('data', __('lavel.otp_send_pin_message'));
                    $request->session()->flash('mobile_no', $mobile_no);
                    return redirect('/verify');
                    //return view('layout.verify',compact('data','mobile_no'));

                }else{
                    $data= __('lavel.otp_error_send_pin_message');
                }

            }else{
                $data= __('lavel.mobile_not_match');
            }
        }

        return view('layout.forget_password',compact('data'));
    }

    public function verify(Request $request)
    {
        $data='';
        if($_POST)
        {
            $mobile_no=$request->mobile_no;
            $data = '';
            $otp_log = OTPLog::where('mobile_no', $request->mobile_no)->orderBy('created_at','DESC')->first();


            if($request->otp_code == $otp_log->otp_code){
                $randomNum =generateRadmonText();
                if(getCurlPostForSMS($request->mobile_no,"Your Temporary Password is:".$randomNum)){
                    $otp_log->otp_code=$randomNum;
                    $otp_log->send_status =1;
                    $otp_log->save();

                    $verify_password = new VerigyForgetPassword();
                    $verify_password->mobile_no=$request->mobile_no;
                    $hashedPassword =Hash::make($randomNum);
                    $verify_password->otp_code = $hashedPassword;

                    $user = User::where('mobile_no', $request->mobile_no)->first();
                    $user->password=$hashedPassword;

                    if($verify_password->save() && $user->save()){

                        $data= __('lavel.otp_password_message');

                        return redirect('/login')->with('data', $data);
                        //return view('auth.login',compact('data'));
                    }
                }else{
                    $data= __('lavel.otp_error_send_pin_message');
                }
            }else{
                //return redirect('/verify');
                // $data= __('lavel.otp_not_match');
                // return view('layout.verify',compact('data','mobile_no'));

                $request->session()->flash('data', __('lavel.otp_not_match'));
                $request->session()->flash('mobile_no', $mobile_no);
                return redirect('/verify');
            }
        }
        return view('layout.verify');

    }
    public function project_page(Request $request)
    {

        $project_lists = Project::all();
        $project_list_id = $request->project_id;

        if ($request->isMethod('get')) {
            return view('test.page1',compact('project_lists','project_list_id'));
        }

        $message = array(
            'project_id.required' =>'উদ্যোগ পূরণ করতে হবে',
            'indicator_id.required' =>'সূচক  পূরণ করতে হবে',
            'target.required' =>'লক্ষ্য ২০২০ পূরণ করতে হবে',
            'q1.required' =>'কোয়াটার ১ পূরণ করতে হবে',
            'q2.required' =>'কোয়াটার ২ পূরণ করতে হবে',
            'q3.required' =>'কোয়াটার ৩ পূরণ করতে হবে',
            'q4.required' =>'কোয়াটার ৪ পূরণ করতে হবে',
            //'budget.required' =>'বাজেট  পূরণ করতে হবে',
        );

        $this->validate($request,[
            'project_id'    =>'required',
            'indicator_id'     => 'required',
            'target'   => 'required',
            'q1'          => 'required',
            "q2"         => "required",
            "q3"       => "required",
            "q4"       => "required",
            //"budget"       => "required",
        ] ,$message);


        // $task = new Task ();
        // $task->project_id = $request->project_id;
        // $task->task_name = $request->task_name;
        // $task->description = $request->description;
        // $task->date = date('y-m-d',strtotime($request->date));
        // $task->save();

        // $task_apply = new TaskMeta();

        // $task_apply->task_id = $task->id;
        // $task_apply->value = $request->apply;
        // $task_apply->key = 'Apply';
        // $task_apply->date = date('y-m-d',strtotime($request->date));
        // $task_apply->save();

        // $task_pre_approve = new TaskMeta();

        // $task_pre_approve->task_id = $task->id;
        // $task_pre_approve->value = $request->pre_approve;
        // $task_pre_approve->key = 'PreApprove';
        // $task_pre_approve->date = date('y-m-d',strtotime($request->date));
        // $task_pre_approve->save();


        $qpr = new QprTarget();

        $qpr->project_id = $request->project_id;
        $qpr->indicator_id = $request->indicator_id;
        $qpr->target = $request->target;
        $qpr->q1 = $request->q1;
        $qpr->q2 = $request->q2;
        $qpr->q3 = $request->q3;
        $qpr->q4 = $request->q4;
        //$qpr->budget = $request->budget;

        $qpr->save();





        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'পরিকল্পনা সফলভাবে সংরক্ষণ হয়েছে।');
        // Session::put('message','পরিকল্পনা সফলভাবে সংরক্ষণ হয়েছে।');
        return Redirect::to('/page2/'."?qpr_target_id=".$qpr->id);

    }


    public function page2(Request $request)
    {

        $qpr_target_id = $request->qpr_target_id;

        $single_task = QprTarget::find($qpr_target_id);

        $project_details=Project::find($single_task->project_id);
        $indicator_details=Indicator::find($single_task->indicator_id);

        $event_lists = Event::where('task_id',$qpr_target_id)->get();
        return view('test.page2',compact('single_task', 'event_lists','project_details','indicator_details'));
    }


    public function page4()
    {
        return view('test.page4');
    }
    public function page5()
    {
        $projects=Project::get();
        $team=ProjectCategory::get();
        return view('test.page5',compact('projects','team'));
    }

    public function save_event_list(Request $request){


        $rules = array(
            'title'=>'required',
            'task_id' => 'required',
            'project_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            //'node' => 'required|max:500',
            'apply' => 'required',
            'pre_approve' => 'required',
            // 'file'=>'required|file|max:1024|mimes:doc,docx,pdf'

        );
        $message = array(
        );

        $validator = Validator::make($request->all(),$rules,$message);
        if($validator->fails()){
            return Response::json(array('success'=>false,
            'errors' => $validator->errors()));
        }


        $event = new Event();

        $file = $request->file('file');
        if($file){
            $file_name= rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('taskfile'), $file_name);
            $event->file = $file_name;
        }


        $event->project_id = $request->project_id;
        $event->task_id    = $request->task_id;
        $event->start_date = date('Y-m-d',strtotime($request->start_date));
        $event->end_date   = date('Y-m-d',strtotime($request->end_date));
        $event->title      = $request->title;
        $event->node       = $request->node;
        $event->apply      = $request->apply;
        $event->pre_approve    = $request->pre_approve;
        $event->post_approve    = $request->post_approve;
        $event->real    = $request->real;

        $event->created_by = $request->created_by;
        $event->save();

        return response()->json(array('success'=>true,
        'message'=> 'ইভেন্ট সফলভাবে সংরক্ষণছে!',
            'event'=> $event,
        ));
    }

    public function edit_event(Request $request){
        $id = $request->id;
        $event  = Event::where('id',$id)->first();
        // dd($event->toArray());


        $apply =  $event->apply;
        $pre_approve = $event->pre_approve;
        $post_approve=$event->post_approve;
        $real=$event->real;


        $start_date = date('m/d/Y',strtotime($event->start_date));
        $end_date = date('m/d/Y',strtotime($event->end_date));

        return response()->json(array('success'=>true,
        'event'=>$event,
        'apply' =>$apply,
        'pre_approve' =>$pre_approve,
        'post_approve' =>$post_approve,
        'real' =>$real,
        'start_date'=>$start_date,
        'end_date'=>$end_date,

    ));
    }

    public function update_event(Request $request){
    //    dd($request->id);
        $rules = array(
            'title'=>'required',
            'task_id' => 'required',
            'project_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            //'node' => 'required|max:500',
            'apply' => 'required',
            'pre_approve' => 'required',
            'post_approve' => 'required',
            'real' => 'required',



        );
        $message = array(
        );

        $validator = Validator::make($request->all(),$rules,$message);
        if($validator->fails()){
            return Response::json(array('success'=>false,
            'errors' => $validator->errors()));
        }

        $file_name = $request->hidden_file;
        $file = $request->file('file');
        $event = Event::find($request->id);


        if($file != '')
        {
            $file = public_path("taskfile/{$event->file}");
            if (file_exists($file)) {
                unlink($file);
            }

            $file_name = rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('taskfile'), $file_name);
        }

        $event->project_id = $request->project_id;
        $event->task_id    = $request->task_id;
        $event->start_date = date('Y-m-d',strtotime($request->start_date));
        $event->end_date   = date('Y-m-d',strtotime($request->end_date));
        $event->title      = $request->title;
        $event->node       = $request->node;
        $event->apply      = $request->apply;
        $event->pre_approve    = $request->pre_approve;
        $event->post_approve    = $request->post_approve;
        $event->real    = $request->real;
        $event->updated_by = $request->updated_by;
        $event->save();

        return response()->json(array('success'=>true,
        'message'=> 'ইভেন্ট সফলভাবে পরিবর্তিত হয়েছে!',
            'event'=> $event,
        ));
    }

    public function show_event(Request $request){

        $id = $request->id;
        $event  = Event::where('id', $id)->first();

        // dd($start_date);

        $apply =  english_to_bangla(bdtFormat($event->apply));
        $pre_approve =  english_to_bangla(bdtFormat($event->pre_approve));


        $start_date = english_to_bangla(date('d-F-Y',strtotime($event->start_date)));
        $end_date = english_to_bangla(date('d-F-Y',strtotime($event->end_date)));


        return response()->json(array('success'=>true,
        'event'=>$event,
        'apply' =>$apply,
        'pre_approve' =>$pre_approve,
        'start_date'=>$start_date,
        'end_date'=>$end_date,
    ));
    }

    public function edit_plan(Request $request)
    {

        $qpr = QprTarget::find($request->id);

        // dd($qpr);
        // $task= Task::find($id);
        // $task_meta= TaskMeta::where('task_id',$id)->get();
        // $project_lists = Project::all();
        // $project_list_id = $request->project_id;

        if($_POST)
        {

            $message = array(
                'project_id.required' =>'উদ্যোগ পূরণ করতে হবে',
                'indicator_id.required' =>'সূচক  পূরণ করতে হবে',
                'target.required' =>'লক্ষ্য ২০২০ পূরণ করতে হবে',
                'q1.required' =>'কোয়াটার ১ পূরণ করতে হবে',
                'q2.required' =>'কোয়াটার ২ পূরণ করতে হবে',
                'q3.required' =>'কোয়াটার ৩ পূরণ করতে হবে',
                'q4.required' =>'কোয়াটার ৪ পূরণ করতে হবে',
                //'budget.required' =>'বাজেট  পূরণ করতে হবে',
            );

            $this->validate($request,[
                'project_id'    =>'required',
                'indicator_id'     => 'required',
                'target'   => 'required',
                'q1'          => 'required',
                "q2"         => "required",
                "q3"       => "required",
                "q4"       => "required",
                //"budget"       => "required",
            ] ,$message);


            $qpr = QprTarget::find($request->id);

            $qpr->project_id = $request->project_id;
            $qpr->indicator_id = $request->indicator_id;
            $qpr->target = $request->target;
            $qpr->q1 = $request->q1;
            $qpr->q2 = $request->q2;
            $qpr->q3 = $request->q3;
            $qpr->q4 = $request->q4;
            //$qpr->budget = $request->budget;

            $qpr->update();

            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'পরিকল্পনা সফলভাবে সংরক্ষণ হয়েছে।');
            // Session::put('message','পরিকল্পনা সফলভাবে সংরক্ষণ হয়েছে।');

            return Redirect::to('/page2/'."?qpr_target_id=".$qpr->id);
        }


        // return view('test.editplan',compact('task','task_meta','task_meta_list','project_lists','project_list_id'));
        return view('test.editplan', compact('qpr'));
    }


    public function update_plan(Request $request)
    {

        $project_lists = Project::all();
        $project_list_id = $request->project_id;

        $message = array(

            'task_name.required' =>'শিরোনাম পূরণ করতে হবে',
            'description.required' =>'বিবরন পূরণ করতে হবে',
            'date.required' =>'তারিখ পূরণ করতে হবে',
            'date.date' =>'তারিখ এর ফরম্যাট সঠিক না',
            'apply.required' =>'প্রাক্কলিত ব্যয় পূরণ করতে হবে',
            'pre_approve.required' =>'প্রস্তাবিত অনুমোদিত ব্যয় পূরণ করতে হবে',

          );

        $this->validate($request,[
            'project_id'    =>'required',
            'task_name'     => 'required|max:200',
            'description'   => 'required|max:400',
            'date'          => 'date|required',
            "apply"         => "required",
            "pre_approve"       => "required",

        ],$message);


        $task = new Task ();
        $task->project_id = $request->project_id;
        $task->task_name = $request->task_name;
        $task->description = $request->description;
        $task->date = date('y-m-d',strtotime($request->date));
        $task->save();

        $task_apply = TaskMeta::find();

        $task_apply->task_id = $task->id;
        $task_apply->value = $request->apply;
        $task_apply->key = 'Apply';
        $task_apply->date = date('y-m-d',strtotime($request->date));
        $task_apply->save();

        $task_pre_approve = new TaskMeta();

        $task_pre_approve->task_id = $task->id;
        $task_pre_approve->value = $request->pre_approve;
        $task_pre_approve->key = 'PreApprove';
        $task_pre_approve->date = date('y-m-d',strtotime($request->date));
        $task_pre_approve->save();

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'পরিকল্পনা সফলভাবে সংরক্ষণ হয়েছে।');
        // Session::put('message','পরিকল্পনা সফলভাবে সংরক্ষণ হয়েছে।');
        return Redirect::to('/page2/'."?task_id=".$task->id);

    }

    public function show_task($id)
    {
        $task= Task::find($id);
        return Redirect::to('/page2/'."?task_id=".$task->id);
    }

    public function get_task_management_list(Request $request)
    {
        $project_category_id=$request->project_category_id;
        $project_id=$request->project_id;
        $task_id=$request->task_id;
        $type=$request->type;
        $from_date=$request->start_date;
        $to_date=$request->end_date;
        //return ['ok'=>$request->start_date];

        if($task_id)
        {
         if($type=='all'){
         $get_task_list = DB::table('events')
        ->join('projects', 'events.project_id', '=', 'projects.id')
        ->join('project_categories as category', 'category.id', '=', 'projects.project_category_id')
        ->join('tasks', 'events.task_id', '=', 'tasks.id')
        ->select('events.*', 'category.name_en', 'projects.name','tasks.task_name')
        ->where('task_id','=',$task_id)->where('events.project_id','=',$project_id)
        ->whereDate('events.start_date','>=',$from_date)->whereDate('events.end_date','<=',$to_date)
        ->get();
        return json_encode($get_task_list);
        }
        if($type=='apply'){
        $get_task_list = DB::table('events')
        ->join('projects', 'events.project_id', '=', 'projects.id')
        ->join('project_categories as category', 'category.id', '=', 'projects.project_category_id')
        ->join('tasks', 'events.task_id', '=', 'tasks.id')
        ->select('events.title','events.apply' ,'events.account_head','category.name_en', 'projects.name','tasks.task_name')
        ->where('task_id','=',$task_id)->where('events.project_id','=',$project_id)
        ->whereDate('events.start_date','>=',$from_date)->whereDate('events.end_date','<=',$to_date)
        ->get();
        return json_encode($get_task_list);
        }
        if($type=='approve'){
        $get_task_list = DB::table('events')
        ->join('projects', 'events.project_id', '=', 'projects.id')
        ->join('project_categories as category', 'category.id', '=', 'projects.project_category_id')
        ->join('tasks', 'events.task_id', '=', 'tasks.id')
        ->select('events.title','events.approve' ,'events.account_head','category.name_en', 'projects.name','tasks.task_name')
        ->where('task_id','=',$task_id)->where('events.project_id','=',$project_id)
        ->whereDate('events.start_date','>=',$from_date)->whereDate('events.end_date','<=',$to_date)
        ->get();
        return json_encode($get_task_list);
        }
         if($type=='real'){
        $get_task_list = DB::table('events')
        ->join('projects', 'events.project_id', '=', 'projects.id')
        ->join('project_categories as category', 'category.id', '=', 'projects.project_category_id')
        ->join('tasks', 'events.task_id', '=', 'tasks.id')
        ->select('events.title','events.real','events.account_head' ,'category.name_en', 'projects.name','tasks.task_name')
        ->where('task_id','=',$task_id)->where('events.project_id','=',$project_id)
        ->whereDate('events.start_date','>=',$from_date)->whereDate('events.end_date','<=',$to_date)
        ->get();
        return json_encode($get_task_list);
        }
        }
        else{
        if($type=='all'){
        $get_task_list = DB::table('events')
        ->join('projects', 'events.project_id', '=', 'projects.id')
        ->join('project_categories as category', 'category.id', '=', 'projects.project_category_id')
        ->join('tasks', 'events.task_id', '=', 'tasks.id')
        ->select('events.*', 'category.name_en', 'projects.name','tasks.task_name')
        ->where('events.project_id','=',$project_id)
        ->whereDate('events.start_date','>=',$from_date)->whereDate('events.end_date','<=',$to_date)
        ->get();
        return json_encode($get_task_list);
        }
        if($type=='apply'){
        $get_task_list = DB::table('events')
        ->join('projects', 'events.project_id', '=', 'projects.id')
        ->join('project_categories as category', 'category.id', '=', 'projects.project_category_id')
        ->join('tasks', 'events.task_id', '=', 'tasks.id')
        ->select('events.title','events.apply','events.account_head' ,'category.name_en', 'projects.name','tasks.task_name')
        ->where('events.project_id','=',$project_id)
        ->whereDate('events.start_date','>=',$from_date)->whereDate('events.end_date','<=',$to_date)
        ->get();
        return json_encode($get_task_list);
        }
        if($type=='approve'){
        $get_task_list = DB::table('events')
        ->join('projects', 'events.project_id', '=', 'projects.id')
        ->join('project_categories as category', 'category.id', '=', 'projects.project_category_id')
        ->join('tasks', 'events.task_id', '=', 'tasks.id')
        ->select('events.title','events.approve','events.account_head' ,'category.name_en', 'projects.name','tasks.task_name')
        ->where('events.project_id','=',$project_id)
        ->whereDate('events.start_date','>=',$from_date)->whereDate('events.end_date','<=',$to_date)
        ->get();
        return json_encode($get_task_list);
        }
         if($type=='real'){
        $get_task_list = DB::table('events')
        ->join('projects', 'events.project_id', '=', 'projects.id')
        ->join('project_categories as category', 'category.id', '=', 'projects.project_category_id')
        ->join('tasks', 'events.task_id', '=', 'tasks.id')
        ->select('events.title','events.real' ,'events.account_head','category.name_en', 'projects.name','tasks.task_name')
        ->where('events.project_id','=',$project_id)
        ->whereDate('events.start_date','>=',$from_date)->whereDate('events.end_date','<=',$to_date)
        ->get();
        return json_encode($get_task_list);
        }


       }

    }


    public function delete_task($id){

        $q=" DELETE FROM `events` WHERE `events`.`task_id`='$id' ";

        DB::delete(DB::raw($q));

        $task = QprTarget::find($id);
        $task->delete();

        return redirect()->back();
    }

}
