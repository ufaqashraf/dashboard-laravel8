<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Antivirus;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Setting;

class AntivirusController extends Controller
{

    public function index()
    {
        $data = auth()->user();
        $viruses = Antivirus::all();
        $setting = Setting::first();
        return view('layouts.backend.antivirus.virus_list',[
            'data'=>$data,
            'viruses'=>$viruses,
            'setting'=>$setting
        ]);
    }

    public function get_virus(Request $request)
    {
        $data = Antivirus::where('id',$request->val)->first();
        return response()->json([
            'data'=>$data
        ],200);
    }

    public function store(Request $request)
    {
        $image = $request->file('logo');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $upload_path = public_path()."/images/";
        Antivirus::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'logo'=>$new_name,
            'description'=>$request->description
        ]);

        $image->move($upload_path, $new_name);

        return response()->json([
            'message'=>'success'
        ],200);
    }

    public function update(Request $request)
    {
        $data = Antivirus::where('slug',$request->slug)->first();
        if ($data != null & $request->file('edit-logo') != null) {
            $image = $request->file('edit-logo');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $upload_path = public_path()."/images/";

            Antivirus::where('slug',$request->slug)->update([
                'name'=>$request->edit_name,
                'slug'=>Str::slug($request->edit_name),
                'logo'=>$new_name,
                'description'=>$request->edit_description
            ]);

            $image->move($upload_path, $new_name);
        }else{
            Antivirus::where('slug',$request->slug)->update([
                'name'=>$request->edit_name,
                'slug'=>Str::slug($request->edit_name),
                'description'=>$request->edit_description
            ]);
        }

        return response()->json([
            'message'=>'success'
        ],200);
    }

    public function change_status(Request $request)
    {
        $data = Antivirus::where('id',$request->id)->first();
        if ($data->status == 0) {
            Antivirus::where('id',$request->id)->update([
                'status'=>1
            ]);
            return response()->json([
                'message'=>'success'
            ],200);
        }else{
            Antivirus::where('id',$request->id)->update([
                'status'=>0
            ]);
            return response()->json([
                'message'=>'success'
            ],500);
        }

    }

    public function destroy(Request $request)
    {
        Antivirus::where('slug',$request->slug)->delete();

        return response()->json([
            'message'=>'success'
        ],200);
    }


}
