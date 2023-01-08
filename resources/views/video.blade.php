@extends('layouts.main')
@section('container')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h1 class="mb-3 mt-3"> <b>{{$video->title}} </b></h1>
        <p style="margin-top: -20px; ">By. <a href="/videos?user={{$video->user->username}}" class="text-decoration-none">{{ $video->user->name }}</a> in <a href="/videos?category={{ $video->category->slug }}" class="text-decoration-none"> 
        {{ $video->category->name}} </a> {{$video->created_at->diffForHumans()}} </p>
        
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="{{ $video->video }}" allowfullscreen></iframe>
        </div>
        
        <article class="my-3">
          {!! $video->body !!}          
        </article>
   
        <a href="/" class="d-block mt-3">Back</a>
        <br>
      </div>
    </div>
  </div>     

@endsection