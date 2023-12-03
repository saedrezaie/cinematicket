<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "uuid" => $this->resource->uuid,
            "price" => $this->resource->price,
            "time" => $this->resource->time,
            "salon" => $this->resource->salon,

            "user" => $this->whenLoaded("user" ,
            fn()=> UserResource::make($this->resource->user)),

            "section" => $this->whenLoaded("section" ,
            fn()=> SectionResource::make($this->resource->section))
        ];
    }
}
