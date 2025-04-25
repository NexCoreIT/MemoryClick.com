<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Cinematography;

class CinematographyController extends Controller
{
    public function index(){

        $data['title'] = "Cinematography List";

        $data['cinematographies'] = Cinematography::paginate(20);

        return view('backend.admin.cinematography.index',$data);
    }

    public function create(){

        $data['title'] = "Cinematography Create";

        return view('backend.admin.cinematography.create',$data);
    }

  // Store
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'youtube_url' => 'required|url',
        'status' => 'required|boolean',
        'credit'=>'required'
    ]);

    Cinematography::create([
        'title' => $request->title,
        'youtube_url' => $request->youtube_url,
        'status' => $request->status,
        'credit' => $request->credit,
        'slug' => Str::slug($request->title),
    ]);

    return redirect()->route('cinematographies.index')->with('success', 'Cinematography created successfully!');
}

// Update
public function update(Request $request, $id)
{
    $cinematography = Cinematography::findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'youtube_url' => 'required|url',
        'status' => 'required|boolean',
        'credit'=>'required'
    ]);

    $cinematography->update([
        'title' => $request->title,
        'youtube_url' => $request->youtube_url,
        'status' => $request->status,
        'slug' => Str::slug($request->title),
        'credit' => $request->credit,
    ]);

    return redirect()->route('cinematographies.index')->with('success', 'Cinematography updated successfully!');
}


    public function edit($id){

        $data['title'] = "Photography edit";

        $data['cinematography'] = Cinematography::find($id);


        return view('backend.admin.cinematography.edit',$data);
    }




public function delete($id)
    {
        try {
            $service = Cinematography::findOrFail($id);
            $service->delete();

            return redirect()->back()->with('success', 'Photography deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Photography.');
        }
    }
}
