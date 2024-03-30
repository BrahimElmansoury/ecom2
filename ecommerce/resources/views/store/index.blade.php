<!DOCTYPE html>
<html lang="en">

 	<head>
 		<!-- Meta Tags -->
		<meta charset="UTF-8">
		<meta name="author" content="Kamran Mubarik">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Title -->
 		<title>E-Commerce Online Shop</title>
 		<!-- Style Sheet -->
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<!-- Javascript -->	
		<script defer src="{{ asset('js/script.js') }}"></script>

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
  		<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
  		<script>
		    $(document).ready(function(){
		      $('.slider').bxSlider({
				  auto: true,
				  autoControls: true,
				  stopAutoOnClick: true,
				  pager: true
				});
		    });
		 </script>
 	</head>
<body>

	<header>
		<div class="container">
			<div class="brand">
				<div class="logo">
					<a href="index.html">
						<img src="img/icons/online_shopping.png">
						<div class="logo-text">
							<p class="big-logo">Ecommerce</p>
							<p class="small-logo">online shop</p>
						</div>
					</a>
				</div> <!-- logo -->
				<div class="shop-icon">
					<div class="dropdown">
						<img src="img/icons/account.png">
						<div class="dropdown-menu">
							<ul>
								<li><a href="account.html">My Account</a></li>
								<li><a href="orders.html">My Orders</a></li>
							</ul>
						</div>
					</div>
					<div class="dropdown">
						<img src="img/icons/heart.png">
						<div class="dropdown-menu wishlist-item">
							<table border="1">
								<thead>
									<tr>
										<th>Image</th>
										<th>Product Name</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><img src="img/product/img1.jpg"></td>
										<td>product name</td>
									</tr>
									<tr>
										<td><img src="img/product/img2.jpg"></td>
										<td>product name</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="dropdown">
						<img src="img/icons/shopping_cart.png">
						<div class="dropdown-menu cart-item">
							<table border="1">
								<thead>
									<tr>
										<th>Image</th>
										<th>Product Name</th>
										<th class="center">Price</th>
										
									</tr>
								</thead>
								<tbody>
									@foreach ($productsInPanier as $product)

									<tr>
										<td><img src="{{ asset('storage/' . $product->image) }}"></td>
										<td>{{ $product->name }}</td>
										<td class="center">{{ $product->price }}</td>
										
									</tr>
									@endforeach
									
								</tbody>
							</table>
						</div>
					</div>
				</div> <!-- shop icons -->
			</div> <!-- brand -->

			<div class="menu-bar">
				<div class="menu">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="shop.html">Shop</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</div>
				<div class="search-bar">
					<form>
						<div class="form-group">
							<input type="text" class="form-control" name="search" placeholder="Search">
							<img src="img/icons/search.png">
						</div>
					</form>
				</div>
			</div> <!-- menu -->
		</div> <!-- container -->
	</header> <!-- header -->

	<div class="container">
		<main>
			<div class="slider">
				<div class="slide-1">
					<img src="img/slider/slide-1.jpg">
					<div class="slider-text">
						<h3>Sale 40% off</h3>
						<h2>Men's Watches</h2>
						<a href="#">Shop Now</a>
					</div>
				</div>
				<div class="slide-2">
					<img src="img/slider/slide-2.jpg">
					<div class="slider-text">
						<h3>Sale 20% off</h3>
						<h2>Women's Fashion</h2>
						<a href="#">Shop Now</a>
					</div>
				</div>
				<div class="slide-3">
					<img src="img/slider/slide-3.jpg">
					<div class="slider-text">
						<h3>Sale 50% off</h3>
						<h2>Women's Collection</h2>
						<a href="#">Shop Now</a>
					</div>
				</div>		
			</div> <!-- slider -->

			<div class="new-product-section">
				<div class="product-section-heading">
					<h2>Tranding Products <img src="img/icons/increase.png"></h2>
					<h3>Most selling product for the month</h3>
				</div>
				<div class="product-content">
					@foreach ($products as $product)

					<div class="product">
						<a href="{{ route('products.show', $product->id) }}">
							<img width="100px" height="350px" src="storage/{{$product->image}}" class="card-img-top" alt="">
						</a>
						<div class="product-detail">
							<h3>{{$product->name}}</h3>
							
							<a href="{{ route('shop.addTocart',$product->id) }}">Add to Cart</a>
							<p>{{$product->price}}</p>

						</div>						
					</div>
					@endforeach
				</div>
			</div> <!-- New Product Section -->

			<div class="collection">
				<div class="men-collection">
					<h2>Men's Collection</h2>
				</div>
				<div class="women-collection">
					<h2>Women's Collection</h2>
				</div>
			</div> <!-- Collection Section -->

			<div class="new-product-section">
				<div class="product-section-heading">
					<h2>Recommend Products <img src="img/icons/good_quality.png"></h2>
					<h3>OUR BEST PRODUCTS RECOMMENDED FOR YOU</h3>
				</div>
				<div class="product-content">
					@foreach ($products as $product)

					<div class="product">
						<a href="{{ route('products.show', $product->id) }}">
							<img width="100px" height="350px" src="storage/{{$product->image}}" class="card-img-top" alt="">
						</a>
						<div class="product-detail">
							<h3>{{$product->name}}</h3>
							
							<a href="{{ route('shop.addTocart',$product->id) }}">Add to Cart</a>
							<p>{{$product->price}}</p>

						</div>						
					</div>
					@endforeach
				</div>
			</div> <!-- Recommend Product Section -->
		</main> <!-- Main Area -->
	</div>

	<footer>
		<div class="container">
			<div class="footer-widget">
				<div class="widget">
					<div class="widget-heading">
						<h3>Important Link</h3>
					</div>
					<div class="widget-content">
						<ul>
							<li><a href="about.html">About</a></li>
							<li><a href="contact.html">Contact</a></li>
							<li><a href="refund.html">Refund Policy</a></li>
							<li><a href="terms.html">Terms & Conditions</a></li>
						</ul>
					</div>
				</div>
				<div class="widget">
					<div class="widget-heading">
						<h3>Information</h3>
					</div>
					<div class="widget-content">
						<ul>
							<li><a href="account.html">My Account</a></li>
							<li><a href="orders.html">My Orders</a></li>
							<li><a href="cart.html">Cart</a></li>
							<li><a href="checkout.html">Checkout</a></li>
						</ul>
					</div>
				</div>
				<div class="widget">
					<div class="widget-heading">
						<h3>Follow us</h3>
					</div>
					<div class="widget-content">
						<div class="follow">
							<ul>
								<li><a href="#"><img src="img/icons/facebook.png"></a></li>
								<li><a href="#"><img src="img/icons/twitter.png"></a></li>
								<li><a href="#"><img src="img/icons/instagram.png"></a></li>
							</ul>
						</div>						
					</div>
					<div class="widget-heading">
						<h3>Subscribe for Newsletter</h3>
					</div>
					<div class="widget-content">
						<div class="subscribe">
							<form>
								<div class="form-group">
									<input type="text" class="form-control" name="subscribe" placeholder="Email">
									<img src="img/icons/paper_plane.png">
								</div>
							</form>
						</div>						
					</div>
				</div>
			</div> <!-- Footer Widget -->
			<div class="footer-bar">
				<div class="copyright-text">
					<p>Copyright 2021 - All Rights Reserved</p>
				</div>
				<div class="payment-mode">
					<img src="img/icons/paper_money.png">
					<img src="img/icons/visa.png">
					<img src="img/icons/mastercard.png">
				</div>
			</div> <!-- Footer Bar -->
		</div>
	</footer> <!-- Footer Area -->

</body>

</html>