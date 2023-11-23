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
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'parent info' => $this->whenLoaded("parent",
                fn() => CategoryResource::collection($this->resource->parent)),

            'children info' => $this->whenLoaded('children',
                fn() => CategoryResource::make($this->resource->children)),
        ];
    }
}
