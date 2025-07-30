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
        Schema::create('guides', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->string('phone_no')->nullable();
            $table->longText('bio')->nullable();
            $table->json('language_spoken')->nullable();
            $table->string('license_number')->nullable();
            $table->unsignedTinyInteger('experience_years')->default(0);
            $table->enum('status', ['active', 'inactive', 'deleted', 'pending', 'suspended'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guides');
    }
};
