<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Package;
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
            $title = ' in ' . $category->name;
        }

        if(request('user')){
            $user = User::firstWhere('username', request('user'));
            $title = ' by ' . $user->name;
        }

        return view('index', [
            "title" => "Berita Terkini" . $title,
            "active" => "home",
            "posts" => Post::latest()->filter(request(['search', 'category', 'user']))->paginate(4)->withQueryString()
        ]);
    }
}
