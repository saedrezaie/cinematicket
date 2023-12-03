<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'uuid' => $this->resource->uuid,
            'name' => $this->resource->name,
            'parent' => $this->whenLoaded("parent",
                fn() => CategoryResource::collection($this->resource->parent)),

            'children' => $this->whenLoaded('children',
                fn() => CategoryResource::make($this->resource->children)),
        ];
    }
}
