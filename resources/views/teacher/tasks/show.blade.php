@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden max-w-2xl mx-auto">
    <!-- Header -->
    <div class="bg-gradient-to-r from-indigo-700 to-indigo-600 px-6 py-4">
        <h1 class="text-2xl font-bold text-white">{{ $task->name }}</h1>
        <p class="text-indigo-200 mt-1">{{ $task->subject->subject_code }}</p>
    </div>

    <!-- Content -->
    <div class="p-6">
        <!-- Task Details -->
        <div class="space-y-4">
            <div>
                <h2 class="text-sm font-medium text-gray-500 mb-1">Description</h2>
                <p class="text-gray-700 whitespace-pre-wrap">{{ $task->description }}</p>
            </div>
            <div>
                <h2 class="text-sm font-medium text-gray-500 mb-1">Points</h2>
                <p class="text-gray-700">{{ $task->points }}</p>
            </div>
        </div>

        <!-- Submitted Solutions -->
        <div class="mt-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Submitted Solutions</h2>
            @if($task->solutions->count())
                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-200 rounded-lg">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 uppercase">Submitted By</th>
                                <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 uppercase">Submission Date</th>
                                <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 uppercase">Awarded Points</th>
                                <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($task->solutions as $solution)
                                <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} border-t border-gray-200">
                                    <td class="px-4 py-3 text-gray-700">{{ $solution->user->name }} ({{ $solution->user->email }})</td>
                                    <td class="px-4 py-3 text-gray-700">{{ $solution->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="px-4 py-3 text-gray-700">
                                        @if(is_null($solution->awarded_points))
                                            <span class="text-gray-500">Not Evaluated</span>
                                        @else
                                            {{ $solution->awarded_points }} pts
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">
                                        @if(is_null($solution->awarded_points))
                                            <a href="{{ route('teacher.solutions.edit', $solution) }}" class="inline-flex items-center px-3 py-1 bg-indigo-100 text-indigo-600 hover:bg-indigo-200 hover:text-indigo-700 rounded-lg font-medium transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Evaluate
                                            </a>
                                        @else
                                            <span class="text-gray-500">Evaluated</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="p-4 bg-gray-100 rounded-lg text-gray-500">No solutions submitted yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection