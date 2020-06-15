<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserlistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userlists', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('company');
            $table->string('address');
            $table->string('phone');
            $table->string('establishment');
            $table->string('area');
            $table->string('equipment');
            $table->string('building');
            $table->string('introduction');
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userlists');
    }
}
