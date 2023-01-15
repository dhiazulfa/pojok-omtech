<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Video;
use App\Models\User;
use App\Models\Category;

class VideoController extends Controller
{
    public function index()
    {  
        $title = '';

        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            if(!$category){
                abort(404,'Category Not Found!');
            } else{
            $title = ' in ' . $category->name;
            }
        }

        if(request('user')){
            $user = User::firstWhere('username', request('user'));
            if(!$category){
                abort(404,'Category Not Found!');
            } else{
            $title = ' by ' . $user->name;
            }
        }

        return view('videos', [
            "title" => "All Videos" . $title,
            "active" => 'videos',
            "videos" => Videos::latest()->filter(request(['search', 'category', 'user']))->paginate(3)->withQueryString()
        ]);
    }

    public function show(Video $video){
        return view('video',[
            "title" => "Single Video",
            "active" => 'videos',
            "video" => $video 
        ]);
    }
}