<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VisibilityType;

class VisibilityTypeSeeder extends Seeder {

    public function run() {
      VisibilityType::updateOrCreate(['name' => 'Public']);
      VisibilityType::updateOrCreate(['name' => 'Private']);
    }
}
