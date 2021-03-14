<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\TypeCvli;

class TypeCvliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'Roubo de Veículos',
                'path' =>  url(Storage::url("public/types_cvlis/roubo-de-veículos.png"))
            ],
            [
                'name' => 'Furtos',
                'path' =>  url(Storage::url("public/types_cvlis/furtos.png"))
            ],
            [
                'name' => 'Roubo à mão armada',
                'path' =>  url(Storage::url("public/types_cvlis/roubo-a-mao-armada.png"))
            ],
            [
                'name' => 'Agressão',
                'path' =>  url(Storage::url("public/types_cvlis/agressão.png"))
            ],
            [
                'name' => 'Acidente de Trânsito',
                'path' =>  url(Storage::url("public/types_cvlis/acidente-de-trânsito.png"))
            ],
            [
                'name' => 'Maus Tratos a Animais',
                'path' =>  url(Storage::url("public/types_cvlis/maus-tratos-a-animais.png"))
            ]
        ];

        foreach($types as $type) {
            TypeCvli::create([
                'name' => $type['name'],
                'image' => $type['path']
            ]);
        }
    }
}
