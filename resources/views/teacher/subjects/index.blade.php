@extends('layouts.app')

@section('title', 'My Subjects')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <!-- Header -->
    <div class="bg-gradient-to-r from-indigo-700 to-indigo-600 px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-white">My Subjects</h1>
        <a href="{{ route('teacher.subjects.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-800 hover:bg-indigo-900 text-white rounded-lg font-medium transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Create New Subject
        </a>
    </div>

    <!-- Content -->
    <div class="p-6">
        @if($subjects->count())
            <div class="overflow-x-auto">
                <table class="min-w-full bg-gray-50 rounded-lg border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-800">Name</th>
                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-800">Subject Code</th>
                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-800">Credit Value</th>
                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-800">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subjects as $subject)
                            <tr class="border-t border-gray-200 hover:bg-gray-100 transition">
                                <td class="py-3 px-4 text-gray-800">{{ $subject->name }}</td>
                                <td class="py-3 px-4 text-gray-800">{{ $subject->subject_code }}</td>
                                <td class="py-3 px-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        {{ $subject->credit_value }} Credits
                                    </span>
                                </td>
                                <td class="py-3 px-4 flex space-x-2">
                                    <a href="{{ route('teacher.subjects.show', $subject) }}" class="text-indigo-600 hover:text-indigo-800 font-medium">View</a>
                                    <a href="{{ route('teacher.subjects.edit', $subject) }}" class="text-yellow-600 hover:text-yellow-800 font-medium">Edit</a>
                                    <form method="POST" action="{{ route('teacher.subjects.destroy', $subject) }}" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this subject?')" class="text-red-600 hover:text-red-800 font-medium">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-6">
                {{ $subjects->links('pagination::tailwind') }}
            </div>
        @else
            <div class="text-center py-8 bg-gray-50 rounded-lg border border-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <p class="text-gray-500 mb-4">No subjects found.</p>
                <a href="{{ route('teacher.subjects.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition">
                    Create Your First Subject
                </a>
            </div>
        @endif
    </div>
</div>
@endsection