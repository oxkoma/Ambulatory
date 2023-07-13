<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ambulatory;
use App\Models\Doctor;

class Shedule extends Model
{
    use HasFactory;

    protected $dates = ['date_start', 'date_end', 'time_start', 'time_end'];

    
    protected $fillable = [
        'speciality_id', 'doctor_id', 'ambulatory_id', 'date_start',
        'date_end', 'time_start', 'time_end', 'time_interval'
    ];

    public function ambulatory() {
        return $this->belongsTo(Ambulatory::class, 'ambulatory_id');
    }
    
    public function doctor() {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}