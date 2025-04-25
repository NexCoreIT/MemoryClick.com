<?php

namespace App\Http\Controllers;

use App\Models\RecentWork;
use Illuminate\Http\Request;

class RecentWorkController extends Controller
{
    public function index(){

        $data['title'] = "Recent Work List";

        $data['recentWorks'] = RecentWork::get();

        return view('backend.admin.recent_work.index',$data);
    }

    public function create(){

        $data['title'] = "Recent Work Create";

        return view('backend.admin.recent_work.create',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'package_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'social_media_name' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        $mainImagePath = null;
        $additionalImages = [];

        // Handle main image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $uploadPath = public_path('uploads/recent-work');

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $image->move($uploadPath, $imageName);
            $mainImagePath = 'uploads/recent-work/' . $imageName;
        }

        // Handle additional images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $imgName = time() . '_' . uniqid() . '_' . $img->getClientOriginalName();
                $img->move($uploadPath, $imgName);
                $additionalImages[] = 'uploads/recent-work/' . $imgName;
            }
        }

        RecentWork::create([
            'image' => $mainImagePath,
            'images' => json_encode($additionalImages),
            'package_name' => $request->package_name,
            'name' => $request->name,
            'social_media_name' => $request->social_media_name,
            'status' => $request->status,
        ]);

        return redirect()->route('recent-work.index')->with('success', 'Recent Work created successfully!');
    }

    public function edit($id){

        $data['title'] = "Recent Work edit";

        $data['recentWork'] = RecentWork::find($id);

        return view('backend.admin.recent_work.edit',$data);
    }

    public function update(Request $request, $id)
{
    $recentWork = RecentWork::findOrFail($id);

    $request->validate([
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'package_name' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'social_media_name' => 'nullable|string|max:255',
        'status' => 'required|boolean',
    ]);

    $uploadPath = public_path('uploads/recent-work');

    // Update main image if uploaded
    if ($request->hasFile('image')) {
        // Delete old image
        if ($recentWork->image && file_exists(public_path($recentWork->image))) {
            unlink(public_path($recentWork->image));
        }

        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move($uploadPath, $imageName);
        $recentWork->image = 'uploads/recent-work/' . $imageName;
    }

    // Update additional images if uploaded
    if ($request->hasFile('images')) {
        // Delete old additional images
        if ($recentWork->images) {
            foreach (json_decode($recentWork->images, true) as $oldImage) {
                if (file_exists(public_path($oldImage))) {
                    unlink(public_path($oldImage));
                }
            }
        }

        $newImages = [];
        foreach ($request->file('images') as $img) {
            $imgName = time() . '_' . uniqid() . '_' . $img->getClientOriginalName();
            $img->move($uploadPath, $imgName);
            $newImages[] = 'uploads/recent-work/' . $imgName;
        }
        $recentWork->images = json_encode($newImages);
    }

    // Update other fields
    $recentWork->package_name = $request->package_name;
    $recentWork->name = $request->name;
    $recentWork->social_media_name = $request->social_media_name;
    $recentWork->status = $request->status;
    $recentWork->save();

    return redirect()->route('recent-work.index')->with('success', 'Recent Work updated successfully!');
}

}
