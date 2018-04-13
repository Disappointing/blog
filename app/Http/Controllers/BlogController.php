<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Handlers\ImageUploadHandler;
use Auth;

class BlogController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


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
        $this->validate($request,[
            'title' => 'required|max:50',
            'body' => 'required|min:3'
        ],[
            'body.required' => '内容不能为空',
            'body.min' => '写几个字也敢来发博客？？？',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();
        $blog->fill($data);
        $blog->save();

        return redirect()->route('categories.show',$data['category_id']);
    }

    public function show(Blog $blog)
    {
        $blogs=$blog->Category->blogs()->orderBy('created_at', 'desc')->paginate(30);;
        return view('blogs.show',compact('blog','blogs'));
    }

    public function uploadImg(Request $request,ImageUploadHandler $uploader)
    {
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'file_path' => ''
        ];

        if ($file = $request->upload_file)
        {
            $result=$uploader->save($request->upload_file,'blogs','1024');

            if ($result)
            {
                $data['success'] = true;
                $data['msg'] = '上传成功!';
                $data['file_path'] = $result['path'];
            }

        }

        return $data;
    }
}
