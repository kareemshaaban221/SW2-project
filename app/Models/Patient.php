<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';

    protected $fillable = [
        'user_id',
        'doctor_id',
        'status_id'
    ];

    function user() {
        return $this->belongsTo(User::class);
    }

    function doctor() {
        return $this->belongsTo(Doctor::class);
    }
}
