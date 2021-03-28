<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Setting;

class OrderController extends Controller
{
   
    public function index()
    {
        $setting = Setting::first();
        $data = auth()->user();
        $orders = order::latest('updated_at')->where('status','Pending')->get();
        return view('layouts.backend.order.order',[
            'data'=>$data,
            'orders'=>$orders,
            'setting'=>$setting
        ]);
    }

    public function payment()
    {
        $setting = Setting::first();
        $data = auth()->user();
        return view('layouts.backend.payment.payment',[
            'data'=>$data,
            'setting'=>$setting
        ]);
    }

    public function destroy(Request $request)
    {
        $data = auth()->user();
        if ($data->type == 'user') {
            Order::where('id',$request->id)->update([
                'status'=>'user_delete'
            ]);
        }else{

            Order::where('id',$request->id)->delete();
        }

        return response()->json([
            'msg'=>'success'
        ],200);
    }
}
