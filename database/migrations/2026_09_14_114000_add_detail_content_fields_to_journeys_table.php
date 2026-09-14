<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('journeys', function (Blueprint $table) {
            $table->text('preparation_note')->nullable()->after('route_map_note');
            $table->text('packing_note')->nullable()->after('preparation_note');
            $table->text('operational_notice')->nullable()->after('packing_note');
            $table->string('cta_title')->nullable()->after('meta_description');
            $table->text('cta_description')->nullable()->after('cta_title');
            $table->string('cta_primary_btn_text')->nullable()->after('cta_description');
            $table->string('cta_primary_btn_url')->nullable()->after('cta_primary_btn_text');
            $table->string('cta_secondary_btn_text')->nullable()->after('cta_primary_btn_url');
            $table->string('cta_secondary_btn_url')->nullable()->after('cta_secondary_btn_text');
        });
    }

    public function down(): void
    {
        Schema::table('journeys', function (Blueprint $table) {
            $table->dropColumn([
                'preparation_note',
                'packing_note',
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
