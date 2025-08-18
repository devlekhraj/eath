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
        Schema::create('featured_packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');            
            $table->string('slug')->unique();            
            $table->text('description')->nullable();
            $table->string('banner')->nullable();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->foreign('package_id')->references('id')->on('travel_packages')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('group_size');
            $table->string('duration');
            $table->decimal('price',8,2);
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('featured_packages');
    }
};
