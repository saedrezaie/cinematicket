<?php

namespace App\Http\Resources;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
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

            "cinema" => $this->whenLoaded("cinemas" ,
            fn()=> CinemaResource::collection($this->resource->cinemas)),

            "tickets" => $this->whenLoaded("tickets" ,
            fn()=> TicketResource::collection($this->resource->tickets))
        ];
    }
}
