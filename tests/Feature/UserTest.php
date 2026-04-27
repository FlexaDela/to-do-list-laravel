<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function test_login_route_is_ok(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }


    public function test_user_can_login(): void
    {
        $password = "123";
        $user = User::factory()->create(["email"=>"test@test.com","password" => Hash::make($password),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password
        ]);


        $response->assertRedirect("/tasks");

    }
}
