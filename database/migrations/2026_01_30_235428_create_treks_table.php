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
        Schema::create('treks', function (Blueprint $table) {
            $table->id();

            $table->foreignId('destination_id')->constrained()->cascadeOnDelete();

            $table->string('title');
            $table->string('slug')->unique();

            $table->decimal('price_from', 10, 2)->nullable();
            $table->string('currency', 3)->default('USD');

            $table->text('short_description')->nullable();
            $table->longText('overview')->nullable();
            $table->string('best_season')->nullable();

            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description', 300)->nullable();

            $table->boolean('is_published')->default(false);
            $table->dateTime('published_at')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treks');
    }
};
