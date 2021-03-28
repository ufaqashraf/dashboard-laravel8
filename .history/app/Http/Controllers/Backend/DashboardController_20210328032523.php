<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PricePlan;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\Device;
use App\Models\Rules;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data = auth()->user();
        $total = User::count();
        $setting = Setting::first();
        $orders = order::where('status','Pending')->get();
        $daily = User::select('id', 'created_at')->whereDate('created_at', Carbon::today())
        ->count();
        $week = User::select('id', 'created_at')->where( 'created_at', '>', Carbon::now()->subDays(7))
        ->count();
        $monthly = User::select('id', 'created_at')->whereMonth('created_at', Carbon::now()->month)
        ->count();
        $yearly = User::select('id', 'created_at')->whereYear('created_at', Carbon::now()->year)
        ->count();
        $lastyear = User::select('id', 'created_at')->whereYear('created_at', Carbon::now()->subYear())
        ->count();

        $orderToday = Order::select('id', 'created_at')->whereDate('created_at', Carbon::today())
        ->count();
        $orderMonthly = Order::select('id', 'created_at')->whereMonth('created_at', Carbon::now()->month)
        ->count();
        $orderLastMonth = Order::select('id', 'created_at')->whereMonth('created_at', Carbon::now()->subMonth()->month)
        ->count();
        
        $orderYearly = Order::select('id', 'created_at')->whereYear('created_at', Carbon::now()->year)
        ->count();

        //device data
        $deviceToday = Device::select('id', 'created_at')->where('user_id',$data->id)->whereDate('created_at', Carbon::today())
        ->count();
        $deviceThisMonth = Device::select('id', 'created_at')->where('user_id',$data->id)->whereMonth('created_at', Carbon::now()->month)
        ->count();
        $deviceLastMonth = Device::select('id', 'created_at')->where('user_id',$data->id)->whereMonth('created_at', Carbon::now()->subMonth()->month)
        ->count();
        
        $deviceYearly = Device::select('id', 'created_at')->where('user_id',$data->id)->whereYear('created_at', Carbon::now()->year)
        ->count();

        //ticket data
        $ticketToday = Ticket::select('id', 'created_at')->where('user_id',$data->id)->whereDate('created_at', Carbon::today())
        ->count();
        $ticketThisMonth = Ticket::select('id', 'created_at')->where('user_id',$data->id)->whereMonth('created_at', Carbon::now()->month)
        ->count();
        $ticketLastMonth = Ticket::select('id', 'created_at')->where('user_id',$data->id)->whereMonth('created_at', Carbon::now()->subMonth()->month)
        ->count();
        
        $ticketYearly = Ticket::select('id', 'created_at')->where('user_id',$data->id)->whereYear('created_at', Carbon::now()->year)
        ->count();

        //rules data
        $rulesToday = Rules::select('id', 'created_at')->where('user_id',$data->id)->whereDate('created_at', Carbon::today())
        ->count();
        $rulesThisMonth = Rules::select('id', 'created_at')->where('user_id',$data->id)->whereMonth('created_at', Carbon::now()->month)
        ->count();
        $rulesLastMonth = Rules::select('id', 'created_at')->where('user_id',$data->id)->whereMonth('created_at', Carbon::now()->subMonth()->month)
        ->count();
        
        $rulesYearly = Rules::select('id', 'created_at')->where('user_id',$data->id)->whereYear('created_at', Carbon::now()->year)
        ->count();
        
        //for admin start
        //device data
        $deviceadminToday = Device::select('id', 'created_at')->whereDate('created_at', Carbon::today())
        ->count();
        $deviceadminThisMonth = Device::select('id', 'created_at')->whereMonth('created_at', Carbon::now()->month)
        ->count();
        $deviceadminLastMonth = Device::select('id', 'created_at')->whereMonth('created_at', Carbon::now()->subMonth()->month)
        ->count();
        
        $deviceadminYearly = Device::select('id', 'created_at')->whereYear('created_at', Carbon::now()->year)
        ->count();

        //ticket data
        $ticketadminToday = Ticket::select('id', 'created_at')->whereDate('created_at', Carbon::today())
        ->count();
        $ticketadminThisMonth = Ticket::select('id', 'created_at')->whereMonth('created_at', Carbon::now()->month)
        ->count();
        $ticketadminLastMonth = Ticket::select('id', 'created_at')->whereMonth('created_at', Carbon::now()->subMonth()->month)
        ->count();
        
        $ticketadminYearly = Ticket::select('id', 'created_at')->whereYear('created_at', Carbon::now()->year)
        ->count();

        //ticket data
        $rulesadminToday = Rules::select('id', 'created_at')->whereDate('created_at', Carbon::today())
        ->count();
        $rulesadminThisMonth = Rules::select('id', 'created_at')->whereMonth('created_at', Carbon::now()->month)
        ->count();
        $rulesadminLastMonth = Rules::select('id', 'created_at')->whereMonth('created_at', Carbon::now()->subMonth()->month)
        ->count();
        
        $rulesadminYearly = Rules::select('id', 'created_at')->whereYear('created_at', Carbon::now()->year)
        ->count();
        
        //for admin end

        $receive = Ticket::where('status','Pending')->count();
        $solve = Ticket::where('status','Solved')->count();
        $delete = Ticket::where('status','Reject')->count();


        if ($data->type == 'user') {
            // $date = Carbon::parse($data->created_at);
            $today = Carbon::today();
            
            $diff = $data->updated_at->diffInDays($today);
            $day = intval($data->duration)-$diff;
            // dd($day);
            
            User::where('id',auth()->user()->id)->where('payment','free')->update([
                'duration'=>$day
            ]);
        }

        return view('layouts.backend.dashboard',[
            'data'=>$data,
            'daily'=>$daily,
            'monthly'=>$monthly,
            'yearly'=>$yearly,
            'lastyear'=>$lastyear,
            'orderToday'=>$orderToday,
            'orderMonthly'=>$orderMonthly,
            'orderLastMonth'=>$orderLastMonth,
            'orderYearly'=>$orderYearly,
            'deviceToday'=>$deviceToday,
            'deviceThisMonth'=>$deviceThisMonth,
            'deviceLastMonth'=>$deviceLastMonth,
            'deviceYearly'=>$deviceYearly,
            'ticketToday'=>$ticketToday,
            'ticketThisMonth'=>$ticketThisMonth,
            'ticketLastMonth'=>$ticketLastMonth,
            'ticketYearly'=>$ticketYearly,
            'rulesToday'=>$rulesToday,
            'rulesThisMonth'=>$rulesThisMonth,
            'rulesLastMonth'=>$rulesLastMonth,
            'rulesYearly'=>$rulesYearly,
            'deviceadminToday'=>$deviceadminToday,
            'deviceadminThisMonth'=>$deviceadminThisMonth,
            'deviceadminLastMonth'=>$deviceadminLastMonth,
            'deviceadminYearly'=>$deviceadminYearly,
            'ticketadminToday'=>$ticketadminToday,
            'ticketadminThisMonth'=>$ticketadminThisMonth,
            'ticketadminLastMonth'=>$ticketadminLastMonth,
            'ticketadminYearly'=>$ticketadminYearly,
            'rulesadminToday'=>$rulesadminToday,
            'rulesadminThisMonth'=>$rulesadminThisMonth,
            'rulesadminLastMonth'=>$rulesadminLastMonth,
            'rulesadminYearly'=>$rulesadminYearly,
            'total'=>$total,
            'orders'=>$orders,
            'week'=>$week,
            'receive'=>$receive,
            'solve'=>$solve,
            'delete'=>$delete,
            'setting'=>$setting
        ]);
    }

    public function get_user()
    {
        $data = auth()->user();
        $users = User::with('get_plan')->get();
        $plans = PricePlan::all();
        $setting = Setting::first();
        return view('layouts.backend.user.user_list',[
            'data'=>$data,
            'users'=>$users,
            'plans'=>$plans,
            'setting'=>$setting
        ]);
    }
    public function get_profile_user()
    {
        $data = auth()->user();
        $users = User::with('get_plan')->get();
        $users = Auth::user()
        $plans = PricePlan::all();
        $setting = Setting::first();
        return view('layouts.backend.user.profile_list',[
            'data'=>$data,
            'users'=>$users,
            'plans'=>$plans,
            'setting'=>$setting,
            'user'=>$user,
        ]);
    }

    public function get_api_key()
    {
        $data = auth()->user();
        $users = User::all();
        $setting = Setting::first();
        return view('layouts.backend.user.api_key',[
            'data'=>$data,
            'users'=>$users,
            'setting'=>$setting
        ]);
    }

    public function edit_key(Request $request)
    {
        User::where('id',auth()->user()->id)->update([
            'private_test_key' => Str::random(16),
            'public_test_key' => Str::random(10)
        ]);

        return response()->json([
            'msg'=>'success'
        ],200);
    }


    public function change_status(Request $request)
    {
        $data = User::where('id',$request->id)->first();

        if ($data->status == 0) {
            User::where('id',$request->id)->update([
                'status'=>1
            ]);
        }else{
            User::where('id',$request->id)->update([
                'status'=>0
            ]);
        }

        return response()->json([
            'msg'=>'success'
        ],200);
    }

    public function icon_index()
    {
        $data = auth()->user();
        $setting = Setting::first();
        return view('layouts.backend.our-icon.icon',[
            'data'=>$data,
            'setting'=>$setting
        ]);
    }

    
    public function store(Request $request)
    {
        $id = User::where('id',$request->id)->first();
        if ($id) {
            $image = $request->file('icon');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $upload_path = public_path()."/images/";

            User::where('id',$request->id)->update([
                'icon_name'=>$request->icon_name,
                'icon'=>$new_name
            ]);
            \File::delete(public_path('images/' . $id->icon));

            $image->move($upload_path, $new_name);
        }else{
            $image = $request->file('icon');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $upload_path = public_path()."/images/";

            User::create([
                'icon_name'=>$request->icon_name,
                'icon'=>$new_name
            ]);
            $image->move($upload_path, $new_name);
        }

        return response()->json([
            'msg'=>'success'
        ],200);
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
