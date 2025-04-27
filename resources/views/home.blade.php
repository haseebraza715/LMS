@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="bg-white rounded-lg shadow-md p-8 max-w-5xl mx-auto">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-indigo-700 mb-6">Welcome to the Learning Management System</h1>
        
        <div class="flex justify-center mb-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
        </div>
        
        <p class="text-lg text-gray-600 mb-8">A comprehensive platform for managing your educational journey</p>
        
        <div class="grid md:grid-cols-3 gap-6 mt-10">
            <div class="bg-indigo-50 p-6 rounded-lg border border-indigo-100 shadow-sm">
                <div class="flex justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-indigo-700 mb-2">Manage Subjects</h2>
                <p class="text-gray-600">Create, view, and manage all your subjects in one place.</p>
            </div>
            
            <div class="bg-indigo-50 p-6 rounded-lg border border-indigo-100 shadow-sm">
                <div class="flex justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-indigo-700 mb-2">Track Tasks</h2>
                <p class="text-gray-600">Organize assignments and monitor progress effectively.</p>
            </div>
            
            <div class="bg-indigo-50 p-6 rounded-lg border border-indigo-100 shadow-sm">
                <div class="flex justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-indigo-700 mb-2">Collaborate</h2>
                <p class="text-gray-600">Connect with teachers and students in an interactive environment.</p>
            </div>
        </div>
        
        <div class="mt-12">
            <a href="{{ auth()->check() ? (auth()->user()->is_teacher ? route('teacher.subjects.index') : route('student.subjects.index')) : route('login') }}" 
               class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow-md transition duration-150">
                Get Started
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </div>
</div>
@endsection