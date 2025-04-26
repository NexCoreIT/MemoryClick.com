<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $data['title'] = 'Team List';
        $data['teams'] = Team::paginate(20);
        return view('backend.admin.team.index', $data);
    }


    public function create()
    {
        $data['title'] = 'Add New Team';

        return view('backend.admin.team.create', $data);
    }


    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:100',
        'designation' => 'required|string|max:100',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    $data = $request->only(['name', 'designation']);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = 'uploads/team/';
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($imagePath), $imageName);
        $data['image'] = $imagePath . $imageName;
    }

    Team::create($data);

    return redirect()->route('team.index')->with('success', 'Team member added successfully!');
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['title'] = 'Edit Team';

        $data['team'] = Team::find($id);

        return view('backend.admin.team.edit', $data);
    }


    public function update(Request $request, $id)
{
    $team = Team::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:100',
        'designation' => 'required|string|max:100',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    $data = $request->only(['name', 'designation']);

    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($team->image && file_exists(public_path($team->image))) {
            unlink(public_path($team->image));
        }

        $image = $request->file('image');
        $imagePath = 'uploads/team/';
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($imagePath), $imageName);
        $data['image'] = $imagePath . $imageName;
    }

    $team->update($data);

    return redirect()->route('team.index')->with('success', 'Team member updated successfully!');
}

public function delete($id)
    {
        $category = Team::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'Team deleted successfully.');
    }
}
