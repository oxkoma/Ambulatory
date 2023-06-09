<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDateTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('date_times', function (Blueprint $table) {
            $table->id();
            $table->integer('ambulatory_id');
            $table->integer('doctor_id');
            $table->string('full_date_appoint');
            $table->string('date_appoint');
            $table->string('time_appoint');
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
        Schema::dropIfExists('date_times');
    }
}
