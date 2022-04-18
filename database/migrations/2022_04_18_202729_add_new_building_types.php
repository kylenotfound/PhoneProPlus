<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\BuildingType;

class AddNewBuildingTypes extends Migration {

    public function up() {
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
    }

    public function down() {
        BuildingType::where('id', BuildingType::SCHOOL)->delete();
        BuildingType::where('id', BuildingType::RESTAURANT)->delete();
        BuildingType::where('id', BuildingType::STORE)->delete();
        BuildingType::where('id', BuildingType::MEDICAL_FACILITY)->delete();
        BuildingType::where('id', BuildingType::TRANSPORTATION)->delete();
        BuildingType::where('id', BuildingType::CONVENTION_CENTER)->delete();
        BuildingType::where('id', BuildingType::STADIUM)->delete();
        BuildingType::where('id', BuildingType::RELIGIOUS)->delete();
        BuildingType::where('id', BuildingType::LODGING)->delete();
        BuildingType::where('id', BuildingType::GAS_STATION)->delete();
        BuildingType::where('id', BuildingType::FEDERAL_ESTABLISHMENT)->delete();
        BuildingType::where('id', BuildingType::MILITARY)->delete();
    }
}
