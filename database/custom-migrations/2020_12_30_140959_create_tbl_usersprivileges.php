<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblUsersprivileges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UsersPrivileges', function (Blueprint $table) {
            $table->bigIncrements('user_privileges_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('privilege_id')->references('privilege_id')->on('Privileges');
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
        Schema::dropIfExists('UsersPrivileges');
    }
}
