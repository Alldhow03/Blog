<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Member\BlogController;

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

    //blog route
    //route::get('member/blogs', [BlogController::class, 'index']);
    //route::get('member/blogs/{post}/edit', [BlogController::class, 'edit']);

    route::resource('/member/blogs', BlogController::class)->names([ //representasi dari url yang kita buka pada browser
        'edit' => 'member.blogs.edit', //lokasi folder file blade
        'index' => 'member.blogs.index',
        'update' => 'member.blogs.update',
        'create' => 'member.blogs.create',
        'store' => 'member.blogs.store',
        'destroy' => 'member.blogs.destroy',
    ])->parameters([
        'blogs' => 'post'
    ]);
});

require __DIR__ . '/auth.php';
