<?php

// app/Models/Subject.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'subject_code',
        'credit_value',
    ];

    // The teacher who created the subject.
    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // A subject can have many tasks.
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // A subject can have many students enrolled.
    public function students()
    {
        return $this->belongsToMany(User::class, 'subject_user', 'subject_id', 'user_id')->withTimestamps();
    }
}

