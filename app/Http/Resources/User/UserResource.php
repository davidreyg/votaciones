<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'company_id' => $this->company_id,
            'employee_id' => $this->employee_id,
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
