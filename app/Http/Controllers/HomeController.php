<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('front-end.index', [
            'phones' => Blog::where('status', 1)->where('category_id', 1)->take(4)->get(),
            'watches' => Blog::where('status', 1)->where('category_id', 2)->take(4)->get(),
            'airbuds' => Blog::where('status', 1)->where('category_id', 3)->take(4)->get()
        ]);
    }

    public function details($id)
    {

        return view('front-end.blog', [
            'product' => Blog::where('id', $id)->first()
        ]);
    }
}
