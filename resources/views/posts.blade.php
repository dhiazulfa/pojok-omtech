@extends('layouts.main')
@section('container')

<div class="content-wrapper">
    <div class="container">
      <div class="col-sm-12">
        <div class="card" data-aos="fade-up">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <h1 class="font-weight-600 mb-4">
                  All News
                </h1>
              </div>
            </div>
            
            <div class="row">

              <div class="col-lg-8">
                @if($posts->count())
                @foreach($posts as $post)
                <div class="row">
                  <div class="col-sm-4 grid-margin">
                    <div class="img">
                      <img src="{{asset('storage/'. $post->image)}}" class="img-fluid"/>
                    </div>
                  </div>
                  <div class="col-sm-8 grid-margin">
                    <h2 class="font-weight-600 mb-2">
                      <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark"> <b>{{$post->title}}</b> </a>
                    </h2>
                    <p class="fs-13 text-muted mb-0">
                      <span class="mr-2">Post</span>{{$post->created_at->diffForHumans()}}
                    </p>
                    <p class="fs-15">
                      {!! $post->excerpt !!}
                    </p>
                  </div>
                </div>
                @endforeach
                @endif
              </div>
              
              <div class="col-lg-4">
                <h2 class="text-primary font-weight-600">
                  Latest news
                </h2>
                <div class="row">
                  @if($posts->count())
                  @foreach ($posts->skip(1) as $post)
                  <div class="col-sm-12">
                    <div class="border-bottom pb-4 pt-4">
                      <div class="row">
                        <div class="col-sm-8">
                          <h5 class="font-weight-600 mb-1">
                            {{ $post->title }}
                          </h5>
                          <p class="fs-13 text-muted mb-0">
                            <span class="mr-2">Post </span>{{$post->created_at->diffForHumans()}}
                          </p>
                        </div>
                        <div class="col-sm-4">
                          <div class="rotate-img">
                            <img src="{{asset('storage/'. $post->image)}}" class="img-fluid"/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  @endif
                </div>
                
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection