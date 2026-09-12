<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('website_comparison_items', function (Blueprint $table) {
            $table->id();
            $table->string('visitor_key', 64);
            $table->foreignId('journey_id')->constrained('journeys')->cascadeOnDelete();
            $table->unsignedTinyInteger('position')->default(0);
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->string('referer_url', 2048)->nullable();
            $table->string('accept_language', 255)->nullable();
            $table->timestamp('request_time')->nullable();
            $table->string('request_timezone', 100)->nullable();
            $table->string('server_timezone', 100)->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamps();

            $table->unique(['visitor_key', 'journey_id']);
            $table->index(['visitor_key', 'position']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('website_comparison_items');
    }
};
