<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CinemaResource extends JsonResource
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
            "name" => $this->resource->name,
            "capacity" => $this->resource->capacity,
            "address" => $this->resource->address,
            "city" => $this->whenLoaded("city",
                fn() => CityResource::make($this->resource->city)),

            "sections" => $this->whenLoaded("sections",
            fn()=> SectionResource::collection($this->resource->sections)),

            'ticket_max' => $this->whenCounted('tickets'),
        ];
    }
}
