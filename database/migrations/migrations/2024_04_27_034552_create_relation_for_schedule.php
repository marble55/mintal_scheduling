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
        //semester: mandatory one
        Schema::table('schedule', function (Blueprint $table) {
            $table->foreignId('semesters_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });

        //school year: mandatory one
        Schema::table('schedule', function (Blueprint $table) { 
            $table->bigInteger('sy_id')->unsigned();
            
            $table->foreign('sy_id')->references('id')->on('school_year')
                ->cascadeOnDelete()->cascadeOnUpdate();
        });

        //faculty: mandatory one
        Schema::table('schedule', function (Blueprint $table) { 
            $table->bigInteger('faculty_id')->unsigned();
            
            $table->foreign('faculty_id')->references('id')->on('faculty')
                ->cascadeOnDelete()->cascadeOnUpdate();
        });

        //subject
        Schema::table('schedule', function (Blueprint $table) { 
            $table->bigInteger('subject_id')->unsigned()->nullable();
            
            $table->foreign('subject_id')->references('id')->on('subject')
                ->nullOnDelete()->cascadeOnUpdate();
        });

        //classroom
        Schema::table('schedule', function (Blueprint $table) { 
            $table->bigInteger('classroom_id')->unsigned()->nullable();
            
            $table->foreign('classroom_id')->references('id')->on('classroom')
                ->nullOnDelete()->cascadeOnUpdate();
        });

        //block
        Schema::table('schedule', function (Blueprint $table) { 
            $table->bigInteger('block_id')->unsigned()->nullable();
            
            $table->foreign('block_id')->references('id')->on('block')
                ->nullOnDelete()->cascadeOnUpdate();
        });

        //schedule foreign key for time_slots
        Schema::table('time_slots', function (Blueprint $table){
            $table->bigInteger('schedule_id')->unsigned();

            $table->foreign('schedule_id')->references('id')->on('schedule')
                ->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relation_for_schedule');
    }
};
