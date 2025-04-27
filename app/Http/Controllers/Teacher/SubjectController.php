<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    /**
     * Display a listing of the teacher's subjects.
     */
    public function index()
    {
        $teacher = auth()->user();
        $subjects = $teacher->subjectsTaught()->latest()->paginate(10);
        return view('teacher.subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new subject.
     */
    public function create()
    {
        return view('teacher.subjects.create');
    }

    /**
     * Store a newly created subject in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'name'         => 'required|min:3',
            'description'  => 'nullable|string',
            'subject_code' => ['required', 'regex:/^IK-[A-Z]{3}\d{3}$/'],
            'credit_value' => 'required|numeric',
        ]);

        // Save the subject linked to the authenticated teacher
        $subject = auth()->user()->subjectsTaught()->create($validated);

        return redirect()->route('teacher.subjects.show', $subject)->with('success', 'Subject created successfully.');
    }

    /**
     * Display the specified subject along with enrolled students and tasks.
     */
    public function show(Subject $subject)
    {
        // You may want to check if the authenticated teacher is the owner
        if ($subject->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }
        $subject->load('students', 'tasks');
        return view('teacher.subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified subject.
     */
    public function edit(Subject $subject)
    {
        if ($subject->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }
        return view('teacher.subjects.edit', compact('subject'));
    }

    /**
     * Update the specified subject in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        if ($subject->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }
        $validated = $request->validate([
            'name'         => 'required|min:3',
            'description'  => 'nullable|string',
            'subject_code' => ['required', 'regex:/^IK-[A-Z]{3}\d{3}$/'],
            'credit_value' => 'required|numeric',
        ]);

        $subject->update($validated);

        return redirect()->route('teacher.subjects.show', $subject)->with('success', 'Subject updated successfully.');
    }

    /**
     * Soft delete the specified subject.
     */
    public function destroy(Subject $subject)
    {
        if ($subject->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }
        $subject->delete();
        return redirect()->route('teacher.subjects.index')->with('success', 'Subject deleted successfully.');
    }
}
