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
            $table->bigInteger('faculty_id')->unsigned()->unique()->nullable()
            ->comment('faculty details of user/program head');
            
            $table->foreign('faculty_id')->references('id')->on('faculty')
                ->nullOnDelete()->cascadeOnUpdate();
        });

        Schema::table('faculty', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->nullable()
            ->comment('the user that handles this faculty');
            
            $table->foreign('user_id')->references('id')->on('faculty')
                ->nullOnDelete()->cascadeOnUpdate();
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
