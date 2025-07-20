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
        Schema::create('travel_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->text('additional_info')->nullable();

            $table->integer('duration_days')->nullable();
            $table->integer('duration_nights')->nullable();
            $table->decimal('altitude',8,2)->nullable();
            
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->decimal('price', 10, 2)->nullable();
            
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(false);
            $table->boolean('is_featured')->default(false);
            
            $table->text('terms_conditions')->nullable();
            $table->text('cancellation_policy')->nullable();
            
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            $table->string('seo_image')->nullable();
            $table->boolean('is_published')->default(false);
            $table->dateTime('published_at')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_packages');
    }
};
