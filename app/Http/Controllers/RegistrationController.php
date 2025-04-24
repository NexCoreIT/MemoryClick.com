<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\PasswordCheckRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
            /**
             * Display a listing of the resource.
             */
            public function index()
            {
                return view('frontend.components.registration.registration');
            }


            public function store(Request $request)
            {
                // Validate request directly
                $validator = Validator::make($request->all(), [
                    'email'    => 'required|email|unique:users,email',
                    'phone'    => 'required|max:15',
                    'name'     => 'required',
                    'password' => 'required|min:6',
                    'image'    => 'nullable|image|max:2048' // Optional image with max size 2MB
                ]);


                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                try {
                    // Process image upload
                    $imageName = null;
                    if ($request->hasFile('image')) {
                        $imageName = date('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();
                        $request->file('image')->storeAs('uploads', $imageName, 'public');
                    }

                    // Create user
                    $user = User::create([
                        "email"    => $request->email,
                        "phone"    => $request->phone,
                        "name"     => $request->name,
                        "password" => bcrypt($request->password),
                        "role"     => 'customer',
                        "image"    => $imageName
                    ]);

                    // Log in the newly registered user
                    Auth::login($user);

                    // Redirect to home after login
                    return redirect()->route('home')->with('success', 'Registration Successful');
                } catch (Exception $e) {
                    return redirect()->back()->with('error', 'Something went wrong. ' . $e->getMessage());
                }
            }


            public function update(Request $request, string $id)
            {

            $userUpdate= User::find($id);


            $imageName = auth()->user()->image;
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('uploads', $imageName, 'public');
            }
            //dd($imageName);
            $userUpdate->update([
                "email"   =>  $request->email,
                "phone"   =>  $request->phone,
                "name"    =>  $request->name,
                "role"    =>  'admin',
                "image"   => $imageName,
            ]);



                return redirect()->back()->withSuccess('Profile Update Success');
            }


}
