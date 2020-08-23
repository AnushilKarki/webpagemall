@extends('layouts.front')
@section('content')
<h4>Order summary</h4>
<table class="table">
<thead>
 <tr>
<th>Name</th>
<th>qty</th>
<th>price</th>

 </tr>
</thead>
<tbody>
 @forelse($items as $item)
<tr>
<td scope="row">
{{ $item->name }}
</td>
<td>
{{ $item->pivot->quantity }}
</td>
<td>
{{ $item->pivot->price }}
</td>
</tr>
@empty
 @endforelse
</tbody>
</table>

@endsection