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
        DB::unprepared('
            CREATE TRIGGER create_time_slot_trigger AFTER INSERT ON schedule
            FOR EACH ROW
            BEGIN
                INSERT INTO time_slots (time_start, time_end, schedule_id)
                VALUES ("00:00:00", "00:00:00", NEW.id);
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trigger');
    }
};
