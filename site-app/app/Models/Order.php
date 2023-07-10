<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ambulatory;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Status;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id', 'ambulatory_id', 'doctor_id', 'date', 'time',
        'description', 'lname', 'fname', 'email', 'status_id', 'phone'
    ];

    public function ambulatory() {
        return $this->belongsTo(Ambulatory::class, 'ambulatory_id');
    }
    
    public function doctor() {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
    
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function status() {
        return $this->belongsTo(Status::class, 'status_id');
    }
}