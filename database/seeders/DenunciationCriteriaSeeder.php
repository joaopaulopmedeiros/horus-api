<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DenunciationCriteria;

class DenunciationCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $criteria = ['critério 1', 'critério 2'];

        foreach($criteria as $current) {
            DenunciationCriteria::create(['name' => $current]);
        }
    }
}
