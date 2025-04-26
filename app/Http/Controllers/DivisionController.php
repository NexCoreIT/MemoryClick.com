<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index(){
        $data['title']      = 'Divisions List';
        $data['divisions']   = Division::paginate(20);
        return view('backend.admin.division.index',$data);
    }

    public function create(){
        $data['title']      = 'Divisions Create'; 
        return view('backend.admin.division.create',$data);
    }
}
