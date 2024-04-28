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
        Schema::create('faculty', function (Blueprint $table) {
            $table->id();
            $table->string('id_usep', 10)->unique()->default('2020-00000');
            $table->string('first_name', 50);
            $table->string('last_name', 50);    
            $table->string('remarks')->nullable();
            $table->boolean('is_part_timer')->default(false);
            $table->boolean('is_graduate')->default(false);
            $table->timestamps();
        });

        Schema::create('designation', function (Blueprint $table) {
            $table->id();
            $table->string('description', 50);
            $table->decimal('load', 5, 2)->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty');
        Schema::dropIfExists('designation');
    }
};
