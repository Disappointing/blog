<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Handlers\ImageUploadHandler;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories=Category::all();
        return view('categories.index',compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request,Category $category,ImageUploadHandler $uploader)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'description' => 'required|max:255',
        ]);

        $data = $request->all();
        if ($request->backimg)
        {
            $result = $uploader->save($request->backimg, 'backimg');
            $data['backimg'] = $result['path'];
        }
        $category->fill($data);
        $category->save();
        return redirect()->route('home');
    }
}
