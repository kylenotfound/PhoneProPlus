<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisibilityType extends Model {

  const PUBLIC_RECORD = 'Public';
  const PRIVATE_RECORD = 'Private';

  public $table = 'record_visibility_types';
  protected $fillable = ['name'];

  public function getName() {
    return $this->name;
  }

}
