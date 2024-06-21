<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Faculty extends Model
{
    use HasFactory;

    protected $table = 'faculty';

    protected $fillable = [
        'id_usep',
        'first_name',
        'last_name',
        'remarks',
        'is_part_timer',
        'is_graduate',
        'user_id',
        'designation',
        'designation_load',
        'profile_image',
    ];

    public static function createTempFaculty(): self
    {
        return self::create([
            'first_name' => 'temp',
            'id_usep' => '0000-' . str_pad(random_int(0, 99999), 5, '0', STR_PAD_LEFT),
            'last_name' => 'temp',
            'remarks' => 'temp',
        ]);
    }

    public function getTotalLoadAttribute()
    {
        $subjectLoad = $this->schedules()->select('subject_id')->groupBy('subject_id')->get()->sum('subject.load');
        $facultyLoad = $this->designation_load;

        return $subjectLoad + $facultyLoad;
    }


    //----Relationship Functions----//
    /**
     * returns the program_head
     * that this faculty is UNDER
     */
    public function program_head(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * returns the program_head id
     * of the faculty
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'faculty_id');
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    /**
     * Get all of the deployments for the project.
     */
    public function subjects(): HasManyThrough
    {
        return $this->hasManyThrough(Subject::class, Schedule::class);
    }

    //----Casting methods----//
    /**
     * casts is_part_timer into boolean
     */
    public function setIsPartTimerAttribute($value)
    {
        $this->attributes['is_part_timer'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
    
}
