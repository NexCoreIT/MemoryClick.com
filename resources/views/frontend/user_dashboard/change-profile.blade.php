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
                        <a href="#"
                           style="display: block; color: #333; background-color: #fff; padding: 10px 15px; border-radius: 6px; text-decoration: none; transition: 0.3s;"
                           onmouseover="this.style.backgroundColor='#333'; this.style.color='white';"
                           onmouseout="this.style.backgroundColor='white'; this.style.color='#333';">
                           Change Profile
                        </a>
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
            <div class="dash-content p-4 bg-white rounded shadow-sm"
            style="border-radius: 10px; padding: 25px; background: #fff; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">

           <h2 class="text-2xl font-bold mb-4"
               style="font-size: 22px; font-weight: bold; color: #333;">Hello, {{ auth()->user()->name }}</h2>

               <form action="{{route('change.web.customerUpdate',auth()->user()->id)}}" method="POST" style="max-width: 500px; margin: auto; display: flex; flex-direction: column;">
                @csrf

                <div class="mb-3" style="display: flex; flex-direction: column; margin-bottom: 15px;">
                    <label class="form-label fw-bold"
                           style="font-weight: 600; font-size: 14px; color: #555; margin-bottom: 6px;">Name</label>
                    <input type="text" name="name" class="form-control"
                           placeholder="name" value="{{auth()->user()->name}}"
                           style="border-radius: 6px; padding: 10px; border: 1px solid #ccc;">
                    @error('name')
                        <p class="text-danger mt-1" style="color: red; font-size: 13px; margin-top: 5px;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3" style="display: flex; flex-direction: column; margin-bottom: 15px;">
                    <label class="form-label fw-bold"
                           style="font-weight: 600; font-size: 14px; color: #555; margin-bottom: 6px;">Email</label>
                    <input type="email" name="email" class="form-control"
                           placeholder="Enter email" value="{{auth()->user()->email}}"
                           style="border-radius: 6px; padding: 10px; border: 1px solid #ccc;">
                    @error('email')
                        <p class="text-danger mt-1" style="color: red; font-size: 13px; margin-top: 5px;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3" style="display: flex; flex-direction: column; margin-bottom: 15px;">
                    <label class="form-label fw-bold"
                           style="font-weight: 600; font-size: 14px; color: #555; margin-bottom: 6px;">Mobile</label>
                    <input type="tel" name="phone" class="form-control"
                           placeholder="Enter Phone" value="{{auth()->user()->phone}}"
                           style="border-radius: 6px; padding: 10px; border: 1px solid #ccc;">
                    @error('phone')
                        <p class="text-danger mt-1" style="color: red; font-size: 13px; margin-top: 5px;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="text-end mt-4">
                    <a href="#" class="btn btn-secondary me-2"
                       style="background: #6c757d; color: white; padding: 10px 16px; border-radius: 6px; text-decoration: none;">Cancel</a>
                    <button type="submit" class="btn btn-primary"
                            style="background: #007bff; color: white; padding: 10px 16px; border-radius: 6px; border: none; cursor: pointer;">
                        Update Profile
                    </button>
                </div>
            </form>

       </div>

    </div>
</div>

@endsection
