<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TimeSlot extends Model
{
    use HasFactory;

    protected $table = 'time_slots';

    protected $fillable = ['time_start', 'time_end'];

    public $timestamps = false;
    public function schedule():BelongsTo
    {
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }
}
