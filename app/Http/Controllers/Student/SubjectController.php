<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    /**
     * Display the list of subjects enrolled by the student.
     */
    public function index()
    {
        $student = auth()->user();
        $subjects = $student->subjectsTaken()->latest()->paginate(10);
        return view('student.subjects.index', compact('subjects'));
    }

    /**
     * Display a list of subjects that the student has not taken yet.
     */
    public function showAvailableSubjects()
    {
        $student = auth()->user();
        // Fetch subjects that are not in the student's enrolled subjects.
        $takenSubjectIds = $student->subjectsTaken()->pluck('id')->toArray();
        $availableSubjects = Subject::whereNotIn('id', $takenSubjectIds)->latest()->paginate(10);

        return view('student.subjects.available', compact('availableSubjects'));
    }

    /**
 * Enroll the student in a subject.
 */
public function take(Subject $subject)
{
    $student = auth()->user();

    // Enroll the student only if not already enrolled
    if (!$student->subjectsTaken()->where('subject_id', $subject->id)->exists()) {
        $student->subjectsTaken()->attach($subject->id);
        return redirect()->route('student.subjects.index')
                         ->with('success', 'Subject taken successfully.');
    }

    // Alternatively, if you prefer always using syncWithoutDetaching, uncomment the line below:
    // $student->subjectsTaken()->syncWithoutDetaching([$subject->id]);

    return redirect()->route('student.subjects.index')
                     ->with('warning', 'You are already enrolled in this subject.');
}


    /**
     * Remove the student enrollment from a subject.
     */
    public function leave(Subject $subject)
    {
        $student = auth()->user();
        $student->subjectsTaken()->detach($subject->id);
        return redirect()->route('student.subjects.index')->with('success', 'Subject left successfully.');
    }

    /**
     * Display the subject details, including teacher info, enrolled students, and tasks.
     */
    public function show(Subject $subject)
    {
        $subject->load('teacher', 'students', 'tasks');
        return view('student.subjects.show', compact('subject'));
    }
}
