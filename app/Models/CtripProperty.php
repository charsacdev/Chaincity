<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CtripProperty extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    protected $table="ctrip_properties";

    protected $casts=[
        'property_location'=>'array',
        'property_basics'=>'array',
        'property_offers'=>'array',
        'property_photos'=>'array',
        'property_process'=>'array',
        'property_describe'=>'array',
        'reservation_discount'=>'array',
        'hosting_extras'=>'array',
        'property_process'=>'array'
    ];

    public function user(){

        return $this->belongsTo(ChaincityTripUser::class,'reseller_id');
    }
}
