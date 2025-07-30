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
        Schema::create('guide_trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guide_id')->constrained('guides')->onDelete('cascade');
            $table->foreignId('travel_package_id')->nullable()->constrained('travel_packages')->onDelete('set null');

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->unsignedInteger('group_size')->default(0);
            $table->text('notes')->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->softDeletes();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guide_trips');
    }
};
