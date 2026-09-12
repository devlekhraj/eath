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
        Schema::create('journey_departures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('journey_id')->constrained('journeys')->cascadeOnDelete();
            $table->string('code')->nullable()->unique();
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['open', 'limited', 'full', 'closed', 'cancelled'])->default('open');
            $table->unsignedInteger('total_seats')->nullable();
            $table->unsignedInteger('available_seats')->nullable();
            $table->unsignedInteger('price_minor')->nullable();
            $table->char('currency', 3)->default('USD');
            $table->date('booking_deadline')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['start_date', 'status']);
            $table->index(['journey_id', 'start_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journey_departures');
    }
};
