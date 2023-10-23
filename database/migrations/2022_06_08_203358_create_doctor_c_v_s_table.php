<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorCVSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_c_v_s', function (Blueprint $table) {
            $table->bigIncrements('cv_id');
            $table->string('dr_id');
            $table->text('cv_about')->default('');
            $table->string('cv_phone')->default('');
            $table->string('cv_email')->default('');
            $table->string('cv_website')->default('');
            $table->string('cv_map')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_c_v_s');
    }
}
