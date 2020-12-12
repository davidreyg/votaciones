<?php

namespace App\Http\Resources\Permission;

use App\Models\Permission;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PermissionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function (Permission $permission) {
            return (new PermissionResource($permission));
        });
        return [
            'data' => $this->collection,
        ];
    }
}
