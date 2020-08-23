@extends('layouts.front')
@section('content')
<h4>Payment summary</h4>
<form class="form" method="post" action="{{ route('payments.store') }}">
              @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Payment For : {{ $paymentfor }}</label>
      <input type="hidden" class="form-control" name="paymentfor" value="{{ $paymentfor }}">
    </div>

  </div>
@foreach($particulars as $particular)
 <div class="form-group">
    <label for="inputAddress">Payment id : {{ $particular->id }}</label>
    <input type="hidden" class="form-control" name="id" value="{{$particular->id}}">
  </div>
 <div class="form-group">
    <label for="inputAddress">Payment Type : {{$particular->type}}</label>

  </div>
  <div class="form-group">
    <label for="inputAddress">Particular : {{$particular->particular}}</label>

  </div>
  <div class="form-group">
    <label for="inputAddress2">Total Amount : {{$particular->total}}</label>
    <input type="hidden" class="form-control" name="total" value="{{$particular->total}}">
  </div>
@endforeach
  <div class="form-group">
    <label>Payment form</label>
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress">Particular</label>
    <input type="text" class="form-control" id="inputAddress" name="particular">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Payment type</label>
      <input type="text" class="form-control" name="type">
    </div>
  
 
  </div>
  <div class="form-group col-md-6">
      <label>Payment Method</label>
      <select  class="form-control" name="payment_method">
        <option selected value="cash">Cash</option>
        <option value="card">Card</option>
   <option value="mobile_wallet">Mobile Wallet</option>
<option value="cash_on_delivery">Cash</option>
      </select>
    </div>
  <div class="form-group col-md-6">
    <label for="inputAddress2">Enter Amount</label>
    <input type="number" class="form-control" name="paid">
  </div>

  <button type="submit" class="btn btn-primary">PAY</button>
</form>

@endsection
