@extends('layouts.app')

@section('title', 'Subject Details')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="bg-indigo-700 px-6 py-4 flex flex-col md:flex-row justify-between">
        <div>
            <h1 class="text-2xl font-bold text-white">{{ $subject->name }}</h1>
            <p class="text-indigo-200 mt-1">{{ $subject->subject_code }}</p>
        </div>
        <div class="mt-2 md:mt-0">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-800 text-white">
                {{ $subject->credit_value }} Credits
            </span>
        </div>
    </div>

    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Subject Information -->
            <div class="md:col-span-2 space-y-4">
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800 mb-3">Subject Information</h2>
                    
                    <div class="space-y-3">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Description</h3>
                            <p class="mt-1 text-gray-800">{{ $subject->description ?: 'No description available' }}</p>
                        </div>
                        
                        <div class="flex justify-between">
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Created At</h3>
                                <p class="mt-1 text-gray-800">{{ $subject->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Updated At</h3>
                                <p class="mt-1 text-gray-800">{{ $subject->updated_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Tasks Section -->
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold text-gray-800">Tasks</h2>
                    </div>
                    
                    @if($subject->tasks->count())
                        <div class="space-y-3">
                            @foreach($subject->tasks as $task)
                                <div class="bg-white p-3 rounded-md shadow-sm hover:shadow-md transition border border-gray-100">
                                    <div class="flex justify-between items-center">
                                        <a href="{{ route('student.tasks.show', $task) }}" class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                            </svg>
                                            {{ $task->name }}
                                        </a>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            {{ $task->points }} points
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-6 bg-white rounded-md border border-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            <p class="text-gray-500">No tasks available for this subject.</p>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="space-y-4">
                <!-- Teacher Info -->
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800 mb-3">Teacher</h2>
                    <div class="flex items-center bg-white p-3 rounded-md shadow-sm border border-gray-100">
                        <div class="h-12 w-12 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-800 font-medium text-lg mr-3">
                            {{ substr($subject->teacher->name, 0, 1) }}
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">{{ $subject->teacher->name }}</p>
                            <p class="text-sm text-gray-500">{{ $subject->teacher->email }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Students List -->
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800 mb-3">
                        Enrolled Students 
                        <span class="text-sm font-normal bg-indigo-100 text-indigo-800 py-0.5 px-2 rounded-full">{{ $subject->students->count() }}</span>
                    </h2>
                    
                    @if($subject->students->count())
                        <div class="space-y-2 max-h-72 overflow-y-auto pr-2">
                            @foreach($subject->students as $student)
                                <div class="flex items-center bg-white p-2 rounded-md border border-gray-100">
                                    <div class="h-8 w-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 font-medium mr-2">
                                        {{ substr($student->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">{{ $student->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $student->email }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-6 bg-white rounded-md border border-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <p class="text-gray-500">No students enrolled yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection