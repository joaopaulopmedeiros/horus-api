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
                'title' => 'Roubo de veículo',
                'description' => 'Ocorrido à luz do dia na Zona Leste. Veículo celta preto.',
                'latitude' => -5.7490999,
                'longitude' => -35.262599,
                'verified' => true,
                'cvli_type_id' => TypeCvli::first()->id,
                'user_id' => User::first()->id
            ],
            [
                'title' => 'Assalto à mão armada',
                'description' => 'Dois assaltantes roubaram estudantes por volta das 8h no Planalto.',
                'latitude' => -5.8450935,
                'longitude' => -35.2697694,
                'verified' => true,
                'cvli_type_id' => TypeCvli::first()->id,
                'user_id' => User::first()->id
            ]
        ];
        foreach ($cvlis as $cvli){
            Cvli::create($cvli);
        }
    }
}
