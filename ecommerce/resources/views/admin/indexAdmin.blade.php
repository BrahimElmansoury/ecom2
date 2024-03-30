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
		<link rel="stylesheet" href="../css/adminstyle.css">
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
					<li><a class="active" href="{{ route('admin.indexAdmin') }}">Accueil</a></li>
					<li><a href="{{ route('admin.order') }}">Commande</a></li>
					<li><a href="{{ route('admin.product') }}">Produit</a></li>
					<li><a href="{{ route('admin.category') }}">Catégorie</a></li>
					<li><a href="{{ route('admin.stock') }}">Stock</a></li>
					<li><a href="">Utilisateurs</a></li>
				</ul>
								
			</div>
			<div class="content dashboard">
				<h3>Dashboard</h3>
				<div class="content-data">
					<div class="content-detail">
						<h4>Low Stock Report</h4>
						<table>
							<thead>
								<tr>
									<th>Product</th>
									<th>Price</th>
									<th>Category</th>
									<th>Qty</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Blue Jeans</td>
									<td>1500</td>
									<td>Pants</td>
									<td>2</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="content-detail">
						<h4>Recent Order</h4>
						<table>
							<thead>
								<tr>
									<th>Date</th>
									<th>Order Ref#</th>
									<th>User</th>
									<th>Amount</th>
									<th>View</th>									
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>11-05-2020</td>
									<td>15895452</td>
									<td>Kamran</td>
									<td>1500</td>
									<td>View</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="content-detail">
						<h4>Completed Order</h4>
						<table>
							<thead>
								<tr>
									<th>Date</th>
									<th>Order Ref#</th>
									<th>User</th>
									<th>Amount</th>
									<th>View</th>									
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>11-05-2020</td>
									<td>15895452</td>
									<td>Kamran</td>
									<td>1500</td>
									<td>View</td>
								</tr>
							</tbody>
						</table>
					</div>
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