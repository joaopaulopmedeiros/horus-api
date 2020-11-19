<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;

class AuthTest extends TestCase
{
    protected $base_url = "http://localhost:8000/api/auth";
    /**
     * @test
     */
    public function user_can_register_on_app()
    {
        $faker = \Faker\Factory::create();

        $user = [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'cpf' => Str::random(14),
            'phone' => Str::random(14),
            'password' => '123456',
            'password_confirmation' => '123456',
            'remember_token' => Str::random(10),
            'role' => 2
        ];

        $response = $this->json('POST', $this->base_url . '/register', $user);

        $response->assertStatus(201);

        return $user;
    }


    /**
     * @depends user_can_register_on_app
     * @test
     * @param array $user
     */
    public function user_can_login_on_app(array $user)
    {
        $response = $this->json('POST', $this->base_url . '/login', $user);

        $response->assertStatus(200)->assertJsonStructure(['access_token', 'token_type', 'expires_in']);

        return $user;
    }

    /**
     * @depends user_can_login_on_app
     * @test
     * @param array $user
     */
    public function user_can_get_his_info_on_app(array $user)
    {
        $model = User::where('email', $user['email'])->first();
        $token = JWTAuth::fromUser($model);

        $response = $this->json('POST', $this->base_url . "/user?token=" . $token, []);

        $response->assertStatus(200);

        return $token;
    }

    /**
     * @depends user_can_get_his_info_on_app
     * @test
     * @param string $token
     */
    public function user_can_logout_on_app(string $token)
    {
        $response = $this->json('POST', $this->base_url . "/logout?token=" . $token, []);

        $response->assertStatus(200);
    }
}
