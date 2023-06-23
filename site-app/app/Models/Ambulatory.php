<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambulatory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'city', 'address', 'phone', 
        'mobile_phone', 'description', 'map'
    ];
}
