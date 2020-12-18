<?php

namespace App\Http\Resources\Election;

use App\Models\Election;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ElectionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function (Election $election) {
            return (new ElectionResource($election));
        });
        return [
            'data' => $this->collection
        ];
    }
}
