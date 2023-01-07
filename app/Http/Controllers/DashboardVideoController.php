<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Category;

use Illuminate\Http\Request;

use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.videos.index', [
            'videos' => Videos::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.videos.create', [
          'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
          'title' => 'required | max:255',
          'slug' => 'required | unique:videos',
          'category_id' => 'required',
          'videos' => 'required',
          'body' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);

        Post::create($validatedData);
        return redirect('/dashboard/videos')->with('success', 'New Videos has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
      return view('dashboard.video.show', [
        'video'=> $video
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('dashboard.videos.edit', [
          'video' => $video,
          'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $rules = [
          'title' => 'required | max:255',
          'category_id' => 'required',
          'videos' => 'required',
          'body' => 'required'
        ];

          //validasi slug
        if($request->slug != $post->slug ){
          $rules['slug'] = 'required|unique:videos';
        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);

        Video::where('id', $video->id)->update($validatedData);
        return redirect('/dashboard/videos')->with('success', 'Video has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        Video::destroy($video->id);
        return redirect('/dashboard/videos')->with('success', 'Video has been deleted!');
    }

    public function checkSlug(Request $request){
      $slug = SlugService::createSlug(Video::class, 'slug', $request->title);
      return response()->json(['slug' => $slug]);
    }
}
