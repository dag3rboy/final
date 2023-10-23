<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('sc_id');
            $table->integer('sc_id_doctor');
            $table->integer('sc_year');
            $table->string('sc_month');
            $table->date('sc_date');
            $table->string('sc_start_hour');
            $table->string('sc_end_hour');
            $table->integer('sc_max_patients');
            $table->integer('sc_reserved_places')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
