@php
$removeHero = true;
@endphp
@extends('frontend.layout.app')

<style>
    header {
        background-color: #ffffff !important;
        box-shadow: rgba(33, 35, 38, 0.1) 0px 10px 10px -10px;
    }
    header .menu li a {
        color: rgb(6, 48, 83) !important;
        transition: 0.4s all ease-in-out;
    }
</style>

@section('content')
<div class="dashboard container mx-auto">
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="nav-btns p-3">
                <h3 class="text-xl font-semibold mb-4">User Dashboard</h3>
                <ul class="space-y-3" style="display: block;">
                    <li>
                        <a href="{{route('change.profile')}}" class="block text-gray-700 hover:bg-blue-500 hover:text-white rounded-md">Change Profile</a>
                    </li>
                    <li>
                        <a
                           style="display: block; color: #333; background-color: #fff; padding: 10px 15px; border-radius: 6px; text-decoration: none; transition: 0.3s;"
                           onmouseover="this.style.backgroundColor='#007bff'; this.style.color='white';"
                           onmouseout="this.style.backgroundColor='white'; this.style.color='#333';">
                           Change Password
                        </a>
                    </li>

                    <li>
                        <a href="{{route('frontend.logout')}}" class="logout block text-gray-700 hover:bg-red-500 hover:text-white rounded-md">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <!-- Content Area -->
            <div class="dash-content p-4 bg-white rounded shadow-sm"
            style="border-radius: 10px; padding: 25px; background: #fff; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">

           <h2 class="text-2xl font-bold mb-4"
               style="font-size: 22px; font-weight: bold; color: #333;">Hello, {{ auth()->user()->name }}</h2>

               <form action="{{route('update.user.password',auth()->user()->id)}}" method="POST" style="max-width: 500px; margin: auto; display: flex; flex-direction: column;">
                @csrf

                <div class="mb-3" style="display: flex; flex-direction: column; margin-bottom: 15px;">
                    <label class="form-label fw-bold"
                           style="font-weight: 600; font-size: 14px; color: #555; margin-bottom: 6px;">Old Password</label>
                    <input type="password" name="old_password" class="form-control"
                           placeholder="Enter Old Password" value="{{ old('old_password') }}"
                           style="border-radius: 6px; padding: 10px; border: 1px solid #ccc;">
                    @error('old_password')
                        <p class="text-danger mt-1" style="color: red; font-size: 13px; margin-top: 5px;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3" style="display: flex; flex-direction: column; margin-bottom: 15px;">
                    <label class="form-label fw-bold"
                           style="font-weight: 600; font-size: 14px; color: #555; margin-bottom: 6px;">New Password</label>
                    <input type="password" name="new_password" class="form-control"
                           placeholder="Enter New Password" value="{{ old('new_password') }}"
                           style="border-radius: 6px; padding: 10px; border: 1px solid #ccc;">
                    @error('new_password')
                        <p class="text-danger mt-1" style="color: red; font-size: 13px; margin-top: 5px;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3" style="display: flex; flex-direction: column; margin-bottom: 15px;">
                    <label class="form-label fw-bold"
                           style="font-weight: 600; font-size: 14px; color: #555; margin-bottom: 6px;">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control"
                           placeholder="Confirm New Password" value="{{ old('confirm_password') }}"
                           style="border-radius: 6px; padding: 10px; border: 1px solid #ccc;">
                    @error('confirm_password')
                        <p class="text-danger mt-1" style="color: red; font-size: 13px; margin-top: 5px;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="text-end mt-4">
                    <a href="#" class="btn btn-secondary me-2"
                       style="background: #6c757d; color: white; padding: 10px 16px; border-radius: 6px; text-decoration: none;">Cancel</a>
                    <button type="submit" class="btn btn-primary"
                            style="background: #007bff; color: white; padding: 10px 16px; border-radius: 6px; border: none; cursor: pointer;">
                        Update Password
                    </button>
                </div>
            </form>

       </div>
    </div>
</div>

@endsection
