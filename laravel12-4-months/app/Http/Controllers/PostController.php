<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // DB Facade 
        // $posts = DB::table('posts')->get(); // collection of objects

        // Eloquent
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Create Form View
        // return 'create';
        $users = User::all();
        return view('posts.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // DB Facade    
        // DB::table('posts')->insert(
        //     [
        //         'title'=> $request->title,
        //         'content'=> $request->content
        //     ]
        // );

        //Elequent
        // $post = new Post();
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();


        // Elequent Mass Assignment
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $post = DB::table('posts')->where('id', $id)->first();
        // $post = DB::table('posts')->where('id', $id)->firstOrFail();

        // if (!$post) {
        //     return redirect()->route('posts.index')->with('error', 'Post not found!');
        // }

        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $post = DB::table('posts')->where('id', $id)->firstOrFail();

        $post = Post::findOrFail($id);
        $users = User::all();
        return view('posts.edit', compact('post', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // DB::table('posts')->where('id', $id)->update(
        //     [
        //         'title' => $request->title,
        //         'content' => $request->content
        //     ]
        // );

        // Eloquent
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();


        // Eloquent Mass Assignment
        Post::where('id',$id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id, 
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // DB::table('posts')->where('id', $id)->delete();


        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
