<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('appointment_id')->unsigned();
            $table->integer('detail_id')->unsigned();
            $table->string('status');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('appointment_id')
                 ->references('id')
                 ->on('appointments')
                 ->onDelete('cascade');
            $table->foreign('detail_id')
                 ->references('id')
                 ->on('dental_details')
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
        Schema::drop('schedule');
    }
}
