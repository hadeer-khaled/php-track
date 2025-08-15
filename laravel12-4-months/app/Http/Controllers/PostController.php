<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = [
            [
                'id' => 1,
                'title' => 'Getting Started with Laravel 12',
                'description' => 'Learn how to install Laravel 12, configure your environment, and create your first route.'
            ],
            [
                'id' => 2,
                'title' => 'Understanding MVC Architecture',
                'description' => 'A beginner-friendly explanation of the Model-View-Controller pattern and how Laravel uses it.'
            ],
            [
                'id' => 3,
                'title' => 'Building Your First Blade Template',
                'description' => 'Create and extend Blade templates to design dynamic and reusable layouts in Laravel.'
            ],
            [
                'id' => 4,
                'title' => 'Introduction to Eloquent ORM',
                'description' => 'Learn how to work with databases using Laravel’s Eloquent ORM, models, and relationships.'
            ],
            [
                'id' => 5,
                'title' => 'Handling Forms and Validation',
                'description' => 'Build secure forms, validate user input, and display error messages using Blade templates.'
            ],
        ];

        // foreach ($posts as $post) {
        //     echo "<h2>{$post['title']}</h2>";
        //     echo "<hr>";
        // };

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Create Form View
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // store in database
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $posts = [
            [
                'id' => 1,
                'title' => 'Getting Started with Laravel 12',
                'description' => 'Learn how to install Laravel 12, configure your environment, and create your first route.'
            ],
            [
                'id' => 2,
                'title' => 'Understanding MVC Architecture',
                'description' => 'A beginner-friendly explanation of the Model-View-Controller pattern and how Laravel uses it.'
            ],
            [
                'id' => 3,
                'title' => 'Building Your First Blade Template',
                'description' => 'Create and extend Blade templates to design dynamic and reusable layouts in Laravel.'
            ],
            [
                'id' => 4,
                'title' => 'Introduction to Eloquent ORM',
                'description' => 'Learn how to work with databases using Laravel’s Eloquent ORM, models, and relationships.'
            ],
            [
                'id' => 5,
                'title' => 'Handling Forms and Validation',
                'description' => 'Build secure forms, validate user input, and display error messages using Blade templates.'
            ],
        ];

        foreach ($posts as $post) {
            if ($post['id'] == $id) {
            //    return view('posts.show', ['post' => $post ,'id' => $id ]);
               return view('posts.show', compact('post'));
            }
        }
        return "Post not found.";

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $posts = [
            [
                'id' => 1,
                'title' => 'Getting Started with Laravel 12',
                'description' => 'Learn how to install Laravel 12, configure your environment, and create your first route.'
            ],
            [
                'id' => 2,
                'title' => 'Understanding MVC Architecture',
                'description' => 'A beginner-friendly explanation of the Model-View-Controller pattern and how Laravel uses it.'
            ],
            [
                'id' => 3,
                'title' => 'Building Your First Blade Template',
                'description' => 'Create and extend Blade templates to design dynamic and reusable layouts in Laravel.'
            ],
            [
                'id' => 4,
                'title' => 'Introduction to Eloquent ORM',
                'description' => 'Learn how to work with databases using Laravel’s Eloquent ORM, models, and relationships.'
            ],
            [
                'id' => 5,
                'title' => 'Handling Forms and Validation',
                'description' => 'Build secure forms, validate user input, and display error messages using Blade templates.'
            ],
        ];

        foreach($posts as $post){
            if($post['id'] == $id) {
                // return view('posts.edit', ['post' => $post]);
                return view('posts.edit', compact('post'));
            }
        }
        return 'not found';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Update in database
        // return $id ;   
        return $request->input('title');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
