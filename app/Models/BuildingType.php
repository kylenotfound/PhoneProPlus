<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingType extends Model {

  const RESIDANCE = 1;
  const COMAPNY = 2;
  const SCHOOL = 3;
  const RESTAURANT = 4;
  const STORE = 5;
  const MEDICAL_FACILITY = 6;
  const TRANSPORTATION = 7;
  const CONVENTION_CENTER = 8;
  const STADIUM = 9;
  const RELIGIOUS = 10;
  const LODGING = 11;
  const GAS_STATION = 12;
  const FEDERAL_ESTABLISHMENT = 13;
  const MILITARY = 14;
  const AMUSEMENT_PARK = 15;
  const OTHER = 16;

  protected $table = 'building_types';
  protected $fillable = ['name'];

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

}
