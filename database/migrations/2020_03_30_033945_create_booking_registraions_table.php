<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingRegistraionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_registraions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('event_title');
            $table->string('event_category');
            $table->date('published_at');
            $table->string('event_location');
            $table->string('event_time');
            $table->integer('event_cost');
            $table->integer('per_person_cost');
            $table->integer('total_cost');
            $table->integer('due');
            $table->integer('people');
            $table->integer('payment_method');
            $table->integer('payment_status')->default(1);
            $table->integer('cancel')->default(0);
            $table->integer('user_number');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_registraions');
    }
}
