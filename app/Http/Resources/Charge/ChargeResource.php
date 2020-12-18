<?php

namespace App\Http\Resources\Charge;

use Illuminate\Http\Resources\Json\JsonResource;

class ChargeResource extends JsonResource
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
            // 'links' => [
            //     [
            //         'rel' => 'self',
            //         'href' => route('api.employees.show', $this->id)
            //     ]
            // ]
        ];
    }
}
