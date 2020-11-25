<?php

namespace Tests\Unit;

namespace Tests\Unit;

use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use App\Models\TypeCvli;

class CvliTest extends TestCase
{
    protected $base_url = "http://localhost:8000/api";

    /**
     * @test
     * @return void
     */
    public function any_user_should_see_cvlis()
    {
        $user = User::inRandomOrder()->first();;

        $token = JWTAuth::fromUser($user);

        $response = $this->get("$this->base_url/cvlis/?token={$token}", []);

        $response->assertStatus(200);
    }


    /**
     * @test
     * @return void
     */
    public function any_user_should_store_cvlis()
    {
        $user = User::inRandomOrder()->first();

        $token = JWTAuth::fromUser($user);

        $faker = \Faker\Factory::create();

        $type_cvli = TypeCvli::inRandomOrder()->first();

        $cvli = [
            'latitude' => $faker->latitude,
            'longitude' => $faker->longitude,
            'cvli_type_id' => $type_cvli->id,
            'user_id' => $user->id,
        ];

        $response = $this->post("$this->base_url/cvlis/?token={$token}", $cvli);

        $response->assertStatus(201);
    }
}
