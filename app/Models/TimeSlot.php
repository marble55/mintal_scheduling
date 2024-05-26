<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TimeSlot extends Model
{
    use HasFactory;

    protected $table = 'time_slots';

    protected $fillable = ['time_start', 'time_end'];

    public $timestamps = false;

    /**
     * check if the timestart and timeend are equal
     * @return boolean
     * 
     */
    public function checkTimeEquals($time_start, $time_end)
    {
        return $this->query()
            // Ensure that we are checking against the current record by matching its ID
            ->where('id', '=', $this->getAttribute('id'))

            // Time overlap conditions
            ->where(function ($query) use ($time_start, $time_end) {
                // Check if the new time_start is between any existing time_start and time_end
                $query->orWhere(function ($subquery) use ($time_start) {
                    $subquery->where('time_start', '<=', $time_start)
                        ->where('time_end', '>', $time_start);
                })
                    // Check if the new time_end is between any existing time_start and time_end
                    ->orWhere(function ($subquery) use ($time_end) {
                    $subquery->where('time_start', '<', $time_end)
                        ->where('time_end', '>=', $time_end);
                })
                    // Check if the new time period completely encompasses any existing time period
                    ->orWhere(function ($subquery) use ($time_start, $time_end) {
                    $subquery->where('time_start', '>=', $time_start)
                        ->where('time_end', '<=', $time_end);
                });
            })->exists();
    }

    /**
     * @return string 12 hour time
     */
    public function time_start_12hour():string
    {
        $dateTime = DateTime::createFromFormat('H:i:s', $this->getAttribute('time_start'));

        return $dateTime->format('g:i A');
    }

    /**
     * @return string 12 hour time
     */
    public function time_end_12hour():string
    {
        $dateTime = DateTime::createFromFormat('H:i:s', $this->getAttribute('time_end'));

        return $dateTime->format('g:i A');
    }

    protected function casts(): array
    {
        return[
            'time_start' => 'date',
            'time_end' => 'date',
        ];
    }

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }
}
