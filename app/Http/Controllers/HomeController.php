<?php

namespace App\Http\Controllers;

use App\Blog;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function index()
    {
        $datas = Blog::with('comment')->get();
        return view('admin.admin',compact('datas'));
    }
}
