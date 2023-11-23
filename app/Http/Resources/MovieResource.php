<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
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
            "minute" => $this->resource->minute,

            "category" => $this->whenLoaded("category",
                fn() => CategoryResource::make($this->resource->category)),

            "sections" => $this->whenLoaded("sections",
                fn() => SectionResource::collection($this->resource->sections)),

            "ticket_count" => $this->whenCounted("tickets")
        ];
    }
}
