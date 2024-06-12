<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'faculty_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'is_admin',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public static function createWithFaculty($details)
    {
        $tempFaculty = Faculty::createTempFaculty();
        
        $user = $tempFaculty->user()->create([
            'name' => $details['name'],
            'email' => $details['email'],
            'password' => Hash::make($details['password']),
        ]);

        return $user;
    }


    //---Relationship Functions---//
    /**
     * returns the faculty details of the program head
     * 
     * @return Faculty
     */
    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class, 'faculty_id', 'id');
    }

    /**
     * returns the faculty that this user is under
     * 
     * @return HasMany Faculty
     */
    public function faculties(): HasMany
    {
        return $this->hasMany(Faculty::class);
    }
}
