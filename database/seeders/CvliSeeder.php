<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cvli;

class CvliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cvli::create([
            'title' => 'Crime 01',
            'latitude' => 1,
            'longitude' => 2,
            'stars' => 1,
            'cvli_type_id' => 1,
            'user_id' => 1
        ]);

        /*
                    $table->id();
            $table->float('latitude', 12, 10);
            $table->float('longitude', 12, 10);
            $table->float('stars', 3, 2)->default(1);
            $table->timestamps();

            $table->unsignedBigInteger('cvli_type_id');
            $table->foreign('cvli_type_id')->references('id')->on('cvlis_types');
        */
    }
}
