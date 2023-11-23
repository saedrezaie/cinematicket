<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
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
            "to" => $this->resource->to,
            "from" => $this->resource->from,
            "cinema" => $this->whenLoaded("cinema",
                fn() => CinemaResource::make($this->resource->cinema)),

            "movie" => $this->whenLoaded("movie",
                fn() => MovieResource::make($this->resource->movie)),

            "tickets" => $this->whenLoaded("tickets",
                fn() => TicketResource::collection($this->resource->tickets)),
        ];
    }
}
