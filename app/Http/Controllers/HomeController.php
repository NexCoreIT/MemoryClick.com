<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\properties;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['total_properties'] = properties::count();
        $data['total_service'] = Product::count();
        $data['total_categories'] = Category::count();
        $data['total_users'] = User::count();
        $data['row'] = Product::where('status', '1')->get();
        return view('backend.admin.dashboard.index',$data);
    }


}
