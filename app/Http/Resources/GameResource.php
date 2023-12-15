<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
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
            'home' => $this->team->home,
            'away' => $this->team->away,
            'start' => $this->start->toDateTimeString(),
            'result' => $this->result,
            'season' => [
                'id' => $this->season->id,
                'name' => $this->season->name,
                'active' => $this->season->active,
                'tournament' => [
                    'id' => $this->season->tournament->id,
                    'name' => $this->season->tournament->name,
                    'sport' => [
                        'id' => $this->season->tournament->sport->id,
                        'name' => $this->season->tournament->sport->name
                    ]
                ]
            ]
        ];
    }
}
