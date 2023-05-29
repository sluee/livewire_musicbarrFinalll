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
        Schema::create('bands', function (Blueprint $table) {
            $table->id();
            $table->String('band_name');
            $table->String('location');
            $table->decimal('rate');
            $table->String('genre');
            $table->decimal('talent_fee');
            $table->String('founder');
            $table->String('description');
            $table->timestamps();
            $table->String('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bands');
    }
};
