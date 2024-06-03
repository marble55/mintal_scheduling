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
        Schema::create('schedule', function (Blueprint $table) {
            $table->id();
            $table->string('day', 20);
            $table->boolean('is_lab')->default(false);
            $table->timestamps();
        });

        Schema::create('time_slots', function(Blueprint $table){
            $table->id();
            $table->time('time_start');
            $table->time('time_end');
        });

        Schema::create('semesters', function (Blueprint $table) {
            $table->id();
            $table->string('name', 35);
        });

        Schema::create('school_year', function (Blueprint $table) {
            $table->id();
            $table->string('academic_year', 25)->default('2024-2025');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule');
        Schema::dropIfExists('time_slots');
        Schema::dropIfExists('semesters');
        Schema::dropIfExists('school_year');
    }
};
