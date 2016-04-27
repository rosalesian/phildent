<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('clinic_id')->unsigned();
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('birthdate');
            $table->string('gender');
            $table->string('address');
            $table->string('mobile');
            $table->string('telephone');
            $table->string('gardian_name');
            $table->string('email');
            $table->string('status');
            $table->timestamps();
            $table->foreign('clinic_id')
                  ->references('id')
                  ->on('dental_clinics')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patients');
    }
}
