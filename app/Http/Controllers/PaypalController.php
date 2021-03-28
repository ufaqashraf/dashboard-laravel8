<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use App\Models\User;
use App\Models\Order;
use App\Models\PricePlan;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting; 

class PaypalController extends Controller
{
    private $_api_context;
    
    public function __construct()
    {
            
        $paypal_configuration = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }

    public function payWithPaypal()
    {
        $setting = Setting::first();
        return view('paywithpaypal',[
            'setting'=>$setting    
        ]);
    }

    public function postPaymentWithpaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

    	$item_1 = new Item();

        $item_1->setName('Product 1')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount'));

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Enter Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status'))
            ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));            
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return Redirect::route('paypal.failed');                
            } else {
                \Session::put('error','Some error occur, sorry for inconvenient');
                return Redirect::route('paypal.failed');                
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        $user = User::where('username',$request->username)->first();
        Session::put('user_id',$user->id ?? '');
        Order::create([
            'user_id'=>auth()->user()->id ?? $user->id,
            'tran_id'=>$payment->getId(),
            'package'=>$request->package,
            'duration'=>$request->duration,
            'price'=>$request->amount,
            'status'=>'Failed'
        ]);
        
        Session::put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)) {            
            return Redirect::away($redirect_url);
        }

        // \Session::put('error','Unknown error occurred');
    	return Redirect::route('paypal.failed');
    }

    public function getPaymentStatus(Request $request)
    {        
        $payment_id = Session::get('paypal_payment_id');
        Session::forget('paypal_payment_id');
        // dd($request->all());
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            // dd('Payment failed1');
            // \Session::put('error','Payment failed');
            User::where('id',Session::get('user_id'))->update([
                'payment'=>"failed",
            ]);
            Order::where('status','Failed')->delete();
            if (Auth::check()) {
                return Redirect::route('paypal.failed');
            }else{
                return view('layouts.backend.auth.failed');
            }
        }
        $payment = Payment::get($payment_id, $this->_api_context);        
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));        
        $result = $payment->execute($execution, $this->_api_context);
        
        if ($result->getState() == 'approved') {   
            $orderId = Order::where('user_id',auth()->user()->id ?? Session::get('user_id'))->latest('created_at')->first();
            
            if ($request->paymentId == $orderId->tran_id) {
                $plan = PricePlan::where('name',$orderId->package)->first();

                User::where('id',$orderId->user_id)->update([
                    'price_plan_id'=>$plan->id,
                    'duration'=>$orderId->duration,
                    'payment'=>"done",
                ]);
                Order::where('user_id',$orderId->user_id)->latest('created_at')->update([
                    'status'=>'Pending'
                ]);
            }
            \Session::put('success','Payment success !!');
            if (Auth::check()) {
                return Redirect::route('paypal.success');
            }else{
                return view('layouts.backend.auth.payment_done');
            }
        }
        // dd("Payment failed2");
        // \Session::put('error','Payment failed !!');
        User::where('id',Session::get('user_id'))->update([
            'payment'=>"failed",
        ]);
        Order::where('status','Failed')->delete();
		if (Auth::check()) {
            return Redirect::route('paypal.failed');
        }else{
            return view('layouts.backend.auth.failed');
        }
    }
    
    public function payment_success()
    {
        $setting = Setting::first();
        $data = auth()->user();
        if(Auth::check()){
            return view('layouts.backend.payment.payment_done',[
                'data'=>$data,
                'setting'=>$setting
            ]);
        }else{
            return view('layouts.backend.auth.payment_done',[
                'setting'=>$setting
            ]);
        }
    }

    public function payment_failed()
    {
        $setting = Setting::first();
        $data = auth()->user();
        if(Auth::check()){
            return view('layouts.backend.payment.failed',[
                'data'=>$data,
                'setting'=>$setting
            ]);
        }else{
            return view('layouts.backend.auth.failed',[
                'setting'=>$setting
            ]);
        }
    }
}
