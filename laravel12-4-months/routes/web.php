<?php

use App\Http\Controllers\AdminController;
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

    Route::prefix('/posts')->controller(PostController::class)->group(function () {
        Route::get('/trashed',  'trashed')->name('posts.trashed')->middleware('admin.only');
        Route::get('/',  'index')->name('posts.index');
        Route::get('/create',  'create')->name('posts.create');
        Route::get('/{post}',  'show')->name('posts.show');
        Route::get('/{id}/restore',  'restore')->name('posts.restore');
        Route::get('/{id}/force-delete',  'forceDelete')->name('posts.forceDelete');
        Route::post('/',  'store')->name('posts.store');
        Route::get('/{id}/edit',  'edit')->name('posts.edit');
        Route::put('/{id}',  'update')->name('posts.update');
        Route::delete('/{id}',  'destroy')->name('posts.destroy');
    });

    Route::post('/posts/{id}/comment', [CommentController::class, 'store'])->name('comments.store');

    Route::middleware('admin.only')->group(function () {
        Route::get('/admin/users', [AdminController::class,'usersList'])->name('admin.users.index');
        Route::patch('/admin/users/{user}/change-role', [AdminController::class, 'changeUserRole'])->name('admin.users.change.role');
    });

    // Route::resource('posts', PostController::class);
    Route::resource('users', UserController::class);

    // Route::resource('comments', CommentController::class);



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

