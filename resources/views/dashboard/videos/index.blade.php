@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Website Video</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-10" role="alert">
  {{session('success')}}
</div>
@endif
    <div class="table-responsive col-lg-10">
      <a href="/dashboard/videos/create" class="btn btn-primary mb-3">Post New Video</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Published At</th>
              <th>Kategori Video</th>
              <th>Pilihan</th>
            </tr>
          </thead>
          <tbody>
              @foreach($videos as $video)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $video->title}}</td>
                <td>{{$video->created_at}}</td>
                <td>{{ $video->category->name}}</td>
                <td>
                    <a href="/dashboard/videos/{{ $video->slug }}" class="badge bg-success"><span data-feather="eye"></span></a>
                    <a href="/dashboard/videos/{{ $video->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>

                    <form action="/dashboard/videos/{{ $video->slug }}" method="POST" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                    </form>

                </td>
              </tr>
              @endforeach
          </tbody>
        </table>
    </div>
@endsection