<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeGroup extends Model
{
    //
    protected $fillable = ['charge_id', 'employee_id', 'group_id'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function charge()
    {
        return $this->belongsTo(Charge::class);
    }

    public static function createEmployeGroupDetail(Group $group, $employeeGroupDetials)
    {
        //Loop through sales detalle_ventas
        foreach ($employeeGroupDetials as $detail) {

            //Create a new instance of sales detalle_ventas model
            $employee_group = new EmployeeGroup;

            //fill the model properties (mass assignment) with the detail
            $employee_group->fill($detail);

            //Save and link sales employee_group to sales
            $group->employee_group()->save($employee_group);

            //DESCONTAMOS EL PRODUCTO DE CADA DETALLE DE VENTA
            // $product = Product::findOrFail($data['product_id']);
            // $cantidadADescontar = $data['quantity'];

            // Product::descontarStock($product, $cantidadADescontar);
        }
    }
}
