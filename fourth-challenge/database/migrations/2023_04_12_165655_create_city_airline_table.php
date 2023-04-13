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
        Schema::create('city_airline', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->cascadeOnDelete()->constrained('cities');
            $table->foreignId('airline_id')->cascadeOnDelete()->constrained('airlines');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('city_airline');
    }
};
