<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use App\Handlers\ImageUploadHandler;


class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


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
            'backimg' => 'nullable|mimes:jpeg,bmp,png,gif|dimensions:min_width=200,min_height=200',
        ], ['backimg.dimensions' => '图片最小宽高为200',
            'backimg.mimes'  => '图片只支持jpeg,bmp,png,gif']);

        $data = $request->all();
        if ($request->backimg)
        {
            $result = $uploader->save($request->backimg, 'backimg',400);
            $data['backimg'] = $result['path'];
        }
        $category->fill($data);
        $category->save();
        return redirect()->route('home');
    }

    public function messages()
    {

    }

    public function show(Category $category)
    {
        $blogs = $category->blogs()->orderBy('created_at', 'desc')->paginate(30);
        return view('categories.show',compact('category','blogs'));
    }
}
