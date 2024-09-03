<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTripRservation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table="c_trip_rservations";
}
