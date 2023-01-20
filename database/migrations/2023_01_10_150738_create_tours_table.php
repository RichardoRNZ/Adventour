<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('country_id')->references('id')->on('countries')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onUpdate('cascade')->onDelete('cascade');
            $table->text('description');
            $table->integer('price');
            $table->text('image');
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
        Schema::dropIfExists('tours');
    }
}
