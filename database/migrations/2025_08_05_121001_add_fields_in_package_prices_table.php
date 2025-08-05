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
        Schema::table('package_prices', function (Blueprint $table) {
            if (!Schema::hasColumn('package_prices', 'is_economy')) {
                $table->boolean('is_economy')->after('price')->default(false);
            }

            if (!Schema::hasColumn('package_prices', 'description')) {
                $table->text('description')->after('is_economy')->nullable();
            }

            if (!Schema::hasColumn('package_prices', 'is_active')) {
                $table->boolean('is_active')->after('is_default')->default(true);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('package_prices', function (Blueprint $table) {
            if (Schema::hasColumn('package_prices', 'is_economy')) {
                $table->dropColumn('is_economy');
            }

            if (Schema::hasColumn('package_prices', 'description')) {
                $table->dropColumn('description');
            }

            if (Schema::hasColumn('package_prices', 'is_active')) {
                $table->dropColumn('is_active');
            }
        });
    }
};
