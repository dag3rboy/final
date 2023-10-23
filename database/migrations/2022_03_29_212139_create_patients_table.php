<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('pa_id');
            $table->string('pa_firstname');
            $table->string('pa_lastname');
            $table->string('pa_username');
            $table->string('pa_password');
            $table->string('pa_email');
            $table->string('pa_telephone');
            $table->string('pa_gender');
            $table->date('pa_birthday')->useCurrent();;
            $table->string('pa_adress');
            $table->string('pa_city');
            $table->string('pa_wilaya');
            $table->string('pa_photo');
            $table->timestamp('pa_registration_date')->useCurrent();
            $table->string('pa_token');
            $table->boolean('pa_deleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
