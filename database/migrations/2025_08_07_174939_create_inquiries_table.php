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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->nullable();
            $table->string('mobile_no')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('country')->nullable();
            $table->string('custom_destination')->nullable();
            $table->string('description')->nullable();
            $table->date('travel_date')->nullable();
            $table->integer('number_of_people')->nullable();
            $table->text('message')->nullable();
            $table->enum('status', ['new', 'in_progress', 'resolved'])->default('new');
            $table->unsignedBigInteger('travel_package_id')->nullable();
            $table->foreign('travel_package_id')->references('id')->on('travel_packages')->onDelete('cascade');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
