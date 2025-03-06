<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $table = 'person';

    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'id');
    }
}