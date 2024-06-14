<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class TimeSlot extends Model
{
    use HasFactory;

    protected $table = 'time_slots';

    protected $fillable = ['time_start', 'time_end'];

    public $timestamps = false;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        dd($this->time_end_12hour());
        return [
            'time_start' => 'time:H:i',
            'time_end' => 'time:H:i',
        ];
    }

     /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'time_start' => 'datetime',
        'time_end' => 'datetime',
    ];


    /**
     * check if the timestart and timeend are equal
     * @return boolean
     * 
     */
    public function checkDatabaseTimeEquals($time_start, $time_end)
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

    public function checkTimeEquals($new_time_start, $new_time_end)
    {
        if (
            ($this->time_start <= $new_time_start && $new_time_start < $this->time_end) ||  // Partial overlap at the start
            ($this->time_start < $new_time_end && $new_time_end <= $this->time_end) ||     // Partial overlap at the end
            ($new_time_start <= $this->time_start && $new_time_end >= $this->time_end) ||  // Complete overlap
            ($this->time_start == $new_time_start && $this->time_end == $new_time_end) // Exact overlap
        ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return string 12 hour time
     */
    public function time_start_12hour(): string
    {
        // $dateTime = DateTime::createFromFormat('H:i:s', $this->getAttribute('time_start'));
        // return $dateTime->format('g:i A');
        return $this->getAttribute('time_start')->format('g:i A');
    }

    /**
     * @return string 12 hour time
     */
    public function time_end_12hour(): string
    {
        // $dateTime = DateTime::createFromFormat('H:i:s', $this->getAttribute('time_end'));
        // return $dateTime->format('g:i A');
        return $this->getAttribute('time_end')->format('g:i A');
    }

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }
}
