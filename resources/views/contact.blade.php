@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
    <div class="bg-indigo-700 p-6">
        <h1 class="text-3xl font-bold text-white">Contact Information</h1>
        <p class="text-indigo-100 mt-2">Feel free to reach out with any questions</p>
    </div>
    
    <div class="p-6">
        <div class="flex items-center mb-4 pb-4 border-b border-gray-200">
            <div class="bg-indigo-100 p-3 rounded-full mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Author</p>
                <p class="text-lg font-medium text-gray-800">Haseeb Raza</p>
            </div>
        </div>
        
        <div class="flex items-center mb-4 pb-4 border-b border-gray-200">
            <div class="bg-indigo-100 p-3 rounded-full mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Neptun Code</p>
                <p class="text-lg font-medium text-gray-800">OT7DEE</p>
            </div>
        </div>
        
        <div class="flex items-center">
            <div class="bg-indigo-100 p-3 rounded-full mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Email</p>
                <a href="mailto:[Your Email Address]" class="text-lg font-medium text-indigo-600 hover:text-indigo-800 transition">haseeb.javed715@gmail.com</a>
            </div>
        </div>
        
        <div class="mt-8 pt-4 border-t border-gray-200">
            <p class="text-gray-600 text-center">This application was created as part of the Laravel LMS project.</p>
        </div>
    </div>
</div>
@endsection