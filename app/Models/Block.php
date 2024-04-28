<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Block extends Model
{
    use HasFactory;

    protected $table = 'block';

    protected $fillable = [
        'course', 'section', 'year_level',
    ];

    public function schedules():HasMany
    {
        return $this->hasMany(Schedule::class);
    }
}
