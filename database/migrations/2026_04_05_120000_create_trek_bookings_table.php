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
        Schema::create('trek_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('package_id')->constrained('travel_packages')->cascadeOnDelete();
            $table->foreignId('departure_id')->nullable()->constrained('trek_departures')->nullOnDelete();
            $table->json('travellers');
            $table->unsignedInteger('total_travellers')->default(1);
            $table->string('flight')->nullable(); // booked | not_booked
            $table->string('insurance')->nullable(); // have | will_buy
            $table->text('special_requirements')->nullable();
            $table->string('referral')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trek_bookings');
    }
};
