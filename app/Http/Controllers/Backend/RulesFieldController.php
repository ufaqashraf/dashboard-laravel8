<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RulesField;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Setting;

class RulesFieldController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $data = auth()->user();
        $fields = RulesField::all();
        return view('layouts.backend.rules.field_list',[
            'data'=>$data,
            'fields'=>$fields,
            'setting'=>$setting
        ]);
    }

    public function store(Request $request)
    {
        RulesField::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->slug),
            'type'=>$request->type,
            'description'=>$request->description,
            'status'=>$request->status
        ]);

        return response()->json([
            'message'=>'success'
        ],200);
    }

    public function update(Request $request)
    {
        $data = RulesField::where('id',$request->id)->first();

        RulesField::where('id',$request->id)->update([
            'name'=>$request->name,
            'slug'=>Str::slug($request->slug),
            'type'=>$request->type,
            'description'=>$request->description,
            'status'=>$request->status
        ]);

        return response()->json([
            'message'=>'success'
        ],200);
    }

}
