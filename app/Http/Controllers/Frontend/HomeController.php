<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('layouts.frontend.home',[
            'setting'=>$setting
        ]);
    }



    public function demo()
    {
        $setting = Setting::first();
        return view('layouts.frontend.demo',[
            'setting'=>$setting
        ]);

    }



    public function store(Request $request)
    {
        //
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
