<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $post = Post::OrderBy('created_at', 'desc')->take(5)->get();
    return view('index')->with('posts',$post);
})->name("home");



// if (User::where("role","=", "admin")->exists()) 
// {
//     Auth::routes([
//         'register' => false
//     ]);
// }
// else
// {
//     Auth::routes();
// }
Auth::routes([
   'register' => false,
]);
Route::redirect('register','login');
Route::resource("posts",PostsController::class);
Route::middleware(['auth'])->resource("category",CategoryController::class);
Route::middleware(['auth'])->prefix('/dashboard')->name('dashboard.')->group(function () {
  Route::get('/', [HomeController::class, 'index'])->name('index');
  Route::delete('/delete', [HomeController::class, 'destroy'])->name('destroy');
});
Route::middleware(['auth'])->prefix('/admin')->name('admin.')->group(function () {
  Route::get('/', [AdminController::class, 'index'])->name('index');
  Route::resource('/users', UserController::class);
  Route::resource('/roles', RoleController::class);
  Route::resource('/permissions', PermissionController::class);
});

