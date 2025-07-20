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
        Schema::create('gallery_usages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gallery_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('usage_id');      // e.g. post_id, product_id, etc.
            $table->string('usage_type');                 // e.g. 'post', 'product', 'page'
            $table->string('alt_text')->nullable();       // alt text specific to this usage
            $table->string('title')->nullable();       // alt text specific to this usage
            $table->string('description')->nullable();       // alt text specific to this usage
            $table->timestamps();

            $table->unique(['gallery_id', 'usage_id', 'usage_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_usages');
    }
};
