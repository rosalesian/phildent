<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clinic_to')->unsigned();
            $table->integer('clinic_from')->unsigned();
            $table->string('status');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('clinic_to')
                 ->references('id')
                 ->on('dental_clinics')
                 ->onDelete('cascade');
            $table->foreign('clinic_from')
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
        Schema::drop('transfers');
    }
}
