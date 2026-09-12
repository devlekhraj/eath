<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('journey_month', function (Blueprint $table) {
            $table->id();
            $table->foreignId('journey_id')->constrained('journeys')->cascadeOnDelete();
            $table->foreignId('travel_month_id')->constrained('travel_months')->cascadeOnDelete();
            $table->enum('suitability', ['ideal', 'good', 'possible', 'not_recommended'])->default('good');
            $table->text('note')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->unique(['journey_id', 'travel_month_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('journey_month');
    }
};
