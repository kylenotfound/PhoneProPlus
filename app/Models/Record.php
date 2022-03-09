<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Save;

use Carbon\Carbon;

class Record extends Model {
    use HasFactory;

    public $table = 'records';
    public $timestamps = true;

    protected $fillable = ['user_id', 'building_name', 'address', 'city', 'state',
      'zipcode', 'notes', 'phone_number', 'is_private', 'building_type_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function buildingType() {
      return $this->hasOne(BuildingType::class, 'id', 'building_type_id');
    }

    public function visibilityType() {
      return $this->hasOne(VisibilityType::class, 'id', 'is_private');
    }

    public function getId() {
        return $this->id;
    }

    public function getBuildingName() {
      return $this->building_name;
    }

    public function getBuildingTypeName() {
        return $this->buildingType->getName();
    }

    public function getAddress() {
      return $this->address;
    }

    public function getCity() {
      return $this->city;
    }

    public function getState() {
      return $this->state;
    }

    public function getZipCode() {
      return $this->zipcode;
    }

    public function getPhoneNumber() {
      return $this->phone_number;
    }

    public function getSubmittedName() {
      return $this->user->username;
    }

    public function isPrivate() {
      return $this->visibilityType->getId();
    }

    public function getVisibilityTypeName() {
      return $this->visibilityType->getName();
    }

    public function getNote() : string {
      return isset($this->notes) ? $this->notes : 'No Notes Provided';
    }

    public function getFormattedAddress() {
      return $this->address . ', ' . $this->city . ' ' . $this->state . ' ' . $this->zipcode;
    }

    public function getFormattedCreatedAt() {
      return Carbon::parse($this->created_at)->format('m-d-Y');
    }

    public function getFormattedUpdatedAt() {
      return Carbon::parse($this->updated_at)->format('m-d-Y');
    }

    //Check if record has been saved to auth()->user() profile
    public function isSaved() : bool {
      $save = Save::where('record_id', $this->getId())
        ->where('user_id', auth()->id())->exists();
      
      if ($save == null) {
        return false;
      } 

      return true;
    }
}
