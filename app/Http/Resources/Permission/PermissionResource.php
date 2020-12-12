<?php

namespace App\Http\Resources\Permission;

use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
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
            'display_name' => $this->display_name,
            'entity_id' => $this->entity_id,
            'entity_name' => $this->entity->name,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('api.permissions.show', $this->id)
                ]
            ]
        ];
    }
}
