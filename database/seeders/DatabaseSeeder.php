<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run(){
       $this->call(BuildingTypeSeeder::class);
       $this->call(VisibilityTypeSeeder::class);
       $this->call(RecordSeeder::class);
    }
}
