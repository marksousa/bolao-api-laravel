<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BettingGroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'season' => [
                'name' => $this->season->name,
                'tournament_id' => $this->season->tournament_id,
                'active' => $this->season->active,
            ],
            'name' => $this->name,
            'description' => $this->description,
            'logo' => $this->logo,
        ];
    }
}
