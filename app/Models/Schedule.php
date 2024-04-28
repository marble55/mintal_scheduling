<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedule';
    protected $fillable = [
        'day', 'is_lab',
        'semesters_id', 'sy_id', 'faculty_id', //mandatory foreign keys
        'subject_id', 'classroom_id', 'block_id', //optional foreign keys
    ];

    //---relation functions---///

    public function faculty():BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }

    public function semester():BelongsTo
    {
        return $this->belongsTo(Semester::class, 'semesters_id');
    }

    public function school_year():BelongsTo
    {
        return $this->belongsTo(SchoolYear::class, 'sy_id');
    }

    public function subject():BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function classroom():BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }

    public function block():BelongsTo
    {
        return $this->belongsTo(Block::class);
    }

}
