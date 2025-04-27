<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display the task details and the submission form.
     */
    public function show(Task $task)
    {
        // Load related subject and teacher info for display.
        $task->load('subject.teacher', 'solutions');
        return view('student.tasks.show', compact('task'));
    }

    /**
     * Handle the solution submission for a task.
     */
    public function submitSolution(Request $request, Task $task)
    {
        // Validate the submission input
        $validated = $request->validate([
            'solution_text' => 'required|string',
        ]);

        // Create a new solution for the current student.
        $task->solutions()->create([
            'user_id'       => auth()->id(),
            'solution_text' => $validated['solution_text'],
            // awarded_points remains null until evaluated
        ]);

        return redirect()->route('student.tasks.show', $task)->with('success', 'Solution submitted successfully.');
    }
}
