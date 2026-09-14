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
        Schema::table('destinations', function (Blueprint $table) {
            $table->text('operational_notice')->nullable()->after('pacing_note');
            $table->string('cta_title')->nullable()->after('meta_description');
            $table->text('cta_description')->nullable()->after('cta_title');
            $table->string('cta_primary_btn_text')->nullable()->after('cta_description');
            $table->string('cta_primary_btn_url')->nullable()->after('cta_primary_btn_text');
            $table->string('cta_secondary_btn_text')->nullable()->after('cta_primary_btn_url');
            $table->string('cta_secondary_btn_url')->nullable()->after('cta_secondary_btn_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('destinations', function (Blueprint $table) {
            $table->dropColumn([
                'operational_notice',
                'cta_title',
                'cta_description',
                'cta_primary_btn_text',
                'cta_primary_btn_url',
                'cta_secondary_btn_text',
                'cta_secondary_btn_url',
            ]);
        });
    }
};
