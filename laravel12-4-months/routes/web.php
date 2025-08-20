<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/test', function (){
    return 'This is a test route!';
});

// Protocol:://domain ----> path endpoit( resource / {parameter} / sub-resource)

// Route::get('users/{id}' , function ($id) {
//     return "User ID: " . $id;
// })->where('id', '[0-9]+');

// // Optional Parameters
// Route::get('users/{name?}' , function ($name = 'Guest') {
//     return "User Name: " . $name;
// });


// Named Routes
// Route::get('profile', function () {
//     return 'This is the user profile page.';
// })->name('user.profile');


// Route::get('redirect-to-profile', function () {
//     return redirect()->route('user.profile');
// });


// Route::fallback(function () {
//     return '404 - Not Found';
//     // return view('errors.404');
// });





// Routes with controller
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('posts/trashed', [PostController::class, 'trashed'])->name('posts.trashed');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::get('/posts/{id}/force-delete', [PostController::class, 'forceDelete'])->name('posts.forceDelete');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

// Route::resource('posts', PostController::class);
Route::resource('users', UserController::class);

// Route::resource('comments', CommentController::class);
Route::post('/posts/{id}/comment', [CommentController::class, 'store'])->name('comments.store');