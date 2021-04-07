<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_view()
    {
        $user = User::factory()->create();
        $response = $this
            ->actingAs($user)
            ->followingRedirects()
            ->get('/dashboard');

        $response->assertSeeText('Search for drinks');
    }
}
