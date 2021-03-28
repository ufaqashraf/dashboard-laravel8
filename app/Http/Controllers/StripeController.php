<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\User;
use App\Models\Order;
use App\Models\PricePlan;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;

class StripeController extends Controller
{
    public function stripe()
    {
        $setting = Setting::first();
        $data = auth()->user();
        return view('layouts.backend.payment.stripe',[
            'data'=>$data,
            'setting'=>$setting
        ]);
    }

    public function stripePost(Request $request)
    {
        $data = intval($request->price);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $data,
                "currency" => "GBP",
                "source" => $request->stripeToken,
                "description" => "Payment by ".$request->username,
        ]);
        
        $plan = PricePlan::where('name',$request->package)->first();

        User::where('id',auth()->user()->id ?? $request->userId)->update([
            'price_plan_id'=>$plan->id,
            'duration'=>$request->duration,
            'payment'=>'done',
        ]);

        Order::create([
            'user_id'=>auth()->user()->id ?? $request->userId,
            'package'=>$request->package,
            'duration'=>$request->duration,
            'price'=>$request->price,
            'status'=>'Pending'
        ]);
        if (Auth::check()) {
           
            return redirect()->route('payment.done');
        }else{
            return view('layouts.backend.auth.payment_done');
        }
   

    }

    public function payment_success()
    {
        $setting = Setting::first();
        $data = auth()->user();
        if(Auth::check()){
            return view('layouts.backend.payment.payment_done',[
                'data'=>$data,
                'setting'=>$setting
            ]);
        }else{
            return view('layouts.backend.auth.payment_done',[
                'setting'=>$setting
            ]);
        }
    }

    public function payment_failed()
    {
        $setting = Setting::first();
        $data = auth()->user();
        if(Auth::check()){
            return view('layouts.backend.payment.failed',[
                'data'=>$data,
                'setting'=>$setting
            ]);
        }else{
            return view('layouts.backend.auth.failed',[
                'setting'=>$setting
            ]);
        }
    }
}
