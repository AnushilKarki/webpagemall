@extends('layouts.app')

@section('content')

<h2>Submit your shop</h2>
<form action="{{route('shops.store') }}" method="post">
@csrf
<div class="form-group">
<label for="name">Name of Shop</label>
<input type="text" name="name" class="form-control" placeholder="">
</div>
<div class="form-group">
<label for="description">Description</label>
<input type="text" name="description" class="form-control" placeholder="">
</div>
<button type="submit" class="btm btn-primary">submit</button>
</form>
@endsection