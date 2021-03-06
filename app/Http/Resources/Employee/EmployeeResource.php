<?php

namespace App\Http\Resources\Employee;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'plaza' => $this->plaza,
            'names' => $this->names,
            'dni' => $this->dni,
            'office' => $this->office,
            'charge' => $this->charge,
            'plh' => $this->plh,
            'codsiaf' => $this->codsiaf,
            'condition' => $this->condition,
            'charge_group' => '',
            // 'links' => [
            //     [
            //         'rel' => 'self',
            //         'href' => route('api.employees.show', $this->id)
            //     ]
            // ]
        ];
    }
}
