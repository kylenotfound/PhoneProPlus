<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    public $table = 'users';

    protected $fillable = ['external_id', 'username', 'name', 'email', 'password', 'avatar', 'profile_id'];
    protected $hidden = ['password'];
    protected $casts = ['email_verified_at' => 'datetime'];

    public $timestamps = true;

    public function records() {
      $this->hasMany(Record::class);
    }

    public function profile() {
      return $this->hasOne(UserProfile::class, 'user_id');
    }

    public function getId() {
      return $this->id;
    }

    public function getName() {
      return $this->name;
    }

    public function getUsername() {
      return $this->username;
    }

    public function getEmail() {
      return $this->email;
    }

    public function getAvatar() {
      if ($this->avatar == null) {
        $this->generateAvatar();
      }
      return $this->avatar;
    }

    public function generateAvatar() {
      $dicebear = "https://avatars.dicebear.com/api/identicon/" . $this->getUsername() . ".svg";
      $this->avatar = $dicebear;
      $this->save();
    }

    public function generateProfile() {
      $profile = UserProfile::create([
        'user_id' => $this->getId()
      ]);
      $this->profile_id = $profile->id;
      $this->save();
    }
}
