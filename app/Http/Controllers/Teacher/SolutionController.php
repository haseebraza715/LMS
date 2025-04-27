<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solution;

class SolutionController extends Controller
{
    /**
     * Show form to evaluate a solution.
     */
    public function edit(Solution $solution)
    {
        // Security: Ensure the solution's task belongs to the authenticated teacher
        if ($solution->task->subject->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }

        return view('teacher.tasks.evaluate', compact('solution'));
    }

    /**
     * Save the evaluation result.
     */
    public function update(Request $request, Solution $solution)
    {
        if ($solution->task->subject->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }

        $validated = $request->validate([
            'awarded_points' => 'required|numeric|min:0|max:' . $solution->task->points,
        ]);

        $solution->update([
            'awarded_points' => $validated['awarded_points'],
            'evaluated_at' => now(),
        ]);

        return redirect()->route('teacher.tasks.show', $solution->task)->with('success', 'Solution evaluated successfully.');
    }
}
