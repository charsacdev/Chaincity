<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ChaincityTripUser extends Authenticatable
{
    use HasFactory,SoftDeletes;

    use HasFactory,SoftDeletes;

    protected $guarded = [];

    protected $table="chaincity_trip_users";

    protected $casts=['account_kyc'=>'array'];

    public function property(){
        return $this->hasMany(CtripProperty::class,'agent_id');
    }


    public function bookings(){
        return $this->hasMany(CTripRservation::class,'user_id');
    }

    public function listingsaved(){
        return $this->hasMany(CtripSavedListing::class,'user_id');
    }

    public function earnings(){
        return $this->hasMany(CtripEarnings::class,'user_id')->select('amount');
    }

}
