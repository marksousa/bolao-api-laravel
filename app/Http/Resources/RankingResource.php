<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RankingResource extends JsonResource
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
            'betting_group' => [
                'name' => $this->betting_group->name,
                'description' => $this->betting_group->description,
                'logo' => $this->betting_group->logo,
            ],
            'points' => $this->points
        ];
    }
}
