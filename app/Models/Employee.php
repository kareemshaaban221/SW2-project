<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'salary',
        'manager_id',
        'national_id'
    ];

    function user() {
        return $this->belongsTo(User::class);
    }

    function doctor() {
        return $this->hasOne(Doctor::class);
    }

    function accountant() {
        return $this->hasOne(Accountant::class);
    }

    function receptionist() {
        return $this->hasOne(Receptionist::class);
    }
}
