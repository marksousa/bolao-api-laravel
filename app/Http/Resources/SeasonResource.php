<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeasonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'active' => $this->active,
            'tournament' => [
                'id' => $this->tournament->id,
                'name' => $this->tournament->name,
                'sport' => [
                    'id' => $this->tournament->sport->id,
                    'name' => $this->tournament->sport->name
                ]
            ]
        ];
    }
}
