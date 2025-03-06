<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function person()
    {
        return $this->belongsTo(Person::class, 'id', 'id');
    }

    public function manager()
    {
        return $this->hasOne(Manager::class, 'id', 'id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function hitungGaji()
    {
        $totalDays = now()->daysInMonth;
        $attendedDays = $this->attendances()->where('present', 1)->count();
        return ($attendedDays / $totalDays) * $this->salary;
    }
}