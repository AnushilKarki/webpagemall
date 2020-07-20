@extends('layouts.app')

@section('content')

<div class="container">
  <h2>products</h2>
  <div class="row">
  @foreach($products as $product)
<div class="card">
<img src="{{ asset('image.jpg') }}">
</div>
<div class="card">
<a href="#" class="">add to cart</a>
</div>
@endforeach
  </div>
</div>
@endsection
