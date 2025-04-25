<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Package;

class PackageController extends Controller
{
    public function index(){
        $data['title']      = 'Packages List';
        $data['packages']   = Package::paginate(20);
        return view('backend.admin.package.index',$data);
    }

    public function create(){
        $data['title']      = 'Packages List';
        $data['packages']   = Package::paginate(20);
        return view('backend.admin.package.index',$data);
    }

}

