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
            "id" => $this->resource->id,
            "name" => $this->resource->name,
            "capacity" => $this->resource->capacity,
            "address" => $this->resource->address,
            "city" => $this->whenLoaded("city",
                fn() => CityResource::make($this->resource->city)),

            "sections" => $this->whenLoaded("sections",
            fn()=> SectionResource::collection($this->resource->sections)),

            "ticket" => $this->whenCounted("tickets",
            fn()=> TicketResource::collection($this->resource->tickets))
        ];
    }
}
