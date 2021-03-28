<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Setting;

class TicketController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $data = auth()->user();
        $tickets = Ticket::all();
        return view('layouts.backend.ticket.ticket',[
            'data'=>$data,
            'tickets'=>$tickets,
            'setting'=>$setting
        ]);
    }

    public function change_status(Request $request)
    {
        $ticket = Ticket::where('id',$request->id)->first();
        if($ticket && $request->val == null){
            Ticket::where('id',$request->id)->update([
                'status'=>'Solved'
            ]);
        }else{
            Ticket::where('id',$request->id)->update([
                'status'=>'Reject'
            ]);
        }
        return response()->json([
            'msg'=>'success'
        ],200);
        
    }

    
    public function store(Request $request)
    {
        Ticket::create([
            'user_id'=>auth()->user()->id,
            'ticket_id'=>$request->ticket_id,
            'query'=>$request->user_query
        ]);

        return response()->json([
            'msg'=>'success'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $ticket = Ticket::where('id',$request->id)->first();
        if($ticket){

            Ticket::where('id',$request->id)->update([
                'query'=>$request->user_query
            ]);
        }

        return response()->json([
            'msg'=>'success'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Ticket::where('id',$request->id)->delete();
        return response()->json([
            'msg'=>'success'
        ],200);
    }
}
