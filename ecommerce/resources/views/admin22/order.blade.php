<!DOCTYPE html>
<html lang="en">

 	<head>
 		<!-- Meta Tags -->
		<meta charset="UTF-8">
		<meta name="author" content="Kamran Mubarik">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Title -->
 		<title>Create an E-Commerce Website using HTML, CSS and JS</title>
 		<!-- Style Sheet -->
		<link rel="stylesheet" type="text/css" href="../css/styleAdmin.css" />
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
						<img src="../img/icons/account.png">
						<div class="dropdown-menu">
							<ul>
								<li><a href="#">My Account</a></li>								
								<li><a href="#">Settings</a></li>
								<li><a href="#">Logout</a></li>
							</ul>
						</div>
					</div>
				</div> <!-- shop icons -->
			</div> <!-- brand -->
		</div> <!-- container -->
	</header> <!-- header -->

	<main>
		
		<div class="main-content">
			<div class="sidebar">
				<h3>Menu</h3>
				<ul>
					<li><a href="{{route('admin_dashboard')}}">Home</a></li>
					<li><a class="active" href="{{route('admin_order')}}">Order</a></li>
					<li><a href="{{route('admin_product')}}">Product</a></li>
					<li><a href="{{route('admin_category')}}">Category</a></li>
					<li><a href="{{route('admin_stock')}}">Stock</a></li>
					<li><a href="{{route('admin_user')}}">Users</a></li>
				</ul>
			</div>
			<div class="content">
				<h3>Order</h3>
				<div class="content-detail">
					<table>
						<thead>
							<tr>
								<th>Date</th>
								<th>Order Ref#</th>
								<th>User</th>
								<th>Amount</th>
								<th>Payment Mode</th>
								<th>Status</th>
								<th>View</th>
								<th>Delete</th>									
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>11-05-2020</td>
								<td>15895452</td>
								<td>Kamran</td>
								<td>1500</td>
								<td>Cash On Delivery</td>
								<td>Pending</td>
								<td>View</td>
								<td>Delete</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>		

	</main> <!-- Main Area -->

	<footer>
		<div class="container">
			<div class="footer-bar">
				<div class="copyright-text">
					<p>Copryright 2020 - All Rights Reserved</p>
				</div>
			</div> <!-- Footer Bar -->
		</div>
	</footer> <!-- Footer Area -->

</body>

</html>