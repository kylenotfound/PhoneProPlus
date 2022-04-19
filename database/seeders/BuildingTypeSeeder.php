<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BuildingType;

class BuildingTypeSeeder extends Seeder {

    public function run() {
      BuildingType::updateOrCreate(['id' => BuildingType::RESIDANCE], ['name' => 'Residance']);
      BuildingType::updateOrCreate(['id' => BuildingType::COMPANY], ['name' => 'Company']);
      BuildingType::updateOrCreate(['id' => BuildingType::SCHOOL], ['name' => 'School']);
      BuildingType::updateOrCreate(['id' => BuildingType::RESTAURANT], ['name' => 'Restaurant']);
      BuildingType::updateOrCreate(['id' => BuildingType::STORE], ['name' => 'Store']);
      BuildingType::updateOrCreate(['id' => BuildingType::MEDICAL_FACILITY], ['name' => 'Medical Facility']);
      BuildingType::updateOrCreate(['id' => BuildingType::TRANSPORTATION], ['name' => 'Transportation']);
      BuildingType::updateOrCreate(['id' => BuildingType::CONVENTION_CENTER], ['name' => 'Convention Center']);
      BuildingType::updateOrCreate(['id' => BuildingType::STADIUM], ['name' => 'Stadium']);
      BuildingType::updateOrCreate(['id' => BuildingType::RELIGIOUS], ['name' => 'Religious']);
      BuildingType::updateOrCreate(['id' => BuildingType::LODGING], ['name' => 'Lodging / Hotel']);
      BuildingType::updateOrCreate(['id' => BuildingType::GAS_STATION], ['name' => 'Gas Station']);
      BuildingType::updateOrCreate(['id' => BuildingType::FEDERAL_ESTABLISHMENT], ['name' => 'Government Building']);
      BuildingType::updateOrCreate(['id' => BuildingType::MILITARY], ['name' => 'Military']);
      BuildingType::updateOrCreate(['id' => BuildingType::AMUSEMENT_PARK], ['name' => 'Amusement Park']);
      BuildingType::updateOrCreate(['id' => BuildingType::OTHER], ['name' => 'Other']);
    }
}
