@extends('layouts.front')
@section('content')
<h4>Payments Types</h4>
<h3>1)Asset Payment</h3>
<table class="table">
<thead>
 <tr>
<th>Asset id</th>
<th>particular</th>
<th>Asset type</th>
<th>Total Amount</th>
<th>status</th>
<th>action</th>
 </tr>
</thead>
<tbody>
 @forelse($assets as $particular)
<tr>
<td scope="row">
{{ $particular->id }}
</td>
<td>
{{ $particular->particular }}
</td>

<td>
{{ $particular->type }}
</td>
<td>
{{ $particular->total }}
</td>
<td>
@if($particular->is_paid != '1')
not paid
@endif
@if($particular->is_paid != '0')
paid
@endif
</td>
<td>

@if($particular->is_paid != '1')
<a href="{{route('seller.payment.show.asset',$particular->id)}}" class="btn btn-primary btn-sm">
pay now
</a>
@endif
</td>
</tr>
@empty
no assets available!
@endforelse
</tbody>
</table>
<h3>2)Capital Payment</h3>
<table class="table">
<thead>
 <tr>
<th>Capital id</th>
<th>particular</th>
<th>Capital type</th>
<th>Total Amount</th>
<th>status</th>
<th>action</th>
 </tr>
</thead>
<tbody>
 @forelse($capitals as $particular)
<tr>
<td scope="row">
{{ $particular->id }}
</td>
<td>
{{ $particular->particular }}
</td>

<td>
{{ $particular->type }}
</td>
<td>
{{ $particular->total }}
</td>
<td>
@if($particular->is_paid != '1')
not paid
@endif
@if($particular->is_paid != '0')
paid
@endif
</td>
<td>

@if($particular->is_paid != '1')
<a href="{{route('seller.payment.show.capital',$particular->id)}}" class="btn btn-primary btn-sm">
pay now
</a>
@endif
</td>
</tr>
@empty
no capitals available!
@endforelse
</tbody>
</table>
<h3>3)Liability Payment</h3>
<table class="table">
<thead>
 <tr>
<th>Liability id</th>
<th>particular</th>
<th>Liability type</th>
<th>Total Amount</th>
<th>status</th>
<th>action</th>
 </tr>
</thead>
<tbody>
 @forelse($liabilities as $particular)
<tr>
<td scope="row">
{{ $particular->id }}
</td>
<td>
{{ $particular->particular }}
</td>

<td>
{{ $particular->type }}
</td>
<td>
{{ $particular->total }}
</td>
<td>
@if($particular->is_paid != '1')
not paid
@endif
@if($particular->is_paid != '0')
paid
@endif
</td>
<td>

@if($particular->is_paid != '1')
<a href="{{route('seller.payment.show.liability',$particular->id)}}" class="btn btn-primary btn-sm">
pay now
</a>
@endif
</td>
</tr>
@empty
no liabilities available!
@endforelse
</tbody>
</table>
<h3>4)Income Payment</h3>
<table class="table">
<thead>
 <tr>
<th>Income id</th>
<th>particular</th>
<th>Income type</th>
<th>Total Amount</th>
<th>status</th>
<th>action</th>
 </tr>
</thead>
<tbody>
 @forelse($incomes as $particular)
<tr>
<td scope="row">
{{ $particular->id }}
</td>
<td>
{{ $particular->particular }}
</td>

<td>
{{ $particular->type }}
</td>
<td>
{{ $particular->total }}
</td>
<td>
@if($particular->is_paid != '1')
not paid
@endif
@if($particular->is_paid != '0')
paid
@endif
</td>
<td>

@if($particular->is_paid != '1')
<a href="{{route('seller.payment.show.income',$particular->id)}}" class="btn btn-primary btn-sm">
pay now
</a>
@endif
</td>
</tr>
@empty
no incomes available!
@endforelse
</tbody>
</table>
<h3>5)Expense Payment</h3>
<table class="table">
<thead>
 <tr>
<th>Expense id</th>
<th>particular</th>
<th>Expense type</th>
<th>Total Amount</th>
<th>status</th>
<th>action</th>
 </tr>
</thead>
<tbody>
 @forelse($expenses as $particular)
<tr>
<td scope="row">
{{ $particular->id }}
</td>
<td>
{{ $particular->particular }}
</td>

<td>
{{ $particular->type }}
</td>
<td>
{{ $particular->total }}
</td>
<td>
@if($particular->is_paid != '1')
not paid
@endif
@if($particular->is_paid != '0')
paid
@endif
</td>
<td>
@if($particular->is_paid != '1')
<a href="{{route('seller.payment.show.expense',$particular->id)}}" class="btn btn-primary btn-sm">
pay now
</a>
@endif
</td>
</tr>
@empty
no expense available!
@endforelse
</tbody>
</table>
<h3>6)Purchase Payment</h3>
<table class="table">
<thead>
 <tr>
<th>Purchase id</th>
<th>particular</th>
<th>Purchase type</th>
<th>Total Amount</th>
<th>status</th>
<th>action</th>
 </tr>
</thead>
<tbody>
 @forelse($purchases as $particular)
<tr>
<td scope="row">
{{ $particular->id }}
</td>
<td>
{{ $particular->particular }}
</td>

<td>
{{ $particular->type }}
</td>
<td>
{{ $particular->total }}
</td>
<td>
@if($particular->is_paid != '1')
not paid
@endif
@if($particular->is_paid != '0')
paid
@endif
</td>
<td>

@if($particular->is_paid != '1')
<a href="{{route('seller.payment.show.purchase',$particular->id)}}" class="btn btn-primary btn-sm">
pay now
</a>
@endif
</td>
</tr>
@empty
no purchase available!
@endforelse
</tbody>
</table>
<h3>7)Return Payment</h3>
<table class="table">
<thead>
 <tr>
<th>Return id</th>
<th>particular</th>
<th>Return type</th>
<th>Total Amount</th>
<th>status</th>
<th>action</th>
 </tr>
</thead>
<tbody>
 @forelse($returns as $particular)
<tr>
<td scope="row">
{{ $particular->id }}
</td>
<td>
{{ $particular->particular }}
</td>

<td>
{{ $particular->type }}
</td>
<td>
{{ $particular->total }}
</td>
<td>
@if($particular->is_paid != '1')
not paid
@endif
@if($particular->is_paid != '0')
paid
@endif
</td>
<td>

@if($particular->is_paid != '1')
<a href="{{route('seller.payment.show.return',$particular->id)}}" class="btn btn-primary btn-sm">
pay now
</a>
@endif
</td>
</tr>
@empty
no returns available!
@endforelse
</tbody>
</table>
@endsection
