@php
$removeHero = true;
@endphp

@extends('frontend.layout.app')

<style>
    nav {
        background-color: #4a60a1 !important;
        transition: all 0.3s ease-in-out;
    }

    nav .sbd-nav-links li a.active {
        background: #233978ad !important;
    }
    
    nav .sbd-nav-links li a:hover {
        background: #233978ad !important;
    }
</style>
<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>

@section('content')
<br><br><br><br>
<div class="container mx-auto py-12 px-4">
    <div class="flex flex-col md:flex-row max-w-5xl mx-auto shadow-lg rounded-lg overflow-hidden bg-white">
        <!-- Left Section -->
        <div class="w-full md:w-2/5 bg-white p-8">
            <h2 class="text-2xl font-semibold mb-4">Did not find something in our menu or looking for a custom job?</h2>
            <p class="text-gray-600 mb-6">No worries, we have got it covered. Just submit by filling the form and our team will get back to you soon.</p>

            <div class="space-y-4 mb-6">
                <div class="flex items-center gap-3">
                    <span class="text-lg">📝</span>
                    <span class="text-gray-800">Fill the form</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-lg">📤</span>
                    <span class="text-gray-800">Upload the images</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-lg">💬</span>
                    <span class="text-gray-800">Get the quote</span>
                </div>
            </div>


            <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-md text-sm font-medium">
                MORE ABOUT OUR SERVICES →
            </button>
        </div>

        <!-- Right Section -->
        <div class="w-full md:w-3/5 bg-gray-100 p-8 border-t md:border-t-0 md:border-l border-gray-300">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name*</label>
                <input type="text" id="name" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="For example: John Wick">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email*</label>
                <input type="email" id="email" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="For example: JohnWick@gmail.com">
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone number*</label>
                <input type="tel" id="phone" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="For example: +12345879">
            </div>

            <div class="mb-4">
                <label for="services" class="block text-sm font-medium text-gray-700 mb-1">Choose the service for quotation</label>
                <select id="services" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Select services</option>
                    <option>Service 1</option>
                    <option>Service 2</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Write your message here...</label>
                <textarea id="message" class="w-full border border-gray-300 rounded-md px-4 py-2 h-24 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Write your message here..."></textarea>
            </div>

            <div class="flex justify-between items-center mb-6">
                <label class="inline-flex items-center gap-2 cursor-pointer bg-gray-100 px-3 py-2 border border-gray-300 rounded-md text-sm text-gray-700">
                    <img src="https://via.placeholder.com/16" alt="Upload Icon">
                    Upload photo
                    <input type="file" hidden>
                </label>
                <button class="text-sm text-gray-600 border border-gray-300 px-4 py-2 rounded-md bg-white hover:bg-gray-50">Share a link</button>
            </div>

            <div class="text-right">
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-medium">SUBMIT →</button>
            </div>
        </div>
    </div>
</div>

@endsection
