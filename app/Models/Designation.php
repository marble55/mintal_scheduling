<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Designation extends Model
{
    use HasFactory;

    protected $table = 'designation';

    protected $fillable = 'description, load';

    public function faculties(): HasMany
    {
        return $this->hasMany(Faculty::class, 'designation_id');
    }
}
