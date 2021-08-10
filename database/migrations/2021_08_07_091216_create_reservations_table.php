<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date('arrival');
            $table->date('departure');
            $table->integer('guests');
            $table->decimal('price', 9, 2);
            $table->bigInteger('hotel_id')->unsigned();
            $table->bigInteger('suite_id')->unsigned();
            $table->timestamps();
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->foreign('suite_id')->references('id')->on('suites');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
