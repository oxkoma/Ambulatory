<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'speciality_id', 'doctor_id', 'ambulatory_id', 'date_start',
        'date_end', 'time_start', 'time_end', 'time_interval'
    ];
}
