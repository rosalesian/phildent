<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('service_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('patient_id')
                 ->references('id')
                 ->on('patients')
                 ->onDelete('cascade');
            $table->foreign('service_id')
                 ->references('id')
                 ->on('services')
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
        Schema::drop('appointments');
    }
}
