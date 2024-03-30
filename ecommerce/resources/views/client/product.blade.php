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
		 <link rel="stylesheet" type="text/css" href="../css/style.css" />
		 <!-- Javascript -->	


		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<!-- FancyBox -->
		<link rel="stylesheet" href="../fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../fancybox/source/jquery.fancybox.pack.js"></script>

		<!-- Optionally add helpers - button, thumbnail and/or media -->
		<link rel="stylesheet" href="../fancybox/source/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
		<script type="text/javascript" src="../fancybox/source/helpers/jquery.fancybox-media.js"></script>

		<link rel="stylesheet" href="../fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>
		<script>
		$(document).ready(function(){		
			$('.fancybox').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
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
						<img src="../img/icons/online_shopping.png">
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
						<img src="../img/icons/heart.png">
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
										<td><img src="../img/product/img1.jpg"></td>
										<td>product name</td>
									</tr>
									<tr>
										<td><img src="../img/product/img2.jpg"></td>
										<td>product name</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="dropdown">
						<img src="../img/icons/shopping_cart.png">
						<div class="dropdown-menu cart-item">
							<table border="1">
								<thead>
									<tr>
										<th>Image</th>
										<th>Product Name</th>
										<th class="center">Price</th>
										<th class="center">Qty.</th>
										<th class="center">Amount</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><img src="../img/product/img1.jpg"></td>
										<td>product name</td>
										<td class="center">1200</td>
										<td class="center">2</td>
										<td class="center">2400</td>
									</tr>
									<tr>
										<td><img src="../img/product/img2.jpg"></td>
										<td>product name</td>
										<td class="center">1500</td>
										<td class="center">2</td>
										<td class="center">3000</td>
									</tr>
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
							<img src="../img/icons/search.png">
						</div>
					</form>
				</div>
			</div> <!-- menu -->
		</div> <!-- container -->
	</header> <!-- header -->

	<div class="container">
		<main>
			<div class="breadcrumb">
				<ul>
					<li><a href="{{ route('homepage') }}">Home</a></li>
					<li> / </li>
					<li><a href="">Shop</a></li>
					<li> / </li>
					<li><a href="">Product</a></li>
				</ul>
			</div> <!-- End of Breadcrumb-->

			<div class="single-product">
				<div class="images-section">
					
					<div class="larg-img">
						 
   
						@if($product->image)
							<img width="100px" height="350px" src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="">
						@endif
    				</div>	
				</div> <!-- End of Images Section-->

				<div class="product-detail">
					<div class="product-name">
						<h2>{{$product->name}}</h2>
					</div>
					<div class="product-price">
						<h3>{{$product->price}}</h3>
					</div>
					
					<hr>
					<div class="product-description">
						<p>{{$product->description}}</p>
					</div>
					
					<hr>
					<div class="product-cart">
						<form id="cart-form">
							<div class="form-group">
								<div class="product-detail">
									<a href="{{ route('shop.addTocart',$product->id) }}">Add to Cart</a>

								</div>

							</div>
						</form>
						<form id="wishlist-form">
							<div class="form-group">
								<input type="checkbox" class="wishlist" name="wishlist"> Add To Wishlist
							</div>
						</form>
					</div>
					<hr>
					<div class="product-meta">
						<p><b>Category: </b> {{$product->category->name}}</p>
						<p><b>Share This Product: </b> Facebook, Twitter</p>
					</div>
				</div> <!-- End of Product Detail-->
			</div>
			<hr>
			<div class="product-long-description">
				<h3>Product Description</h3>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean in leo leo. Donec aliquet mauris ac consequat ornare. Pellentesque eget leo tempor, venenatis mauris sed, viverra ante. Donec tincidunt mauris vel tincidunt ultricies. Sed sed libero hendrerit elit gravida vulputate. 
				</p>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean in leo leo. Donec aliquet mauris ac consequat ornare. Pellentesque eget leo tempor, venenatis mauris sed, viverra ante. Donec tincidunt mauris vel tincidunt ultricies. Sed sed libero hendrerit elit gravida vulputate. 
				</p>
			</div>
			<hr>
			<div class="new-product-section">
				<div class="product-section-heading">
					<h2>Recommend Products <img src="img/icons/good_quality.png"></h2>
					<h3>OUR BEST PRODUCTS RECOMMENDED FOR YOU</h3>
				</div>
				<div class="product-content">
					@foreach($products as $productitem)
					<div class="product">
						

						<a href="{{ route('products.show', $productitem->id) }}">
							<img width="100px" height="350px" src="{{ asset('storage/' . $productitem->image) }}" class="card-img-top" alt="">
						</a>
						<div class="product-detail">
							<h3>{{$productitem->name}}</h3>
							
							<a href="{{ route('shop.addTocart',$productitem->id) }}">Add to Cart</a>
							<p>{{$productitem->price}}</p>
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