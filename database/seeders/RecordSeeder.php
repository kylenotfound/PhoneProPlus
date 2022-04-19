<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Record;

class RecordSeeder extends Seeder {

    public function run() {
      if (env('APP_ENV') != 'prod') {
        //Record::factory()->count(100)->create();
      }
    }
}
