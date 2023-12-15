<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'game' => [
                'id' => $this->game->id,
                'home' => $this->game->team->home,
                'away' => $this->game->team->away,
                'start' => $this->game->start->toDateTimeString(),
                'result' => $this->game->result,
                'season' => [
                    'id' => $this->game->season->id,
                    'name' => $this->game->season->name,
                    'active' => $this->game->season->active,
                    'tournament' => [
                        'id' => $this->game->season->tournament->id,
                        'name' => $this->game->season->tournament->name,
                        'sport' => [
                            'id' => $this->game->season->tournament->sport->id,
                            'name' => $this->game->season->tournament->sport->name
                        ]
                    ]
                ]
            ],
            'prediction' => $this->prediction,
            'points' => $this->points
        ];
    }
}
