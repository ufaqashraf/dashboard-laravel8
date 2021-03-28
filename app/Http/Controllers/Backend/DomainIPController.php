<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Setting;

class DomainIPController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $data = auth()->user();
        $users = User::where('is_block',1)->get();
        return view('layouts.backend.domain_ip.domain',[
            'users'=>$users,
            'data'=>$data,
            'setting'=>$setting
        ]);
    }

    public function index_ip()
    {
        $setting = Setting::first();
        $data = auth()->user();
        $users = User::where('is_block',1)->get();
        return view('layouts.backend.domain_ip.ip',[
            'users'=>$users,
            'data'=>$data,
            'setting'=>$setting
        ]);
    }

    // public function store(Request $request)
    // {
    //     $data = User::where('company_url',$request->domain)->first();
    //     if ($data->edit_count >3) {
    //         DomainIP::create([
    //             'domain_user_id'=>$data->id
    //         ]);
    //     }

    //     return response()->json([
    //         'message'=>'success'
    //     ],200);
    // }

    public function update(Request $request)
    {
        $data = User::where('company_url',$request->domain)->first();
        if ($data->is_block == null) {
            User::where('id',$data->id)->update([
                'is_block'=>1
            ]);
            return response()->json([
                'message'=>'success'
            ],200);
        }elseif($data->is_block == 1){
            User::where('id',$data->id)->update([
                'is_block'=>0,
                'edit_count'=>null,
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

    // public function destroy(Request $request)
    // {
    //     DomainIP::where('id',$request->id)->delete();

    //     return response()->json([
    //         'message'=>'success'
    //     ],200);
    // }

    // public function ip_store(Request $request)
    // {
    //     $data = User::where('company_url',$request->ip)->first();
    //     if ($data->edit_count >3) {
    //         DomainIP::create([
    //             'ip_user_id'=>$data->id
    //         ]);
    //     }

    //     return response()->json([
    //         'message'=>'success'
    //     ],200);
    // }

    // public function ip_update(Request $request)
    // {
    //     $data = User::where('company_url',$request->ip)->first();
    //     $ip = DomainIP::where('id',$request->id)->first();
    //     if ($ip) {
    //         DomainIP::where('id',$request->ip)->update([
    //             'ip_user_id'=>$data->id
    //         ]);
    //     }
    //     return response()->json([
    //         'message'=>'success'
    //     ],200);
    // }

    // public function ip_destroy(Request $request)
    // {
    //     DomainIP::where('id',$request->id)->delete();

    //     return response()->json([
    //         'message'=>'success'
    //     ],200);
    // }
}
