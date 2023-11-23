<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->resource->id,
            'name'=> $this->resource->name,
            'phone'=> $this->resource->phone,
            'role info'=> $this->whenLoaded('roles',
                fn()=> RoleUserResource::collection($this->resource->roles)),
        ];
    }
}
