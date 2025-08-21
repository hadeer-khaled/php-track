<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
        $posts = Post::all(); // return row where deleted_at = null

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


        $validated = $request->validate([
            'title'=> 'required|string|max:5',
            'content' => 'required|min:10',
            'user_id' => 'required|exists:users,id'
        ]);

        // Elequent Mass Assignment
        // Post::create($validated);

        Post::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'user_id' => $validated['user_id'],
            'image_path' => $request->hasFile('image') ? $request->file('image')->store('images/posts', 'public') : null ,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // $post = DB::table('posts')->where('id', $id)->first();
        // $post = DB::table('posts')->where('id', $id)->firstOrFail();

        // if (!$post) {
        //     return redirect()->route('posts.index')->with('error', 'Post not found!');
        // }

        // $post = Post::findOrFail($id);
        $users = User::all();
        return view('posts.show', compact('post', 'users'));

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


        // remove old image form storage
        Storage::disk('public')->delete($post->image_path);
         
        // Eloquent Mass Assignment
        Post::where('id',$id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id, 
            'image_path' => $request->hasFile('image') ? $request->file('image')->store('images/posts', 'public') : null,
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
        // update deleted_at = now() where id = $id

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }

    public function trashed(){
        $posts = Post::onlyTrashed()->get(); // return row where deleted_at != null
        return view('posts.trashed', compact('posts'));
    }


    public function restore(string $id){
        $post =Post::onlyTrashed()->findOrFail($id); // NOT FOUND
        // $post = Post::withTrashed()->findOrFail($id); // if you want to get the post even if it is not trashe
        $post->restore(); // restore the post
        return redirect()->route('posts.index')->with('success', 'Post restored successfully!');
    }


    public function forceDelete(string $id){
        
        Post::onlyTrashed()->findOrFail($id)->forceDelete(); // permanently delete the post
        return redirect()->route('posts.index')->with('success', 'Post permanently deleted successfully!');
    }
}
