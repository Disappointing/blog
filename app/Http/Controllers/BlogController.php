<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Auth;

class BlogController extends Controller
{
    //


    public function index()
    {
        return view('blogs.index');
    }

    public function create($id)
    {
        return view('blogs.create',compact('id'));
    }

    public function store(Request $request,Blog $blog)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $blog->fill($data);
        $blog->save();

        return redirect()->route('categories.show',$data['category_id']);
    }
}
