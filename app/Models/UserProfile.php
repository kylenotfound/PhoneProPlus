<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class UserProfile extends Model {
    use HasFactory;

    public $table = 'user_profile';
    protected $fillable = ['user_id'];

    public function user() {
      $this->belongsTo(User::class);
    }
}
