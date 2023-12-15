<?php

namespace Tests\Feature;

use App\Models\Sport;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SportsTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = $this->createUser();
    }

    public function createUser()
    {
        $user = User::factory()->create();

        return $user;
    }

    public function noContentFound($field)
    {
        return __('no '.$field.' found');
    }

    // public function test_homepage_contains_empty_table()
    // {
    //     $response = $this->actingAs($this->user)->get(route('sports.index'));
    //     $response->assertStatus(200);
    //     $response->assertSee($this->noContentFound('sports'));
    // }

    // public function test_homepage_contains_non_empty_table()
    // {
    //     $sport = Sport::factory()->create();

    //     $response = $this->actingAs($this->user)->get(route('sports.index'));
    //     $response->assertStatus(200);
    //     $response->assertDontSee($this->noContentFound('sports'));
    //     $response->assertSee($sport->name);
    //     $response->assertViewHas('sports', function($collection) use($sport) {
    //         return $collection->contains($sport);
    //     });
    // }

    /** @test */
    public function a_sport_has_a_name()
    {
        $sport = Sport::factory()->create([
            'name' => 'Soccer'
        ]);
        $this->actingAs($this->user)->get(route('sports.show', $sport));
        $this->assertEquals('Soccer', $sport->name);
    }

    /** @test */
    public function a_sport_belongs_to_a_team()
    {
        $sport = Sport::factory()->create();
        $this->actingAs($this->user)->get(route('sports.show', $sport));

    }
}
