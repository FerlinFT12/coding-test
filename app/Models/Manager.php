<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id', 'id');
    }
    
    public function totalEarnings()
    {
        return ($this->employee ? $this->employee->salary : 0) + $this->bonus;
    }
}