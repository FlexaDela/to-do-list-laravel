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
    public function test_user_can_login(): void
    {
        $user = User::factory()->create(["password" => Hash::make($password = '123'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password
        ]);


        $response->assertRedirect("/tasks");
      
    }
}
