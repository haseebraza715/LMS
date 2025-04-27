<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Show form to create a new task within a subject.
     */
    public function create(Subject $subject)
    {
        // Ensure the subject belongs to the teacher.
        if ($subject->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }
        return view('teacher.tasks.create', compact('subject'));
    }

    /**
     * Store a newly created task.
     */
    public function store(Request $request, Subject $subject)
    {
        if ($subject->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }
        $validated = $request->validate([
            'name'        => 'required|min:5',
            'description' => 'required',
            'points'      => 'required|numeric',
        ]);

        $subject->tasks()->create($validated);

        return redirect()->route('teacher.subjects.show', $subject)->with('success', 'Task created successfully.');
    }

    /**
     * Display the task details, including submission statistics.
     */
    public function show(Task $task)
    {
        // Optionally, check if the current teacher owns the subject of this task.
        if ($task->subject->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }
        // Load the solutions relationship.
        $task->load('solutions.user');
        return view('teacher.tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified task.
     */
    public function edit(Task $task)
    {
        if ($task->subject->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }
        return view('teacher.tasks.edit', compact('task'));
    }

    /**
     * Update the specified task.
     */
    public function update(Request $request, Task $task)
    {
        if ($task->subject->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }
        $validated = $request->validate([
            'name'        => 'required|min:5',
            'description' => 'required',
            'points'      => 'required|numeric',
        ]);

        $task->update($validated);

        return redirect()->route('teacher.tasks.show', $task)->with('success', 'Task updated successfully.');
    }
}
