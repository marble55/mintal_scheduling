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
        //faculty: optional one
        Schema::table('schedule', function (Blueprint $table) { 
            $table->bigInteger('faculty_id')->unsigned()->nullable();
            
            $table->foreign('faculty_id')->references('id')->on('faculty')
                ->nullOnDelete()->cascadeOnUpdate();
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

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_relation2');
    }
};
