<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Device;
use App\Models\Antivirus;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Setting;

class DeviceController extends Controller
{
    public function index()
    {
        $data = auth()->user();
        $setting = Setting::first();
        $devices = Device::with('get_antivirus')->get();
        $viruses = Antivirus::select('id','name')->get();
        return view('layouts.backend.device.device',[
            'data'=>$data,
            'devices'=>$devices,
            'viruses'=>$viruses,
            'setting'=>$setting
        ]);
    }



    public function create()
    {
        $data = auth()->user();
        $setting = Setting::first();
        $viruses = Antivirus::select('id','name')->get();
        return view('layouts.backend.device.add',[
            'data'=>$data,
            'viruses'=>$viruses,
            'setting'=>$setting
        ]);
    }



    public function store(Request $request)
    {
        $image = $request->file('avatar');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $upload_path = public_path()."/images/";

        $image1 = $request->file('sign');
        $new_name1 = rand() . '.' . $image1->getClientOriginalExtension();
        $upload_path1 = public_path()."/images/";

        Device::create([
            'user_id' => auth()->user()->id,
            'antivirus_id' => $request->antivirus_id,
            'form_id' => $request->form_id,
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'street' => $request->street,
            'city' => $request->city,
            'post_code' => $request->post_code,
            'country' => $request->country,
            'tel_num' => $request->tel_num,
            'dept' => $request->dept,
            'no' => $request->no,
            'email' => $request->email,
            'device_name' => $request->device_name,
            'serial_num' => $request->serial_num,
            'type' => $request->type,
            'assigned' => $request->assigned,
            'status' => $request->status,
            'user_location' => $request->user_location,
            'user_position' => $request->user_position,
            'device_encription' => $request->device_encription,
            'date_assigned' => $request->date_assigned,
            'date_returned' => $request->date_returned,
            'staff_sign' => $new_name1,
            'staff_image' => $new_name,
        ]);

        $image->move($upload_path, $new_name);
        $image1->move($upload_path1, $new_name1);

        return response()->json([
            'message'=>'success'
        ],200);
    }



    public function show($id)
    {
        //
    }



    public function edit($id)
    {
        //
    }



    public function update(Request $request, $id)
    {
        //
    }



    public function destroy($id)
    {
        //
    }
}
