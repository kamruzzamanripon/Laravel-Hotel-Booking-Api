<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            //$table->id();
            $table->uuid('id')->unique();
            $table->string('room_name');
            $table->float('pricePerNight',8,2);
            $table->string('description');
            $table->string('address')->nullable();
            $table->float('guestCapacity',8,2);
            $table->float('numOfBeds',8,2);
            $table->boolean('internet')->default(false);
            $table->boolean('breakfast')->default(false);
            $table->boolean('airConditioned')->default(false);
            $table->boolean('petsAllowed')->default(false);
            $table->boolean('roomCleaning')->default(false);
            $table->string('image')->nullable();
            $table->foreignUuid('category_id');
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
        Schema::dropIfExists('rooms');
    }
}
