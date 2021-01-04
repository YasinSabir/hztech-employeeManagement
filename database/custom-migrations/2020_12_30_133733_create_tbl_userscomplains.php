<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblUserscomplains extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UsersComplains', function (Blueprint $table) {
            $table->bigIncrements('users_complain_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('complain_id')->references('complain_id')->on('Complains');
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
        Schema::dropIfExists('UsersComplains');
    }
}
