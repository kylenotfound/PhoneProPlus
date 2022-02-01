<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRecordsTable extends Migration {

    public function up() {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('building_name');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->string('phone_number');
            $table->unsignedBigInteger('building_type_id');
            $table->unsignedBigInteger('is_private');
            $table->string('notes')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('building_type_id')->references('id')->on('building_types');
            $table->foreign('is_private')->references('id')->on('record_visibility_types');
        });
    }

    public function down() {
        Schema::dropIfExists('records');
    }
}
