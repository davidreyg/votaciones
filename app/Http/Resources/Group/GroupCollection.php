<?php

namespace App\Http\Resources\Group;

use App\Models\Group;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GroupCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function (Group $group) {
            return (new GroupResource($group));
        });
        return [
            'data' => $this->collection
        ];
    }
}
