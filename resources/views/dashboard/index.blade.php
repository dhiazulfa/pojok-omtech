@extends('dashboard.layouts.main')
@section('container')
<br>
@if(session()->has('success'))
<div class="alert alert-success col-lg-10" role="alert">
  {{session('success')}}
</div>
@endif
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome, {{auth()->user()->name}}</h1>
    
</div>
<article>
  <p> Seiring dengan perkembangan era globalisasi, dunia Teknologi Informasi dan Komunikasi juga 
  berkembang dengan pesat. Saat ini Teknologi Informasi dan Komunikasi sudah menjadi kebutuhan 
  primer bagi banyak kalangan. Dengan menggunakan Teknologi Informasi dan Komunikasi, suatu 
  proses dan kegiatan dapat dilakukan dengan lebih cepat, mudah dan efisien. Oleh karena itu 
  penguasaan terhadap perangkat teknologi komunikasi perlu diajarkan pada semua tingkatan
  </p>
</article>
@endsection