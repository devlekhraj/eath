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
        if (!Schema::hasColumn('featured_packages', 'highlight')) {
            Schema::table('featured_packages', function (Blueprint $table) {
                $table->text('highlight')->after('slug')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('featured_packages', 'highlight')) {
            Schema::table('featured_packages', function (Blueprint $table) {
                $table->dropColumn('highlight');
            });
        }
    }
};
