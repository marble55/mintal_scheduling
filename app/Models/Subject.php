<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subject';

    protected $fillable = 
    [
        'subject_code', 'description', 'units_lecture',
        'units_lab', 'load', 'is_graduate_program',
    ];

    public function getIsGraduateProgramTextAttribute(){
        $value = $this->getAttribute('is_graduate_program');
        return $value ? 'Graduate' : 'Undergraduate';
    }

    public function schedules():HasMany
    {
        return $this->hasMany(Schedule::class);
    }
}
