<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BuildingType;

class BuildingTypeSeeder extends Seeder {

    public function run() {
      BuildingType::updateOrCreate(['id' => 1], ['name' => 'Residance']);
      BuildingType::updateOrCreate(['id' => 2], ['name' => 'Company']);
    }
}
