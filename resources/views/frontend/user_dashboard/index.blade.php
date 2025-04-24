@php
$removeHero = true;
@endphp
@extends('frontend.layout.app')

@section('content')
<div class="dashboard container mx-auto">
<style>
    nav {
        background-color: #4a60a1;
        transition: all 0.3s ease-in-out;
    }

    nav .sbd-nav-links li a.active {
        background: #233978ad;
    }
    
    nav .sbd-nav-links li a:hover {
        background: #233978ad;
    }
</style>
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="nav-btns p-3">
                <h3 class="text-xl font-semibold mb-4">User Dashboard</h3>
                <ul class="space-y-3" style="display: block;">
                    <li>
                        <a href="{{route('change.profile')}}" class="block text-gray-700 hover:bg-blue-500 hover:text-white rounded-md">Change Profile</a>
                    </li>
                    <li>
                        <a href="{{route('change.web.password')}}" class="block text-gray-700 hover:bg-blue-500 hover:text-white rounded-md">Change Password</a>
                    </li>
                    <li>
                        <a href="{{route('frontend.logout')}}" class="logout block text-gray-700 hover:bg-red-500 hover:text-white rounded-md">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <!-- Content Area -->
            <div class="dash-content p-3 col-span-12 md:col-span-8 bg-white">
                <h2 class="text-2xl font-bold mb-4">Welcome, {{ auth()->user()->name }}</h2>
                <p class="text-gray-600">Manage your profile, change password, and access your account settings here.</p>
            </div>
        </div>
    </div>
</div>

@endsection
