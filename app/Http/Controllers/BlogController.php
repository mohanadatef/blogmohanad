<?php

namespace App\Http\Controllers;

use App\Blog;
use App\CommentBlog;
use App\Http\Requests\Blog\BlogCreateRequest;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function create()
    {
        return view('blog.create');
    }

    public function store(BlogCreateRequest $request)
    {
        $datas = new Blog();
        $datas->title = $request->title;
        $datas->description = $request->description;
        $imageName = $request->photos->getClientOriginalname().'-'.time() .'.'.$request->photos->getClientOriginalExtension();
        $request->photos->move(public_path('images'), $imageName);
        $datas->photos = $imageName;
        $datas->like = 0;
        $datas->hashtag = $request->hashtag;
        $datas->save();
        return redirect('');
    }

    public function delete($id)
    {
         $data = Blog::find($id);
         $data->delete();
        return view('');
    }
public function like(Request $request)
{
    $data = Blog::find($request->id);
    $data->like = $data->like + 1;
    $data->save();
    return response()->json($data);
}
    public function unlike(Request $request)
    {
        $data = Blog::find($request->id);
        $data->like = $data->like - 1;
        $data->save();
        return response()->json($data);
    }
    public function comment(Request $request)
    {
        $data = new CommentBlog();
        $data->comment = $request->comment;
        $data->blog_id = $request->id;
        $data->save();
        $data = CommentBlog::where('blog_id',$request->id)->get();
        return response()->json($data);
    }
    public function comment1(Request $request)
    {

        $data = CommentBlog::where('blog_id',$request->id)->get();
        return response()->json($data);
    }

    public function hashtag($id)
    {
        $data = Blog::find($id);
        $datas=Blog::with('comment')->where('hashtag',$data->hashtag)->get();
        return view('blog.hashtag',compact('datas'));
    }
}
