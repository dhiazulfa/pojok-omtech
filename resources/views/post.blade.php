@extends('layouts.main')
@section('container')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h1 class="mb-3 mt-3"> <b>{{$post->title}} </b></h1>
        <p style="margin-top: -20px; ">By. <a href="/posts?user={{$post->user->username}}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none"> 
        {{ $post->category->name}} </a> {{$post->created_at->diffForHumans()}} </p>
        
        @if($post->image)
          <div style="max-height: 550px; overflow:hidden;">
            <img src="{{asset('storage/'. $post->image)}}" alt="{{$post->category->name}}" class="img-fluid">
          </div>
        @else
          <img src="https://source.unsplash.com/1200x400?{{$post->category->name}}" alt="{{$post->category->name}}" class="img-fluid">
        @endif
        
        <article class="my-3">
          {!! $post->body !!}          
        </article>
   
        <a href="/" class="d-block mt-3">Back</a>
        <br>
      </div>
    </div>
  </div>     

@endsection