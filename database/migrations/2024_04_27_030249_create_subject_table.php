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
        Schema::create('subject', function (Blueprint $table) {
            $table->id();
            $table->string('subject_code');
            $table->string('description');
            $table->boolean('is_graduate_program')->default(false);
            $table->decimal('units_lecture', 4, 2)->nullable()->unsigned()->default(0);
            $table->decimal('units_lab', 4, 2)->nullable()->unsigned()->default(0);
            $table->decimal('load', 4, 2)->nullable()->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject');
    }
};
