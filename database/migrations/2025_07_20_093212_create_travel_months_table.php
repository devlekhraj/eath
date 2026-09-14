<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('travel_months', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('month_number')->unique();
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('season', ['winter', 'spring', 'summer', 'autumn']);
            $table->text('summary')->nullable();
            $table->longText('description')->nullable();
            $table->text('conditions_note')->nullable();
            $table->json('content')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('travel_months');
    }
};
