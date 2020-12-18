<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{

    public $timestamps = false;
    //
    public function employee_groups()
    {
        return $this->hasMany(EmployeeGroup::class);
    }
}
