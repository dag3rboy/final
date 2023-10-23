<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('ap_id');
            $table->integer('ap_doctor_id');
            $table->integer('ap_patient_id');
            $table->string('ap_doctor_firstname');
            $table->string('ap_doctor_lastname');
            $table->string('ap_patient_firstname');
            $table->string('ap_patient_lastname');
            $table->date('ap_patient_birthday');
            $table->string('ap_patient_gender');
            $table->string('ap_patient_email');
            $table->string('ap_patient_telephone');
            $table->date('ap_appointment_date');
            $table->text('ap_comment');
            $table->string('ap_appointment_state')->default('En attente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
