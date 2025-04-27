<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Subject;
use App\Models\Task;
use App\Models\Solution;
use Illuminate\Support\Facades\Hash;

class LmsSeeder extends Seeder
{
    public function run()
    {
        // ---------------------------------------------------------------------
        // 1. Create Teachers
        // ---------------------------------------------------------------------
        $teacher1 = User::create([
            'name' => 'John Teacher',
            'email' => 'john.teacher@example.com',
            'password' => Hash::make('password'),
            'is_teacher' => true,
        ]);

        $teacher2 = User::create([
            'name' => 'Jane Teacher',
            'email' => 'jane.teacher@example.com',
            'password' => Hash::make('password'),
            'is_teacher' => true,
        ]);

        // ---------------------------------------------------------------------
        // 2. Create Students
        // ---------------------------------------------------------------------
        $students = [
            User::create([
                'name' => 'Alice Student',
                'email' => 'alice.student@example.com',
                'password' => Hash::make('password'),
                'is_teacher' => false,
            ]),
            User::create([
                'name' => 'Bob Student',
                'email' => 'bob.student@example.com',
                'password' => Hash::make('password'),
                'is_teacher' => false,
            ]),
            User::create([
                'name' => 'Charlie Student',
                'email' => 'charlie.student@example.com',
                'password' => Hash::make('password'),
                'is_teacher' => false,
            ]),
        ];

        // ---------------------------------------------------------------------
        // 3. Create Subjects
        // ---------------------------------------------------------------------
        $subjects = [
            Subject::create([
                'user_id' => $teacher1->id,
                'name' => 'Web Engineering',
                'description' => 'Learn about HTTP, frontend, backend development.',
                'subject_code' => 'IK-WEB101',
                'credit_value' => 3,
            ]),
            Subject::create([
                'user_id' => $teacher1->id,
                'name' => 'Advanced PHP',
                'description' => 'Deep dive into PHP OOP, design patterns, and security.',
                'subject_code' => 'IK-PHP201',
                'credit_value' => 4,
            ]),
            Subject::create([
                'user_id' => $teacher2->id,
                'name' => 'Database Systems',
                'description' => 'Relational databases, SQL queries, normalization.',
                'subject_code' => 'IK-DBS301',
                'credit_value' => 3,
            ]),
            Subject::create([
                'user_id' => $teacher2->id,
                'name' => 'Software Engineering',
                'description' => 'Software development lifecycle, agile methodologies.',
                'subject_code' => 'IK-SWE401',
                'credit_value' => 3,
            ]),
        ];

        // ---------------------------------------------------------------------
        // 4. Enroll Students in Subjects
        // ---------------------------------------------------------------------
        foreach ($subjects as $subject) {
            foreach ($students as $student) {
                $subject->students()->attach($student->id);
            }
        }

        // ---------------------------------------------------------------------
        // 5. Create Tasks for Each Subject
        // ---------------------------------------------------------------------
        $tasks = [
            Task::create([
                'subject_id' => $subjects[0]->id,
                'name' => 'HTTP Basics',
                'description' => 'Explain the fundamentals of HTTP.',
                'points' => 10,
            ]),
            Task::create([
                'subject_id' => $subjects[0]->id,
                'name' => 'Frontend vs Backend',
                'description' => 'Compare frontend and backend technologies.',
                'points' => 15,
            ]),
            Task::create([
                'subject_id' => $subjects[1]->id,
                'name' => 'Laravel Fundamentals',
                'description' => 'Build a simple blog using Laravel.',
                'points' => 20,
            ]),
            Task::create([
                'subject_id' => $subjects[2]->id,
                'name' => 'SQL Joins Practice',
                'description' => 'Write examples for different types of joins.',
                'points' => 12,
            ]),
            Task::create([
                'subject_id' => $subjects[3]->id,
                'name' => 'Agile vs Waterfall',
                'description' => 'Discuss pros and cons of Agile and Waterfall models.',
                'points' => 15,
            ]),
        ];

        // ---------------------------------------------------------------------
        // 6. Create Submitted Solutions
        // ---------------------------------------------------------------------
        foreach ($students as $student) {
            foreach ($tasks as $task) {
                Solution::create([
                    'task_id' => $task->id,
                    'user_id' => $student->id,
                    'solution_text' => 'This is a sample solution submitted by ' . $student->name . ' for ' . $task->name . '.',
                    'awarded_points' => null,
                    'evaluated_at' => null,
                ]);
            }
        }
    }
}
