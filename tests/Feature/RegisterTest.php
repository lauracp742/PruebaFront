<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_view__form_register()
    {
        $response = $this->get('/register');
        $response->assertSeeText('Email');
        $response->assertStatus(200);
    }

    public function test_register_user()
    {
        $response = $this
            ->followingRedirects()
            ->post('register', [
                'name' => 'Example name',
                'email' => 'example@yrgo.se',
                'password' => '123',
            ]);
        $response->assertSeeText('Search for drinks');
    }
}
