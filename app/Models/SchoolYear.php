<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SchoolYear extends Model
{
    use HasFactory;


    protected $table = 'school_year';

    public $timestamps = false;
    
    protected $fillable = [
        'academic_year'
    ];
    public function schedules():HasMany
    {
        return $this->hasMany(Schedule::class, 'sy_id');
    }
}
