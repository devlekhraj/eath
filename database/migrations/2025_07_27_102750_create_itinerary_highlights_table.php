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
        Schema::create('itinerary_highlights', function (Blueprint $table) {
            
            $table->id();
            $table->foreignId('itinerary_id')->constrained('package_itieraries')->onDelete('cascade'); 
            $table->foreignId('itinerary_lookup_id')->constrained('itinerary_lookups')->onDelete('cascade'); 
            $table->string('description')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itinerary_highlights');
    }
};
