<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DeviceController;
use App\Http\Controllers\Backend\AntivirusController;
use App\Http\Controllers\Backend\PricePlanController;
use App\Http\Controllers\Backend\RulesController;
use App\Http\Controllers\Backend\RulesFieldController;
use App\Http\Controllers\Backend\SendMailController;
use App\Http\Controllers\Backend\DomainIPController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\UserNotificationController;
use App\Http\Controllers\Backend\TicketController;
use App\Http\Controllers\Backend\OrderController;
//stripe and paypal controller... 
use App\Http\Controllers\StripeController;
use App\Http\Controllers\PaypalController;



//frontend controller...
Route::get('/',[HomeController::Class,'index'])->name('home');
Route::get('/demo',[HomeController::Class,'demo'])->name('demo');

//backend routes...

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login',[LoginController::Class,'index'])->name('login');
    Route::get('/register',[LoginController::Class,'register'])->name('register');
    Route::post('/user-login',[LoginController::Class,'login'])->name('user.login');
    Route::post('/user-store',[LoginController::Class,'store'])->name('user.store');
    Route::post('/get-user',[LoginController::Class,'get_user'])->name('user');
    Route::get('/user-verify/{token}',[LoginController::Class,'user_verify'])->name('user.verify');
    Route::get('/forgot-password',[LoginController::Class,'view_forgot_password'])->name('forgot.password');
    Route::get('/update-password-view',[LoginController::Class,'update_password_view'])->name('update.password.view');
    Route::post('/update-password',[LoginController::Class,'update_password'])->name('update.password');
    Route::post('/rest-pass-email-verify',[LoginController::Class,'password_reset_email_verification'])->name('reset.pass.email.verify');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard',[DashboardController::Class,'index'])->name('dashboard');
    Route::get('/all-user',[DashboardController::Class,'get_user'])->name('get.user');
    Route::get('/profile-user',[DashboardController::Class,'get_profile_user'])->name('get.profile.user');
    Route::get('/api-key',[DashboardController::Class,'get_api_key'])->name('get.api.key');
    Route::post('/edit-api-key',[DashboardController::Class,'edit_key'])->name('edit.key');
    Route::post('/user-status',[DashboardController::Class,'change_status'])->name('change.user.status');
    Route::post('/user-update',[LoginController::Class,'update'])->name('user.update');
    Route::get('/logout',[LoginController::Class,'logout'])->name('logout');

    //device routes...
    Route::get('/device',[DeviceController::Class,'index'])->name('device');
    Route::post('/device-store',[DeviceController::Class,'store'])->name('device.store');
    Route::get('/create-device',[DeviceController::Class,'create'])->name('create.device');

    //antivirus routes...
    Route::get('/antivirus',[AntivirusController::Class,'index'])->name('virus');
    Route::post('/virus-store',[AntivirusController::Class,'store'])->name('virus.store');
    Route::post('/virus-update',[AntivirusController::Class,'update'])->name('virus.update');
    Route::post('/virus-delete',[AntivirusController::Class,'destroy'])->name('virus.delete');
    Route::post('/virus-status',[AntivirusController::Class,'change_status'])->name('virus.status');
    Route::post('/virus',[AntivirusController::Class,'get_virus'])->name('get.virus');

    //price plan routes...
    Route::get('/price-plan',[PricePlanController::Class,'index'])->name('plan');
    Route::post('/plan-store',[PricePlanController::Class,'store'])->name('plan.store');
    Route::post('/plan-update',[PricePlanController::Class,'update'])->name('plan.update');
    Route::post('/plan-delete',[PricePlanController::Class,'destroy'])->name('plan.delete');
    Route::post('/plan-status',[PricePlanController::Class,'change_status'])->name('plan.status');
    Route::post('/get-plan',[PricePlanController::Class,'get_plan'])->name('get.plan');

    //rules routes...
    Route::get('/rules',[RulesController::Class,'index'])->name('rules');
    Route::post('/rules-store',[RulesController::Class,'store'])->name('rules.store');
    Route::post('/rules-update',[RulesController::Class,'update'])->name('rules.update');
    Route::post('/rules-delete',[RulesController::Class,'destroy'])->name('rules.delete');
    Route::post('/rules-status',[RulesController::Class,'change_status'])->name('rules.status');

     //mail routes....
     Route::get('mail-inbox',[SendMailController::Class,'index'])->name('mail.inbox');
     Route::get('compose-index',[SendMailController::Class,'compose_index'])->name('compose.index');
     Route::get('read-index/{msg}',[SendMailController::Class,'read_index'])->name('read.index');
     Route::post('send-msg',[SendMailController::Class,'store'])->name('send.msg');
     Route::post('mail-draft',[SendMailController::Class,'draft'])->name('mail.draft');
     Route::get('draft-index',[SendMailController::Class,'draft_index'])->name('draft.index');
     Route::get('show-msg/{id}',[SendMailController::Class,'show_msg'])->name('show.mail');
     Route::get('delete-msg/{id}',[SendMailController::Class,'delete'])->name('msg.delete');
     Route::get('destroy-msg/{id}',[SendMailController::Class,'destroy'])->name('msg.destroy');
     Route::get('trash-msg',[SendMailController::Class,'trash'])->name('trash');

     //domain ip routes...
    Route::get('/domain',[DomainIPController::Class,'index'])->name('domain');
    Route::get('/ip',[DomainIPController::Class,'index_ip'])->name('ip');
    // Route::post('/domain-store',[DomainIPController::Class,'store'])->name('domain.store');
    Route::post('/domain-update',[DomainIPController::Class,'update'])->name('domain.update');
    // Route::post('/domain-delete',[DomainIPController::Class,'destroy'])->name('domain.delete');
    // Route::post('/ip-store',[DomainIPController::Class,'ip_store'])->name('ip.store');
    // Route::post('/ip-update',[DomainIPController::Class,'ip_update'])->name('ip.update');
    // Route::post('/ip-delete',[DomainIPController::Class,'ip_destroy'])->name('ip.delete');

    //settings route...
    Route::get('/setting',[SettingController::Class,'index'])->name('setting');
    Route::post('/setup',[SettingController::Class,'store'])->name('setting.store');

     //field routes...
     Route::get('/fields',[RulesFieldController::Class,'index'])->name('fields');
     Route::post('/field-store',[RulesFieldController::Class,'store'])->name('field.store');
     Route::post('/field-update',[RulesFieldController::Class,'update'])->name('field.update');
    
    //notification routes...
    Route::get('/notifiaction',[UserNotificationController::Class,'index'])->name('noti');

    //our icon routes... 
    Route::get('/icon',[DashboardController::Class,'icon_index'])->name('icon');
    Route::post('/icon-store',[DashboardController::Class,'store'])->name('icon.store');

    //ticket routes ...
    Route::get('/ticket',[TicketController::Class,'index'])->name('ticket');
    Route::post('/ticket-store',[TicketController::Class,'store'])->name('ticket.store');
    Route::post('/ticket-update',[TicketController::Class,'update'])->name('ticket.update');
    Route::post('/ticket-delete',[TicketController::Class,'destroy'])->name('ticket.delete');
    Route::post('/ticket-status',[TicketController::Class,'change_status'])->name('ticket.status');

    //order routes... 
    Route::get('/order',[OrderController::Class,'index'])->name('order');
    Route::post('/order-delete',[OrderController::Class,'destroy'])->name('delete.order');

    //blank form payment route...
    Route::get('/payment',[OrderController::Class,'payment'])->name('payment');

    
});


//stripe routes... 
Route::get('stripe', [StripeController::class, 'stripe']);
Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');

//paypal routes... 
Route::get('paypal-success', [PaypalController::class,'payment_success',])->name('paypal.success');
Route::get('paypal-failed', [PaypalController::class,'payment_failed',])->name('paypal.failed');
Route::post('paypal', [PaypalController::class,'postPaymentWithpaypal'])->name('paypal.post');
Route::get('paypal', [PaypalController::class,'getPaymentStatus'])->name('status');

Route::get('payment-success', [StripeController::class,'payment_success'])->name('payment.done');
Route::get('payment-failed', [StripeController::class,'payment_failed'])->name('payment.failed');


