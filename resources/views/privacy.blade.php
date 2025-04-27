@extends('layouts.app')

@section('title', 'Privacy Policy')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-2xl overflow-hidden mt-5">
    <div class="bg-indigo-700 p-8 text-center">
        <h1 class="text-3xl font-bold text-white">Privacy Policy</h1>
    </div>

    <div class="p-5 space-y-2 text-gray-700 leading-relaxed text-base">
        <section>
            <h2 class="text-2xl font-semibold text-indigo-700 mb-2">Purpose of This Application</h2>
            <p>This Learning Management System (LMS) was developed solely for academic purposes as part of the <strong>Advanced Web Programming</strong> course assignment at <strong>ELTE University</strong>. It demonstrates core concepts of web application development including authentication, database management, and user interaction.</p>
        </section>

        <section>
            <h2 class="text-2xl font-semibold text-indigo-700 mb-2">Data Privacy</h2>
            <p>No real personal data is collected, processed, or shared. All user information used within the application exists only for testing and demonstration purposes related to the course assignment.</p>
        </section>

        <section>
            <h2 class="text-2xl font-semibold text-indigo-700 mb-2">Disclaimer</h2>
            <p>This project is not intended for public release or production use. It remains a learning tool created to fulfill academic evaluation criteria.</p>
        </section>
    </div>
</div>
@endsection