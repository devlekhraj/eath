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
        Schema::create('trek_departures', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedInteger('available_seats')->nullable();
            $table->unsignedInteger('booked_seats')->default(0);
            $table->decimal('cost', 10, 2)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->foreignId('trek_id')->constrained('travel_packages')->onDelete('cascade');
            $table->integer('seq_no')->default(0);
            $table->json('meta')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trek_departures');
    }
};
