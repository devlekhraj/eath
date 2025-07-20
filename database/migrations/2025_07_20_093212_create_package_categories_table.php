<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('category_package', function (Blueprint $table) {
            $table->foreignId('travel_package_id')->constrained('travel_packages')->onDelete('cascade');
            $table->foreignId('package_category_id')->constrained('package_categories')->onDelete('cascade');
            $table->primary(['travel_package_id', 'package_category_id']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('category_package');
    }
};
