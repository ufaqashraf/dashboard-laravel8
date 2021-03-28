<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function get_antivirus()
    {
        return $this->belongsTo(Antivirus::class,'antivirus_id');
    }
}
