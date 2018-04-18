<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Reply;
use App\Handlers\ImageUploadHandler;
use Auth;

class BlogController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show','reply_store']]);
    }


    public function index()
    {
        return view('blogs.index');
    }
    public function create($id,Blog $blog)
    {
        return view('blogs.create',compact('id','blog'));
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
        $blogs=$blog->Category->blogs()->select('title','id')->orderBy('created_at', 'asc')->paginate(30);
        $replies=$blog->replies()->where('pid','=',0)->orderBy('created_at', 'desc')->paginate(10);
        return view('blogs.show',compact('blog','blogs','replies'));
    }

    public function edit(Blog $blog)
    {

        return view('blogs.create',compact('blog'));
    }

    public function update(Request $request,Blog $blog)
    {
        $blog->update($request->all());
        return redirect()->route('blogs.show',$blog->id);
    }

    public function delete(Blog $blog)
    {
        $category_id=$blog->category_id;
        $blog->delete();
        return redirect()->route('categories.show',$category_id);
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

    public function reply_store(Request $request, Reply $reply)
    {
        $this->validate($request,[
            'content' => 'required|min:3|max:300',
            'email' => 'required|email',
        ]);
        $data = $request->all();
        $reply->fill($data);
        $reply->save();

        return redirect()->route('blogs.show',$data['blog_id']);

    }

    public function reply_delete(Reply $reply)
    {
        $id=$reply->blog_id;
        $reply->delete();
        return redirect('/blogs/'.$id.'#replyList');
    }
}
