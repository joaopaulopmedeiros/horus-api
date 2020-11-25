<?php

namespace Tests\Unit;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class RoleTest extends TestCase
{
    protected $base_url = "http://localhost:8000/api";

    /**
     * @test
     * @return void
     */
    public function normal_user_must_not_see_roles()
    {
        $user = $this->retrieveUser(2);

        $token = JWTAuth::fromUser($user);

        $response = $this->get("$this->base_url/roles/?token={$token}", []);

        $response->assertStatus(500)->assertJsonStructure(['error']);;
    }

    public function retrieveUser(int $role): User
    {
        return User::whereHas('roles', function(Builder $query) use ($role) {
            $query->where('users_roles.role_id', '=', $role);
        })->inRandomOrder()->first();
    }
}
