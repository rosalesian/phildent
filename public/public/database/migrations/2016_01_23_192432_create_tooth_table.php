<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToothTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tooth', function (Blueprint $table) {
           $table->increments('id');
            $table->string('upper_lower');
            $table->string('temp_permanent');
            $table->string('tooth_condition');
            $table->string('status');
           $table->softDeletes();
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
        Schema::drop('tooth');
    }
}
