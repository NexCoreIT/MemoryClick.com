<?php

namespace App\Http\Controllers;

use App\Models\OurService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OurServiceController extends Controller
{
    public function index(){

        $data['title'] = "Service List";

        $data['services'] = OurService::get();

        return view('backend.admin.our_service.index',$data);
    }

    public function create(){

        $data['title'] = "Service Create";

        return view('backend.admin.our_service.create',$data);
    }

    public function store(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'required|boolean',
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName(); // to avoid duplicate names
        $uploadPath = public_path('uploads/services');

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        $image->move($uploadPath, $imageName);
        $imagePath = 'uploads/services/' . $imageName;
    }

    OurService::create([
        'image' => $imagePath,
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'description' => $request->description,
        'status' => $request->status,
    ]);

    return redirect()->route('service.index')->with('success', 'Service created successfully!');
}

    public function edit($id){

        $data['title'] = "Service edit";

        $data['service'] = OurService::find($id);

        return view('backend.admin.our_service.edit',$data);
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'required|boolean',
    ]);

    $service = OurService::findOrFail($id);
    $imagePath = $service->image; // retain old image if not replaced

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $uploadPath = public_path('uploads/services');

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        // Optionally delete old image if needed
        if ($service->image && file_exists(public_path($service->image))) {
            unlink(public_path($service->image));
        }

        $image->move($uploadPath, $imageName);
        $imagePath = 'uploads/services/' . $imageName;
    }

    $service->update([
        'image' => $imagePath,
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'description' => $request->description,
        'status' => $request->status,
    ]);

    return redirect()->route('service.index')->with('success', 'Service updated successfully!');
}


public function delete($id)
    {
        try {
            $service = OurService::findOrFail($id);
            $service->delete();

            return redirect()->back()->with('success', 'Service deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Service.');
        }
    }

}
