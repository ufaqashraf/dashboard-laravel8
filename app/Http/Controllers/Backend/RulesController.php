<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\RulesField;
use App\Models\Setting;

class RulesController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $data = auth()->user();
        $ruleses = Rules::all();
        $fields = RulesField::all();
        return view('layouts.backend.rules.rules',[
            'data'=>$data,
            'fields'=>$fields,
            'ruleses'=>$ruleses,
            'setting'=>$setting
        ]);
    }

    public function store(Request $request)
    {
        Rules::create([
            'user_id'=>auth()->user()->id,
            'price_plan_id'=>auth()->user()->price_plan_id ?? null,
            'rule1'=>$request->rule1,
            'condition'=>$request->condition,
            'rule2'=>$request->rule2,
            'advance_opt1'=>$request->advance_opt1,
            'advance_opt2'=>$request->advance_opt2,
            'advance_opt3'=>$request->advance_opt3,
            'advance_opt4'=>$request->advance_opt4,
            'rule_action'=>$request->rule_action,
            'description'=>$request->description
        ]);

        return response()->json([
            'message'=>'success'
        ],200);
    }

    public function update(Request $request)
    {
        $data = Rules::where('id',$request->id)->first();
        if ($data) {
            Rules::where('id',$request->id)->update([
                'rule1'=>$request->rule1,
                'condition'=>$request->condition,
                'rule2'=>$request->rule2,
                'advance_opt1'=>$request->advance_opt1,
                'advance_opt2'=>$request->advance_opt2,
                'advance_opt3'=>$request->advance_opt3,
                'advance_opt4'=>$request->advance_opt4,
                'rule_action'=>$request->rule_action,
                'description'=>$request->description
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
        $data = Rules::where('id',$request->id)->first();
        if ($data->status == 0) {
            Rules::where('id',$request->id)->update([
                'status'=>1
            ]);
            return response()->json([
                'message'=>'success'
            ],200);
        }else{
            Rules::where('id',$request->id)->update([
                'status'=>0
            ]);
            return response()->json([
                'message'=>'success'
            ],500);
        }

    }

    public function destroy(Request $request)
    {
        Rules::where('id',$request->id)->delete();

        return response()->json([
            'message'=>'success'
        ],200);
    }
}
