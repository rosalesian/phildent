<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDentalDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dental_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clinic_id')->unsigned();
            $table->integer('staff_id')->unsigned();
            $table->timestamps();
            $table->foreign('clinic_id')
                  ->references('id')
                  ->on('dental_clinics')
                  ->onDelete('cascade');
            $table->foreign('staff_id')
                  ->references('id')
                  ->on('dental_staffs')
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
        Schema::drop('dental_details');
    }
}
