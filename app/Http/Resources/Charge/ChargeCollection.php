<?php

namespace App\Http\Resources\Charge;

use App\Models\Charge;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ChargeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function (Charge $charge) {
            return (new ChargeResource($charge));
        });
        return [
            'data' => $this->collection
        ];
    }
}
