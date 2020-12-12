<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserPermissionResource extends JsonResource
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
            'username' => $this->username,
            'email' => $this->email,
            'permissions' => $this->permissions,
            'avatar' => $this->getAvatarAttribute(),
            // 'status' => $this->status,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('api.users.show', $this->id)
                ]
            ]
        ];
    }
}
