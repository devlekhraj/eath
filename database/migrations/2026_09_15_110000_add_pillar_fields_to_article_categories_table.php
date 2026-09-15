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
        Schema::table('article_categories', function (Blueprint $table) {
            $table->string('kicker')->nullable()->after('description');
            $table->string('tagline')->nullable()->after('kicker');
            $table->text('summary')->nullable()->after('tagline');
            $table->text('lead')->nullable()->after('summary');
            $table->string('icon')->nullable()->after('lead');
            $table->json('rules')->nullable()->after('icon');
            $table->json('hazards')->nullable()->after('rules');
            $table->json('checklists')->nullable()->after('hazards');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('article_categories', function (Blueprint $table) {
            $table->dropColumn([
                'kicker',
                'tagline',
                'summary',
                'lead',
                'icon',
                'rules',
                'hazards',
                'checklists',
            ]);
        });
    }
};
