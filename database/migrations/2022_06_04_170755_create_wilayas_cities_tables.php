<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWilayasCitiesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wilayas', function (Blueprint $table) {
            $table->integer('id');
            $table->string('nom');
            $table->string('nomAr');
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->integer('codeWilaya');
            $table->string('nom');
            $table->string('nomAr');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('wilayas');
        Schema::drop('cities');
    }
}
