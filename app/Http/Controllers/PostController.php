<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }




   
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request ->validate([
            'title'=>'required',
            'description'=>'required'
        ]);
    
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
    
        $post->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post= Post::all($id);
        return Inertia('Home',compact($post));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post=Post::find($id);
        return Inertia('posts.show',compact($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request ->validate([
            'title'=>'required',
            'description'=>'required'
        ]);
    
        $post = Post::findOrFail();
        $post->title = $request->title;
        $post->description = $request->description;
    
        $post->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Post::destroy($id);
    }
}
