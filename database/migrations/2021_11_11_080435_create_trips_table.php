<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('trip_name');
            $table->string('departure_date')->nullable();
            $table->string('return_date')->nullable();
            $table->string('booking_close')->nullable();
            $table->string('price')->nullable();
            $table->string('late_booking_date')->nullable();
            $table->string('late_price')->nullable();
            $table->string('close_trip_booking')->nullable();

            $table->string('special_StaffKid_price')->nullable();
            $table->string('special_StaffKid_latePrice')->nullable();
            $table->string('special_JuniorInstructor_price')->nullable();
            $table->string('special_JuniorInstructor_latePrice')->nullable();

            $table->string('route')->nullable();
            $table->string('status')->nullable();
            $table->boolean('night')->default(0);

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
        Schema::dropIfExists('trips');
    }
}
