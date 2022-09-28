<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use DateTime;
use App\Account;


use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Controllers\API\AuthController as ApiAuth;
use Illuminate\Support\Facades\DB;
//use Validator;
use App\Http\Resources\Account as AccountResource;
use App\Project;
use App\GeneralQueries;
use App\OTPLog;



class AuthController extends BaseController
{
   public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile_no' => [
                'required',
                'digits:11',
                function ($attribute, $value, $fail) {
                    if ($value[0] != 0 ||  $value[1] != 1) {
                        $fail($attribute.' is invalid.');
                    }
                },
            ],
            'password' => 'required|min:6'
            //'password' => 'required|min:6|regex:/(^([a-zA-Z]+)(\d+)?$)/u'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if(Auth::attempt(['mobile_no' => $request->mobile_no, 'password' => $request->password])){
            $user = Auth::user();

            $success['token'] =  $user->createToken('CTApp')-> accessToken;
            $success['name'] =  $user->name;
            $success['base_url'] =  url('/') . '/';
            $success['first_login'] = 0;
            //project list
            $project_lists=Project::get();
            $c=0;
            foreach ($project_lists as $project_list)
            {
                $success['project'][$c]['name']=$project_list->bangla_name;
                $success['project'][$c]['id']=$project_list->id;
                $c++;
            }

            //
            if( $request->password == '12345678' ) {
                //$apiAuth = new ApiAuth;
                //$success['first_login'] = $apiAuth->send_otp($request->mobile_no);
                $success['first_login'] = 1;
            }

            return $this->sendResponse($success, 'User login successfully.');
        } else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }
    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();

        return response()->json([
            'success' => true,
            'message' => 'Successfully logged out'
        ], 200);
    }
    public function user_help(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile_no' => [
                'required',
                'digits:11',
                function ($attribute, $value, $fail) {
                    if ($value[0] != 0 ||  $value[1] != 1) {
                        $fail($attribute.' is invalid.');
                    }
                },
            ],
            'name' => 'required',
            'details' => 'required'
            //'password' => 'required|min:6|regex:/(^([a-zA-Z]+)(\d+)?$)/u'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $genarel_queries=new GeneralQueries;

        $genarel_queries->mobile_no=$request->mobile_no;
        $genarel_queries->email=$request->email;
        $genarel_queries->name=$request->name;
        $genarel_queries->details=$request->details;

        if($genarel_queries->save())
        {
            $success['success']=true;
            return $this->sendResponse($success,'Data Saved successfully.');
        }else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }
    public function forget_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile_no' => [
                'required',
                'digits:11',
                function ($attribute, $value, $fail) {
                    if ($value[0] != 0 ||  $value[1] != 1) {
                        $fail($attribute.' is invalid.');
                    }
                },
            ]
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $valid_mobile_exist=User::where('mobile_no',$request->mobile_no)->get();

        if(is_null($valid_mobile_exist))
        {
            return $this->sendError('Wrong Mobile No', $validator->errors());
        }else{
            $randomNum =generateRadmonText();
            if(getCurlPostForSMS($request->mobile_no,"Your pin number is:".$randomNum)){
                $otp_log = new OTPLog();
                $otp_log->mobile_no=$request->mobile_no;
                $otp_log->otp_code =$randomNum;
                $otp_log->save();

                $mobile_no=$request->mobile_no;
                $success['success']=true;
                return $this->sendResponse($success,'Pin successfully send to your mobile no.');
                //$request->session()->flash('mobile_no', $mobile_no);
                //return redirect('/verify');
            }
        }
    }
    public function pin_verify(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile_no' => 'required',
            'otp_code' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }



        $mobile_no=$request->mobile_no;

        $otp_log = OTPLog::where('mobile_no', $request->mobile_no)->orderBy('created_at','DESC')->first();


        if($request->otp_code == $otp_log->otp_code){
            $success['success']=true;
            return $this->sendResponse($success,'Pin Successfully Matched.');
        }else{
            return $this->sendError('otp_not_match', $validator->errors());
        }

    }
    public function new_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile_no' => 'required',
            'password' => 'required|required_with:password_confirmation|confirmed',
            'password_confirmation' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $hashedPassword =Hash::make($request->password);
        $user = User::where('mobile_no', $request->mobile_no)->first();
        $user->password=$hashedPassword;

        if($user->save()) {
            $success['success']=true;
            return $this->sendResponse($success,'Password successfully changed');
        }else{
            return $this->sendError('There is some problem.', $validator->errors());
        }




    }
}
