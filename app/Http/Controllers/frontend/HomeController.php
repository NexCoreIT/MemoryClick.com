<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\CustomPage;
use App\Models\properties;
use Illuminate\Http\Request;
use App\Rules\PasswordCheckRule;
use App\Http\Controllers\Controller;
use App\Models\Cinematography;
use App\Models\OurService;
use App\Models\Photography;
use App\Models\RecentWork;
use App\Models\Testimonial;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Memoryclick - Home';
        $data['testimonials'] = Testimonial::where('status','1')->orderByDesc('id')->get();
        $data['service'] = OurService::where('status', '1')->orderBy('id', 'DESC')->get();
        $data['recent_work'] = RecentWork::where('status', '1')->latest()->take(8)->get();
        $data['cinematography'] = Cinematography::where('status', '1-us')->get();

        return view('frontend.pages.home', $data);
    }


    public function photography()
    {
        $data['category'] = Category::where('status', '1')->get();
        $data['row'] = Photography::where('status', '1')->get(); // added category for optimization
        return view('frontend.photography.index', $data);
    }



    public function cinematography()
    {

        $data['title'] = 'Cinematography';

        return view('frontend.cinematography.index', $data);
    }


    public function contactUs()
    {
        $data['title'] = 'Contact';

        return view('frontend.contact.index', $data);
    }


    public function about()
    {
        $data['about'] = CustomPage::where('slug', 'about-us')->find(1);

        return view('frontend.about.index', $data);
    }


    public function changeProfile()
    {

        return view('frontend.user_dashboard.change-profile');
    }

    public function changePassword()
    {

        return view('frontend.user_dashboard.change-password');
    }


    public function update(Request $request, string $id)
    { {

            $rules = [
                'old_password' => ['required', new PasswordCheckRule], // Check password
                'new_password' => 'required|min:6',
                'confirm_password' => 'required|same:new_password',
            ];

            // Define custom error messages
            $messages = [
                'old_password.required' => 'Old password is required.',
                'new_password.required' => 'New password is required.',
                'new_password.min' => 'New password must be at least 6 characters.',
                'confirm_password.required' => 'Confirm password is required.',
                'confirm_password.same' => 'The new password and confirm password must match.',
            ];

            // Perform the validation
            $validatedData = $request->validate($rules, $messages);

            $userUpdate = User::find($id);


            $userUpdate->update([

                "password" => bcrypt($request->password),


            ]);

            // Update password if a new one is provided
            if ($request->filled('new_password')) {
                $userUpdate->update([
                    'password' => bcrypt($validatedData['new_password']),
                ]);
            }
            return redirect()->back()->withSuccess('Password Update Success');
        }
    }

    public function customerUpdate(Request $request, string $id)
    {

        $userUpdate = User::find($id);


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
            "role"    =>  'customer',
            "image"   => $imageName,
        ]);



        return redirect()->back()->withSuccess('Profile Update Success');
    }



}
