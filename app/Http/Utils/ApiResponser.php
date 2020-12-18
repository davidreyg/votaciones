<?php

namespace App\Http\Utils;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

trait ApiResponser
{
    protected function successResponse($message, $code)
    {
        return response()->json(['message' => $message, 'status_code' => $code], $code);
    }
    protected function errorResponse($message, $code)
    {
        return response()->json(['message' => $message, 'status_code' => $code], $code);
    }
    protected function showAll(ResourceCollection $coleccion, $code = 200)
    {
        return response()->json($coleccion, $code);
    }

    protected function showOne(JsonResource $modelo, $code = 200)
    {
        return response()->json($modelo, $code);
    }
}
