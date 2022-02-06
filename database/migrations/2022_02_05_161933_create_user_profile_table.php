<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfileTable extends Migration {

    public function up() {
      Schema::create('user_profile', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('user_id');
          $table->timestamps();
          $table->foreign('user_id')->references('id')->on('users');
      });

      Schema::table('users', function(Blueprint $table) {
        $table->unsignedBigInteger('profile_id')->after('password')->nullable();
        $table->string('avatar')->after('profile_id')->nullable();
        $table->foreign('profile_id')->references('id')->on('user_profile');
      });
    }

    public function down() {
      Schema::table('user_profile', function(Blueprint $table) {
        $table->dropForeign('user_id');
      });

      Schema::table('users', function(Blueprint $table) {
        $table->dropForeign('profile_id');
      });

      Schema::dropIfExists('user_profile');
    }
}
