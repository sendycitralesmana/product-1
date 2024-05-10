<?php

namespace App\Http\Resources\Application;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'area' => $this->area,
            'time' => $this->time,
            'description' => $this->description,
            'thumbnail' => $this->thumbnail,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            
        ];
    }
}
