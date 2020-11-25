<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserTest extends TestCase
{
    protected $base_url = "http://localhost:8000/api";
    /**
     * @test
     * @return void
     */
    public function normal_user_should_not_see_the_others()
    {
        $user = $this->retrieveUser(2);

        $token = JWTAuth::fromUser($user);

        $response = $this->get($this->base_url . '/users?token=' . $token, []);

        $response->assertStatus(500)->assertJsonStructure(['error']);
    }

    /**
     * @test
     * @return void
     */
    public function normal_user_should_see_only_himself()
    {
        $user = $this->retrieveUser(2);

        $token = JWTAuth::fromUser($user);

        $response = $this->get("$this->base_url/users/{$user->id}/?token={$token}", []);

        $response->assertStatus(200);
    }

    public function retrieveUser($role)
    {
        return User::whereHas('role', function(Builder $query) use ($role) {
            $query->where('users_roles.roles_id', '=', $role);
        })->inRandomOrder()->first();
    }
}
