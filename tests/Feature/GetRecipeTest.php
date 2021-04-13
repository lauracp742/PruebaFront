<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class GetRecipeTest extends TestCase
{
    use RefreshDatabase;
    public function test_get_recipe()
    {
        $user = User::factory()->create();

        $response = $this
            ->followingRedirects()
            ->actingAs($user)
            ->get(
                "/recipe/i=1107"
            );

        $response->assertSeeText('Margarita');
    }

    public function test_get_recipe_fail()
    {
        $user = User::factory()->create();

        $response = $this
            ->followingRedirects()
            ->actingAs($user)
            ->get("/recipe/i=majs");
        $response->assertSeeText('Whoops! Please try something else.');
    }
}
