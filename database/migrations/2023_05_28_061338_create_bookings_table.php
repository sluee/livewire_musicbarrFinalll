<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('band_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('event_name');
            $table->string('event_location');
            $table->date('event_date');
            $table->string('event_details');
            $table->string('time_start');
            $table->string('time_end');
            $table->string('status')->default('Pending');
            $table->timestamps();

            $table->foreign('band_id')->references('id')->on('bands');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
