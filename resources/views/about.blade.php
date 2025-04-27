@extends('layouts.app')

@section('title', 'About')

@section('content')
<div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
    <div class="bg-indigo-600 p-4 text-center">
        <h1 class="text-2xl font-bold text-white">About the LMS Project</h1>
        <p class="text-indigo-100 mt-1 text-m">Empowering teachers and students with a seamless learning experience</p>
    </div>

    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-8">

        <div class="bg-indigo-50 p-4 rounded-lg shadow-sm">
            <h2 class="text-2xl font-semibold text-indigo-700">Project Overview</h2>
            <p class="text-gray-700 mt-2 text-m">This LMS offers an intuitive platform for managing educational activities. Teachers can create subjects and assignments, while students engage, submit solutions, and monitor their progress.</p>
        </div>

        <div class="bg-indigo-50 p-4 rounded-lg shadow-sm">
            <h2 class="text-2xl font-semibold text-indigo-700">Technology Stack</h2>
            <p class="text-gray-700 mt-2 text-m">Developed with Laravel 12, SQLite, and Tailwind CSS for a modern, responsive experience.</p>
        </div>

        <div class="bg-indigo-50 p-4 rounded-lg shadow-sm">
            <h2 class="text-2xl font-semibold text-indigo-700">Teacher Features</h2>
            <ul class="list-disc list-inside text-gray-700 mt-2 text-m space-y-1">
                <li>Manage subjects</li>
                <li>Create and evaluate assignments</li>
                <li>Monitor participation</li>
            </ul>
        </div>

        <div class="bg-indigo-50 p-4 rounded-lg shadow-sm">
            <h2 class="text-2xl font-semibold text-indigo-700">Student Features</h2>
            <ul class="list-disc list-inside text-gray-700 mt-2 text-m space-y-1">
                <li>Take and leave subjects</li>
                <li>View and complete tasks</li>
                <li>Track academic progress</li>
            </ul>
        </div>
    </div>
</div>
@endsection