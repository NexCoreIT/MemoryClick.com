<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PackageCategory;

class PackageCategoryController extends Controller
{
    public function index()
    {
        $data['title']          = 'Category List';
        $data['categories']     = PackageCategory::paginate(20);
        return view('backend.admin.package_category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Add New Category';
        return view('backend.admin.package_category.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate input
        $request->validate([
            'name' => 'required|string|max:255|unique:package_categories,name',
            'status' => 'boolean',
        ]);

        // Create new category
        $row = new PackageCategory();
        $row->name = $request->name;
        $row->slug = Str::slug($request->name);
        $row->status = $request->status;
        $row->save();

        return redirect()->route('package.category.index')->with('success', 'Category created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $data['category'] = PackageCategory::where('slug', $slug)->firstOrFail();

        return view('backend.admin.package_category.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $data['title'] = 'Edit Service Type';

        $data['category'] = PackageCategory::where('slug', $slug)->firstOrFail();

        return view('backend.admin.package_category.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255|unique:package_categories,name,' . $id,
            'status' => 'boolean',
        ]);

        try {
            // Find existing category
            $row = PackageCategory::findOrFail($id);

            // Update category fields
            $row->name = $request->name;
            $row->slug = Str::slug($request->name);
            $row->status = $request->status;
            $row->save();

            return redirect()->route('package.category.index')->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
      $category = PackageCategory::find($id);
      $category->delete();
      return redirect()->back()->with('success', 'Category deleted successfully.');
    }
}
