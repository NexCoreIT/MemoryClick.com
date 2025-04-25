<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index(){

        $data['title'] = "Service List";

        $data['testimonials'] = Testimonial::get();

        return view('backend.admin.testimonial.index',$data);
    }

    public function create(){

        $data['title'] = "Service Create";

        return view('backend.admin.testimonial.create',$data);
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'required|boolean',
    ]);

    $imagePath = null;



    Testimonial::create([
        'rating' =>$request->rating,
        'name' => $request->name,
        'description' => $request->description,
        'status' => $request->status,
    ]);

    return redirect()->route('testimonial.index')->with('success', 'Testimonial created successfully!');
}

    public function edit($id){

        $data['title'] = "Testimonial edit";

        $data['testimonial'] = Testimonial::find($id);

        return view('backend.admin.testimonial.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $service = Testimonial::findOrFail($id);


        $service->update([
        'rating' =>$request->rating,
        'name' => $request->name,
        'description' => $request->description,
        'status' => $request->status,
        ]);

        return redirect()->route('testimonial.index')->with('success', 'Testimonial updated successfully!');
    }
}
