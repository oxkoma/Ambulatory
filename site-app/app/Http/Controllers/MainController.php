<?php

namespace App\Http\Controllers;
use App\Models\Speciality;
use App\Models\Post;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;


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

    public function submitContact(Request $request) {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Mail::to('ambulatory.ldc01@gmail.com')->send(new ContactForm($request));
        
        return redirect()->back()->with('success', 'Ваш запит відправлено. Ми обов\'язково Вам відповімо.');
    }
}