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
                  All Video
                </h1>
              </div>
            </div>
            
            <div class="row">

              <div class="col-lg-8">
                @if($videos->count())
                @foreach($videos as $video)
                <div class="row">
                  <div class="col-sm-4 grid-margin">
                    <div class="img">
                      <img src="{{asset('storage/'. $video->image)}}" class="img-fluid"/>
                    </div>
                  </div>
                  <div class="col-sm-8 grid-margin">
                    <h2 class="font-weight-600 mb-2">
                      <a href="/videos/{{ $video->slug }}" class="text-decoration-none text-dark"> <b>{{$video->title}}</b> </a>
                    </h2>
                    <p class="fs-13 text-muted mb-0">
                      <span class="mr-2">Video</span>{{$video->created_at->diffForHumans()}}
                    </p>
                    <p class="fs-15">
                      {!! $video->excerpt !!}
                    </p>
                  </div>
                </div>
                @endforeach
                @endif
              </div>
              
              <div class="col-lg-4">
                <h2 class="text-primary font-weight-600">
                  Latest video
                </h2>
                <div class="row">
                  @if($videos->count())
                  @foreach ($videos->skip(1) as $video)
                  <div class="col-sm-12">
                    <div class="border-bottom pb-4 pt-4">
                      <div class="row">
                        <div class="col-sm-8">
                          <h5 class="font-weight-600 mb-1">
                            {{ $video->title }}
                          </h5>
                          <p class="fs-13 text-muted mb-0">
                            <span class="mr-2">Video </span>{{$video->created_at->diffForHumans()}}
                          </p>
                        </div>
                        <div class="col-sm-4">
                          <div class="rotate-img">
                            <img src="{{asset('storage/'. $video->image)}}" class="img-fluid"/>
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