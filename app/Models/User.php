<?php

// app/Models/User.php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // The attributes that are mass assignable.
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_teacher',
    ];

    // The attributes that should be cast.
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_teacher' => 'boolean',
    ];

    // A teacher can have many subjects that they teach.
    public function subjectsTaught()
    {
        return $this->hasMany(Subject::class, 'user_id');
    }

    // A student can be enrolled in many subjects.
    public function subjectsTaken()
    {
        return $this->belongsToMany(Subject::class, 'subject_user', 'user_id', 'subject_id')
                ->select('subjects.*'); // This ensures only columns from subjects are selected.
    }

    // A user (student) may submit many solutions.
    public function solutions()
    {
        return $this->hasMany(Solution::class);
    }
}
