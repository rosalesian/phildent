<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewSubscriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clinic_id')->unsigned();
            $table->integer('appointment_id')->unsigned();
            $table->integer('dentist_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->dateTime('date');
            $table->softDeletes();
            $table->foreign('clinic_id')
                 ->references('id')
                 ->on('dental_clinics')
                 ->onDelete('cascade');
            $table->foreign('appointment_id')
                 ->references('id')
                 ->on('appointments')
                 ->onDelete('cascade');
            $table->foreign('dentist_id')
                 ->references('id')
                 ->on('dentists')
                 ->onDelete('cascade');
            $table->foreign('product_id')
                 ->references('id')
                 ->on('products')
                 ->onDelete('cascade');
            $table->foreign('patient_id')
                 ->references('id')
                 ->on('patients')
                 ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('new_subscriptions');
    }
}
