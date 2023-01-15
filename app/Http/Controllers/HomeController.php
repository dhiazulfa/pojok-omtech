<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Video;
use App\Models\User;
use App\Models\Category;
use App\Models\Home;

use Illuminate\Http\Request;

class HomeController extends Controller
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
            $title = ' in ' . $user->name;
            }
        }

        return view('index', [
            "title" => "Berita Terkini" . $title,
            "active" => "home",
            "posts" => Post::latest()->filter(request(['search', 'category', 'user']))->paginate(4)->withQueryString(),
            "posts2" => Post::latest()->filter(request(['search', 'category', 'user']))->paginate(8)->withQueryString(),
            
            "videos" => Video::latest()->filter(request(['search', 'category', 'user']))->paginate(4)->withQueryString(),
            "videos_latest" => Video::latest()->filter(request(['search', 'category', 'user']))->paginate(8)->withQueryString(),
            "categories" => Category::all(),
        ]);
    }
}