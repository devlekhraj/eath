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
        Schema::create('journey_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('journey_id')->constrained('journeys')->cascadeOnDelete();
            $table->string('name');
            $table->unsignedInteger('price_minor');
            $table->char('currency', 3)->default('USD');
            $table->string('pricing_basis')->nullable();
            $table->text('description')->nullable();
            $table->unsignedSmallInteger('min_travelers')->nullable();
            $table->unsignedSmallInteger('max_travelers')->nullable();
            $table->date('starts_on')->nullable();
            $table->date('ends_on')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_primary')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journey_prices');
    }
};
