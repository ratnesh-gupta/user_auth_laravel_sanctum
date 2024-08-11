<?php

namespace Tests\Unit\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function setup(): void
    {
        parent::setUp();
    }

    /**
     * A basic unit test example.
     */
    public function test_show_validation_error_when_both_fields_empty()
    {
        $response = $this->postJson( route('auth.login'), [
            'email' => '',
            'password' => '',
        ]);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors(['email', 'password']);
    }
}
