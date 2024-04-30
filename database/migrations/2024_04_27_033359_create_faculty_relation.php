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
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('faculty_id')->unsigned()->unique()
            ->comment('faculty details of user/program head');
            
            $table->foreign('faculty_id')->references('id')->on('faculty')
                ->cascadeOnDelete()->cascadeOnUpdate();
        });

        Schema::table('faculty', function (Blueprint $table) {
            $table->foreignId('users_id')->constrained()->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables_relation');
    }
};
