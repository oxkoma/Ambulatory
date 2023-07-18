<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all();
        return view('admin.post.create', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'alt' => 'required',
        ]);
        Post::create($request->all());
        $post = DB::table('posts')->orderBy('id', 'desc')->first();

        if($request->hasFile('img')) {
            $extension = $request->file('img')->extension();
            $fileName = time().'.'.$extension;
            $path = $request->file('img')->storeAs('post', $fileName);  
        }
      
       DB::table('posts')->where('id', '=', $post->id)->update(['img' => $fileName]);

        return redirect()->route('posts.index')->with('success', 'Record created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'alt' => 'required',
        ]);
        $post = Post::find($id);
        $post->update($request->all());
        
        if($request->hasFile('img')) {
            $extension = $request->file('img')->extension();
            $fileName = time().'.'.$extension;
            $path = $request->file('img')->storeAs('post', $fileName);  
            $post->img = $fileName;
        }
        $post->save();
        
        return redirect()->route('posts.show', $id)->with('success', 'Record updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Record deleted');

    }
    public function topNews()
    {
        $posts = Post::orderBy('id', 'DESC')->take(3)->get();
        return view('site.index', compact('posts'));
    }

    public function blog()
    {
        $posts = Post::cursorPaginate(5);
        return view('site.blog', compact('posts'));
    }

    public function singlePost($id) {
        $post = Post::find($id);
        return view('site.post', compact('post'));
    }

}