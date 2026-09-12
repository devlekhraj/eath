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
        Schema::create('website_sections', function (Blueprint $table) {
            $table->id();
            $table->string('page_key');
            $table->string('section_key');
            $table->string('heading')->nullable();
            $table->text('eyebrow')->nullable();
            $table->longText('body')->nullable();
            $table->json('content')->nullable();
            $table->foreignId('media_asset_id')->nullable()->constrained('media_assets')->nullOnDelete();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['page_key', 'section_key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_sections');
    }
};
