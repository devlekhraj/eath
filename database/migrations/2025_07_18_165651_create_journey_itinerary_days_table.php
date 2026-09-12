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
        Schema::create('journey_itinerary_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('journey_id')->constrained('journeys')->cascadeOnDelete();
            $table->unsignedSmallInteger('day_number');
            $table->string('title');
            $table->string('route')->nullable();
            $table->text('description')->nullable();
            $table->string('location_label')->nullable();
            $table->unsignedSmallInteger('altitude_m')->nullable();
            $table->string('altitude_label')->nullable();
            $table->decimal('walking_hours', 4, 1)->nullable();
            $table->string('walking_hours_label')->nullable();
            $table->string('accommodation_label')->nullable();
            $table->string('meal_note')->nullable();
            $table->boolean('is_acclimatization')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['journey_id', 'day_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journey_itinerary_days');
    }
};
