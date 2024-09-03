<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtripEarnings extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table="ctrip_earnings";

    public function user(){

        return $this->belongsTo(ChaincityTripUser::class,'user_id');
    }

    public function earnings(){
        return $this->hasMany(CtripEarnings::class,'user_id','user_id')->select('amount');
    }
}
