<?php

namespace App\Http\Resources\Group;

use App\Http\Resources\Employee\EmployeeResource;
use App\Http\Resources\EmployeeGroup\EmployeeGroupResource;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            // 'employees' => $this->employee_group,
            'details' => EmployeeGroupResource::collection($this->employee_group)
            // 'links' => [
            //     [
            //         'rel' => 'self',
            //         'href' => route('api.employees.show', $this->id)
            //     ]
            // ]
        ];
    }
}
