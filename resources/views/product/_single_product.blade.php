@extends('layouts.front')
@section('content')

<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>Trending Item</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="product-info">
							
                            
							<div class="tab-content" id="myTabContent">
								<!-- Start Single Tab -->
								<div class="tab-pane fade show active" id="man" role="tabpanel">
									<div class="tab-single">
										<div class="row">
                                        @foreach($products as $product)
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
                                             
													<div class="product-img">
														<a href="product-details.html">
															<img class="default-img" src="/storage/{{ $product->cover_img }}" alt="#">
															<img class="hover-img" src="/storage/{{ $product->cover_img }}" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="{{ route('cart.add',$product->id) }}">Add to cart</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="product-details.html">{{ $product->name }}</a></h3>
														<div class="product-price">
															<span>{{ $product->price }}</span>
														</div>
													</div>
												</div>
                                                
											</div>
											@endforeach
										</div>
									</div>
								</div>
                                
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
                                <div class="tab-pane fade show active" id="woman" role="tabpanel">
									<div class="tab-single">
										<div class="row">
                                        @foreach($products as $product)
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
                                             
													<div class="product-img">
														<a href="product-details.html">
															<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
															<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="{{ route('cart.add',$product->id) }}">Add to cart</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="product-details.html">{{ $product->name }}</a></h3>
														<div class="product-price">
															<span>{{ $product->price }}</span>
														</div>
													</div>
												</div>
                                                
											</div>
											@endforeach
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
							
								<!--/ End Single Tab -->
							</div>
						</div>
					</div>
				</div>
            </div>
@endsection