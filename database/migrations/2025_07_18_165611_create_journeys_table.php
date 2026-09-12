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
        Schema::create('journeys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id')->constrained('destinations')->restrictOnDelete();
            $table->foreignId('guide_id')->nullable()->constrained('guides')->nullOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('subtitle')->nullable();
            $table->text('summary');
            $table->longText('description')->nullable();
            $table->text('overview_secondary')->nullable();
            $table->unsignedSmallInteger('duration_days');
            $table->unsignedSmallInteger('duration_nights')->nullable();
            $table->enum('difficulty', ['easy', 'moderate', 'challenging', 'strenuous'])->default('moderate');
            $table->unsignedSmallInteger('max_altitude_m')->nullable();
            $table->unsignedTinyInteger('walking_hours_min')->nullable();
            $table->unsignedTinyInteger('walking_hours_max')->nullable();
            $table->enum('accommodation_style', ['standard', 'comfort', 'luxury', 'mixed'])->nullable();
            $table->enum('pace', ['relaxed', 'balanced', 'active', 'intense'])->nullable();
            $table->unsignedInteger('price_minor');
            $table->char('currency', 3)->default('USD');
            $table->string('pricing_basis')->default('per_person');
            $table->unsignedInteger('featured_rank')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->foreignId('hero_image_id')->nullable()->constrained('media_assets')->nullOnDelete();
            $table->foreignId('card_image_id')->nullable()->constrained('media_assets')->nullOnDelete();
            $table->foreignId('route_map_image_id')->nullable()->constrained('media_assets')->nullOnDelete();
            $table->text('accommodation_note')->nullable();
            $table->text('logistics_note')->nullable();
            $table->text('safety_note')->nullable();
            $table->text('route_map_note')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('meta_title')->nullable();
            $table->string('meta_description', 300)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['is_active', 'is_published']);
            $table->index(['destination_id', 'featured_rank']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journeys');
    }
};
