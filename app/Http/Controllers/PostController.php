<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {  
        $title = '';

        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            if(!$category){
                abort(404);
            } else{
            $title = ' in ' . $category->name;
            }
        }

        if(request('user')){
            $user = User::firstWhere('username', request('user'));
            if(!$user){
                abort(404);
            } else{
            $title = ' by ' . $user->name;
            }
        }

        return view('posts', [
            "active" => 'posts',
            "posts" => Post::latest()->filter(request(['search', 'category', 'user']))->paginate(10)->withQueryString()
        ]);
    }

    public function show(Post $post){
        return view('post',[
            "title" => "Single Post",
            "active" => 'posts',
            "post" => $post 
        ]);
    }
}
