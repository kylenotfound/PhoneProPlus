<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSavesTable extends Migration {

    public function up() {
      Schema::create('saves', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('record_id');
        $table->timestamps();
        $table->softDeletes();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('record_id')->references('id')->on('records')->onDelete('cascade');
      });  
    }

    public function down() {
      Schema::dropForeign('user_id');
      Schema::dropForeign('record_id');
      Schema::dropIfExists('saves');
    }
}
