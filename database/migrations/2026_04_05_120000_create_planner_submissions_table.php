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
        Schema::create('planner_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('reference_code')->unique();
            $table->foreignId('journey_id')->nullable()->constrained('journeys')->nullOnDelete();
            $table->foreignId('departure_id')->nullable()->constrained('journey_departures')->nullOnDelete();
            $table->foreignId('destination_id')->nullable()->constrained('destinations')->nullOnDelete();
            $table->foreignId('experience_id')->nullable()->constrained('experiences')->nullOnDelete();
            $table->foreignId('travel_month_id')->nullable()->constrained('travel_months')->nullOnDelete();
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_phone')->nullable();
            $table->string('country')->nullable();
            $table->unsignedTinyInteger('adults')->default(1);
            $table->unsignedTinyInteger('children')->default(0);
            $table->unsignedSmallInteger('available_days')->nullable();
            $table->unsignedInteger('budget_minor')->nullable();
            $table->char('currency', 3)->default('USD');
            $table->json('preferences')->nullable();
            $table->json('recommendation_snapshot')->nullable();
            $table->text('message')->nullable();
            $table->enum('status', ['new', 'reviewing', 'replied', 'closed'])->default('new');
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planner_submissions');
    }
};
