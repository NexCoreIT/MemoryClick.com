<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cinematography;
use App\Models\Photography;
use App\Models\properties;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['total_photography'] = Photography::count();
        $data['total_cinematography'] = Cinematography::count();
        $data['total_categories'] = Category::count();
        $data['total_users'] = User::count();
        $data['row'] = Photography::where('status', '1')->latest()->take(20)->get();
        return view('backend.admin.dashboard.index',$data);
    }


}
