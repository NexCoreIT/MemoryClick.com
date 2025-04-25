<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "Contact Us List";
        $data['contacts'] = Contact::paginate(20);
       return view('backend.admin.contact.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show($id)
    {
        $data['title'] = "Contact Us Show";
        $data['contact'] = Contact::find($id);
       return view('backend.admin.contact.show',$data);
    }




}
