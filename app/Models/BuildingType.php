<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingType extends Model {

  const RESIDANCE = 1;
  const COMAPNY = 2;

  protected $table = 'building_types';
  protected $fillable = ['name'];

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

}
