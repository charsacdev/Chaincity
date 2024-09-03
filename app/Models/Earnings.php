<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Earnings extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){

        return $this->belongsTo(UsersTable::class,'user_id');
    }


    public function earnings(){
        return $this->hasMany(Earnings::class,'user_id','user_id')->select('amount');
    }
}
