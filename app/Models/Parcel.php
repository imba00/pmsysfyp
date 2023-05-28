<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    use HasFactory;

    protected $fillable = [
        'stud_id',
        'tracknum',
        'apartment',
        'phoneno',
        'arrivedate',
        'collectpin',
        'status', // add status attribute to fillable array
    ];
}