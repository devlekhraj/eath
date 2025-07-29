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
        Schema::table('gallery_usages', function (Blueprint $table) {
            if (!Schema::hasColumn('gallery_usages', 'custom_attributes')) {
                $table->json('custom_attributes')->after('title')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gallery_usages', function (Blueprint $table) {
            if (Schema::hasColumn('gallery_usages', 'custom_attributes')) {
                $table->dropColumn('custom_attributes');
            }
        });
    }
};
