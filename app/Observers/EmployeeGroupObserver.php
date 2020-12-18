<?php

namespace App\Observers;

use App\Models\Employee;
use App\Models\EmployeeGroup;

class EmployeeGroupObserver
{
    public function creating(EmployeeGroup $employeeGroup)
    {
        //ESTO ES EL TRIGGER QUE EJECUTA QUE CUANDO INSERTAMOS UN REGISTRO EN LA TABLA DETALLE DE GRUPO
        //AUTOMATICAMENTE ACTUALIZARA EL ESTADO DEL EMPLEADO EN CUESTION.
        $employee = Employee::find($employeeGroup->employee_id);
        $employee->condition = 'G';
        $employee->save();
    }
}
