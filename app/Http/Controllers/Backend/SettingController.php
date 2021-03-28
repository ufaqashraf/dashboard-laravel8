<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
class SettingController extends Controller
{
    public function index()
    {
        $data = auth()->user();
        $setting = Setting::first();
        return view('layouts.backend.setting',[
            'data'=>$data,
            'setting'=>$setting
        ]);
    }

    public function store(Request $request)
    {
        $id = Setting::where('id',$request->id)->first();
        if ($id && $request->file('logo') !=null && $request->file('icon') !=null) {
            $image = $request->file('logo');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $upload_path = public_path()."/images/";
            
            $image1 = $request->file('icon');
            $new_name1 = rand() . '.' . $image1->getClientOriginalExtension();
            $upload_path1 = public_path()."/images/";

            Setting::where('id',$request->id)->update([
                'site_name'=>$request->site_name,
                'site_title'=>$request->site_title,
                'site_tag_line'=>$request->site_tag_line,
                'email'=>$request->email,
                'cell'=>$request->cell,
                'address'=>$request->address,
                'fb_link'=>$request->fb_link,
                'twitt_link'=>$request->twitt_link,
                'tube_link'=>$request->tube_link,
                'insta_link'=>$request->insta_link,
                'meta_name'=>$request->meta_name,
                'meta_des'=>$request->meta_des,
                'logo'=>$new_name,
                'icon'=>$new_name1
            ]);

            $image->move($upload_path,$new_name);
            $image1->move($upload_path1,$new_name1);

        }elseif($id && $request->file('logo') ==null){
            Setting::where('id',$request->id)->update([
                'site_name'=>$request->site_name,
                'site_title'=>$request->site_title,
                'site_tag_line'=>$request->site_tag_line,
                'email'=>$request->email,
                'cell'=>$request->cell,
                'address'=>$request->address,
                'fb_link'=>$request->fb_link,
                'twitt_link'=>$request->twitt_link,
                'tube_link'=>$request->tube_link,
                'insta_link'=>$request->insta_link,
                'meta_name'=>$request->meta_name,
                'meta_des'=>$request->meta_des
            ]);
        }else{
            $image = $request->file('logo');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $upload_path = public_path()."/images/";
            
            $image1 = $request->file('icon');
            $new_name1 = rand() . '.' . $image1->getClientOriginalExtension();
            $upload_path1 = public_path()."/images/";

            Setting::create([
                'site_name'=>$request->site_name,
                'site_title'=>$request->site_title,
                'site_tag_line'=>$request->site_tag_line,
                'email'=>$request->email,
                'cell'=>$request->cell,
                'address'=>$request->address,
                'fb_link'=>$request->fb_link,
                'twitt_link'=>$request->twitt_link,
                'tube_link'=>$request->tube_link,
                'insta_link'=>$request->insta_link,
                'meta_name'=>$request->meta_name,
                'meta_des'=>$request->meta_des,
                'logo'=>$new_name,
                'icon'=>$new_name1
            ]);
            $image->move($upload_path,$new_name);
            $image1->move($upload_path1,$new_name1);
        }
        return response()->json([
            'msg'=>'success'
        ],200);

    }

}
