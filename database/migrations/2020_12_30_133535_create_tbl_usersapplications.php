<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblUsersapplications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UsersApplications', function (Blueprint $table) {
            $table->bigIncrements('users_app_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('app_id')->references('app_id')->on('Applications');
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
        Schema::dropIfExists('UsersApplications');
    }
}
