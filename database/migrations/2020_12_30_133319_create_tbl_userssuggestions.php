<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblUserssuggestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UsersSuggestions', function (Blueprint $table) {
            $table->bigIncrements('users_suggestion_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('suggestion_id')->references('suggestions_id')->on('Suggestions');
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
        Schema::dropIfExists('UsersSuggestions');
    }
}
