<?php

namespace App\Observers;

use App\Models\Employee;
use App\Models\User;

class EmployeeObserver
{
    public function created(Employee $employee)
    {
        $user = new User;
        $user->username = $employee->dni;
        $user->password = 'password';
        $user->employee_id = $employee->id;
        $user->status = 'R';
        $user->assignRole('elector');
        $user->save();
    }
}
