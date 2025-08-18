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
        Schema::table('inquiries', function (Blueprint $table) {
            // Remove old travel_package_id if exists
            if (Schema::hasColumn('inquiries', 'travel_package_id')) {
                $table->dropForeign(['travel_package_id']);
                $table->dropColumn('travel_package_id');
            }

            // Add polymorphic columns
            $table->morphs('inquirable'); // creates inquirable_id (unsignedBigInteger) + inquirable_type (string)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->dropMorphs('inquirable');
        });
    }
};
