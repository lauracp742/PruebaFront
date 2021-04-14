<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SearchDrinksTest extends TestCase
{
    use RefreshDatabase;

    public function test_search_drinks()
    {
        $user = User::factory()->create();

        $response = $this
            ->followingRedirects()
            ->actingAs($user)
            ->get(
                "/search?search=Margarita"
            );

        $response->assertSeeText('Margarita');
    }

    public function test_search_drinks_fail()
    {
        $user = User::factory()->create();

        $response = $this
            ->followingRedirects()
            ->actingAs($user)
            ->get("/search?search=Korv");
        $response->assertSeeText('Whoops! Please try something else.');
    }
}
