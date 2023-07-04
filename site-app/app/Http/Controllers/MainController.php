<?php

namespace App\Http\Controllers;
use App\Models\Speciality;
use App\Models\Post;
use App\Models\Order;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function showLast() {
        $specialities = Speciality::orderBy('id', 'DESC')->take(8)->get();
        $posts = Post::orderBy('id', 'DESC')->take(3)->get();
        return view('site.index', compact('specialities', 'posts'));
    }

    public function blog()
    {
        $posts = Post::cursorPaginate(5);
        return view('site.blog', compact('posts'));
    }
    public function orderCount() {
        $ordersCount = Order::where('status_id', '=', 1)->count();
    
        return view('layouts.admin-dash-layout', compact('ordersCount'));
        // 
    }
}