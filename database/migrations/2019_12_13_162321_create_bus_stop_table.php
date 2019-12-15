<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusStopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_stop', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('bus_id');
            $table->unsignedInteger('stop_id');
            $table->timestamp('takeoff_at')->nullable();
            $table->timestamp('arrives_at')->nullable();
            $table->timestamps();

            $table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade');
            $table->foreign('stop_id')->references('id')->on('stops')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bus_stop');
    }
}
