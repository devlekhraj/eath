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
        Schema::create('media_variants', function (Blueprint $table) {
            $table->id();

            $table->foreignId('media_asset_id')
                ->constrained('media_assets')
                ->cascadeOnDelete();

            // Preset name (recommended) and output format
            $table->string('variant', 50);          // thumb, medium, large, og, hero...
            $table->string('format', 10);           // webp, avif, jpg, png...

            // File info
            $table->string('file_name');            // e.g. abcd1234_medium.webp
            $table->string('file_path');            // e.g. uploads/variants/2026/01/abcd1234/medium.webp
            $table->string('mime_type', 50)->nullable(); // image/webp, image/avif
            $table->unsignedBigInteger('size')->nullable(); // bytes
            $table->string('disk', 30)->default('public'); // public, s3, etc.

            // Final (actual) output dimensions in px
            $table->unsignedInteger('width');
            $table->unsignedInteger('height');


            $table->timestamps();

            // Helpful indexes
            $table->index(['media_asset_id']);
            $table->index(['variant']);
            $table->index(['format']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_variants');
    }
};
