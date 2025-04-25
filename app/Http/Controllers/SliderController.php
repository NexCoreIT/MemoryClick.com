<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(){

        $data['title'] = "Slider List";

        $data['sliders'] = Slider::paginate(20);

        return view('backend.admin.slider.index',$data);
    }

    public function create(){

        $data['title'] = "Slider Create";

        return view('backend.admin.slider.create',$data);
    }

    public function store(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'sort_number' => 'required|numeric',
        'status' => 'required|boolean',
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName(); // keep original name
        $uploadPath = public_path('uploads/slider');

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true); // use PHP mkdir instead of File facade
        }

        $image->move($uploadPath, $imageName);
        $imagePath = 'uploads/slider/' . $imageName;
    }

    Slider::create([
        'image' => $imagePath,
        'sort_number' => $request->sort_number,
        'status' => $request->status,
    ]);

    return redirect()->route('slider.index')->with('success', 'Slider created successfully!');
}

    public function edit($id){

        $data['title'] = "Slider Edit";

        $data['slider'] = Slider::find($id);

        return view('backend.admin.slider.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'sort_number' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($slider->image && file_exists(public_path($slider->image))) {
                unlink(public_path($slider->image));
            }

            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $uploadPath = public_path('uploads/slider');

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $image->move($uploadPath, $imageName);
            $slider->image = 'uploads/slider/' . $imageName;
        }

        $slider->sort_number = $request->sort_number;
        $slider->status = $request->status;
        $slider->save();

        return redirect()->route('slider.index')->with('success', 'Slider updated successfully!');
    }

    public function delete($id)
    {
        try {
            $service = Slider::findOrFail($id);
            $service->delete();

            return redirect()->back()->with('success', 'Slider deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Slider.');
        }
    }

}
