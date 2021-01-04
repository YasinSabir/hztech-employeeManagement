<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblApplications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Applications', function (Blueprint $table) {
            $table->bigIncrements('app_id');
            $table->string('app_title');
            $table->string('app_description');
            $table->string('app_document');
            $table->string('app_type');
            $table->string('app_status');
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
        Schema::dropIfExists('Applications');
    }
}
