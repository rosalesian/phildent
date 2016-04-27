<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->integer('staff_id')->unsigned();
            $table->string('status');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('patient_id')
                 ->references('id')
                 ->on('patients')
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
        Schema::drop('records');
    }
}
