<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisibilityType extends Model {

  const PUBLIC_RECORD = 1;
  const PRIVATE_RECORD = 2;

  public $table = 'record_visibility_types';
  protected $fillable = ['name'];

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

}
