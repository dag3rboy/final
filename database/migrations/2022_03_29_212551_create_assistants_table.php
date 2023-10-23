<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistants', function (Blueprint $table) {
            $table->bigIncrements('as_id');
            $table->string('dr_id');
            $table->string('as_firstname');
            $table->string('as_lastname');
            $table->string('as_username');
            $table->string('as_password');
            // $table->string('as_email');
            $table->timestamp('as_registration_date')->useCurrent();
            $table->string('as_token');
            $table->boolean('as_deleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assistants');
    }
}
