<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [ 'fname', 'lname', 'mname', 
                            'speciality_id', 'description', 
                            'keywords', 'experience', 
                            'category', 'img', 'isOnline'];
}