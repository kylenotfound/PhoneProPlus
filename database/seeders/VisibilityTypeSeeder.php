<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VisibilityType;

class VisibilityTypeSeeder extends Seeder {

    public function run() {
      VisibilityType::updateOrCreate(['id' => 1], ['name' => 'Public']);
      VisibilityType::updateOrCreate(['id' => 2], ['name' => 'Private']);
    }
}
