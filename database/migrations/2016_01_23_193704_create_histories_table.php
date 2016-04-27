<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('record_id')->unsigned();
            $table->integer('detail_id')->unsigned();
            $table->integer('payment_id')->unsigned();
            $table->integer('tooth_id')->unsigned();
            $table->string('comment');
             $table->softDeletes();
            $table->timestamps();
            $table->foreign('record_id')
                 ->references('id')
                 ->on('records')
                 ->onDelete('cascade');
            $table->foreign('detail_id')
                 ->references('id')
                 ->on('dental_details')
                 ->onDelete('cascade');
            $table->foreign('payment_id')
                 ->references('id')
                 ->on('payments')
                 ->onDelete('cascade');
            $table->foreign('tooth_id')
                 ->references('id')
                 ->on('tooth')
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
        Schema::drop('histories');
    }
}
