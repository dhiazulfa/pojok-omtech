@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid">
 <div class="row my-3">
  <div class="col-lg-8">
   <h2 class="mb-3">{{$video->title}}</h2>
    <a href="/dashboard/videos" class="btn btn-success"><span data-feather="arrow-left"></span> Back</a>
    <a href="/dashboard/videos/{{$video->slug}}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit Post Video</a>
    <form action="/dashboard/videos/{{ $video->slug }}" method="POST" class="d-inline">
      @method('delete')
      @csrf
      <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
    </form>
    <br><br>
    <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item" src="{{ $video->video }}" allowfullscreen></iframe>
    </div>

    <article class="my-3 fs-5">
        {!! $video->body !!}        
    </article>

  </div>
 </div>
</div>
@endsection