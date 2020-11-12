<?php

namespace Database\Seeders;

use App\Models\TypeCvli;
use Illuminate\Database\Seeder;

class TypeCvliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Tipo de CVLI 1', 'Tipo de CVLI 2'];

        foreach($types as $type) {
            TypeCvli::create(['name' => $type]);
        }
    }
}
