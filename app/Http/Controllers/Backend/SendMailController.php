<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SendMail;
use App\Models\User;
use App\Models\Setting;

class SendMailController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $data = auth()->user();
        $mails = SendMail::all();
        return view('layouts.backend.mail.sent_box',[
            'mails'=>$mails,
            'data'=>$data,
            'setting'=>$setting
        ]);
    }

    public function draft_index()
    {
        $setting = Setting::first();
        $data = auth()->user();
        $mails = SendMail::all();
        return view('layouts.backend.mail.draft',[
            'mails'=>$mails,
            'data'=>$data,
            'setting'=>$setting
        ]);
    }

    public function compose_index($id = null)
    {
        $setting = Setting::first();
        $msg = SendMail::where('id',$id)->first();
        $data = auth()->user();
        $mails = SendMail::all();
        $users = User::where('type','user')->get();
        return view('layouts.backend.mail.compose',[
            'mails'=>$mails,
            'data'=>$data,
            'msg'=>$msg,
            'users'=>$users,
            'setting'=>$setting
        ]);
    }

    public function read_index($msg)
    {
        $setting = Setting::first();
        $data = auth()->user();
        $msg = SendMail::where('id',$msg)->first();
        $mails = SendMail::all();
        return view('layouts.backend.mail.read',[
            'msg'=>$msg,
            'mails'=>$mails,
            'data'=>$data,
            'setting'=>$setting
        ]);
    }

    public function store(Request $request)
    {
        $user = SendMail::create([
            'to' => $request->to,
            'from' => 'info@server21.ltd',
            'msg' => $request['msg'],
            'subject' => $request['subject'],
            'status' => 'sent'
        ]);

        // Mail::send('layouts.backend.mail.message',['user' => $user],function($msg) use($user){
        //     $msg->from('info@server21.ltd','RESMS');
        //     $msg->to($user['to']);
        //     $msg->subject($user['subject']);
        // });
        if ($request->id != null) {
            SendMail::where('id',$request->id)->delete();
        }

        return response()->json([
            'msg'=>'success'
        ],200);
    }

    public function draft(Request $request)
    {
        $user = SendMail::create([
            'to' => $request['to'],
            'from' => 'info@server21.ltd',
            'msg' => $request['msg'],
            'subject' => $request['subject'],
            'status' => 'draft'
        ]);

        return response()->json([
            'msg'=>'success'
        ],200);
    }

    public function show_msg($id)
    {
        $setting = Setting::first();
        $msg = SendMail::where('id',$id)->first();
        $mails = SendMail::all();
        $data = auth()->user();
        return view('layouts.backend.mail.compose',[
            'msg'=>$msg,
            'mails'=>$mails,
            'data'=>$data,
            'setting'=>$setting
        ]);
    }

    public function delete($id)
    {
        SendMail::where('id',$id)->update([
            'status'=>'trash'
        ]);

        return redirect()->back();
    }


    public function trash()
    {
        $setting = Setting::first();
        $data = auth()->user();
        $mails = SendMail::all();
        return view('layouts.backend.mail.trash',[
            'mails'=>$mails,
            'data'=>$data,
            'setting'=>$setting
        ]);
    }

    public function destroy($id)
    {
        SendMail::where('id',$id)->delete();
        return redirect()->back();
    }
}
