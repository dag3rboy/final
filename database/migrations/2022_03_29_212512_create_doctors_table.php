<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('dr_id');
            $table->string('dr_firstname');
            $table->string('dr_lastname');
            $table->string('dr_username');
            $table->string('dr_password');
            $table->string('dr_email');
            $table->string('dr_speciality');
            // $table->string('dr_id_cv');
            $table->string('dr_department');
            $table->string('dr_service');
            $table->string('dr_telephone');
            $table->string('dr_gender');
            $table->date('dr_birthday')->useCurrent();;
            $table->string('dr_adress');
            $table->string('dr_city');
            $table->string('dr_wilaya');
            $table->string('dr_photo');
            $table->timestamp('dr_registration_date')->useCurrent();
            $table->boolean('dr_appointment_active');
            $table->boolean('dr_confirmed');
            $table->boolean('dr_active');
            $table->string('dr_token');
            // $table->boolean('dr_deleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
