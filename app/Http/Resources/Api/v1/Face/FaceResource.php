<?php

namespace App\Http\Resources\Api\v1\Face;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FaceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "faceScore" => $this['faceScore'],
        ];
    }
}
