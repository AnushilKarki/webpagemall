@extends('layouts.front')
@section('content')
<h4>Orders</h4>
<table class="table">
<thead>
 <tr>
<th>order number</th>
<th>status</th>
<th>item count</th>
<th>shipping address</th>
<th>action</th>
 </tr>
</thead>
<tbody>
 @forelse($orders as $suborder)
<tr>
<td scope="row">
{{ $suborder->order->order_number }}
</td>
<td>
{{ $suborder->status }}
@if($suborder->status != 'completed')
<a href="{{route('seller.order.delivered',$suborder)}}" class="btn btn-primary btn-sm">
mark as delivered
</a>
@endif
</td>

<td>
{{ $suborder->item_count }}
</td>
<td>
{{ $suborder->order->shipping_address }}
</td>
<td>
<a name="" id="" class="btn btn-primary btn-sm" href="{{route('seller.orders.show',$suborder)}}">show  </a>

</td>
</tr>
@empty
no any orders
@endforelse
</tbody>
</table>

@endsection