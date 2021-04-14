<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FavoritesTest extends TestCase
{
    use RefreshDatabase;
    public function test_add_favorite()
    {
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->followingRedirects()
            ->post('favorites', [
                "name" => "Example name",
                "image" => "Example image",
                'drink_id' => '44322'
            ]);

        $this->assertDatabaseHas('favorites', [
            "name" => "Example name",
            "image" => "Example image",
            'drink_id' => '44322'
        ]);
    }
    public function test_remove_favorite()
    {
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->followingRedirects()
            ->post('delete', [
                "id" => 1
            ]);

        $this->assertDatabaseMissing('favorites', [
            "id" => 1,
        ]);
    }


    public function test_view_favorites()
    {
        $user = User::factory()->create();
        $this
            ->actingAs($user)
            ->followingRedirects()
            ->post('favorites', [
                "name" => "Example name",
                "image" => "Example image",
                'drink_id' => '44322',
            ]);

        $response = $this
            ->actingAs($user)
            ->followingRedirects()
            ->get('/favorites');

        $response->assertSeeText('Example name');
    }
}
