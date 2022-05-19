<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    function employee() {
        return $this->belongsTo(Employee::class);
    }

    function clinic() {
        return $this->belongsTo(Clinic::class);
    }

    function patients() {
        return $this->hasMany(Patient::class);
    }
}
