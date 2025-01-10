<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_page_is_accessible(): void
    {
        $response = $this->get(route('register'));

        $response->assertStatus(200);
        $response->assertViewIs('auth.register');
    }

    public function test_user_can_register_with_valid_data(): void
    {
        // Define data
        $userData = [
            'name'                  => 'User test',
            'email'                 => 'usertest@email.com',
            'password'              => 'password123',
            'password_confirmation' => 'password123'
        ];

        $response = $this->post(route('register.process'), $userData);

        $response->assertRedirect(route('login'));

        $this->assertDatabaseHas('users', [
            'email' => 'usertest@email.com'
        ]);

        // Assert that the password is hashed
        $user = User::where('email', 'usertest@email.com')->first();
        $this->assertTrue(Hash::check('password123', $user->password));
    }

    public function test_registration_fails_with_invalid_data(): void
    {
        $invalidData = [
            'name'                  => '',
            'email'                 => 'invalid-email',
            'password'              => '123',
            'password_confirmation' => '123123123'
        ];

        $response = $this->post(route('register.process'), $invalidData);

        $response->assertSessionHasErrors(['name', 'email', 'password']);
    }

    public function test_registration_with_existing_email(): void
    {
        User::create([
            'name'      => 'Existing user',
            'email'     => 'existinguser@email.com',
            'password'  => Hash::make('password123')
        ]);

        $data = [
            'name'          => 'Existing user',
            'email'         => 'existinguser@email.com',
            'password'      => 'password123',
            'password_confirmation' => 'password123'
        ];

        $response = $this->post('/register', $data);

        $response->assertSessionHasErrors('email');
    }
}
