<?php

namespace Tests\Feature;

use App\Models\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TeamsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_team_has_a_name()
    {
        $team = Team::factory()->create([
            'name' => 'São Paulo FC'
        ]);

        $this->assertEquals('São Paulo FC', $team->name);
    }

    /** @test */
    public function a_team_has_a_country()
    {
        $team = Team::factory()->create([
            'country' => 'Brazil'
        ]);

        $this->assertEquals('Brazil', $team->country);
    }

    
}
