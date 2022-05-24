<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'affiliate_id', 'name', 'latitude', 'longitude', 'distance_km'
    ];

    use HasFactory;
}
