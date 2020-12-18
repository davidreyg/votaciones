<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name', 'description'];
    //
    public function employee_group()
    {
        return $this->hasMany(EmployeeGroup::class);
    }

    public function employees()
    {
        return $this->hasManyThrough(Employee::class, EmployeeGroup::class);
    }
}
