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
		 <link href="{{ asset('css/style.css') }}" rel="stylesheet">

		<!-- Javascript -->	
		<script type="text/javascript" defer src="{{ asset('js/dev.js')}}"></script>
		<script defer type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
		
		
  		<script>
  			$(document).ready(function(){
  				
  				$('input[type="radio"]').change(function(){
  					
  					if (this.value == 'easypaisa') {
  						
  						$('#easypaisaText').css('display', 'block');
  					} 
  					else {
  						$('#easypaisaText').css('display', 'none');
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
										<th class="center">Qty.</th>
										<th class="center">Amount</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><img src="img/product/img1.jpg"></td>
										<td>product name</td>
										<td class="center">1200</td>
										<td class="center">2</td>
										<td class="center">2400</td>
									</tr>
									<tr>
										<td><img src="img/product/img2.jpg"></td>
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
						<li><a href="{{ route('homepage') }}">Home</a></li>
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
			<div class="breadcrumb">
				<ul>
					<li><a href="{{ route('homepage') }}">Home</a></li>
					<li> / </li>
					<li><a href="shop.html">Shop</a></li>
					<li> / </li>
					<li><a href="{{ route('shop.addTocart',$product->id) }}">Cart</a></li>
					<li> / </li>
					<li>Checkout</li>
				</ul>
			</div> <!-- End of Breadcrumb-->

			<h2>Billing Detail</h2>
			<div class="checkout-page">
				<div class="billing-detail">					
					<form class="checkout-form" action="{{ route('checkout.store') }}" method="post">
						@csrf
						<h4 id="test">Shipping Detail</h4>
						<input type="hidden" type="number" id="price" name="price" value="{{$product->price}}">
						
						<div class="form-inline">
							<div class="form-group">
								<label>First Name {{$product->id}}</label>
								<input type="text" id="fname" name="fname">
								@error('fname')
								<div class="text-danger">
									{{$message}}
								</div>
							   
									
								@enderror
							</div>
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" id="lname" name="lname">
								@error('lname')
								<div class="text-danger">
									{{$message}}
								</div>
							   
									
								@enderror
							</div>
						</div>
						
						
						<div id="tst"></div>
						<div class="form-inline">
							<div class="form-group">
								<label>City</label>
								<select id="city" name="city">
									<option value="Casablanca">Casablanca</option>
									<option value="Rabat">Rabat</option>
									<option value="Marrakech">Marrakech</option>
									<option value="Fes">Fes</option>
									<option value="Tangier">Tangier</option>
									<option value="Agadir">Agadir</option>
									<option value="Meknes">Meknes</option>
									<option value="Oujda">Oujda</option>
								</select>
							</div>
						</div>
						
						
						<div class="form-inline">	
						<div class="form-group">
							
								<label>Rue</label>
								<input type="text" id="rue" name="rue" autocomplete="off">
								@error('rue')
								<div class="text-danger">
									{{$message}}
								</div>
							   
									
								@enderror
								
						</div>
						<div class="form-group">
								<label>code postal</label>
								<input type="number" id="code-postal" name="code-postal" autocomplete="off">
								@error('code-postal')
								<div class="text-danger">
									{{$message}}
								</div>
							   
									
								@enderror
						</div>
								
						
						
						</div>
						
						<h4>Login Detail</h4>
						<div class="form-inline">					
							<div class="form-group">
								<label>Email</label>
								<input type="email" id="email" name="email" autocomplete="off">
								@error('email')
								<div class="text-danger">
									{{$message}}
								</div>
							   
									
								@enderror
							</div>
							<div class="form-group">
								<label>password</label>
								<input type="password" id="password" name="password" autocomplete="off">
								@error('password')
								<div class="text-danger">
									{{$message}}
								</div>
							   
									
								@enderror
							</div>
						</div>
						<h4>Contact Detail</h4>
						<div class="form-inline">					
							<div class="form-group">
								<label>Tel</label>
								<input type="text" id="tel" name="tel" >
								@error('tel')
								<div class="text-danger">
									{{$message}}
								</div>
							   
									
								@enderror
							</div>
							
						</div>
						<h4>Payment Detail</h4>

							<div class="form-group">
								<label for="card_type">Type de carte</label>
								<select class="form-control" id="card_type" name="card_type">
									<option value="visa">Visa</option>
									<option value="mastercard">Mastercard</option>
									<option value="american_express">American Express</option>
									<!-- Ajoutez d'autres options pour d'autres types de cartes -->
								</select>
							</div>
							<div class="form-inline">					
								<div class="form-group">
									<label  for="card_number">Numéro de carte</label>
									<input type="text" class="form-control" id="card_number" name="card_number" placeholder="1234 5678 9012 3456">
									@error('card_number')
								<div class="text-danger">
									{{$message}}
								</div>
							   
									
								@enderror
								</div>
								<div class="form-group">
									<label for="expiry_date">Date d'expiration</label>
									<input type="text" class="form-control" id="expiry_date" name="expiry_date" placeholder="MM/AA">
									@error('expiry_date')
								<div class="text-danger">
									{{$message}}
								</div>
							   
									
								@enderror
								</div>
							</div>
							<div class="form-row">
								
								<div class="form-group col-md-6">
									<label for="cvv">CVV</label>
									<input type="text" class="form-control" id="cvv" name="cvv" placeholder="123">
									@error('cvv')
								<div class="text-danger">
									{{$message}}
								</div>
							   
									
								@enderror
								</div>
								
								<div class="form-group col-md-6">
									
									<input type="hidden" class="form-control" id="id" name="id" placeholder="123" value="{{$product->id}}">
								</div>
							</div>
				</div>
				<div class="order-summary">
					<div class="checkout-total">
						<h3>Your Order</h3>
						<table>
							<tbody>
								
								
								<tr>
									
								</tr>
								<br>
								<br>
								<tr>
									<li id="cart-total">

								
										<h3>
											Total Price :
											<input class="price-h3" type="number" class="form-control" id="cart-total-value" name="total" value="{{ $totalPrice }}" >								<!-- Autres champs du formulaire -->
											MAD
										</h3>
										</li>

									
									

									
								</tr>										
							</tbody>	
						</table>
						<input class="placeOrder" type="submit" name="order" value="Place Order">

					</div>
					</form> <!-- End of Checkout Form -->
				</div>
			</div>		
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
							<li><a href="{{ route('shop.addTocart',$product->id) }}">Cart</a></li>
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