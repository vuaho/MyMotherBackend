<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kid_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('rider_id');
            $table->double('lat_start');
            $table->double('long_start');
            $table->double('lat_end');
            $table->double('long_end');
            $table->string('start_point');
            $table->string('end_point');
            $table->dateTime('start_time');
            $table->dateTime('end_time')->nullable();
            $table->enum('status',['booked','incoming','going','success','cancelled'])->default('booked');
            $table->string('live_stream_id')->nullable();
            $table->double('distance')->nullable();
            $table->double('total_time')->nullable();
            $table->string('note')->nullable;
            $table->string('password');
            $table->string('location_channel');
            $table->boolean('notified')->default(false);
            $table->foreign('kid_id')->references('id')->on('kids');
            $table->foreign('rider_id')->references('id')->on('riders');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('rides');
    }
}
