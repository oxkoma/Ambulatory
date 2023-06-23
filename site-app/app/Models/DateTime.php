<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateTime extends Model
{
    use HasFactory;
    protected $fillable = [
        'ambulatory_id', 'doctor_id', 'full_date_appoint', 
        'date_appoint', 'time_appoint',
    ];
}
