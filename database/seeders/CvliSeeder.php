<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cvli;
use App\Models\TypeCvli;
use App\Models\User;

class CvliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cvlis = [
            [
                'title' => 'Crime 01',
                'latitude' => -5.7490999,
                'longitude' => -35.262599,
                'stars' => 1,
                'cvli_type_id' => TypeCvli::first()->id,
                'user_id' => User::first()->id
            ],
            [
                'title' => 'Crime 02',
                'latitude' => -5.8450935,
                'longitude' => -35.2697694,
                'stars' => 2,
                'cvli_type_id' => TypeCvli::first()->id,
                'user_id' => User::first()->id
            ]
        ];
        foreach ($cvlis as $cvli){
            Cvli::create($cvli);
        }
    }
}
