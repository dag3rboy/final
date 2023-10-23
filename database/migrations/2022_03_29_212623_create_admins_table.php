<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('ad_id');
            $table->string('ad_firstname');
            $table->string('ad_lastname');
            $table->string('ad_username');
            $table->string('ad_password');
            $table->string('ad_email');
            $table->string('ad_photo');
            // $table->timestamp('ad_registration_date')->useCurrent();
            $table->string('ad_token');
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
        Schema::dropIfExists('admins');
    }
}
