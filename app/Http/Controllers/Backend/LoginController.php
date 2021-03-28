<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PricePlan;
use App\Models\DomainIP;
use App\Models\UserNotification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\Setting;

class LoginController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('layouts.backend.auth.login',[
            'setting'=>$setting    
        ]);
    }

    public function register()
    {
        $setting = Setting::first();
        $plans = PricePlan::select('id','name')->where('status',1)->get();
        return view('layouts.backend.auth.register',[
            'plans'=>$plans,
            'setting'=>$setting
        ]);
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);



        if (Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'verified'=> 1,
            'type'=> 'super_admin',
            'payment'=> 'done'
        ])) {
            return response()->json([
                'msg'=>"success"
            ],200);
        }elseif(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'verified'=> 1,
            'type'=> 'user',
            'payment'=> 'done'
        ])){
            return response()->json([
                'msg'=>"success"
            ],200);

        }elseif(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'verified'=> 1,
            'type'=> 'user',
            'payment'=> 'free'
        ])){
            
            return response()->json([
                'msg'=>"success"
            ],200);

        }else{

            return response()->json([
                'msg'=>"success"
            ],500);
        };
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users',
            'username' => 'required|unique:users'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors'=>"match"
            ],500);
        }else{
            $user = User::create([
                'price_plan_id' => $request->price_plan_id,
                'username' => $request->username,
                'f_name' => $request->f_name,
                'l_name' => $request->l_name,
                'email' => $request->email,
                'address' => $request->address,
                'phn' => $request->phn,
                'password' => Hash::make($request->password),
                'country' => $request->country,
                'state' => $request->state,
                'post_code' => $request->post_code,
                'company' => $request->company,
                'company_url' => $request->company_url,
                'position' => $request->position,
                'city' => $request->city,
                'duration' => $request->duration,
                'payment' => $request->payment ?? '',
                'private_test_key' => Str::random(16),
                'public_test_key' => Str::random(10),
                'verification_token'=> Str::random(32)
            ]);
            Mail::send('layouts.Mail.userVerification',['user'=>$user],function($msg) use($user){
                $msg->from('infotrazenet@trazenet.com','Trazenet Fraud Prevention');
                $msg->to($user['email']);
                $msg->subject('Please verify your account.');
            });

            return response()->json([
                'msg'=>'succes'
            ],200);
        }
    }

    public function user_verify($token)
    {
        User::where('verification_token',$token)->update([
            'verification_token'=>'',
            'verified'=>1
            ]);

        // toast('Account Verified Successfully.','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

        return redirect()->route('home');
    }

    public function update(Request $request)
    {
        $data = User::where('id',$request->id)->first();

        if ($data) {
            if ($request->password != null) {
                User::where('id',$request->id)->update([
                    'price_plan_id' => $request->price_plan_id,
                    'username' => $request->username,
                    'f_name' => $request->f_name,
                    'l_name' => $request->l_name,
                    'email' => $request->email,
                    'address' => $request->address,
                    'phn' => $request->phn,
                    'password' => Hash::make($request->password),
                    'country' => $request->country,
                    'state' => $request->state,
                    'post_code' => $request->post_code,
                    'company' => $request->company,
                    'company_url' => $request->company_url,
                    'position' => $request->position,
                    'city' => $request->city,
                    'duration' => $request->duration,
                    'edit_count'=>$data->edit_count+1
                ]);
                $update = User::where('id',$request->id)->first();
                if ($update->edit_count == 1) {
                    UserNotification::create([
                        'user_id'=>auth()->user()->id,
                        'price_plan_id'=>auth()->user()->price_plan_id,
                        'noti'=>auth()->user()->f_name.' '.'first time try to edit information',
                    ]);
                }elseif($update->edit_count == 2){
                    UserNotification::create([
                        'user_id'=>auth()->user()->id,
                        'price_plan_id'=>auth()->user()->price_plan_id,
                        'noti'=>auth()->user()->f_name.' '.'second time try to edit information',
                    ]);
                }elseif($update->edit_count == 3){
                    UserNotification::create([
                        'user_id'=>auth()->user()->id,
                        'price_plan_id'=>auth()->user()->price_plan_id,
                        'noti'=>auth()->user()->f_name.' '.'Third time try to edit information',
                    ]);
                }elseif($update->edit_count >3){
                    User::where('id',$request->id)->update([
                        'is_block'=>1
                    ]);
                }
            }else{

                User::where('id',$request->id)->update([
                    'price_plan_id' => $request->price_plan_id,
                    'username' => $request->username,
                    'f_name' => $request->f_name,
                    'l_name' => $request->l_name,
                    'email' => $request->email,
                    'address' => $request->address,
                    'phn' => $request->phn,
                    'country' => $request->country,
                    'state' => $request->state,
                    'post_code' => $request->post_code,
                    'company' => $request->company,
                    'company_url' => $request->company_url,
                    'position' => $request->position,
                    'city' => $request->city,
                    'duration' => $request->duration,
                    'edit_count'=>$data->edit_count+1
                ]);

                $update = User::where('id',$request->id)->first();
                if ($update->edit_count == 1) {
                    UserNotification::create([
                        'user_id'=>auth()->user()->id,
                        'price_plan_id'=>auth()->user()->price_plan_id,
                        'noti'=>auth()->user()->f_name.' '.'first time try to edit information',
                    ]);
                }elseif($update->edit_count == 2){
                    UserNotification::create([
                        'user_id'=>auth()->user()->id,
                        'price_plan_id'=>auth()->user()->price_plan_id,
                        'noti'=>auth()->user()->f_name.' '.'second time try to edit information',
                    ]);
                }elseif($update->edit_count == 3){
                    UserNotification::create([
                        'user_id'=>auth()->user()->id,
                        'price_plan_id'=>auth()->user()->price_plan_id,
                        'noti'=>auth()->user()->f_name.' '.'Third time try to edit information',
                    ]);
                }elseif($update->edit_count >3){
                    User::where('id',$request->id)->update([
                        'is_block'=>1
                    ]);
                }
            }
        }
        return response()->json([
            'msg'=>'succes'
        ],200);
    }


    public function logout(Request $request)
    {
        if(Auth::check()){
            Auth::logout();
            $request->session()->flush();
            // toast('Logout successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

            return redirect()->route('home');
        }

    }

    public function get_user(Request $request)
    {
        $data = User::where('username',$request->val)->with('get_plan')->first();
        if ($data) {
            return response()->json([
                'data'=>$data
            ],200);
        }else{
            // return response()->json([
            //     'error'=>'not match'
            // ],500);
        }
    }

    public function view_forgot_password(Request $request)
    {
        $setting = Setting::first();
        return view('layouts.backend.auth.forgot-password',[
            'setting'=>$setting    
        ]);
    }

    public function password_reset_email_verification(Request $request)
    {
        $user = User::where('email',$request->email)->first();

        if ($user) {
            Mail::send('layouts.Mail.reset-pass-email-verify',['user'=>$user],function($msg) use($user){
                $msg->from('infotrazenet@trazenet.com','Trazenet Fraud Prevention');
                $msg->to($user['email']);
                $msg->subject('Reset Password Link');
            });
        }else{
            return response()->json([
                'error'=>'not match'
            ],500);
        }
    }

    public function update_password_view()
    {
        $setting = Setting::first();
        return view('layouts.backend.auth.update_password',[
            'setting'=>$setting
        ]);
    }

   
    public function update_password(Request $request)
    {
        $data = User::where('email',$request->email)->first();

        if ($data) {
            User::where('email',$request->email)->update([
                'password'=>Hash::make($request->password)
            ]);
            return response()->json([
                'msg'=>'success'
            ],200);
        }else{
            return response()->json([
                'error'=>'not match'
            ],500);
        }
    }

}
