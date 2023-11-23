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
            "id" => $this->resource->id,
            "price" => $this->resource->price,
            "time" => $this->resource->time,
            "salon" => $this->resource->salon,

            "user info" => $this->whenLoaded("user" ,
            fn()=> UserResource::make($this->resource->user)),

            "section info" => $this->whenLoaded("section" ,
            fn()=> SectionResource::make($this->resource->section))
        ];
    }
}
