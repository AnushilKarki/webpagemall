@extends('layouts.front')
@section('content')
<h2>{{ $categoryName ?? null}} </h2>

@foreach($products as $product)
@include('product._single_product')
@endforeach
@endsection