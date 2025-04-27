<?php

// app/Models/Solution.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;

    protected $fillable = [
        'solution_text',
        'user_id',
        'task_id',
        'awarded_points',
        'evaluated_at',
    ];

    protected $dates = [
        'evaluated_at',
    ];

    // Each solution belongs to a specific task.
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    // Each solution is submitted by a student.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
