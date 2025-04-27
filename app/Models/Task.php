<?php

// app/Models/Task.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'points',
        'subject_id',
    ];

    // Each task belongs to one subject.
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    // A task can have many submitted solutions.
    public function solutions()
    {
        return $this->hasMany(Solution::class);
    }
}

