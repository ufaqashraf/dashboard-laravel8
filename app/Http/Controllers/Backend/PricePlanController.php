<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PricePlan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Setting;

class PricePlanController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $data = auth()->user();
        $plans = PricePlan::all();
        return view('layouts.backend.price.price_list',[
            'data'=>$data,
            'plans'=>$plans,
            'setting'=>$setting
        ]);
    }

    public function store(Request $request)
    {

        PricePlan::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'currency'=>$request->currency,
            'monthly'=>$request->monthly,
            'quarterly'=>$request->quarterly,
            'annually'=>$request->annually,
            'rules'=>$request->rules,
            'user_limit'=>$request->user_limit
        ]);


        return response()->json([
            'message'=>'success'
        ],200);
    }

    public function update(Request $request)
    {
        $data = PricePlan::where('slug',$request->slug)->first();
        if ($data != null) {
            PricePlan::where('slug',$request->slug)->update([
                'name'=>$request->edit_name,
                'slug'=>Str::slug($request->edit_name),
                'currency'=>$request->edit_currency,
                'monthly'=>$request->edit_monthly,
                'quarterly'=>$request->edit_quarterly,
                'annually'=>$request->edit_annually,
                'rules'=>$request->edit_rules,
                'user_limit'=>$request->edit_user_limit
            ]);

            return response()->json([
                'message'=>'success'
            ],200);
        }else{
            return response()->json([
                'message'=>'success'
            ],500);
        }



    }

    public function change_status(Request $request)
    {
        $data = PricePlan::where('id',$request->id)->first();
        if ($data->status == 0) {
            PricePlan::where('id',$request->id)->update([
                'status'=>1
            ]);
            return response()->json([
                'message'=>'success'
            ],200);
        }else{
            PricePlan::where('id',$request->id)->update([
                'status'=>0
            ]);
            return response()->json([
                'message'=>'success'
            ],500);
        }

    }

    public function destroy(Request $request)
    {
        PricePlan::where('slug',$request->slug)->delete();
        return response()->json([
            'message'=>'success'
        ],200);
    }

    public function get_plan(Request $request)
    {
        if($request->duration == 'Monthly'){
            $data = PricePlan::where('id',$request->id)->select('id','name','monthly')->first();
        }elseif($request->duration == 'Quarterly'){
            $data = PricePlan::where('id',$request->id)->select('id','name','quarterly')->first();
        }elseif($request->duration == 'Annually'){
            $data = PricePlan::where('id',$request->id)->select('id','name','annually')->first();
        }
        return response()->json([
            'data'=>$data
        ],200);
    }
}
