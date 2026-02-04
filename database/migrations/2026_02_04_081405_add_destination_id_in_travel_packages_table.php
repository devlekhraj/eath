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
        Schema::table('travel_packages', function (Blueprint $table) {
            if (!Schema::hasColumn('travel_packages', 'destination_id')) {
            $table->unsignedBigInteger('destination_id')->nullable()->after('description');

                $table->foreign('destination_id')
                    ->references('id')
                    ->on('destinations')
                    ->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('travel_packages', function (Blueprint $table) {
            if (Schema::hasColumn('travel_packages', 'destination_id')) {
                $table->dropForeign(['destination_id']);
                $table->dropColumn('destination_id');
            }
        });
    }
};
