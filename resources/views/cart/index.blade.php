@extends('layouts.front')
@section('content')

 
<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
			
	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
							
								<th>NAME</th>
								<th class="text-center">UNIT PRICE</th>
								<th class="text-center">QUANTITY</th>
								<th class="text-center">TOTAL</th> 
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>
                                    @foreach($cartitems as $item)
							<tr>
						
								<td class="product-des" data-title="Description">
									<p class="product-name"><a href="#">{{ $item->name }}</a></p>
									<p class="product-des">Maboriosam in a tonto nesciung eget  distingy magndapibus.</p>
								</td>
								<td class="price" data-title="Price"><span>Rs {{ $item->price }}</span></td>
								<td class="qty" data-title="Qty"><!-- Input Order -->
									<div class="input-group">
									<form action="{{route('cart.update',$item->id)}}">
<input name="quan" type="number" value="{{ $item->quantity }}">
<input type="submit" value="save">
</form>
									</div>
									<!--/ End Input Order -->
								</td>
								<td class="total-amount" data-title="Total"><span> Rs {{ \Cart::session(auth()->id())->get($item->id)->getPriceSum() }}</span></td>
								<td class="action" data-title="Remove"><a href="{{ route('cart.destroy',$item->id) }}"><i class="ti-trash remove-icon"></i></a></td>
							</tr>
					@endforeach
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<div class="left">
									<div class="coupon">
										<form action="{{ route('cart.coupon') }}" target="_blank">
											<input name="Coupon_code" placeholder="Enter Your Coupon">
											<button class="btn" type="submit">Apply</button>
										</form>
									</div>
									<div class="checkbox">
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										<li>Cart Subtotal<span> Rs {{ \Cart::session(auth()->id())->getTotal()  }}</span></li>
										<li>Shipping<span>Free</span></li>
										<li>You Save<span>$20.00</span></li>
										<li class="last">You Pay<span>$310.00</span></li>
									</ul>
									<div class="button5">
										<a href="{{ route('cart.checkout') }}" class="btn">Checkout</a>
										<a href="{{ route('home') }}" class="btn">Continue shopping</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
	</div>
@endsection
