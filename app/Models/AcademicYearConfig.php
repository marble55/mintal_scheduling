<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYearConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'current_semester',
        'current_school_year',
    ];

    public $timestamps = false;
}
