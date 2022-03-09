<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Save extends Model {
    use HasFactory; use SoftDeletes;

    protected $fillable = ['record_id', 'user_id'];
    protected $table = 'saves';
    public $timestamps= true;

    public function user() {
      return $this->belongsTo(User::class);  
    }

    public function record() {
      return $this->hasOne(Record::class, 'id', 'record_id');  
    }

    public function getId() {
      return $this->id;  
    }

}
