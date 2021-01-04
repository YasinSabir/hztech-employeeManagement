<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblUserstime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UsersTime', function (Blueprint $table) {
            $table->bigIncrements('users_time_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->string('time_in');
            $table->string('time_out')
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
        Schema::dropIfExists('UsersTime');
    }
}
