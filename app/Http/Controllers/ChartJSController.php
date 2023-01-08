<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DB;

class ChartJSController extends Controller
{
    public function index()
    {
        $posts = Post::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count', 'month_name');
 
        $labels = $posts->keys();
        $data = $posts->values();
              
        return view('dashboard.index', compact('labels', 'data'));
    }
}
