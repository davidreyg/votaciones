<?php

namespace App\Http\Resources\EmployeeGroup;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeGroupResource extends JsonResource
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
            'charge' => $this->charge,
            'employee' => $this->employee,
            'group' => $this->group,
            // 'links' => [
            //     [
            //         'rel' => 'self',
            //         'href' => route('api.employees.show', $this->id)
            //     ]
            // ]
        ];
    }
}
