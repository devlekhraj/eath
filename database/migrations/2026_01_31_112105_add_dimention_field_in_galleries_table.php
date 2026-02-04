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
        Schema::table('galleries', function (Blueprint $table) {
            if (!Schema::hasColumn('galleries', 'width')) {
                $table->float('width')->nullable()->after('file_size');
            }
            if (!Schema::hasColumn('galleries', 'height')) {
                $table->float('height')->nullable()->after('width');
            }
            if (!Schema::hasColumn('galleries', 'hash')) {
                $table->string('hash', 64)->unique()->nullable()->after('id');
            }
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            if (Schema::hasColumn('galleries', 'height') && Schema::hasColumn('galleries', 'width')) {
                $table->dropColumn(['height', 'width','hash']);
            }
        });
    }
};
