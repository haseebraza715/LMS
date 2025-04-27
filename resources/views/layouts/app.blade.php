<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'LMS')</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">
  <!-- Header / Navigation Section -->
  <header class="bg-indigo-600 text-white shadow-lg">
    <nav class="container mx-auto flex justify-between items-center p-4" aria-label="Main Navigation">
      <a href="{{ url('/') }}" class="font-bold text-xl tracking-tight">
        <span class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
          </svg>
          LMS
        </span>
      </a>
      
      <div class="flex items-center space-x-6">
        @auth
          <div class="hidden md:flex items-center space-x-4">
            <span class="text-indigo-100">Welcome, {{ auth()->user()->name }}!</span>
            <div class="h-4 border-r border-indigo-300"></div>
          </div>
          
          <div class="flex items-center space-x-4">
            <a href="{{ route('dashboard') }}" class="text-white hover:text-indigo-200 transition">
              <span class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
                Dashboard
              </span>
            </a>
            
            @if(auth()->user()->is_teacher)
              <a href="{{ route('teacher.subjects.index') }}" class="text-white hover:text-indigo-200 transition">
                <span class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                  </svg>
                  My Subjects
                </span>
              </a>
            @else
              <a href="{{ route('student.subjects.index') }}" class="text-white hover:text-indigo-200 transition">
                <span class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                  </svg>
                  My Subjects
                </span>
              </a>
              <a href="{{ route('student.subjects.take') }}" class="text-white hover:text-indigo-200 transition">
                <span class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                  </svg>
                  Take Subject
                </span>
              </a>
            @endif
          </div>
          
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 text-white font-medium px-4 py-2 rounded-lg shadow-md hover:shadow-lg transition duration-150 focus:outline-none focus:ring-2 focus:ring-indigo-400">
              <span class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                </svg>
                Logout
              </span>
            </button>
          </form>
        @else
          <a href="{{ route('login') }}" class="text-white hover:text-indigo-200 font-medium transition">Login</a>
          <a href="{{ route('register') }}" class="bg-white text-indigo-600 hover:bg-indigo-100 font-medium px-4 py-2 rounded-lg shadow-sm transition">Register</a>
          <a href="{{ route('about') }}" class="text-indigo-600 hover:text-indigo-800 transition">About</a>
          @endauth
      </div>
    </nav>
  </header>

  <!-- Main Content Area -->
  <main class="container mx-auto mt-8 px-4 flex-grow mb-16">
    @if(session('success'))
      <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md shadow-sm mb-6" role="alert">
        <div class="flex">
          <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
          </div>
          <div class="ml-3">
            <p>{{ session('success') }}</p>
          </div>
        </div>
      </div>
    @endif
    @yield('content')
  </main>

  <!-- Footer Section -->
  <footer class="bg-indigo-800 text-white py-6 mt-auto">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row justify-between items-center">
        <div class="mb-4 md:mb-0">
          <p class="text-indigo-200">&copy; {{ date('Y') }} LMS. All rights reserved.</p>
        </div>
        <div class="flex space-x-4">
          <a href="/about" class="text-indigo-200 hover:text-white transition">About</a>
          <a href="/privacy" class="text-indigo-200 hover:text-white transition">Privacy</a>
          <a href="/contact" class="text-indigo-200 hover:text-white transition">Contact</a>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>