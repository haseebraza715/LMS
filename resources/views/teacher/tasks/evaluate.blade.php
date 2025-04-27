@extends('layouts.app')

@section('title', 'Evaluate Solution')

@section('content')
<div class="bg-white rounded-2xl shadow-lg overflow-hidden max-w-3xl mx-auto mt-8">
    <!-- Header -->
    <div class="bg-gradient-to-r from-indigo-700 to-indigo-600 px-8 py-6">
        <h1 class="text-3xl font-bold text-white">Evaluate Task: {{ $solution->task->name }}</h1>
        <p class="text-indigo-200 mt-2 text-sm">
            Submitted by <strong>{{ $solution->user->name }}</strong> ({{ $solution->user->email }})
        </p>
    </div>

    <!-- Content -->
    <div class="p-8 space-y-8">
        <!-- Solution Text -->
        <div>
            <h2 class="text-base font-semibold text-gray-700 mb-2">Solution</h2>
            
            @if(!empty($solution->solution_text))
                <div class="p-4 bg-gray-100 rounded-md whitespace-pre-wrap text-gray-800 text-sm">
                    {{ $solution->solution_text }}
                </div>
            @else
                <div class="p-4 bg-yellow-100 rounded-md text-yellow-800 text-sm">
                    No solution submitted yet.
                </div>
            @endif
        </div>

        <!-- Evaluation Form -->
        @if(!empty($solution->solution_text))
            <form method="POST" action="{{ route('teacher.solutions.update', $solution) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Awarded Points -->
                <div>
                    <label for="awarded_points" class="block text-sm font-medium text-gray-600 mb-2">
                        Awarded Points (0 - {{ $solution->task->points }})
                    </label>
                    <input 
                        type="number" 
                        name="awarded_points" 
                        id="awarded_points" 
                        value="{{ old('awarded_points', $solution->awarded_points ?? '') }}" 
                        min="0" 
                        max="{{ $solution->task->points }}" 
                        class="w-full border border-gray-300 p-3 rounded-md focus:ring-indigo-500 focus:border-indigo-500 transition" 
                        required
                    >
                    @error('awarded_points')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="text-right">
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-semibold transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Submit Evaluation
                    </button>
                </div>
            </form>
        @endif
    </div>
</div>
@endsection
