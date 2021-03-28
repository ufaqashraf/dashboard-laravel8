<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function get_user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function get_plan()
    {
        return $this->belongsTo(PricePlan::class,'price_plan_id');
    }
}
