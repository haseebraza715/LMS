@extends('layouts.app')

@section('title', 'Create New Task')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden max-w-2xl mx-auto">
    <!-- Header -->
    <div class="bg-gradient-to-r from-indigo-700 to-indigo-600 px-6 py-4">
        <h1 class="text-2xl font-bold text-white">Create New Task for {{ $subject->name }}</h1>
        <p class="text-indigo-200 mt-1">{{ $subject->subject_code }}</p>
    </div>

    <!-- Form Content -->
    <div class="p-6">
        <form method="POST" action="{{ route('teacher.tasks.store', $subject) }}" class="space-y-6">
            @csrf
            <!-- Task Name -->
            <div>
                <label class="block text-sm font-medium text-gray-500 mb-2" for="name">Task Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full border border-gray-200 p-3 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition">
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Task Description -->
            <div>
                <label class="block text-sm font-medium text-gray-500 mb-2" for="description">Task Description</label>
                <textarea name="description" id="description" rows="4" class="w-full border border-gray-200 p-3 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Points -->
            <div>
                <label class="block text-sm font-medium text-gray-500 mb-2" for="points">Points</label>
                <input type="number" name="points" id="points" value="{{ old('points') }}" class="w-full border border-gray-200 p-3 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition">
                @error('points')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Create Task
                </button>
            </div>
        </form>
    </div>
</div>
@endsection