<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    //----Relationship Functions----//
    /**
     * returns the designation
     * that the faculty is assigned with
     */
    public function designations(): BelongsTo
    {
        return $this->belongsTo(Designation::class);
    }

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
     * of the program_head faculty
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'faculty_id');
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    //----Casting methods----//
    /**
     * casts is_part_timer into boolean
     */
    public function setIsPartTimerAttribute($value)
    {
        $this->attributes['is_part_timer'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * casts is_graduate into boolean
     */
    public function setIsGraduateAttribute($value)
    {
        $this->attributes['is_graduate'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    
}
