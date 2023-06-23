<?php

namespace App\Http\Controllers;
use App\Models\Speciality;
use App\Models\Post;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function showLast() {
        $specialities = Speciality::orderBy('id', 'DESC')->take(8)->get();
        $posts = Post::orderBy('id', 'DESC')->take(3)->get();
        return view('/site/index', compact('specialities', 'posts'));
    }

    public function blog()
    {
        $posts = Post::cursorPaginate(5);
        return view('site.blog', compact('posts'));
    }
}
