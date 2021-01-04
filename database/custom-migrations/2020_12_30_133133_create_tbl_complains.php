<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblComplains extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Complains', function (Blueprint $table) {
            $table->bigIncrements('complain_id');
            $table->string('complain_title');
            $table->string('complain_description');
            $table->string('complain_document');
            $table->string('complain_type');
            $table->string('complain_status');
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
        Schema::dropIfExists('Complains');
    }
}
