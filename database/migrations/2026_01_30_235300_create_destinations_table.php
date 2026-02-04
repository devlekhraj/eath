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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            // Core identity
            $table->string('name');
            $table->string('slug')->unique(); // /destinations/everest-region
            $table->integer('sort_order')->default(0);

            // Geography (SEO entities)
            $table->string('region')->nullable(); // Everest / Annapurna / Langtang
            $table->string('district')->nullable();

            // Destination page content (pillar page)
            $table->longText('description')->nullable();        // main content for detail page
            $table->json('highlights')->nullable();          // bullet points (cards)
            $table->string('best_season')->nullable();       // "Mar–May, Sep–Nov"
            $table->longText('how_to_reach')->nullable();    // logistics
            $table->longText('permits')->nullable();         // permits + costs
            $table->longText('weather_notes')->nullable();   // optional

            // SEO
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description', 300)->nullable();
            $table->text('schema')->nullable();
            $table->string('canonical_url')->nullable();

            // Flags
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(false);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
