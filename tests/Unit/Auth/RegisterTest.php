<?php

namespace Tests\Unit\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function setup(): void
    {
        parent::setUp();
    }

    /**
     * A basic unit test example.
     */
    public function test_show_validation_error_when_all_fields_empty()
    {
        $response = $this->postJson( route('auth.register'), [
            'name' => '',
            'email' => '',
            'password' => '',
        ]);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'email', 'password']);
    }
}
