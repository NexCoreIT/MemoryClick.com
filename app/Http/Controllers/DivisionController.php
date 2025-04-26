<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DivisionController extends Controller
{
    public function index()
    {
        $data['title']      = 'Divisions List';
        $data['divisions']   = Division::latest()->paginate(20);
        return view('backend.admin.division.index', $data);
    }

    public function create()
    {
        $data['title']      = 'Divisions Create';
        return view('backend.admin.division.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'name'  => 'required|unique:divisions,name',
        ]);


        $data = new Division();
        $data->name = $request->name;
        $data->slug = Str::slug($request->name);
        $data->status = $request->status;
        if ($request->hasFile('image')) {
            $image          = $request->file('image');
            $imageName      = $image->getClientOriginalName(); // keep original name
            $uploadPath     = public_path('uploads');
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $image->move($uploadPath, $imageName);
            $imagePath = 'uploads/' . $imageName;
            $data->image = $imagePath;
        }
        $data->save();
        return redirect()->route('division.index')->with('success', 'Division created successfully!');
    }

    public function edit($id)
    {
        $data['title']      = 'Divisions Edit';
        $data['division'] = Division::findOrFail($id);
        return view('backend.admin.division.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,gif,webp|max:2048',
            'name'  => 'required|unique:divisions,name,' . $id,
        ]);


        try {
            $data = Division::findOrFail($id);
            $data->name = $request->name;
            $data->slug = Str::slug($request->name);
            $data->status = $request->status;
            if ($request->hasFile('image')) {
                if ($data->image) {
                    $image_path = public_path($data->image);
                    if (file_exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                $image          = $request->file('image');
                $imageName      = $image->getClientOriginalName();
                $uploadPath     = public_path('uploads');
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }
                $image->move($uploadPath, $imageName);
                $imagePath = 'uploads/' . $imageName;
                $data->image = $imagePath;
            }
            $data->save();
            return redirect()->route('division.index')->with('success', 'Division updated successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong! Please try again.');
        }
    }


    public function delete($id)
    {
        try {
            $data = Division::findOrFail($id);

            if ($data->image) {
                $image_path = public_path($data->image);
                if (file_exists($image_path)) {
                    File::delete($image_path);
                }
            }

            $data->delete();

            return redirect()->back()->with('success', 'Division deleted successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong! Please try again.');
        }
    }
}
