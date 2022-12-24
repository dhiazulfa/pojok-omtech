<?php

use Illuminate\Support\Facades\Route;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardPostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});



//route for login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

//route untuk logout
Route::post('/logout', [LoginController::class, 'logout']);

//Dashboard Admin
Route::get('/dashboard', function(){
  return view('dashboard.index');
})->middleware('auth');

//Route Kategori Berita
Route::get('/categories', function() {
  return view('categories', [
      'title'=>"Post Categories",
      'active' => 'categories',
      'categories'=> Category::all()
  ]);
});


//Route Dashboard Post
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('trainer');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])
->middleware('auth');

//Route Category Controller
Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware('admin');
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('admin');