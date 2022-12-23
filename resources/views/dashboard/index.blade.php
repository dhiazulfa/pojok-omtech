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
  <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt ducimus ab quasi quis sed sapiente molestiae corporis labore fugit consequatur maxime voluptatum rem corrupti ipsa eius, debitis nihil illo beatae ex voluptatibus. Molestias id deserunt necessitatibus reprehenderit odit, tenetur exercitationem, hic nostrum, sed quaerat dolorem at est. Autem nulla ut corporis doloribus voluptatibus quod dolores expedita necessitatibus, quasi sequi ullam beatae voluptas iste esse libero
    natus saepe ex velit iure iusto in impedit possimus. Minus dolore ipsam sequi ad libero non veritatis fugiat quo illum rem quaerat harum, aliquam dignissimos aspernatur facilis placeat ullam delectus earum doloribus eum accusantium. Rerum!
  </p>
</article>
@endsection