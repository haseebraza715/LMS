@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <!-- Header -->
    <div class="bg-gradient-to-r from-indigo-700 to-indigo-600 px-6 py-4">
        <h1 class="text-2xl font-bold text-white">{{ $task->name }}</h1>
        <p class="text-indigo-200 mt-1">{{ $task->subject->name }} ({{ $task->subject->subject_code }})</p>
    </div>

    <!-- Content -->
    <div class="p-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Task Information -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Task Details Card -->
                <div class="bg-gray-50 rounded-lg p-5 border border-gray-200 shadow-sm">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Task Information</h2>
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Description</h3>
                            <p class="mt-1 text-gray-800">{{ $task->description ?: 'No description available' }}</p>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Teacher</h3>
                                <p class="mt-1 text-gray-800">{{ $task->subject->teacher->name }}</p>
                                <a href="mailto:{{ $task->subject->teacher->email }}" class="text-sm text-indigo-600 hover:text-indigo-800">
                                    {{ $task->subject->teacher->email }}
                                </a>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Points</h3>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800 mt-1">
                                    {{ $task->points }} Points
                                </span>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Due Date</h3>
                                <p class="mt-1 text-gray-800">{{ $task->due_date ? $task->due_date->format('d/m/Y') : 'Not specified' }}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Created At</h3>
                                <p class="mt-1 text-gray-800">{{ $task->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submission Form -->
                <div class="bg-gray-50 rounded-lg p-5 border border-gray-200 shadow-sm">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Submit Your Solution</h2>
                    <form method="POST" action="{{ route('student.tasks.submit', $task) }}" class="max-w-lg">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-500 mb-2" for="solution_text">Solution</label>
                            <textarea name="solution_text" id="solution_text" rows="6" class="w-full border border-gray-200 p-3 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition">{{ old('solution_text') }}</textarea>
                            @error('solution_text')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Submit Solution
                        </button>
                    </form>
                </div>
            </div>

            <!-- Submissions Sidebar -->
            <div class="space-y-6">
                <div class="bg-gray-50 rounded-lg p-5 border border-gray-200 shadow-sm">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Your Submissions</h2>

                    @php
                        $userSolutions = $task->solutions->where('user_id', auth()->id())->whereNotNull('solution_text');
                    @endphp

                    @if($userSolutions->count())
                        <div class="space-y-3 max-h-80 overflow-y-auto pr-2">
                            @foreach($userSolutions as $solution)
                                <div class="bg-white p-3 rounded-md border border-gray-100 shadow-sm hover:shadow-md transition">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="text-sm text-gray-800">{{ $solution->created_at->format('d/m/Y H:i') }}</p>
                                            <p class="text-xs text-gray-500 mt-1">{{ Str::limit($solution->solution_text, 50) }}</p>
                                        </div>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $solution->awarded_points !== null ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ $solution->awarded_points !== null ? "Awarded: {$solution->awarded_points} pts" : 'Pending Evaluation' }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8 bg-white rounded-md border border-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 012 2h2a2 2 0 012-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            <p class="text-gray-500">You have not submitted a solution yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
