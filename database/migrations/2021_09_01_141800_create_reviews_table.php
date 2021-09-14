<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            //$table->id();
            $table->uuid('id')->unique();
            $table->float('rating', 8,2);
            $table->text('comment');
            $table->foreignUuid('user_id')->constant('users')->onDelete('casecade');
            $table->foreignUuid('room_id')->constant('rooms')->onDelete('casecade');
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
        Schema::dropIfExists('reviews');
    }
}
