<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking__categories', function (Blueprint $table) {
            $table->id();
            $table->string('booking_category_titel');
            $table->integer('booking_category_price');
            $table->integer('per_person_cost');
            $table->integer('people_capacity');
            $table->string('decoration');
            $table->string('welcome_drink');
            $table->string('coffee');
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
        Schema::dropIfExists('booking__categories');
    }
}
