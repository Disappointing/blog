<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index()
    {
        return view('blogs.index');
    }

    public function create()
    {
        return view('blogs.create');
    }
}
